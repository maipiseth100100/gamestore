@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">🎞 Slider Details</h2>
            <p class="text-muted mb-0">View complete slider information</p>
        </div>

        <a href="{{ route('admin.sliders.index') }}" class="btn btn-dark">
            <i class="fas fa-arrow-left me-1"></i>
            Back
        </a>

    </div>

    <div class="row g-4">

        {{-- IMAGE --}}
        <div class="col-md-5">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-2">

                    @php
                        $img = $slider->image;
                    @endphp

                    @if($img)
                        <img src="{{ asset('uploads/sliders/'.$slider->image) }}"
                             class="img-fluid rounded-4"
                             style="width:100%; height:450px; object-fit:cover;"
                             onerror="this.src='https://via.placeholder.com/600x450?text=No+Image';">
                    @else
                        <img src="https://via.placeholder.com/600x450?text=No+Image"
                             class="img-fluid rounded-4"
                             style="width:100%; height:450px; object-fit:cover;">
                    @endif

                </div>

            </div>

        </div>

        {{-- DETAILS --}}
        <div class="col-md-7">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">📋 Slider Information</h4>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">ID</small>
                                <h6 class="fw-bold mb-0">{{ $slider->id }}</h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">Title</small>
                                <h6 class="fw-bold mb-0">{{ $slider->title ?? '-' }}</h6>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">Subtitle</small>
                                <p class="mb-0">{{ $slider->subtitle ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">Button Text</small>
                                <h6 class="fw-bold mb-0">{{ $slider->button_text ?? '-' }}</h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">Status</small>
                                <div>
                                    <span class="badge {{ $slider->status ? 'bg-success' : 'bg-danger' }}">
                                        {{ $slider->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">Created At</small>
                                <h6 class="fw-bold mb-0">
                                    {{ $slider->created_at?->format('d M Y') ?? '-' }}
                                </h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">Updated At</small>
                                <h6 class="fw-bold mb-0">
                                    {{ $slider->updated_at?->format('d M Y') ?? '-' }}
                                </h6>
                            </div>
                        </div>

                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="mt-4 d-flex gap-2">

                        <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                           class="btn btn-warning px-4">
                            <i class="fas fa-edit me-1"></i>
                            Edit
                        </a>

                        <a href="{{ route('admin.sliders.index') }}"
                           class="btn btn-dark px-4">
                            Back
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection