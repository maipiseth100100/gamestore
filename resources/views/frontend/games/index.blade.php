@extends('frontend.layouts.app')

@section('title', 'All Games')

@section('content')

<section class="all-games-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="games-tag">
                GAME COLLECTION
            </span>

            <h1 class="games-title">
                🎮 All Games
            </h1>

            <p class="games-subtitle">
                Browse our complete collection of premium games
            </p>

        </div>

        <div class="row g-4">

            @forelse($games as $game)

            <div class="col-lg-3 col-md-6">

                <div class="game-card">

                    <div class="game-image">

                        <img
                            src="{{ $game->image
                                ? asset('storage/'.$game->image)
                                : asset('images/no-image.jpg') }}"
                            alt="{{ $game->title }}">

                        <div class="game-overlay">

                            <a href="{{ route('games.show',$game->slug) }}"
                               class="view-btn">

                                View Game

                            </a>

                        </div>

                        <span class="game-badge">
                            NEW
                        </span>

                    </div>

                    <div class="game-content">

                        <span class="game-category">
                            {{ $game->category->name ?? 'Gaming' }}
                        </span>

                        <h5 class="game-title">
                            {{ $game->title }}
                        </h5>

                        <div class="game-rating">
                            ⭐⭐⭐⭐⭐
                        </div>

                        <div class="game-footer">

                            <div class="game-price">
                                ${{ number_format($game->price,2) }}
                            </div>

                            <a href="{{ route('games.show',$game->slug) }}"
                               class="buy-btn">

                                Buy Now

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="empty-box">

                    <h4>No Games Available</h4>

                    <p>Please check back later.</p>

                </div>

            </div>

            @endforelse

        </div>

       @if($games->hasPages())

<div class="mt-5">

    <nav aria-label="Games Pagination">

        <ul class="pagination justify-content-center">

            {{-- Previous --}}
            @if($games->onFirstPage())

                <li class="page-item disabled">
                    <span class="page-link">
                        ← Previous
                    </span>
                </li>

            @else

                <li class="page-item">
                    <a class="page-link"
                       href="{{ $games->previousPageUrl() }}">
                        ← Previous
                    </a>
                </li>

            @endif

            {{-- Page Numbers --}}
            @for($page = 1; $page <= $games->lastPage(); $page++)

                <li class="page-item {{ $games->currentPage() == $page ? 'active' : '' }}">

                    <a class="page-link"
                       href="{{ $games->url($page) }}">

                        {{ $page }}

                    </a>

                </li>

            @endfor

            {{-- Next --}}
            @if($games->hasMorePages())

                <li class="page-item">
                    <a class="page-link"
                       href="{{ $games->nextPageUrl() }}">
                        Next →
                    </a>
                </li>

            @else

                <li class="page-item disabled">
                    <span class="page-link">
                        Next →
                    </span>
                </li>

            @endif

        </ul>

    </nav>

</div>

@endif

    </div>

</section>

<style>

.all-games-section{
    background:#0f172a;
    min-height:100vh;
}

.games-tag{
    display:inline-block;
    background:rgba(99,102,241,.15);
    color:#818cf8;
    padding:10px 20px;
    border-radius:30px;
    font-size:13px;
    font-weight:700;
    letter-spacing:1px;
}

.games-title{
    color:#fff;
    font-size:52px;
    font-weight:800;
    margin-top:20px;
}

.games-subtitle{
    color:#94a3b8;
    font-size:18px;
}

.game-card{
    background:rgba(17,24,39,.9);
    border:1px solid rgba(255,255,255,.08);
    border-radius:24px;
    overflow:hidden;
    transition:.4s;
    height:100%;
}

.game-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 50px rgba(79,70,229,.35);
}

.game-image{
    position:relative;
    overflow:hidden;
}

.game-image img{
    width:100%;
    height:340px;
    object-fit:cover;
    transition:.5s;
}

.game-card:hover img{
    transform:scale(1.08);
}

.game-overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.75);
    display:flex;
    justify-content:center;
    align-items:center;
    opacity:0;
    transition:.3s;
}

.game-card:hover .game-overlay{
    opacity:1;
}

.view-btn{
    background:#4f46e5;
    color:#fff;
    padding:12px 28px;
    border-radius:50px;
    text-decoration:none;
    font-weight:700;
}

.game-badge{
    position:absolute;
    top:15px;
    left:15px;
    background:#22c55e;
    color:#fff;
    padding:8px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:700;
}

.game-content{
    padding:22px;
}

.game-category{
    color:#60a5fa;
    font-size:13px;
    font-weight:600;
}

.game-title{
    color:#fff;
    font-weight:700;
    margin-top:10px;
    margin-bottom:10px;
    min-height:60px;
}

.game-rating{
    color:#f59e0b;
    margin-bottom:15px;
}

.game-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.game-price{
    color:#22c55e;
    font-size:26px;
    font-weight:800;
}

.buy-btn{
    background:linear-gradient(
        135deg,
        #4f46e5,
        #6366f1
    );
    color:white;
    padding:10px 18px;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
}

.buy-btn:hover,
.view-btn:hover{
    color:white;
}

.empty-box{
    background:#111827;
    padding:50px;
    border-radius:20px;
    text-align:center;
    color:white;
}

.pagination{
    gap:8px;
}

.page-link{
    background:#111827;
    border:none;
    color:white;
    border-radius:10px;
}

.page-item.active .page-link{
    background:#4f46e5;
}

@media(max-width:768px){

    .games-title{
        font-size:34px;
    }

    .game-image img{
        height:260px;
    }

}

</style>

@endsection