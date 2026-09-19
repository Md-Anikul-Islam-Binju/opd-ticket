@extends('patient.index')
@section('content')

    <div class="min-h-screen bg-[#f4f7fb] py-8 sm:py-10">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- ==========================================================
                 PAGE HEADER
            =========================================================== --}}

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

                <div>

                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                        Appointment Details
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        View your appointment and ticket information
                    </p>

                </div>


                {{-- Status --}}

                <div>

                    @if($appointment->status === 'pending')

                        <span class="inline-flex items-center px-3.5 py-1.5 rounded-full
                                 text-xs font-semibold bg-yellow-100 text-yellow-800">
                        Pending
                    </span>

                    @elseif($appointment->status === 'confirmed')

                        <span class="inline-flex items-center px-3.5 py-1.5 rounded-full
                                 text-xs font-semibold bg-green-100 text-green-800">
                        Confirmed
                    </span>

                    @elseif($appointment->status === 'cancelled')

                        <span class="inline-flex items-center px-3.5 py-1.5 rounded-full
                                 text-xs font-semibold bg-red-100 text-red-800">
                        Cancelled
                    </span>

                    @elseif($appointment->status === 'completed')

                        <span class="inline-flex items-center px-3.5 py-1.5 rounded-full
                                 text-xs font-semibold bg-cyan-100 text-cyan-800">
                        Completed
                    </span>

                    @elseif($appointment->status === 'no_show')

                        <span class="inline-flex items-center px-3.5 py-1.5 rounded-full
                                 text-xs font-semibold bg-gray-200 text-gray-700">
                        No Show
                    </span>

                    @endif

                </div>

            </div>



            {{-- ==========================================================
                 APPOINTMENT CARD
            =========================================================== --}}

            <div class="bg-white rounded-[18px] border border-gray-200
                    shadow-[0_8px_30px_rgba(0,0,0,0.05)] overflow-hidden">


                {{-- ======================================================
                     HEADER
                ======================================================= --}}

                <div class="px-5 sm:px-6 py-6 bg-[#eef6ff] border-b border-[#dcecff]">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">

                        <div>

                            <div class="text-xs text-gray-500 mb-1">
                                Appointment Ticket
                            </div>

                            <div class="text-2xl sm:text-[25px] font-bold
                                    text-blue-600 tracking-wide">

                                {{ $appointment->ticket_number }}

                            </div>

                        </div>


                        <div class="md:text-right">

                            <div class="text-xs text-gray-500 mb-1">
                                Appointment Date
                            </div>

                            <div class="font-bold text-gray-800">

                                {{ $appointment->appointment_date->format('d M Y') }}

                            </div>

                        </div>

                    </div>

                </div>



                {{-- ======================================================
                     APPOINTMENT INFORMATION
                ======================================================= --}}

                <div class="p-5 sm:p-6">

                    <h2 class="text-lg font-bold text-gray-800 mb-5">
                        Appointment Information
                    </h2>


                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                        {{-- Department --}}

                        <div class="bg-gray-50 border border-gray-200
                                rounded-xl p-4">

                            <div class="text-xs text-gray-500 mb-1.5">
                                Department
                            </div>

                            <div class="text-[15px] font-semibold text-gray-800">

                                {{ $appointment->department->name ?? 'N/A' }}

                            </div>

                        </div>


                        {{-- Date --}}

                        <div class="bg-gray-50 border border-gray-200
                                rounded-xl p-4">

                            <div class="text-xs text-gray-500 mb-1.5">
                                Appointment Date
                            </div>

                            <div class="text-[22px] font-bold text-blue-600">

                                {{ $appointment->appointment_date->format('d M Y') }}

                            </div>

                        </div>


                        {{-- Time --}}

                        <div class="bg-gray-50 border border-gray-200
                                rounded-xl p-4">

                            <div class="text-xs text-gray-500 mb-1.5">
                                Time
                            </div>

                            <div class="text-base text-gray-600 mt-1">

                                {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}

                                -

                                {{ \Carbon\Carbon::parse($appointment->end_time)->format('h:i A') }}

                            </div>

                        </div>

                    </div>

                </div>



                {{-- ======================================================
                     DOCTOR INFORMATION
                ======================================================= --}}

                <div class="p-5 sm:p-6 border-t border-gray-200">

                    <h2 class="text-lg font-bold text-gray-800 mb-5">
                        Doctor Information
                    </h2>


                    <div class="flex items-center gap-4 p-4 sm:p-[18px]
                            bg-gray-50 border border-gray-200 rounded-[14px]">


                        {{-- Doctor Avatar --}}

                        <div class="w-[60px] h-[60px] shrink-0 rounded-full
                                bg-blue-100 flex items-center justify-center
                                text-blue-600 text-xl font-bold">

                            {{ strtoupper(
                                substr(
                                    $appointment->doctor->name ?? 'D',
                                    0,
                                    1
                                )
                            ) }}

                        </div>


                        {{-- Doctor Details --}}

                        <div>

                            <div class="text-[17px] font-bold text-gray-800">

                                Dr.
                                {{ $appointment->doctor->name ?? 'N/A' }}

                            </div>


                            <div class="text-[13px] text-gray-500 mt-1">

                                {{ $appointment->doctor->specialization ?? 'Medical Specialist' }}

                            </div>


                            @if($appointment->doctor->designation)

                                <div class="text-[13px] text-gray-500 mt-0.5">

                                    {{ $appointment->doctor->designation }}

                                </div>

                            @endif

                        </div>

                    </div>

                </div>



                {{-- ======================================================
                     PATIENT INFORMATION
                ======================================================= --}}

                <div class="p-5 sm:p-6 border-t border-gray-200">

                    <h2 class="text-lg font-bold text-gray-800 mb-5">
                        Patient Information
                    </h2>


                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                        {{-- Patient Name --}}

                        <div class="bg-gray-50 border border-gray-200
                                rounded-xl p-4">

                            <div class="text-xs text-gray-500 mb-1.5">
                                Patient Name
                            </div>

                            <div class="text-[15px] font-semibold text-gray-800">

                                {{ $appointment->patient->user->name ?? 'N/A' }}

                            </div>

                        </div>


                        {{-- Patient Code --}}

                        <div class="bg-gray-50 border border-gray-200
                                rounded-xl p-4">

                            <div class="text-xs text-gray-500 mb-1.5">
                                Patient Code
                            </div>

                            <div class="text-[15px] font-semibold text-gray-800">

                                {{ $appointment->patient->patient_code ?? 'N/A' }}

                            </div>

                        </div>


                        {{-- Phone --}}

                        <div class="bg-gray-50 border border-gray-200
                                rounded-xl p-4">

                            <div class="text-xs text-gray-500 mb-1.5">
                                Phone
                            </div>

                            <div class="text-[15px] font-semibold text-gray-800">

                                {{ $appointment->patient->phone ?? 'N/A' }}

                            </div>

                        </div>

                    </div>

                </div>



                {{-- ======================================================
                     NOTES
                ======================================================= --}}

                @if($appointment->notes)

                    <div class="p-5 sm:p-6 border-t border-gray-200">

                        <h2 class="text-lg font-bold text-gray-800 mb-5">
                            Patient Notes
                        </h2>


                        <div class="bg-[#fffdf5] border border-[#f5e6a8]
                                rounded-xl p-4 text-[#665b2d] text-sm">

                            {{ $appointment->notes }}

                        </div>

                    </div>

                @endif



                {{-- ======================================================
                     PAYMENT INFORMATION
                ======================================================= --}}

                <div class="p-5 sm:p-6 border-t border-gray-200">

                    <h2 class="text-lg font-bold text-gray-800 mb-5">
                        Payment Information
                    </h2>


                    <div class="bg-gray-50 border border-gray-200
                            rounded-xl p-4 sm:p-[18px]">


                        @if(!$appointment->payment)

                            {{-- Payment Not Created Yet --}}

                            <div class="flex flex-col sm:flex-row
                                    sm:items-center sm:justify-between
                                    gap-4">

                                <div>

                                    <div class="font-bold text-gray-800">
                                        Payment Pending
                                    </div>

                                    <div class="text-gray-500 text-sm mt-1">
                                        Please complete your appointment payment.
                                    </div>

                                </div>


                                <a
                                    href="{{ route(
                                    'patient.appointment.payment',
                                    $appointment->id
                                ) }}"
                                    class="inline-flex items-center justify-center
                                       px-5 py-2.5 rounded-[10px]
                                       bg-blue-600 hover:bg-blue-700
                                       text-white text-sm font-semibold
                                       transition"
                                >
                                    Proceed to Payment
                                </a>

                            </div>

                        @else

                            {{-- Payment Information --}}

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                                {{-- Status --}}

                                <div>

                                    <div class="text-xs text-gray-500 mb-1.5">
                                        Payment Status
                                    </div>

                                    <div class="text-[15px] font-semibold text-gray-800">

                                        {{ ucfirst(
                                            $appointment->payment->status
                                        ) }}

                                    </div>

                                </div>


                                {{-- Amount --}}

                                <div>

                                    <div class="text-xs text-gray-500 mb-1.5">
                                        Amount
                                    </div>

                                    <div class="text-[15px] font-semibold text-gray-800">

                                        ৳ {{ number_format(
                                        $appointment->payment->amount,
                                        2
                                    ) }}

                                    </div>

                                </div>


                                {{-- Payment Method --}}

                                <div>

                                    <div class="text-xs text-gray-500 mb-1.5">
                                        Payment Method
                                    </div>

                                    <div class="text-[15px] font-semibold text-gray-800">

                                        {{ $appointment->payment->payment_method
                                            ? ucfirst(
                                                $appointment->payment->payment_method
                                            )
                                            : 'Not Selected'
                                        }}

                                    </div>

                                </div>

                            </div>



                            {{-- ==================================================
                                 PENDING PAYMENT
                            =================================================== --}}

                            @if($appointment->payment->status === 'pending')

                                <div class="mt-5 flex justify-end">

                                    <a
                                        href="{{ route(
                                        'patient.appointment.payment',
                                        $appointment->id
                                    ) }}"
                                        class="inline-flex items-center justify-center
                                           px-5 py-2.5 rounded-[10px]
                                           bg-blue-600 hover:bg-blue-700
                                           text-white text-sm font-semibold
                                           transition"
                                    >
                                        Proceed to Payment
                                    </a>

                                </div>

                            @endif



                            {{-- ==================================================
                                 PAID PAYMENT
                            =================================================== --}}

                            @if($appointment->payment->status === 'paid')

                                <div class="mt-4 rounded-lg border border-green-200
                                        bg-green-50 px-4 py-3 text-green-700 text-sm">

                                    <div class="font-medium">
                                        Payment completed successfully.
                                    </div>


                                    @if($appointment->payment->paid_at)

                                        <div class="text-xs mt-1">

                                            Paid on:

                                            {{ $appointment->payment->paid_at->format(
                                                'd M Y, h:i A'
                                            ) }}

                                        </div>

                                    @endif

                                </div>

                            @endif

                        @endif

                    </div>

                </div>



                {{-- ======================================================
                     FOOTER ACTIONS
                ======================================================= --}}

                <div class="p-5 sm:p-6 border-t border-gray-200">

                    <div class="flex flex-col sm:flex-row
                            sm:items-center sm:justify-between
                            gap-3">


                        {{-- Back --}}

                        <a
                            href="{{ route('patient.dashboard') }}"
                            class="inline-flex items-center justify-center
                               px-5 py-2.5 rounded-[10px]
                               bg-gray-100 hover:bg-gray-200
                               text-gray-700 text-sm font-semibold
                               transition"
                        >
                            <i class="fa-solid fa-arrow-left mr-2"></i>
                            Back to Dashboard
                        </a>


                        {{-- Download Ticket --}}

                        <a
                            href="{{ route(
                            'patient.appointment.download-ticket',
                            $appointment->id
                        ) }}"
                            class="inline-flex items-center justify-center
                               px-5 py-2.5 rounded-[10px]
                               bg-blue-600 hover:bg-blue-700
                               text-white text-sm font-semibold
                               transition"
                        >
                            <i class="fa-solid fa-download mr-2"></i>
                            Download Ticket PDF
                        </a>

                    </div>

                </div>


            </div>

        </div>

    </div>

@endsection
