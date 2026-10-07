<?php

namespace App\Ai\Tools;

use App\Models\Appointment;
use App\Models\DoctorSlot;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;
use Carbon\Carbon;

class BookAppointment implements Tool
{
    public function description(): Stringable|string
    {
        return <<<'DESCRIPTION'
        Book a real OPD appointment for the currently authenticated patient.

        IMPORTANT:
        Only use this tool AFTER the patient has explicitly confirmed the
        exact doctor, department, date and time slot.

        This tool creates the appointment in the database and changes the
        selected DoctorSlot status from available to booked.

        Payment is ALWAYS manual for AI bookings.
        Never use online payment.
        Never ask the patient to provide card or bKash information.

        Never claim that an appointment is booked unless this tool returns
        a successful result.
        DESCRIPTION;
    }

    public function handle(Request $request): Stringable|string
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | Current Authenticated User
            |--------------------------------------------------------------------------
            */

            $user = auth()->user();

            if (!$user) {
                return $this->error(
                    'Authentication is required to book an appointment.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Patient Profile
            |--------------------------------------------------------------------------
            */

            $patient = $user->patient;

            if (!$patient) {
                return $this->error(
                    'Patient profile not found.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Required Slot
            |--------------------------------------------------------------------------
            */

            $slotId = $request['slot_id'] ?? null;

            if (!$slotId) {
                return $this->error(
                    'Appointment slot is required.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Transaction
            |--------------------------------------------------------------------------
            */

            $appointment = DB::transaction(
                function () use (
                    $slotId,
                    $patient,
                    $request
                ) {

                    /*
                    |--------------------------------------------------------------------------
                    | Lock Slot
                    |--------------------------------------------------------------------------
                    */

                    $slot = DoctorSlot::with([
                        'doctor',
                        'doctor.department',
                    ])
                        ->where(
                            'id',
                            $slotId
                        )
                        ->lockForUpdate()
                        ->first();

                    if (!$slot) {
                        throw new \Exception(
                            'Appointment slot not found.'
                        );
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Slot Availability
                    |--------------------------------------------------------------------------
                    */

                    if (
                        $slot->status !==
                        'available'
                    ) {
                        throw new \Exception(
                            'This slot is no longer available.'
                        );
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Doctor
                    |--------------------------------------------------------------------------
                    */

                    if (
                        !$slot->doctor ||
                        !$slot->doctor->status
                    ) {
                        throw new \Exception(
                            'Doctor is currently unavailable.'
                        );
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Appointment Date
                    |--------------------------------------------------------------------------
                    */

                    $appointmentDate = Carbon::parse(
                        $slot->slot_date
                    )->startOfDay();

                    /*
                    |--------------------------------------------------------------------------
                    | Friday Closed
                    |--------------------------------------------------------------------------
                    */

                    if (
                        $appointmentDate->dayOfWeek ===
                        Carbon::FRIDAY
                    ) {
                        throw new \Exception(
                            'Friday booking is closed.'
                        );
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Past Date
                    |--------------------------------------------------------------------------
                    */

                    $today = now()->startOfDay();

                    if (
                        $appointmentDate->lt(
                            $today
                        )
                    ) {
                        throw new \Exception(
                            'Past date cannot be booked.'
                        );
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Current Booking Week
                    |--------------------------------------------------------------------------
                    */

                    $dayOfWeek =
                        $today->dayOfWeek;

                    if (
                        $dayOfWeek ===
                        Carbon::FRIDAY
                    ) {

                        $weekStart =
                            $today->copy()
                                ->addDay();

                    } else {

                        $daysFromSaturday =
                            ($dayOfWeek + 1) % 7;

                        $weekStart =
                            $today->copy()
                                ->subDays(
                                    $daysFromSaturday
                                );
                    }

                    $weekEnd =
                        $weekStart->copy()
                            ->addDays(5);

                    if (
                        $appointmentDate->lt(
                            $weekStart
                        ) ||
                        $appointmentDate->gt(
                            $weekEnd
                        )
                    ) {
                        throw new \Exception(
                            'This appointment date is outside the current booking week.'
                        );
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Prevent Duplicate Appointment
                    |--------------------------------------------------------------------------
                    |
                    | Extra protection in case the same patient already has
                    | an appointment for this exact slot.
                    |
                    */

                    $alreadyBooked =
                        Appointment::where(
                            'patient_id',
                            $patient->id
                        )
                            ->where(
                                'slot_id',
                                $slot->id
                            )
                            ->whereNotIn(
                                'status',
                                [
                                    'cancelled',
                                    'rejected',
                                ]
                            )
                            ->exists();

                    if ($alreadyBooked) {
                        throw new \Exception(
                            'You already have an appointment for this slot.'
                        );
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Ticket Number
                    |--------------------------------------------------------------------------
                    */

                    $ticketNumber =
                        'APT-' .
                        $appointmentDate->format(
                            'Ymd'
                        ) .
                        '-' .
                        strtoupper(
                            Str::random(6)
                        );

                    /*
                    |--------------------------------------------------------------------------
                    | Create Appointment
                    |--------------------------------------------------------------------------
                    */

                    $appointment =
                        new Appointment();

                    $appointment->ticket_number =
                        $ticketNumber;

                    $appointment->patient_id =
                        $patient->id;

                    $appointment->department_id =
                        $slot->doctor->department_id;

                    $appointment->doctor_id =
                        $slot->doctor_id;

                    $appointment->slot_id =
                        $slot->id;

                    $appointment->appointment_date =
                        $appointmentDate->format(
                            'Y-m-d'
                        );

                    $appointment->start_time =
                        $slot->start_time;

                    $appointment->end_time =
                        $slot->end_time;

                    $appointment->notes =
                        $request['notes'] ?? null;

                    /*
                    |--------------------------------------------------------------------------
                    | Manual Payment
                    |--------------------------------------------------------------------------
                    |
                    | AI NEVER handles online payment.
                    |
                    */

                    $appointment->status =
                        'pending';

                    $appointment->save();

                    /*
                    |--------------------------------------------------------------------------
                    | Mark Slot Booked
                    |--------------------------------------------------------------------------
                    */

                    $slot->status =
                        'booked';

                    $slot->blocked_reason =
                        null;

                    $slot->save();

                    return $appointment;
                }
            );

            /*
            |--------------------------------------------------------------------------
            | Success
            |--------------------------------------------------------------------------
            */

            $appointment->load([
                'department',
                'doctor',
                'slot',
            ]);

            return json_encode([
                'status' => true,

                'message' =>
                    'Appointment booked successfully.',

                'data' => [

                    'appointment_id' =>
                        $appointment->id,

                    'ticket_number' =>
                        $appointment->ticket_number,

                    'doctor_name' =>
                        $appointment->doctor?->name,

                    'department_name' =>
                        $appointment->department?->name,

                    'appointment_date' =>
                        $appointment
                            ->appointment_date,

                    'weekday' =>
                        Carbon::parse(
                            $appointment
                                ->appointment_date
                        )->format('l'),

                    'start_time' =>
                        Carbon::parse(
                            $appointment->start_time
                        )->format('h:i A'),

                    'end_time' =>
                        Carbon::parse(
                            $appointment->end_time
                        )->format('h:i A'),

                    'payment_method' =>
                        'manual',

                    'appointment_status' =>
                        $appointment->status,
                ],

            ], JSON_UNESCAPED_UNICODE);

        } catch (\Throwable $e) {

            report($e);

            return $this->error(
                $e->getMessage()
            );
        }
    }

    public function schema(JsonSchema $schema): array
    {
        return [

            'slot_id' => $schema
                ->integer()
                ->description(
                    'The real DoctorSlot ID returned by FindAppointmentSlots. Never invent this ID.'
                )
                ->required(),

            'notes' => $schema
                ->string()
                ->description(
                    'Optional patient notes for the appointment.'
                )
                ->nullable(),
        ];
    }

    private function error(string $message): string
    {
        return json_encode([
            'status' => false,
            'message' => $message,
            'data' => [],
        ], JSON_UNESCAPED_UNICODE);
    }
}
