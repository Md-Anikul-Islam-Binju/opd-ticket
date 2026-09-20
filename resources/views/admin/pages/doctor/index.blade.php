@extends('admin.app')

@section('admin_content')

    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                CoderNetix
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                Doctor
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Doctor!
                        </li>

                    </ol>
                </div>

                <h4 class="page-title">
                    Doctor!
                </h4>

            </div>
        </div>
    </div>


    <!-- Doctor Section -->
    <div class="col-12">

        <div class="card">

            <!-- Card Header -->
            <div class="card-header">

                <div class="d-flex justify-content-end">

                    @can('doctor-create')

                        <button
                            type="button"
                            class="btn btn-info"
                            data-bs-toggle="modal"
                            data-bs-target="#addNewModalId"
                        >
                            Add New
                        </button>

                    @endcan

                </div>

            </div>


            <!-- Card Body -->
            <div class="card-body">

                <table
                    id="basic-datatable"
                    class="table table-striped dt-responsive nowrap w-100"
                >

                    <thead>

                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Doctor Code</th>
                        <th>Department</th>
                        <th>Phone</th>
{{--                        <th>Specialization</th>--}}
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    </thead>


                    <tbody>

                    @foreach($doctors as $key => $doctor)

                        <tr>

                            <td>
                                {{ $doctors->firstItem() + $key }}
                            </td>


                            <!-- Photo -->
                            <td>

                                @if($doctor->photo)

                                    <img
                                        src="{{ asset('images/doctor/' . $doctor->photo) }}"
                                        alt="Doctor Photo"
                                        style="
                                            width: 50px;
                                            height: 50px;
                                            object-fit: cover;
                                            border-radius: 50%;
                                        "
                                    >

                                @else

                                    <div
                                        style="
                                            width: 50px;
                                            height: 50px;
                                            border-radius: 50%;
                                            background: #eee;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                        "
                                    >
                                        N/A
                                    </div>

                                @endif

                            </td>


                            <!-- Name -->
                            <td>
                                {{ $doctor->name }}
                            </td>


                            <!-- Doctor Code -->
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $doctor->doctor_code }}
                                </span>
                            </td>


                            <!-- Department -->
                            <td>
                                {{ $doctor->department->name ?? 'N/A' }}
                            </td>


                            <!-- Phone -->
                            <td>
                                {{ $doctor->phone ?? 'N/A' }}
                            </td>


                            <!-- Specialization -->
{{--                            <td>--}}
{{--                                {{ $doctor->specialization ?? 'N/A' }}--}}
{{--                            </td>--}}


                            <!-- Status -->
                            <td>

                                @if($doctor->status == 1)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif

                            </td>


                            <!-- Action -->
                            <td style="width: 220px;">

                                <div class="d-flex justify-content-end gap-1">

                                    @can('doctor-edit')

                                        <a
                                            href="{{ route('doctor.toggleStatus', $doctor->id) }}"
                                            class="btn btn-sm {{ $doctor->status == 1 ? 'btn-warning' : 'btn-success' }}"
                                        >
                                            {{ $doctor->status == 1 ? 'Inactive' : 'Active' }}
                                        </a>


                                        <button
                                            type="button"
                                            class="btn btn-info btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editNewModalId{{ $doctor->id }}"
                                        >
                                            Edit
                                        </button>

                                    @endcan


                                    @can('doctor-delete')

                                        <a
                                            href="{{ route('doctor.destroy', $doctor->id) }}"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#danger-header-modal{{ $doctor->id }}"
                                        >
                                            Delete
                                        </a>

                                    @endcan

                                        @can('doctor-schedule-list')
                                        <a href="{{ route('doctor.schedule', $doctor->id) }}"
                                           class="btn btn-sm btn-info">
                                            Schedule
                                        </a>
                                        @endcan


                                </div>

                            </td>


                            <!-- ==============================
                                 Edit Modal
                            =============================== -->

                            <div
                                class="modal fade"
                                id="editNewModalId{{ $doctor->id }}"
                                data-bs-backdrop="static"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="editNewModalLabel{{ $doctor->id }}"
                                aria-hidden="true"
                            >

                                <div class="modal-dialog modal-xl modal-dialog-centered">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h4
                                                class="modal-title"
                                                id="editNewModalLabel{{ $doctor->id }}"
                                            >
                                                Edit Doctor
                                            </h4>

                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>

                                        </div>


                                        <div class="modal-body">

                                            <form
                                                method="post"
                                                action="{{ route('doctor.update', $doctor->id) }}"
                                                enctype="multipart/form-data"
                                            >

                                                @csrf
                                                @method('PUT')


                                                <div class="row">

                                                    <!-- Department -->
                                                    <div class="col-md-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Department
                                                            </label>

                                                            <select
                                                                name="department_id"
                                                                class="form-select"
                                                                required
                                                            >

                                                                <option value="">
                                                                    Select Department
                                                                </option>

                                                                @foreach($departments as $department)

                                                                    <option
                                                                        value="{{ $department->id }}"
                                                                        {{ $doctor->department_id == $department->id ? 'selected' : '' }}
                                                                    >
                                                                        {{ $department->name }}
                                                                    </option>

                                                                @endforeach

                                                            </select>

                                                        </div>

                                                    </div>


                                                    <!-- Name -->
                                                    <div class="col-md-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Doctor Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="name"
                                                                value="{{ $doctor->name }}"
                                                                class="form-control"
                                                                placeholder="Enter Doctor Name"
                                                                required
                                                            >

                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="row">

                                                    <!-- Phone -->
                                                    <div class="col-md-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Phone
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="phone"
                                                                value="{{ $doctor->phone }}"
                                                                class="form-control"
                                                                placeholder="Enter Phone"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Email -->
                                                    <div class="col-md-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Email
                                                            </label>

                                                            <input
                                                                type="email"
                                                                name="email"
                                                                value="{{ $doctor->email }}"
                                                                class="form-control"
                                                                placeholder="Enter Email"
                                                            >

                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="row">

                                                    <!-- Designation -->
                                                    <div class="col-md-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Designation
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="designation"
                                                                value="{{ $doctor->designation }}"
                                                                class="form-control"
                                                                placeholder="Enter Designation"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Specialization -->
                                                    <div class="col-md-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Specialization
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="specialization"
                                                                value="{{ $doctor->specialization }}"
                                                                class="form-control"
                                                                placeholder="Enter Specialization"
                                                            >

                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="row">

                                                    <!-- Photo -->
                                                    <div class="col-md-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Photo
                                                            </label>

                                                            <input
                                                                type="file"
                                                                name="photo"
                                                                class="form-control"
                                                                accept="image/*"
                                                            >

                                                            @if($doctor->photo)

                                                                <img
                                                                    src="{{ asset('images/doctor/' . $doctor->photo) }}"
                                                                    alt="Doctor Photo"
                                                                    class="mt-2"
                                                                    style="
                                                                        width: 70px;
                                                                        height: 70px;
                                                                        object-fit: cover;
                                                                        border-radius: 50%;
                                                                    "
                                                                >

                                                            @endif

                                                        </div>

                                                    </div>


                                                    <!-- Status -->
                                                    <div class="col-md-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Status
                                                            </label>

                                                            <select
                                                                name="status"
                                                                class="form-select"
                                                                required
                                                            >

                                                                <option
                                                                    value="1"
                                                                    {{ $doctor->status == 1 ? 'selected' : '' }}
                                                                >
                                                                    Active
                                                                </option>

                                                                <option
                                                                    value="0"
                                                                    {{ $doctor->status == 0 ? 'selected' : '' }}
                                                                >
                                                                    Inactive
                                                                </option>

                                                            </select>

                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- Bio -->
                                                <div class="row">

                                                    <div class="col-12">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Bio
                                                            </label>

                                                            <textarea
                                                                name="bio"
                                                                class="form-control"
                                                                rows="5"
                                                                placeholder="Enter Doctor Bio"
                                                            >{{ $doctor->bio }}</textarea>

                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="d-flex justify-content-end">

                                                    <button
                                                        class="btn btn-primary"
                                                        type="submit"
                                                    >
                                                        Update
                                                    </button>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!-- ==============================
                                 Delete Modal
                            =============================== -->

                            <div
                                id="danger-header-modal{{ $doctor->id }}"
                                class="modal fade"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="danger-header-modalLabel{{ $doctor->id }}"
                                aria-hidden="true"
                            >

                                <div class="modal-dialog modal-dialog-centered">

                                    <div class="modal-content">

                                        <div class="modal-header modal-colored-header bg-danger">

                                            <h4 class="modal-title">
                                                Delete
                                            </h4>

                                            <button
                                                type="button"
                                                class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            ></button>

                                        </div>


                                        <div class="modal-body">

                                            <h5 class="mt-0">
                                                Are You Want to Delete this Doctor?
                                            </h5>

                                            @if($doctor->appointments()->exists())

                                                <div class="alert alert-warning mt-3 mb-0">

                                                    This doctor has appointment
                                                    history and cannot be deleted.

                                                </div>

                                            @endif

                                        </div>


                                        <div class="modal-footer">

                                            <button
                                                type="button"
                                                class="btn btn-light"
                                                data-bs-dismiss="modal"
                                            >
                                                Close
                                            </button>


                                            @if(!$doctor->appointments()->exists())

                                                <a
                                                    href="{{ route('doctor.destroy', $doctor->id) }}"
                                                    class="btn btn-danger"
                                                >
                                                    Delete
                                                </a>

                                            @else

                                                <button
                                                    type="button"
                                                    class="btn btn-danger"
                                                    disabled
                                                >
                                                    Delete
                                                </button>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </tr>

                    @endforeach

                    </tbody>

                </table>


                <!-- Pagination -->
                <div class="mt-3">
                    {{ $doctors->links() }}
                </div>

            </div>

        </div>

    </div>


    <!-- ==============================
         Add Modal
    =============================== -->

    <div
        class="modal fade"
        id="addNewModalId"
        data-bs-backdrop="static"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addNewModalLabel"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-xl modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h4
                        class="modal-title"
                        id="addNewModalLabel"
                    >
                        Add Doctor
                    </h4>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>

                </div>


                <div class="modal-body">

                    <form
                        method="post"
                        action="{{ route('doctor.store') }}"
                        enctype="multipart/form-data"
                    >

                        @csrf


                        <div class="row">

                            <!-- Department -->
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Department
                                    </label>

                                    <select
                                        name="department_id"
                                        class="form-select"
                                        required
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

                            </div>


                            <!-- Name -->
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Doctor Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Enter Doctor Name"
                                        required
                                    >

                                </div>

                            </div>

                        </div>


                        <div class="row">

                            <!-- Phone -->
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Phone
                                    </label>

                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        placeholder="Enter Phone"
                                    >

                                </div>

                            </div>


                            <!-- Email -->
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="Enter Email"
                                    >

                                </div>

                            </div>

                        </div>


                        <div class="row">

                            <!-- Designation -->
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Designation
                                    </label>

                                    <input
                                        type="text"
                                        name="designation"
                                        class="form-control"
                                        placeholder="Enter Designation"
                                    >

                                </div>

                            </div>


                            <!-- Specialization -->
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Specialization
                                    </label>

                                    <input
                                        type="text"
                                        name="specialization"
                                        class="form-control"
                                        placeholder="Enter Specialization"
                                    >

                                </div>

                            </div>

                        </div>


                        <div class="row">

                            <!-- Photo -->
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Photo
                                    </label>

                                    <input
                                        type="file"
                                        name="photo"
                                        class="form-control"
                                        accept="image/*"
                                    >

                                </div>

                            </div>


                            <!-- Status -->
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Status
                                    </label>

                                    <select
                                        name="status"
                                        class="form-select"
                                        required
                                    >

                                        <option value="1">
                                            Active
                                        </option>

                                        <option value="0">
                                            Inactive
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>


                        <!-- Bio -->
                        <div class="row">

                            <div class="col-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Bio
                                    </label>

                                    <textarea
                                        name="bio"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Enter Doctor Bio"
                                    ></textarea>

                                </div>

                            </div>

                        </div>


                        <div class="d-flex justify-content-end">

                            <button
                                class="btn btn-primary"
                                type="submit"
                            >
                                Submit
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
