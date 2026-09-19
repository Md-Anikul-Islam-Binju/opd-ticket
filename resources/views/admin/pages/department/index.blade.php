@extends('admin.app')

@section('admin_content')

    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">


                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">Department</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Department!
                        </li>
                    </ol>
                </div>

                <h4 class="page-title">Department!</h4>
            </div>
        </div>
    </div>

    <!-- Department Section -->
    <div class="col-12">
        <div class="card">

            <!-- Card Header -->
            <div class="card-header">
                <div class="d-flex justify-content-end">

                    @can('department-create')
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
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Doctors</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($departments as $key => $department)

                        <tr>

                            <td>
                                {{ $departments->firstItem() + $key }}
                            </td>

                            <td>
                                {{ $department->name }}
                            </td>

                            <td>
                                {{ $department->slug }}
                            </td>

                            <td>
                                <span class="badge bg-info">
                                    {{ $department->doctors_count }}
                                </span>
                            </td>

                            <td>
                                {{ $department->description
                                    ? \Illuminate\Support\Str::limit($department->description, 60)
                                    : 'N/A'
                                }}
                            </td>

                            <td>
                                @if($department->status == 1)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <td style="width: 180px;">

                                <div class="d-flex justify-content-end gap-1">

                                    @can('department-edit')

                                        <a
                                            href="{{ route('department.toggleStatus', $department->id) }}"
                                            class="btn btn-sm {{ $department->status == 1 ? 'btn-warning' : 'btn-success' }}"
                                        >
                                            {{ $department->status == 1 ? 'Inactive' : 'Active' }}
                                        </a>

                                        <button
                                            type="button"
                                            class="btn btn-info btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editNewModalId{{ $department->id }}"
                                        >
                                            Edit
                                        </button>

                                    @endcan

                                    @can('department-delete')

                                        <a
                                            href="{{ route('department.destroy', $department->id) }}"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#danger-header-modal{{ $department->id }}"
                                        >
                                            Delete
                                        </a>

                                    @endcan

                                </div>

                            </td>

                            <!-- Edit Modal -->
                            <div
                                class="modal fade"
                                id="editNewModalId{{ $department->id }}"
                                data-bs-backdrop="static"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="editNewModalLabel{{ $department->id }}"
                                aria-hidden="true"
                            >

                                <div class="modal-dialog modal-lg modal-dialog-centered">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h4
                                                class="modal-title"
                                                id="editNewModalLabel{{ $department->id }}"
                                            >
                                                Edit Department
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
                                                action="{{ route('department.update', $department->id) }}"
                                            >

                                                @csrf
                                                @method('PUT')

                                                <!-- Name -->
                                                <div class="row">

                                                    <div class="col-12">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Department Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="name"
                                                                value="{{ $department->name }}"
                                                                class="form-control"
                                                                placeholder="Enter Department Name"
                                                                required
                                                            >

                                                        </div>

                                                    </div>

                                                </div>

                                                <!-- Status -->
                                                <div class="row">

                                                    <div class="col-12">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Status
                                                            </label>

                                                            <select
                                                                name="status"
                                                                class="form-select"
                                                            >

                                                                <option
                                                                    value="1"
                                                                    {{ $department->status == 1 ? 'selected' : '' }}
                                                                >
                                                                    Active
                                                                </option>

                                                                <option
                                                                    value="0"
                                                                    {{ $department->status == 0 ? 'selected' : '' }}
                                                                >
                                                                    Inactive
                                                                </option>

                                                            </select>

                                                        </div>

                                                    </div>

                                                </div>

                                                <!-- Description -->
                                                <div class="row">

                                                    <div class="col-12">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Description
                                                            </label>

                                                            <textarea
                                                                name="description"
                                                                class="form-control"
                                                                rows="5"
                                                                placeholder="Enter Department Description"
                                                            >{{ $department->description }}</textarea>

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

                            <!-- Delete Modal -->
                            <div
                                id="danger-header-modal{{ $department->id }}"
                                class="modal fade"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="danger-header-modalLabel{{ $department->id }}"
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
                                                Are You Want to Delete this Department?
                                            </h5>

                                            @if($department->doctors_count > 0)

                                                <div class="alert alert-warning mt-3 mb-0">
                                                    This department has
                                                    <strong>
                                                        {{ $department->doctors_count }}
                                                    </strong>
                                                    doctor(s), so it cannot be deleted.
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

                                            @if($department->doctors_count == 0)

                                                <a
                                                    href="{{ route('department.destroy', $department->id) }}"
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
                    {{ $departments->links() }}
                </div>

            </div>

        </div>
    </div>


    <!-- Add Modal -->
    <div
        class="modal fade"
        id="addNewModalId"
        data-bs-backdrop="static"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addNewModalLabel"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h4
                        class="modal-title"
                        id="addNewModalLabel"
                    >
                        Add Department
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
                        action="{{ route('department.store') }}"
                    >

                        @csrf

                        <!-- Name -->
                        <div class="row">

                            <div class="col-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Department Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Enter Department Name"
                                        required
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- Status -->
                        <div class="row">

                            <div class="col-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Status
                                    </label>

                                    <select
                                        name="status"
                                        class="form-select"
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

                        <!-- Description -->
                        <div class="row">

                            <div class="col-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Description
                                    </label>

                                    <textarea
                                        name="description"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Enter Department Description"
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
