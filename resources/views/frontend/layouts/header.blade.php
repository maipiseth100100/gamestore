<nav class="navbar navbar-expand-lg navbar-dark gaming-navbar sticky-top">

    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold d-flex align-items-center"
           href="{{ route('home') }}">

            <i class="fas fa-gamepad me-2 text-primary"></i>

            <span class="logo-text">
                GameStore
            </span>

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- Menu --}}
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('games.index') }}">
                        Games
                    </a>
                </li>

            </ul>

            {{-- Search --}}
<form action="{{ route('games.search') }}"
      method="GET"
      class="search-form me-lg-4">

    <div class="search-wrapper">

        <input type="text"
               name="search"
               class="search-input"
               placeholder="Search games, categories..."
               value="{{ request('search') }}">

        <button type="submit" class="search-btn">
            <i class="fas fa-search"></i>
        </button>

    </div>

</form>

            @php
                $cartCount = auth()->check()
                    ? \App\Models\Cart::where('user_id', auth()->id())->sum('quantity')
                    : 0;

                $wishlistCount = auth()->check()
                    ? \App\Models\Wishlist::where('user_id', auth()->id())->count()
                    : 0;
            @endphp

            <ul class="navbar-nav align-items-center">

                @auth

                {{-- Wishlist --}}
                <li class="nav-item me-2">

                    <a class="nav-link position-relative"
                       href="{{ route('wishlist.index') }}">

                        <i class="fas fa-heart"></i>

                        @if($wishlistCount > 0)
                        <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">
                            {{ $wishlistCount }}
                        </span>
                        @endif

                    </a>

                </li>

                {{-- Cart --}}
                <li class="nav-item me-2">

                    <a class="nav-link position-relative"
                       href="{{ route('cart.index') }}">

                        <i class="fas fa-shopping-cart"></i>

                        @if($cartCount > 0)
                        <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">
                            {{ $cartCount }}
                        </span>
                        @endif

                    </a>

                </li>

                {{-- Library --}}
                <li class="nav-item me-3">

                    <a class="btn btn-outline-light btn-sm"
                       href="{{ route('library.index') }}">

                        <i class="fas fa-gamepad me-1"></i>
                        Library

                    </a>

                </li>

                {{-- User --}}
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       data-bs-toggle="dropdown">

                        <i class="fas fa-user-circle me-1"></i>

                        {{ auth()->user()->name }}

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('profile.index') }}">
                                Profile
                            </a>
                        </li>

                        @if(auth()->user()->role == 'admin')

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('admin.dashboard') }}">
                                Admin Panel
                            </a>
                        </li>

                        @endif

                        <li><hr class="dropdown-divider"></li>

                        <li>

                            <form action="{{ route('logout') }}"
                                  method="POST">

                                @csrf

                                <button class="dropdown-item">
                                    Logout
                                </button>

                            </form>

                        </li>

                    </ul>

                </li>

                @else

                <li class="nav-item me-2">
                    <a href="{{ route('login') }}"
                       class="btn btn-outline-light btn-sm">
                        Login
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('register') }}"
                       class="btn btn-primary btn-sm">
                        Register
                    </a>
                </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<style>

.gaming-navbar{
    background:rgba(15,23,42,.95);
    backdrop-filter:blur(12px);
    border-bottom:1px solid rgba(255,255,255,.05);
}

.logo-text{
    font-size:1.6rem;
    font-weight:800;
}

.nav-link{
    color:#cbd5e1!important;
    font-weight:500;
}

.nav-link:hover{
    color:#60a5fa!important;
}

.search-form{
    min-width:280px;
}

.search-wrapper{
    position:relative;
}

.search-input{
    width:100%;
    height:48px;
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.12);
    border-radius:50px;
    color:#fff;
    padding:0 60px 0 20px;
    outline:none;
    transition:.3s;
    backdrop-filter:blur(10px);
}

.search-input::placeholder{
    color:#94a3b8;
}

.search-input:focus{
    border-color:#3b82f6;
    box-shadow:0 0 20px rgba(59,130,246,.25);
    background:rgba(255,255,255,.12);
}

.search-btn{
    position:absolute;
    right:5px;
    top:50%;
    transform:translateY(-50%);
    width:38px;
    height:38px;
    border:none;
    border-radius:50%;
    background:linear-gradient(
        135deg,
        #2563eb,
        #7c3aed
    );
    color:#fff;
    transition:.3s;
}

.search-btn:hover{
    transform:translateY(-50%) scale(1.08);
    box-shadow:0 5px 15px rgba(37,99,235,.4);
}

@media(max-width:991px){

    .search-form{
        margin:15px 0;
        width:100%;
    }

    .search-input{
        width:100%;
    }

}

.dropdown-menu{
    background:#111827;
    border:1px solid rgba(255,255,255,.08);
}

.dropdown-item{
    color:white;
}

.dropdown-item:hover{
    background:#1e293b;
    color:white;
}

@media(max-width:992px){

    .search-box{
        width:100%;
        margin:15px 0;
    }

}

</style>