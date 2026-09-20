@extends('admin.app')

@section('title', 'Doctor Schedule')

@section('admin_content')

    <div class="container-fluid">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                    <h4 class="mb-sm-0">
                        Doctor Schedule
                    </h4>

                    <div class="page-title-right">

                        <ol class="breadcrumb m-0">

                            <li class="breadcrumb-item">
                                <a href="{{ route('doctor.section') }}">
                                    Doctors
                                </a>
                            </li>

                            <li class="breadcrumb-item active">
                                Schedule
                            </li>

                        </ol>

                    </div>

                </div>

            </div>
        </div>


        <!-- Doctor Information -->
        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h4 class="card-title mb-1">
                                    {{ $doctor->name }}
                                </h4>

                                <p class="text-muted mb-0">

                                    Doctor Code:
                                    <strong>
                                        {{ $doctor->doctor_code }}
                                    </strong>

                                    @if($doctor->department)

                                        &nbsp; | &nbsp;

                                        Department:
                                        <strong>
                                            {{ $doctor->department->name }}
                                        </strong>

                                    @endif

                                </p>

                            </div>

                            <div>

                                <a href="{{ route('doctor.section') }}"
                                   class="btn btn-secondary">

                                    <i class="ri-arrow-left-line"></i>
                                    Back

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Weekly Schedule -->
        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-header">

                        <h5 class="card-title mb-0">
                            Weekly Schedule
                        </h5>

                    </div>


                    <form
                        action="{{ route('doctor.schedule.update', $doctor->id) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered align-middle">

                                    <thead class="table-light">

                                    <tr>

                                        <th width="15%">
                                            Day
                                        </th>

                                        <th width="12%">
                                            Off
                                        </th>

                                        <th width="20%">
                                            Start Time
                                        </th>

                                        <th width="20%">
                                            End Time
                                        </th>

                                        <th width="18%">
                                            Slot Duration
                                        </th>

                                        <th width="15%">
                                            Status
                                        </th>

                                    </tr>

                                    </thead>


                                    <tbody>

                                    @foreach($days as $dayNumber => $dayName)

                                        @php
                                            $schedule = $schedules->get($dayNumber);
                                        @endphp

                                        <tr>

                                            <!-- Day -->
                                            <td>

                                                <strong>
                                                    {{ $dayName }}
                                                </strong>

                                            </td>


                                            <!-- Off -->
                                            <td>

                                                <div class="form-check form-switch">

                                                    {{-- Important:
                                                         unchecked checkbox will submit 0 --}}
                                                    <input
                                                        type="hidden"
                                                        name="schedules[{{ $dayNumber }}][is_off]"
                                                        value="0"
                                                    >

                                                    <input
                                                        class="form-check-input off-toggle"
                                                        type="checkbox"
                                                        name="schedules[{{ $dayNumber }}][is_off]"
                                                        value="1"
                                                        {{ $schedule && $schedule->is_off ? 'checked' : '' }}
                                                    >

                                                    <label class="form-check-label">
                                                        Off
                                                    </label>

                                                </div>

                                            </td>


                                            <!-- Start Time -->
                                            <td>

                                                <input
                                                    type="time"
                                                    class="form-control schedule-time"
                                                    name="schedules[{{ $dayNumber }}][start_time]"
                                                    value="{{ $schedule?->start_time ? \Carbon\Carbon::parse($schedule->start_time)->format('H:i') : '' }}"
                                                    {{ $schedule && $schedule->is_off ? 'readonly' : '' }}
                                                >

                                            </td>


                                            <!-- End Time -->
                                            <td>

                                                <input
                                                    type="time"
                                                    class="form-control schedule-time"
                                                    name="schedules[{{ $dayNumber }}][end_time]"
                                                    value="{{ $schedule?->end_time ? \Carbon\Carbon::parse($schedule->end_time)->format('H:i') : '' }}"
                                                    {{ $schedule && $schedule->is_off ? 'readonly' : '' }}
                                                >

                                            </td>


                                            <!-- Slot Duration -->
                                            <td>

                                                <select
                                                    class="form-select"
                                                    name="schedules[{{ $dayNumber }}][slot_duration]"
                                                >

                                                    <option
                                                        value="5"
                                                        {{ ($schedule?->slot_duration ?? 10) == 5 ? 'selected' : '' }}
                                                    >
                                                        5 Minutes
                                                    </option>

                                                    <option
                                                        value="10"
                                                        {{ ($schedule?->slot_duration ?? 10) == 10 ? 'selected' : '' }}
                                                    >
                                                        10 Minutes
                                                    </option>

                                                    <option
                                                        value="15"
                                                        {{ ($schedule?->slot_duration ?? 10) == 15 ? 'selected' : '' }}
                                                    >
                                                        15 Minutes
                                                    </option>

                                                    <option
                                                        value="20"
                                                        {{ ($schedule?->slot_duration ?? 10) == 20 ? 'selected' : '' }}
                                                    >
                                                        20 Minutes
                                                    </option>

                                                    <option
                                                        value="30"
                                                        {{ ($schedule?->slot_duration ?? 10) == 30 ? 'selected' : '' }}
                                                    >
                                                        30 Minutes
                                                    </option>

                                                    <option
                                                        value="45"
                                                        {{ ($schedule?->slot_duration ?? 10) == 45 ? 'selected' : '' }}
                                                    >
                                                        45 Minutes
                                                    </option>

                                                    <option
                                                        value="60"
                                                        {{ ($schedule?->slot_duration ?? 10) == 60 ? 'selected' : '' }}
                                                    >
                                                        60 Minutes
                                                    </option>

                                                </select>

                                            </td>


                                            <!-- Status -->
                                            <td class="schedule-status">

                                                @if($schedule && $schedule->is_off)

                                                    <span class="badge bg-danger">
                                                        Off
                                                    </span>

                                                @else

                                                    <span class="badge bg-success">
                                                        Available
                                                    </span>

                                                @endif

                                            </td>

                                        </tr>

                                    @endforeach

                                    </tbody>

                                </table>

                            </div>


                            <div class="mt-3">

                                <small class="text-muted">

                                    Set the doctor's weekly working hours
                                    and slot duration.

                                    Turn on
                                    <strong>Off</strong>
                                    for days when the doctor is unavailable.

                                </small>

                            </div>

                        </div>


                        <!-- Footer -->
                        <div class="card-footer text-end">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="ri-save-line"></i>

                                Update Schedule

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <!-- JavaScript -->
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('.off-toggle').forEach(function (toggle) {

                function updateRow() {

                    let row = toggle.closest('tr');

                    let timeInputs =
                        row.querySelectorAll('.schedule-time');

                    let status =
                        row.querySelector('.schedule-status');


                    /*
                     * Do NOT use disabled here.
                     *
                     * Disabled inputs are not submitted
                     * with the form.
                     */
                    timeInputs.forEach(function (input) {

                        input.readOnly = toggle.checked;

                    });


                    if (toggle.checked) {

                        status.innerHTML =
                            '<span class="badge bg-danger">Off</span>';

                    } else {

                        status.innerHTML =
                            '<span class="badge bg-success">Available</span>';

                    }

                }


                toggle.addEventListener(
                    'change',
                    updateRow
                );


                // Run on page load
                updateRow();

            });

        });

    </script>

@endsection
