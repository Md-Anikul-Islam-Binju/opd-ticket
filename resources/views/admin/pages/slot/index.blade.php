@extends('admin.app')

@section('title', 'Doctor Slots')

@section('admin_content')

    <div class="container-fluid">

        <!-- Page Header -->
        <div class="row">

            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                    <h4 class="mb-sm-0">
                        Doctor Slots
                    </h4>

                    <div class="page-title-right">

                        <ol class="breadcrumb m-0">

                            <li class="breadcrumb-item">
                                Doctors
                            </li>

                            <li class="breadcrumb-item active">
                                Slots
                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>


        <!-- Filter -->
        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-header">

                        <h5 class="card-title mb-0">
                            Filter Slots
                        </h5>

                    </div>

                    <div class="card-body">

                        <form
                            action="{{ route('doctor.slot.section') }}"
                            method="GET"
                        >

                            <div class="row">

                                <!-- Doctor -->
                                <div class="col-md-5">

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Doctor
                                        </label>

                                        <select
                                            name="doctor_id"
                                            class="form-select"
                                        >

                                            <option value="">
                                                All Doctors
                                            </option>

                                            @foreach($doctors as $doctor)

                                                <option
                                                    value="{{ $doctor->id }}"
                                                    {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}
                                                >
                                                    {{ $doctor->name }}
                                                    -
                                                    {{ $doctor->doctor_code }}
                                                    ({{ $doctor->department->name ?? 'N/A' }})
                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>


                                <!-- Date -->
                                <div class="col-md-4">

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Slot Date
                                        </label>

                                        <input
                                            type="date"
                                            name="date"
                                            class="form-control"
                                            value="{{ request('date') }}"
                                        >

                                    </div>

                                </div>


                                <!-- Buttons -->
                                <div class="col-md-3">

                                    <div class="mb-3">

                                        <label class="form-label d-block">
                                            &nbsp;
                                        </label>

                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >

                                            <i class="ri-search-line"></i>

                                            Filter

                                        </button>


                                        <a
                                            href="{{ route('doctor.slot.section') }}"
                                            class="btn btn-secondary"
                                        >

                                            <i class="ri-refresh-line"></i>

                                            Reset

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>


        <!-- Slot List -->
        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="card-title mb-0">
                                Doctor Slot List
                            </h5>

                            <span class="text-muted">

                                Total:
                                {{ $slots->total() }}

                            </span>

                        </div>

                    </div>


                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover align-middle">

                                <thead class="table-light">

                                <tr>

                                    <th width="5%">
                                        S/N
                                    </th>

                                    <th width="20%">
                                        Doctor
                                    </th>

                                    <th width="15%">
                                        Date
                                    </th>

                                    <th width="15%">
                                        Start Time
                                    </th>

                                    <th width="15%">
                                        End Time
                                    </th>

                                    <th width="10%">
                                        Status
                                    </th>

                                    <th width="10%">
                                        Reason
                                    </th>

                                    <th width="10%">
                                        Action
                                    </th>

                                </tr>

                                </thead>


                                <tbody>

                                @forelse($slots as $key => $slot)

                                    <tr>

                                        <!-- S/N -->
                                        <td>

                                            {{ $slots->firstItem() + $key }}

                                        </td>


                                        <!-- Doctor -->
                                        <td>

                                            @if($slot->doctor)

                                                <strong>
                                                    {{ $slot->doctor->name }}
                                                </strong>

                                                <br>

                                                <small class="text-muted">

                                                    {{ $slot->doctor->doctor_code }}

                                                </small>

                                            @else

                                                <span class="text-muted">
                                                    N/A
                                                </span>

                                            @endif

                                        </td>


                                        <!-- Date -->
                                        <td>

                                            {{ $slot->slot_date->format('d M Y') }}

                                        </td>


                                        <!-- Start Time -->
                                        <td>

                                            {{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }}

                                        </td>


                                        <!-- End Time -->
                                        <td>

                                            {{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }}

                                        </td>


                                        <!-- Status -->
                                        <td>

                                            @if($slot->status === 'available')

                                                <span class="badge bg-success">
                                                    Available
                                                </span>

                                            @elseif($slot->status === 'booked')

                                                <span class="badge bg-primary">
                                                    Booked
                                                </span>

                                            @elseif($slot->status === 'blocked')

                                                <span class="badge bg-danger">
                                                    Blocked
                                                </span>

                                            @endif

                                        </td>


                                        <!-- Reason -->
                                        <td>

                                            @if($slot->blocked_reason)

                                                <span
                                                    title="{{ $slot->blocked_reason }}"
                                                >
                                                    {{ \Illuminate\Support\Str::limit($slot->blocked_reason, 30) }}
                                                </span>

                                            @else

                                                <span class="text-muted">
                                                    —
                                                </span>

                                            @endif

                                        </td>


                                        <!-- Action -->
                                        <td>

                                            @if($slot->status === 'available')

                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#blockModal{{ $slot->id }}"
                                                >

                                                    <i class="ri-forbid-line"></i>
                                                    Block

                                                </button>


                                            @elseif($slot->status === 'blocked')

                                                <form
                                                    action="{{ route('doctor.slot.unblock', $slot->id) }}"
                                                    method="POST"
                                                    class="d-inline"
                                                >

                                                    @csrf
                                                    @method('PUT')

                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm btn-success"
                                                        onclick="return confirm('Are you sure you want to make this slot available again?')"
                                                    >

                                                        <i class="ri-checkbox-circle-line"></i>
                                                        Unblock

                                                    </button>

                                                </form>


                                            @elseif($slot->status === 'booked')

                                                <span class="text-muted">
                                                    —
                                                </span>

                                            @endif

                                        </td>

                                    </tr>


                                    <!-- Block Modal -->
                                    @if($slot->status === 'available')

                                        <div
                                            class="modal fade"
                                            id="blockModal{{ $slot->id }}"
                                            tabindex="-1"
                                            aria-hidden="true"
                                        >

                                            <div class="modal-dialog">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h5 class="modal-title">
                                                            Block Slot
                                                        </h5>

                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                        ></button>

                                                    </div>


                                                    <form
                                                        action="{{ route('doctor.slot.block', $slot->id) }}"
                                                        method="POST"
                                                    >

                                                        @csrf
                                                        @method('PUT')


                                                        <div class="modal-body">

                                                            <div class="alert alert-warning">

                                                                <strong>
                                                                    {{ $slot->doctor?->name }}
                                                                </strong>

                                                                <br>

                                                                {{ $slot->slot_date->format('d M Y') }}

                                                                <br>

                                                                {{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }}

                                                            </div>


                                                            <div class="mb-3">

                                                                <label class="form-label">
                                                                    Block Reason
                                                                </label>

                                                                <textarea
                                                                    name="blocked_reason"
                                                                    class="form-control"
                                                                    rows="3"
                                                                    placeholder="Enter reason for blocking this slot..."
                                                                ></textarea>

                                                            </div>

                                                        </div>


                                                        <div class="modal-footer">

                                                            <button
                                                                type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal"
                                                            >
                                                                Cancel
                                                            </button>

                                                            <button
                                                                type="submit"
                                                                class="btn btn-danger"
                                                            >

                                                                <i class="ri-forbid-line"></i>

                                                                Block Slot

                                                            </button>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    @endif

                                @empty

                                    <tr>

                                        <td
                                            colspan="8"
                                            class="text-center py-4"
                                        >

                                            <div class="text-muted">

                                                <i
                                                    class="ri-calendar-close-line"
                                                    style="font-size: 35px;"
                                                ></i>

                                                <p class="mb-0 mt-2">
                                                    No slots found.
                                                </p>

                                            </div>

                                        </td>

                                    </tr>

                                @endforelse

                                </tbody>

                            </table>

                        </div>


                        <!-- Pagination -->
                        <div class="mt-3">

                            {{ $slots->links('pagination::bootstrap-5') }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
