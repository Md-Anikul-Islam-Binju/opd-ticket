<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('department-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }


    public function index()
    {
        $departments = Department::withCount('doctors')
            ->latest()
            ->paginate(15);

        $rooms = Room::orderBy('floor_no')
            ->orderBy('room_no')
            ->get();

        $roomMap = $rooms->keyBy('id');

        return view('admin.pages.department.index', compact(
            'departments',
            'rooms',
            'roomMap'
        ));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:departments,name',
            'bn_name'     => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:0,1',
            'room_ids'    => 'required|array|min:1',
            'room_ids.*'  => 'required|integer|distinct|exists:rooms,id',
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $roomIds = array_map(
                    'intval',
                    $validated['room_ids']
                );

                sort($roomIds);

                // Lock selected rooms to prevent simultaneous assignment.
                $selectedRooms = Room::whereIn('id', $roomIds)
                    ->orderBy('id')
                    ->lockForUpdate()
                    ->get();

                if ($selectedRooms->count() !== count($roomIds)) {
                    throw ValidationException::withMessages([
                        'room_ids' => 'One or more selected rooms do not exist.',
                    ]);
                }

                if ($selectedRooms->contains(
                    fn ($room) => $room->status !== 'free'
                )) {
                    throw ValidationException::withMessages([
                        'room_ids' => 'One or more selected rooms are already booked.',
                    ]);
                }

                $department = new Department();

                $department->name = $validated['name'];
                $department->bn_name = $validated['bn_name'] ?? null;
                $department->slug = Str::slug($validated['name']);
                $department->description = $validated['description'] ?? null;
                $department->status = $validated['status'];

                // Store room database IDs as JSON.
                $department->room_ids = $roomIds;
                $department->save();

                // Mark assigned rooms as booked.
                Room::whereIn('id', $roomIds)->update([
                    'status' => 'booked',
                ]);
            });

            return redirect()->back()
                ->with('success', 'Department Added Successfully.');
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            report($e);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Unable to add department. Please try again.');
        }
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:departments,name,' . $id,
            'bn_name'     => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:0,1',
            'room_ids'    => 'required|array|min:1',
            'room_ids.*'  => 'required|integer|distinct|exists:rooms,id',
        ]);

        try {
            DB::transaction(function () use ($validated, $id) {
                $department = Department::whereKey($id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $oldRoomIds = array_map(
                    'intval',
                    $department->room_ids ?? []
                );

                $newRoomIds = array_map(
                    'intval',
                    $validated['room_ids']
                );

                $oldRoomIds = array_values(array_unique($oldRoomIds));
                $newRoomIds = array_values(array_unique($newRoomIds));

                sort($oldRoomIds);
                sort($newRoomIds);

                // Lock both previously assigned and newly selected rooms.
                $lockRoomIds = array_values(array_unique(array_merge(
                    $oldRoomIds,
                    $newRoomIds
                )));

                sort($lockRoomIds);

                $lockedRooms = Room::whereIn('id', $lockRoomIds)
                    ->orderBy('id')
                    ->lockForUpdate()
                    ->get()
                    ->keyBy('id');

                if ($lockedRooms->count() !== count($lockRoomIds)) {
                    throw ValidationException::withMessages([
                        'room_ids' => 'One or more selected rooms do not exist.',
                    ]);
                }

                $addedRoomIds = array_values(
                    array_diff($newRoomIds, $oldRoomIds)
                );

                $removedRoomIds = array_values(
                    array_diff($oldRoomIds, $newRoomIds)
                );

                // Newly selected rooms must be free.
                foreach ($addedRoomIds as $roomId) {
                    if ($lockedRooms[$roomId]->status !== 'free') {
                        throw ValidationException::withMessages([
                            'room_ids' => 'Room ' .
                                $lockedRooms[$roomId]->room_no .
                                ' is already booked.',
                        ]);
                    }
                }

                $department->name = $validated['name'];
                $department->bn_name = $validated['bn_name'] ?? null;
                $department->slug = Str::slug($validated['name']);
                $department->description = $validated['description'] ?? null;
                $department->status = $validated['status'];

                // Update JSON room IDs.
                $department->room_ids = $newRoomIds;
                $department->save();

                // Released rooms become free.
                if (!empty($removedRoomIds)) {
                    Room::whereIn('id', $removedRoomIds)->update([
                        'status' => 'free',
                    ]);
                }

                // Newly assigned rooms become booked.
                if (!empty($addedRoomIds)) {
                    Room::whereIn('id', $addedRoomIds)->update([
                        'status' => 'booked',
                    ]);
                }
            });

            return redirect()->back()
                ->with('success', 'Department Updated Successfully.');
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            report($e);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Unable to update department. Please try again.');
        }
    }


    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $department = Department::whereKey($id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($department->doctors()->exists()) {
                    throw ValidationException::withMessages([
                        'department' => 'Cannot delete department with doctors.',
                    ]);
                }

                $roomIds = array_map(
                    'intval',
                    $department->room_ids ?? []
                );

                sort($roomIds);

                if (!empty($roomIds)) {
                    Room::whereIn('id', $roomIds)
                        ->orderBy('id')
                        ->lockForUpdate()
                        ->get();

                    Room::whereIn('id', $roomIds)->update([
                        'status' => 'free',
                    ]);
                }

                $department->delete();
            });

            return redirect()->back()
                ->with('success', 'Department Deleted Successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()
                ->with('error', $e->validator->errors()->first());
        } catch (\Exception $e) {
            report($e);

            return redirect()->back()
                ->with('error', 'Unable to delete department. Please try again.');
        }
    }



    public function toggleStatus($id)
    {
        try {

            $department = Department::findOrFail($id);

            $department->status = !$department->status;

            $department->save();

            return redirect()->back()
                ->with('success', 'Department Status Updated Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }
}
