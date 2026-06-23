@extends('admin.layouts.app')

@section('content')

<div class="container">

```
<div class="card shadow-sm">

    <div class="card-header bg-dark text-white">
        <h3 class="mb-0">Add Hero Slider</h3>
    </div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.sliders.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>

                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Subtitle</label>

                <textarea name="subtitle"
                          rows="3"
                          class="form-control">{{ old('subtitle') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Slider Image</label>

                <input type="file"
                       name="image"
                       class="form-control"
                       accept="image/*"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Button Text</label>

                <input type="text"
                       name="button_text"
                       value="{{ old('button_text') }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>

                <select name="status"
                        class="form-select">

                    <option value="1">Active</option>
                    <option value="0">Inactive</option>

                </select>
            </div>

            <button type="submit"
                    class="btn btn-success w-100">

                Save Slider

            </button>

        </form>

    </div>

</div>
```

</div>

@endsection
