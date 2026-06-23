<section class="categories-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-badge">
                GAME COLLECTION
            </span>

            <h2 class="section-title mt-3">
                Browse Categories
            </h2>

            <p class="section-subtitle">
                Discover amazing gaming worlds and genres
            </p>

        </div>

        <div class="row g-4">

            @forelse($categories as $category)

            <div class="col-lg-3 col-md-4 col-sm-6">

                <a href="{{ route('games.category',$category->slug) }}"
                   class="text-decoration-none">

                    <div class="category-card">

                        <div class="card-border"></div>

                        <div class="category-content">

                            @if($category->icon_image)

                                <img src="{{ asset('storage/'.$category->icon_image) }}"
                                     alt="{{ $category->name }}"
                                     class="category-icon">

                            @else

                                <div class="category-placeholder">
                                    🎮
                                </div>

                            @endif

                            <h4 class="category-name">
                                {{ $category->name }}
                            </h4>

                            <span class="game-count">
                                {{ $category->games_count ?? 0 }} Games
                            </span>

                        </div>

                    </div>

                </a>

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-warning text-center">
                    No Categories Found
                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>

<style>

.categories-section{
    background:
        radial-gradient(circle at top right,#1e3a8a 0%,#0f172a 40%),
        #020617;
    position:relative;
}

.section-badge{
    background:rgba(99,102,241,.15);
    color:#818cf8;
    padding:10px 22px;
    border-radius:50px;
    font-size:13px;
    font-weight:700;
    letter-spacing:1px;
}

.section-title{
    color:white;
    font-size:48px;
    font-weight:800;
}

.section-subtitle{
    color:#94a3b8;
    font-size:18px;
}

.category-card{
    position:relative;
    height:100%;
    padding:2px;
    border-radius:28px;
    overflow:hidden;
    transition:.4s;
}

.card-border{
    position:absolute;
    inset:0;
    background:linear-gradient(
        135deg,
        #6366f1,
        #06b6d4,
        #22c55e
    );
    border-radius:28px;
}

.category-content{
    position:relative;
    background:rgba(15,23,42,.95);
    backdrop-filter:blur(20px);
    border-radius:26px;
    padding:35px 20px;
    text-align:center;
    height:100%;
    z-index:2;
}

.category-card:hover{
    transform:translateY(-12px);
}

.category-card:hover .card-border{
    animation:rotateGlow 3s linear infinite;
}

@keyframes rotateGlow{

    0%{
        filter:hue-rotate(0deg);
    }

    100%{
        filter:hue-rotate(360deg);
    }

}

.category-icon{
    width:95px;
    height:95px;
    object-fit:cover;
    border-radius:22px;
    margin-bottom:20px;
    border:3px solid rgba(255,255,255,.1);
    transition:.4s;
}

.category-card:hover .category-icon{
    transform:scale(1.08);
}

.category-placeholder{
    width:95px;
    height:95px;
    margin:auto;
    border-radius:22px;
    background:#1e293b;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:42px;
    margin-bottom:20px;
}

.category-name{
    color:white;
    font-weight:700;
    margin-bottom:15px;
}

.game-count{
    display:inline-block;
    background:rgba(99,102,241,.15);
    color:#818cf8;
    padding:8px 18px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;
}

@media(max-width:768px){

    .section-title{
        font-size:32px;
    }

    .category-content{
        padding:25px 15px;
    }

    .category-icon,
    .category-placeholder{
        width:80px;
        height:80px;
    }

}

</style>