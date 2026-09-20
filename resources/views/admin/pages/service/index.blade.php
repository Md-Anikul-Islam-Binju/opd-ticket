@extends('admin.app')

@section('admin_content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-8 mx-auto">

                <div class="card">

                    <div class="card-header">
                        <h4 class="mb-0">
                            Ticket Fee Settings
                        </h4>
                    </div>

                    <div class="card-body">

                        @if($service)

                            <form
                                action="{{ route('service.update', $service->id) }}"
                                method="POST"
                            >

                                @csrf
                                @method('PUT')

                                @else

                                    <form
                                        action="{{ route('service.store') }}"
                                        method="POST"
                                    >

                                        @csrf

                                        @endif

                                        {{-- Service Name --}}
                                        <div class="mb-3">

                                            <label class="form-label">
                                                Service Name
                                            </label>

                                            <input
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                value="{{ old('name', $service->name ?? 'Doctor Consultation') }}"
                                                placeholder="Doctor Consultation"
                                                required
                                            >

                                            @error('name')
                                            <div class="text-danger mt-1">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>


                                        {{-- Ticket Fee --}}
                                        <div class="mb-3">

                                            <label class="form-label">
                                                Ticket Fee
                                            </label>

                                            <div class="input-group">

                                <span class="input-group-text">
                                    ৳
                                </span>

                                                <input
                                                    type="number"
                                                    name="fee"
                                                    class="form-control"
                                                    value="{{ old('fee', $service->fee ?? 0) }}"
                                                    min="0"
                                                    step="0.01"
                                                    placeholder="0.00"
                                                    required
                                                >

                                            </div>

                                            @error('fee')
                                            <div class="text-danger mt-1">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>


                                        {{-- Description --}}
                                        <div class="mb-3">

                                            <label class="form-label">
                                                Description
                                            </label>

                                            <textarea
                                                name="description"
                                                class="form-control"
                                                rows="4"
                                                placeholder="Ticket / Doctor Consultation Fee"
                                            >{{ old('description', $service->description ?? '') }}</textarea>

                                            @error('description')
                                            <div class="text-danger mt-1">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>


                                        {{-- Status --}}
                                        <div class="mb-4">

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
                                                    {{ old('status', $service->status ?? 1) == 1 ? 'selected' : '' }}
                                                >
                                                    Active
                                                </option>

                                                <option
                                                    value="0"
                                                    {{ old('status', $service->status ?? 1) == 0 ? 'selected' : '' }}
                                                >
                                                    Inactive
                                                </option>

                                            </select>

                                            @error('status')
                                            <div class="text-danger mt-1">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>


                                        {{-- Submit --}}
                                        <div class="d-flex justify-content-end">

                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                            >

                                                @if($service)
                                                    Update Ticket Fee
                                                @else
                                                    Set Ticket Fee
                                                @endif

                                            </button>

                                        </div>

                                    </form>

                    </div>

                </div>


                {{-- Current Ticket Fee --}}
                @if($service)

                    <div class="card mt-4">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Current Ticket Fee
                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="row align-items-center">

                                <div class="col-md-8">

                                    <div class="text-muted small">
                                        {{ $service->name }}
                                    </div>

                                    <h2 class="mb-1">
                                        ৳ {{ number_format($service->fee, 2) }}
                                    </h2>

                                    @if($service->description)

                                        <p class="text-muted mb-0">
                                            {{ $service->description }}
                                        </p>

                                    @endif

                                </div>


                                <div class="col-md-4 text-md-end mt-3 mt-md-0">

                                    @if($service->status)

                                        <span class="badge bg-success px-3 py-2">
                                        Active
                                    </span>

                                    @else

                                        <span class="badge bg-danger px-3 py-2">
                                        Inactive
                                    </span>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

@endsection
