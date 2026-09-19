@extends('patient.index')

@section('content')

    <div class="min-h-screen bg-[#f4f7fb] py-8 sm:py-10">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto">

                {{-- =====================================================
                     MAIN CARD
                ====================================================== --}}

                <div class="bg-white rounded-[20px]
                        border border-gray-200
                        shadow-[0_10px_35px_rgba(0,0,0,0.07)]
                        overflow-hidden">

                    <div class="p-6 sm:p-10 text-center">


                        {{-- =================================================
                             SUCCESS ICON
                        ================================================== --}}

                        <div class="w-[70px] h-[70px]
                                mx-auto mb-5
                                rounded-full
                                bg-green-100
                                text-green-600
                                flex items-center justify-center
                                text-3xl
                                font-bold">

                            <i class="fa-solid fa-check"></i>

                        </div>


                        {{-- =================================================
                             TITLE
                        ================================================== --}}

                        <h1 class="text-2xl sm:text-[27px]
                               font-bold
                               text-gray-800
                               mb-3">

                            Manual Payment Selected

                        </h1>


                        {{-- =================================================
                             MESSAGE
                        ================================================== --}}

                        <p class="text-sm sm:text-base
                              text-gray-500
                              leading-7
                              mb-6">

                            Your appointment has been successfully reserved.

                            Please visit the hospital and complete your payment
                            at the designated payment counter.

                        </p>


                        {{-- =================================================
                             TICKET
                        ================================================== --}}

                        <div class="bg-[#eef6ff]
                                border border-[#cfe2ff]
                                rounded-xl
                                p-4 sm:p-5
                                mb-6
                                text-left">

                            <div class="text-xs text-gray-500">
                                Appointment Ticket
                            </div>

                            <div class="text-xl sm:text-2xl
                                    font-bold
                                    text-blue-600
                                    tracking-wide
                                    mt-1">

                                {{ $appointment->ticket_number }}

                            </div>

                        </div>


                        {{-- =================================================
                             DOCTOR + FEE
                        ================================================== --}}

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">


                            {{-- Doctor --}}

                            <div class="border border-gray-200
                                    rounded-xl
                                    p-4
                                    text-left">

                                <div class="text-xs text-gray-500 mb-1">
                                    Doctor
                                </div>

                                <div class="text-sm sm:text-[15px]
                                        font-bold
                                        text-gray-800">

                                    Dr.
                                    {{ $appointment->doctor->name ?? 'N/A' }}

                                </div>

                            </div>


                            {{-- Ticket Fee --}}

                            <div class="border border-gray-200
                                    rounded-xl
                                    p-4
                                    text-left">

                                <div class="text-xs text-gray-500 mb-1">
                                    Ticket Fee
                                </div>

                                <div class="text-xl
                                        font-bold
                                        text-blue-600">

                                    ৳ {{ number_format(
                                    $appointment->payment->amount ?? 0,
                                    2
                                ) }}

                                </div>

                            </div>


                        </div>


                        {{-- =================================================
                             IMPORTANT NOTICE
                        ================================================== --}}

                        <div class="bg-[#fff8e1]
                                border border-[#ffe082]
                                rounded-xl
                                p-4
                                text-left
                                text-sm
                                text-[#665b2d]
                                leading-6
                                mb-6">

                            <div class="font-bold mb-2">
                                <i class="fa-solid fa-circle-exclamation mr-1"></i>
                                Important
                            </div>


                            <div>

                                Hospital-এ গিয়ে payment করার পর
                                আপনার appointment ticket-এ
                                payment-এর একটি official
                                <strong>seal</strong> দেওয়া হবে।

                            </div>


                            <div class="mt-3">

                                Hospital থেকে payment confirmation
                                না পাওয়া পর্যন্ত আপনার payment status
                                <strong>Pending</strong> থাকবে।

                            </div>

                        </div>


                        {{-- =================================================
                             ACTION BUTTONS
                        ================================================== --}}

                        <div class="flex flex-col sm:flex-row
                                items-center
                                justify-center
                                gap-3">

                            <a
                                href="{{ route(
                                'patient.appointment.show',
                                $appointment->id
                            ) }}"
                                class="w-full sm:w-auto
                                   inline-flex
                                   items-center
                                   justify-center
                                   px-5 py-2.5
                                   rounded-xl
                                   bg-blue-600
                                   hover:bg-blue-700
                                   text-white
                                   text-sm
                                   font-semibold
                                   transition
                                   shadow-sm"
                            >

                                <i class="fa-solid fa-calendar-check mr-2"></i>

                                View Appointment

                            </a>


                            <a
                                href="{{ route('patient.dashboard') }}"
                                class="w-full sm:w-auto
                                   inline-flex
                                   items-center
                                   justify-center
                                   px-5 py-2.5
                                   rounded-xl
                                   border border-gray-300
                                   bg-white
                                   hover:bg-gray-50
                                   text-gray-700
                                   text-sm
                                   font-semibold
                                   transition"
                            >

                                <i class="fa-solid fa-gauge mr-2"></i>

                                Dashboard

                            </a>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
