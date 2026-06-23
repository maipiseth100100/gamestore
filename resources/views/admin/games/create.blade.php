@extends('admin.layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- PAGE HEADER (same style as categories) -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="mb-0">🎮 Create Game</h3>

        <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">
            ← Back
        </a>

    </div>

    <!-- MAIN CARD -->
    <div class="card shadow border-0">

        <div class="card-body">

            <form action="{{ route('admin.games.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- CATEGORY -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- TITLE -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Game Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title') }}"
                               required>
                    </div>

                    <!-- IMAGE -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Game Image</label>
                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*">
                    </div>

                    <!-- TRAILER -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Trailer URL</label>
                        <input type="url"
                               name="trailer_url"
                               class="form-control"
                               placeholder="https://youtube.com/watch?v=...">
                    </div>

                    <!-- PRICE -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Price ($)</label>
                        <input type="number"
                               step="0.01"
                               name="price"
                               class="form-control"
                               value="{{ old('price') }}"
                               required>
                    </div>

                    <!-- STATUS -->
                    <div class="col-md-8 mb-3 d-flex align-items-end gap-4">

                        <div class="form-check">
                            <input type="checkbox"
                                   name="featured"
                                   value="1"
                                   class="form-check-input">
                            <label class="form-check-label">Featured</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox"
                                   name="latest_games"
                                   value="1"
                                   class="form-check-input">
                            <label class="form-check-label">Latest</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox"
                                   name="status"
                                   value="1"
                                   class="form-check-input"
                                   checked>
                            <label class="form-check-label">Active</label>
                        </div>

                    </div>

                    <!-- SCREENSHOTS -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label fw-bold">Screenshots</label>

                        <div id="screenshots-container">

                            <input type="file"
                                   name="screenshots[]"
                                   class="form-control mb-2"
                                   accept="image/*">

                        </div>

                        <button type="button"
                                class="btn btn-sm btn-success"
                                id="addScreenshot">

                            + Add Screenshot

                        </button>

                    </div>

                    <!-- DESCRIPTION -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description"
                                  rows="5"
                                  class="form-control">{{ old('description') }}</textarea>
                    </div>

                </div>

                <!-- ACTION BUTTONS -->
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.games.index') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        Save Game
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

<!-- SCRIPT -->
<script>
document.getElementById('addScreenshot').addEventListener('click', function () {

    let html = `
        <input type="file"
               name="screenshots[]"
               class="form-control mb-2"
               accept="image/*">
    `;

    document.getElementById('screenshots-container')
        .insertAdjacentHTML('beforeend', html);

});
</script>

@endsection