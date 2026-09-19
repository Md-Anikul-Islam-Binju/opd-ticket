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
            transition: all 0.2s ease;
            user-select: none;
        }

        .calendar-day:hover {
            border-color: #198754;
            transform: translateY(-2px);
        }

        .calendar-day.disabled {
            background: #e9ecef;
            color: #999;
            cursor: not-allowed;
            border-color: #ddd;
        }

        .calendar-day.disabled:hover {
            border-color: #ddd;
            transform: none;
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
            transition: all 0.2s ease;
        }

        .slot-card:hover {
            border-color: #198754;
            transform: translateY(-2px);
        }

        .slot-card.booked,
        .slot-card.blocked {
            background: #f8d7da;
            border-color: #dc3545;
            color: #842029;
            cursor: not-allowed;
            opacity: 0.8;
        }

        .slot-card.booked:hover,
        .slot-card.blocked:hover {
            transform: none;
            border-color: #dc3545;
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

        .confirm-btn {
            min-height: 52px;
            border-radius: 10px;
        }

    </style>

</head>


<body>


<div class="container">

    <div class="appointment-wrapper">

        <div class="card appointment-card shadow">

            <div class="card-body p-4 p-md-5">


                {{-- =========================================================
                     PAGE HEADER
                ========================================================== --}}

                <h3 class="mb-2">
                    Book Appointment
                </h3>

                <p class="text-muted mb-4">
                    Select a department, date and available time slot.
                </p>


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
                     VALIDATION ERRORS
                ========================================================== --}}

                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- =========================================================
                     DEPARTMENT
                ========================================================== --}}

                <div class="mb-4">

                    <label
                        for="department_id"
                        class="form-label fw-semibold"
                    >
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


                {{-- =========================================================
                     APPOINTMENT DATE
                ========================================================== --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Select Appointment Date

                    </label>


                    @php

                        /*
                        |--------------------------------------------------------------------------
                        | IMPORTANT
                        |--------------------------------------------------------------------------
                        |
                        | Always calculate current date using Bangladesh timezone.
                        |
                        | This prevents UTC server time from showing the wrong date.
                        |
                        */

                        $today = now('Asia/Dhaka')->startOfDay();


                        /*
                        |--------------------------------------------------------------------------
                        | Carbon Day Of Week
                        |--------------------------------------------------------------------------
                        |
                        | Sunday    = 0
                        | Monday    = 1
                        | Tuesday   = 2
                        | Wednesday = 3
                        | Thursday  = 4
                        | Friday    = 5
                        | Saturday  = 6
                        |
                        */

                        $dayOfWeek = $today->dayOfWeek;


                        /*
                        |--------------------------------------------------------------------------
                        | Calendar Start
                        |--------------------------------------------------------------------------
                        |
                        | Saturday -> Thursday
                        | Current booking week.
                        |
                        | Friday -> Next Saturday.
                        |
                        */

                        if ($dayOfWeek == 5) {

                            /*
                            | Friday
                            | New booking week starts from tomorrow Saturday.
                            */

                            $calendarStart =
                                $today->copy()->addDay();

                        } else {

                            /*
                            | Saturday -> Thursday
                            |
                            | Find current week's Saturday.
                            */

                            $daysFromSaturday =
                                ($dayOfWeek + 1) % 7;

                            $calendarStart =
                                $today->copy()
                                    ->subDays($daysFromSaturday);

                        }

                    @endphp


                    <div
                        id="calendar"
                        class="row g-2"
                    >


                        @for($i = 0; $i < 7; $i++)

                            @php

                                /*
                                |--------------------------------------------------------------------------
                                | Current Calendar Date
                                |--------------------------------------------------------------------------
                                */

                                $date =
                                    $calendarStart->copy()
                                        ->addDays($i);


                                /*
                                |--------------------------------------------------------------------------
                                | Date String
                                |--------------------------------------------------------------------------
                                |
                                | Compare date only.
                                | Time will not affect the result.
                                |
                                */

                                $dateString =
                                    $date->format('Y-m-d');

                                $todayString =
                                    $today->format('Y-m-d');


                                /*
                                |--------------------------------------------------------------------------
                                | Past Date
                                |--------------------------------------------------------------------------
                                */

                                $isPast =
                                    $dateString < $todayString;


                                /*
                                |--------------------------------------------------------------------------
                                | Friday
                                |--------------------------------------------------------------------------
                                |
                                | Friday is always closed.
                                |
                                */

                                $isFriday =
                                    $date->dayOfWeek == 5;


                                /*
                                |--------------------------------------------------------------------------
                                | Disabled
                                |--------------------------------------------------------------------------
                                */

                                $disabled =
                                    $isPast || $isFriday;

                            @endphp


                            <div class="col-6 col-md">

                                <div
                                    class="calendar-day {{ $disabled ? 'disabled' : '' }}"
                                    data-date="{{ $dateString }}"
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


                {{-- =========================================================
                     AVAILABLE SLOTS
                ========================================================== --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Available Slots

                    </label>


                    <div
                        id="slotContainer"
                        class="row g-3"
                    >

                        <div class="col-12">

                            <div class="alert alert-light border mb-0">

                                Select department and date first.

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =========================================================
                     APPOINTMENT FORM
                ========================================================== --}}

                <form
                    method="POST"
                    action="{{ route('patient.appointment.store') }}"
                    id="appointmentForm"
                >

                    @csrf


                    {{-- Selected Slot --}}

                    <input
                        type="hidden"
                        name="slot_id"
                        id="slot_id"
                    >


                    {{-- =====================================================
                         NOTES
                    ====================================================== --}}

                    <div class="mb-4">

                        <label
                            for="notes"
                            class="form-label"
                        >
                            Notes
                        </label>


                        <textarea
                            name="notes"
                            id="notes"
                            class="form-control"
                            rows="4"
                            placeholder="Optional notes"
                        >{{ old('notes') }}</textarea>

                    </div>


                    {{-- =========================================================
     PAYMENT METHOD
========================================================== --}}

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Payment Method
                        </label>

                        <div class="row g-3">

                            {{-- Online Payment --}}

                            <div class="col-md-6">

                                <label
                                    class="payment-option d-block border rounded p-3"
                                    style="cursor: pointer;"
                                >

                                    <div class="form-check">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="payment_method"
                                            value="online"
                                            id="online_payment"
                                            {{ old('payment_method') === 'online' ? 'checked' : '' }}
                                        >

                                        <label
                                            class="form-check-label"
                                            for="online_payment"
                                        >

                                            <strong>
                                                Online Payment
                                            </strong>

                                        </label>

                                    </div>

                                    <div class="small text-muted mt-1 ms-4">

                                        Pay online after appointment confirmation.

                                    </div>

                                </label>

                            </div>


                            {{-- Manual Payment --}}

                            <div class="col-md-6">

                                <label
                                    class="payment-option d-block border rounded p-3"
                                    style="cursor: pointer;"
                                >

                                    <div class="form-check">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="payment_method"
                                            value="manual"
                                            id="manual_payment"
                                            {{ old('payment_method') === 'manual' ? 'checked' : '' }}
                                        >

                                        <label
                                            class="form-check-label"
                                            for="manual_payment"
                                        >

                                            <strong>
                                                Manual Payment
                                            </strong>

                                        </label>

                                    </div>

                                    <div class="small text-muted mt-1 ms-4">

                                        Pay at the hospital counter.

                                    </div>

                                </label>

                            </div>

                        </div>


                        @error('payment_method')

                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>

                        @enderror

                    </div>


                    {{-- =========================================================
                         NOTES
                    ========================================================== --}}

                    <div class="mb-4">

                        <label
                            for="notes"
                            class="form-label"
                        >
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            id="notes"
                            class="form-control"
                            rows="4"
                            placeholder="Optional notes"
                        >{{ old('notes') }}</textarea>

                    </div>


                    {{-- =====================================================
                         CONFIRM BUTTON
                    ====================================================== --}}

                    <button
                        type="submit"
                        id="confirmButton"
                        class="btn btn-success btn-lg w-100 confirm-btn"
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


    /*
    |--------------------------------------------------------------------------
    | Elements
    |--------------------------------------------------------------------------
    */

    const departmentSelect =
        document.getElementById('department_id');


    const slotContainer =
        document.getElementById('slotContainer');


    const slotInput =
        document.getElementById('slot_id');


    const confirmButton =
        document.getElementById('confirmButton');


    /*
    |--------------------------------------------------------------------------
    | Selected Date
    |--------------------------------------------------------------------------
    */

    let selectedDate = null;



    /*
    |--------------------------------------------------------------------------
    | Calendar Click
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.calendar-day')
        .forEach(function (day) {

            day.addEventListener(
                'click',
                function () {


                    /*
                    |--------------------------------------------------------------------------
                    | Disabled Date
                    |--------------------------------------------------------------------------
                    */

                    if (
                        this.dataset.disabled === '1'
                    ) {

                        return;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Department Required
                    |--------------------------------------------------------------------------
                    */

                    if (!departmentSelect.value) {

                        alert(
                            'Please select department first.'
                        );

                        return;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Remove Previous Selection
                    |--------------------------------------------------------------------------
                    */

                    document.querySelectorAll(
                        '.calendar-day'
                    ).forEach(function (item) {

                        item.classList.remove(
                            'selected'
                        );

                    });


                    /*
                    |--------------------------------------------------------------------------
                    | Select Date
                    |--------------------------------------------------------------------------
                    */

                    this.classList.add(
                        'selected'
                    );


                    selectedDate =
                        this.dataset.date;


                    /*
                    |--------------------------------------------------------------------------
                    | Load Slots
                    |--------------------------------------------------------------------------
                    */

                    loadSlots();

                }
            );

        });



    /*
    |--------------------------------------------------------------------------
    | Department Change
    |--------------------------------------------------------------------------
    */

    departmentSelect.addEventListener(
        'change',
        function () {


            /*
            |--------------------------------------------------------------------------
            | Reset Date
            |--------------------------------------------------------------------------
            */

            selectedDate = null;


            /*
            |--------------------------------------------------------------------------
            | Reset Slot
            |--------------------------------------------------------------------------
            */

            slotInput.value = '';


            /*
            |--------------------------------------------------------------------------
            | Disable Confirm Button
            |--------------------------------------------------------------------------
            */

            confirmButton.disabled = true;


            /*
            |--------------------------------------------------------------------------
            | Remove Date Selection
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll(
                '.calendar-day'
            ).forEach(function (item) {

                item.classList.remove(
                    'selected'
                );

            });


            /*
            |--------------------------------------------------------------------------
            | Reset Slot Container
            |--------------------------------------------------------------------------
            */

            slotContainer.innerHTML = `

                <div class="col-12">

                    <div class="alert alert-light border mb-0">

                        Select a date to see available slots.

                    </div>

                </div>

            `;

        }
    );



    /*
    |--------------------------------------------------------------------------
    | Load Slots
    |--------------------------------------------------------------------------
    */

    function loadSlots()
    {

        if (
            !departmentSelect.value ||
            !selectedDate
        ) {

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | Reset Selected Slot
        |--------------------------------------------------------------------------
        */

        slotInput.value = '';


        /*
        |--------------------------------------------------------------------------
        | Disable Confirm Button
        |--------------------------------------------------------------------------
        */

        confirmButton.disabled = true;


        /*
        |--------------------------------------------------------------------------
        | Loading
        |--------------------------------------------------------------------------
        */

        slotContainer.innerHTML = `

            <div class="col-12">

                <div class="alert alert-info mb-0">

                    Loading available slots...

                </div>

            </div>

        `;


        /*
        |--------------------------------------------------------------------------
        | Slots URL
        |--------------------------------------------------------------------------
        */

        const url =
            "{{ route('patient.appointment.slots') }}" +
            "?department_id=" +
            encodeURIComponent(
                departmentSelect.value
            ) +
            "&date=" +
            encodeURIComponent(
                selectedDate
            );


        /*
        |--------------------------------------------------------------------------
        | Fetch Slots
        |--------------------------------------------------------------------------
        */

        fetch(url)

            .then(function (response) {

                return response.json();

            })

            .then(function (data) {


                /*
                |--------------------------------------------------------------------------
                | API Error
                |--------------------------------------------------------------------------
                */

                if (!data.success) {

                    slotContainer.innerHTML = `

                        <div class="col-12">

                            <div class="alert alert-danger mb-0">

                                ${data.message}

                            </div>

                        </div>

                    `;

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | No Slots
                |--------------------------------------------------------------------------
                */

                if (
                    !data.slots ||
                    !data.slots.length
                ) {

                    slotContainer.innerHTML = `

                        <div class="col-12">

                            <div class="alert alert-warning mb-0">

                                No slots available for this date.

                            </div>

                        </div>

                    `;

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | Clear Slot Container
                |--------------------------------------------------------------------------
                */

                slotContainer.innerHTML = '';


                /*
                |--------------------------------------------------------------------------
                | Render Slots
                |--------------------------------------------------------------------------
                */

                data.slots.forEach(
                    function (slot) {


                        /*
                        |--------------------------------------------------------------------------
                        | Is Disabled
                        |--------------------------------------------------------------------------
                        */

                        const disabled =
                            slot.status !== 'available';


                        /*
                        |--------------------------------------------------------------------------
                        | Column
                        |--------------------------------------------------------------------------
                        */

                        const col =
                            document.createElement('div');

                        col.className =
                            'col-md-6 col-lg-4';


                        /*
                        |--------------------------------------------------------------------------
                        | Status Text
                        |--------------------------------------------------------------------------
                        */

                        let statusText = '';


                        if (
                            slot.status === 'available'
                        ) {

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


                        /*
                        |--------------------------------------------------------------------------
                        | Badge Class
                        |--------------------------------------------------------------------------
                        */

                        const badgeClass =
                            slot.status === 'available'
                                ? 'bg-success'
                                : 'bg-danger';


                        /*
                        |--------------------------------------------------------------------------
                        | Slot Card
                        |--------------------------------------------------------------------------
                        */

                        col.innerHTML = `

                            <div
                                class="slot-card ${slot.status}"
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

                                    <span class="badge ${badgeClass}">

                                        ${statusText}

                                    </span>

                                </div>

                            </div>

                        `;


                        /*
                        |--------------------------------------------------------------------------
                        | Card
                        |--------------------------------------------------------------------------
                        */

                        const card =
                            col.querySelector(
                                '.slot-card'
                            );


                        /*
                        |--------------------------------------------------------------------------
                        | Available Slot Click
                        |--------------------------------------------------------------------------
                        */

                        if (!disabled) {

                            card.addEventListener(
                                'click',
                                function () {


                                    /*
                                    |------------------------------------------------------
                                    | Remove Previous Selected Slot
                                    |------------------------------------------------------
                                    */

                                    document.querySelectorAll(
                                        '.slot-card'
                                    ).forEach(
                                        function (item) {

                                            item.classList.remove(
                                                'selected'
                                            );

                                        }
                                    );


                                    /*
                                    |------------------------------------------------------
                                    | Select Slot
                                    |------------------------------------------------------
                                    */

                                    this.classList.add(
                                        'selected'
                                    );


                                    /*
                                    |------------------------------------------------------
                                    | Set Slot ID
                                    |------------------------------------------------------
                                    */

                                    slotInput.value =
                                        this.dataset.id;


                                    /*
                                    |------------------------------------------------------
                                    | Enable Confirm Button
                                    |------------------------------------------------------
                                    */

                                    confirmButton.disabled =
                                        false;

                                }
                            );

                        }


                        /*
                        |--------------------------------------------------------------------------
                        | Add Slot
                        |--------------------------------------------------------------------------
                        */

                        slotContainer.appendChild(
                            col
                        );

                    }
                );

            })

            .catch(function (error) {


                /*
                |--------------------------------------------------------------------------
                | Request Error
                |--------------------------------------------------------------------------
                */

                slotContainer.innerHTML = `

                    <div class="col-12">

                        <div class="alert alert-danger mb-0">

                            Failed to load available slots.

                        </div>

                    </div>

                `;


                console.error(error);

            });

    }



    /*
    |--------------------------------------------------------------------------
    | Appointment Form Submit
    |--------------------------------------------------------------------------
    */

    document.getElementById(
        'appointmentForm'
    ).addEventListener(
        'submit',
        function (event) {


            /*
            |--------------------------------------------------------------------------
            | Slot Required
            |--------------------------------------------------------------------------
            */

            if (!slotInput.value) {

                event.preventDefault();

                alert(
                    'Please select an available slot.'
                );

                return;

            }

        }
    );

</script>


</body>

</html>
