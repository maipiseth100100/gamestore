@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Edit Slider</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.sliders.update', $slider->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- TITLE --}}
                <div class="mb-3">
                    <label class="form-label">Title</label>

                    <input type="text"
                           name="title"
                           value="{{ old('title', $slider->title) }}"
                           class="form-control">
                </div>

                {{-- SUBTITLE --}}
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>

                    <textarea name="subtitle"
                              rows="4"
                              class="form-control">{{ old('subtitle', $slider->subtitle) }}</textarea>
                </div>

                {{-- CURRENT IMAGE --}}
<div class="mb-3">
    <label class="form-label">Current Image</label>
    <br>

    @if(!empty($slider->image))
        <img  src="{{ asset('uploads/sliders/'.$slider->image) }}"
             width="250"
             class="rounded shadow"
             alt="Slider Image">
    @else
        <img src="https://via.placeholder.com/250"
             width="250"
             class="rounded shadow"
             alt="No Image">
    @endif
</div>

                {{-- NEW IMAGE --}}
                <div class="mb-3">
                    <label class="form-label">Change Image</label>

                    <input type="file"
                           name="image"
                           class="form-control">
                </div>

                {{-- BUTTON TEXT --}}
                <div class="mb-3">
                    <label class="form-label">Button Text</label>

                    <input type="text"
                           name="button_text"
                           value="{{ old('button_text', $slider->button_text) }}"
                           class="form-control">
                </div>

                {{-- STATUS --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select">

                        <option value="1"
                            {{ old('status', $slider->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $slider->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>

                {{-- SUBMIT --}}
                <button class="btn btn-success w-100">
                    Update Slider
                </button>

            </form>

        </div>

    </div>

</div>

@endsection