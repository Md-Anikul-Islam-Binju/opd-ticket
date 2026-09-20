{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}

{{--    <meta charset="UTF-8">--}}

{{--    <meta--}}
{{--        name="viewport"--}}
{{--        content="width=device-width, initial-scale=1.0"--}}
{{--    >--}}

{{--    <title>--}}
{{--        Appointment Payment--}}
{{--    </title>--}}

{{--    <link--}}
{{--        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"--}}
{{--        rel="stylesheet"--}}
{{--    >--}}

{{--    <style>--}}

{{--        body {--}}
{{--            background: #f4f7fb;--}}
{{--            font-family: Arial, sans-serif;--}}
{{--        }--}}

{{--        .navbar-brand {--}}
{{--            font-weight: 700;--}}
{{--        }--}}

{{--        .page-title {--}}
{{--            font-size: 28px;--}}
{{--            font-weight: 700;--}}
{{--            color: #212529;--}}
{{--        }--}}

{{--        .page-subtitle {--}}
{{--            color: #6c757d;--}}
{{--        }--}}

{{--        .payment-card {--}}
{{--            background: #fff;--}}
{{--            border: 0;--}}
{{--            border-radius: 14px;--}}
{{--            box-shadow: 0 8px 30px rgba(0,0,0,.06);--}}
{{--        }--}}

{{--        .card-title {--}}
{{--            font-size: 18px;--}}
{{--            font-weight: 700;--}}
{{--        }--}}

{{--        .info-box {--}}
{{--            background: #f8fafc;--}}
{{--            border: 1px solid #e9ecef;--}}
{{--            border-radius: 10px;--}}
{{--            padding: 15px;--}}
{{--            height: 100%;--}}
{{--        }--}}

{{--        .info-label {--}}
{{--            font-size: 12px;--}}
{{--            color: #6c757d;--}}
{{--            margin-bottom: 5px;--}}
{{--        }--}}

{{--        .info-value {--}}
{{--            font-size: 15px;--}}
{{--            font-weight: 600;--}}
{{--            color: #212529;--}}
{{--        }--}}

{{--        .ticket-box {--}}
{{--            background: #eef6ff;--}}
{{--            border: 1px solid #cfe2ff;--}}
{{--            border-radius: 12px;--}}
{{--            padding: 18px;--}}
{{--        }--}}

{{--        .ticket-label {--}}
{{--            font-size: 12px;--}}
{{--            color: #6c757d;--}}
{{--        }--}}

{{--        .ticket-number {--}}
{{--            font-size: 22px;--}}
{{--            font-weight: 700;--}}
{{--            color: #0d6efd;--}}
{{--        }--}}

{{--        .amount-box {--}}
{{--            background: #f8f9fa;--}}
{{--            border-radius: 12px;--}}
{{--            padding: 20px;--}}
{{--        }--}}

{{--        .amount-label {--}}
{{--            color: #6c757d;--}}
{{--            font-size: 13px;--}}
{{--        }--}}

{{--        .amount {--}}
{{--            font-size: 30px;--}}
{{--            font-weight: 700;--}}
{{--            color: #0d6efd;--}}
{{--        }--}}

{{--        .payment-option {--}}
{{--            border: 1px solid #dee2e6;--}}
{{--            border-radius: 12px;--}}
{{--            padding: 15px;--}}
{{--            cursor: pointer;--}}
{{--            transition: .2s;--}}
{{--        }--}}

{{--        .payment-option:hover {--}}
{{--            border-color: #0d6efd;--}}
{{--            background: #f8fbff;--}}
{{--        }--}}

{{--        .payment-option input {--}}
{{--            margin-right: 10px;--}}
{{--        }--}}

{{--        .payment-option-title {--}}
{{--            font-weight: 700;--}}
{{--        }--}}

{{--        .payment-option-description {--}}
{{--            color: #6c757d;--}}
{{--            font-size: 12px;--}}
{{--            margin-left: 25px;--}}
{{--            margin-top: 3px;--}}
{{--        }--}}

{{--        .pay-btn {--}}
{{--            width: 100%;--}}
{{--            padding: 13px;--}}
{{--            border-radius: 10px;--}}
{{--            font-weight: 700;--}}
{{--            font-size: 16px;--}}
{{--        }--}}

{{--        .secure-text {--}}
{{--            font-size: 12px;--}}
{{--            color: #6c757d;--}}
{{--            text-align: center;--}}
{{--            margin-top: 12px;--}}
{{--        }--}}

{{--    </style>--}}

{{--</head>--}}


{{--<body>--}}


{{-- =========================================================--}}
{{--     NAVBAR--}}
{{--========================================================= --}}

{{--<nav class="navbar navbar-expand-lg bg-dark navbar-dark">--}}

{{--    <div class="container">--}}

{{--        <a--}}
{{--            class="navbar-brand"--}}
{{--            href="{{ route('patient.dashboard') }}"--}}
{{--        >--}}
{{--            OPD Appointment--}}
{{--        </a>--}}


{{--        <a--}}
{{--            href="{{ route('patient.dashboard') }}"--}}
{{--            class="btn btn-outline-light btn-sm"--}}
{{--        >--}}
{{--            Dashboard--}}
{{--        </a>--}}

{{--    </div>--}}

{{--</nav>--}}



{{--<div class="container py-5">--}}


{{--    --}}{{-- =========================================================--}}
{{--         PAGE HEADER--}}
{{--    ========================================================== --}}

{{--    <div class="mb-4">--}}

{{--        <div class="page-title">--}}
{{--            Appointment Payment--}}
{{--        </div>--}}

{{--        <div class="page-subtitle">--}}
{{--            Complete your payment to confirm your appointment.--}}
{{--        </div>--}}

{{--    </div>--}}



{{--    <div class="row g-4">--}}


{{--        --}}{{-- =====================================================--}}
{{--             LEFT SIDE--}}
{{--        ====================================================== --}}

{{--        <div class="col-lg-7">--}}


{{--            --}}{{-- ================================================--}}
{{--                 APPOINTMENT--}}
{{--            ================================================= --}}

{{--            <div class="card payment-card mb-4">--}}

{{--                <div class="card-body p-4">--}}

{{--                    <div class="card-title mb-3">--}}
{{--                        Appointment Details--}}
{{--                    </div>--}}


{{--                    <div class="ticket-box mb-3">--}}

{{--                        <div class="ticket-label">--}}
{{--                            Appointment Ticket--}}
{{--                        </div>--}}

{{--                        <div class="ticket-number">--}}
{{--                            {{ $appointment->ticket_number }}--}}
{{--                        </div>--}}

{{--                    </div>--}}


{{--                    <div class="row g-3">--}}


{{--                        <div class="col-md-6">--}}

{{--                            <div class="info-box">--}}

{{--                                <div class="info-label">--}}
{{--                                    Patient--}}
{{--                                </div>--}}

{{--                                <div class="info-value">--}}

{{--                                    {{ $appointment->patient->user->name ?? 'N/A' }}--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}



{{--                        <div class="col-md-6">--}}

{{--                            <div class="info-box">--}}

{{--                                <div class="info-label">--}}
{{--                                    Patient Code--}}
{{--                                </div>--}}

{{--                                <div class="info-value">--}}

{{--                                    {{ $appointment->patient->patient_code ?? 'N/A' }}--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}



{{--                        <div class="col-md-6">--}}

{{--                            <div class="info-box">--}}

{{--                                <div class="info-label">--}}
{{--                                    Doctor--}}
{{--                                </div>--}}

{{--                                <div class="info-value">--}}

{{--                                    Dr.--}}
{{--                                    {{ $appointment->doctor->name ?? 'N/A' }}--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}



{{--                        <div class="col-md-6">--}}

{{--                            <div class="info-box">--}}

{{--                                <div class="info-label">--}}
{{--                                    Department--}}
{{--                                </div>--}}

{{--                                <div class="info-value">--}}

{{--                                    {{ $appointment->department->name ?? 'N/A' }}--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}



{{--                        <div class="col-md-6">--}}

{{--                            <div class="info-box">--}}

{{--                                <div class="info-label">--}}
{{--                                    Appointment Date--}}
{{--                                </div>--}}

{{--                                <div class="info-value">--}}

{{--                                    {{ $appointment->appointment_date?->format('d M Y') }}--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}



{{--                        <div class="col-md-6">--}}

{{--                            <div class="info-box">--}}

{{--                                <div class="info-label">--}}
{{--                                    Appointment Time--}}
{{--                                </div>--}}

{{--                                <div class="info-value">--}}

{{--                                    {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}--}}

{{--                                    ---}}

{{--                                    {{ \Carbon\Carbon::parse($appointment->end_time)->format('h:i A') }}--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}


{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}



{{--            --}}{{-- ================================================--}}
{{--                 PAYMENT METHOD--}}
{{--            ================================================= --}}

{{--            <div class="card payment-card">--}}

{{--                <div class="card-body p-4">--}}

{{--                    <div class="card-title mb-3">--}}
{{--                        Select Payment Method--}}
{{--                    </div>--}}


{{--                    <form--}}
{{--                        action="#"--}}
{{--                        method="POST"--}}
{{--                    >--}}

{{--                        @csrf--}}


{{--                        --}}{{-- ONLINE PAYMENT --}}

{{--                        <label--}}
{{--                            class="payment-option d-block mb-3"--}}
{{--                        >--}}

{{--                            <input--}}
{{--                                type="radio"--}}
{{--                                name="payment_method"--}}
{{--                                value="online"--}}
{{--                                checked--}}
{{--                            >--}}

{{--                            <span class="payment-option-title">--}}
{{--                                Online Payment--}}
{{--                            </span>--}}

{{--                            <div class="payment-option-description">--}}

{{--                                Pay securely using your available online--}}
{{--                                payment gateway.--}}

{{--                            </div>--}}

{{--                        </label>--}}



{{--                        --}}{{-- MANUAL PAYMENT --}}

{{--                        <label--}}
{{--                            class="payment-option d-block"--}}
{{--                        >--}}

{{--                            <input--}}
{{--                                type="radio"--}}
{{--                                name="payment_method"--}}
{{--                                value="manual"--}}
{{--                            >--}}

{{--                            <span class="payment-option-title">--}}
{{--                                Manual Payment--}}
{{--                            </span>--}}

{{--                            <div class="payment-option-description">--}}

{{--                                Submit payment manually according to--}}
{{--                                hospital instructions.--}}

{{--                            </div>--}}

{{--                        </label>--}}


{{--                    </form>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}



{{--        --}}{{-- =====================================================--}}
{{--             RIGHT SIDE--}}
{{--        ====================================================== --}}

{{--        <div class="col-lg-5">--}}


{{--            <div class="card payment-card">--}}

{{--                <div class="card-body p-4">--}}


{{--                    <div class="card-title mb-4">--}}
{{--                        Payment Summary--}}
{{--                    </div>--}}


{{--                    --}}{{-- Appointment Fee --}}

{{--                    <div class="d-flex justify-content-between mb-3">--}}

{{--                        <span class="text-muted">--}}
{{--                            Appointment Fee--}}
{{--                        </span>--}}

{{--                        <strong>--}}
{{--                            ৳ {{ number_format($appointment->payment->amount ?? 0, 2) }}--}}
{{--                        </strong>--}}

{{--                    </div>--}}


{{--                    <hr>--}}


{{--                    --}}{{-- Total --}}

{{--                    <div class="amount-box mt-3 mb-4">--}}

{{--                        <div class="amount-label">--}}
{{--                            Total Payable--}}
{{--                        </div>--}}

{{--                        <div class="amount">--}}

{{--                            ৳ {{ number_format($appointment->payment->amount ?? 0, 2) }}--}}

{{--                        </div>--}}

{{--                    </div>--}}


{{--                    --}}{{-- PAY BUTTON --}}

{{--                    <button--}}
{{--                        type="button"--}}
{{--                        class="btn btn-primary pay-btn"--}}
{{--                        onclick="submitPayment()"--}}
{{--                    >--}}
{{--                        Pay Now--}}
{{--                    </button>--}}


{{--                    <div class="secure-text">--}}

{{--                        🔒 Your payment information is protected.--}}

{{--                    </div>--}}


{{--                    <div class="text-center mt-3">--}}

{{--                        <a--}}
{{--                            href="{{ route('patient.appointment.show', $appointment->id) }}"--}}
{{--                            class="text-decoration-none"--}}
{{--                        >--}}
{{--                            ← Back to Appointment--}}

{{--                        </a>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}


{{--        </div>--}}


{{--    </div>--}}

{{--</div>--}}



{{--<script>--}}

{{--    function submitPayment()--}}
{{--    {--}}
{{--        const method =--}}
{{--            document.querySelector(--}}
{{--                'input[name="payment_method"]:checked'--}}
{{--            ).value;--}}

{{--        if (method === 'online') {--}}

{{--            /*--}}
{{--             * এখানে আপনার online payment gateway--}}
{{--             * integration route দিতে হবে।--}}
{{--             */--}}

{{--            alert('Online payment gateway will open here.');--}}

{{--        } else {--}}

{{--            /*--}}
{{--             * Manual payment route এখানে দিতে হবে।--}}
{{--             */--}}

{{--            alert('Manual payment instructions will open here.');--}}

{{--        }--}}
{{--    }--}}

{{--</script>--}}


{{--</body>--}}

{{--</html>--}}


    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Appointment Payment
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #212529;
        }

        .page-subtitle {
            color: #6c757d;
        }

        .payment-card {
            background: #fff;
            border: 0;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .06);
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            height: 100%;
        }

        .info-label {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 15px;
            font-weight: 600;
            color: #212529;
        }

        .ticket-box {
            background: #eef6ff;
            border: 1px solid #cfe2ff;
            border-radius: 12px;
            padding: 18px;
        }

        .ticket-label {
            font-size: 12px;
            color: #6c757d;
        }

        .ticket-number {
            font-size: 22px;
            font-weight: 700;
            color: #0d6efd;
        }

        .amount-box {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
        }

        .amount-label {
            color: #6c757d;
            font-size: 13px;
        }

        .amount {
            font-size: 30px;
            font-weight: 700;
            color: #0d6efd;
        }

        .payment-option {
            border: 1px solid #dee2e6;
            border-radius: 12px;
            padding: 15px;
            cursor: pointer;
            transition: .2s;
        }

        .payment-option:hover {
            border-color: #0d6efd;
            background: #f8fbff;
        }

        .payment-option input {
            margin-right: 10px;
        }

        .payment-option-title {
            font-weight: 700;
        }

        .payment-option-description {
            color: #6c757d;
            font-size: 12px;
            margin-left: 25px;
            margin-top: 3px;
        }

        .pay-btn {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
        }

        .secure-text {
            font-size: 12px;
            color: #6c757d;
            text-align: center;
            margin-top: 12px;
        }

        .payment-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-paid {
            background: #d1e7dd;
            color: #0f5132;
        }

        .status-failed {
            background: #f8d7da;
            color: #842029;
        }

        .status-refunded {
            background: #e2e3e5;
            color: #41464b;
        }

        .error-box {
            background: #f8d7da;
            border: 1px solid #f5c2c7;
            color: #842029;
            border-radius: 10px;
            padding: 14px 16px;
        }

        @media (max-width: 767px) {

            .page-title {
                font-size: 23px;
            }

            .amount {
                font-size: 26px;
            }

        }

    </style>

</head>


<body>


{{-- =========================================================
     NAVBAR
========================================================= --}}

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">

    <div class="container">

        <a
            class="navbar-brand"
            href="{{ route('patient.dashboard') }}"
        >
            OPD Appointment
        </a>


        <a
            href="{{ route('patient.dashboard') }}"
            class="btn btn-outline-light btn-sm"
        >
            Dashboard
        </a>

    </div>

</nav>



{{-- =========================================================
     MAIN
========================================================= --}}

<div class="container py-5">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="mb-4">

        <div class="page-title">
            Appointment Payment
        </div>

        <div class="page-subtitle mt-1">
            Complete your payment to confirm your appointment.
        </div>

    </div>



    {{-- =====================================================
         ERROR MESSAGE
    ====================================================== --}}

    @if(session('error'))

        <div class="error-box mb-4">

            {{ session('error') }}

        </div>

    @endif



    {{-- =====================================================
         VALIDATION ERRORS
    ====================================================== --}}

    @if($errors->any())

        <div class="error-box mb-4">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    <div class="row g-4">


        {{-- =================================================
             LEFT SIDE
        ================================================== --}}

        <div class="col-lg-7">


            {{-- =============================================
                 APPOINTMENT DETAILS
            ============================================== --}}

            <div class="card payment-card mb-4">

                <div class="card-body p-4">

                    <div class="card-title mb-3">
                        Appointment Details
                    </div>


                    {{-- Ticket --}}

                    <div class="ticket-box mb-3">

                        <div class="ticket-label">
                            Appointment Ticket
                        </div>

                        <div class="ticket-number">
                            {{ $appointment->ticket_number }}
                        </div>

                    </div>



                    <div class="row g-3">


                        {{-- Patient --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Patient
                                </div>

                                <div class="info-value">

                                    {{ $appointment->patient->user->name ?? 'N/A' }}

                                </div>

                            </div>

                        </div>



                        {{-- Patient Code --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Patient Code
                                </div>

                                <div class="info-value">

                                    {{ $appointment->patient->patient_code ?? 'N/A' }}

                                </div>

                            </div>

                        </div>



                        {{-- Doctor --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Doctor
                                </div>

                                <div class="info-value">

                                    Dr.
                                    {{ $appointment->doctor->name ?? 'N/A' }}

                                </div>

                            </div>

                        </div>



                        {{-- Department --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Department
                                </div>

                                <div class="info-value">

                                    {{ $appointment->department->name ?? 'N/A' }}

                                </div>

                            </div>

                        </div>



                        {{-- Appointment Date --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Appointment Date
                                </div>

                                <div class="info-value">

                                    {{ $appointment->appointment_date?->format('d M Y') }}

                                </div>

                            </div>

                        </div>



                        {{-- Appointment Time --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Appointment Time
                                </div>

                                <div class="info-value">

                                    {{ \Carbon\Carbon::parse(
                                        $appointment->start_time
                                    )->format('h:i A') }}

                                    -

                                    {{ \Carbon\Carbon::parse(
                                        $appointment->end_time
                                    )->format('h:i A') }}

                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>



            {{-- =============================================
                 PAYMENT METHOD
            ============================================== --}}

            <div class="card payment-card">

                <div class="card-body p-4">

                    <div class="card-title mb-3">
                        Select Payment Method
                    </div>


                    <form
                        action="{{ route(
                            'patient.appointment.payment.process',
                            $appointment->id
                        ) }}"
                        method="POST"
                    >

                        @csrf


                        {{-- =================================
                             ONLINE PAYMENT
                        ================================== --}}

                        <label
                            class="payment-option d-block mb-3"
                        >

                            <input
                                type="radio"
                                name="payment_method"
                                value="online"
                                {{ old(
                                    'payment_method',
                                    $appointment->payment->payment_method ?? ''
                                ) === 'online'
                                    ? 'checked'
                                    : '' }}
                                required
                            >

                            <span class="payment-option-title">
                                Online Payment
                            </span>

                            <div class="payment-option-description">

                                Pay securely using the available
                                online payment gateway.

                            </div>

                        </label>



                        {{-- =================================
                             MANUAL PAYMENT
                        ================================== --}}

                        <label
                            class="payment-option d-block"
                        >

                            <input
                                type="radio"
                                name="payment_method"
                                value="manual"
                                {{ old(
                                    'payment_method',
                                    $appointment->payment->payment_method ?? ''
                                ) === 'manual'
                                    ? 'checked'
                                    : '' }}
                            >

                            <span class="payment-option-title">
                                Manual Payment
                            </span>

                            <div class="payment-option-description">

                                Pay manually at the hospital
                                according to hospital instructions.

                            </div>

                        </label>


                        @error('payment_method')

                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>

                        @enderror



                        {{-- Pay Button --}}

                        <button
                            type="submit"
                            class="btn btn-primary pay-btn mt-4"
                        >
                            Pay Now
                        </button>


                    </form>

                </div>

            </div>

        </div>



        {{-- =================================================
             RIGHT SIDE
        ================================================== --}}

        <div class="col-lg-5">


            {{-- =============================================
                 PAYMENT SUMMARY
            ============================================== --}}

            <div class="card payment-card">

                <div class="card-body p-4">


                    <div class="card-title mb-4">
                        Payment Summary
                    </div>



                    {{-- Ticket Fee --}}

                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Ticket Fee
                        </span>

                        <strong>

                            ৳ {{ number_format(
                                $appointment->payment->amount ?? 0,
                                2
                            ) }}

                        </strong>

                    </div>



                    <hr>



                    {{-- Payment Status --}}

                    @if($appointment->payment)

                        <div class="d-flex
                                    justify-content-between
                                    align-items-center
                                    mb-3">

                            <span class="text-muted">
                                Payment Status
                            </span>


                            @if(
                                $appointment->payment->status ===
                                'paid'
                            )

                                <span
                                    class="payment-status status-paid"
                                >
                                    Paid
                                </span>

                            @elseif(
                                $appointment->payment->status ===
                                'failed'
                            )

                                <span
                                    class="payment-status status-failed"
                                >
                                    Failed
                                </span>

                            @elseif(
                                $appointment->payment->status ===
                                'refunded'
                            )

                                <span
                                    class="payment-status status-refunded"
                                >
                                    Refunded
                                </span>

                            @else

                                <span
                                    class="payment-status status-pending"
                                >
                                    Pending
                                </span>

                            @endif

                        </div>

                    @endif



                    {{-- Total --}}

                    <div class="amount-box mt-3 mb-4">

                        <div class="amount-label">
                            Total Payable
                        </div>

                        <div class="amount">

                            ৳ {{ number_format(
                                $appointment->payment->amount ?? 0,
                                2
                            ) }}

                        </div>

                    </div>



                    {{-- Already Paid --}}

                    @if(
                        $appointment->payment &&
                        $appointment->payment->status === 'paid'
                    )

                        <div class="alert alert-success mb-0">

                            Payment has already been completed.

                        </div>


                    @else

                        <div class="secure-text">

                            🔒 Your payment information is protected.

                        </div>

                    @endif



                    {{-- Back --}}

                    <div class="text-center mt-3">

                        <a
                            href="{{ route(
                                'patient.appointment.show',
                                $appointment->id
                            ) }}"
                            class="text-decoration-none"
                        >

                            ← Back to Appointment

                        </a>

                    </div>


                </div>

            </div>


        </div>


    </div>

</div>


</body>

</html>
