<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Appointment Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #e8edf3;
            padding: 16px 0;
        }

        .brand {
            font-size: 22px;
            font-weight: 700;
            color: #0d6efd;
            text-decoration: none;
        }

        .back-btn {
            text-decoration: none;
            color: #555;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
        }

        .appointment-card {
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid #e8edf3;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .05);
            overflow: hidden;
        }

        .appointment-header {
            padding: 25px;
            background: #eef6ff;
            border-bottom: 1px solid #dcecff;
        }

        .ticket-label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .ticket-number {
            font-size: 25px;
            font-weight: 700;
            color: #0d6efd;
            letter-spacing: .5px;
        }

        .status-badge {
            display: inline-block;
            padding: 7px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background: #d1e7dd;
            color: #0f5132;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #842029;
        }

        .status-completed {
            background: #cff4fc;
            color: #055160;
        }

        .status-no_show {
            background: #e2e3e5;
            color: #41464b;
        }

        .section {
            padding: 25px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 20px;
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid #edf0f4;
            border-radius: 12px;
            padding: 16px;
            height: 100%;
        }

        .info-label {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 15px;
            font-weight: 600;
            color: #1f2937;
        }

        .doctor-box {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 18px;
            background: #f8fafc;
            border-radius: 14px;
            border: 1px solid #edf0f4;
        }

        .doctor-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #dbeafe;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d6efd;
            font-size: 22px;
            font-weight: 700;
        }

        .doctor-name {
            font-size: 17px;
            font-weight: 700;
        }

        .doctor-specialization {
            font-size: 13px;
            color: #6b7280;
            margin-top: 3px;
        }

        .appointment-date {
            font-size: 22px;
            font-weight: 700;
            color: #0d6efd;
        }

        .appointment-time {
            font-size: 16px;
            color: #4b5563;
            margin-top: 5px;
        }

        .payment-box {
            background: #f8fafc;
            border-radius: 12px;
            padding: 18px;
            border: 1px solid #edf0f4;
        }

        .action-btn {
            border-radius: 10px;
            padding: 11px 20px;
            font-weight: 600;
        }

        .notes-box {
            background: #fffdf5;
            border: 1px solid #f5e6a8;
            border-radius: 12px;
            padding: 16px;
            color: #665b2d;
        }

    </style>

</head>


<body>


{{-- ==========================================================
     TOP NAVBAR
========================================================== --}}

<div class="topbar">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">

            <a
                href="{{ route('patient.dashboard') }}"
                class="brand"
            >
                Patient Portal
            </a>

            <a
                href="{{ route('patient.dashboard') }}"
                class="back-btn"
            >
                ← Back to Dashboard
            </a>

        </div>

    </div>

</div>



{{-- ==========================================================
     MAIN
========================================================== --}}

