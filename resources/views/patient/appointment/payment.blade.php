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


{{--    --}}{{----}}{{-- =========================================================--}}
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


{{--        --}}{{----}}{{-- =====================================================--}}
{{--             LEFT SIDE--}}
{{--        ====================================================== --}}

{{--        <div class="col-lg-7">--}}


{{--            --}}{{----}}{{-- ================================================--}}
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



{{--            --}}{{----}}{{-- ================================================--}}
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


{{--                        --}}{{----}}{{-- ONLINE PAYMENT --}}

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



{{--                        --}}{{----}}{{-- MANUAL PAYMENT --}}

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



{{--        --}}{{----}}{{-- =====================================================--}}
{{--             RIGHT SIDE--}}
{{--        ====================================================== --}}

{{--        <div class="col-lg-5">--}}


{{--            <div class="card payment-card">--}}

{{--                <div class="card-body p-4">--}}


{{--                    <div class="card-title mb-4">--}}
{{--                        Payment Summary--}}
{{--                    </div>--}}


{{--                    --}}{{----}}{{-- Appointment Fee --}}

{{--                    <div class="d-flex justify-content-between mb-3">--}}

{{--                        <span class="text-muted">--}}
{{--                            Appointment Fee--}}
{{--                        </span>--}}

{{--                        <strong>--}}
{{--                            ৳ {{ number_format($appointment->payment->amount ?? 0, 2) }}--}}
{{--                        </strong>--}}

{{--                    </div>--}}


{{--                    <hr>--}}


{{--                    --}}{{----}}{{-- Total --}}

{{--                    <div class="amount-box mt-3 mb-4">--}}

{{--                        <div class="amount-label">--}}
{{--                            Total Payable--}}
{{--                        </div>--}}

{{--                        <div class="amount">--}}

{{--                            ৳ {{ number_format($appointment->payment->amount ?? 0, 2) }}--}}

{{--                        </div>--}}

{{--                    </div>--}}


{{--                    --}}{{----}}{{-- PAY BUTTON --}}

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


{{--    <!DOCTYPE html>--}}
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
{{--            box-shadow: 0 8px 30px rgba(0, 0, 0, .06);--}}
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

{{--        .payment-status {--}}
{{--            display: inline-block;--}}
{{--            padding: 6px 12px;--}}
{{--            border-radius: 20px;--}}
{{--            font-size: 12px;--}}
{{--            font-weight: 600;--}}
{{--            text-transform: capitalize;--}}
{{--        }--}}

