<?php

namespace App\Ai\Tools;

use App\Models\Doctor;
use App\Models\DoctorSlot;
use App\Services\DoctorSlotService;
use Carbon\Carbon;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class FindAppointmentSlots implements Tool
{
    public function description(): Stringable|string
    {
        return <<<'DESCRIPTION'
        Find real available appointment slots for a doctor or department on a specific date.

        Use this tool whenever the patient asks whether a doctor has an available
        appointment slot on a specific date or approximate time such as morning,
        noon, afternoon or evening.

        Never claim that a slot is available without calling this tool.
        The date must be a valid future/bookable date.
        Friday is closed.
        DESCRIPTION;
    }

    public function handle(Request $request): Stringable|string
    {
        try {
            $dateInput = trim((string) ($request['date'] ?? ''));
            $doctorId = $request['doctor_id'] ?? null;
            $departmentId = $request['department_id'] ?? null;

            $timeFrom = $request['time_from'] ?? null;
            $timeTo = $request['time_to'] ?? null;

            if ($dateInput === '') {
                return $this->error(
                    'Appointment date is required.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Parse Date
            |--------------------------------------------------------------------------
            */

            try {
                $date = Carbon::parse($dateInput)->startOfDay();
            } catch (\Throwable $e) {
                return $this->error(
                    'Invalid appointment date.'
                );
            }

            $today = now()->startOfDay();

            /*
            |--------------------------------------------------------------------------
            | Past Date
            |--------------------------------------------------------------------------
            */

            if ($date->lt($today)) {
                return $this->error(
                    'Past date cannot be selected.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Friday Closed
            |--------------------------------------------------------------------------
            */

            if ($date->dayOfWeek === Carbon::FRIDAY) {
                return $this->error(
                    'Friday booking is closed.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Current Booking Week
            |--------------------------------------------------------------------------
            |
            | Saturday -> Thursday
            | Friday    -> closed
            |
            */

            $dayOfWeek = $today->dayOfWeek;

            if ($dayOfWeek === Carbon::FRIDAY) {
                $weekStart = $today->copy()->addDay();
            } else {
                $daysFromSaturday = ($dayOfWeek + 1) % 7;

                $weekStart = $today->copy()
                    ->subDays($daysFromSaturday);
            }

            $weekEnd = $weekStart->copy()->addDays(5);

            if (
                $date->lt($weekStart) ||
                $date->gt($weekEnd)
            ) {
                return $this->error(
                    'This date is outside the current booking week.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Doctor / Department Validation
            |--------------------------------------------------------------------------
            */

            if (!$doctorId && !$departmentId) {
                return $this->error(
                    'Doctor or department is required.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Generate Slots
            |--------------------------------------------------------------------------
            */

            if ($doctorId) {

                $doctor = Doctor::where('id', $doctorId)
                    ->where('status', true)
                    ->first();

                if (!$doctor) {
                    return $this->error(
                        'Doctor is currently unavailable.'
                    );
                }

                app(DoctorSlotService::class)
                    ->generateForDate(
                        $doctor,
                        $date
                    );

            } else {

                $doctors = Doctor::where(
                    'department_id',
                    $departmentId
                )
                    ->where('status', true)
                    ->get();

                if ($doctors->isEmpty()) {
                    return $this->error(
                        'No active doctors found for this department.'
                    );
                }

                $slotService = app(
                    DoctorSlotService::class
                );

                foreach ($doctors as $doctor) {
                    $slotService->generateForDate(
                        $doctor,
                        $date
                    );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Get Available Slots
            |--------------------------------------------------------------------------
            */

            $query = DoctorSlot::with([
                'doctor',
                'doctor.department',
            ])
                ->whereDate(
                    'slot_date',
                    $date->format('Y-m-d')
                )
                ->where(
                    'status',
                    'available'
                );

            /*
            |--------------------------------------------------------------------------
            | Doctor Filter
            |--------------------------------------------------------------------------
            */

            if ($doctorId) {
                $query->where(
                    'doctor_id',
                    $doctorId
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Department Filter
            |--------------------------------------------------------------------------
            */

            if ($departmentId) {
                $query->whereHas(
                    'doctor',
                    function ($q) use ($departmentId) {
                        $q->where(
                            'department_id',
                            $departmentId
                        )
                            ->where(
                                'status',
                                true
                            );
                    }
                );
            } else {
                $query->whereHas(
                    'doctor',
                    function ($q) {
                        $q->where(
                            'status',
                            true
                        );
                    }
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Time Range Filter
            |--------------------------------------------------------------------------
            */

            if ($timeFrom) {
                $query->where(
                    'start_time',
                    '>=',
                    $timeFrom
                );
            }

            if ($timeTo) {
                $query->where(
                    'start_time',
                    '<',
                    $timeTo
                );
            }

            $slots = $query
                ->orderBy('start_time')
                ->get();

            /*
            |--------------------------------------------------------------------------
            | No Available Slots
            |--------------------------------------------------------------------------
            */

            if ($slots->isEmpty()) {
                return json_encode([
                    'status' => false,
                    'message' => 'No available appointment slots found.',
                    'date' => $date->format('Y-m-d'),
                    'weekday' => $date->format('l'),
                    'data' => [],
                ], JSON_UNESCAPED_UNICODE);
            }

            /*
            |--------------------------------------------------------------------------
            | Return Slots
            |--------------------------------------------------------------------------
            */

            return json_encode([
                'status' => true,
                'message' => 'Available appointment slots found.',
                'date' => $date->format('Y-m-d'),
                'weekday' => $date->format('l'),
                'data' => $slots->map(
                    function ($slot) {

                        return [
                            'slot_id' => $slot->id,

                            'doctor_id' =>
                                $slot->doctor_id,

                            'doctor_name' =>
                                $slot->doctor?->name,

                            'department' =>
                                $slot->doctor?->department?->name,

                            'start_time' =>
                                Carbon::parse(
                                    $slot->start_time
                                )->format('h:i A'),

                            'end_time' =>
                                Carbon::parse(
                                    $slot->end_time
                                )->format('h:i A'),

                            'status' =>
                                $slot->status,
                        ];
                    }
                )->values()->all(),
            ], JSON_UNESCAPED_UNICODE);

        } catch (\Throwable $e) {

            report($e);

            return $this->error(
                'Unable to check appointment slots.'
            );
        }
    }

    public function schema(JsonSchema $schema): array
    {
        return [

            'date' => $schema
                ->string()
                ->description(
                    'Appointment date in YYYY-MM-DD format. The AI must resolve words such as today, tomorrow, or next day into the correct date.'
                )
                ->required(),

            'doctor_id' => $schema
                ->integer()
                ->description(
                    'Real doctor ID returned by FindDoctors. Never invent this ID.'
                )
                ->nullable(),

            'department_id' => $schema
                ->integer()
                ->description(
                    'Real department ID returned by FindDepartments. Never invent this ID.'
                )
                ->nullable(),

            'time_from' => $schema
                ->string()
                ->description(
                    'Optional start time filter in HH:MM:SS format. Example: 12:00:00.'
                )
                ->nullable(),

            'time_to' => $schema
                ->string()
                ->description(
                    'Optional end time filter in HH:MM:SS format. Example: 14:00:00.'
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
