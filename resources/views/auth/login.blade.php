<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Log In | OPD Ticket Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta content="Government Hospital OPD Ticket Management System" name="description" />
    <meta content="Government Hospital" name="author" />

    <link rel="shortcut icon" href="{{ asset('backend/images/logo.png') }}">

    <script src="{{ asset('backend/js/config.js') }}"></script>

    <link
        href="{{ asset('backend/css/app.min.css') }}"
        rel="stylesheet"
        type="text/css"
        id="app-style"
    />

    <link
        href="{{ asset('backend/css/icons.min.css') }}"
        rel="stylesheet"
        type="text/css"
    />
</head>


<body class="authentication-bg position-relative">


<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xxl-8 col-lg-10">

                <div class="card overflow-hidden shadow-lg border-0 rounded-4">

                    <div class="row g-0 align-items-center">


                        {{-- ============================
                             LEFT SIDE
                             SAME AS YOUR OLD CODE
                        ============================= --}}

                        <div class="col-lg-6 d-none d-lg-block p-2">

                            <img
                                src="{{ asset('backend/images/user.png') }}"
                                alt=""
                                class="img-fluid rounded h-200"
                            >

                        </div>


                        {{-- ============================
                             RIGHT SIDE
                             ONLY THIS PART CHANGED
                        ============================= --}}

                        <div class="col-lg-6">

                            <div class="d-flex flex-column h-100">


                                {{-- LOGO --}}

                                <div class="text-center pt-4 pb-2">

                                    <a
                                        href="{{ url('/') }}"
                                        class="logo-dark"
                                    >

                                        <img
                                            src="{{ asset('backend/images/logo.png') }}"
                                            alt="OPD Ticket Logo"
                                            height="145"
                                            style="object-fit: contain;"
                                        >

                                    </a>

                                </div>


                                {{-- LOGIN FORM --}}

                                <div class="p-4 pt-1 my-auto">

                                    <div class="text-center mb-4">

                                        <h4 class="fs-20 mb-1">
                                            Welcome Back
                                        </h4>

                                        <p class="text-muted mb-0">
                                            Sign in to access the OPD Ticket Management System.
                                        </p>

                                    </div>


                                    <form
                                        method="POST"
                                        action="{{ route('login') }}"
                                    >

                                        @csrf


                                        {{-- EMAIL --}}

                                        <div class="mb-3">

                                            <label
                                                for="emailaddress"
                                                class="form-label"
                                            >
                                                Email Address
                                            </label>

                                            <input
                                                class="form-control form-control-lg"
                                                type="email"
                                                id="emailaddress"
                                                name="email"
                                                value="{{ old('email') }}"
                                                required
                                                placeholder="Enter your email"
                                            >

                                            @error('email')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror

                                        </div>


                                        {{-- PASSWORD --}}

                                        <div class="mb-3">

                                            <label
                                                for="password"
                                                class="form-label"
                                            >
                                                Password
                                            </label>


                                            <div class="input-group">

                                                <input
                                                    class="form-control form-control-lg"
                                                    type="password"
                                                    required
                                                    id="password"
                                                    name="password"
                                                    placeholder="Enter your password"
                                                >


                                                <button
                                                    class="btn btn-outline-secondary px-3"
                                                    type="button"
                                                    id="togglePassword"
                                                >

                                                    <i
                                                        class="ri-eye-fill"
                                                        id="eyeIcon"
                                                    ></i>

                                                </button>

                                            </div>


                                            @error('password')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror

                                        </div>


                                        {{-- REMEMBER ME --}}

                                        <div class="mb-3">

                                            <div class="form-check">

                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="remember"
                                                    id="remember"
                                                >

                                                <label
                                                    class="form-check-label text-muted"
                                                    for="remember"
                                                >
                                                    Remember me
                                                </label>

                                            </div>

                                        </div>


                                        {{-- LOGIN BUTTON --}}

                                        <div class="mb-3 text-start">

                                            <button
                                                class="btn btn-success btn-lg w-100"
                                                type="submit"
                                            >

                                                <i class="ri-login-circle-fill me-1"></i>

                                                <span class="fw-bold">
                                                    Log In
                                                </span>

                                            </button>

                                        </div>

                                    </form>


                                    {{-- SLOGAN --}}

                                    <div class="text-center mt-3">

                                        <small class="text-success fw-semibold">
                                            সবার জন্য স্বাস্থ্যসেবা
                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- FOOTER --}}

<footer class="footer footer-alt fw-medium">

    <span class="text-dark">

        <script>
            document.write(new Date().getFullYear())
        </script>

        © Government Hospital OPD Ticket Management System.

    </span>

</footer>


<script src="{{ asset('backend/js/vendor.min.js') }}"></script>

<script src="{{ asset('backend/js/app.min.js') }}"></script>


<script>

    const passwordInput =
        document.getElementById('password');

    const eyeIcon =
        document.getElementById('eyeIcon');

    const togglePasswordButton =
        document.getElementById('togglePassword');


    togglePasswordButton.addEventListener('click', function () {

        const type =
            passwordInput.getAttribute('type') === 'password'
                ? 'text'
                : 'password';

        passwordInput.setAttribute('type', type);

        eyeIcon.classList.toggle('ri-eye-fill');

        eyeIcon.classList.toggle('ri-eye-off-fill');

    });

</script>


</body>
</html>
