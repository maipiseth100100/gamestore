@extends('frontend.layouts.app')

@section('content')

@php
    // SAFE YouTube embed fix (works for all formats)
    $embedUrl = null;

    if (!empty($game->trailer_url)) {

        $url = $game->trailer_url;

        if (str_contains($url, 'watch?v=')) {
            $embedUrl = str_replace('watch?v=', 'embed/', $url);
        }
        elseif (str_contains($url, 'youtu.be/')) {
            $embedUrl = 'https://www.youtube.com/embed/' . basename($url);
        }
        else {
            $embedUrl = $url;
        }
    }
@endphp

<div class="container py-5">

    <div class="row">

        {{-- GAME IMAGE --}}
        <div class="col-lg-4 mb-4">

            <img
                src="{{ $game->image ? asset('storage/'.$game->image) : 'https://via.placeholder.com/400x500' }}"
                alt="{{ $game->title }}"
                class="img-fluid rounded shadow"
                style="width:100%;height:600px;object-fit:cover;">

        </div>

        {{-- GAME INFO --}}
        <div class="col-lg-8">

            <h1 class="fw-bold mb-3">{{ $game->title }}</h1>

            <div class="mb-3">

                @if($game->featured)
                    <span class="badge bg-warning text-dark">Featured</span>
                @endif

                @if($game->latest_games)
                    <span class="badge bg-primary">Latest</span>
                @endif

            </div>

            <h2 class="text-success fw-bold mb-4">
                ${{ number_format($game->price, 2) }}
            </h2>

            <p>{{ $game->description }}</p>

            <ul class="list-group mb-4">

                <li class="list-group-item">
                    <strong>Category:</strong>
                    {{ optional($game->category)->name ?? 'Uncategorized' }}
                </li>

                <li class="list-group-item">

                    <strong>Status:</strong>

                    @if($game->status)
                        <span class="badge bg-success">Available</span>
                    @else
                        <span class="badge bg-danger">Unavailable</span>
                    @endif

                </li>

            </ul>

            {{-- ACTION BUTTONS --}}
            @auth

                <form action="{{ route('cart.store', $game->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success">Add To Cart</button>
                </form>

                <form action="{{ route('wishlist.store', $game->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">❤️ Wishlist</button>
                </form>

            @else

                <a href="{{ route('login') }}" class="btn btn-primary">
                    Login To Purchase
                </a>

            @endauth

        </div>

    </div>

    {{-- 🎬 TRAILER --}}
    @if(!empty($embedUrl))

    <div class="row mt-5">

        <div class="col-12">

            <h3 class="mb-3">🎬 Trailer</h3>

            <div class="ratio ratio-16x9">

                <iframe
                    src="{{ $embedUrl }}"
                    allowfullscreen
                    frameborder="0">
                </iframe>

            </div>

        </div>

    </div>

    @endif

    {{-- 🖼 SCREENSHOTS --}}
    @if(!empty($game->screenshots))

    <div class="row mt-5">

        <div class="col-12">
            <h3 class="mb-4">🖼 Screenshots</h3>
        </div>

        @foreach($game->screenshots ?? [] as $screenshot)

        <div class="col-md-3 mb-4">

            <img
                src="{{ asset('storage/'.$screenshot) }}"
                class="img-fluid rounded shadow"
                style="height:220px;width:100%;object-fit:cover;">

        </div>

        @endforeach

    </div>

    @endif

    {{-- ⭐ REVIEWS --}}
    <div class="row mt-5">

        <div class="col-12">
            <h3 class="mb-4">⭐ Reviews</h3>
        </div>

        @forelse($game->reviews ?? [] as $review)

    <div class="col-12 mb-3">

        <div class="card shadow-sm">
            <div class="card-body">

                <h6 class="fw-bold">
                    {{ $review->user->name ?? 'User' }}
                </h6>

                <p>Rating: {{ $review->rating }}/5</p>

                <p class="mb-0">
                    {{ $review->review }}
                </p>

            </div>
        </div>

    </div>

@empty

    <div class="col-12">
        <div class="alert alert-info">
            No reviews yet.
        </div>
    </div>

@endforelse

    </div>

    {{-- ✍ REVIEW FORM --}}
    @auth

    <div class="row mt-5">

        <div class="col-lg-8">

            <h3 class="mb-3">Write Review</h3>

            <form action="{{ route('review.store') }}" method="POST">
                @csrf

                <input type="hidden" name="game_id" value="{{ $game->id }}">

                <div class="mb-3">

                    <label class="form-label">Rating</label>

                    <select name="rating" class="form-select">
                        <option value="5">5 Star</option>
                        <option value="4">4 Star</option>
                        <option value="3">3 Star</option>
                        <option value="2">2 Star</option>
                        <option value="1">1 Star</option>
                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">Review</label>

                    <textarea name="review" rows="5" class="form-control"></textarea>

                </div>

                <button type="submit" class="btn btn-primary">
                    Submit Review
                </button>

            </form>

        </div>

    </div>

    @endauth

</div>

@endsection