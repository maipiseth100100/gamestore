@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            ✏️ Edit Category
        </h3>

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Back

        </a>

    </div>

    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">
                        Category Information
                    </h5>

                </div>

                <div class="card-body">

                    <form action="{{ route('admin.categories.update', $category->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        {{-- Category Name --}}
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Category Name
                            </label>

                            <input type="text"
                                   id="name"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', $category->name) }}"
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
                                   value="{{ old('slug', $category->slug) }}"
                                   required>

                        </div>

                        {{-- Current Image --}}
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Current Icon
                            </label>

                            <div class="mb-3">

                                @if($category->icon_image)

                                    <img
                                        id="preview"
                                        src="{{ asset('storage/'.$category->icon_image) }}"
                                        class="img-thumbnail shadow"
                                        style="width:150px;height:150px;object-fit:cover;">

                                @else

                                    <img
                                        id="preview"
                                        src="https://via.placeholder.com/150x150?text=No+Image"
                                        class="img-thumbnail shadow">

                                @endif

                            </div>

                        </div>

                        {{-- Upload New Image --}}
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Change Icon Image
                            </label>

                            <input type="file"
                                   name="icon_image"
                                   class="form-control"
                                   accept="image/*"
                                   onchange="previewImage(event)">

                        </div>

                        {{-- Status --}}
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Status
                            </label>

                            <select name="status"
                                    class="form-select">

                                <option value="1"
                                    {{ $category->status == 1 ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0"
                                    {{ $category->status == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                        </div>

                        <button type="submit"
                                class="btn btn-success w-100">

                            <i class="fas fa-save"></i>
                            Update Category

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

// Auto Generate Slug
document.getElementById('name').addEventListener('keyup', function () {

    let slug = this.value
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-|-$/g, '');

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