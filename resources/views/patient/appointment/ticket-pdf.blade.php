<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>
        Appointment Ticket - {{ $appointment->ticket_number }}
    </title>

    <style>

        @page {
            size: A4;
            margin: 10px 15px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #222;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }

        .page {
            width: 100%;
        }


        /* =====================================================
           HEADER
        ====================================================== */

        .header {
            width: 100%;
            border-bottom: 2px solid #222;
            padding-bottom: 8px;
            margin-bottom: 8px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .doctor-section {
            width: 58%;
            vertical-align: top;
        }

        .patient-section {
            width: 42%;
            vertical-align: top;
            text-align: right;
        }

        .logo {
            width: 42px;
            height: 42px;
            object-fit: contain;
            vertical-align: middle;
            margin-right: 8px;
        }

        .hospital-title {
            font-size: 19px;
            font-weight: bold;
            display: inline-block;
            vertical-align: middle;
            line-height: 1.2;
        }

        .doctor-name {
            font-size: 13px;
            font-weight: bold;
            margin-top: 5px;
            margin-bottom: 2px;
        }

        .doctor-info {
            color: #555;
            font-size: 9.5px;
            line-height: 1.4;
        }

        .department {
            margin-top: 2px;
        }

        .patient-title {
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .patient-info {
            font-size: 9.5px;
            line-height: 1.5;
        }

        .label {
            font-weight: bold;
        }


        /* =====================================================
           TICKET INFORMATION
        ====================================================== */

        .ticket-box {
            border: 1px solid #999;
            margin-bottom: 7px;
        }

        .ticket-table {
            width: 100%;
            border-collapse: collapse;
        }

        .ticket-table td {
            padding: 5px 7px;
            border-right: 1px solid #ddd;
            vertical-align: middle;
        }

        .ticket-table td:last-child {
            border-right: none;
        }

        .ticket-label {
            font-size: 8px;
            color: #777;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .ticket-value {
            font-size: 10px;
            font-weight: bold;
        }

        .ticket-number {
            font-size: 12px;
        }


        /* =====================================================
           PRESCRIPTION HEADER
        ====================================================== */

        .rx-header {
            border-bottom: 1px solid #222;
            padding-bottom: 4px;
            margin-bottom: 5px;
        }

        .rx-symbol {
            font-size: 19px;
            font-weight: bold;
            margin-right: 6px;
        }

        .rx-title {
            font-size: 13px;
            font-weight: bold;
        }


        /* =====================================================
           PRESCRIPTION AREA
        ====================================================== */

        .prescription-area {
            border: 1px solid #999;
            height: 675px;
            padding: 10px;
            position: relative;
        }

        .rx-section {
            margin-bottom: 10px;
        }

        .rx-section-title {
            font-size: 10px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            padding-bottom: 3px;
            margin-bottom: 5px;
        }

        .writing-line {
            border-bottom: 1px dotted #aaa;
            height: 18px;
            margin-bottom: 1px;
        }


        /* =====================================================
           MEDICINE TABLE
        ====================================================== */

        .medicine-table {
            width: 100%;
            border-collapse: collapse;
        }

        .medicine-table th,
        .medicine-table td {
            border: 1px solid #bbb;
            padding: 4px;
        }

        .medicine-table th {
            font-size: 8px;
            text-align: left;
            background: #f5f5f5;
        }

        .medicine-table td {
            height: 23px;
            font-size: 9px;
        }


        /* =====================================================
           SIGNATURE + DATE
        ====================================================== */

        .signature-table {
            position: absolute;
            left: 10px;
            right: 10px;
            bottom: 40px; /* signature আরেকটু উপরে তোলার জন্য bottom ভ্যালু বাড়িয়ে দেওয়া হয়েছে */
            width: calc(100% - 20px);
            border-collapse: collapse;
        }

        .signature-table td {
            width: 50%;
            text-align: center;
            padding-top: 0;
            font-size: 9px;
            vertical-align: bottom;
        }

        .signature-line {
            border-top: 1px solid #555;
            width: 125px;
            margin: 0 auto 8px auto;
        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .footer {
            margin-top: 6px;
            padding-top: 5px;
            border-top: 1px solid #aaa;
            font-size: 7.5px;
            color: #777;
        }

    </style>

</head>


<body>

<div class="page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="header">

        <table class="header-table">

            <tr>


                {{-- =========================================
                     LEFT : LOGO + DOCTOR
                ========================================== --}}

                <td class="doctor-section">

                    <div>

                        <img
                            src="{{ public_path('backend/images/logo.png') }}"
                            class="logo"
                        >

                        <div class="hospital-title">
                            OPD TICKET
                        </div>

                    </div>


                    <div class="doctor-name">

                        Dr.
                        {{ $appointment->doctor->name ?? 'N/A' }}

                    </div>


                    <div class="doctor-info">

                        MBBS, MD (Gastro). BSMMU.

                        <br>

                        Gastroenterology

                        <div class="department">

                            <span class="label">
                                Department:
                            </span>

                            {{ $appointment->department->name
                                ?? 'Gastroenterology'
                            }}

                        </div>

                    </div>

                </td>



                {{-- =========================================
                     RIGHT : PATIENT
                ========================================== --}}

                <td class="patient-section">

                    <div class="patient-title">
                        PATIENT INFORMATION
                    </div>


                    <div class="patient-info">


                        {{-- Name --}}

                        <div>

                            <span class="label">
                                Name:
                            </span>

                            {{ $appointment->patient->user->name
                                ?? $appointment->patient->name
                                ?? 'N/A'
                            }}

                        </div>


                        {{-- Gender + Age SAME LINE --}}

                        <div>

                            <span class="label">
                                Gender:
                            </span>

                            {{ $appointment->patient->gender
                                ? ucfirst($appointment->patient->gender)
                                : 'N/A'
                            }}

                            &nbsp;&nbsp;&nbsp;

                            <span class="label">
                                Age:
                            </span>

                            {{ $appointment->patient->age ?? 'N/A' }}

                        </div>


                        {{-- Patient ID --}}

                        <div>

                            <span class="label">
                                Patient ID:
                            </span>

                            {{ $appointment->patient->patient_code
                                ?? 'N/A'
                            }}

                        </div>


                        {{-- Phone --}}

                        <div>

                            <span class="label">
                                Phone:
                            </span>

                            {{ $appointment->patient->phone
                                ?? 'N/A'
                            }}

                        </div>

                    </div>

                </td>

            </tr>

        </table>

    </div>



    {{-- =====================================================
         TICKET INFORMATION
    ====================================================== --}}

    <div class="ticket-box">

        <table class="ticket-table">

            <tr>


                {{-- Ticket Number --}}

                <td>

                    <div class="ticket-label">
                        Ticket Number
                    </div>

                    <div class="ticket-value ticket-number">

                        {{ $appointment->ticket_number }}

                    </div>

                </td>


                {{-- Appointment Date --}}

                <td>

                    <div class="ticket-label">
                        Appointment Date
                    </div>

                    <div class="ticket-value">

                        {{ $appointment->appointment_date->format('d M Y') }}

                    </div>

                </td>


                {{-- Appointment Time --}}

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


                {{-- Status --}}

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



    {{-- =====================================================
         PRESCRIPTION HEADER
    ====================================================== --}}

    <div class="rx-header">

        <span class="rx-symbol">
            Rx
        </span>

        <span class="rx-title">
            Prescription / Doctor's Notes
        </span>

    </div>



    {{-- =====================================================
         PRESCRIPTION AREA
    ====================================================== --}}

    <div class="prescription-area">


        {{-- =============================================
             DIAGNOSIS
        ============================================== --}}

        <div class="rx-section">

            <div class="rx-section-title">
                Diagnosis / Clinical Findings
            </div>

            <div class="writing-line"></div>

            <div class="writing-line"></div>

        </div>



        {{-- =============================================
             MEDICINE
        ============================================== --}}

        <div class="rx-section">

            <div class="rx-section-title">
                Medicine
            </div>


            <table class="medicine-table">

                <thead>

                <tr>

                    <th width="7%">
                        #
                    </th>

                    <th width="34%">
                        Medicine
                    </th>

                    <th width="19%">
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



        {{-- =============================================
             TEST / INVESTIGATION
        ============================================== --}}

        <div class="rx-section">

            <div class="rx-section-title">
                Test / Investigation
            </div>

            <div class="writing-line"></div>

            <div class="writing-line"></div>

        </div>



        {{-- =============================================
             ADVICE
        ============================================== --}}

        <div class="rx-section">

            <div class="rx-section-title">
                Advice
            </div>

            <div class="writing-line"></div>

            <div class="writing-line"></div>

        </div>



        {{-- =============================================
             SIGNATURE + DATE
        ============================================== --}}

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



    {{-- =====================================================
         FOOTER
    ====================================================== --}}

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
