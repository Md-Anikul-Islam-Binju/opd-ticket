<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Patient Registration | OPD Ticket Management</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

</head>


<body class="bg-light">


<div class="container-fluid py-4 py-md-5">

    <div class="container">

        {{-- =====================================================
             TOP HEADER
        ====================================================== --}}

        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body">

                <div class="d-flex flex-column flex-md-row
                            justify-content-between
                            align-items-md-center
                            gap-3">

                    <div class="d-flex align-items-center">

                        <img
                            src="{{ asset('backend/images/logo.png') }}"
                            alt="Hospital Logo"
                            style="height: 75px; width: auto;"
                            class="me-3"
                        >

                        <div>

                            <h4 class="fw-bold mb-1">
                                OPD Ticket Management System
                            </h4>

                            <p class="text-muted mb-0">
                                Patient Registration
                            </p>

                        </div>

                    </div>


                    <a
                        href="{{ route('patient.login') }}"
                        class="btn btn-outline-primary"
                    >

                        <i class="fa-solid fa-right-to-bracket me-1"></i>

                        Patient Login

                    </a>

                </div>

            </div>

        </div>



        {{-- =====================================================
             ERROR MESSAGE
        ====================================================== --}}

        @if(session('error'))

            <div class="alert alert-danger shadow-sm">

                <i class="fa-solid fa-circle-exclamation me-1"></i>

                {{ session('error') }}

            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-danger shadow-sm">

                <div class="fw-semibold mb-2">

                    <i class="fa-solid fa-circle-exclamation me-1"></i>

                    Please correct the following errors:

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



        {{-- =====================================================
             REGISTRATION FORM
        ====================================================== --}}

        <form
            action="{{ route('patient.register.store') }}"
            method="POST"
        >

            @csrf


            {{-- =================================================
                 SECTION 01 : BASIC INFORMATION
            ================================================== --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <div class="d-flex align-items-center">

                        <div
                            class="bg-primary bg-opacity-10 text-primary
                                   rounded-circle d-flex align-items-center
                                   justify-content-center me-3"
                            style="width: 42px; height: 42px;"
                        >

                            <i class="fa-solid fa-user"></i>

                        </div>

                        <div>

                            <h5 class="mb-0 fw-bold">
                                Personal Information
                            </h5>

                            <small class="text-muted">
                                Enter your basic patient information
                            </small>

                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <div class="row">


                        {{-- Full Name --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">

                                Full Name
                                <span class="text-danger">*</span>

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-user text-primary"></i>
                                </span>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control"
                                    placeholder="Enter your full name"
                                    required
                                >

                            </div>

                        </div>


                        {{-- Email --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">

                                Email Address
                                <span class="text-danger">*</span>

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-envelope text-primary"></i>
                                </span>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control"
                                    placeholder="Enter your email"
                                    required
                                >

                            </div>

                        </div>


                        {{-- Phone --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">

                                Phone Number
                                <span class="text-danger">*</span>

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-phone text-primary"></i>
                                </span>

                                <input
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    class="form-control"
                                    placeholder="01XXXXXXXXX"
                                    required
                                >

                            </div>

                        </div>


                        {{-- Gender --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Gender
                            </label>

                            <select
                                name="gender"
                                class="form-select"
                            >

                                <option value="">
                                    Select Gender
                                </option>

                                <option
                                    value="male"
                                    {{ old('gender') == 'male' ? 'selected' : '' }}
                                >
                                    Male
                                </option>

                                <option
                                    value="female"
                                    {{ old('gender') == 'female' ? 'selected' : '' }}
                                >
                                    Female
                                </option>

                                <option
                                    value="other"
                                    {{ old('gender') == 'other' ? 'selected' : '' }}
                                >
                                    Other
                                </option>

                            </select>

                        </div>


                        {{-- Date of Birth --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Date of Birth
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-calendar text-primary"></i>
                                </span>

                                <input
                                    type="date"
                                    name="date_of_birth"
                                    value="{{ old('date_of_birth') }}"
                                    class="form-control"
                                >

                            </div>

                        </div>


                        {{-- Age --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Age
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-cake-candles text-primary"></i>
                                </span>

                                <input
                                    type="number"
                                    name="age"
                                    value="{{ old('age') }}"
                                    class="form-control"
                                    min="0"
                                    max="120"
                                    placeholder="Enter age"
                                >

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 SECTION 02 : ADDRESS INFORMATION
            ================================================== --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <div class="d-flex align-items-center">

                        <div
                            class="bg-success bg-opacity-10 text-success
                                   rounded-circle d-flex align-items-center
                                   justify-content-center me-3"
                            style="width: 42px; height: 42px;"
                        >

                            <i class="fa-solid fa-location-dot"></i>

                        </div>

                        <div>

                            <h5 class="mb-0 fw-bold">
                                Address Information
                            </h5>

                            <small class="text-muted">
                                Select your current address
                            </small>

                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <div class="row">


                        {{-- Division --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label fw-semibold">

                                Division

                            </label>

                            <select
                                name="division_id"
                                id="division_id"
                                class="form-select"
                            >

                                <option value="">
                                    Select Division
                                </option>

                                @foreach($divisions as $division)

                                    <option
                                        value="{{ $division->id }}"
                                        {{ old('division_id') == $division->id ? 'selected' : '' }}
                                    >

                                        {{ $division->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- District --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label fw-semibold">

                                District

                            </label>

                            <select
                                name="district_id"
                                id="district_id"
                                class="form-select"
                            >

                                <option value="">
                                    Select District
                                </option>

                            </select>

                        </div>


                        {{-- Upazila --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label fw-semibold">

                                Upazila

                            </label>

                            <select
                                name="upazila_id"
                                id="upazila_id"
                                class="form-select"
                            >

                                <option value="">
                                    Select Upazila
                                </option>

                            </select>

                        </div>


                        {{-- Post Office --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Post Office
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-envelopes-bulk text-success"></i>
                                </span>

                                <input
                                    type="text"
                                    name="post_office"
                                    value="{{ old('post_office') }}"
                                    class="form-control"
                                    placeholder="Enter post office"
                                >

                            </div>

                        </div>


                        {{-- NID --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                NID Number
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-id-card text-success"></i>
                                </span>

                                <input
                                    type="text"
                                    name="nid_number"
                                    value="{{ old('nid_number') }}"
                                    class="form-control"
                                    placeholder="Enter NID number"
                                >

                            </div>

                        </div>


                        {{-- Address --}}

                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Full Address
                            </label>

                            <textarea
                                name="address"
                                rows="3"
                                class="form-control"
                                placeholder="Enter your full address"
                            >{{ old('address') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 SECTION 03 : EMERGENCY INFORMATION
            ================================================== --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <div class="d-flex align-items-center">

                        <div
                            class="bg-danger bg-opacity-10 text-danger
                                   rounded-circle d-flex align-items-center
                                   justify-content-center me-3"
                            style="width: 42px; height: 42px;"
                        >

                            <i class="fa-solid fa-phone-volume"></i>

                        </div>

                        <div>

                            <h5 class="mb-0 fw-bold">
                                Emergency Information
                            </h5>

                            <small class="text-muted">
                                Information that may be useful during emergency
                            </small>

                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <div class="row">


                        {{-- Relationship --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Relationship
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-people-arrows text-danger"></i>
                                </span>

                                <input
                                    type="text"
                                    name="relationship"
                                    value="{{ old('relationship') }}"
                                    class="form-control"
                                    placeholder="e.g. Father, Mother, Husband"
                                >

                            </div>

                        </div>


                        {{-- Emergency Contact --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Emergency Contact
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-phone text-danger"></i>
                                </span>

                                <input
                                    type="text"
                                    name="emergency_contact"
                                    value="{{ old('emergency_contact') }}"
                                    class="form-control"
                                    placeholder="Emergency contact number"
                                >

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 SECTION 04 : MEDICAL INFORMATION
            ================================================== --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <div class="d-flex align-items-center">

                        <div
                            class="bg-warning bg-opacity-10 text-warning
                                   rounded-circle d-flex align-items-center
                                   justify-content-center me-3"
                            style="width: 42px; height: 42px;"
                        >

                            <i class="fa-solid fa-notes-medical"></i>

                        </div>

                        <div>

                            <h5 class="mb-0 fw-bold">
                                Medical Information
                            </h5>

                            <small class="text-muted">
                                Provide your previous medical information if applicable
                            </small>

                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <label class="form-label fw-semibold">
                        Medical History
                    </label>

                    <textarea
                        name="medical_history"
                        rows="4"
                        class="form-control"
                        placeholder="Mention any previous illness, surgery, allergy or other relevant medical information..."
                    >{{ old('medical_history') }}</textarea>

                    <small class="text-muted">
                        You may leave this field blank if you have no previous medical history.
                    </small>

                </div>

            </div>



            {{-- =================================================
                 SECTION 05 : ACCOUNT SECURITY
            ================================================== --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <div class="d-flex align-items-center">

                        <div
                            class="bg-primary bg-opacity-10 text-primary
                                   rounded-circle d-flex align-items-center
                                   justify-content-center me-3"
                            style="width: 42px; height: 42px;"
                        >

                            <i class="fa-solid fa-lock"></i>

                        </div>

                        <div>

                            <h5 class="mb-0 fw-bold">
                                Account Security
                            </h5>

                            <small class="text-muted">
                                Create a secure password for your patient account
                            </small>

                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <div class="row">


                        {{-- Password --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">

                                Password
                                <span class="text-danger">*</span>

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-lock text-primary"></i>
                                </span>

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Create password"
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


                        {{-- Confirm Password --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">

                                Confirm Password
                                <span class="text-danger">*</span>

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-lock text-primary"></i>
                                </span>

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="form-control"
                                    placeholder="Confirm password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary"
                                    id="toggleConfirmPassword"
                                >

                                    <i
                                        class="fa-solid fa-eye"
                                        id="confirmPasswordIcon"
                                    ></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 SUBMIT SECTION
            ================================================== --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <div class="row align-items-center">

                        <div class="col-lg-7 mb-3 mb-lg-0">

                            <div class="d-flex">

                                <i class="fa-solid fa-circle-info
                                          text-primary fs-4 me-3"></i>

                                <div>

                                    <h6 class="fw-bold mb-1">
                                        Ready to create your patient account?
                                    </h6>

                                    <p class="text-muted small mb-0">
                                        After registration, you can login and book
                                        your OPD appointment online.
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div class="col-lg-5 text-lg-end">

                            <a
                                href="{{ route('patient.login') }}"
                                class="btn btn-light me-2"
                            >

                                <i class="fa-solid fa-arrow-left me-1"></i>

                                Back to Login

                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary px-4"
                            >

                                <i class="fa-solid fa-user-plus me-1"></i>

                                Create Patient Account

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </form>



        {{-- =====================================================
             FOOTER
        ====================================================== --}}

        <div class="text-center text-muted small py-3">

            ©
            <script>
                document.write(new Date().getFullYear())
            </script>

            OPD Ticket Management System.
            All rights reserved.

        </div>

    </div>

</div>



{{-- =========================================================
     PASSWORD TOGGLE
========================================================= --}}

<script>

    const password =
        document.getElementById('password');

    const togglePassword =
        document.getElementById('togglePassword');

    const passwordIcon =
        document.getElementById('passwordIcon');


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



    const confirmPassword =
        document.getElementById('password_confirmation');

    const toggleConfirmPassword =
        document.getElementById('toggleConfirmPassword');

    const confirmPasswordIcon =
        document.getElementById('confirmPasswordIcon');


    toggleConfirmPassword.addEventListener('click', function () {

        if (confirmPassword.type === 'password') {

            confirmPassword.type = 'text';

            confirmPasswordIcon.classList.remove('fa-eye');
            confirmPasswordIcon.classList.add('fa-eye-slash');

        } else {

            confirmPassword.type = 'password';

            confirmPasswordIcon.classList.remove('fa-eye-slash');
            confirmPasswordIcon.classList.add('fa-eye');

        }

    });

</script>



{{-- =========================================================
     DIVISION → DISTRICT → UPAZILA
========================================================= --}}

<script>

    document
        .getElementById('division_id')
        .addEventListener('change', function () {

            let divisionId = this.value;

            let districtSelect =
                document.getElementById('district_id');

            let upazilaSelect =
                document.getElementById('upazila_id');


            districtSelect.innerHTML =
                '<option value="">Loading...</option>';

            upazilaSelect.innerHTML =
                '<option value="">Select Upazila</option>';


            if (!divisionId) {

                districtSelect.innerHTML =
                    '<option value="">Select District</option>';

                return;

            }


            fetch(
                '{{ url('/patient/districts') }}/' + divisionId
            )

                .then(response => response.json())

                .then(data => {

                    districtSelect.innerHTML =
                        '<option value="">Select District</option>';


                    data.forEach(district => {

                        districtSelect.innerHTML += `

                        <option value="${district.id}">
                            ${district.name}
                        </option>

                    `;

                    });

                })

                .catch(error => {

                    districtSelect.innerHTML =
                        '<option value="">Unable to load districts</option>';

                    console.error(error);

                });

        });



    document
        .getElementById('district_id')
        .addEventListener('change', function () {

            let districtId = this.value;

            let upazilaSelect =
                document.getElementById('upazila_id');


            upazilaSelect.innerHTML =
                '<option value="">Loading...</option>';


            if (!districtId) {

                upazilaSelect.innerHTML =
                    '<option value="">Select Upazila</option>';

                return;

            }


            fetch(
                '{{ url('/patient/upazilas') }}/' + districtId
            )

                .then(response => response.json())

                .then(data => {

                    upazilaSelect.innerHTML =
                        '<option value="">Select Upazila</option>';


                    data.forEach(upazila => {

                        upazilaSelect.innerHTML += `

                        <option value="${upazila.id}">
                            ${upazila.name}
                        </option>

                    `;

                    });

                })

                .catch(error => {

                    upazilaSelect.innerHTML =
                        '<option value="">Unable to load upazilas</option>';

                    console.error(error);

                });

        });

</script>


</body>

</html>
