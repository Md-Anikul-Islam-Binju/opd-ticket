<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>
        Appointment Ticket - {{ $appointment->ticket_number }}
    </title>

    <style>

        @page {
            margin: 25px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #222;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .page {
            width: 100%;
        }

        /* =========================
           HEADER
        ========================== */

        .header {
            width: 100%;
            border-bottom: 2px solid #222;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .doctor-section {
            width: 50%;
            vertical-align: top;
        }

        .patient-section {
            width: 50%;
            vertical-align: top;
            text-align: right;
        }

        .hospital-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .doctor-name {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .doctor-info {
            color: #555;
            line-height: 1.6;
        }

        .patient-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .patient-info {
            line-height: 1.7;
        }

        .label {
            font-weight: bold;
        }

        /* =========================
           TICKET INFO
        ========================== */

        .ticket-box {
            border: 1px solid #aaa;
            margin-bottom: 15px;
        }

        .ticket-table {
            width: 100%;
            border-collapse: collapse;
        }

        .ticket-table td {
            padding: 9px;
            border-right: 1px solid #ddd;
        }

        .ticket-table td:last-child {
            border-right: none;
        }

        .ticket-label {
            font-size: 10px;
            color: #777;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .ticket-value {
            font-size: 13px;
            font-weight: bold;
        }

        .ticket-number {
            font-size: 16px;
        }

        /* =========================
           PRESCRIPTION
        ========================== */

        .rx-header {
            border-bottom: 1px solid #222;
            padding-bottom: 7px;
            margin-bottom: 10px;
        }

        .rx-title {
            font-size: 18px;
            font-weight: bold;
        }

        .rx-symbol {
            font-size: 24px;
            font-weight: bold;
            margin-right: 8px;
        }

        .prescription-area {
            border: 1px solid #999;
            min-height: 570px;
            padding: 18px;
            position: relative;
        }

        .rx-section {
            margin-bottom: 25px;
        }

        .rx-section-title {
            font-size: 13px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            padding-bottom: 6px;
            margin-bottom: 12px;
        }

        .writing-line {
            border-bottom: 1px dotted #aaa;
            height: 27px;
            margin-bottom: 2px;
        }

        .medicine-table {
            width: 100%;
            border-collapse: collapse;
        }

        .medicine-table th,
        .medicine-table td {
            border: 1px solid #ccc;
            padding: 7px;
        }

        .medicine-table th {
            font-size: 10px;
            text-align: left;
            background: #f5f5f5;
        }

        .medicine-table td {
            height: 28px;
        }

        /* =========================
           FOOTER
        ========================== */

        .footer {
            margin-top: 15px;
            padding-top: 8px;
            border-top: 1px solid #aaa;
            font-size: 9px;
            color: #777;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .signature-table td {
            width: 50%;
            text-align: center;
            padding-top: 35px;
        }

        .signature-line {
            border-top: 1px solid #555;
            width: 150px;
            margin: 0 auto 5px auto;
        }

        .small {
            font-size: 10px;
            color: #666;
        }

    </style>
</head>

<body>

<div class="page">

    {{-- =========================================
         HEADER
    ========================================== --}}

    <div class="header">

        <table class="header-table">

            <tr>

                {{-- LEFT : DOCTOR + DEPARTMENT --}}

                <td class="doctor-section">

                    <div class="hospital-title">
                        OPD TICKET
                    </div>

                    <div class="doctor-name">

                        Dr.
                        {{ $appointment->doctor->name ?? 'N/A' }}

                    </div>

                    <div class="doctor-info">

                        @if($appointment->doctor)

                            @if($appointment->doctor->specialization)
                                {{ $appointment->doctor->specialization }}
                                <br>
                            @endif

                            @if($appointment->doctor->designation)
                                {{ $appointment->doctor->designation }}
                                <br>
                            @endif

                        @endif

                        <span class="label">
                            Department:
                        </span>

                        {{ $appointment->department->name ?? 'N/A' }}

                    </div>

                </td>


                {{-- RIGHT : PATIENT --}}

                <td class="patient-section">

                    <div class="patient-title">
                        PATIENT INFORMATION
                    </div>

                    <div class="patient-info">

                        <div>
                            <span class="label">
                                Name:
                            </span>

                            {{ $appointment->patient->user->name
                                ?? $appointment->patient->name
                                ?? 'N/A'
                            }}
                        </div>

                        <div>
                            <span class="label">
                                Patient ID:
                            </span>

                            {{ $appointment->patient->patient_code ?? 'N/A' }}
                        </div>

                        <div>
                            <span class="label">
                                Phone:
                            </span>

                            {{ $appointment->patient->phone ?? 'N/A' }}
                        </div>

                        @if($appointment->patient->age)

                            <div>
                                <span class="label">
                                    Age:
                                </span>

                                {{ $appointment->patient->age }}
                            </div>

                        @endif

                        @if($appointment->patient->gender)

                            <div>
                                <span class="label">
                                    Gender:
                                </span>

                                {{ ucfirst($appointment->patient->gender) }}
                            </div>

                        @endif

                    </div>

                </td>

            </tr>

        </table>

    </div>


    {{-- =========================================
         TICKET INFORMATION
    ========================================== --}}

    <div class="ticket-box">

        <table class="ticket-table">

            <tr>

                <td>

                    <div class="ticket-label">
                        Ticket Number
                    </div>

                    <div class="ticket-value ticket-number">
                        {{ $appointment->ticket_number }}
                    </div>

                </td>


                <td>

                    <div class="ticket-label">
                        Appointment Date
                    </div>

                    <div class="ticket-value">

                        {{ $appointment->appointment_date
                            ->format('d M Y')
                        }}

                    </div>

                </td>


                <td>

                    <div class="ticket-label">
                        Appointment Time
                    </div>

                    <div class="ticket-value">

                        {{ \Carbon\Carbon::parse(
                            $appointment->start_time
                        )->format('h:i A') }}

                        -

                        {{ \Carbon\Carbon::parse(
                            $appointment->end_time
                        )->format('h:i A') }}

                    </div>

                </td>


                <td>

                    <div class="ticket-label">
                        Status
                    </div>

                    <div class="ticket-value">

                        {{ ucfirst(
                            str_replace(
                                '_',
                                ' ',
                                $appointment->status
                            )
                        ) }}

                    </div>

                </td>

            </tr>

        </table>

    </div>


    {{-- =========================================
         PRESCRIPTION AREA
    ========================================== --}}

    <div class="rx-header">

        <span class="rx-symbol">
            Rx
        </span>

        <span class="rx-title">
            Prescription / Doctor's Notes
        </span>

    </div>


    <div class="prescription-area">


        {{-- DIAGNOSIS --}}

        <div class="rx-section">

            <div class="rx-section-title">
                Diagnosis / Clinical Findings
            </div>

            <div class="writing-line"></div>

            <div class="writing-line"></div>

        </div>


        {{-- MEDICINE --}}

        <div class="rx-section">

            <div class="rx-section-title">
                Medicine
            </div>

            <table class="medicine-table">

                <thead>

                <tr>

                    <th width="8%">
                        #
                    </th>

                    <th width="32%">
                        Medicine
                    </th>

                    <th width="20%">
                        Dose
                    </th>

                    <th width="20%">
                        Frequency
                    </th>

                    <th width="20%">
                        Duration
                    </th>

                </tr>

                </thead>

                <tbody>

                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                </tbody>

            </table>

        </div>


        {{-- TEST --}}

        <div class="rx-section">

            <div class="rx-section-title">
                Test / Investigation
            </div>

            <div class="writing-line"></div>

            <div class="writing-line"></div>

        </div>


        {{-- ADVICE --}}

        <div class="rx-section">

            <div class="rx-section-title">
                Advice
            </div>

            <div class="writing-line"></div>

            <div class="writing-line"></div>

        </div>


        {{-- SIGNATURE --}}

        <table class="signature-table">

            <tr>

                <td>

                    <div class="signature-line"></div>

                    Doctor's Signature

                </td>

                <td>

                    <div class="signature-line"></div>

                    Date

                </td>

            </tr>

        </table>

    </div>


    {{-- =========================================
         FOOTER
    ========================================== --}}

    <div class="footer">

        Ticket No:
        {{ $appointment->ticket_number }}

        &nbsp;&nbsp; | &nbsp;&nbsp;

        Generated on:
        {{ now()->format('d M Y h:i A') }}

    </div>

</div>

</body>
</html>
