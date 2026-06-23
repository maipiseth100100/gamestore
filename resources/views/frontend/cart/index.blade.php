@extends('frontend.layouts.app')

@section('title', 'Shopping Cart')

@section('content')

<section class="cart-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="cart-badge">
                SHOPPING CART
            </span>

            <h1 class="cart-title">
                🛒 Your Cart
            </h1>

            <p class="cart-subtitle">
                Review your games before checkout
            </p>

        </div>

        @php $grandTotal = 0; @endphp

        @if($carts->count())

        <div class="cart-wrapper">

            @foreach($carts as $cart)

                @php
                    $price = $cart->game->sale_price ?? $cart->game->price;
                    $total = $price * $cart->quantity;
                    $grandTotal += $total;
                @endphp

                <div class="cart-item">

                    <div class="cart-image">

                        <img
                            src="{{ $cart->game->image
                                ? asset('storage/'.$cart->game->image)
                                : asset('images/no-image.jpg') }}"
                            alt="{{ $cart->game->title }}">

                    </div>

                    <div class="cart-info">

                        <h4>
                            {{ $cart->game->title }}
                        </h4>

                        <div class="price">
                            ${{ number_format($price,2) }}
                        </div>

                    </div>

                    <div class="cart-qty">

                        <form action="{{ route('cart.update',$cart->id) }}"
                              method="POST">

                            @csrf
                            @method('PUT')

                            <input type="number"
                                   name="quantity"
                                   value="{{ $cart->quantity }}"
                                   min="1"
                                   class="form-control"
                                   onchange="this.form.submit()">

                        </form>

                    </div>

                    <div class="cart-total">

                        ${{ number_format($total,2) }}

                    </div>

                    <div>

                        <form action="{{ route('cart.destroy',$cart->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="remove-btn">

                                ✕

                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="cart-summary">

            <div>

                <h3>
                    Total:
                    <span>
                        ${{ number_format($grandTotal,2) }}
                    </span>
                </h3>

            </div>

            <a href="{{ route('checkout.index') }}"
               class="checkout-btn">

                🚀 Proceed To Checkout

            </a>

        </div>

        @else

        <div class="empty-cart">

            <h2>🛒 Cart Is Empty</h2>

            <p>
                Add your favorite games and start playing today.
            </p>

            <a href="{{ route('games.index') }}"
               class="browse-btn">

                Browse Games

            </a>

        </div>

        @endif

    </div>

</section>

<style>

.cart-section{
    background:#0f172a;
    min-height:100vh;
}

.cart-badge{
    background:rgba(37,99,235,.15);
    color:#60a5fa;
    padding:10px 20px;
    border-radius:30px;
    font-size:13px;
    font-weight:700;
}

.cart-title{
    color:#fff;
    font-size:52px;
    font-weight:800;
    margin-top:20px;
}

.cart-subtitle{
    color:#94a3b8;
}

.cart-wrapper{
    display:flex;
    flex-direction:column;
    gap:20px;
}

.cart-item{
    background:#111827;
    border:1px solid rgba(255,255,255,.08);
    border-radius:20px;
    padding:20px;
    display:flex;
    align-items:center;
    gap:20px;
}

.cart-image img{
    width:120px;
    height:150px;
    object-fit:cover;
    border-radius:12px;
}

.cart-info{
    flex:1;
}

.cart-info h4{
    color:white;
    font-weight:700;
}

.price{
    color:#22c55e;
    font-size:22px;
    font-weight:700;
}

.cart-qty{
    width:100px;
}

.cart-total{
    color:white;
    font-size:22px;
    font-weight:700;
    min-width:120px;
    text-align:right;
}

.remove-btn{
    width:40px;
    height:40px;
    border:none;
    border-radius:50%;
    background:#ef4444;
    color:white;
    font-size:18px;
}

.cart-summary{
    margin-top:30px;
    background:#111827;
    border-radius:20px;
    padding:30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.cart-summary h3{
    color:white;
    margin:0;
}

.cart-summary span{
    color:#22c55e;
}

.checkout-btn{
    background:linear-gradient(
        135deg,
        #2563eb,
        #7c3aed
    );
    color:white;
    padding:15px 30px;
    border-radius:14px;
    text-decoration:none;
    font-weight:700;
}

.checkout-btn:hover{
    color:white;
}

.empty-cart{
    background:#111827;
    border-radius:25px;
    padding:80px 20px;
    text-align:center;
    color:white;
}

.browse-btn{
    display:inline-block;
    margin-top:15px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    padding:12px 25px;
    border-radius:12px;
}

.browse-btn:hover{
    color:white;
}

@media(max-width:768px){

    .cart-item{
        flex-direction:column;
        text-align:center;
    }

    .cart-total{
        text-align:center;
    }

    .cart-summary{
        flex-direction:column;
        gap:20px;
    }

    .cart-title{
        font-size:36px;
    }

}

</style>

@endsection