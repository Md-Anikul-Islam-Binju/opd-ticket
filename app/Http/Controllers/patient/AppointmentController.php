<?php
//
//namespace App\Http\Controllers\patient;
//
//use App\Http\Controllers\Controller;
//use App\Models\Appointment;
//use App\Models\Department;
//use App\Models\DoctorSlot;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Str;
//
//class AppointmentController extends Controller
//{
//    public function __construct()
//    {
//        $this->middleware(['auth', 'role:Patient']);
//    }
//
//    public function create()
//    {
//        try {
//            $departments = Department::where('status', true)
//                ->orderBy('name')
//                ->get();
//
//            $today = now()->startOfDay();
//
//            /*
//             * Booking week:
//             *
//             * Saturday = 0
//             * Sunday   = 1
//             * Monday   = 2
//             * Tuesday  = 3
//             * Wednesday= 4
//             * Thursday = 5
//             * Friday   = 6
//             *
//             * Friday is always disabled.
//             */
//
//            $dayOfWeek = $today->dayOfWeek;
//
//            if ($dayOfWeek == 5) {
//                // Friday - booking closed
//                $weekStart = $today->copy()->addDays(1);
//            } else {
//                // Find current Saturday
//                $daysFromSaturday = ($dayOfWeek + 1) % 7;
//
//                $weekStart = $today->copy()
//                    ->subDays($daysFromSaturday);
//            }
//
//            $weekEnd = $weekStart->copy()->addDays(5);
//
//            return view(
//                'patient.appointment.create',
//                compact(
//                    'departments',
//                    'weekStart',
//                    'weekEnd'
//                )
//            );
//
//        } catch (\Exception $e) {
//            return redirect()
//                ->back()
//                ->with('error', $e->getMessage());
//        }
//    }
//
//    public function slots(Request $request)
//    {
//        try {
//            $request->validate([
//                'department_id' => 'required|exists:departments,id',
//                'date' => 'required|date',
//            ]);
//
//            $date = \Carbon\Carbon::parse($request->date);
//            $today = now()->startOfDay();
//
//            /*
//             * Friday cannot be booked.
//             */
//            if ($date->dayOfWeek == 5) {
//                return response()->json([
//                    'success' => false,
//                    'message' => 'Friday booking is closed.'
//                ], 422);
//            }
//
//            /*
//             * Calculate current booking week.
//             */
//            $dayOfWeek = $today->dayOfWeek;
//
//            if ($dayOfWeek == 5) {
//                $weekStart = $today->copy()->addDay();
//            } else {
//                $daysFromSaturday = ($dayOfWeek + 1) % 7;
//
//                $weekStart = $today->copy()
//                    ->subDays($daysFromSaturday);
//            }
//
//            $weekEnd = $weekStart->copy()->addDays(5);
//
//            /*
//             * Patient cannot select past date.
//             */
//            if ($date->lt($today)) {
//                return response()->json([
//                    'success' => false,
//                    'message' => 'Past date cannot be selected.'
//                ], 422);
//            }
//
//            /*
//             * Patient cannot book outside current booking week.
//             */
//            if (
//                $date->lt($weekStart) ||
//                $date->gt($weekEnd)
//            ) {
//                return response()->json([
//                    'success' => false,
//                    'message' => 'This date is outside the current booking week.'
//                ], 422);
//            }
//
//            /*
//             * Get available + booked + blocked slots.
//             *
//             * We show all slots so patient can see:
//             * available = selectable
//             * booked    = red/disabled
//             * blocked   = red/disabled
//             */
//            $slots = DoctorSlot::with('doctor')
//                ->whereDate('slot_date', $date)
//                ->whereHas('doctor', function ($query) use ($request) {
//                    $query->where('department_id', $request->department_id)
//                        ->where('status', true);
//                })
//                ->orderBy('start_time')
//                ->get();
//
//            return response()->json([
//                'success' => true,
//                'slots' => $slots->map(function ($slot) {
//                    return [
//                        'id' => $slot->id,
//                        'doctor_id' => $slot->doctor_id,
//                        'doctor_name' => $slot->doctor->name,
//                        'start_time' => \Carbon\Carbon::parse(
//                            $slot->start_time
//                        )->format('h:i A'),
//                        'end_time' => \Carbon\Carbon::parse(
//                            $slot->end_time
//                        )->format('h:i A'),
//                        'status' => $slot->status,
//                        'blocked_reason' => $slot->blocked_reason,
//                    ];
//                }),
//            ]);
//
//        } catch (\Exception $e) {
//            return response()->json([
//                'success' => false,
//                'message' => $e->getMessage()
//            ], 500);
//        }
//    }
//
//    public function store(Request $request)
//    {
//        try {
//            $request->validate([
//                'slot_id' => 'required|exists:doctor_slots,id',
//                'payment_method' => 'required|in:online,manual',
//                'notes' => 'nullable',
//            ]);
//
//            $patient = Auth::user()->patient;
//
//            if (!$patient) {
//                return redirect()
//                    ->back()
//                    ->with('error', 'Patient profile not found.');
//            }
//
//            /*
//             * Everything inside one transaction.
//             */
//            $appointment = DB::transaction(function () use (
//                $request,
//                $patient
//            ) {
//
//                /*
//                 * Lock slot.
//                 *
//                 * This prevents two patients from booking
//                 * the same slot at the same time.
//                 */
//                $slot = DoctorSlot::with('doctor')
//                    ->where('id', $request->slot_id)
//                    ->lockForUpdate()
//                    ->firstOrFail();
//
//                /*
//                 * Slot must be available.
//                 */
//                if ($slot->status !== 'available') {
//                    throw new \Exception(
//                        'This slot is no longer available.'
//                    );
//                }
//
//                /*
//                 * Doctor must be active.
//                 */
//                if (!$slot->doctor || !$slot->doctor->status) {
//                    throw new \Exception(
//                        'Doctor is currently unavailable.'
//                    );
//                }
//
//                /*
//                 * Friday cannot be booked.
//                 */
//                $appointmentDate = \Carbon\Carbon::parse(
//                    $slot->slot_date
//                );
//
//                if ($appointmentDate->dayOfWeek == 5) {
//                    throw new \Exception(
//                        'Friday booking is closed.'
//                    );
//                }
//
//                $today = now()->startOfDay();
//
//                /*
//                 * Past date protection.
//                 */
//                if ($appointmentDate->lt($today)) {
//                    throw new \Exception(
//                        'Past date cannot be booked.'
//                    );
//                }
//
//                /*
//                 * Current booking week validation.
//                 */
//                $dayOfWeek = $today->dayOfWeek;
//
//                if ($dayOfWeek == 5) {
//                    $weekStart = $today->copy()->addDay();
//                } else {
//                    $daysFromSaturday = ($dayOfWeek + 1) % 7;
//
//                    $weekStart = $today->copy()
//                        ->subDays($daysFromSaturday);
//                }
//
//                $weekEnd = $weekStart->copy()->addDays(5);
//
//                if (
//                    $appointmentDate->lt($weekStart) ||
//                    $appointmentDate->gt($weekEnd)
//                ) {
//                    throw new \Exception(
//                        'This appointment date is outside the current booking week.'
//                    );
//                }
//
//                /*
//                 * Generate ticket number.
//                 */
//                $ticketNumber = 'APT-' .
//                    $appointmentDate->format('Ymd') .
//                    '-' .
//                    strtoupper(Str::random(6));
//
//                $appointment = new Appointment();
//
//                $appointment->ticket_number = $ticketNumber;
//                $appointment->patient_id = $patient->id;
//                $appointment->department_id =
//                    $slot->doctor->department_id;
//                $appointment->doctor_id = $slot->doctor_id;
//                $appointment->slot_id = $slot->id;
//                $appointment->appointment_date =
//                    $appointmentDate->format('Y-m-d');
//                $appointment->start_time = $slot->start_time;
//                $appointment->end_time = $slot->end_time;
//                $appointment->notes = $request->notes;
//                $appointment->status = 'pending';
//
//                $appointment->save();
//
//                /*
//                 * Slot becomes booked immediately.
//                 */
//                $slot->status = 'booked';
//                $slot->blocked_reason = null;
//                $slot->save();
//
//                /*
//                 * Payment record will be created here
//                 * after consultation fee is connected.
//                 */
//
//                return $appointment;
//            });
//
//            /*
//             * Online payment
//             *
//             * Gateway integration will continue from here.
//             */
//            if ($request->payment_method === 'online') {
//
//                return redirect()
//                    ->route(
//                        'patient.appointment.payment',
//                        $appointment->id
//                    );
//            }
//
//            /*
//             * Manual payment.
//             *
//             * Appointment is already booked and ticket generated.
//             */
//            return redirect()
//                ->route(
//                    'patient.appointment.show',
//                    $appointment->id
//                )
//                ->with(
//                    'success',
//                    'Appointment booked successfully. Please complete payment manually at the hospital.'
//                );
//
//        } catch (\Exception $e) {
//            return redirect()
//                ->back()
//                ->withInput()
//                ->with(
//                    'error',
//                    $e->getMessage()
//                );
//        }
//    }
//
//    public function show($id)
//    {
//        try {
//            $patient = Auth::user()->patient;
//
//            $appointment = Appointment::with([
//                'department',
//                'doctor',
//                'slot',
//                'payment',
//            ])
//                ->where('patient_id', $patient->id)
//                ->findOrFail($id);
//
//            return view(
//                'patient.appointment.show',
//                compact('appointment')
//            );
//
//        } catch (\Exception $e) {
//            return redirect()
//                ->back()
//                ->with('error', $e->getMessage());
//        }
//    }
//
//    public function payment($id)
//    {
//        try {
//            $patient = Auth::user()->patient;
//
//            $appointment = Appointment::with([
//                'department',
//                'doctor',
//                'slot',
//                'payment',
//            ])
//                ->where('patient_id', $patient->id)
//                ->findOrFail($id);
//
//            return view(
//                'patient.appointment.payment',
//                compact('appointment')
//            );
//
//        } catch (\Exception $e) {
//            return redirect()
//                ->back()
//                ->with('error', $e->getMessage());
//        }
//    }
//}


namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\DoctorSlot;
use App\Models\Payment;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Services\DoctorSlotService;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth',
            'role:Patient'
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Appointment Create Page
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        try {

            $departments = Department::where('status', true)
                ->orderBy('name')
                ->get();


            $today = now()->startOfDay();


            /*
            |--------------------------------------------------------------------------
            | Booking Week
            |--------------------------------------------------------------------------
            |
            | Saturday -> Thursday
            | Friday    -> Closed
            |
            */

            $dayOfWeek = $today->dayOfWeek;


            /*
            | Friday
            |
            | Friday itself is closed.
            | Next booking week starts Saturday.
            */

            if ($dayOfWeek == 5) {

                $weekStart = $today->copy()->addDay();

            } else {

                /*
                | Find current Saturday
                */

                $daysFromSaturday =
                    ($dayOfWeek + 1) % 7;

                $weekStart = $today->copy()
                    ->subDays($daysFromSaturday);
            }


            /*
            |--------------------------------------------------------------------------
            | Thursday is the last bookable day
            |--------------------------------------------------------------------------
            */

            $weekEnd = $weekStart->copy()->addDays(5);


            return view(
                'patient.appointment.create',
                compact(
                    'departments',
                    'weekStart',
                    'weekEnd'
                )
            );


        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Get Slots
    |--------------------------------------------------------------------------
    */

    public function slots(
        Request           $request,
        DoctorSlotService $slotService
    )
    {
        try {

            $request->validate([
                'department_id' =>
                    'required|exists:departments,id',

                'date' =>
                    'required|date',
            ]);


            $date = \Carbon\Carbon::parse(
                $request->date
            )->startOfDay();


            $today = now()->startOfDay();


            /*
            |--------------------------------------------------------------------------
            | Friday Closed
            |--------------------------------------------------------------------------
            */

            if ($date->dayOfWeek == 5) {

                return response()->json([
                    'success' => false,
                    'message' =>
                        'Friday booking is closed.',
                    'slots' => [],
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | Past Date
            |--------------------------------------------------------------------------
            */

            if ($date->lt($today)) {

                return response()->json([
                    'success' => false,
                    'message' =>
                        'Past date cannot be selected.',
                    'slots' => [],
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | Current Booking Week
            |--------------------------------------------------------------------------
            */

            $dayOfWeek = $today->dayOfWeek;


            if ($dayOfWeek == 5) {

                /*
                | Friday
                | Next booking week starts Saturday
                */

                $weekStart = $today->copy()
                    ->addDay();

            } else {

                $daysFromSaturday =
                    ($dayOfWeek + 1) % 7;

                $weekStart = $today->copy()
                    ->subDays($daysFromSaturday);
            }


            $weekEnd = $weekStart->copy()
                ->addDays(5);


            /*
            |--------------------------------------------------------------------------
            | Date must be inside booking week
            |--------------------------------------------------------------------------
            */

            if (
                $date->lt($weekStart) ||
                $date->gt($weekEnd)
            ) {

                return response()->json([
                    'success' => false,
                    'message' =>
                        'This date is outside the current booking week.',
                    'slots' => [],
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | Get Active Doctors
            | From Selected Department
            |--------------------------------------------------------------------------
            */

            $doctors = Doctor::where(
                'department_id',
                $request->department_id
            )
                ->where('status', true)
                ->get();


            /*
            |--------------------------------------------------------------------------
            | Generate Doctor Slots
            |--------------------------------------------------------------------------
            |
            | DoctorSchedule is used here.
            |
            */

            foreach ($doctors as $doctor) {

                $slotService->generateForDate(
                    $doctor,
                    $date
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Get Actual Slots
            |--------------------------------------------------------------------------
            */

            $slots = DoctorSlot::with('doctor')
                ->whereDate(
                    'slot_date',
                    $date
                )
                ->whereHas(
                    'doctor',
                    function ($query) use ($request) {

                        $query
                            ->where(
                                'department_id',
                                $request->department_id
                            )
                            ->where(
                                'status',
                                true
                            );
                    }
                )
                ->orderBy('start_time')
                ->get();


            /*
            |--------------------------------------------------------------------------
            | Return Slot Data
            |--------------------------------------------------------------------------
            */

            return response()->json([
                'success' => true,

                'slots' => $slots->map(
                    function ($slot) {

                        return [

                            'id' =>
                                $slot->id,

                            'doctor_id' =>
                                $slot->doctor_id,

                            'doctor_name' =>
                                $slot->doctor->name,

                            'start_time' =>
                                \Carbon\Carbon::parse(
                                    $slot->start_time
                                )->format('h:i A'),

                            'end_time' =>
                                \Carbon\Carbon::parse(
                                    $slot->end_time
                                )->format('h:i A'),

                            'status' =>
                                $slot->status,

                            'blocked_reason' =>
                                $slot->blocked_reason,
                        ];
                    }
                ),
            ]);


        } catch (\Exception $e) {

            return response()->json([
                'success' => false,

                'message' =>
                    $e->getMessage(),

                'slots' => [],

            ], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Store Appointment
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        try {

            $request->validate([
                'slot_id' =>
                    'required|exists:doctor_slots,id',

                'payment_method' =>
                    'required|in:online,manual',

                'notes' =>
                    'nullable',
            ]);


            $patient =
                Auth::user()->patient;


            if (!$patient) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Patient profile not found.'
                    );
            }


            $appointment = DB::transaction(
                function () use (
                    $request,
                    $patient
                ) {

                    /*
                    |--------------------------------------------------------------------------
                    | Lock Slot
                    |--------------------------------------------------------------------------
                    */

                    $slot = DoctorSlot::with('doctor')
                        ->where(
                            'id',
                            $request->slot_id
                        )
                        ->lockForUpdate()
                        ->firstOrFail();


                    /*
                    |--------------------------------------------------------------------------
                    | Slot Available?
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
                    | Doctor Active?
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


                    $appointmentDate =
                        \Carbon\Carbon::parse(
                            $slot->slot_date
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | Friday
                    |--------------------------------------------------------------------------
                    */

                    if (
                        $appointmentDate->dayOfWeek ==
                        5
                    ) {

                        throw new \Exception(
                            'Friday booking is closed.'
                        );
                    }


                    $today =
                        now()->startOfDay();


                    /*
                    |--------------------------------------------------------------------------
                    | Past Date
                    |--------------------------------------------------------------------------
                    */

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
                    | Booking Week
                    |--------------------------------------------------------------------------
                    */

                    $dayOfWeek =
                        $today->dayOfWeek;


                    if ($dayOfWeek == 5) {

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
                        $request->notes;

                    $appointment->status =
                        'pending';


                    $appointment->save();


                    /*
                    |--------------------------------------------------------------------------
                    | Slot Becomes Booked
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
            | Online Payment
            |--------------------------------------------------------------------------
            */

            if (
                $request->payment_method ===
                'online'
            ) {

                return redirect()
                    ->route(
                        'patient.appointment.payment',
                        $appointment->id
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | Manual Payment
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route(
                    'patient.appointment.show',
                    $appointment->id
                )
                ->with(
                    'success',
                    'Appointment booked successfully. Please complete payment manually at the hospital.'
                );


        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }







    /*
    |--------------------------------------------------------------------------
    | Appointment Show
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        try {

            $patient =
                Auth::user()->patient;


            $appointment =
                Appointment::with([
                    'department',
                    'doctor',
                    'slot',
                    'payment',
                ])
                    ->where(
                        'patient_id',
                        $patient->id
                    )
                    ->findOrFail($id);


            return view(
                'patient.appointment.show',
                compact('appointment')
            );


        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    public function downloadTicket($id)
    {
        $appointment = Appointment::with([
            'patient.user',
            'department',
            'doctor',
            'payment',
        ])->findOrFail($id);

        $pdf = Pdf::loadView(
            'patient.appointment.ticket-pdf',
            compact('appointment')
        );

        $pdf->setPaper('A4', 'portrait');

        return $pdf->download(
            'ticket-' . $appointment->ticket_number . '.pdf'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Payment Page
    |--------------------------------------------------------------------------
    */


    public function payment($id)
    {
        try {

            $patient =
                Auth::user()->patient;

            if (!$patient) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Patient profile not found.'
                    );
            }

            $appointment =
                Appointment::with([
                    'department',
                    'doctor',
                    'slot',
                    'payment',
                ])
                    ->where(
                        'patient_id',
                        $patient->id
                    )
                    ->findOrFail($id);


            /*
             * Already paid
             */
            if (
                $appointment->payment &&
                $appointment->payment->status ===
                'paid'
            ) {

                return redirect()
                    ->route(
                        'patient.appointment.show',
                        $appointment->id
                    )
                    ->with(
                        'success',
                        'Payment has already been completed.'
                    );
            }


            /*
             * Get global ticket fee.
             */
            $service =
                Service::where(
                    'status',
                    true
                )
                    ->latest()
                    ->first();


            if (!$service) {

                throw new \Exception(
                    'Ticket fee is not configured.'
                );
            }


            /*
             * Create payment record
             * only when payment page is opened.
             */
            if (!$appointment->payment) {

                $payment =
                    new Payment();

                $payment->appointment_id =
                    $appointment->id;

                $payment->amount =
                    $service->fee;

                /*
                 * Keep the originally
                 * selected payment method.
                 */
                $payment->payment_method =
                    'online';

                $payment->transaction_id =
                    null;

                $payment->status =
                    'pending';

                $payment->paid_at =
                    null;

                $payment->save();

                $appointment->load('payment');
            }


            return view(
                'patient.appointment.payment',
                compact(
                    'appointment'
                )
            );


        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    public function paymentProcess(Request $request, $id)
    {
        try {

            $request->validate([
                'payment_method' =>
                    'required|in:online,manual',
            ]);


            $patient =
                Auth::user()->patient;


            if (!$patient) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Patient profile not found.'
                    );
            }


            $appointment =
                Appointment::with('payment')
                    ->where(
                        'patient_id',
                        $patient->id
                    )
                    ->findOrFail($id);


            /*
             * Payment record must exist.
             */

            if (!$appointment->payment) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Payment record not found.'
                    );
            }


            /*
             * Already paid.
             */

            if (
                $appointment->payment->status ===
                'paid'
            ) {

                return redirect()
                    ->route(
                        'patient.appointment.show',
                        $appointment->id
                    )
                    ->with(
                        'success',
                        'Payment has already been completed.'
                    );
            }


            /*
             * Save selected payment method.
             */

            $payment =
                $appointment->payment;

            $payment->payment_method =
                $request->payment_method;

            $payment->save();


            /*
             * Online Payment
             */

            if (
                $request->payment_method ===
                'online'
            ) {

                return redirect()
                    ->route(
                        'patient.appointment.fake.payment',
                        $appointment->id
                    );
            }


            /*
             * Manual Payment
             */

            return redirect()
                ->route(
                    'patient.appointment.manual.payment',
                    $appointment->id
                );


        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }

    public function fakePayment($id)
    {
        try {

            $patient =
                Auth::user()->patient;


            if (!$patient) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Patient profile not found.'
                    );
            }


            $appointment =
                Appointment::with([
                    'doctor',
                    'department',
                    'payment',
                ])
                    ->where(
                        'patient_id',
                        $patient->id
                    )
                    ->findOrFail($id);


            if (!$appointment->payment) {

                return redirect()
                    ->route(
                        'patient.appointment.payment',
                        $appointment->id
                    )
                    ->with(
                        'error',
                        'Payment record not found.'
                    );
            }


            if (
                $appointment->payment->status ===
                'paid'
            ) {

                return redirect()
                    ->route(
                        'patient.appointment.show',
                        $appointment->id
                    );
            }


            if (
                $appointment->payment->payment_method !==
                'online'
            ) {

                return redirect()
                    ->route(
                        'patient.appointment.payment',
                        $appointment->id
                    )
                    ->with(
                        'error',
                        'Online payment is not selected.'
                    );
            }


            return view(
                'patient.appointment.fake-payment',
                compact('appointment')
            );


        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }

    public function fakePaymentProcess(
        Request $request,
                $id
    ) {
        try {

            $request->validate([
                'card_number' =>
                    'required|digits:16',

                'expiry' =>
                    'required|date_format:m/y',

                'cvv' =>
                    'required|digits:3',
            ]);


            $patient =
                Auth::user()->patient;


            if (!$patient) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Patient profile not found.'
                    );
            }


            $appointment =
                Appointment::with('payment')
                    ->where(
                        'patient_id',
                        $patient->id
                    )
                    ->findOrFail($id);


            if (!$appointment->payment) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Payment record not found.'
                    );
            }


            if (
                $appointment->payment->status ===
                'paid'
            ) {

                return redirect()
                    ->route(
                        'patient.appointment.show',
                        $appointment->id
                    )
                    ->with(
                        'success',
                        'Payment has already been completed.'
                    );
            }


            /*
             * Demo card validation
             */

            $cardNumber =
                preg_replace(
                    '/\s+/',
                    '',
                    $request->card_number
                );


            if (
                $cardNumber !==
                '4242424242424242'
            ) {

                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Invalid demo card number. Use 4242 4242 4242 4242.'
                    );
            }


            /*
             * Mark payment as paid.
             */

            $payment =
                $appointment->payment;

            $payment->payment_method =
                'online';

            $payment->transaction_id =
                'FAKE-TXN-' .
                strtoupper(
                    \Illuminate\Support\Str::random(10)
                );

            $payment->status =
                'paid';

            $payment->paid_at =
                now();

            $payment->save();


            /*
             * Confirm appointment.
             */

            $appointment->status =
                'confirmed';

            $appointment->save();


            return redirect()
                ->route(
                    'patient.appointment.show',
                    $appointment->id
                )
                ->with(
                    'success',
                    'Payment completed successfully. Your appointment is confirmed.'
                );


        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    public function manualPayment($id)
    {
        try {

            $patient =
                Auth::user()->patient;


            if (!$patient) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Patient profile not found.'
                    );
            }


            $appointment =
                Appointment::with([
                    'doctor',
                    'department',
                    'payment',
                ])
                    ->where(
                        'patient_id',
                        $patient->id
                    )
                    ->findOrFail($id);


            if (!$appointment->payment) {

                return redirect()
                    ->route(
                        'patient.appointment.payment',
                        $appointment->id
                    )
                    ->with(
                        'error',
                        'Payment record not found.'
                    );
            }


            if (
                $appointment->payment->status ===
                'paid'
            ) {

                return redirect()
                    ->route(
                        'patient.appointment.show',
                        $appointment->id
                    );
            }


            return view(
                'patient.appointment.manual-payment',
                compact('appointment')
            );


        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }
}