{{--        .status-pending {--}}
{{--            background: #fff3cd;--}}
{{--            color: #856404;--}}
{{--        }--}}

{{--        .status-paid {--}}
{{--            background: #d1e7dd;--}}
{{--            color: #0f5132;--}}
{{--        }--}}

{{--        .status-failed {--}}
{{--            background: #f8d7da;--}}
{{--            color: #842029;--}}
{{--        }--}}

{{--        .status-refunded {--}}
{{--            background: #e2e3e5;--}}
{{--            color: #41464b;--}}
{{--        }--}}

{{--        .error-box {--}}
{{--            background: #f8d7da;--}}
{{--            border: 1px solid #f5c2c7;--}}
{{--            color: #842029;--}}
{{--            border-radius: 10px;--}}
{{--            padding: 14px 16px;--}}
{{--        }--}}

{{--        @media (max-width: 767px) {--}}

{{--            .page-title {--}}
{{--                font-size: 23px;--}}
{{--            }--}}

{{--            .amount {--}}
{{--                font-size: 26px;--}}
{{--            }--}}

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



{{-- =========================================================--}}
{{--     MAIN--}}
{{--========================================================= --}}

{{--<div class="container py-5">--}}


{{--    --}}{{-- =====================================================--}}
{{--         PAGE HEADER--}}
{{--    ====================================================== --}}

{{--    <div class="mb-4">--}}

{{--        <div class="page-title">--}}
{{--            Appointment Payment--}}
{{--        </div>--}}

{{--        <div class="page-subtitle mt-1">--}}
{{--            Complete your payment to confirm your appointment.--}}
{{--        </div>--}}

{{--    </div>--}}



{{--    --}}{{-- =====================================================--}}
{{--         ERROR MESSAGE--}}
{{--    ====================================================== --}}

{{--    @if(session('error'))--}}

{{--        <div class="error-box mb-4">--}}

{{--            {{ session('error') }}--}}

{{--        </div>--}}

{{--    @endif--}}



{{--    --}}{{-- =====================================================--}}
{{--         VALIDATION ERRORS--}}
{{--    ====================================================== --}}

{{--    @if($errors->any())--}}

{{--        <div class="error-box mb-4">--}}

{{--            <ul class="mb-0">--}}

{{--                @foreach($errors->all() as $error)--}}

{{--                    <li>--}}
{{--                        {{ $error }}--}}
{{--                    </li>--}}

{{--                @endforeach--}}

{{--            </ul>--}}

{{--        </div>--}}

{{--    @endif--}}



{{--    <div class="row g-4">--}}


{{--        --}}{{-- =================================================--}}
{{--             LEFT SIDE--}}
{{--        ================================================== --}}

{{--        <div class="col-lg-7">--}}


{{--            --}}{{-- =============================================--}}
{{--                 APPOINTMENT DETAILS--}}
{{--            ============================================== --}}

{{--            <div class="card payment-card mb-4">--}}

{{--                <div class="card-body p-4">--}}

{{--                    <div class="card-title mb-3">--}}
{{--                        Appointment Details--}}
{{--                    </div>--}}


{{--                    --}}{{-- Ticket --}}

{{--                    <div class="ticket-box mb-3">--}}

{{--                        <div class="ticket-label">--}}
{{--                            Appointment Ticket--}}
{{--                        </div>--}}

{{--                        <div class="ticket-number">--}}
{{--                            {{ $appointment->ticket_number }}--}}
{{--                        </div>--}}

{{--                    </div>--}}



{{--                    <div class="row g-3">--}}


{{--                        --}}{{-- Patient --}}

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



{{--                        --}}{{-- Patient Code --}}

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



{{--                        --}}{{-- Doctor --}}

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



{{--                        --}}{{-- Department --}}

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



{{--                        --}}{{-- Appointment Date --}}

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



{{--                        --}}{{-- Appointment Time --}}

{{--                        <div class="col-md-6">--}}

{{--                            <div class="info-box">--}}

{{--                                <div class="info-label">--}}
{{--                                    Appointment Time--}}
{{--                                </div>--}}

{{--                                <div class="info-value">--}}

{{--                                    {{ \Carbon\Carbon::parse(--}}
{{--                                        $appointment->start_time--}}
{{--                                    )->format('h:i A') }}--}}

{{--                                    ---}}

{{--                                    {{ \Carbon\Carbon::parse(--}}
{{--                                        $appointment->end_time--}}
{{--                                    )->format('h:i A') }}--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}


{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}



{{--            --}}{{-- =============================================--}}
{{--                 PAYMENT METHOD--}}
{{--            ============================================== --}}

{{--            <div class="card payment-card">--}}

{{--                <div class="card-body p-4">--}}

{{--                    <div class="card-title mb-3">--}}
{{--                        Select Payment Method--}}
{{--                    </div>--}}


{{--                    <form--}}
{{--                        action="{{ route(--}}
{{--                            'patient.appointment.payment.process',--}}
{{--                            $appointment->id--}}
{{--                        ) }}"--}}
{{--                        method="POST"--}}
{{--                    >--}}

{{--                        @csrf--}}


{{--                        --}}{{-- =================================--}}
{{--                             ONLINE PAYMENT--}}
{{--                        ================================== --}}

{{--                        <label--}}
{{--                            class="payment-option d-block mb-3"--}}
{{--                        >--}}

{{--                            <input--}}
{{--                                type="radio"--}}
{{--                                name="payment_method"--}}
{{--                                value="online"--}}
{{--                                {{ old(--}}
{{--                                    'payment_method',--}}
{{--                                    $appointment->payment->payment_method ?? ''--}}
{{--                                ) === 'online'--}}
{{--                                    ? 'checked'--}}
{{--                                    : '' }}--}}
{{--                                required--}}
{{--                            >--}}

{{--                            <span class="payment-option-title">--}}
{{--                                Online Payment--}}
{{--                            </span>--}}

{{--                            <div class="payment-option-description">--}}

{{--                                Pay securely using the available--}}
{{--                                online payment gateway.--}}

{{--                            </div>--}}

{{--                        </label>--}}



{{--                        --}}{{-- =================================--}}
{{--                             MANUAL PAYMENT--}}
{{--                        ================================== --}}

{{--                        <label--}}
{{--                            class="payment-option d-block"--}}
{{--                        >--}}

{{--                            <input--}}
{{--                                type="radio"--}}
{{--                                name="payment_method"--}}
{{--                                value="manual"--}}
{{--                                {{ old(--}}
{{--                                    'payment_method',--}}
{{--                                    $appointment->payment->payment_method ?? ''--}}
{{--                                ) === 'manual'--}}
{{--                                    ? 'checked'--}}
{{--                                    : '' }}--}}
{{--                            >--}}

{{--                            <span class="payment-option-title">--}}
{{--                                Manual Payment--}}
{{--                            </span>--}}

{{--                            <div class="payment-option-description">--}}

{{--                                Pay manually at the hospital--}}
{{--                                according to hospital instructions.--}}

{{--                            </div>--}}

{{--                        </label>--}}


{{--                        @error('payment_method')--}}

{{--                        <div class="text-danger mt-2">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}

{{--                        @enderror--}}



{{--                        --}}{{-- Pay Button --}}

{{--                        <button--}}
{{--                            type="submit"--}}
{{--                            class="btn btn-primary pay-btn mt-4"--}}
{{--                        >--}}
{{--                            Pay Now--}}
{{--                        </button>--}}


{{--                    </form>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}



{{--        --}}{{-- =================================================--}}
{{--             RIGHT SIDE--}}
{{--        ================================================== --}}

{{--        <div class="col-lg-5">--}}


{{--            --}}{{-- =============================================--}}
{{--                 PAYMENT SUMMARY--}}
{{--            ============================================== --}}

{{--            <div class="card payment-card">--}}

{{--                <div class="card-body p-4">--}}


{{--                    <div class="card-title mb-4">--}}
{{--                        Payment Summary--}}
{{--                    </div>--}}



{{--                    --}}{{-- Ticket Fee --}}

{{--                    <div class="d-flex justify-content-between mb-3">--}}

{{--                        <span class="text-muted">--}}
{{--                            Ticket Fee--}}
{{--                        </span>--}}

{{--                        <strong>--}}

{{--                            ৳ {{ number_format(--}}
{{--                                $appointment->payment->amount ?? 0,--}}
{{--                                2--}}
{{--                            ) }}--}}

{{--                        </strong>--}}

{{--                    </div>--}}



{{--                    <hr>--}}



{{--                    --}}{{-- Payment Status --}}

{{--                    @if($appointment->payment)--}}

{{--                        <div class="d-flex--}}
{{--                                    justify-content-between--}}
{{--                                    align-items-center--}}
{{--                                    mb-3">--}}

{{--                            <span class="text-muted">--}}
{{--                                Payment Status--}}
{{--                            </span>--}}


{{--                            @if(--}}
{{--                                $appointment->payment->status ===--}}
{{--                                'paid'--}}
{{--                            )--}}

{{--                                <span--}}
{{--                                    class="payment-status status-paid"--}}
{{--                                >--}}
{{--                                    Paid--}}
{{--                                </span>--}}

{{--                            @elseif(--}}
{{--                                $appointment->payment->status ===--}}
{{--                                'failed'--}}
{{--                            )--}}

{{--                                <span--}}
{{--                                    class="payment-status status-failed"--}}
{{--                                >--}}
{{--                                    Failed--}}
{{--                                </span>--}}

{{--                            @elseif(--}}
{{--                                $appointment->payment->status ===--}}
{{--                                'refunded'--}}
{{--                            )--}}

{{--                                <span--}}
{{--                                    class="payment-status status-refunded"--}}
{{--                                >--}}
{{--                                    Refunded--}}
{{--                                </span>--}}

{{--                            @else--}}

{{--                                <span--}}
{{--                                    class="payment-status status-pending"--}}
{{--                                >--}}
{{--                                    Pending--}}
{{--                                </span>--}}

{{--                            @endif--}}

{{--                        </div>--}}

{{--                    @endif--}}



{{--                    --}}{{-- Total --}}

{{--                    <div class="amount-box mt-3 mb-4">--}}

{{--                        <div class="amount-label">--}}
{{--                            Total Payable--}}
{{--                        </div>--}}

{{--                        <div class="amount">--}}

{{--                            ৳ {{ number_format(--}}
{{--                                $appointment->payment->amount ?? 0,--}}
{{--                                2--}}
{{--                            ) }}--}}

{{--                        </div>--}}

{{--                    </div>--}}



{{--                    --}}{{-- Already Paid --}}

{{--                    @if(--}}
{{--                        $appointment->payment &&--}}
{{--                        $appointment->payment->status === 'paid'--}}
{{--                    )--}}

{{--                        <div class="alert alert-success mb-0">--}}

{{--                            Payment has already been completed.--}}

{{--                        </div>--}}


{{--                    @else--}}

{{--                        <div class="secure-text">--}}

{{--                            🔒 Your payment information is protected.--}}

{{--                        </div>--}}

{{--                    @endif--}}



{{--                    --}}{{-- Back --}}

{{--                    <div class="text-center mt-3">--}}

{{--                        <a--}}
{{--                            href="{{ route(--}}
{{--                                'patient.appointment.show',--}}
{{--                                $appointment->id--}}
{{--                            ) }}"--}}
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


{{--</body>--}}

{{--</html>--}}


@extends('patient.index')

@section('content')

    <div class="min-h-screen bg-[#f4f7fb] py-8 sm:py-10">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- =====================================================
                 PAGE HEADER
            ====================================================== --}}

            <div class="mb-6">

                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                    Appointment Payment
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Complete your payment to confirm your appointment.
                </p>

            </div>


            {{-- =====================================================
                 ERROR MESSAGE
            ====================================================== --}}

            @if(session('error'))

                <div class="mb-5 rounded-xl border border-red-200 bg-red-50
                        px-4 py-3 text-sm text-red-700">

                    {{ session('error') }}

                </div>

            @endif


            {{-- =====================================================
                 VALIDATION ERRORS
            ====================================================== --}}

            @if($errors->any())

                <div class="mb-5 rounded-xl border border-red-200 bg-red-50
                        px-4 py-3 text-sm text-red-700">

                    <ul class="list-disc list-inside space-y-1">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- =====================================================
                 MAIN GRID
            ====================================================== --}}

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">


                {{-- =================================================
                     LEFT SIDE
                ================================================== --}}

                <div class="lg:col-span-7 space-y-6">


                    {{-- =============================================
                         APPOINTMENT DETAILS
                    ============================================== --}}

                    <div class="bg-white rounded-[18px]
                            border border-gray-200
                            shadow-[0_8px_30px_rgba(0,0,0,0.05)]
                            overflow-hidden">

                        <div class="p-5 sm:p-6">

                            <h2 class="text-lg font-bold text-gray-800 mb-5">
                                Appointment Details
                            </h2>


                            {{-- Ticket --}}

                            <div class="bg-[#eef6ff]
                                    border border-[#cfe2ff]
                                    rounded-xl
                                    p-4 sm:p-5
                                    mb-4">

                                <div class="text-xs text-gray-500 mb-1">
                                    Appointment Ticket
                                </div>

                                <div class="text-xl sm:text-2xl
                                        font-bold text-blue-600
                                        tracking-wide">

                                    {{ $appointment->ticket_number }}

                                </div>

                            </div>


                            {{-- Information Grid --}}

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


                                {{-- Patient --}}

                                <div class="bg-gray-50
                                        border border-gray-200
                                        rounded-xl
                                        p-4">

                                    <div class="text-xs text-gray-500 mb-1.5">
                                        Patient
                                    </div>

                                    <div class="text-sm sm:text-[15px]
                                            font-semibold text-gray-800">

                                        {{ $appointment->patient->user->name ?? 'N/A' }}

                                    </div>

                                </div>


                                {{-- Patient Code --}}

                                <div class="bg-gray-50
                                        border border-gray-200
                                        rounded-xl
                                        p-4">

                                    <div class="text-xs text-gray-500 mb-1.5">
                                        Patient Code
                                    </div>

                                    <div class="text-sm sm:text-[15px]
                                            font-semibold text-gray-800">

                                        {{ $appointment->patient->patient_code ?? 'N/A' }}

                                    </div>

                                </div>


                                {{-- Doctor --}}

                                <div class="bg-gray-50
                                        border border-gray-200
                                        rounded-xl
                                        p-4">

                                    <div class="text-xs text-gray-500 mb-1.5">
                                        Doctor
                                    </div>

                                    <div class="text-sm sm:text-[15px]
                                            font-semibold text-gray-800">

                                        Dr.
                                        {{ $appointment->doctor->name ?? 'N/A' }}

                                    </div>

                                </div>


                                {{-- Department --}}

                                <div class="bg-gray-50
                                        border border-gray-200
                                        rounded-xl
                                        p-4">

                                    <div class="text-xs text-gray-500 mb-1.5">
                                        Department
                                    </div>

                                    <div class="text-sm sm:text-[15px]
                                            font-semibold text-gray-800">

                                        {{ $appointment->department->name ?? 'N/A' }}

                                    </div>

                                </div>


                                {{-- Appointment Date --}}

                                <div class="bg-gray-50
                                        border border-gray-200
                                        rounded-xl
                                        p-4">

                                    <div class="text-xs text-gray-500 mb-1.5">
                                        Appointment Date
                                    </div>

                                    <div class="text-sm sm:text-[15px]
                                            font-semibold text-gray-800">

                                        {{ $appointment->appointment_date?->format('d M Y') }}

                                    </div>

                                </div>


                                {{-- Appointment Time --}}

                                <div class="bg-gray-50
                                        border border-gray-200
                                        rounded-xl
                                        p-4">

                                    <div class="text-xs text-gray-500 mb-1.5">
                                        Appointment Time
                                    </div>

                                    <div class="text-sm sm:text-[15px]
                                            font-semibold text-gray-800">

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



                    {{-- =============================================
                         PAYMENT METHOD
                    ============================================== --}}

                    <div class="bg-white rounded-[18px]
                            border border-gray-200
                            shadow-[0_8px_30px_rgba(0,0,0,0.05)]">

                        <div class="p-5 sm:p-6">

                            <h2 class="text-lg font-bold text-gray-800 mb-5">
                                Select Payment Method
                            </h2>


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
                                    class="block cursor-pointer
                                       border border-gray-200
                                       rounded-xl
                                       p-4
                                       transition
                                       hover:border-blue-400
                                       hover:bg-blue-50/40"
                                >

                                    <div class="flex items-start gap-3">

                                        <input
                                            type="radio"
                                            name="payment_method"
                                            value="online"
                                            class="mt-1 w-4 h-4
                                               text-blue-600
                                               focus:ring-blue-500"
                                            {{ old(
                                                'payment_method',
                                                $appointment->payment->payment_method ?? ''
                                            ) === 'online'
                                                ? 'checked'
                                                : '' }}
                                            required
                                        >

                                        <div>

                                            <div class="font-bold text-gray-800">
                                                Online Payment
                                            </div>

                                            <div class="text-xs text-gray-500
                                                    mt-1 leading-5">

                                                Pay securely using the available
                                                online payment gateway.

                                            </div>

                                        </div>

                                    </div>

                                </label>



                                {{-- =================================
                                     MANUAL PAYMENT
                                ================================== --}}

                                <label
                                    class="block cursor-pointer
                                       border border-gray-200
                                       rounded-xl
                                       p-4
                                       mt-3
                                       transition
                                       hover:border-blue-400
                                       hover:bg-blue-50/40"
                                >

                                    <div class="flex items-start gap-3">

                                        <input
                                            type="radio"
                                            name="payment_method"
                                            value="manual"
                                            class="mt-1 w-4 h-4
                                               text-blue-600
                                               focus:ring-blue-500"
                                            {{ old(
                                                'payment_method',
                                                $appointment->payment->payment_method ?? ''
                                            ) === 'manual'
                                                ? 'checked'
                                                : '' }}
                                        >

                                        <div>

                                            <div class="font-bold text-gray-800">
                                                Manual Payment
                                            </div>

                                            <div class="text-xs text-gray-500
                                                    mt-1 leading-5">

                                                Pay manually at the hospital
                                                according to hospital instructions.

                                            </div>

                                        </div>

                                    </div>

                                </label>


                                {{-- Validation Error --}}

                                @error('payment_method')

                                <div class="text-sm text-red-600 mt-2">
                                    {{ $message }}
                                </div>

                                @enderror


                                {{-- Pay Button --}}

                                <button
                                    type="submit"
                                    class="w-full mt-5
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

                                    <i class="fa-solid fa-credit-card mr-2"></i>

                                    Pay Now

                                </button>


                            </form>

                        </div>

                    </div>


                </div>



                {{-- =================================================
                     RIGHT SIDE
                ================================================== --}}

                <div class="lg:col-span-5">


                    {{-- =============================================
                         PAYMENT SUMMARY
                    ============================================== --}}

                    <div class="bg-white rounded-[18px]
                            border border-gray-200
                            shadow-[0_8px_30px_rgba(0,0,0,0.05)]
                            overflow-hidden">

                        <div class="p-5 sm:p-6">

                            <h2 class="text-lg font-bold text-gray-800 mb-5">
                                Payment Summary
                            </h2>


                            {{-- Ticket Fee --}}

                            <div class="flex items-center
                                    justify-between
                                    gap-4
                                    mb-4">

                            <span class="text-sm text-gray-500">
                                Ticket Fee
                            </span>

                                <strong class="text-sm sm:text-base
                                           text-gray-800">

                                    ৳ {{ number_format(
                                    $appointment->payment->amount ?? 0,
                                    2
                                ) }}

                                </strong>

                            </div>


                            <div class="border-t border-gray-200"></div>


                            {{-- Payment Status --}}

                            @if($appointment->payment)

                                <div class="flex items-center
                                        justify-between
                                        gap-4
                                        mt-4
                                        mb-4">

                                <span class="text-sm text-gray-500">
                                    Payment Status
                                </span>


                                    @if(
                                        $appointment->payment->status === 'paid'
                                    )

                                        <span class="inline-flex items-center
                                                 px-3 py-1.5
                                                 rounded-full
                                                 bg-green-100
                                                 text-green-700
                                                 text-xs
                                                 font-semibold">

                                        <i class="fa-solid fa-circle-check mr-1.5"></i>

                                        Paid

                                    </span>

                                    @elseif(
                                        $appointment->payment->status === 'failed'
                                    )

                                        <span class="inline-flex items-center
                                                 px-3 py-1.5
                                                 rounded-full
                                                 bg-red-100
                                                 text-red-700
                                                 text-xs
                                                 font-semibold">

                                        <i class="fa-solid fa-circle-xmark mr-1.5"></i>

                                        Failed

                                    </span>

                                    @elseif(
                                        $appointment->payment->status === 'refunded'
                                    )

                                        <span class="inline-flex items-center
                                                 px-3 py-1.5
                                                 rounded-full
                                                 bg-gray-200
                                                 text-gray-700
                                                 text-xs
                                                 font-semibold">

                                        <i class="fa-solid fa-rotate-left mr-1.5"></i>

                                        Refunded

                                    </span>

                                    @else

                                        <span class="inline-flex items-center
                                                 px-3 py-1.5
                                                 rounded-full
                                                 bg-yellow-100
                                                 text-yellow-700
                                                 text-xs
                                                 font-semibold">

                                        <i class="fa-solid fa-clock mr-1.5"></i>

                                        Pending

                                    </span>

                                    @endif

                                </div>

                            @endif


                            {{-- Total Payable --}}

                            <div class="bg-gray-50
                                    rounded-xl
                                    p-5
                                    mt-4
                                    mb-5">

                                <div class="text-xs text-gray-500">
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


                            {{-- Already Paid --}}

                            @if(
                                $appointment->payment &&
                                $appointment->payment->status === 'paid'
                            )

                                <div class="rounded-xl
                                        border border-green-200
                                        bg-green-50
                                        px-4 py-3
                                        text-sm text-green-700">

                                    <div class="flex items-start gap-2">

                                        <i class="fa-solid fa-circle-check mt-0.5"></i>

                                        <span>
                                        Payment has already been completed.
                                    </span>

                                    </div>

                                </div>

                            @else

                                <div class="text-center
                                        text-xs
                                        text-gray-500">

                                    <i class="fa-solid fa-lock mr-1"></i>

                                    Your payment information is protected.

                                </div>

                            @endif


                            {{-- Back --}}

                            <div class="text-center mt-5">

                                <a
                                    href="{{ route(
                                    'patient.appointment.show',
                                    $appointment->id
                                ) }}"
                                    class="inline-flex items-center
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

    </div>

@endsection
