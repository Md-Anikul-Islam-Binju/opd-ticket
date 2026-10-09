
@extends('admin.app')

@section('admin_content')

    {{-- Page Title --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Room Management</li>
                        <li class="breadcrumb-item active">Room List</li>
                    </ol>
                </div>

                <h4 class="page-title">Room Management</h4>
            </div>
        </div>
    </div>

    {{-- Room List --}}
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <div class="d-flex justify-content-end">
                    @can('room-create')
                        <button type="button"
                                class="btn btn-info"
                                data-bs-toggle="modal"
                                data-bs-target="#addRoomModal">
                            Add New Room
                        </button>
                    @endcan
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="basic-datatable"
                           class="table table-striped dt-responsive nowrap w-100">

                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Floor No</th>
                            <th>Room No</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($rooms as $key => $room)
                            <tr>
                                <td>{{ $rooms->firstItem() + $key }}</td>

                                <td>
                                    Floor {{ $room->floor_no }}
                                </td>

                                <td>
                                    {{ $room->room_no }}
                                </td>

                                <td>
                                    @if($room->status === 'free')
                                        <span class="badge bg-success">Free</span>
                                    @else
                                        <span class="badge bg-danger">Booked</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        @can('room-edit')
                                            <button type="button"
                                                    class="btn btn-info btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editRoomModal{{ $room->id }}">
                                                Edit
                                            </button>
                                        @endcan

                                        @can('room-delete')
                                            <button type="button"
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteRoomModal{{ $room->id }}">
                                                Delete
                                            </button>
                                        @endcan

                                    </div>
                                </td>
                            </tr>


                            {{-- Edit Room Modal --}}
                            <div class="modal fade"
                                 id="editRoomModal{{ $room->id }}"
                                 data-bs-backdrop="static"
                                 tabindex="-1"
                                 aria-hidden="true">

                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Edit Room {{ $room->room_no }}
                                            </h4>

                                            <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">

                                            <form method="POST"
                                                  action="{{ route('room.update', $room->id) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="row">

                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Floor No</label>

                                                        <select name="floor_no"
                                                                class="form-select"
                                                                required>
                                                            @for($floor = 1; $floor <= 20; $floor++)
                                                                <option value="{{ $floor }}"
                                                                    {{ $room->floor_no == $floor ? 'selected' : '' }}>
                                                                    Floor {{ $floor }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Room No</label>

                                                        <input type="text"
                                                               name="room_no"
                                                               class="form-control"
                                                               value="{{ $room->room_no }}"
                                                               maxlength="50"
                                                               required>
                                                    </div>

                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">
                                                        Update Room
                                                    </button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Delete Room Modal --}}
                            <div class="modal fade"
                                 id="deleteRoomModal{{ $room->id }}"
                                 tabindex="-1"
                                 aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title text-white">Delete Room</h4>

                                            <button type="button"
                                                    class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">

                                            Are you sure you want to delete Room
                                            <strong>{{ $room->room_no }}</strong>
                                            on Floor {{ $room->floor_no }}?

                                            @if($room->status === 'booked')
                                                <div class="alert alert-warning mt-3 mb-0">
                                                    This room is assigned to a department.
                                                    Remove the assignment before deleting it.
                                                </div>
                                            @endif

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button"
                                                    class="btn btn-light"
                                                    data-bs-dismiss="modal">
                                                Cancel
                                            </button>

                                            @if($room->status === 'free')
                                                <form method="POST"
                                                      action="{{ route('room.destroy', $room->id) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            @else
                                                <button type="button"
                                                        class="btn btn-danger"
                                                        disabled>
                                                    Delete
                                                </button>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No rooms found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>

                <div class="mt-3">
                    {{ $rooms->links() }}
                </div>

            </div>
        </div>
    </div>


    {{-- Add Room Modal --}}
    <div class="modal fade"
         id="addRoomModal"
         data-bs-backdrop="static"
         tabindex="-1"
         aria-hidden="true">

        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Add New Room</h4>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form method="POST" action="{{ route('room.store') }}">
                        @csrf

                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Floor No</label>

                                <select name="floor_no"
                                        class="form-select"
                                        required>
                                    <option value="">Select Floor</option>

                                    @for($floor = 1; $floor <= 20; $floor++)
                                        <option value="{{ $floor }}">
                                            Floor {{ $floor }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Room No</label>

                                <input type="text"
                                       name="room_no"
                                       class="form-control"
                                       placeholder="Enter Room No, e.g. 201"
                                       maxlength="50"
                                       required>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                Save Room
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
