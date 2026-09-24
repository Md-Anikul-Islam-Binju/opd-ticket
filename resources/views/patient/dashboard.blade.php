@extends('patient.index')
@section('content')



    <!-- =========================================
         SESSION MESSAGES
    ========================================== -->

    @if(session('success'))

        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700 flex items-start gap-3">

            <i class="fa-solid fa-circle-check mt-0.5"></i>

            <div>

                <p class="font-semibold">
                    Success
                </p>

                <p class="text-sm mt-0.5">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    @if(session('error'))

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-700 flex items-start gap-3">

            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>

            <div>

                <p class="font-semibold">
                    Error
                </p>

                <p class="text-sm mt-0.5">
                    {{ session('error') }}
                </p>

            </div>

        </div>

    @endif



    <!-- =========================================
             PATIENT WELCOME
        ========================================== -->

    <section class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-teal-700 via-teal-600 to-cyan-600 text-white shadow-lg mb-8">

        <div class="absolute -right-16 -top-16 w-56 h-56 rounded-full bg-white/10"></div>

        <div class="absolute -right-20 -bottom-20 w-64 h-64 rounded-full bg-white/10"></div>


        <div class="relative px-6 py-8 sm:px-8">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">


                <div>

                    <div class="flex flex-wrap items-center gap-3">

                        <h2 class="text-2xl sm:text-3xl font-bold">
                            Welcome, {{ $patient->user->name }}
                        </h2>


                        <!-- Account Status -->
                        @if($patient->status)

                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-500/20 border border-green-200/30 text-green-50 text-xs font-semibold">

                                    <span class="w-2 h-2 rounded-full bg-green-300"></span>

                                    Active

                                </span>

                        @else

                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-500/20 border border-red-200/30 text-red-50 text-xs font-semibold">

                                    <span class="w-2 h-2 rounded-full bg-red-300"></span>

                                    Inactive

                                </span>

                        @endif

                    </div>


                    <p class="mt-2 text-teal-50">

                        Manage your OPD appointments and hospital information from your patient portal.

                    </p>


                    <div class="mt-5 flex flex-wrap gap-3">

                            <span class="inline-flex items-center gap-2 bg-white/10 border border-white/10 rounded-lg px-3 py-2 text-sm">

                                <i class="fa-solid fa-id-card"></i>

                                {{ $patient->patient_code }}

                            </span>


                        <span class="inline-flex items-center gap-2 bg-white/10 border border-white/10 rounded-lg px-3 py-2 text-sm">

                                <i class="fa-solid fa-phone"></i>

                                {{ $patient->phone }}

                            </span>

                    </div>

                </div>


                <div class="hidden sm:flex items-center justify-center w-24 h-24 rounded-2xl bg-white/10 border border-white/10">

                    <i class="fa-solid fa-user-injured text-5xl text-white/90"></i>

                </div>

            </div>

        </div>

    </section>



    <!-- =========================================
         STATS
    ========================================== -->

    @php

        $totalAppointments = $appointments->count();

        $completedAppointments = $appointments
            ->where('status', 'completed')
            ->count();

        $activeAppointments = $appointments
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        $cancelledAppointments = $appointments
            ->where('status', 'cancelled')
            ->count();

    @endphp


    <section class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">


        <!-- Total -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Appointments
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalAppointments }}
                    </h3>

                </div>


                <div class="w-11 h-11 rounded-xl bg-blue-50 text-[#0D9488] flex items-center justify-center">

                    <i class="fa-solid fa-calendar-check text-lg"></i>

                </div>

            </div>

        </div>


        <!-- Active -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Active
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $activeAppointments }}
                    </h3>

                </div>


                <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">

                    <i class="fa-solid fa-clock text-lg"></i>

                </div>

            </div>

        </div>


        <!-- Completed -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Completed
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $completedAppointments }}
                    </h3>

                </div>


                <div class="w-11 h-11 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">

                    <i class="fa-solid fa-circle-check text-lg"></i>

                </div>

            </div>

        </div>


        <!-- Cancelled -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Cancelled
                    </p>

                    <h3 class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $cancelledAppointments }}
                    </h3>

                </div>


                <div class="w-11 h-11 rounded-xl bg-red-50 text-red-600 flex items-center justify-center">

                    <i class="fa-solid fa-circle-xmark text-lg"></i>

                </div>

            </div>

        </div>

    </section>



    <!-- =========================================
         UPCOMING + CALENDAR
    ========================================== -->

    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">


        <!-- =====================================
             LATEST UPCOMING APPOINTMENT
        ====================================== -->

        <div class="lg:col-span-2">

            @php

                /*
                |--------------------------------------------------------------------------
                | Latest Upcoming Appointment
                |--------------------------------------------------------------------------
                |
                | Example:
                |
                | 17 Sep + 21 Sep
                |
                | Result:
                |
                | 21 Sep
                |
                */

                $today = \Carbon\Carbon::today();

                $upcomingAppointment = $appointments
                    ->filter(function ($appointment) use ($today) {

                        return in_array($appointment->status, [
                            'pending',
                            'confirmed'
                        ])
                        &&
                        \Carbon\Carbon::parse(
                            $appointment->appointment_date
                        )->gte($today);

                    })
                    ->sortByDesc(function ($appointment) {

                        return \Carbon\Carbon::parse(
                            $appointment->appointment_date
                        )->timestamp;

                    })
                    ->first();

            @endphp


            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden h-full">


                <!-- Header -->
                <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">

                    <div>

                        <h3 class="text-lg font-bold text-slate-800">
                            Upcoming Appointment
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Your latest scheduled appointment
                        </p>

                    </div>


                    <div class="w-11 h-11 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">

                        <i class="fa-solid fa-calendar-day text-lg"></i>

                    </div>

                </div>


                @if($upcomingAppointment)

                    @php

                        $appointmentDate = \Carbon\Carbon::parse(
                            $upcomingAppointment->appointment_date
                        );

                    @endphp


                    <div class="p-6">


                        <!-- Date -->
                        <div class="flex items-center gap-4 mb-6">

                            <div class="w-16 h-16 rounded-2xl bg-teal-600 text-white flex flex-col items-center justify-center shadow-sm">

                                    <span class="text-xs uppercase font-medium">
                                        {{ $appointmentDate->format('M') }}
                                    </span>

                                <span class="text-2xl font-bold leading-none">
                                        {{ $appointmentDate->format('d') }}
                                    </span>

                            </div>


                            <div>

                                <p class="text-xl font-bold text-slate-800">
                                    {{ $appointmentDate->format('l') }}
                                </p>

                                <p class="text-sm text-slate-500">
                                    {{ $appointmentDate->format('d F Y') }}
                                </p>

                            </div>

                        </div>


                        <!-- Appointment Information -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


                            <!-- Ticket -->
                            <div class="rounded-xl bg-slate-50 p-4">

                                <p class="text-xs text-slate-500 uppercase tracking-wide">
                                    Ticket Number
                                </p>

                                <p class="font-bold text-teal-700 mt-1">
                                    {{ $upcomingAppointment->ticket_number }}
                                </p>

                            </div>


                            <!-- Department -->
                            <div class="rounded-xl bg-slate-50 p-4">

                                <p class="text-xs text-slate-500 uppercase tracking-wide">
                                    Department
                                </p>

                                <p class="font-semibold text-slate-800 mt-1">
                                    {{ $upcomingAppointment->department->name ?? 'N/A' }}
                                </p>

                            </div>


                            <!-- Time -->
                            <div class="rounded-xl bg-slate-50 p-4">

                                <p class="text-xs text-slate-500 uppercase tracking-wide">
                                    Time
                                </p>

                                <p class="font-semibold text-slate-800 mt-1">

                                    {{ \Carbon\Carbon::parse($upcomingAppointment->start_time)->format('h:i A') }}

                                    -

                                    {{ \Carbon\Carbon::parse($upcomingAppointment->end_time)->format('h:i A') }}

                                </p>

                            </div>


                            <!-- Status -->
                            <div class="rounded-xl bg-slate-50 p-4">

                                <p class="text-xs text-slate-500 uppercase tracking-wide">
                                    Status
                                </p>

                                <div class="mt-1">

                                    @if($upcomingAppointment->status === 'confirmed')

                                        <span class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                                Confirmed
                                            </span>

                                    @else

                                        <span class="inline-flex px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold">
                                                Pending
                                            </span>

                                    @endif

                                </div>

                            </div>

                        </div>


                        <!-- View Button -->
                        <div class="mt-6 flex flex-col sm:flex-row gap-3">

                            <!-- View Appointment -->
                            <a
                                href="{{ route('patient.appointment.show', $upcomingAppointment->id) }}"
                                class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-5 py-3 rounded-xl bg-teal-600 hover:bg-teal-700 text-white font-semibold transition"
                            >

                                <i class="fa-solid fa-eye"></i>

                                View Appointment

                            </a>


                            <!-- New Appointment -->
                            <a
                                href="{{ route('patient.appointment.create') }}"
                                class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-5 py-3 rounded-xl bg-[#38A6BF] hover:bg-[#16A34A] text-white font-semibold transition"
                            >

                                <i class="fa-solid fa-calendar-plus"></i>

                                New Appointment

                            </a>

                        </div>

                    </div>

                @else

                    <div class="p-10 text-center">

                        <div class="w-16 h-16 mx-auto rounded-full bg-slate-100 flex items-center justify-center text-slate-400">

                            <i class="fa-regular fa-calendar-xmark text-2xl"></i>

                        </div>


                        <h4 class="mt-4 font-semibold text-slate-700">
                            No Upcoming Appointment
                        </h4>


                        <p class="text-sm text-slate-500 mt-1">

                            You currently have no pending or confirmed appointment.

                        </p>


                        <a
                            href="{{ route('patient.appointment.create') }}"
                            class="inline-flex mt-5 px-5 py-2.5 rounded-lg bg-teal-600 text-white font-semibold hover:bg-teal-700"
                        >

                            Book Appointment

                        </a>

                    </div>

                @endif

            </div>

        </div>



        <!-- =====================================
             CALENDAR
        ====================================== -->

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">


            <!-- Calendar Header -->
            <div class="px-5 py-5 border-b border-slate-100">

                <div class="flex items-center justify-between">

                    <div>

                        <h3 class="text-lg font-bold text-slate-800">
                            Appointment Calendar
                        </h3>

                        <p class="text-xs text-slate-500 mt-1">
                            Your appointment dates
                        </p>

                    </div>


                    <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">

                        <i class="fa-regular fa-calendar"></i>

                    </div>

                </div>

            </div>


            <div class="p-5">


                <!-- Calendar Header -->
                <div class="flex items-center justify-between mb-5">


                    <button
                        type="button"
                        id="previousMonth"
                        class="w-9 h-9 rounded-lg border border-slate-200 hover:bg-slate-100 text-slate-600"
                    >

                        <i class="fa-solid fa-chevron-left text-xs"></i>

                    </button>


                    <h4
                        id="calendarMonth"
                        class="font-bold text-slate-800"
                    ></h4>


                    <button
                        type="button"
                        id="nextMonth"
                        class="w-9 h-9 rounded-lg border border-slate-200 hover:bg-slate-100 text-slate-600"
                    >

                        <i class="fa-solid fa-chevron-right text-xs"></i>

                    </button>

                </div>



                <!-- Days -->
                <div class="grid grid-cols-7 mb-2">

                    <div class="text-center text-[10px] font-bold text-red-500">
                        SUN
                    </div>

                    <div class="text-center text-[10px] font-bold text-slate-400">
                        MON
                    </div>

                    <div class="text-center text-[10px] font-bold text-slate-400">
                        TUE
                    </div>

                    <div class="text-center text-[10px] font-bold text-slate-400">
                        WED
                    </div>

                    <div class="text-center text-[10px] font-bold text-slate-400">
                        THU
                    </div>

                    <div class="text-center text-[10px] font-bold text-slate-400">
                        FRI
                    </div>

                    <div class="text-center text-[10px] font-bold text-slate-400">
                        SAT
                    </div>

                </div>



                <!-- Calendar Dates -->
                <div
                    id="calendarDates"
                    class="grid grid-cols-7 gap-1"
                ></div>



                <!-- Legend -->
                <div class="mt-5 pt-4 border-t border-slate-100 space-y-2">


                    <!-- Past Appointment -->
                    <div class="flex items-center gap-2 text-xs text-slate-500">

                        <span class="w-3 h-3 rounded bg-red-600"></span>

                        Past Appointment

                    </div>


                    <!-- Upcoming Appointment -->
                    <div class="flex items-center gap-2 text-xs text-slate-500">

                        <span class="w-3 h-3 rounded bg-green-600"></span>

                        Today / Upcoming Appointment

                    </div>


                    <!-- Previous Date -->
                    <div class="flex items-center gap-2 text-xs text-slate-500">

                        <span class="w-3 h-3 rounded bg-red-50 border border-red-200"></span>

                        Previous Date

                    </div>


                    <!-- Available Date -->
                    <div class="flex items-center gap-2 text-xs text-slate-500">

                        <span class="w-3 h-3 rounded bg-green-50 border border-green-200"></span>

                        Available Date

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- =========================================
         APPOINTMENT HISTORY
    ========================================== -->

    <section class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">


        <div class="px-6 py-5 border-b border-slate-100">

            <h3 class="text-lg font-bold text-slate-800">
                Appointment History
            </h3>

            <p class="text-sm text-slate-500 mt-1">
                Your previous and current appointments
            </p>

        </div>



        <!-- Desktop Table -->
        <div class="hidden md:block overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-200">

                <tr>

                    <th class="text-left px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">
                        Ticket
                    </th>

                    <th class="text-left px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">
                        Department
                    </th>

                    <th class="text-left px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">
                        Date
                    </th>

                    <th class="text-left px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">
                        Status
                    </th>

                    <th class="text-center px-6 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">
                        Action
                    </th>

                </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">


                @forelse($appointments as $appointment)

                    @php

                        $historyDate = \Carbon\Carbon::parse(
                            $appointment->appointment_date
                        );

                    @endphp


                    <tr class="hover:bg-slate-50 transition">


                        <!-- Ticket -->
                        <td class="px-6 py-4">

                            <a
                                href="{{ route('patient.appointment.show', $appointment->id) }}"
                                class="font-bold text-teal-700 hover:text-teal-800"
                            >

                                {{ $appointment->ticket_number }}

                            </a>

                        </td>


                        <!-- Department -->
                        <td class="px-6 py-4">

                                    <span class="text-sm font-medium text-slate-700">

                                        {{ $appointment->department->name ?? 'N/A' }}

                                    </span>

                        </td>


                        <!-- Date -->
                        <td class="px-6 py-4">

                            <div class="font-semibold text-slate-700">

                                {{ $historyDate->format('d M Y') }}

                            </div>

                            <div class="text-xs text-slate-500 mt-1">

                                {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}

                                -

                                {{ \Carbon\Carbon::parse($appointment->end_time)->format('h:i A') }}

                            </div>

                        </td>


                        <!-- Status -->
                        <td class="px-6 py-4">


                            @if($appointment->status === 'pending')

                                <span class="inline-flex px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold">
                                            Pending
                                        </span>


                            @elseif($appointment->status === 'confirmed')

                                <span class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">
                                            Confirmed
                                        </span>


                            @elseif($appointment->status === 'completed')

                                <span class="inline-flex px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold">
                                            Completed
                                        </span>


                            @elseif($appointment->status === 'cancelled')

                                <span class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-bold">
                                            Cancelled
                                        </span>


                            @else

                                <span class="inline-flex px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-bold">

                                            {{ ucfirst($appointment->status) }}

                                        </span>

                            @endif

                        </td>


                        <!-- Action -->
                        <td class="px-6 py-4 text-center">

                            <a
                                href="{{ route('patient.appointment.show', $appointment->id) }}"
                                title="View Appointment"
                                class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-teal-50 text-teal-700 hover:bg-teal-600 hover:text-white transition"
                            >

                                <i class="fa-solid fa-eye text-sm"></i>

                            </a>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="5" class="px-6 py-12 text-center">

                            <div class="text-slate-400">

                                <i class="fa-regular fa-calendar-xmark text-4xl"></i>

                                <p class="mt-3 text-slate-600 font-semibold">
                                    No appointments found
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>



        <!-- Mobile History -->
        <div class="md:hidden divide-y divide-slate-100">


            @forelse($appointments as $appointment)

                @php

                    $historyDate = \Carbon\Carbon::parse(
                        $appointment->appointment_date
                    );

                @endphp


                <div class="p-5">


                    <div class="flex items-center justify-between gap-3">

                        <a
                            href="{{ route('patient.appointment.show', $appointment->id) }}"
                            class="font-bold text-teal-700"
                        >

                            {{ $appointment->ticket_number }}

                        </a>


                        <a
                            href="{{ route('patient.appointment.show', $appointment->id) }}"
                            class="w-9 h-9 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center"
                        >

                            <i class="fa-solid fa-eye text-sm"></i>

                        </a>

                    </div>


                    <div class="mt-3">

                        <p class="font-medium text-slate-700">
                            {{ $appointment->department->name ?? 'N/A' }}
                        </p>


                        <p class="text-sm text-slate-500 mt-1">

                            {{ $historyDate->format('d M Y') }}

                            ·

                            {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}

                            -

                            {{ \Carbon\Carbon::parse($appointment->end_time)->format('h:i A') }}

                        </p>

                    </div>


                    <div class="mt-3">


                        @if($appointment->status === 'pending')

                            <span class="inline-flex px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold">
                                    Pending
                                </span>


                        @elseif($appointment->status === 'confirmed')

                            <span class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">
                                    Confirmed
                                </span>


                        @elseif($appointment->status === 'completed')

                            <span class="inline-flex px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold">
                                    Completed
                                </span>


                        @elseif($appointment->status === 'cancelled')

                            <span class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-bold">
                                    Cancelled
                                </span>


                        @else

                            <span class="inline-flex px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-bold">

                                    {{ ucfirst($appointment->status) }}

                                </span>

                        @endif

                    </div>

                </div>


            @empty

                <div class="p-10 text-center text-slate-500">
                    No appointments found.
                </div>

            @endforelse

        </div>

    </section>



    <!-- =========================================
         PATIENT INFORMATION
    ========================================== -->

    <section class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">


        <!-- Patient Information -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">


            <div class="px-6 py-5 border-b border-slate-100">

                <h3 class="text-lg font-bold text-slate-800">
                    Patient Information
                </h3>

            </div>


            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-5">


                <div>

                    <p class="text-xs text-slate-500 uppercase tracking-wide">
                        Patient Code
                    </p>

                    <p class="font-semibold mt-1">
                        {{ $patient->patient_code }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-500 uppercase tracking-wide">
                        Phone
                    </p>

                    <p class="font-semibold mt-1">
                        {{ $patient->phone }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-500 uppercase tracking-wide">
                        Email
                    </p>

                    <p class="font-semibold mt-1 break-all">
                        {{ $patient->user->email ?? 'N/A' }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-500 uppercase tracking-wide">
                        Date of Birth
                    </p>

                    <p class="font-semibold mt-1">

                        {{ $patient->date_of_birth
                            ? \Carbon\Carbon::parse($patient->date_of_birth)->format('d M Y')
                            : 'N/A'
                        }}

                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-500 uppercase tracking-wide">
                        Age
                    </p>

                    <p class="font-semibold mt-1">
                        {{ $patient->age ?? 'N/A' }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-500 uppercase tracking-wide">
                        Gender
                    </p>

                    <p class="font-semibold mt-1 capitalize">
                        {{ $patient->gender ?? 'N/A' }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-500 uppercase tracking-wide">
                        NID Number
                    </p>

                    <p class="font-semibold mt-1">
                        {{ $patient->nid_number ?? 'N/A' }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-500 uppercase tracking-wide">
                        Address
                    </p>

                    <p class="font-semibold mt-1">
                        {{ $patient->address ?? 'N/A' }}
                    </p>

                </div>

            </div>

        </div>



        <!-- Patient Status -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <div class="flex items-center gap-3 mb-5">

                <div class="w-11 h-11 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">

                    <i class="fa-solid fa-user-check"></i>

                </div>


                <div>

                    <h3 class="font-bold text-slate-800">
                        Patient Account
                    </h3>

                    <p class="text-xs text-slate-500">
                        Account information
                    </p>

                </div>

            </div>


            <div class="space-y-4">


                <div class="flex items-center justify-between">

                        <span class="text-sm text-slate-500">
                            Status
                        </span>


                    @if($patient->status)

                        <span class="text-sm font-bold text-green-600">
                                Active
                            </span>

                    @else

                        <span class="text-sm font-bold text-red-600">
                                Inactive
                            </span>

                    @endif

                </div>


                <div class="flex items-center justify-between">

                        <span class="text-sm text-slate-500">
                            Patient ID
                        </span>

                    <span class="text-sm font-semibold text-slate-700">
                            {{ $patient->patient_code }}
                        </span>

                </div>

            </div>

        </div>

    </section>

@endsection
