<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Patient Login | OPD Ticket Management</title>



    <link
        href="{{ asset('frontend/css/bootstrap.min.css') }}"
        rel="stylesheet">
        <link
        href="{{ asset('frontend/css/color.css') }}"
        rel="stylesheet"
        type="text/css"
    />

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">



</head>


<body class="bg-light">


<div class="container-fluid min-vh-100 d-flex align-items-center py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-10">


                <div class="card border-0 shadow-lg overflow-hidden">

                    <div class="row g-0">


                        {{-- ==========================================
                             LEFT SIDE
                        =========================================== --}}

                        <div class="col-lg-6 d-none d-lg-block">

                            <div
                                class="h-100 text-white d-flex flex-column justify-content-center p-5"
                                style="
                                    min-height: 600px;
                                    background:
                                    linear-gradient(
                                        rgba(5, 35, 65, .88),
                                        rgba(0, 83, 135, .85)
                                    ),
                                    url('{{ asset('frontend/img/hospitel.jfif') }}');
                                    background-size: cover;
                                    background-position: center;
                                "
                            >

                                <div class="mb-4">

                                    <img
                                        src="{{ asset('backend/images/logo.png') }}"
                                        alt="Hospital Logo"
                                        style="height: 100px; width: auto;"
                                        class="mb-4"
                                    >

                                </div>


                                <span class="badge bg-light text-teal px-3 py-2 mb-3"
                                      style="width: fit-content;">

                                    <i class="fa-solid fa-hospital me-1"></i>

                                    Digital OPD Service

                                </span>


                                <h1 class="fw-bold display-6 mb-3">

                                    Welcome to OPD
                                    <br>

                                    <span class="text-info">
                                        Ticket Management
                                    </span>

                                </h1>


                                <p class="text-white-50 fs-5">

                                    Book your hospital appointment,
                                    manage your OPD ticket and get
                                    your patient information from one
                                    convenient place.

                                </p>


                                <div class="mt-4">

                                    <div class="d-flex align-items-center mb-3">

                                        <div class="bg-white bg-opacity-10 rounded-circle
                                                    d-flex align-items-center justify-content-center"
                                             style="width: 42px; height: 42px;">

                                            <i class="fa-solid fa-calendar-check"></i>

                                        </div>

                                        <span class="ms-3">
                                            Book OPD Appointment
                                        </span>

                                    </div>


                                    <div class="d-flex align-items-center mb-3">

                                        <div class="bg-white bg-opacity-10 rounded-circle
                                                    d-flex align-items-center justify-content-center"
                                             style="width: 42px; height: 42px;">

                                            <i class="fa-solid fa-ticket"></i>

                                        </div>

                                        <span class="ms-3">
                                            Manage Digital Ticket
                                        </span>

                                    </div>


                                    <div class="d-flex align-items-center">

                                        <div class="bg-white bg-opacity-10 rounded-circle
                                                    d-flex align-items-center justify-content-center"
                                             style="width: 42px; height: 42px;">

                                            <i class="fa-solid fa-user-doctor"></i>

                                        </div>

                                        <span class="ms-3">
                                            Access Hospital Services
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>



                        {{-- ==========================================
                             RIGHT SIDE
                        =========================================== --}}

                        <div class="col-lg-6">

                            <div class="p-4 p-md-5">


                                {{-- Logo --}}

                                <div class="text-center mb-4">

                                    <img
                                        src="{{ asset('backend/images/logo.png') }}"
                                        alt="Hospital Logo"
                                        style="height: 90px; width: auto;"
                                        class="mb-3"
                                    >

                                    <h3 class="fw-bold mb-1">
                                        Patient Login
                                    </h3>

                                    <p class="text-muted mb-0">
                                        Login to manage your OPD appointments
                                    </p>

                                </div>



                                {{-- Success Message --}}

                                @if(session('success'))

                                    <div class="alert alert-success">

                                        <i class="fa-solid fa-circle-check me-1 "></i>

                                        {{ session('success') }}

                                    </div>

                                @endif



                                {{-- Error Message --}}

                                @if(session('error'))

                                    <div class="alert alert-danger">

                                        <i class="fa-solid fa-circle-exclamation me-1"></i>

                                        {{ session('error') }}

                                    </div>

                                @endif



                                {{-- Validation Errors --}}

                                @if($errors->any())

                                    <div class="alert alert-danger">

                                        <div class="fw-semibold mb-1">
                                            Please check the following:
                                        </div>

                                        <ul class="mb-0">

                                            @foreach($errors->all() as $error)

                                                <li>
                                                    {{ $error }}
                                                </li>

                                            @endforeach

                                        </ul>

                                    </div>

                                @endif



                                {{-- Login Form --}}

                                <form
                                    action="{{ route('patient.login.store') }}"
                                    method="POST"
                                >

                                    @csrf


                                    {{-- Email --}}

                                    <div class="mb-3">

                                        <label class="form-label fw-semibold">

                                            Email Address

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-white">

                                                <i class="fa-solid fa-envelope text-teal"></i>

                                            </span>

                                            <input
                                                type="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                                class="form-control"
                                                placeholder="Enter your email address"
                                                required
                                            >

                                        </div>

                                    </div>



                                    {{-- Password --}}

                                    <div class="mb-4">

                                        <label class="form-label fw-semibold">

                                            Password

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-white">

                                                <i class="fa-solid fa-lock text-teal"></i>

                                            </span>

                                            <input
                                                type="password"
                                                name="password"
                                                id="password"
                                                class="form-control"
                                                placeholder="Enter your password"
                                                required
                                            >

                                            <button
                                                type="button"
                                                class="btn btn-outline-secondary"
                                                id="togglePassword"
                                            >

                                                <i
                                                    class="fa-solid fa-eye"
                                                    id="passwordIcon"
                                                ></i>

                                            </button>

                                        </div>

                                    </div>



                                    {{-- Login Button --}}

                                    <button
                                        type="submit"
                                        class="btn w-100 py-2 fw-semibold text-white"
                                        style="background-color: #0D9488; border-color: #00a8cc;"
                                    >

                                        <i class="fa-solid fa-right-to-bracket me-1"></i>

                                        Login to Patient Account

                                    </button>


                                </form>



                                {{-- Register --}}

                                <div class="text-center mt-4">

                                    <span class="text-muted">
                                        Don't have a patient account?
                                    </span>

                                    <br>

                                    <a
                                        href="{{ route('patient.register') }}"
                                        class="fw-semibold text-teal text-decoration-none"
                                    >

                                        <i class="fa-solid fa-user-plus me-1"></i>

                                        Create Patient Account

                                    </a>

                                </div>



                                {{-- Back Home --}}

                                <div class="text-center mt-4 pt-3 border-top">

                                    <a
                                        href="{{ url('/') }}"
                                        class="text-muted text-decoration-none"
                                    >

                                        <i class="fa-solid fa-arrow-left me-1"></i>

                                        Back to Home

                                    </a>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>


                {{-- Footer --}}

                <div class="text-center mt-3 text-muted small">

                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>

                    OPD Ticket Management System.
                    All rights reserved.

                </div>


            </div>

        </div>

    </div>

</div>



{{-- Password Toggle --}}

<script>

    const password = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const passwordIcon = document.getElementById('passwordIcon');

    togglePassword.addEventListener('click', function () {

        if (password.type === 'password') {

            password.type = 'text';

            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');

        } else {

            password.type = 'password';

            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');

        }

    });

</script>


</body>

</html>
