<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Patient Dashboard</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f5f7fa;
        }

        .navbar-brand {
            font-weight: 600;
        }

        .dashboard-title {
            font-weight: 700;
        }

        .info-card {
            border: 0;
            border-radius: 12px;
        }

        .info-label {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 4px;
        }

        .info-value {
            font-weight: 600;
            color: #212529;
        }

        .appointment-card {
            border: 0;
            border-radius: 12px;
            overflow: hidden;
        }

        .table th {
            white-space: nowrap;
            font-size: 14px;
        }

        .table td {
            vertical-align: middle;
            font-size: 14px;
        }

        .ticket-link {
            font-weight: 700;
            text-decoration: none;
            color: #0d6efd;
        }

        .ticket-link:hover {
            text-decoration: underline;
        }

        .action-btn {
            white-space: nowrap;
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


        <form
            action="{{ route('patient.logout') }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="btn btn-outline-light"
            >
                Logout
            </button>

        </form>

    </div>

</nav>



<div class="container py-5">


    {{-- =========================================================
         SUCCESS MESSAGE
    ========================================================== --}}

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif



    {{-- =========================================================
         ERROR MESSAGE
    ========================================================== --}}

    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif



    {{-- =========================================================
         DASHBOARD HEADER
    ========================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="dashboard-title mb-1">

                Welcome,
                {{ $patient->user->name }}

            </h3>

            <p class="text-muted mb-0">
                Patient Dashboard
            </p>

        </div>


        <div>

            <a
                href="{{ route('patient.appointment.create') }}"
                class="btn btn-primary"
            >
                + Book Appointment
            </a>

        </div>

    </div>



    {{-- =========================================================
         PATIENT INFORMATION
    ========================================================== --}}

    <div class="card shadow-sm info-card mb-4">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Patient Information
            </h5>

        </div>


        <div class="card-body">

            <div class="row">


                {{-- Patient Code --}}

                <div class="col-md-4 mb-3">

                    <div class="info-label">
                        Patient Code
                    </div>

                    <div class="info-value">
                        {{ $patient->patient_code }}
                    </div>

                </div>



                {{-- Phone --}}

                <div class="col-md-4 mb-3">

                    <div class="info-label">
                        Phone
                    </div>

                    <div class="info-value">
                        {{ $patient->phone }}
                    </div>

                </div>



                {{-- Email --}}

                <div class="col-md-4 mb-3">

                    <div class="info-label">
                        Email
                    </div>

                    <div class="info-value">
                        {{ $patient->user->email }}
                    </div>

                </div>



                {{-- Date of Birth --}}

                <div class="col-md-4 mb-3">

                    <div class="info-label">
                        Date of Birth
                    </div>

                    <div class="info-value">

                        {{ $patient->date_of_birth?->format('d M Y') ?? 'N/A' }}

                    </div>

                </div>



                {{-- Age --}}

                <div class="col-md-4 mb-3">

                    <div class="info-label">
                        Age
                    </div>

                    <div class="info-value">

                        {{ $patient->age ?? 'N/A' }}

                    </div>

                </div>



                {{-- Gender --}}

                <div class="col-md-4 mb-3">

                    <div class="info-label">
                        Gender
                    </div>

                    <div class="info-value">

                        {{ ucfirst($patient->gender ?? 'N/A') }}

                    </div>

                </div>



                {{-- Division --}}

                <div class="col-md-4 mb-3">

                    <div class="info-label">
                        Division
                    </div>

                    <div class="info-value">

                        {{ $patient->division ?? 'N/A' }}

                    </div>

                </div>



                {{-- District --}}

                <div class="col-md-4 mb-3">

                    <div class="info-label">
                        District
                    </div>

                    <div class="info-value">

                        {{ $patient->district ?? 'N/A' }}

                    </div>

                </div>



                {{-- Upazila --}}

                <div class="col-md-4 mb-3">

                    <div class="info-label">
                        Upazila
                    </div>

                    <div class="info-value">

                        {{ $patient->upazila ?? 'N/A' }}

                    </div>

                </div>



                {{-- Post Office --}}

                <div class="col-md-6 mb-3">

                    <div class="info-label">
                        Post Office
                    </div>

                    <div class="info-value">

                        {{ $patient->post_office ?? 'N/A' }}

                    </div>

                </div>



                {{-- NID --}}

                <div class="col-md-6 mb-3">

                    <div class="info-label">
                        NID Number
                    </div>

                    <div class="info-value">

                        {{ $patient->nid_number ?? 'N/A' }}

                    </div>

                </div>



                {{-- Address --}}

                <div class="col-12 mb-0">

                    <div class="info-label">
                        Address
                    </div>

                    <div class="info-value">

                        {{ $patient->address ?? 'N/A' }}

                    </div>

                </div>


            </div>

        </div>

    </div>



    {{-- =========================================================
         LATEST APPOINTMENTS
    ========================================================== --}}

    <div class="card shadow-sm appointment-card">

        <div class="card-header bg-white">

            <div class="d-flex justify-content-between align-items-center">

                <h5 class="mb-0">
                    Latest Appointments
                </h5>


                <a
                    href="{{ route('patient.appointment.create') }}"
                    class="btn btn-sm btn-outline-primary"
                >
                    Book New
                </a>

            </div>

        </div>



        <div class="card-body p-0">

            @if($appointments->count())


                <div class="table-responsive">

                    <table class="table table-bordered table-hover mb-0">

                        <thead class="table-light">

                        <tr>

                            <th>
                                Ticket
                            </th>

                            <th>
                                Doctor
                            </th>

                            <th>
                                Department
                            </th>

                            <th>
                                Date
                            </th>

                            <th>
                                Time
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-center">
                                Action
                            </th>

                        </tr>

                        </thead>


                        <tbody>


                        @foreach($appointments as $appointment)


                            <tr>


                                {{-- =================================
                                     TICKET
                                ================================== --}}

                                <td>

                                    <a
                                        href="{{ route('patient.appointment.show', $appointment->id) }}"
                                        class="ticket-link"
                                    >

                                        {{ $appointment->ticket_number }}

                                    </a>

                                </td>



                                {{-- =================================
                                     DOCTOR
                                ================================== --}}

                                <td>

                                    Dr.
                                    {{ $appointment->doctor->name ?? 'N/A' }}

                                </td>



                                {{-- =================================
                                     DEPARTMENT
                                ================================== --}}

                                <td>

                                    {{ $appointment->department->name ?? 'N/A' }}

                                </td>



                                {{-- =================================
                                     DATE
                                ================================== --}}

                                <td>

                                    {{ $appointment->appointment_date?->format('d M Y') }}

                                </td>



                                {{-- =================================
                                     TIME
                                ================================== --}}

                                <td>

                                    {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}

                                    -

                                    {{ \Carbon\Carbon::parse($appointment->end_time)->format('h:i A') }}

                                </td>



                                {{-- =================================
                                     STATUS
                                ================================== --}}

                                <td>


                                    @if($appointment->status === 'completed')

                                        <span class="badge bg-success">
                                            Completed
                                        </span>


                                    @elseif($appointment->status === 'cancelled')

                                        <span class="badge bg-danger">
                                            Cancelled
                                        </span>


                                    @elseif($appointment->status === 'confirmed')

                                        <span class="badge bg-primary">
                                            Confirmed
                                        </span>


                                    @elseif($appointment->status === 'no_show')

                                        <span class="badge bg-dark">
                                            No Show
                                        </span>


                                    @else

                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    @endif


                                </td>



                                {{-- =================================
                                     ACTION
                                ================================== --}}

                                <td class="text-center">


                                    <a
                                        href="{{ route('patient.appointment.show', $appointment->id) }}"
                                        class="btn btn-sm btn-primary action-btn"
                                    >
                                        View Ticket
                                    </a>


                                </td>


                            </tr>


                        @endforeach


                        </tbody>

                    </table>

                </div>


            @else


                <div class="p-5 text-center">

                    <div class="text-muted mb-3">

                        You don't have any appointments yet.

                    </div>


                    <a
                        href="{{ route('patient.appointment.create') }}"
                        class="btn btn-primary"
                    >
                        Book Your First Appointment
                    </a>

                </div>


            @endif

        </div>

    </div>


</div>


</body>

</html>
