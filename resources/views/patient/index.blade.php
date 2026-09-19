<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient Dashboard | OPD Ticket Management</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0f766e',
                        secondary: '#14b8a6',
                    }
                }
            }
        }
    </script>
</head>


<body class="bg-slate-50 text-slate-800">


<!-- =========================================
     NAVBAR
========================================== -->

<nav class="sticky top-0 z-50 bg-white border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="h-20 flex items-center justify-between">

            <!-- Logo -->
            <a
                href="{{ route('patient.dashboard') }}"
                class="flex items-center gap-3"
            >

                <img
                    src="{{ asset('backend/images/logo.png') }}"
                    alt="Hospital Logo"
                    class="h-12 w-auto object-contain"
                >

                <div class="hidden sm:block">

                    <h1 class="text-lg font-bold text-slate-800 leading-tight">
                        OPD Ticket Management
                    </h1>

                    <p class="text-xs text-slate-500">
                        Patient Portal
                    </p>

                </div>

            </a>


            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-2">

                <a
                    href="{{ route('patient.dashboard') }}"
                    class="px-4 py-2.5 rounded-lg bg-teal-50 text-teal-700 font-semibold"
                >

                    <i class="fa-solid fa-house mr-1"></i>

                    Dashboard

                </a>


                <a
                    href="{{ route('patient.appointment.create') }}"
                    class="px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-teal-700 transition"
                >

                    <i class="fa-solid fa-calendar-plus mr-1"></i>

                    Appointment

                </a>


                <form
                    action="{{ route('patient.logout') }}"
                    method="POST"
                    class="inline"
                >

                    @csrf

                    <button
                        type="submit"
                        class="px-4 py-2.5 rounded-lg text-red-600 hover:bg-red-50 transition"
                    >

                        <i class="fa-solid fa-right-from-bracket mr-1"></i>

                        Logout

                    </button>

                </form>

            </div>


            <!-- Mobile Button -->
            <button
                id="mobileMenuButton"
                type="button"
                class="md:hidden w-10 h-10 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-100"
            >

                <i class="fa-solid fa-bars"></i>

            </button>

        </div>


        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden pb-4">

            <div class="border-t border-slate-100 pt-3 space-y-1">

                <a
                    href="{{ route('patient.dashboard') }}"
                    class="block px-4 py-3 rounded-lg bg-teal-50 text-teal-700 font-semibold"
                >

                    <i class="fa-solid fa-house mr-2"></i>

                    Dashboard

                </a>


                <a
                    href="{{ route('patient.appointment.create') }}"
                    class="block px-4 py-3 rounded-lg text-slate-600 hover:bg-slate-100"
                >

                    <i class="fa-solid fa-calendar-plus mr-2"></i>

                    Appointment

                </a>


                <form
                    action="{{ route('patient.logout') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="w-full text-left px-4 py-3 rounded-lg text-red-600 hover:bg-red-50"
                    >

                        <i class="fa-solid fa-right-from-bracket mr-2"></i>

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>



<!-- =========================================
     MAIN
========================================== -->

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    @yield('content')


</main>



<!-- =========================================
     FOOTER
========================================== -->

<footer class="border-t border-slate-200 bg-white mt-10">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">


            <p class="text-sm text-slate-500 text-center sm:text-left">

                © {{ date('Y') }}

                <span class="font-semibold text-slate-700">
                        OPD Ticket Management System
                    </span>

            </p>


            <p class="text-sm text-slate-500">

                Powered by

                <a
                    href="https://codernetix.com"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="font-semibold text-teal-600 hover:text-teal-700"
                >

                    CoderNetiX

                </a>

            </p>

        </div>

    </div>

</footer>



<!-- =========================================
     CALENDAR DATA + JAVASCRIPT
========================================== -->
@php
    $appointments = $appointments ?? collect();
@endphp
<script>


    /*
    |--------------------------------------------------------------------------
    | Appointment Dates
    |--------------------------------------------------------------------------
    |
    | Example:
    |
    | [
    |     "2026-09-17",
    |     "2026-09-19",
    |     "2026-09-21"
    | ]
    |
    */

    const appointmentDates = @json(

            $appointments
                ->map(function ($appointment) {

                    return \Carbon\Carbon::parse(
                        $appointment->appointment_date
                    )->format('Y-m-d');

                })
                ->values()

        );



    /*
    |--------------------------------------------------------------------------
    | Mobile Menu
    |--------------------------------------------------------------------------
    */

    const mobileMenuButton =
        document.getElementById('mobileMenuButton');

    const mobileMenu =
        document.getElementById('mobileMenu');


    if (mobileMenuButton) {

        mobileMenuButton.addEventListener(
            'click',
            function () {

                mobileMenu.classList.toggle('hidden');

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | Calendar
    |--------------------------------------------------------------------------
    */

    let calendarDate = new Date();



    /*
    |--------------------------------------------------------------------------
    | Format Date
    |--------------------------------------------------------------------------
    */

    function formatDate(year, month, day) {

        const monthString =
            String(month + 1).padStart(2, '0');

        const dayString =
            String(day).padStart(2, '0');


        return `${year}-${monthString}-${dayString}`;

    }



    /*
    |--------------------------------------------------------------------------
    | Render Calendar
    |--------------------------------------------------------------------------
    */

    function renderCalendar() {


        const calendarMonth =
            document.getElementById('calendarMonth');


        const calendarDates =
            document.getElementById('calendarDates');


        if (!calendarMonth || !calendarDates) {

            return;

        }



        const year =
            calendarDate.getFullYear();


        const month =
            calendarDate.getMonth();



        /*
        |--------------------------------------------------------------------------
        | Month Name
        |--------------------------------------------------------------------------
        */

        calendarMonth.textContent =
            calendarDate.toLocaleString(
                'en-US',
                {
                    month: 'long',
                    year: 'numeric'
                }
            );



        /*
        |--------------------------------------------------------------------------
        | First Day
        |--------------------------------------------------------------------------
        */

        const firstDay =
            new Date(
                year,
                month,
                1
            ).getDay();



        /*
        |--------------------------------------------------------------------------
        | Days In Month
        |--------------------------------------------------------------------------
        */

        const daysInMonth =
            new Date(
                year,
                month + 1,
                0
            ).getDate();



        /*
        |--------------------------------------------------------------------------
        | Clear Calendar
        |--------------------------------------------------------------------------
        */

        calendarDates.innerHTML = '';



        /*
        |--------------------------------------------------------------------------
        | Empty Spaces
        |--------------------------------------------------------------------------
        */

        for (
            let i = 0;
            i < firstDay;
            i++
        ) {

            const empty =
                document.createElement('div');


            empty.className =
                'h-9';


            calendarDates.appendChild(empty);

        }



        /*
        |--------------------------------------------------------------------------
        | Today
        |--------------------------------------------------------------------------
        */

        const today =
            new Date();


        today.setHours(
            0,
            0,
            0,
            0
        );



        /*
        |--------------------------------------------------------------------------
        | Calendar Days
        |--------------------------------------------------------------------------
        */

        for (
            let day = 1;
            day <= daysInMonth;
            day++
        ) {


            /*
            |--------------------------------------------------------------------------
            | Current Date Object
            |--------------------------------------------------------------------------
            */

            const dateObject =
                new Date(
                    year,
                    month,
                    day
                );


            dateObject.setHours(
                0,
                0,
                0,
                0
            );



            /*
            |--------------------------------------------------------------------------
            | Date String
            |--------------------------------------------------------------------------
            */

            const dateString =
                formatDate(
                    year,
                    month,
                    day
                );



            /*
            |--------------------------------------------------------------------------
            | Check Appointment
            |--------------------------------------------------------------------------
            */

            const hasAppointment =
                appointmentDates.includes(
                    dateString
                );



            /*
            |--------------------------------------------------------------------------
            | Create Date Element
            |--------------------------------------------------------------------------
            */

            const button =
                document.createElement('div');



            /*
            |--------------------------------------------------------------------------
            | Base Classes
            |--------------------------------------------------------------------------
            */

            let classes = `

                    h-9
                    w-full
                    flex
                    items-center
                    justify-center
                    rounded-lg
                    text-xs
                    transition
                    relative

                `;



            /*
            |--------------------------------------------------------------------------
            | NORMAL DATE COLOR
            |--------------------------------------------------------------------------
            |
            | Past:
            |     Light Red
            |
            | Today/Future:
            |     Light Green
            |
            */

            if (dateObject < today) {


                // Previous date

                classes += `

                        bg-red-50
                        text-red-600

                    `;


            } else {


                // Today / Future date

                classes += `

                        bg-green-50
                        text-green-700

                    `;

            }



            /*
            |--------------------------------------------------------------------------
            | APPOINTMENT DATE COLOR
            |--------------------------------------------------------------------------
            |
            | Past Appointment:
            |     Deep Red
            |
            | Today Appointment:
            |     Deep Green
            |
            | Future Appointment:
            |     Deep Green
            |
            */

            if (hasAppointment) {


                classes += `

                        font-extrabold
                        shadow-sm

                    `;



                /*
                |--------------------------------------------------------------------------
                | Past Appointment
                |--------------------------------------------------------------------------
                */

                if (dateObject < today) {


                    classes += `

                            !bg-red-600
                            !text-white
                            border
                            !border-red-700

                        `;


                    button.title =
                        'Past appointment';



                } else {


                    /*
                    |--------------------------------------------------------------------------
                    | Today / Future Appointment
                    |--------------------------------------------------------------------------
                    */

                    classes += `

                            !bg-green-600
                            !text-white
                            border
                            !border-green-700

                        `;


                    button.title =
                        'Today / Upcoming appointment';

                }

            }



            /*
            |--------------------------------------------------------------------------
            | TODAY RING
            |--------------------------------------------------------------------------
            |
            | Today's date gets a teal ring.
            |
            */

            if (
                dateObject.getTime() ===
                today.getTime()
            ) {


                classes += `

                        ring-2
                        ring-teal-500
                        ring-inset

                    `;

            }



            /*
            |--------------------------------------------------------------------------
            | Apply Classes
            |--------------------------------------------------------------------------
            */

            button.className =
                classes;



            /*
            |--------------------------------------------------------------------------
            | Date Number
            |--------------------------------------------------------------------------
            */

            button.textContent =
                day;



            /*
            |--------------------------------------------------------------------------
            | Appointment Dot
            |--------------------------------------------------------------------------
            |
            | White dot appears inside selected appointment.
            |
            */

            if (hasAppointment) {


                const dot =
                    document.createElement('span');


                dot.className = `

                        absolute
                        bottom-1
                        w-1
                        h-1
                        rounded-full
                        bg-white

                    `;


                button.appendChild(dot);

            }



            /*
            |--------------------------------------------------------------------------
            | Add Date
            |--------------------------------------------------------------------------
            */

            calendarDates.appendChild(button);

        }

    }



    /*
    |--------------------------------------------------------------------------
    | Previous Month
    |--------------------------------------------------------------------------
    */

    const previousMonth =
        document.getElementById(
            'previousMonth'
        );


    if (previousMonth) {

        previousMonth.addEventListener(
            'click',
            function () {


                calendarDate.setMonth(
                    calendarDate.getMonth() - 1
                );


                renderCalendar();

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | Next Month
    |--------------------------------------------------------------------------
    */

    const nextMonth =
        document.getElementById(
            'nextMonth'
        );


    if (nextMonth) {

        nextMonth.addEventListener(
            'click',
            function () {


                calendarDate.setMonth(
                    calendarDate.getMonth() + 1
                );


                renderCalendar();

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | Initial Calendar
    |--------------------------------------------------------------------------
    */

    renderCalendar();


</script>


</body>

</html>

