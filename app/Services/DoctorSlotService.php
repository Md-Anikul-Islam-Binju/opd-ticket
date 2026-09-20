<?php

namespace App\Services;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\DoctorSlot;
use Carbon\Carbon;

class DoctorSlotService
{
    public function generateForDate(Doctor $doctor, $date)
    {
        $date = Carbon::parse($date);

        /*
        |--------------------------------------------------------------------------
        | Friday is always closed
        |--------------------------------------------------------------------------
        */

        if ($date->dayOfWeek == 5) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Get Doctor Schedule
        |--------------------------------------------------------------------------
        */

        $schedule = DoctorSchedule::where('doctor_id', $doctor->id)
            ->where('day_of_week', $date->dayOfWeek)
            ->where('status', true)
            ->where('is_off', false)
            ->first();


        /*
        |--------------------------------------------------------------------------
        | No schedule for this day
        |--------------------------------------------------------------------------
        */

        if (!$schedule) {
            return;
        }


        if (
            !$schedule->start_time ||
            !$schedule->end_time
        ) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Start & End Time
        |--------------------------------------------------------------------------
        */

        $start = Carbon::parse(
            $date->format('Y-m-d') .
            ' ' .
            $schedule->start_time
        );

        $end = Carbon::parse(
            $date->format('Y-m-d') .
            ' ' .
            $schedule->end_time
        );


        $duration = (int) $schedule->slot_duration;


        if ($duration <= 0) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Generate Slots
        |--------------------------------------------------------------------------
        */

        while (
        $start->copy()
            ->addMinutes($duration)
            ->lte($end)
        ) {

            $slotEnd = $start->copy()
                ->addMinutes($duration);


            /*
            |--------------------------------------------------------------------------
            | Prevent Duplicate Slot
            |--------------------------------------------------------------------------
            */

            DoctorSlot::firstOrCreate(
                [
                    'doctor_id' => $doctor->id,
                    'slot_date' => $date->format('Y-m-d'),
                    'start_time' => $start->format('H:i:s'),
                ],
                [
                    'end_time' => $slotEnd->format('H:i:s'),
                    'status' => 'available',
                    'blocked_reason' => null,
                ]
            );


            $start = $slotEnd;
        }
    }
}
