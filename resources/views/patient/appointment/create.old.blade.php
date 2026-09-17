
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Book Appointment</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f5f7fb;
        }

        .appointment-wrapper {
            max-width: 1100px;
            margin: 50px auto;
        }

        .appointment-card {
            border: 0;
            border-radius: 16px;
            overflow: hidden;
        }

        .calendar-day {
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 15px 10px;
            text-align: center;
            cursor: pointer;
            background: #fff;
            transition: 0.2s;
        }

        .calendar-day:hover {
            border-color: #198754;
        }

        .calendar-day.disabled {
            background: #e9ecef;
            color: #999;
            cursor: not-allowed;
            border-color: #ddd;
        }

        .calendar-day.selected {
            background: #198754;
            color: #fff;
            border-color: #198754;
        }

        .slot-card {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 15px;
            background: #fff;
            cursor: pointer;
            transition: 0.2s;
        }

        .slot-card:hover {
            border-color: #198754;
        }

        .slot-card.available {
            background: #fff;
        }

        .slot-card.booked,
        .slot-card.blocked {
            background: #f8d7da;
            border-color: #dc3545;
            color: #842029;
            cursor: not-allowed;
            opacity: 0.8;
        }

        .slot-card.selected {
            background: #d1e7dd;
            border-color: #198754;
            color: #0f5132;
        }

        .slot-time {
            font-size: 18px;
            font-weight: 600;
        }

        .slot-doctor {
            font-size: 14px;
            margin-top: 5px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="appointment-wrapper">

        <div class="card appointment-card shadow">

            <div class="card-body p-4 p-md-5">

                <h3 class="mb-2">
                    Book Appointment
                </h3>

                <p class="text-muted mb-4">
                    Select a department, date and available time slot.
                </p>

                @if(session('success'))

                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif

                @if(session('error'))

                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>

                @endif

                {{-- Department --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Select Department
                    </label>

                    <select
                        id="department_id"
                        class="form-select form-select-lg"
                    >

                        <option value="">
                            Select Department
                        </option>

                        @foreach($departments as $department)

                            <option value="{{ $department->id }}">
                                {{ $department->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Calendar --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Select Appointment Date
                    </label>

                    <div
                        id="calendar"
                        class="row g-2"
                    >

                        @php

                            $today = now()->startOfDay();

                            $dayOfWeek = $today->dayOfWeek;

                            if ($dayOfWeek == 5) {

                                $calendarStart =
                                    $today->copy()->addDay();

                            } else {

                                $daysFromSaturday =
                                    ($dayOfWeek + 1) % 7;

                                $calendarStart =
                                    $today->copy()
                                        ->subDays($daysFromSaturday);

                            }

                        @endphp

                        @for($i = 0; $i < 7; $i++)

                            @php

                                $date =
                                    $calendarStart->copy()
                                        ->addDays($i);

                                $isPast =
                                    $date->lt($today);

                                $isFriday =
                                    $date->dayOfWeek == 5;

                                $disabled =
                                    $isPast || $isFriday;

                            @endphp

                            <div class="col-6 col-md">

                                <div
                                    class="calendar-day {{ $disabled ? 'disabled' : '' }}"
                                    data-date="{{ $date->format('Y-m-d') }}"
                                    data-disabled="{{ $disabled ? 1 : 0 }}"
                                >

                                    <div class="small">
                                        {{ $date->format('D') }}
                                    </div>

                                    <div class="fs-4 fw-bold">
                                        {{ $date->format('d') }}
                                    </div>

                                    <div class="small">
                                        {{ $date->format('M') }}
                                    </div>

                                </div>

                            </div>

                        @endfor

                    </div>

                </div>


                {{-- Slots --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Available Slots
                    </label>

                    <div
                        id="slotContainer"
                        class="row g-3"
                    >

                        <div class="col-12">

                            <div class="alert alert-light border">
                                Select department and date first.
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Booking Form --}}

                <form
                    method="POST"
                    action="{{ route('patient.appointment.store') }}"
                    id="appointmentForm"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="slot_id"
                        id="slot_id"
                    >


                    {{-- Payment Method --}}

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Payment Method
                        </label>

                        <div class="row g-3">

                            <div class="col-md-6">

                                <div class="form-check border rounded p-3">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="payment_method"
                                        value="online"
                                        id="online_payment"
                                    >

                                    <label
                                        class="form-check-label"
                                        for="online_payment"
                                    >

                                        <strong>
                                            Online Payment
                                        </strong>

                                        <div class="small text-muted">
                                            Pay online after appointment confirmation.
                                        </div>

                                    </label>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-check border rounded p-3">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="payment_method"
                                        value="manual"
                                        id="manual_payment"
                                    >

                                    <label
                                        class="form-check-label"
                                        for="manual_payment"
                                    >

                                        <strong>
                                            Manual Payment
                                        </strong>

                                        <div class="small text-muted">
                                            Pay at the hospital counter.
                                        </div>

                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Notes --}}

                    <div class="mb-4">

                        <label class="form-label">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            class="form-control"
                            rows="3"
                            placeholder="Optional notes"
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        id="confirmButton"
                        class="btn btn-success btn-lg w-100"
                        disabled
                    >
                        Confirm Appointment
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>


<script>

    const departmentSelect =
        document.getElementById('department_id');

    const slotContainer =
        document.getElementById('slotContainer');

    const slotInput =
        document.getElementById('slot_id');

    const confirmButton =
        document.getElementById('confirmButton');


    let selectedDate = null;


    /*
     * Calendar click
     */

    document.querySelectorAll('.calendar-day')
        .forEach(function (day) {

            day.addEventListener('click', function () {

                if (
                    this.dataset.disabled == '1'
                ) {
                    return;
                }

                if (!departmentSelect.value) {

                    alert(
                        'Please select department first.'
                    );

                    return;
                }


                document.querySelectorAll(
                    '.calendar-day'
                ).forEach(function (item) {

                    item.classList.remove(
                        'selected'
                    );

                });


                this.classList.add('selected');

                selectedDate =
                    this.dataset.date;


                loadSlots();

            });

        });


    /*
     * Department change
     */

    departmentSelect.addEventListener(
        'change',
        function () {

            selectedDate = null;

            slotInput.value = '';

            confirmButton.disabled = true;

            document.querySelectorAll(
                '.calendar-day'
            ).forEach(function (item) {

                item.classList.remove(
                    'selected'
                );

            });


            slotContainer.innerHTML = `
                <div class="col-12">
                    <div class="alert alert-light border">
                        Select a date to see slots.
                    </div>
                </div>
            `;

        }
    );


    /*
     * Load slots
     */

    function loadSlots()
    {

        if (
            !departmentSelect.value ||
            !selectedDate
        ) {
            return;
        }


        slotInput.value = '';

        confirmButton.disabled = true;


        slotContainer.innerHTML = `
            <div class="col-12">
                <div class="alert alert-info">
                    Loading available slots...
                </div>
            </div>
        `;


        const url =
            "{{ route('patient.appointment.slots') }}" +
            "?department_id=" +
            departmentSelect.value +
            "&date=" +
            selectedDate;


        fetch(url)

            .then(response => response.json())

            .then(data => {

                if (!data.success) {

                    slotContainer.innerHTML = `
                        <div class="col-12">
                            <div class="alert alert-danger">
                                ${data.message}
                            </div>
                        </div>
                    `;

                    return;
                }


                if (!data.slots.length) {

                    slotContainer.innerHTML = `
                        <div class="col-12">
                            <div class="alert alert-warning">
                                No slots available for this date.
                            </div>
                        </div>
                    `;

                    return;
                }


                slotContainer.innerHTML = '';


                data.slots.forEach(function (slot) {

                    let disabled =
                        slot.status !== 'available';

                    let statusClass =
                        slot.status;


                    let statusText = '';

                    if (slot.status === 'available') {

                        statusText =
                            'Available';

                    } else if (
                        slot.status === 'booked'
                    ) {

                        statusText =
                            'Booked';

                    } else {

                        statusText =
                            'Blocked';

                    }


                    const col =
                        document.createElement('div');

                    col.className =
                        'col-md-6 col-lg-4';


                    col.innerHTML = `

                        <div
                            class="slot-card ${statusClass}"
                            data-id="${slot.id}"
                            data-disabled="${disabled ? 1 : 0}"
                        >

                            <div class="slot-time">
                                ${slot.start_time}
                                -
                                ${slot.end_time}
                            </div>

                            <div class="slot-doctor">
                                Doctor:
                                <strong>
                                    ${slot.doctor_name}
                                </strong>
                            </div>

                            <div class="mt-2">

                                <span class="badge ${
                        slot.status === 'available'
                            ? 'bg-success'
                            : 'bg-danger'
                    }">

                                    ${statusText}

                                </span>

                            </div>

                        </div>
                    `;


                    const card =
                        col.querySelector(
                            '.slot-card'
                        );


                    if (!disabled) {

                        card.addEventListener(
                            'click',
                            function () {

                                document.querySelectorAll(
                                    '.slot-card'
                                ).forEach(
                                    function (item) {

                                        item.classList.remove(
                                            'selected'
                                        );

                                    }
                                );


                                this.classList.add(
                                    'selected'
                                );


                                slotInput.value =
                                    this.dataset.id;


                                confirmButton.disabled =
                                    false;

                            }
                        );

                    }


                    slotContainer.appendChild(col);

                });

            })

            .catch(function (error) {

                slotContainer.innerHTML = `
                    <div class="col-12">
                        <div class="alert alert-danger">
                            Failed to load slots.
                        </div>
                    </div>
                `;

                console.error(error);

            });

    }


    /*
     * Prevent submit without slot/payment.
     */

    document.getElementById(
        'appointmentForm'
    ).addEventListener(
        'submit',
        function (event) {

            if (!slotInput.value) {

                event.preventDefault();

                alert(
                    'Please select an available slot.'
                );

                return;
            }


            const payment =
                document.querySelector(
                    'input[name="payment_method"]:checked'
                );


            if (!payment) {

                event.preventDefault();

                alert(
                    'Please select a payment method.'
                );

            }

        }
    );

</script>

</body>

</html>
