<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DoctorScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('doctor-schedule-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('edit');
    }

    public function edit($doctor_id)
    {
        try {

            $doctor = Doctor::with('department')
                ->findOrFail($doctor_id);

            $schedules = $doctor->schedules
                ->keyBy('day_of_week');

            $days = [
                6 => 'Saturday',
                0 => 'Sunday',
                1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
            ];

            return view(
                'admin.pages.doctorSchedule.index',
                compact('doctor', 'schedules', 'days')
            );

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $doctor_id)
    {
        try {

            $request->validate([
                'schedules' => 'required|array',

                'schedules.*.start_time' =>
                    'nullable|date_format:H:i',

                'schedules.*.end_time' =>
                    'nullable|date_format:H:i',

                'schedules.*.slot_duration' =>
                    'required|integer|min:5|max:60',

                'schedules.*.is_off' =>
                    'nullable|boolean',
            ]);

            $doctor = Doctor::findOrFail($doctor_id);

            foreach ($request->schedules as $day => $data) {

                $isOff = !empty($data['is_off']);

                DoctorSchedule::updateOrCreate(
                    [
                        'doctor_id' => $doctor->id,
                        'day_of_week' => $day,
                    ],
                    [
                        'start_time' => $isOff
                            ? null
                            : ($data['start_time'] ?? null),

                        'end_time' => $isOff
                            ? null
                            : ($data['end_time'] ?? null),

                        'slot_duration' =>
                            $data['slot_duration'] ?? 10,

                        'is_off' => $isOff,

                        'status' => !$isOff,
                    ]
                );
            }

            return redirect()->back()
                ->with(
                    'success',
                    'Doctor Schedule Updated Successfully.'
                );

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
