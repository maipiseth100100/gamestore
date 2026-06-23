<section class="latest-games-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="latest-tag">
                NEW RELEASES
            </span>

            <h2 class="latest-title">
                🚀 Latest Games
            </h2>

            <p class="latest-subtitle">
                Discover the newest games available today
            </p>

        </div>

        <div class="row g-4">

            @forelse($latestGames as $game)

            <div class="col-lg-3 col-md-6">

                <div class="latest-card">

                    <div class="latest-image">

                        <img
                            src="{{ $game->image
                                ? asset('storage/'.$game->image)
                                : asset('images/no-image.jpg') }}"
                            alt="{{ $game->title }}">

                        <span class="new-badge">
                            NEW
                        </span>

                        <div class="latest-overlay">

                            <a href="{{ route('games.show',$game->slug) }}"
                               class="view-game-btn">

                                View Game

                            </a>

                        </div>

                    </div>

                    <div class="latest-content">

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

                <div class="alert alert-warning text-center">

                    No Latest Games Available

                </div>

            </div>

            @endforelse

        </div>

        <div class="text-center mt-5">

            <a href="{{ route('games.index') }}"
               class="browse-btn">

                Browse All Games →

            </a>

        </div>

    </div>

</section>

<style>

.latest-games-section{
    background:
        radial-gradient(circle at top left,#1e1b4b,#0f172a);
}

.latest-tag{
    display:inline-block;
    background:rgba(99,102,241,.15);
    color:#818cf8;
    padding:10px 20px;
    border-radius:30px;
    font-size:13px;
    font-weight:700;
}

.latest-title{
    color:#fff;
    font-size:48px;
    font-weight:800;
    margin-top:20px;
}

.latest-subtitle{
    color:#94a3b8;
}

.latest-card{
    background:rgba(17,24,39,.85);
    backdrop-filter:blur(12px);
    border:1px solid rgba(255,255,255,.08);
    border-radius:24px;
    overflow:hidden;
    transition:.4s;
    height:100%;
}

.latest-card:hover{
    transform:translateY(-12px);
    box-shadow:0 25px 60px rgba(99,102,241,.35);
}

.latest-image{
    position:relative;
    overflow:hidden;
}

.latest-image img{
    width:100%;
    height:340px;
    object-fit:cover;
    transition:.5s;
}

.latest-card:hover img{
    transform:scale(1.08);
}

.new-badge{
    position:absolute;
    top:15px;
    left:15px;
    background:#22c55e;
    color:white;
    padding:8px 15px;
    border-radius:30px;
    font-size:12px;
    font-weight:700;
}

.latest-overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.75);
    display:flex;
    justify-content:center;
    align-items:center;
    opacity:0;
    transition:.3s;
}

.latest-card:hover .latest-overlay{
    opacity:1;
}

.view-game-btn{
    background:linear-gradient(
        135deg,
        #4f46e5,
        #6366f1
    );
    color:white;
    padding:12px 30px;
    border-radius:50px;
    font-weight:700;
}

.latest-content{
    padding:22px;
}

.game-category{
    color:#60a5fa;
    font-size:13px;
    font-weight:600;
}

.game-title{
    color:white;
    margin-top:10px;
    margin-bottom:10px;
    font-weight:700;
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
        #2563eb,
        #7c3aed
    );
    color:white;
    padding:10px 18px;
    border-radius:12px;
    font-weight:600;
}

.buy-btn:hover,
.view-game-btn:hover,
.browse-btn:hover{
    color:white;
}

.browse-btn{
    display:inline-block;
    background:linear-gradient(
        135deg,
        #4f46e5,
        #6366f1
    );
    color:white;
    padding:14px 30px;
    border-radius:50px;
    font-weight:700;
}

@media(max-width:768px){

    .latest-title{
        font-size:32px;
    }

    .latest-image img{
        height:260px;
    }

}

</style>