<div class="container py-5">


    {{-- Page Header --}}

    <div class="d-flex
                justify-content-between
                align-items-center
                mb-4">

        <div>

            <div class="page-title">
                Appointment Details
            </div>

            <div class="text-muted mt-1">
                View your appointment and ticket information
            </div>

        </div>


        <div>

            @if($appointment->status === 'pending')

                <span class="status-badge status-pending">
                    Pending
                </span>

            @elseif($appointment->status === 'confirmed')

                <span class="status-badge status-confirmed">
                    Confirmed
                </span>

            @elseif($appointment->status === 'cancelled')

                <span class="status-badge status-cancelled">
                    Cancelled
                </span>

            @elseif($appointment->status === 'completed')

                <span class="status-badge status-completed">
                    Completed
                </span>

            @elseif($appointment->status === 'no_show')

                <span class="status-badge status-no_show">
                    No Show
                </span>

            @endif

        </div>

    </div>



    {{-- ======================================================
         APPOINTMENT CARD
    ======================================================= --}}

    <div class="appointment-card">


        {{-- Header --}}

        <div class="appointment-header">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <div class="ticket-label">
                        Appointment Ticket
                    </div>

                    <div class="ticket-number">
                        {{ $appointment->ticket_number }}
                    </div>

                </div>


                <div class="col-md-4 text-md-end mt-3 mt-md-0">

                    <div class="ticket-label">
                        Appointment Date
                    </div>

                    <div class="fw-bold">

                        {{ $appointment->appointment_date->format('d M Y') }}

                    </div>

                </div>

            </div>

        </div>



        {{-- ==================================================
             APPOINTMENT INFORMATION
        =================================================== --}}

        <div class="section">

            <div class="section-title">
                Appointment Information
            </div>


            <div class="row g-3">


                {{-- Department --}}

                <div class="col-md-4">

                    <div class="info-box">

                        <div class="info-label">
                            Department
                        </div>

                        <div class="info-value">

                            {{ $appointment->department->name ?? 'N/A' }}

                        </div>

                    </div>

                </div>


                {{-- Date --}}

                <div class="col-md-4">

                    <div class="info-box">

                        <div class="info-label">
                            Appointment Date
                        </div>

                        <div class="appointment-date">

                            {{ $appointment->appointment_date->format('d M Y') }}

                        </div>

                    </div>

                </div>


                {{-- Time --}}

                <div class="col-md-4">

                    <div class="info-box">

                        <div class="info-label">
                            Time
                        </div>

                        <div class="appointment-time">

                            {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}

                            -

                            {{ \Carbon\Carbon::parse($appointment->end_time)->format('h:i A') }}

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- ==================================================
             DOCTOR
        =================================================== --}}

        <div class="section border-top">

            <div class="section-title">
                Doctor Information
            </div>


            <div class="doctor-box">

                <div class="doctor-avatar">

                    {{ strtoupper(
                        substr(
                            $appointment->doctor->name ?? 'D',
                            0,
                            1
                        )
                    ) }}

                </div>


                <div>

                    <div class="doctor-name">

                        Dr.
                        {{ $appointment->doctor->name ?? 'N/A' }}

                    </div>


                    <div class="doctor-specialization">

                        {{ $appointment->doctor->specialization ?? 'Medical Specialist' }}

                    </div>


                    @if($appointment->doctor->designation)

                        <div class="doctor-specialization">

                            {{ $appointment->doctor->designation }}

                        </div>

                    @endif

                </div>

            </div>

        </div>



        {{-- ==================================================
             PATIENT INFORMATION
        =================================================== --}}

        <div class="section border-top">

            <div class="section-title">
                Patient Information
            </div>


            <div class="row g-3">


                <div class="col-md-4">

                    <div class="info-box">

                        <div class="info-label">
                            Patient Name
                        </div>

                        <div class="info-value">

                            {{ $appointment->patient->user->name ?? 'N/A' }}

                        </div>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="info-box">

                        <div class="info-label">
                            Patient Code
                        </div>

                        <div class="info-value">

                            {{ $appointment->patient->patient_code ?? 'N/A' }}

                        </div>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="info-box">

                        <div class="info-label">
                            Phone
                        </div>

                        <div class="info-value">

                            {{ $appointment->patient->phone ?? 'N/A' }}

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- ==================================================
             NOTES
        =================================================== --}}

        @if($appointment->notes)

            <div class="section border-top">

                <div class="section-title">
                    Patient Notes
                </div>


                <div class="notes-box">

                    {{ $appointment->notes }}

                </div>

            </div>

        @endif



        {{-- ==================================================
             PAYMENT
        =================================================== --}}

{{--        <div class="section border-top">--}}

{{--            <div class="section-title">--}}
{{--                Payment Information--}}
{{--            </div>--}}


{{--            <div class="payment-box">--}}

{{--                @if($appointment->payment)--}}

{{--                    <div class="row g-3">--}}

{{--                        <div class="col-md-4">--}}

{{--                            <div class="info-label">--}}
{{--                                Payment Status--}}
{{--                            </div>--}}

{{--                            <div class="info-value">--}}

{{--                                {{ ucfirst($appointment->payment->status ?? 'Pending') }}--}}

{{--                            </div>--}}

{{--                        </div>--}}


{{--                        <div class="col-md-4">--}}

{{--                            <div class="info-label">--}}
{{--                                Amount--}}
{{--                            </div>--}}

{{--                            <div class="info-value">--}}

{{--                                {{ number_format(--}}
{{--                                    $appointment->payment->amount ?? 0,--}}
{{--                                    2--}}
{{--                                ) }}--}}

{{--                            </div>--}}

{{--                        </div>--}}


{{--                        <div class="col-md-4">--}}

