{{--@extends('admin.app')--}}
{{--@section('admin_content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}
{{--            <div class="pull-left">--}}
{{--                <h2>Edit Role</h2>--}}
{{--            </div>--}}
{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-primary btn-sm mb-2" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    @if (count($errors) > 0)--}}
{{--        <div class="alert alert-danger">--}}
{{--            <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <form method="POST" action="{{ route('roles.update', $role->id) }}">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}

{{--        <div class="row">--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Name:</strong>--}}
{{--                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $role->name }}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Permission:</strong>--}}
{{--                    <br/>--}}
{{--                    @foreach($permission as $value)--}}
{{--                        <label><input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}>--}}
{{--                            {{ $value->name }}</label>--}}
{{--                        <br/>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i> Submit</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

{{--    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>--}}
{{--@endsection--}}


@extends('admin.app')

@section('admin_content')

    <div class="row">
        <div class="col-12">

            {{-- Page Header --}}
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <h4 class="mb-1">Edit Role</h4>
                        <p class="text-muted mb-0">
                            Update role information and permissions.
                        </p>
                    </div>

                    <a class="btn btn-primary" href="{{ route('roles.index') }}">
                        <i class="fa fa-arrow-left me-1"></i>
                        Back
                    </a>

                </div>
            </div>


            {{-- Validation Errors --}}
            @if (count($errors) > 0)

                <div class="alert alert-danger">
                    <strong>Whoops!</strong>
                    There were some problems with your input.

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif


            <form method="POST" action="{{ route('roles.update', $role->id) }}">

                @csrf
                @method('PUT')


                {{-- =========================
                     SECTION 01 : ROLE INFO
                ========================== --}}
                <div class="card">

                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fa fa-user-shield me-1"></i>
                            Role Information
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-lg-6">

                                <label class="form-label">
                                    Role Name <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    placeholder="Enter role name"
                                    class="form-control"
                                    value="{{ old('name', $role->name) }}"
                                    required
                                >

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =========================
                     SECTION 02 : PERMISSIONS
                ========================== --}}
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="mb-0">
                                <i class="fa fa-key me-1"></i>
                                Permissions
                            </h5>

                            <small class="text-muted">
                                Select the permissions for this role.
                            </small>
                        </div>

                        <div>

                            <button
                                type="button"
                                class="btn btn-sm btn-soft-primary"
                                id="selectAll">
                                <i class="fa fa-check-double me-1"></i>
                                Select All
                            </button>

                            <button
                                type="button"
                                class="btn btn-sm btn-soft-danger"
                                id="unselectAll">
                                <i class="fa fa-xmark me-1"></i>
                                Clear All
                            </button>

                        </div>

                    </div>


                    <div class="card-body">

                        <div class="row">

                            @foreach($permission as $value)

                                <div class="col-xl-3 col-lg-4 col-md-6 mb-3">

                                    <div class="border rounded p-3 h-100">

                                        <div class="form-check">

                                            <input
                                                type="checkbox"
                                                name="permission[{{ $value->id }}]"
                                                value="{{ $value->id }}"
                                                class="form-check-input permission-checkbox"
                                                id="permission_{{ $value->id }}"
                                                {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}
                                            >

                                            <label
                                                class="form-check-label fw-medium"
                                                for="permission_{{ $value->id }}"
                                            >
                                                {{ $value->name }}
                                            </label>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- =========================
                     SECTION 03 : ACTION
                ========================== --}}
                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <h5 class="mb-1">Update Role</h5>

                                <p class="text-muted mb-0">
                                    Save the updated role and permissions.
                                </p>
                            </div>

                            <div>

                                <a
                                    href="{{ route('roles.index') }}"
                                    class="btn btn-light me-2"
                                >
                                    Cancel
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    <i class="fa-solid fa-floppy-disk me-1"></i>
                                    Update Role
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>


    {{-- Select / Clear Permissions --}}
    <script>

        document.getElementById('selectAll').addEventListener('click', function () {

            document.querySelectorAll('.permission-checkbox').forEach(function (checkbox) {
                checkbox.checked = true;
            });

        });


        document.getElementById('unselectAll').addEventListener('click', function () {

            document.querySelectorAll('.permission-checkbox').forEach(function (checkbox) {
                checkbox.checked = false;
            });

        });

    </script>

@endsection
