@extends('frontend.layouts.app')

@section('title', $category->name)

@section('content')

<section class="category-page">

    <div class="container">

        <div class="category-header text-center">

            <span class="category-badge">
                GAME CATEGORY
            </span>

            <h1 class="category-title">
                🎮 {{ $category->name }}
            </h1>

            <p class="category-subtitle">
                {{ $games->total() }} Games Available
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

                        <div class="game-badges">

                            @if($game->featured)
                            <span class="badge-featured">
                                ⭐ Featured
                            </span>
                            @endif

                            @if($game->latest_games)
                            <span class="badge-latest">
                                🚀 New
                            </span>
                            @endif

                            @if($game->popular_games)
                            <span class="badge-popular">
                                🔥 Popular
                            </span>
                            @endif

                        </div>

                    </div>

                    <div class="game-content">

                        <span class="game-category">
                            {{ $category->name }}
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

                    <h4>No Games Found</h4>

                    <p>
                        No games available in this category.
                    </p>

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

</section>

<style>

.category-page{
    background:#0f172a;
    min-height:100vh;
    padding:80px 0;
}

.category-header{
    margin-bottom:60px;
}

.category-badge{
    display:inline-block;
    background:rgba(99,102,241,.15);
    color:#818cf8;
    padding:10px 20px;
    border-radius:30px;
    font-size:13px;
    font-weight:700;
}

.category-title{
    color:white;
    font-size:50px;
    font-weight:800;
    margin-top:20px;
}

.category-subtitle{
    color:#94a3b8;
    font-size:18px;
}

.game-card{
    background:rgba(17,24,39,.85);
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
    align-items:center;
    justify-content:center;
    opacity:0;
    transition:.3s;
}

.game-card:hover .game-overlay{
    opacity:1;
}

.view-btn{
    background:#4f46e5;
    color:white;
    padding:12px 28px;
    border-radius:50px;
    font-weight:700;
    text-decoration:none;
}

.game-badges{
    position:absolute;
    top:15px;
    left:15px;
    display:flex;
    flex-direction:column;
    gap:8px;
}

.badge-featured,
.badge-latest,
.badge-popular{
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:700;
}

.badge-featured{
    background:#f59e0b;
}

.badge-latest{
    background:#2563eb;
}

.badge-popular{
    background:#ef4444;
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
    color:white;
    font-weight:700;
    margin:10px 0;
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

.empty-box{
    background:#111827;
    border-radius:20px;
    padding:50px;
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

    .category-title{
        font-size:34px;
    }

    .game-image img{
        height:260px;
    }

}

</style>

@endsection