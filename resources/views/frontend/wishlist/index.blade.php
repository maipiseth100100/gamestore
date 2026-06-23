@extends('frontend.layouts.app')

@section('title', 'My Wishlist')

@section('content')

<section class="wishlist-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="wishlist-badge">
                ❤️ FAVORITES
            </span>

            <h2 class="wishlist-title">
                My Wishlist
            </h2>

            <p class="wishlist-subtitle">
                Save your favorite games and purchase them later
            </p>

        </div>

        <div class="row g-4">

            @forelse($wishlists as $item)

                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="wishlist-card">

                        <div class="wishlist-image">

                            <img
                                src="{{ $item->game->image
                                    ? asset('storage/'.$item->game->image)
                                    : 'https://via.placeholder.com/400x500?text=No+Image' }}"
                                alt="{{ $item->game->title }}">

                            <span class="wishlist-heart">
                                ❤️
                            </span>

                        </div>

                        <div class="wishlist-content">

                            <h5 class="game-title">
                                {{ $item->game->title }}
                            </h5>

                            <div class="game-price">
                                ${{ number_format($item->game->price,2) }}
                            </div>

                            <div class="wishlist-buttons">

                                <a href="{{ route('games.show',$item->game->slug) }}"
                                   class="btn btn-view">

                                    View Game

                                </a>

                                <form action="{{ route('wishlist.destroy',$item->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-remove">

                                        Remove

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="empty-wishlist">

                        <div class="empty-icon">
                            💔
                        </div>

                        <h4>
                            Wishlist is Empty
                        </h4>

                        <p>
                            You haven't added any games yet.
                        </p>

                        <a href="{{ route('games.index') }}"
                           class="btn btn-primary">

                            Browse Games

                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

<style>

.wishlist-section{
    background:#0f172a;
    min-height:80vh;
}

.wishlist-badge{
    background:rgba(239,68,68,.15);
    color:#ef4444;
    padding:8px 20px;
    border-radius:30px;
    font-size:13px;
    font-weight:700;
}

.wishlist-title{
    color:#fff;
    font-size:42px;
    font-weight:800;
    margin-top:15px;
}

.wishlist-subtitle{
    color:#94a3b8;
}

.wishlist-card{
    background:#111827;
    border-radius:20px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,.08);
    transition:.4s;
    height:100%;
}

.wishlist-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(239,68,68,.25);
}

.wishlist-image{
    position:relative;
    overflow:hidden;
}

.wishlist-image img{
    width:100%;
    height:320px;
    object-fit:cover;
    transition:.5s;
}

.wishlist-card:hover img{
    transform:scale(1.08);
}

.wishlist-heart{
    position:absolute;
    top:15px;
    right:15px;
    background:#ef4444;
    width:45px;
    height:45px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
}

.wishlist-content{
    padding:20px;
}

.game-title{
    color:#fff;
    font-weight:700;
    margin-bottom:15px;
    min-height:55px;
}

.game-price{
    color:#22c55e;
    font-size:24px;
    font-weight:800;
    margin-bottom:20px;
}

.wishlist-buttons{
    display:flex;
    gap:10px;
}

.btn-view{
    flex:1;
    background:#2563eb;
    color:#fff;
    border:none;
    border-radius:10px;
}

.btn-view:hover{
    background:#1d4ed8;
    color:#fff;
}

.btn-remove{
    background:#ef4444;
    color:#fff;
    border:none;
    border-radius:10px;
}

.btn-remove:hover{
    background:#dc2626;
    color:#fff;
}

.empty-wishlist{
    text-align:center;
    padding:80px 20px;
    background:#111827;
    border-radius:20px;
}

.empty-icon{
    font-size:70px;
    margin-bottom:20px;
}

.empty-wishlist h4{
    color:#fff;
}

.empty-wishlist p{
    color:#94a3b8;
}

@media(max-width:768px){

    .wishlist-title{
        font-size:30px;
    }

    .wishlist-image img{
        height:260px;
    }

}

</style>

@endsection