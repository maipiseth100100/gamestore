@if($sliders->count())

<div id="heroSlider"
     class="carousel slide carousel-fade hero-slider"
     data-bs-ride="carousel">

    {{-- Indicators --}}
    @if($sliders->count() > 1)

    <div class="carousel-indicators">

        @foreach($sliders as $slider)

        <button type="button"
                data-bs-target="#heroSlider"
                data-bs-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}">
        </button>

        @endforeach

    </div>

    @endif

    <div class="carousel-inner">

        @foreach($sliders as $slider)

        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

            <img
                src="{{ $slider->image
                        ? asset('uploads/sliders/'.$slider->image)
                        : asset('images/no-image.jpg') }}"
                alt="{{ $slider->title }}">

            <div class="hero-overlay"></div>

            <div class="hero-content">

                <span class="hero-tag">
                    🔥 TRENDING GAME
                </span>

                <h1>
                    {{ $slider->title }}
                </h1>

                @if($slider->subtitle)

                <p>
                    {{ $slider->subtitle }}
                </p>

                @endif

                <div class="hero-buttons">

                    @if($slider->game_id)

                    <a href="{{ route('games.show',$slider->game_id) }}"
                       class="btn-play">

                        <i class="fas fa-play"></i>
                        Play Now

                    </a>

                    @endif

                    <a href="{{ route('games.index') }}"
                       class="btn-explore">

                        Explore Games

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    @if($sliders->count() > 1)

    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#heroSlider"
            data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <button class="carousel-control-next"
            type="button"
            data-bs-target="#heroSlider"
            data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

    @endif

</div>

@endif

<style>

.hero-slider{
    height:100vh;
    min-height:750px;
    position:relative;
}

.hero-slider .carousel-inner,
.hero-slider .carousel-item{
    height:100%;
}

.hero-slider .carousel-item img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.hero-overlay{
    position:absolute;
    inset:0;
    background:
    linear-gradient(
        90deg,
        rgba(2,6,23,.95) 0%,
        rgba(2,6,23,.75) 45%,
        rgba(2,6,23,.25) 100%
    );
}

.hero-content{
    position:absolute;
    left:8%;
    top:50%;
    transform:translateY(-50%);
    max-width:700px;
    z-index:10;
}

.hero-tag{
    display:inline-block;
    background:rgba(99,102,241,.2);
    color:#818cf8;
    padding:10px 18px;
    border-radius:30px;
    margin-bottom:20px;
    font-weight:700;
}

.hero-content h1{
    color:white;
    font-size:78px;
    font-weight:900;
    line-height:1.05;
    margin-bottom:20px;
}

.hero-content p{
    color:#cbd5e1;
    font-size:20px;
    max-width:600px;
    margin-bottom:35px;
}

.hero-buttons{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.btn-play{
    background:linear-gradient(
        135deg,
        #22c55e,
        #16a34a
    );
    color:white;
    padding:15px 35px;
    border-radius:50px;
    font-weight:700;
    transition:.3s;
}

.btn-explore{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(10px);
    color:white;
    padding:15px 35px;
    border-radius:50px;
    border:1px solid rgba(255,255,255,.15);
    font-weight:700;
    transition:.3s;
}

.btn-play:hover,
.btn-explore:hover{
    transform:translateY(-4px);
    color:white;
}

.carousel-indicators button{
    width:12px;
    height:12px;
    border-radius:50%;
}

.carousel-control-prev,
.carousel-control-next{
    width:5%;
}

@media(max-width:991px){

    .hero-slider{
        height:700px;
    }

    .hero-content h1{
        font-size:55px;
    }

}

@media(max-width:768px){

    .hero-slider{
        height:550px;
        min-height:550px;
    }

    .hero-content{
        left:20px;
        right:20px;
    }

    .hero-content h1{
        font-size:38px;
    }

    .hero-content p{
        font-size:15px;
    }

    .btn-play,
    .btn-explore{
        width:100%;
        text-align:center;
    }

}

</style>