@extends('frontend.layouts.app')

@section('title', 'My Library')

@section('content')

<section class="library-section py-5">

    <div class="container">

        <div class="library-header mb-5">

            <h1 class="library-title">
                🎮 My Game Library
            </h1>

            <p class="library-subtitle">
                Manage and access all purchased games
            </p>

        </div>

        <div class="row g-4">

            @forelse($games as $item)

                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="library-card">

                        <div class="library-image">

                            <img
                                src="{{ $item->game->image ? asset('storage/'.$item->game->image) : 'https://via.placeholder.com/400x500?text=No+Image' }}"
                                alt="{{ $item->game->title }}"
                            >

                            <div class="library-overlay">

                                <a href="{{ route('games.show',$item->game->slug) }}"
                                   class="btn-play">

                                    ▶ Play Now

                                </a>

                            </div>

                        </div>

                        <div class="library-content">

                            <span class="game-category">
                                {{ $item->game->category->name ?? 'Game' }}
                            </span>

                            <h5 class="game-title">
                                {{ $item->game->title }}
                            </h5>

                            <div class="library-footer">

                                <span class="owned-badge">
                                    Owned
                                </span>

                                <span class="game-price">
                                    ${{ number_format($item->game->price,2) }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="empty-library">

                        <div class="empty-icon">
                            🎮
                        </div>

                        <h3>
                            Your Library Is Empty
                        </h3>

                        <p>
                            Purchase games and they will appear here.
                        </p>

                        <a href="{{ route('games.index') }}"
                           class="browse-btn">

                            Browse Games

                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

<style>

.library-section{
    background:#0f172a;
    min-height:100vh;
}

.library-header{
    text-align:center;
}

.library-title{
    color:#fff;
    font-size:48px;
    font-weight:800;
}

.library-subtitle{
    color:#94a3b8;
    font-size:18px;
}

.library-card{
    background:#111827;
    border-radius:24px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,.08);
    transition:.4s;
    height:100%;
}

.library-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 50px rgba(37,99,235,.30);
}

.library-image{
    position:relative;
    overflow:hidden;
}

.library-image img{
    width:100%;
    height:340px;
    object-fit:cover;
    transition:.5s;
}

.library-card:hover img{
    transform:scale(1.08);
}

.library-overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.7);
    display:flex;
    justify-content:center;
    align-items:center;
    opacity:0;
    transition:.3s;
}

.library-card:hover .library-overlay{
    opacity:1;
}

.btn-play{
    background:#22c55e;
    color:#fff;
    text-decoration:none;
    padding:12px 28px;
    border-radius:50px;
    font-weight:700;
}

.btn-play:hover{
    background:#16a34a;
    color:#fff;
}

.library-content{
    padding:20px;
}

.game-category{
    color:#60a5fa;
    font-size:13px;
    text-transform:uppercase;
}

.game-title{
    color:#fff;
    font-weight:700;
    margin-top:10px;
    min-height:60px;
}

.library-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:20px;
}

.owned-badge{
    background:#16a34a;
    color:#fff;
    padding:6px 14px;
    border-radius:50px;
    font-size:12px;
    font-weight:700;
}

.game-price{
    color:#22c55e;
    font-size:22px;
    font-weight:800;
}

.empty-library{
    text-align:center;
    background:#111827;
    padding:80px 20px;
    border-radius:25px;
    color:#fff;
}

.empty-icon{
    font-size:80px;
    margin-bottom:20px;
}

.empty-library p{
    color:#94a3b8;
}

.browse-btn{
    display:inline-block;
    margin-top:20px;
    background:#2563eb;
    color:#fff;
    padding:12px 30px;
    border-radius:50px;
    text-decoration:none;
    font-weight:700;
}

.browse-btn:hover{
    background:#1d4ed8;
    color:#fff;
}

@media(max-width:768px){

    .library-title{
        font-size:32px;
    }

    .library-image img{
        height:260px;
    }

}

</style>

@endsection