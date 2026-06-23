@extends('frontend.layouts.app')

@section('title', 'Payment Success')

@section('content')

<section class="success-section">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="success-card">

                    <div class="success-animation">

                        <div class="checkmark">
                            ✓
                        </div>

                    </div>

                    <h1 class="success-title">
                        Payment Successful!
                    </h1>

                    <p class="success-subtitle">
                        Thank you for your purchase. Your game has been added
                        to your library and is ready to play.
                    </p>

                    <div class="order-box">

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <small>Order Number</small>

                                <h5>
                                    #{{ $order->order_number }}
                                </h5>

                            </div>

                            <div class="col-md-6 mb-4 text-md-end">

                                <small>Total Paid</small>

                                <h3 class="price">
                                    ${{ number_format($order->total_amount,2) }}
                                </h3>

                            </div>

                            <div class="col-md-6">

                                <small>Payment Method</small>

                                <p>
                                    {{ $payment->payment_method ?? 'N/A' }}
                                </p>

                            </div>

                            <div class="col-md-6 text-md-end">

                                <small>Transaction ID</small>

                                <p>
                                    {{ $payment->transaction_id ?? 'N/A' }}
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="success-message">

                        🎮 Your purchased games are now available
                        in your Game Library.

                    </div>

                    <div class="action-buttons">

                        <a href="{{ route('library.index') }}"
                           class="btn-library">

                            🎮 Open Library

                        </a>

                        <a href="{{ route('games.index') }}"
                           class="btn-games">

                            🛒 Continue Shopping

                        </a>

                        <a href="{{ route('home') }}"
                           class="btn-home">

                            🏠 Home

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<style>

.success-section{
    background:linear-gradient(135deg,#020617,#0f172a);
    min-height:100vh;
    padding:80px 0;
    display:flex;
    align-items:center;
}

.success-card{
    background:#111827;
    border-radius:30px;
    padding:50px;
    text-align:center;
    color:#fff;
    border:1px solid rgba(255,255,255,.08);
    box-shadow:0 25px 60px rgba(0,0,0,.4);
}

.success-animation{
    margin-bottom:25px;
}

.checkmark{
    width:120px;
    height:120px;
    margin:auto;
    border-radius:50%;
    background:linear-gradient(
        135deg,
        #22c55e,
        #16a34a
    );
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:60px;
    font-weight:900;
    color:#fff;
    box-shadow:
        0 0 40px rgba(34,197,94,.5);
}

.success-title{
    font-size:48px;
    font-weight:800;
    margin-bottom:15px;
}

.success-subtitle{
    color:#94a3b8;
    max-width:650px;
    margin:auto auto 40px;
}

.order-box{
    background:#1e293b;
    border-radius:20px;
    padding:30px;
    text-align:left;
    margin-bottom:30px;
}

.order-box small{
    color:#94a3b8;
}

.order-box h5,
.order-box p{
    color:#fff;
    margin-top:5px;
}

.price{
    color:#22c55e;
    font-weight:800;
}

.success-message{
    background:rgba(34,197,94,.15);
    border:1px solid rgba(34,197,94,.3);
    color:#86efac;
    padding:18px;
    border-radius:15px;
    margin-bottom:35px;
    font-weight:600;
}

.action-buttons{
    display:flex;
    gap:15px;
    justify-content:center;
    flex-wrap:wrap;
}

.btn-library,
.btn-games,
.btn-home{
    padding:14px 28px;
    border-radius:12px;
    text-decoration:none;
    font-weight:700;
    transition:.3s;
}

.btn-library{
    background:#22c55e;
    color:#fff;
}

.btn-games{
    background:#2563eb;
    color:#fff;
}

.btn-home{
    background:#374151;
    color:#fff;
}

.btn-library:hover,
.btn-games:hover,
.btn-home:hover{
    transform:translateY(-3px);
    color:#fff;
}

@media(max-width:768px){

    .success-card{
        padding:30px 20px;
    }

    .success-title{
        font-size:32px;
    }

    .action-buttons{
        flex-direction:column;
    }

    .btn-library,
    .btn-games,
    .btn-home{
        width:100%;
    }

}

</style>

@endsection