{{--                            <div class="info-label">--}}
{{--                                Payment Method--}}
{{--                            </div>--}}

{{--                            <div class="info-value">--}}

{{--                                {{ ucfirst(--}}
{{--                                    $appointment->payment->payment_method ?? 'N/A'--}}
{{--                                ) }}--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--                @else--}}

{{--                    <div class="d-flex--}}
{{--                                justify-content-between--}}
{{--                                align-items-center--}}
{{--                                flex-wrap--}}
{{--                                gap-3">--}}

{{--                        <div>--}}

{{--                            <div class="fw-bold">--}}
{{--                                Payment Pending--}}
{{--                            </div>--}}

{{--                            <div class="text-muted small">--}}
{{--                                No payment has been recorded yet.--}}
{{--                            </div>--}}

{{--                        </div>--}}


{{--                        <a--}}
{{--                            href="{{ route(--}}
{{--                                'patient.appointment.payment',--}}
{{--                                $appointment->id--}}
{{--                            ) }}"--}}
{{--                            class="btn btn-primary action-btn"--}}
{{--                        >--}}
{{--                            Proceed to Payment--}}
{{--                        </a>--}}

{{--                    </div>--}}

{{--                @endif--}}

{{--            </div>--}}

{{--        </div>--}}

        {{-- ==================================================
             PAYMENT
        =================================================== --}}

        <div class="section border-top">

            <div class="section-title">
                Payment Information
            </div>

            <div class="payment-box">

                @if(!$appointment->payment)

                    {{-- Payment Not Created Yet --}}

                    <div class="d-flex
                        justify-content-between
                        align-items-center
                        flex-wrap
                        gap-3">

                        <div>

                            <div class="fw-bold">
                                Payment Pending
                            </div>

                            <div class="text-muted small">
                                Please complete your appointment payment.
                            </div>

                        </div>

                        <a
                            href="{{ route(
                        'patient.appointment.payment',
                        $appointment->id
                    ) }}"
                            class="btn btn-primary action-btn"
                        >
                            Proceed to Payment
                        </a>

                    </div>

                @else

                    {{-- Payment Information --}}

                    <div class="row g-3">

                        <div class="col-md-4">

                            <div class="info-label">
                                Payment Status
                            </div>

                            <div class="info-value">

                                {{ ucfirst(
                                    $appointment->payment->status
                                ) }}

                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="info-label">
                                Amount
                            </div>

                            <div class="info-value">

                                ৳ {{ number_format(
                            $appointment->payment->amount,
                            2
                        ) }}

                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="info-label">
                                Payment Method
                            </div>

                            <div class="info-value">

                                {{ $appointment->payment->payment_method
                                    ? ucfirst(
                                        $appointment->payment->payment_method
                                    )
                                    : 'Not Selected'
                                }}

                            </div>

                        </div>

                    </div>


                    {{-- ==========================================
                         PENDING PAYMENT
                    =========================================== --}}

                    @if($appointment->payment->status === 'pending')

                        <div class="mt-4 text-end">

                            <a
                                href="{{ route(
                            'patient.appointment.payment',
                            $appointment->id
                        ) }}"
                                class="btn btn-primary action-btn"
                            >
                                Proceed to Payment
                            </a>

                        </div>

                    @endif


                    {{-- ==========================================
                         PAID PAYMENT
                    =========================================== --}}

                    @if($appointment->payment->status === 'paid')

                        <div class="alert alert-success mt-3 mb-0">

                            Payment completed successfully.

                            @if($appointment->payment->paid_at)

                                <div class="small mt-1">

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

        {{-- ==================================================
             FOOTER ACTION
        =================================================== --}}

        <div class="section border-top">

            <div class="d-flex
                        justify-content-between
                        align-items-center
                        flex-wrap
                        gap-3">


                <a
                    href="{{ route('patient.dashboard') }}"
                    class="btn btn-light action-btn"
                >
                    Back to Dashboard
                </a>


{{--                @if($appointment->payment)--}}

                    <a
                        href="{{ route(
                                    'patient.appointment.download-ticket',
                                    $appointment->id
                                ) }}"
                        class="btn btn-primary action-btn"
                    >
                        ⬇ Download Ticket PDF
                    </a>


{{--                @endif--}}

            </div>

        </div>


    </div>

</div>


</body>

</html>
