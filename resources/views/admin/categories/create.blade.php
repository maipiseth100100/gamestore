@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            📂 Create Category
        </h3>

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Back

        </a>

    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Category Information
            </h5>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.categories.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- Category Name --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Category Name

                    </label>

                    <input type="text"
                           id="name"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           placeholder="Enter category name"
                           required>

                </div>

                {{-- Slug --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Slug

                    </label>

                    <input type="text"
                           id="slug"
                           name="slug"
                           class="form-control"
                           value="{{ old('slug') }}"
                           placeholder="category-slug"
                           required>

                </div>

                {{-- Icon Image --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Category Image

                    </label>

                    <input type="file"
                           name="icon_image"
                           class="form-control"
                           accept="image/*"
                           onchange="previewImage(event)">

                </div>

                {{-- Preview --}}
                <div class="mb-3">

                    <img id="preview"
                         src="https://via.placeholder.com/200x150?text=Preview"
                         class="img-thumbnail"
                         style="max-width:200px;">

                </div>

                {{-- Status --}}
                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Status

                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="1" selected>
                            Active
                        </option>

                        <option value="0">
                            Inactive
                        </option>

                    </select>

                </div>

                <button type="submit"
                        class="btn btn-success">

                    <i class="fas fa-save"></i>
                    Save Category

                </button>

            </form>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

// Auto Slug
document.getElementById('name').addEventListener('keyup', function() {

    let slug = this.value
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9]+/g,'-')
        .replace(/^-|-$/g,'');

    document.getElementById('slug').value = slug;

});

// Preview Image
function previewImage(event)
{
    let reader = new FileReader();

    reader.onload = function()
    {
        document.getElementById('preview').src = reader.result;
    };

    reader.readAsDataURL(event.target.files[0]);
}

</script>

@endpush