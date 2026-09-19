<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OPD Ticket Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="bg-slate-50 font-sans text-slate-800">


<!-- =========================================================
     NAVIGATION
========================================================= -->

<header class="sticky top-0 z-50 bg-white border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center gap-3">

            <img
                src="{{ asset('backend/images/logo.png') }}"
                alt="Hospital Logo"
                class="h-14 w-auto object-contain"
            >

            <div>
                <h1 class="text-lg font-bold text-slate-900">
                    OPD Ticket Management
                </h1>

                <p class="text-xs text-slate-500">
                    Hospital Patient Service
                </p>
            </div>

        </a>


        <!-- Navigation -->
        <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-600">
            <a href="{{ route('patient.register') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium transition">
                <i class="fa-solid fa-right-to-bracket me-1"></i>
                Login / Register
            </a>
        </nav>

    </div>

</header>



<!-- =========================================================
     HERO SECTION
========================================================= -->

<section class="group relative bg-slate-900 text-white min-h-[80vh] py-32 lg:py-48 flex items-center justify-center overflow-hidden">


    <!-- Hospital Background -->

    <div
        class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 ease-out scale-105 group-hover:scale-110"
        style="background-image: url('{{ asset('frontend/img/hospitel.jfif') }}');">
    </div>


    <!-- Overlay -->

    <div
        class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/90 to-blue-950/70 transition-opacity duration-500 group-hover:opacity-95">
    </div>


    <!-- Hero Content -->

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">


        <!-- Badge -->

        <span
            class="inline-flex items-center gap-2 bg-blue-500/20 text-blue-300 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider border border-blue-400/30 mb-5">

            <i class="fa-solid fa-hospital"></i>

            Digital OPD Healthcare Service

        </span>


        <!-- Heading -->

        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight leading-tight">
            <span class="text-blue-400">
                OPD Ticket Online
            </span>
        </h1>


        <!-- Description -->

        <p class="mt-6 text-lg sm:text-xl text-slate-300 leading-relaxed max-w-2xl mx-auto">

            Book your OPD appointment online, select your department,
            receive your digital ticket and visit the hospital without
            waiting in a long queue.

        </p>


        <!-- Buttons -->

        <div class="mt-10 flex flex-wrap justify-center gap-4">


            <!-- Book Appointment -->

            <a
                href="{{ route('patient.register') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-8 py-4 rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transform hover:-translate-y-0.5 hover:scale-105 transition-all duration-200 flex items-center gap-2 text-base">

                <i class="fa-solid fa-ticket"></i>

                Book OPD Ticket

            </a>


            <!-- Login -->

            <a
                href="{{ route('patient.login') }}"
                class="bg-white/10 hover:bg-white/20 text-white font-semibold px-8 py-4 rounded-xl backdrop-blur-md border border-white/20 hover:border-white/40 transform hover:-translate-y-0.5 hover:scale-105 transition-all duration-200 flex items-center gap-2 text-base">

                <i class="fa-solid fa-user-plus"></i>

                Patient Login

            </a>

        </div>

    </div>

</section>


<!-- =========================================================
     HOW IT WORKS
========================================================= -->

<section class="bg-white border-y border-slate-200">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <div class="text-center mb-12">

            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">
                Simple Process
            </span>

            <h2 class="text-3xl font-bold text-slate-900 mt-2">
                How OPD Ticket Works
            </h2>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">


            <!-- Step 1 -->

            <div class="text-center">

                <div
                    class="w-14 h-14 mx-auto bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl font-bold">

                    1

                </div>

                <h3 class="font-bold text-lg mt-4">
                    Register
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Create your patient account.
                </p>

            </div>


            <!-- Step 2 -->

            <div class="text-center">

                <div
                    class="w-14 h-14 mx-auto bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-xl font-bold">

                    2

                </div>

                <h3 class="font-bold text-lg mt-4">
                    Select Department
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Choose the department you need.
                </p>

            </div>


            <!-- Step 3 -->

            <div class="text-center">

                <div
                    class="w-14 h-14 mx-auto bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-xl font-bold">

                    3

                </div>

                <h3 class="font-bold text-lg mt-4">
                    Get Ticket
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Receive your digital OPD ticket.
                </p>

            </div>


            <!-- Step 4 -->

            <div class="text-center">

                <div
                    class="w-14 h-14 mx-auto bg-orange-100 text-orange-600 rounded-full flex items-center justify-center text-xl font-bold">

                    4

                </div>

                <h3 class="font-bold text-lg mt-4">
                    Visit Hospital
                </h3>

                <p class="text-sm text-slate-500 mt-2">
                    Show your ticket at the hospital.
                </p>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     FOOTER
========================================================= -->

<footer class="bg-slate-900 text-slate-300 py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col md:flex-row items-center justify-between gap-4">


            <div class="flex items-center gap-3">

                <img
                    src="{{ asset('backend/images/logo.png') }}"
                    alt="Hospital Logo"
                    class="h-10 w-auto"
                >

                <div>

                    <p class="font-semibold text-white">
                        OPD Ticket Management System
                    </p>

                    <p class="text-xs text-slate-400">
                        Digital Hospital Patient Service
                    </p>

                </div>

            </div>


            <div class="text-sm text-slate-400 text-center">

                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>

                OPD Ticket Management System.
                All rights reserved.

            </div>


        </div>

    </div>

</footer>


</body>
</html>
