<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Patient Registration</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow-sm">

                <div class="card-header">

                    <h4 class="mb-0">
                        Patient Registration
                    </h4>

                </div>


                <div class="card-body">

                    @if(session('error'))

                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>

                    @endif


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


                    <form
                        action="{{ route('patient.register.store') }}"
                        method="POST"
                    >

                        @csrf


                        <div class="row">


                            {{-- Name --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Full Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control"
                                    required
                                >

                            </div>


                            {{-- Email --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control"
                                    required
                                >

                            </div>


                            {{-- Phone --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Phone
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    class="form-control"
                                    required
                                >

                            </div>


                            {{-- Date of Birth --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Date of Birth
                                </label>

                                <input
                                    type="date"
                                    name="date_of_birth"
                                    value="{{ old('date_of_birth') }}"
                                    class="form-control"
                                >

                            </div>


                            {{-- Age --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Age
                                </label>

                                <input
                                    type="number"
                                    name="age"
                                    value="{{ old('age') }}"
                                    class="form-control"
                                    min="0"
                                    max="120"
                                >

                            </div>


                            {{-- Gender --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
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


                            {{-- Division --}}

                            <div class="col-md-4 mb-3">

                                <label class="form-label">
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

                                <label class="form-label">
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

                                <label class="form-label">
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

                                <label class="form-label">
                                    Post Office
                                </label>

                                <input
                                    type="text"
                                    name="post_office"
                                    value="{{ old('post_office') }}"
                                    class="form-control"
                                >

                            </div>


                            {{-- NID --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    NID Number
                                </label>

                                <input
                                    type="text"
                                    name="nid_number"
                                    value="{{ old('nid_number') }}"
                                    class="form-control"
                                >

                            </div>


                            {{-- Relationship --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Relationship
                                </label>

                                <input
                                    type="text"
                                    name="relationship"
                                    value="{{ old('relationship') }}"
                                    class="form-control"
                                >

                            </div>


                            {{-- Emergency Contact --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Emergency Contact
                                </label>

                                <input
                                    type="text"
                                    name="emergency_contact"
                                    value="{{ old('emergency_contact') }}"
                                    class="form-control"
                                >

                            </div>


                            {{-- Address --}}

                            <div class="col-12 mb-3">

                                <label class="form-label">
                                    Address
                                </label>

                                <textarea
                                    name="address"
                                    rows="3"
                                    class="form-control"
                                >{{ old('address') }}</textarea>

                            </div>


                            {{-- Medical History --}}

                            <div class="col-12 mb-3">

                                <label class="form-label">
                                    Medical History
                                </label>

                                <textarea
                                    name="medical_history"
                                    rows="3"
                                    class="form-control"
                                >{{ old('medical_history') }}</textarea>

                            </div>


                            {{-- Password --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required
                                >

                            </div>


                            {{-- Confirm Password --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Confirm Password
                                </label>

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    required
                                >

                            </div>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Register
                        </button>


                        <a
                            href="{{ route('patient.login') }}"
                            class="btn btn-link"
                        >
                            Already have an account? Login
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


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

                });

        });

</script>

</body>

</html>
