{{--@extends('admin.app')--}}
{{--@section('admin_content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <div class="page-title-box">--}}
{{--                <div class="page-title-right">--}}
{{--                    <ol class="breadcrumb m-0">--}}
{{--                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Dashboard</a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>--}}
{{--                        <li class="breadcrumb-item active">Welcome!</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
{{--                <h4 class="page-title">Welcome!</h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-xxl-3 col-sm-6">--}}
{{--            <div class="card widget-flat text-bg-pink">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="float-end">--}}
{{--                        <i class="ri-app-store-line widget-icon"></i>--}}
{{--                    </div>--}}
{{--                    <h6 class="text-uppercase mt-0" title="Customers">Total</h6>--}}
{{--                    <h2 class="my-2">100</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xxl-3 col-sm-6">--}}
{{--            <div class="card widget-flat text-bg-purple">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="float-end">--}}
{{--                        <i class="ri-profile-line widget-icon"></i>--}}
{{--                    </div>--}}
{{--                    <h6 class="text-uppercase mt-0" title="Customers">Total</h6>--}}
{{--                    <h2 class="my-2">200</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xxl-3 col-sm-6">--}}
{{--            <div class="card widget-flat text-bg-info">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="float-end">--}}
{{--                        <i class="ri-route-line widget-icon"></i>--}}
{{--                    </div>--}}
{{--                    <h6 class="text-uppercase mt-0" title="Customers">Total</h6>--}}
{{--                    <h2 class="my-2">300</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xxl-3 col-sm-6">--}}
{{--            <div class="card widget-flat text-bg-primary">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="float-end">--}}
{{--                        <i class="ri-file-line widget-icon"></i>--}}
{{--                    </div>--}}
{{--                    <h6 class="text-uppercase mt-0" title="Customers">Total </h6>--}}
{{--                    <h2 class="my-2">400</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}


@extends('admin.app')

@section('admin_content')


    {{-- =========================================
         PAGE TITLE
    ========================================== --}}

    <div class="row">

        <div class="col-12">

            <div class="page-title-box">

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">
                                Admin Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">
                                Dashboards
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Welcome!
                        </li>

                    </ol>

                </div>

                <h4 class="page-title">
                    Welcome!
                </h4>

            </div>

        </div>

    </div>



    {{-- =========================================
         MAIN STATISTICS
    ========================================== --}}

    <div class="row">


        {{-- PATIENTS --}}

        <div class="col-xxl-3 col-sm-6">

            <div class="card widget-flat text-bg-primary">

                <div class="card-body">

                    <div class="float-end">

                        <i class="ri-user-heart-line widget-icon"></i>

                    </div>

                    <h6 class="text-uppercase mt-0">
                        Total Patients
                    </h6>

                    <h2 class="my-2">
                        {{ number_format($totalPatients) }}
                    </h2>

                    <p class="mb-0">

                        <span class="text-nowrap">
                            Registered patients
                        </span>

                    </p>

                </div>

            </div>

        </div>



        {{-- DOCTORS --}}

        <div class="col-xxl-3 col-sm-6">

            <div class="card widget-flat text-bg-success">

                <div class="card-body">

                    <div class="float-end">

                        <i class="ri-stethoscope-line widget-icon"></i>

                    </div>

                    <h6 class="text-uppercase mt-0">
                        Total Doctors
                    </h6>

                    <h2 class="my-2">
                        {{ number_format($totalDoctors) }}
                    </h2>

                    <p class="mb-0">

                        <span class="text-nowrap">
                            Active doctors
                        </span>

                    </p>

                </div>

            </div>

        </div>



        {{-- DEPARTMENTS --}}

        <div class="col-xxl-3 col-sm-6">

            <div class="card widget-flat text-bg-info">

                <div class="card-body">

                    <div class="float-end">

                        <i class="ri-hospital-line widget-icon"></i>

                    </div>

                    <h6 class="text-uppercase mt-0">
                        Departments
                    </h6>

                    <h2 class="my-2">
                        {{ number_format($totalDepartments) }}
                    </h2>

                    <p class="mb-0">

                        <span class="text-nowrap">
                            Active departments
                        </span>

                    </p>

                </div>

            </div>

        </div>



        {{-- APPOINTMENTS --}}

        <div class="col-xxl-3 col-sm-6">

            <div class="card widget-flat text-bg-purple">

                <div class="card-body">

                    <div class="float-end">

                        <i class="ri-calendar-check-line widget-icon"></i>

                    </div>

                    <h6 class="text-uppercase mt-0">
                        Total Appointments
                    </h6>

                    <h2 class="my-2">
                        {{ number_format($totalAppointments) }}
                    </h2>

                    <p class="mb-0">

                        <span class="text-nowrap">
                            All appointments
                        </span>

                    </p>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================
         SECOND STATISTICS
    ========================================== --}}

    <div class="row">


        {{-- TODAY --}}

        <div class="col-xl-3 col-md-6">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">

                            <div class="avatar-sm rounded bg-primary-subtle">

                                <span class="avatar-title">

                                    <i class="ri-calendar-event-line fs-20 text-primary"></i>

                                </span>

                            </div>

                        </div>

                        <div class="flex-grow-1 ms-3">

                            <p class="text-muted mb-1">
                                Today's Appointments
                            </p>

                            <h4 class="mb-0">
                                {{ $todayAppointments }}
                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- PENDING --}}

        <div class="col-xl-3 col-md-6">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">

                            <div class="avatar-sm rounded bg-warning-subtle">

                                <span class="avatar-title">

                                    <i class="ri-time-line fs-20 text-warning"></i>

                                </span>

                            </div>

                        </div>

                        <div class="flex-grow-1 ms-3">

                            <p class="text-muted mb-1">
                                Pending
                            </p>

                            <h4 class="mb-0">
                                {{ $pendingAppointments }}
                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- CONFIRMED --}}

        <div class="col-xl-3 col-md-6">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">

                            <div class="avatar-sm rounded bg-success-subtle">

                                <span class="avatar-title">

                                    <i class="ri-checkbox-circle-line fs-20 text-success"></i>

                                </span>

                            </div>

                        </div>

                        <div class="flex-grow-1 ms-3">

                            <p class="text-muted mb-1">
                                Confirmed
                            </p>

                            <h4 class="mb-0">
                                {{ $confirmedAppointments }}
                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- COMPLETED --}}

        <div class="col-xl-3 col-md-6">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">

                            <div class="avatar-sm rounded bg-info-subtle">

                                <span class="avatar-title">

                                    <i class="ri-check-double-line fs-20 text-info"></i>

                                </span>

                            </div>

                        </div>

                        <div class="flex-grow-1 ms-3">

                            <p class="text-muted mb-1">
                                Completed
                            </p>

                            <h4 class="mb-0">
                                {{ $completedAppointments }}
                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================
         CHARTS
    ========================================== --}}

    <div class="row">


        {{-- MONTHLY APPOINTMENT CHART --}}

        <div class="col-xl-8">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="header-title mb-0">
                            Appointment Overview
                        </h4>

                        <span class="text-muted">
                            {{ now()->year }}
                        </span>

                    </div>

                    <div
                        id="appointment-chart"
                        style="height: 350px;"
                    ></div>

                </div>

            </div>

        </div>



        {{-- STATUS CHART --}}

        <div class="col-xl-4">

            <div class="card">

                <div class="card-body">

                    <h4 class="header-title mb-3">
                        Appointment Status
                    </h4>

                    <div
                        id="appointment-status-chart"
                        style="height: 350px;"
                    ></div>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================
         RECENT APPOINTMENTS
    ========================================== --}}

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-body">


                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>

                            <h4 class="header-title mb-1">
                                Recent Appointments
                            </h4>

                            <p class="text-muted mb-0">
                                Latest patient appointments
                            </p>

                        </div>

                        <a
                            href="#"
                            class="btn btn-sm btn-primary"
                        >
                            View All
                        </a>

                    </div>


                    <div class="table-responsive">

                        <table class="table table-hover table-centered mb-0">

                            <thead class="table-light">

                            <tr>

                                <th>
                                    Ticket
                                </th>

                                <th>
                                    Patient
                                </th>

                                <th>
                                    Department
                                </th>

                                <th>
                                    Doctor
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

                            </tr>

                            </thead>


                            <tbody>


                            @forelse($recentAppointments as $appointment)

                                <tr>


                                    {{-- TICKET --}}

                                    <td>

                                        <span class="fw-semibold text-primary">

                                            {{ $appointment->ticket_number }}

                                        </span>

                                    </td>


                                    {{-- PATIENT --}}

                                    <td>



                                                <h5 class="font-14 mb-0">

                                                    {{ optional($appointment->patient->user)->name
                                                        ?? 'N/A'
                                                    }}

                                                </h5>

                                                <small class="text-muted">

                                                    {{ optional($appointment->patient)->patient_code }}

                                                </small>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- DEPARTMENT --}}

                                    <td>

                                        {{ optional($appointment->department)->name ?? 'N/A' }}

                                    </td>


                                    {{-- DOCTOR --}}

                                    <td>

                                        {{ optional($appointment->doctor)->name ?? 'N/A' }}

                                    </td>


                                    {{-- DATE --}}

                                    <td>

                                        {{ $appointment->appointment_date
                                            ? $appointment->appointment_date->format('d M Y')
                                            : 'N/A'
                                        }}

                                    </td>


                                    {{-- TIME --}}

                                    <td>

                                        @if($appointment->start_time)

                                            {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}

                                        @else

                                            N/A

                                        @endif

                                    </td>


                                    {{-- STATUS --}}

                                    <td>

                                        @if($appointment->status === 'pending')

                                            <span class="badge bg-warning-subtle text-warning">
                                                Pending
                                            </span>

                                        @elseif($appointment->status === 'confirmed')

                                            <span class="badge bg-success-subtle text-success">
                                                Confirmed
                                            </span>

                                        @elseif($appointment->status === 'completed')

                                            <span class="badge bg-info-subtle text-info">
                                                Completed
                                            </span>

                                        @elseif($appointment->status === 'cancelled')

                                            <span class="badge bg-danger-subtle text-danger">
                                                Cancelled
                                            </span>

                                        @elseif($appointment->status === 'no_show')

                                            <span class="badge bg-secondary-subtle text-secondary">
                                                No Show
                                            </span>

                                        @else

                                            <span class="badge bg-secondary-subtle text-secondary">
                                                {{ ucfirst($appointment->status) }}
                                            </span>

                                        @endif

                                    </td>


                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="text-center py-4"
                                    >

                                        <div class="text-muted">

                                            <i class="ri-calendar-line fs-24"></i>

                                            <p class="mb-0 mt-2">
                                                No appointments found.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse


                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================
         APEX CHART
    ========================================== --}}

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


    <script>

        document.addEventListener('DOMContentLoaded', function () {


            /* ==================================
               MONTHLY APPOINTMENTS
            ================================== */

            var appointmentOptions = {

                chart: {

                    type: 'area',

                    height: 350,

                    toolbar: {
                        show: false
                    },

                    zoom: {
                        enabled: false
                    }

                },


                series: [

                    {
                        name: 'Appointments',

                        data: @json($monthlyAppointments)
                    }

                ],


                xaxis: {

                    categories: [

                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'

                    ]

                },


                stroke: {

                    curve: 'smooth',

                    width: 3

                },


                dataLabels: {

                    enabled: false

                },


                grid: {

                    borderColor: '#eef2f7'

                },


                tooltip: {

                    y: {

                        formatter: function (value) {

                            return value + ' Appointments';

                        }

                    }

                }

            };


            var appointmentChart =
                new ApexCharts(
                    document.querySelector('#appointment-chart'),
                    appointmentOptions
                );


            appointmentChart.render();



            /* ==================================
               STATUS CHART
            ================================== */

            var statusOptions = {

                chart: {

                    type: 'donut',

                    height: 350

                },


                series: @json($appointmentStatus),


                labels: [

                    'Pending',
                    'Confirmed',
                    'Completed',
                    'Cancelled'

                ],


                legend: {

                    position: 'bottom'

                },


                dataLabels: {

                    enabled: true

                },


                tooltip: {

                    y: {

                        formatter: function (value) {

                            return value + ' Appointments';

                        }

                    }

                }

            };


            var statusChart =
                new ApexCharts(
                    document.querySelector('#appointment-status-chart'),
                    statusOptions
                );


            statusChart.render();

        });

    </script>


@endsection
