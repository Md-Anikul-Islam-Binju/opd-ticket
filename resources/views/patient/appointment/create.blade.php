{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}

{{--    <meta charset="UTF-8">--}}

{{--    <meta--}}
{{--        name="viewport"--}}
{{--        content="width=device-width, initial-scale=1.0"--}}
{{--    >--}}

{{--    <title>Book Appointment</title>--}}

{{--    <link--}}
{{--        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"--}}
{{--        rel="stylesheet"--}}
{{--    >--}}

{{--    <style>--}}

{{--        body {--}}
{{--            background: #f5f7fb;--}}
{{--        }--}}

{{--        .appointment-wrapper {--}}
{{--            max-width: 1100px;--}}
{{--            margin: 50px auto;--}}
{{--        }--}}

{{--        .appointment-card {--}}
{{--            border: 0;--}}
{{--            border-radius: 16px;--}}
{{--            overflow: hidden;--}}
{{--        }--}}

{{--        .calendar-day {--}}
{{--            border: 1px solid #ddd;--}}
{{--            /*border-radius: 12px;*/--}}
{{--            padding: 15px 10px;--}}
{{--            text-align: center;--}}
{{--            cursor: pointer;--}}
{{--            background: #fff;--}}
{{--            transition: all 0.2s ease;--}}
{{--            user-select: none;--}}
{{--        }--}}

{{--        .calendar-day:hover {--}}
{{--            border-color: #198754;--}}
{{--            transform: translateY(-2px);--}}
{{--        }--}}

{{--        .calendar-day.disabled {--}}
{{--            background: #e9ecef;--}}
{{--            color: #999;--}}
{{--            cursor: not-allowed;--}}
{{--            border-color: #ddd;--}}
{{--        }--}}

{{--        .calendar-day.disabled:hover {--}}
{{--            border-color: #ddd;--}}
{{--            transform: none;--}}
{{--        }--}}

{{--        .calendar-day.selected {--}}
{{--            background: #198754;--}}
{{--            color: #fff;--}}
{{--            border-color: #198754;--}}
{{--        }--}}

{{--        .slot-card {--}}
{{--            border: 2px solid #e5e7eb;--}}
{{--            border-radius: 12px;--}}
{{--            padding: 15px;--}}
{{--            background: #fff;--}}
{{--            cursor: pointer;--}}
{{--            transition: all 0.2s ease;--}}
{{--        }--}}

{{--        .slot-card:hover {--}}
{{--            border-color: #198754;--}}
{{--            transform: translateY(-2px);--}}
{{--        }--}}

{{--        .slot-card.booked,--}}
{{--        .slot-card.blocked {--}}
{{--            background: #f8d7da;--}}
{{--            border-color: #dc3545;--}}
{{--            color: #842029;--}}
{{--            cursor: not-allowed;--}}
{{--            opacity: 0.8;--}}
{{--        }--}}

{{--        .slot-card.booked:hover,--}}
{{--        .slot-card.blocked:hover {--}}
{{--            transform: none;--}}
{{--            border-color: #dc3545;--}}
{{--        }--}}

{{--        .slot-card.selected {--}}
{{--            background: #d1e7dd;--}}
{{--            border-color: #198754;--}}
{{--            color: #0f5132;--}}
{{--        }--}}

{{--        .slot-time {--}}
{{--            font-size: 18px;--}}
{{--            font-weight: 600;--}}
{{--        }--}}

{{--        .slot-doctor {--}}
{{--            font-size: 14px;--}}
{{--            margin-top: 5px;--}}
{{--        }--}}

{{--        .confirm-btn {--}}
{{--            min-height: 52px;--}}
{{--            border-radius: 10px;--}}
{{--        }--}}

{{--    </style>--}}

{{--</head>--}}


{{--<body>--}}


{{--<div class="container">--}}

{{--    <div class="appointment-wrapper">--}}

{{--        <div class="card appointment-card shadow">--}}

{{--            <div class="card-body p-4 p-md-5">--}}


{{--                --}}{{-- =========================================================--}}
{{--                     PAGE HEADER--}}
{{--                ========================================================== --}}

{{--                <h3 class="mb-2">--}}
{{--                    Book Appointment--}}
{{--                </h3>--}}

{{--                <p class="text-muted mb-4">--}}
{{--                    Select a department, date and available time slot.--}}
{{--                </p>--}}


{{--                --}}{{-- =========================================================--}}
{{--                     SUCCESS MESSAGE--}}
{{--                ========================================================== --}}

{{--                @if(session('success'))--}}

{{--                    <div class="alert alert-success">--}}
{{--                        {{ session('success') }}--}}
{{--                    </div>--}}

{{--                @endif--}}


{{--                --}}{{-- =========================================================--}}
{{--                     ERROR MESSAGE--}}
{{--                ========================================================== --}}

{{--                @if(session('error'))--}}

{{--                    <div class="alert alert-danger">--}}
{{--                        {{ session('error') }}--}}
{{--                    </div>--}}

{{--                @endif--}}


{{--                --}}{{-- =========================================================--}}
{{--                     VALIDATION ERRORS--}}
{{--                ========================================================== --}}

{{--                @if($errors->any())--}}

{{--                    <div class="alert alert-danger">--}}

{{--                        <ul class="mb-0">--}}

{{--                            @foreach($errors->all() as $error)--}}

{{--                                <li>--}}
{{--                                    {{ $error }}--}}
{{--                                </li>--}}

{{--                            @endforeach--}}

{{--                        </ul>--}}

{{--                    </div>--}}

{{--                @endif--}}


{{--                --}}{{-- =========================================================--}}
{{--                     DEPARTMENT--}}
{{--                ========================================================== --}}

{{--                <div class="mb-4">--}}

{{--                    <label--}}
{{--                        for="department_id"--}}
{{--                        class="form-label fw-semibold"--}}
{{--                    >--}}
{{--                        Select Department--}}
{{--                    </label>--}}


{{--                    <select--}}
{{--                        id="department_id"--}}
{{--                        class="form-select form-select-lg"--}}
{{--                    >--}}

{{--                        <option value="">--}}
{{--                            Select Department--}}
{{--                        </option>--}}


{{--                        @foreach($departments as $department)--}}

{{--                            <option value="{{ $department->id }}">--}}

{{--                                {{ $department->name }}--}}

{{--                            </option>--}}

{{--                        @endforeach--}}

{{--                    </select>--}}

{{--                </div>--}}


{{--                --}}{{-- =========================================================--}}
{{--                     APPOINTMENT DATE--}}
{{--                ========================================================== --}}

{{--                <div class="mb-4">--}}

{{--                    <label class="form-label fw-semibold">--}}

{{--                        Select Appointment Date--}}

{{--                    </label>--}}


{{--                    @php--}}

{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | IMPORTANT--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        |--}}
{{--                        | Always calculate current date using Bangladesh timezone.--}}
{{--                        |--}}
{{--                        | This prevents UTC server time from showing the wrong date.--}}
{{--                        |--}}
{{--                        */--}}

{{--                        $today = now('Asia/Dhaka')->startOfDay();--}}


{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | Carbon Day Of Week--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        |--}}
{{--                        | Sunday    = 0--}}
{{--                        | Monday    = 1--}}
{{--                        | Tuesday   = 2--}}
{{--                        | Wednesday = 3--}}
{{--                        | Thursday  = 4--}}
{{--                        | Friday    = 5--}}
{{--                        | Saturday  = 6--}}
{{--                        |--}}
{{--                        */--}}

{{--                        $dayOfWeek = $today->dayOfWeek;--}}


{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | Calendar Start--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        |--}}
{{--                        | Saturday -> Thursday--}}
{{--                        | Current booking week.--}}
{{--                        |--}}
{{--                        | Friday -> Next Saturday.--}}
{{--                        |--}}
{{--                        */--}}

{{--                        if ($dayOfWeek == 5) {--}}

{{--                            /*--}}
{{--                            | Friday--}}
{{--                            | New booking week starts from tomorrow Saturday.--}}
{{--                            */--}}

{{--                            $calendarStart =--}}
{{--                                $today->copy()->addDay();--}}

{{--                        } else {--}}

{{--                            /*--}}
{{--                            | Saturday -> Thursday--}}
{{--                            |--}}
{{--                            | Find current week's Saturday.--}}
{{--                            */--}}

{{--                            $daysFromSaturday =--}}
{{--                                ($dayOfWeek + 1) % 7;--}}

{{--                            $calendarStart =--}}
{{--                                $today->copy()--}}
{{--                                    ->subDays($daysFromSaturday);--}}

{{--                        }--}}

{{--                    @endphp--}}


{{--                    <div--}}
{{--                        id="calendar"--}}
{{--                        class="row g-2"--}}
{{--                    >--}}


{{--                        @for($i = 0; $i < 7; $i++)--}}

{{--                            @php--}}

{{--                                /*--}}
{{--                                |----------------------------------------------------------------------------}}
{{--                                | Current Calendar Date--}}
{{--                                |----------------------------------------------------------------------------}}
{{--                                */--}}

{{--                                $date =--}}
{{--                                    $calendarStart->copy()--}}
{{--                                        ->addDays($i);--}}


{{--                                /*--}}
{{--                                |----------------------------------------------------------------------------}}
{{--                                | Date String--}}
{{--                                |----------------------------------------------------------------------------}}
{{--                                |--}}
{{--                                | Compare date only.--}}
{{--                                | Time will not affect the result.--}}
{{--                                |--}}
{{--                                */--}}

{{--                                $dateString =--}}
{{--                                    $date->format('Y-m-d');--}}

{{--                                $todayString =--}}
{{--                                    $today->format('Y-m-d');--}}


{{--                                /*--}}
{{--                                |----------------------------------------------------------------------------}}
{{--                                | Past Date--}}
{{--                                |----------------------------------------------------------------------------}}
{{--                                */--}}

{{--                                $isPast =--}}
{{--                                    $dateString < $todayString;--}}


{{--                                /*--}}
{{--                                |----------------------------------------------------------------------------}}
{{--                                | Friday--}}
{{--                                |----------------------------------------------------------------------------}}
{{--                                |--}}
{{--                                | Friday is always closed.--}}
{{--                                |--}}
{{--                                */--}}

{{--                                $isFriday =--}}
{{--                                    $date->dayOfWeek == 5;--}}


{{--                                /*--}}
{{--                                |----------------------------------------------------------------------------}}
{{--                                | Disabled--}}
{{--                                |----------------------------------------------------------------------------}}
{{--                                */--}}

{{--                                $disabled =--}}
{{--                                    $isPast || $isFriday;--}}

{{--                            @endphp--}}


{{--                            <div class="col-6 col-md">--}}

{{--                                <div--}}
{{--                                    class="calendar-day {{ $disabled ? 'disabled' : '' }}"--}}
{{--                                    data-date="{{ $dateString }}"--}}
{{--                                    data-disabled="{{ $disabled ? 1 : 0 }}"--}}
{{--                                >--}}

{{--                                    <div class="small">--}}

{{--                                        {{ $date->format('D') }}--}}

{{--                                    </div>--}}


{{--                                    <div class="fs-4 fw-bold">--}}

{{--                                        {{ $date->format('d') }}--}}

{{--                                    </div>--}}


{{--                                    <div class="small">--}}

{{--                                        {{ $date->format('M') }}--}}

{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        @endfor--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--                --}}{{-- =========================================================--}}
{{--                     AVAILABLE SLOTS--}}
{{--                ========================================================== --}}

{{--                <div class="mb-4">--}}

{{--                    <label class="form-label fw-semibold">--}}

{{--                        Available Slots--}}

{{--                    </label>--}}


{{--                    <div--}}
{{--                        id="slotContainer"--}}
{{--                        class="row g-3"--}}
{{--                    >--}}

{{--                        <div class="col-12">--}}

{{--                            <div class="alert alert-light border mb-0">--}}

{{--                                Select department and date first.--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--                --}}{{-- =========================================================--}}
{{--                     APPOINTMENT FORM--}}
{{--                ========================================================== --}}

{{--                <form--}}
{{--                    method="POST"--}}
{{--                    action="{{ route('patient.appointment.store') }}"--}}
{{--                    id="appointmentForm"--}}
{{--                >--}}

{{--                    @csrf--}}


{{--                    --}}{{-- Selected Slot --}}

{{--                    <input--}}
{{--                        type="hidden"--}}
{{--                        name="slot_id"--}}
{{--                        id="slot_id"--}}
{{--                    >--}}


{{--                    --}}{{-- =====================================================--}}
{{--                         NOTES--}}
{{--                    ====================================================== --}}

{{--                    <div class="mb-4">--}}

{{--                        <label--}}
{{--                            for="notes"--}}
{{--                            class="form-label"--}}
{{--                        >--}}
{{--                            Notes--}}
{{--                        </label>--}}


{{--                        <textarea--}}
{{--                            name="notes"--}}
{{--                            id="notes"--}}
{{--                            class="form-control"--}}
{{--                            rows="4"--}}
{{--                            placeholder="Optional notes"--}}
{{--                        >{{ old('notes') }}</textarea>--}}

{{--                    </div>--}}


{{--                    --}}{{-- =========================================================--}}
{{--     PAYMENT METHOD--}}
{{--========================================================== --}}

{{--                    <div class="mb-4">--}}

{{--                        <label class="form-label fw-semibold">--}}
{{--                            Payment Method--}}
{{--                        </label>--}}

{{--                        <div class="row g-3">--}}

{{--                            --}}{{-- Online Payment --}}

{{--                            <div class="col-md-6">--}}

{{--                                <label--}}
{{--                                    class="payment-option d-block border rounded p-3"--}}
{{--                                    style="cursor: pointer;"--}}
{{--                                >--}}

{{--                                    <div class="form-check">--}}

{{--                                        <input--}}
{{--                                            class="form-check-input"--}}
{{--                                            type="radio"--}}
{{--                                            name="payment_method"--}}
{{--                                            value="online"--}}
{{--                                            id="online_payment"--}}
{{--                                            {{ old('payment_method') === 'online' ? 'checked' : '' }}--}}
{{--                                        >--}}

{{--                                        <label--}}
{{--                                            class="form-check-label"--}}
{{--                                            for="online_payment"--}}
{{--                                        >--}}

{{--                                            <strong>--}}
{{--                                                Online Payment--}}
{{--                                            </strong>--}}

{{--                                        </label>--}}

{{--                                    </div>--}}

{{--                                    <div class="small text-muted mt-1 ms-4">--}}

{{--                                        Pay online after appointment confirmation.--}}

{{--                                    </div>--}}

{{--                                </label>--}}

{{--                            </div>--}}


{{--                            --}}{{-- Manual Payment --}}

{{--                            <div class="col-md-6">--}}

{{--                                <label--}}
{{--                                    class="payment-option d-block border rounded p-3"--}}
{{--                                    style="cursor: pointer;"--}}
{{--                                >--}}

{{--                                    <div class="form-check">--}}

{{--                                        <input--}}
{{--                                            class="form-check-input"--}}
{{--                                            type="radio"--}}
{{--                                            name="payment_method"--}}
{{--                                            value="manual"--}}
{{--                                            id="manual_payment"--}}
{{--                                            {{ old('payment_method') === 'manual' ? 'checked' : '' }}--}}
{{--                                        >--}}

{{--                                        <label--}}
{{--                                            class="form-check-label"--}}
{{--                                            for="manual_payment"--}}
{{--                                        >--}}

{{--                                            <strong>--}}
{{--                                                Manual Payment--}}
{{--                                            </strong>--}}

{{--                                        </label>--}}

{{--                                    </div>--}}

{{--                                    <div class="small text-muted mt-1 ms-4">--}}

{{--                                        Pay at the hospital counter.--}}

{{--                                    </div>--}}

{{--                                </label>--}}

{{--                            </div>--}}

{{--                        </div>--}}


{{--                        @error('payment_method')--}}

{{--                        <div class="text-danger mt-2">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}

{{--                        @enderror--}}

{{--                    </div>--}}


{{--                    --}}{{-- =========================================================--}}
{{--                         NOTES--}}
{{--                    ========================================================== --}}

{{--                    <div class="mb-4">--}}

{{--                        <label--}}
{{--                            for="notes"--}}
{{--                            class="form-label"--}}
{{--                        >--}}
{{--                            Notes--}}
{{--                        </label>--}}

{{--                        <textarea--}}
{{--                            name="notes"--}}
{{--                            id="notes"--}}
{{--                            class="form-control"--}}
{{--                            rows="4"--}}
{{--                            placeholder="Optional notes"--}}
{{--                        >{{ old('notes') }}</textarea>--}}

{{--                    </div>--}}


{{--                    --}}{{-- =====================================================--}}
{{--                         CONFIRM BUTTON--}}
{{--                    ====================================================== --}}

{{--                    <button--}}
{{--                        type="submit"--}}
{{--                        id="confirmButton"--}}
{{--                        class="btn btn-success btn-lg w-100 confirm-btn"--}}
{{--                        disabled--}}
{{--                    >--}}

{{--                        Confirm Appointment--}}

{{--                    </button>--}}

{{--                </form>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}

{{--</div>--}}



{{--<script>--}}


{{--    /*--}}
{{--    |----------------------------------------------------------------------------}}
{{--    | Elements--}}
{{--    |----------------------------------------------------------------------------}}
{{--    */--}}

{{--    const departmentSelect =--}}
{{--        document.getElementById('department_id');--}}


{{--    const slotContainer =--}}
{{--        document.getElementById('slotContainer');--}}


{{--    const slotInput =--}}
{{--        document.getElementById('slot_id');--}}


{{--    const confirmButton =--}}
{{--        document.getElementById('confirmButton');--}}


{{--    /*--}}
{{--    |----------------------------------------------------------------------------}}
{{--    | Selected Date--}}
{{--    |----------------------------------------------------------------------------}}
{{--    */--}}

{{--    let selectedDate = null;--}}



{{--    /*--}}
{{--    |----------------------------------------------------------------------------}}
{{--    | Calendar Click--}}
{{--    |----------------------------------------------------------------------------}}
{{--    */--}}

{{--    document.querySelectorAll('.calendar-day')--}}
{{--        .forEach(function (day) {--}}

{{--            day.addEventListener(--}}
{{--                'click',--}}
{{--                function () {--}}


{{--                    /*--}}
{{--                    |----------------------------------------------------------------------------}}
{{--                    | Disabled Date--}}
{{--                    |----------------------------------------------------------------------------}}
{{--                    */--}}

{{--                    if (--}}
{{--                        this.dataset.disabled === '1'--}}
{{--                    ) {--}}

{{--                        return;--}}

{{--                    }--}}


{{--                    /*--}}
{{--                    |----------------------------------------------------------------------------}}
{{--                    | Department Required--}}
{{--                    |----------------------------------------------------------------------------}}
{{--                    */--}}

{{--                    if (!departmentSelect.value) {--}}

{{--                        alert(--}}
{{--                            'Please select department first.'--}}
{{--                        );--}}

{{--                        return;--}}

{{--                    }--}}


{{--                    /*--}}
{{--                    |----------------------------------------------------------------------------}}
{{--                    | Remove Previous Selection--}}
{{--                    |----------------------------------------------------------------------------}}
{{--                    */--}}

{{--                    document.querySelectorAll(--}}
{{--                        '.calendar-day'--}}
{{--                    ).forEach(function (item) {--}}

{{--                        item.classList.remove(--}}
{{--                            'selected'--}}
{{--                        );--}}

{{--                    });--}}


{{--                    /*--}}
{{--                    |----------------------------------------------------------------------------}}
{{--                    | Select Date--}}
{{--                    |----------------------------------------------------------------------------}}
{{--                    */--}}

{{--                    this.classList.add(--}}
{{--                        'selected'--}}
{{--                    );--}}


{{--                    selectedDate =--}}
{{--                        this.dataset.date;--}}


{{--                    /*--}}
{{--                    |----------------------------------------------------------------------------}}
{{--                    | Load Slots--}}
{{--                    |----------------------------------------------------------------------------}}
{{--                    */--}}

{{--                    loadSlots();--}}

{{--                }--}}
{{--            );--}}

{{--        });--}}



{{--    /*--}}
{{--    |----------------------------------------------------------------------------}}
{{--    | Department Change--}}
{{--    |----------------------------------------------------------------------------}}
{{--    */--}}

{{--    departmentSelect.addEventListener(--}}
{{--        'change',--}}
{{--        function () {--}}


{{--            /*--}}
{{--            |----------------------------------------------------------------------------}}
{{--            | Reset Date--}}
{{--            |----------------------------------------------------------------------------}}
{{--            */--}}

{{--            selectedDate = null;--}}


{{--            /*--}}
{{--            |----------------------------------------------------------------------------}}
{{--            | Reset Slot--}}
{{--            |----------------------------------------------------------------------------}}
{{--            */--}}

{{--            slotInput.value = '';--}}


{{--            /*--}}
{{--            |----------------------------------------------------------------------------}}
{{--            | Disable Confirm Button--}}
{{--            |----------------------------------------------------------------------------}}
{{--            */--}}

{{--            confirmButton.disabled = true;--}}


{{--            /*--}}
{{--            |----------------------------------------------------------------------------}}
{{--            | Remove Date Selection--}}
{{--            |----------------------------------------------------------------------------}}
{{--            */--}}

{{--            document.querySelectorAll(--}}
{{--                '.calendar-day'--}}
{{--            ).forEach(function (item) {--}}

{{--                item.classList.remove(--}}
{{--                    'selected'--}}
{{--                );--}}

{{--            });--}}


{{--            /*--}}
{{--            |----------------------------------------------------------------------------}}
{{--            | Reset Slot Container--}}
{{--            |----------------------------------------------------------------------------}}
{{--            */--}}

{{--            slotContainer.innerHTML = `--}}

{{--                <div class="col-12">--}}

{{--                    <div class="alert alert-light border mb-0">--}}

{{--                        Select a date to see available slots.--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--            `;--}}

{{--        }--}}
{{--    );--}}



{{--    /*--}}
{{--    |----------------------------------------------------------------------------}}
{{--    | Load Slots--}}
{{--    |----------------------------------------------------------------------------}}
{{--    */--}}

{{--    function loadSlots()--}}
{{--    {--}}

{{--        if (--}}
{{--            !departmentSelect.value ||--}}
{{--            !selectedDate--}}
{{--        ) {--}}

{{--            return;--}}

{{--        }--}}


{{--        /*--}}
{{--        |----------------------------------------------------------------------------}}
{{--        | Reset Selected Slot--}}
{{--        |----------------------------------------------------------------------------}}
{{--        */--}}

{{--        slotInput.value = '';--}}


{{--        /*--}}
{{--        |----------------------------------------------------------------------------}}
{{--        | Disable Confirm Button--}}
{{--        |----------------------------------------------------------------------------}}
{{--        */--}}

{{--        confirmButton.disabled = true;--}}


{{--        /*--}}
{{--        |----------------------------------------------------------------------------}}
{{--        | Loading--}}
{{--        |----------------------------------------------------------------------------}}
{{--        */--}}

{{--        slotContainer.innerHTML = `--}}

{{--            <div class="col-12">--}}

{{--                <div class="alert alert-info mb-0">--}}

{{--                    Loading available slots...--}}

{{--                </div>--}}

{{--            </div>--}}

{{--        `;--}}


{{--        /*--}}
{{--        |----------------------------------------------------------------------------}}
{{--        | Slots URL--}}
{{--        |----------------------------------------------------------------------------}}
{{--        */--}}

{{--        const url =--}}
{{--            "{{ route('patient.appointment.slots') }}" +--}}
{{--            "?department_id=" +--}}
{{--            encodeURIComponent(--}}
{{--                departmentSelect.value--}}
{{--            ) +--}}
{{--            "&date=" +--}}
{{--            encodeURIComponent(--}}
{{--                selectedDate--}}
{{--            );--}}


{{--        /*--}}
{{--        |----------------------------------------------------------------------------}}
{{--        | Fetch Slots--}}
{{--        |----------------------------------------------------------------------------}}
{{--        */--}}

{{--        fetch(url)--}}

{{--            .then(function (response) {--}}

{{--                return response.json();--}}

{{--            })--}}

{{--            .then(function (data) {--}}


{{--                /*--}}
{{--                |----------------------------------------------------------------------------}}
{{--                | API Error--}}
{{--                |----------------------------------------------------------------------------}}
{{--                */--}}

{{--                if (!data.success) {--}}

{{--                    slotContainer.innerHTML = `--}}

{{--                        <div class="col-12">--}}

{{--                            <div class="alert alert-danger mb-0">--}}

{{--                                ${data.message}--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                    `;--}}

{{--                    return;--}}

{{--                }--}}


{{--                /*--}}
{{--                |----------------------------------------------------------------------------}}
{{--                | No Slots--}}
{{--                |----------------------------------------------------------------------------}}
{{--                */--}}

{{--                if (--}}
{{--                    !data.slots ||--}}
{{--                    !data.slots.length--}}
{{--                ) {--}}

{{--                    slotContainer.innerHTML = `--}}

{{--                        <div class="col-12">--}}

{{--                            <div class="alert alert-warning mb-0">--}}

{{--                                No slots available for this date.--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                    `;--}}

{{--                    return;--}}

{{--                }--}}


{{--                /*--}}
{{--                |----------------------------------------------------------------------------}}
{{--                | Clear Slot Container--}}
{{--                |----------------------------------------------------------------------------}}
{{--                */--}}

{{--                slotContainer.innerHTML = '';--}}


{{--                /*--}}
{{--                |----------------------------------------------------------------------------}}
{{--                | Render Slots--}}
{{--                |----------------------------------------------------------------------------}}
{{--                */--}}

{{--                data.slots.forEach(--}}
{{--                    function (slot) {--}}


{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | Is Disabled--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        */--}}

{{--                        const disabled =--}}
{{--                            slot.status !== 'available';--}}


{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | Column--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        */--}}

{{--                        const col =--}}
{{--                            document.createElement('div');--}}

{{--                        col.className =--}}
{{--                            'col-md-6 col-lg-4';--}}


{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | Status Text--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        */--}}

{{--                        let statusText = '';--}}


{{--                        if (--}}
{{--                            slot.status === 'available'--}}
{{--                        ) {--}}

{{--                            statusText =--}}
{{--                                'Available';--}}

{{--                        } else if (--}}
{{--                            slot.status === 'booked'--}}
{{--                        ) {--}}

{{--                            statusText =--}}
{{--                                'Booked';--}}

{{--                        } else {--}}

{{--                            statusText =--}}
{{--                                'Blocked';--}}

{{--                        }--}}


{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | Badge Class--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        */--}}

{{--                        const badgeClass =--}}
{{--                            slot.status === 'available'--}}
{{--                                ? 'bg-success'--}}
{{--                                : 'bg-danger';--}}


{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | Slot Card--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        */--}}

{{--                        col.innerHTML = `--}}

{{--                            <div--}}
{{--                                class="slot-card ${slot.status}"--}}
{{--                                data-id="${slot.id}"--}}
{{--                                data-disabled="${disabled ? 1 : 0}"--}}
{{--                            >--}}

{{--                                <div class="slot-time">--}}

{{--                                    ${slot.start_time}--}}

{{--                                    ---}}

{{--                                    ${slot.end_time}--}}

{{--                                </div>--}}


{{--                                <div class="slot-doctor">--}}

{{--                                    Doctor:--}}

{{--                                    <strong>--}}
{{--                                        ${slot.doctor_name}--}}
{{--                                    </strong>--}}

{{--                                </div>--}}


{{--                                <div class="mt-2">--}}

{{--                                    <span class="badge ${badgeClass}">--}}

{{--                                        ${statusText}--}}

{{--                                    </span>--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        `;--}}


{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | Card--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        */--}}

{{--                        const card =--}}
{{--                            col.querySelector(--}}
{{--                                '.slot-card'--}}
{{--                            );--}}


{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | Available Slot Click--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        */--}}

{{--                        if (!disabled) {--}}

{{--                            card.addEventListener(--}}
{{--                                'click',--}}
{{--                                function () {--}}


{{--                                    /*--}}
{{--                                    |--------------------------------------------------------}}
{{--                                    | Remove Previous Selected Slot--}}
{{--                                    |--------------------------------------------------------}}
{{--                                    */--}}

{{--                                    document.querySelectorAll(--}}
{{--                                        '.slot-card'--}}
{{--                                    ).forEach(--}}
{{--                                        function (item) {--}}

{{--                                            item.classList.remove(--}}
{{--                                                'selected'--}}
{{--                                            );--}}

{{--                                        }--}}
{{--                                    );--}}


{{--                                    /*--}}
{{--                                    |--------------------------------------------------------}}
{{--                                    | Select Slot--}}
{{--                                    |--------------------------------------------------------}}
{{--                                    */--}}

{{--                                    this.classList.add(--}}
{{--                                        'selected'--}}
{{--                                    );--}}


{{--                                    /*--}}
{{--                                    |--------------------------------------------------------}}
{{--                                    | Set Slot ID--}}
{{--                                    |--------------------------------------------------------}}
{{--                                    */--}}

{{--                                    slotInput.value =--}}
{{--                                        this.dataset.id;--}}


{{--                                    /*--}}
{{--                                    |--------------------------------------------------------}}
{{--                                    | Enable Confirm Button--}}
{{--                                    |--------------------------------------------------------}}
{{--                                    */--}}

{{--                                    confirmButton.disabled =--}}
{{--                                        false;--}}

{{--                                }--}}
{{--                            );--}}

{{--                        }--}}


{{--                        /*--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        | Add Slot--}}
{{--                        |----------------------------------------------------------------------------}}
{{--                        */--}}

{{--                        slotContainer.appendChild(--}}
{{--                            col--}}
{{--                        );--}}

{{--                    }--}}
{{--                );--}}

{{--            })--}}

{{--            .catch(function (error) {--}}


{{--                /*--}}
{{--                |----------------------------------------------------------------------------}}
{{--                | Request Error--}}
{{--                |----------------------------------------------------------------------------}}
{{--                */--}}

{{--                slotContainer.innerHTML = `--}}

{{--                    <div class="col-12">--}}

{{--                        <div class="alert alert-danger mb-0">--}}

{{--                            Failed to load available slots.--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--                `;--}}


{{--                console.error(error);--}}

{{--            });--}}

{{--    }--}}



{{--    /*--}}
{{--    |----------------------------------------------------------------------------}}
{{--    | Appointment Form Submit--}}
{{--    |----------------------------------------------------------------------------}}
{{--    */--}}

{{--    document.getElementById(--}}
{{--        'appointmentForm'--}}
{{--    ).addEventListener(--}}
{{--        'submit',--}}
{{--        function (event) {--}}


{{--            /*--}}
{{--            |----------------------------------------------------------------------------}}
{{--            | Slot Required--}}
{{--            |----------------------------------------------------------------------------}}
{{--            */--}}

{{--            if (!slotInput.value) {--}}

{{--                event.preventDefault();--}}

{{--                alert(--}}
{{--                    'Please select an available slot.'--}}
{{--                );--}}

{{--                return;--}}

{{--            }--}}

{{--        }--}}
{{--    );--}}

{{--</script>--}}


{{--</body>--}}

{{--</html>--}}

@extends('patient.index')
@section('content')

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- =========================
             Page Header
        ========================== --}}
        <div class="mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                Book Appointment
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Select department, appointment date and available time slot.
            </p>
        </div>


        {{-- =========================
             Alerts
        ========================== --}}

        @if(session('success'))
            <div class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif


        @if($errors->any())
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">

                <div class="font-semibold mb-2">
                    Please fix the following errors:
                </div>

                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        {{-- =========================
             Main Card
        ========================== --}}

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            {{-- Card Header --}}
            <div class="px-5 sm:px-6 py-5 border-b border-gray-200">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                        <i class="fa-solid fa-calendar-check text-lg"></i>
                    </div>

                    <div>
                        <h2 class="text-lg font-bold text-gray-800">
                            Appointment Information
                        </h2>

                        <p class="text-sm text-gray-500">
                            Choose your preferred department and date.
                        </p>
                    </div>

                </div>

            </div>


            <form
                action="{{ route('patient.appointment.store') }}"
                method="POST"
                id="appointmentForm"
            >

                @csrf

                <div class="p-5 sm:p-6 space-y-8">


                    {{-- =========================
                         Department
                    ========================== --}}

                    <div>

                        <label
                            for="department_id"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Department
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            name="department_id"
                            id="department_id"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-700
                               focus:border-teal-500 focus:ring-2 focus:ring-teal-100
                               outline-none transition"
                            required
                        >

                            <option value="">
                                Select Department
                            </option>

                            @foreach($departments as $department)

                                <option
                                    value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}
                                >
                                    {{ $department->name }}
                                </option>

                            @endforeach

                        </select>

                        <p class="mt-2 text-xs text-gray-500">
                            Doctor will be assigned automatically based on the selected department.
                        </p>

                    </div>


                    {{-- =========================
                         Appointment Date
                    ========================== --}}

                    <div>

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-4">

                            <div>

                                <label class="block text-sm font-semibold text-gray-700">
                                    Appointment Date
                                    <span class="text-red-500">*</span>
                                </label>

                                <p class="text-xs text-gray-500 mt-1">
                                    Select a Saturday to Thursday date.
                                </p>

                            </div>

                            <div class="text-xs text-gray-500">
                                {{ $weekStart->format('d M Y') }}
                                -
                                {{ $weekEnd->format('d M Y') }}
                            </div>

                        </div>


                        {{-- =========================
                             Calendar
                        ========================== --}}

                        <div
                            id="calendarContainer"
                            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-3"
                        >

                            @php
                                $today = now('Asia/Dhaka')->startOfDay();
                                $todayString = $today->format('Y-m-d');
                            @endphp


                            @for($i = 0; $i < 7; $i++)

                                @php

                                    $date = $weekStart->copy()->addDays($i);

                                    $dateString = $date->format('Y-m-d');

                                    $isPast = $dateString < $todayString;

                                    $isFriday = $date->dayOfWeek == 5;

                                    $disabled = $isPast || $isFriday;

                                @endphp


                                <button
                                    type="button"
                                    class="
                                    calendar-day
                                    w-full
                                    min-w-0
                                    min-h-[105px]
                                    rounded-xl
                                    border
                                    p-3
                                    text-center
                                    transition-all
                                    duration-200

                                    {{ $disabled
                                        ? 'bg-gray-100 border-gray-200 text-gray-400 cursor-not-allowed'
                                        : 'bg-white border-gray-200 text-gray-700 hover:border-teal-400 hover:bg-teal-50 hover:-translate-y-0.5 cursor-pointer'
                                    }}
                                "
                                    data-date="{{ $dateString }}"
                                    data-disabled="{{ $disabled ? '1' : '0' }}"
                                    {{ $disabled ? 'disabled' : '' }}
                                >

                                    <div class="text-xs font-medium mb-2">
                                        {{ $date->format('D') }}
                                    </div>

                                    <div
                                        class="text-2xl font-bold
                                    {{ $disabled ? 'text-gray-400' : 'text-gray-800' }}"
                                    >
                                        {{ $date->format('d') }}
                                    </div>

                                    <div class="text-xs mt-1">
                                        {{ $date->format('M') }}
                                    </div>

                                    @if($isFriday)

                                        <div class="mt-2 text-[10px] font-semibold text-red-500">
                                            Closed
                                        </div>

                                    @elseif($isPast)

                                        <div class="mt-2 text-[10px] font-semibold text-gray-400">
                                            Past
                                        </div>

                                    @endif

                                </button>

                            @endfor

                        </div>


                        {{-- Calendar message --}}

                        <div
                            id="calendarMessage"
                            class="mt-4 rounded-xl bg-gray-50 border border-gray-200 px-4 py-3 text-sm text-gray-500"
                        >

                            <div class="flex items-center gap-2">

                                <i class="fa-solid fa-circle-info text-teal-500"></i>

                                <span>
                                Please select a department first, then choose an appointment date.
                            </span>

                            </div>

                        </div>

                    </div>


                    {{-- =========================
                         Available Slots
                    ========================== --}}

                    <div>

                        <div class="mb-4">

                            <label class="block text-sm font-semibold text-gray-700">
                                Available Time Slots
                            </label>

                            <p class="text-xs text-gray-500 mt-1">
                                Select an available time slot.
                            </p>

                        </div>


                        <div
                            id="slotContainer"
                            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"
                        >

                            <div
                                class="col-span-full rounded-xl border border-dashed border-gray-300 bg-gray-50 px-5 py-8 text-center"
                            >

                                <div
                                    class="w-12 h-12 mx-auto rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-400"
                                >
                                    <i class="fa-regular fa-clock text-lg"></i>
                                </div>

                                <p class="mt-3 text-sm font-medium text-gray-600">
                                    Select department and date
                                </p>

                                <p class="mt-1 text-xs text-gray-400">
                                    Available appointment slots will appear here.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- =========================
                         Hidden Slot
                    ========================== --}}

                    <input
                        type="hidden"
                        name="slot_id"
                        id="slot_id"
                        value="{{ old('slot_id') }}"
                    >


                    {{-- =========================
                         Payment Method
                    ========================== --}}

                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Payment Method
                            <span class="text-red-500">*</span>
                        </label>


                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            {{-- Online --}}
                            <label class="relative cursor-pointer">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="online"
                                    class="peer sr-only"
                                    {{ old('payment_method') == 'online' ? 'checked' : '' }}
                                >

                                <div
                                    class="rounded-xl border-2 border-gray-200 bg-white p-4
                                       peer-checked:border-teal-500
                                       peer-checked:bg-teal-50
                                       hover:border-teal-300
                                       transition"
                                >

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="w-10 h-10 rounded-lg bg-teal-100 text-teal-600
                                               flex items-center justify-center"
                                        >
                                            <i class="fa-solid fa-credit-card"></i>
                                        </div>

                                        <div>

                                            <div class="font-semibold text-gray-800">
                                                Online Payment
                                            </div>

                                            <div class="text-xs text-gray-500">
                                                Pay online
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </label>


                            {{-- Manual --}}
                            <label class="relative cursor-pointer">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="manual"
                                    class="peer sr-only"
                                    {{ old('payment_method') == 'manual' ? 'checked' : '' }}
                                >

                                <div
                                    class="rounded-xl border-2 border-gray-200 bg-white p-4
                                       peer-checked:border-teal-500
                                       peer-checked:bg-teal-50
                                       hover:border-teal-300
                                       transition"
                                >

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="w-10 h-10 rounded-lg bg-gray-100 text-gray-600
                                               flex items-center justify-center"
                                        >
                                            <i class="fa-solid fa-money-bill"></i>
                                        </div>

                                        <div>

                                            <div class="font-semibold text-gray-800">
                                                Manual Payment
                                            </div>

                                            <div class="text-xs text-gray-500">
                                                Pay manually
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </label>

                        </div>

                    </div>


                    {{-- =========================
                         Notes
                    ========================== --}}

                    <div>

                        <label
                            for="notes"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Notes
                            <span class="text-xs font-normal text-gray-400">
                            (Optional)
                        </span>
                        </label>

                        <textarea
                            name="notes"
                            id="notes"
                            rows="4"
                            placeholder="Write any additional information..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-700
                               focus:border-teal-500 focus:ring-2 focus:ring-teal-100
                               outline-none transition resize-none"
                        >{{ old('notes') }}</textarea>

                    </div>


                    {{-- =========================
                         Selected Appointment Summary
                    ========================== --}}

                    <div
                        id="selectedSummary"
                        class="hidden rounded-xl border border-teal-200 bg-teal-50 p-4"
                    >

                        <div class="flex items-start gap-3">

                            <div
                                class="w-10 h-10 shrink-0 rounded-lg bg-teal-100 text-teal-600
                                   flex items-center justify-center"
                            >
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>

                            <div>

                                <h3 class="font-semibold text-teal-800">
                                    Appointment Selected
                                </h3>

                                <p
                                    id="selectedSummaryText"
                                    class="text-sm text-teal-700 mt-1"
                                ></p>

                            </div>

                        </div>

                    </div>


                    {{-- =========================
                         Confirm Button
                    ========================== --}}

                    <div class="pt-2">

                        <button
                            type="submit"
                            id="confirmButton"
                            disabled
                            class="
                            w-full
                            min-h-[52px]
                            rounded-xl
                            bg-teal-600
                            px-6
                            py-3
                            text-white
                            font-semibold
                            flex
                            items-center
                            justify-center
                            gap-2
                            transition
                            disabled:bg-gray-300
                            disabled:text-gray-500
                            disabled:cursor-not-allowed
                            hover:bg-teal-700
                            disabled:hover:bg-gray-300
                        "
                        >

                            <i class="fa-solid fa-check"></i>

                            Confirm Appointment

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =========================================================
         Page JavaScript
    ========================================================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const departmentSelect =
                document.getElementById('department_id');

            const slotContainer =
                document.getElementById('slotContainer');

            const slotInput =
                document.getElementById('slot_id');

            const confirmButton =
                document.getElementById('confirmButton');

            const calendarMessage =
                document.getElementById('calendarMessage');

            const selectedSummary =
                document.getElementById('selectedSummary');

            const selectedSummaryText =
                document.getElementById('selectedSummaryText');

            const appointmentForm =
                document.getElementById('appointmentForm');


            let selectedDate = null;


            /*
            |--------------------------------------------------------------------------
            | Calendar Click
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll('.calendar-day').forEach(function (day) {

                day.addEventListener('click', function () {

                    if (this.dataset.disabled === '1') {
                        return;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Department must be selected first
                    |--------------------------------------------------------------------------
                    */

                    if (!departmentSelect.value) {

                        alert('Please select a department first.');

                        departmentSelect.focus();

                        return;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Remove previous selected date
                    |--------------------------------------------------------------------------
                    */

                    document
                        .querySelectorAll('.calendar-day')
                        .forEach(function (item) {

                            item.classList.remove(
                                'border-teal-500',
                                'bg-teal-600',
                                'text-white',
                                'shadow-md'
                            );

                            item.classList.add(
                                'border-gray-200',
                                'bg-white',
                                'text-gray-700'
                            );

                        });


                    /*
                    |--------------------------------------------------------------------------
                    | Select clicked date
                    |--------------------------------------------------------------------------
                    */

                    this.classList.remove(
                        'border-gray-200',
                        'bg-white',
                        'text-gray-700'
                    );

                    this.classList.add(
                        'border-teal-500',
                        'bg-teal-600',
                        'text-white',
                        'shadow-md'
                    );


                    selectedDate =
                        this.dataset.date;


                    /*
                    |--------------------------------------------------------------------------
                    | Update calendar message
                    |--------------------------------------------------------------------------
                    */

                    calendarMessage.innerHTML = `
                <div class="flex items-center gap-2 text-teal-700">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span>
                        Selected date:
                        <strong>${formatDate(selectedDate)}</strong>
                    </span>
                </div>
            `;


                    /*
                    |--------------------------------------------------------------------------
                    | Load Slots
                    |--------------------------------------------------------------------------
                    */

                    loadSlots();

                });

            });


            /*
            |--------------------------------------------------------------------------
            | Department Change
            |--------------------------------------------------------------------------
            */

            departmentSelect.addEventListener('change', function () {

                selectedDate = null;

                slotInput.value = '';

                confirmButton.disabled = true;

                selectedSummary.classList.add('hidden');


                /*
                |--------------------------------------------------------------------------
                | Remove selected date
                |--------------------------------------------------------------------------
                */

                document
                    .querySelectorAll('.calendar-day')
                    .forEach(function (item) {

                        if (item.dataset.disabled === '0') {

                            item.classList.remove(
                                'border-teal-500',
                                'bg-teal-600',
                                'text-white',
                                'shadow-md'
                            );

                            item.classList.add(
                                'border-gray-200',
                                'bg-white',
                                'text-gray-700'
                            );

                        }

                    });


                /*
                |--------------------------------------------------------------------------
                | Reset calendar message
                |--------------------------------------------------------------------------
                */

                calendarMessage.innerHTML = `
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-teal-500"></i>

                <span>
                    Please select an appointment date.
                </span>
            </div>
        `;


                /*
                |--------------------------------------------------------------------------
                | Reset Slots
                |--------------------------------------------------------------------------
                */

                slotContainer.innerHTML = `
            <div class="col-span-full rounded-xl border border-dashed border-gray-300 bg-gray-50 px-5 py-8 text-center">

                <div class="w-12 h-12 mx-auto rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-400">
                    <i class="fa-regular fa-calendar text-lg"></i>
                </div>

                <p class="mt-3 text-sm font-medium text-gray-600">
                    Select an appointment date
                </p>

                <p class="mt-1 text-xs text-gray-400">
                    Available time slots will appear here.
                </p>

            </div>
        `;

            });


            /*
            |--------------------------------------------------------------------------
            | Load Slots
            |--------------------------------------------------------------------------
            */

            async function loadSlots() {

                if (!departmentSelect.value || !selectedDate) {
                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | Reset
                |--------------------------------------------------------------------------
                */

                slotInput.value = '';

                confirmButton.disabled = true;

                selectedSummary.classList.add('hidden');


                /*
                |--------------------------------------------------------------------------
                | Loading
                |--------------------------------------------------------------------------
                */

                slotContainer.innerHTML = `
            <div class="col-span-full rounded-xl border border-gray-200 bg-gray-50 px-5 py-10 text-center">

                <div class="w-10 h-10 mx-auto rounded-full border-4 border-gray-200 border-t-teal-600 animate-spin"></div>

                <p class="mt-4 text-sm font-medium text-gray-600">
                    Loading available slots...
                </p>

            </div>
        `;


                try {

                    const url =
                        `{{ route('patient.appointment.slots') }}?department_id=${departmentSelect.value}&date=${selectedDate}`;


                    const response =
                        await fetch(url, {
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });


                    const data =
                        await response.json();


                    /*
                    |--------------------------------------------------------------------------
                    | Error
                    |--------------------------------------------------------------------------
                    */

                    if (!data.success) {

                        slotContainer.innerHTML = `
                    <div class="col-span-full rounded-xl border border-red-200 bg-red-50 px-5 py-8 text-center">

                        <div class="w-12 h-12 mx-auto rounded-full bg-red-100 text-red-500 flex items-center justify-center">
                            <i class="fa-solid fa-circle-exclamation text-lg"></i>
                        </div>

                        <p class="mt-3 text-sm font-medium text-red-700">
                            ${data.message ?? 'Unable to load slots.'}
                        </p>

                    </div>
                `;

                        return;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | No Slots
                    |--------------------------------------------------------------------------
                    */

                    if (!data.slots || data.slots.length === 0) {

                        slotContainer.innerHTML = `
                    <div class="col-span-full rounded-xl border border-yellow-200 bg-yellow-50 px-5 py-8 text-center">

                        <div class="w-12 h-12 mx-auto rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center">
                            <i class="fa-solid fa-clock text-lg"></i>
                        </div>

                        <p class="mt-3 text-sm font-medium text-yellow-700">
                            No appointment slots available.
                        </p>

                        <p class="mt-1 text-xs text-yellow-600">
                            Please select another date.
                        </p>

                    </div>
                `;

                        return;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Render Slots
                    |--------------------------------------------------------------------------
                    */

                    slotContainer.innerHTML = '';


                    data.slots.forEach(function (slot) {

                        const status =
                            slot.status ?? 'available';


                        const isAvailable =
                            status === 'available';


                        const slotCard =
                            document.createElement('button');


                        slotCard.type = 'button';


                        slotCard.dataset.slotId =
                            slot.id;


                        slotCard.dataset.status =
                            status;


                        slotCard.disabled =
                            !isAvailable;


                        slotCard.className = `
                    w-full
                    text-left
                    rounded-xl
                    border-2
                    p-4
                    transition-all
                    duration-200
                    ${isAvailable
                            ? 'border-gray-200 bg-white hover:border-teal-400 hover:bg-teal-50 cursor-pointer'
                            : 'border-red-200 bg-red-50 text-red-400 cursor-not-allowed'
                        }
                `;


                        const statusText =
                            isAvailable
                                ? 'Available'
                                : status === 'booked'
                                    ? 'Booked'
                                    : 'Blocked';


                        const statusClass =
                            isAvailable
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700';


                        slotCard.innerHTML = `

                    <div class="flex items-center justify-between gap-3">

                        <div>

                            <div class="slot-time text-lg font-bold ${
                            isAvailable
                                ? 'text-gray-800'
                                : 'text-red-400'
                        }">
                                ${formatTime(slot.start_time)}
                                -
                                ${formatTime(slot.end_time)}
                            </div>

                            ${
                            slot.doctor
                                ? `
                                        <div class="mt-1 text-sm ${
                                    isAvailable
                                        ? 'text-gray-500'
                                        : 'text-red-400'
                                }">
                                            <i class="fa-solid fa-user-doctor mr-1"></i>
                                            ${slot.doctor.name}
                                        </div>
                                      `
                                : ''
                        }

                        </div>


                        <span
                            class="shrink-0 px-2.5 py-1 rounded-full text-xs font-semibold ${statusClass}"
                        >
                            ${statusText}
                        </span>

                    </div>

                `;


                        /*
                        |--------------------------------------------------------------------------
                        | Available Slot Click
                        |--------------------------------------------------------------------------
                        */

                        if (isAvailable) {

                            slotCard.addEventListener('click', function () {


                                /*
                                |--------------------------------------------------------------------------
                                | Remove previous slot
                                |--------------------------------------------------------------------------
                                */

                                document
                                    .querySelectorAll('[data-slot-id]')
                                    .forEach(function (item) {

                                        if (
                                            item.dataset.status === 'available'
                                        ) {

                                            item.classList.remove(
                                                'border-teal-500',
                                                'bg-teal-50',
                                                'shadow-md'
                                            );

                                            item.classList.add(
                                                'border-gray-200',
                                                'bg-white'
                                            );

                                        }

                                    });


                                /*
                                |--------------------------------------------------------------------------
                                | Select slot
                                |--------------------------------------------------------------------------
                                */

                                this.classList.remove(
                                    'border-gray-200',
                                    'bg-white'
                                );

                                this.classList.add(
                                    'border-teal-500',
                                    'bg-teal-50',
                                    'shadow-md'
                                );


                                slotInput.value =
                                    this.dataset.slotId;


                                confirmButton.disabled =
                                    false;


                                /*
                                |--------------------------------------------------------------------------
                                | Summary
                                |--------------------------------------------------------------------------
                                */

                                selectedSummary.classList.remove(
                                    'hidden'
                                );


                                selectedSummaryText.innerHTML = `
                            <strong>${formatDate(selectedDate)}</strong>
                            at
                            <strong>
                                ${formatTime(slot.start_time)}
                                -
                                ${formatTime(slot.end_time)}
                            </strong>
                        `;

                            });

                        }


                        slotContainer.appendChild(
                            slotCard
                        );

                    });

                } catch (error) {

                    console.error(error);


                    slotContainer.innerHTML = `
                <div class="col-span-full rounded-xl border border-red-200 bg-red-50 px-5 py-8 text-center">

                    <div class="w-12 h-12 mx-auto rounded-full bg-red-100 text-red-500 flex items-center justify-center">
                        <i class="fa-solid fa-wifi text-lg"></i>
                    </div>

                    <p class="mt-3 text-sm font-medium text-red-700">
                        Unable to load appointment slots.
                    </p>

                    <p class="mt-1 text-xs text-red-500">
                        Please try again.
                    </p>

                </div>
            `;

                }

            }


            /*
            |--------------------------------------------------------------------------
            | Form Submit Validation
            |--------------------------------------------------------------------------
            */

            appointmentForm.addEventListener('submit', function (event) {

                if (!departmentSelect.value) {

                    event.preventDefault();

                    alert('Please select a department.');

                    departmentSelect.focus();

                    return;
                }


                if (!selectedDate) {

                    event.preventDefault();

                    alert('Please select an appointment date.');

                    return;
                }


                if (!slotInput.value) {

                    event.preventDefault();

                    alert('Please select an available time slot.');

                    return;
                }


                const paymentMethod =
                    document.querySelector(
                        'input[name="payment_method"]:checked'
                    );


                if (!paymentMethod) {

                    event.preventDefault();

                    alert('Please select a payment method.');

                    return;
                }

            });


            /*
            |--------------------------------------------------------------------------
            | Date Formatter
            |--------------------------------------------------------------------------
            */

            function formatDate(dateString) {

                const date =
                    new Date(dateString + 'T00:00:00');


                return date.toLocaleDateString(
                    'en-US',
                    {
                        weekday: 'short',
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric'
                    }
                );

            }


            /*
            |--------------------------------------------------------------------------
            | Time Formatter
            |--------------------------------------------------------------------------
            */

            function formatTime(timeString) {

                if (!timeString) {
                    return '';
                }


                const parts =
                    timeString.split(':');


                let hour =
                    parseInt(parts[0]);


                const minute =
                    parts[1];


                const ampm =
                    hour >= 12
                        ? 'PM'
                        : 'AM';


                hour =
                    hour % 12 || 12;


                return `${hour}:${minute} ${ampm}`;

            }

        });

    </script>

@endsection
