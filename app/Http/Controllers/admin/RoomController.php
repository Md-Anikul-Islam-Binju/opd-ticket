<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('room-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $rooms = Room::latest()->paginate(15);

        return view('admin.pages.room.index', compact('rooms'));
    }

    public function store(Request $request)
    {
        try {

            if (!Gate::allows('room-create')) {
                return redirect()->route('unauthorized.action');
            }

            $request->validate([
                'floor_no' => 'required|integer|between:1,20',
                'room_no' => 'required|string|max:50|unique:rooms,room_no',
            ]);

            $room = new Room();

            $room->floor_no = $request->floor_no;
            $room->room_no = $request->room_no;

            // Status is managed by Department assignment.
            $room->status = 'free';

            $room->save();

            return redirect()->back()
                ->with('success', 'Room Added Successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;

        } catch (\Exception $e) {

            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {

            if (!Gate::allows('room-edit')) {
                return redirect()->route('unauthorized.action');
            }

            $request->validate([
                'floor_no' => 'required|integer|between:1,20',
                'room_no' => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique('rooms', 'room_no')->ignore($id),
                ],
            ]);

            $room = Room::findOrFail($id);

            $room->floor_no = $request->floor_no;
            $room->room_no = $request->room_no;

            // Do not modify status here.
            $room->save();

            return redirect()->back()
                ->with('success', 'Room Updated Successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;

        } catch (\Exception $e) {

            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {

            if (!Gate::allows('room-delete')) {
                return redirect()->route('unauthorized.action');
            }

            $room = Room::findOrFail($id);

            if ($room->status === 'booked') {
                return redirect()->back()
                    ->with('error', 'Cannot delete an assigned room. Remove the room assignment first.');
            }

            $room->delete();

            return redirect()->back()
                ->with('success', 'Room Deleted Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
