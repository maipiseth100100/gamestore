@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-lg">

        <div class="card-header bg-white">
            <h3 class="mb-0">✏️ Edit Game</h3>
        </div>

        <div class="card-body">

            {{-- ✅ FIX: enctype added --}}
            <form action="{{ route('admin.games.update', $game->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Category --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Category</label>

                        <select name="category_id"
                                class="form-select"
                                required>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ $game->category_id == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Title --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">Game Title</label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title', $game->title) }}"
                               required>

                    </div>

                    {{-- IMAGE UPLOAD FIX --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">Main Image</label>

                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*">

                    </div>

                    {{-- IMAGE PREVIEW --}}
                    <div class="col-md-12 mb-3">

                        @if($game->image)
                            <img src="{{ asset('storage/' . $game->image) }}"
                                 width="150"
                                 class="img-thumbnail">
                        @else
                            <img src="https://via.placeholder.com/150"
                                 width="150"
                                 class="img-thumbnail">
                        @endif

                    </div>

                    {{-- Trailer --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">Trailer URL</label>

                        <input type="url"
                               name="trailer_url"
                               class="form-control"
                               value="{{ old('trailer_url', $game->trailer_url) }}">
                    </div>

                    {{-- Price --}}
                    <div class="col-md-4 mb-3">

                        <label class="form-label">Price ($)</label>

                        <input type="number"
                               step="0.01"
                               name="price"
                               class="form-control"
                               value="{{ old('price', $game->price) }}"
                               required>
                    </div>

                    {{-- Options --}}
                    <div class="col-md-8 mb-3 d-flex align-items-end flex-wrap">

                        <div class="form-check me-4">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="featured"
                                   value="1"
                                   {{ $game->featured ? 'checked' : '' }}>
                            <label class="form-check-label">Featured</label>
                        </div>

                        <div class="form-check me-4">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="latest_games"
                                   value="1"
                                   {{ $game->latest_games ? 'checked' : '' }}>
                            <label class="form-check-label">Latest Game</label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="status"
                                   value="1"
                                   {{ $game->status ? 'checked' : '' }}>
                            <label class="form-check-label">Active</label>
                        </div>

                    </div>

                    {{-- 🔥 FIXED SCREENSHOTS (FILE UPLOAD) --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">Screenshots</label>

                        @for($i = 0; $i < 5; $i++)

                            <input type="file"
                                   name="screenshots[]"
                                   class="form-control mb-2"
                                   accept="image/*">

                        @endfor

                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">Description</label>

                        <textarea name="description"
                                  rows="6"
                                  class="form-control">{{ old('description', $game->description) }}</textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-end">

                    <a href="{{ route('admin.games.index') }}"
                       class="btn btn-secondary me-2">
                        Cancel
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>
                        Update Game
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection