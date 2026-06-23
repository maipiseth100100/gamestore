@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold text-white">
            🎮 All Games
        </h1>

        <p class="text-secondary">
            Discover our latest game collection
        </p>

    </div>

    <div class="row g-4">

        @forelse($games as $game)

        <div class="col-lg-3 col-md-4 col-sm-6">

            <div class="card game-card border-0 h-100">

                <img
                    src="{{ $game->image ? asset('storage/'.$game->image) : asset('images/no-image.jpg') }}"
                    alt="{{ $game->title }}"
                    class="card-img-top game-image">

                <div class="card-body d-flex flex-column">

                    <small class="text-info mb-2">
                        {{ $game->category->name ?? 'Uncategorized' }}
                    </small>

                    <h5 class="fw-bold text-white">
                        {{ $game->title }}
                    </h5>

                    <div class="mb-3">

                        @if($game->featured)
                            <span class="badge bg-warning text-dark">
                                Featured
                            </span>
                        @endif

                        @if($game->latest_games)
                            <span class="badge bg-primary">
                                Latest
                            </span>
                        @endif

                        @if($game->popular_games)
                            <span class="badge bg-danger">
                                Popular
                            </span>
                        @endif

                    </div>

                    <div class="mt-auto">

                        <h4 class="text-success fw-bold">
                            ${{ number_format($game->price,2) }}
                        </h4>

                        <a href="{{ route('games.show',$game->slug) }}"
                           class="btn btn-primary w-100">

                            View Details

                        </a>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-warning text-center">

                No games available.

            </div>

        </div>

        @endforelse

    </div>

    @if($games->hasPages())

    <div class="mt-5 d-flex justify-content-center">

        {{ $games->links() }}

    </div>

    @endif

</div>

<style>

body{
    background:#0f172a;
}

.game-card{
    background:#111827;
    border-radius:20px;
    overflow:hidden;
    transition:.3s;
}

.game-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(37,99,235,.25);
}

.game-image{
    height:320px;
    object-fit:cover;
}

.card-body{
    background:#111827;
}

.pagination{
    gap:5px;
}

.page-link{
    background:#111827;
    border:none;
    color:white;
}

.page-item.active .page-link{
    background:#2563eb;
}

</style>

@endsection