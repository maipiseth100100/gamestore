<section class="featured-games-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="featured-tag">
                FEATURED COLLECTION
            </span>

            <h2 class="featured-title">
                🎮 Featured Games
            </h2>

            <p class="featured-subtitle">
                Explore the most popular and trending games available now.
            </p>

        </div>

        <div class="row g-4">

            @forelse($featuredGames as $game)

            <div class="col-lg-3 col-md-6">

                <div class="featured-card">

                    <div class="featured-image">

                        <img
                            src="{{ asset('storage/'.$game->image) }}"
                            alt="{{ $game->title }}">

                        <span class="hot-badge">
                            🔥 HOT
                        </span>

                        <a href="#"
                           class="wishlist-btn">
                            <i class="fas fa-heart"></i>
                        </a>

                        <div class="image-overlay">

                            <a href="{{ route('games.show',$game->slug) }}"
                               class="play-btn">

                                View Details

                            </a>

                        </div>

                    </div>

                    <div class="featured-content">

                        <span class="game-category">

                            {{ $game->category->name ?? 'Gaming' }}

                        </span>

                        <h5 class="game-name">

                            {{ $game->title }}

                        </h5>

                        <div class="rating mb-3">

                            ⭐⭐⭐⭐⭐

                        </div>

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <span class="new-price">
                                    ${{ number_format($game->price,2) }}
                                </span>

                            </div>

                            <a href="{{ route('games.show',$game->slug) }}"
                               class="details-link">

                                Details →

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-warning text-center">

                    No Featured Games Available

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>

<style>

.featured-games-section{
    background:
        radial-gradient(circle at top right,#312e81,#0f172a);
}

.featured-tag{
    background:rgba(99,102,241,.15);
    color:#818cf8;
    padding:10px 20px;
    border-radius:30px;
    font-size:13px;
    font-weight:700;
    letter-spacing:1px;
}

.featured-title{
    color:white;
    font-size:48px;
    font-weight:800;
    margin-top:20px;
}

.featured-subtitle{
    color:#94a3b8;
    max-width:600px;
    margin:auto;
}

.featured-card{
    background:rgba(17,24,39,.85);
    backdrop-filter:blur(12px);
    border:1px solid rgba(255,255,255,.08);
    border-radius:24px;
    overflow:hidden;
    transition:.4s;
    height:100%;
}

.featured-card:hover{
    transform:translateY(-12px);
    box-shadow:0 25px 60px rgba(99,102,241,.35);
}

.featured-image{
    position:relative;
    overflow:hidden;
}

.featured-image img{
    width:100%;
    height:340px;
    object-fit:cover;
    transition:.5s;
}

.featured-card:hover img{
    transform:scale(1.08);
}

.hot-badge{
    position:absolute;
    top:15px;
    left:15px;
    background:#ef4444;
    color:white;
    padding:8px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:700;
}

.wishlist-btn{
    position:absolute;
    top:15px;
    right:15px;
    width:42px;
    height:42px;
    background:rgba(0,0,0,.5);
    backdrop-filter:blur(10px);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
}

.wishlist-btn:hover{
    color:#ef4444;
}

.image-overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.75);
    display:flex;
    align-items:center;
    justify-content:center;
    opacity:0;
    transition:.3s;
}

.featured-card:hover .image-overlay{
    opacity:1;
}

.play-btn{
    background:linear-gradient(
        135deg,
        #4f46e5,
        #6366f1
    );
    color:white;
    padding:12px 28px;
    border-radius:50px;
    font-weight:700;
}

.featured-content{
    padding:22px;
}

.game-category{
    color:#60a5fa;
    font-size:13px;
    font-weight:600;
}

.game-name{
    color:white;
    margin-top:10px;
    margin-bottom:10px;
    font-weight:700;
    min-height:55px;
}

.rating{
    color:#f59e0b;
}

.new-price{
    color:#22c55e;
    font-size:26px;
    font-weight:800;
}

.details-link{
    color:white;
    font-weight:600;
}

.details-link:hover{
    color:#60a5fa;
}

@media(max-width:768px){

    .featured-title{
        font-size:32px;
    }

    .featured-image img{
        height:260px;
    }

}

</style>