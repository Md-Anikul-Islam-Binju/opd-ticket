@extends('patient.index')

@section('content')

    <div class="min-h-screen bg-[#f4f7fb] py-8 sm:py-10">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="max-w-xl mx-auto">


                {{-- =====================================================
                     PAGE HEADER
                ====================================================== --}}

                <div class="text-center mb-6">

                    <h1 class="text-2xl sm:text-[27px]
                           font-bold
                           text-gray-800">

                        Online Payment

                    </h1>

                    <p class="text-sm sm:text-base
                          text-gray-500
                          mt-1">

                        Complete your payment securely.

                    </p>

                </div>



                {{-- =====================================================
                     ERROR MESSAGE
                ====================================================== --}}

                @if(session('error'))

                    <div class="mb-5
                            rounded-xl
                            border border-red-200
                            bg-red-50
                            px-4 py-3
                            text-sm
                            text-red-700">

                        <div class="flex items-start gap-2">

                            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>

                            <span>
                            {{ session('error') }}
                        </span>

                        </div>

                    </div>

                @endif



                {{-- =====================================================
                     PAYMENT CARD
                ====================================================== --}}

                <div class="bg-white
                        rounded-[18px]
                        border border-gray-200
                        shadow-[0_8px_30px_rgba(0,0,0,0.05)]
                        overflow-hidden">

                    <div class="p-5 sm:p-6">


                        {{-- =================================================
                             TOTAL PAYABLE
                        ================================================== --}}

                        <div class="text-center mb-6">

                            <div class="text-sm text-gray-500">
                                Total Payable
                            </div>

                            <div class="text-3xl sm:text-[32px]
                                    font-bold
                                    text-blue-600
                                    mt-1">

                                ৳ {{ number_format(
                                $appointment->payment->amount ?? 0,
                                2
                            ) }}

                            </div>

                        </div>



                        {{-- =================================================
                             DEMO PAYMENT INFORMATION
                        ================================================== --}}

                        <div class="bg-[#fff8e1]
                                border border-[#ffe082]
                                rounded-xl
                                p-4
                                mb-6">

                            <div class="flex items-center gap-2
                                    font-bold
                                    text-gray-800
                                    mb-1">

                                <i class="fa-solid fa-credit-card text-amber-600"></i>

                                Demo Payment

                            </div>

                            <div class="text-xs text-gray-500 mb-2">

                                Use this test card:

                            </div>

                            <div class="text-base sm:text-lg
                                    font-bold
                                    tracking-[2px]
                                    text-gray-800">

                                4242 4242 4242 4242

                            </div>

                            <div class="text-xs
                                    text-gray-500
                                    mt-2">

                                Any future expiry date and any 3-digit CVV.

                            </div>

                        </div>



                        {{-- =================================================
                             PAYMENT FORM
                        ================================================== --}}

                        <form
                            action="{{ route(
                            'patient.appointment.fake.payment.process',
                            $appointment->id
                        ) }}"
                            method="POST"
                        >

                            @csrf


                            {{-- =============================================
                                 CARD NUMBER
                            ============================================== --}}

                            <div class="mb-4">

                                <label
                                    for="card_number"
                                    class="block
                                       text-sm
                                       font-semibold
                                       text-gray-700
                                       mb-2"
                                >

                                    Card Number

                                </label>

                                <div class="relative">

                                    <i class="fa-regular fa-credit-card
                                          absolute
                                          left-3
                                          top-1/2
                                          -translate-y-1/2
                                          text-gray-400"></i>

                                    <input
                                        type="text"
                                        id="card_number"
                                        name="card_number"
                                        value="{{ old('card_number') }}"
                                        placeholder="4242 4242 4242 4242"
                                        maxlength="16"
                                        inputmode="numeric"
                                        autocomplete="cc-number"
                                        required
                                        class="w-full
                                           rounded-xl
                                           border
                                           border-gray-300
                                           bg-white
                                           py-3
                                           pl-10
                                           pr-4
                                           text-sm
                                           text-gray-800
                                           outline-none
                                           transition
                                           focus:border-blue-500
                                           focus:ring-4
                                           focus:ring-blue-100"
                                    >

                                </div>

                                @error('card_number')

                                <div class="text-sm
                                            text-red-600
                                            mt-1.5">

                                    {{ $message }}

                                </div>

                                @enderror

                            </div>



                            {{-- =============================================
                                 EXPIRY + CVV
                            ============================================== --}}

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">


                                {{-- Expiry --}}

                                <div>

                                    <label
                                        for="expiry"
                                        class="block
                                           text-sm
                                           font-semibold
                                           text-gray-700
                                           mb-2"
                                    >

                                        Expiry

                                    </label>

                                    <input
                                        type="text"
                                        id="expiry"
                                        name="expiry"
                                        value="{{ old('expiry') }}"
                                        placeholder="12/30"
                                        maxlength="5"
                                        inputmode="numeric"
                                        autocomplete="cc-exp"
                                        required
                                        class="w-full
                                           rounded-xl
                                           border
                                           border-gray-300
                                           bg-white
                                           px-4
                                           py-3
                                           text-sm
                                           text-gray-800
                                           outline-none
                                           transition
                                           focus:border-blue-500
                                           focus:ring-4
                                           focus:ring-blue-100"
                                    >

                                    @error('expiry')

                                    <div class="text-sm
                                                text-red-600
                                                mt-1.5">

                                        {{ $message }}

                                    </div>

                                    @enderror

                                </div>



                                {{-- CVV --}}

                                <div>

                                    <label
                                        for="cvv"
                                        class="block
                                           text-sm
                                           font-semibold
                                           text-gray-700
                                           mb-2"
                                    >

                                        CVV

                                    </label>

                                    <div class="relative">

                                        <i class="fa-solid fa-lock
                                              absolute
                                              left-3
                                              top-1/2
                                              -translate-y-1/2
                                              text-gray-400"></i>

                                        <input
                                            type="password"
                                            id="cvv"
                                            name="cvv"
                                            placeholder="123"
                                            maxlength="3"
                                            inputmode="numeric"
                                            autocomplete="cc-csc"
                                            required
                                            class="w-full
                                               rounded-xl
                                               border
                                               border-gray-300
                                               bg-white
                                               py-3
                                               pl-10
                                               pr-4
                                               text-sm
                                               text-gray-800
                                               outline-none
                                               transition
                                               focus:border-blue-500
                                               focus:ring-4
                                               focus:ring-blue-100"
                                        >

                                    </div>

                                    @error('cvv')

                                    <div class="text-sm
                                                text-red-600
                                                mt-1.5">

                                        {{ $message }}

                                    </div>

                                    @enderror

                                </div>


                            </div>



                            {{-- =================================================
                                 PAY BUTTON
                            ================================================== --}}

                            <button
                                type="submit"
                                class="w-full
                                   mt-2
                                   py-3
                                   rounded-xl
                                   bg-blue-600
                                   hover:bg-blue-700
                                   text-white
                                   font-bold
                                   text-base
                                   transition
                                   shadow-sm
                                   focus:outline-none
                                   focus:ring-4
                                   focus:ring-blue-200"
                            >

                                <i class="fa-solid fa-lock mr-2"></i>

                                Pay ৳ {{ number_format(
                                $appointment->payment->amount ?? 0,
                                2
                            ) }}

                            </button>



                            {{-- =================================================
                                 SECURITY TEXT
                            ================================================== --}}

                            <div class="flex items-center
                                    justify-center
                                    gap-1.5
                                    text-xs
                                    text-gray-500
                                    mt-3">

                                <i class="fa-solid fa-shield-halved"></i>

                                Secure payment

                            </div>


                        </form>


                        {{-- =================================================
                             BACK
                        ================================================== --}}

                        <div class="text-center mt-5 pt-4
                                border-t border-gray-100">

                            <a
                                href="{{ route(
                                'patient.appointment.show',
                                $appointment->id
                            ) }}"
                                class="inline-flex
                                   items-center
                                   text-sm
                                   font-medium
                                   text-blue-600
                                   hover:text-blue-700
                                   transition"
                            >

                                <i class="fa-solid fa-arrow-left mr-2"></i>

                                Back to Appointment

                            </a>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
