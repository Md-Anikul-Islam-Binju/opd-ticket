<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SlotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('doctor-slot-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index(Request $request)
    {
        try {

            $query = DoctorSlot::with('doctor');

            if ($request->doctor_id) {

                $query->where(
                    'doctor_id',
                    $request->doctor_id
                );
            }

            if ($request->date) {

                $query->whereDate(
                    'slot_date',
                    $request->date
                );
            }

            $slots = $query
                ->orderBy('slot_date')
                ->orderBy('start_time')
                ->paginate(50)
                ->withQueryString();

            $doctors = Doctor::where('status', true)
                ->orderBy('name')
                ->get();

            return view(
                'admin.pages.slot.index',
                compact('slots', 'doctors')
            );

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function block(Request $request, $id)
    {
        try {

            $slot = DoctorSlot::findOrFail($id);

            if ($slot->status === 'booked') {

                return redirect()->back()
                    ->with(
                        'error',
                        'Booked slot cannot be blocked.'
                    );
            }

            $request->validate([
                'blocked_reason' =>
                    'nullable|max:255',
            ]);

            $slot->status = 'blocked';

            $slot->blocked_reason =
                $request->blocked_reason;

            $slot->save();

            return redirect()->back()
                ->with(
                    'success',
                    'Slot Blocked Successfully.'
                );

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function unblock($id)
    {
        try {

            $slot = DoctorSlot::findOrFail($id);

            if ($slot->status === 'booked') {

                return redirect()->back()
                    ->with(
                        'error',
                        'Booked slot cannot be unblocked.'
                    );
            }

            $slot->status = 'available';
            $slot->blocked_reason = null;

            $slot->save();

            return redirect()->back()
                ->with(
                    'success',
                    'Slot Available Again.'
                );

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
