@extends('frontend.layouts.app')

@section('title', 'Payment Checkout')

@section('content')

<section class="payment-section py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="payment-card">

                    <div class="payment-header">

                        <h2>
                            💳 Secure Payment
                        </h2>

                        <p>
                            Complete your purchase safely
                        </p>

                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- ORDER SUMMARY --}}
                    <div class="order-summary">

                        <div class="row">

                            <div class="col-md-6">

                                <span class="summary-label">
                                    Order Number
                                </span>

                                <h5>
                                    #{{ $order->order_number }}
                                </h5>

                            </div>

                            <div class="col-md-6 text-md-end">

                                <span class="summary-label">
                                    Total Amount
                                </span>

                                <h2 class="price">
                                    ${{ number_format($order->total_amount,2) }}
                                </h2>

                            </div>

                        </div>

                    </div>

                    {{-- PAYMENT FORM --}}
                    <form action="{{ route('payment.process',$order->id) }}"
                          method="POST">

                        @csrf

                        <div class="mb-4">

                            <label class="form-label">
                                Select Payment Method
                            </label>

                            <select name="payment_method"
                                    class="form-select payment-select"
                                    required>

                                <option value="">
                                    Choose Payment Method
                                </option>

                                <option value="ABA Bank">
                                    🏦 ABA Bank
                                </option>

                                <option value="ACLEDA Bank">
                                    🏦 ACLEDA Bank
                                </option>

                                <option value="Wing Money">
                                    📱 Wing Money
                                </option>

                                <option value="PayPal">
                                    💰 PayPal
                                </option>

                                <option value="Visa">
                                    💳 Visa Card
                                </option>

                                <option value="MasterCard">
                                    💳 MasterCard
                                </option>

                            </select>

                        </div>

                        <div class="payment-info">

                            <h6>
                                Payment Protection
                            </h6>

                            <p>
                                Your payment information is encrypted and
                                securely processed.
                            </p>

                        </div>

                        <div class="payment-icons">

                            <span>🏦 ABA</span>
                            <span>🏦 ACLEDA</span>
                            <span>📱 Wing</span>
                            <span>💳 Visa</span>
                            <span>💳 MasterCard</span>
                            <span>💰 PayPal</span>

                        </div>

                        <div class="row mt-4">

                            <div class="col-md-6 mb-3">

                                <a href="{{ route('checkout.index') }}"
                                   class="btn-back">

                                    ← Back

                                </a>

                            </div>

                            <div class="col-md-6">

                                <button type="submit"
                                        class="btn-pay">

                                    💳 Pay Now

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

<style>

.payment-section{
    background:#0f172a;
    min-height:100vh;
}

.payment-card{
    background:#111827;
    border-radius:25px;
    padding:35px;
    color:#fff;
    border:1px solid rgba(255,255,255,.08);
    box-shadow:0 20px 60px rgba(0,0,0,.35);
}

.payment-header{
    text-align:center;
    margin-bottom:30px;
}

.payment-header h2{
    font-size:36px;
    font-weight:800;
}

.payment-header p{
    color:#94a3b8;
}

.order-summary{
    background:#1e293b;
    padding:25px;
    border-radius:20px;
    margin-bottom:30px;
}

.summary-label{
    color:#94a3b8;
    font-size:14px;
}

.order-summary h5{
    color:#fff;
    font-weight:700;
}

.price{
    color:#22c55e;
    font-weight:800;
}

.form-label{
    font-weight:700;
    margin-bottom:10px;
}

.payment-select{
    background:#1e293b;
    border:1px solid #334155;
    color:#fff;
    padding:14px;
    border-radius:12px;
}

.payment-select:focus{
    background:#1e293b;
    color:#fff;
    box-shadow:none;
    border-color:#2563eb;
}

.payment-info{
    background:rgba(37,99,235,.15);
    border-left:4px solid #2563eb;
    padding:20px;
    border-radius:12px;
}

.payment-info h6{
    font-weight:700;
}

.payment-info p{
    margin:0;
    color:#cbd5e1;
}

.payment-icons{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
    margin-top:20px;
}

.payment-icons span{
    background:#1e293b;
    padding:10px 15px;
    border-radius:10px;
    font-size:14px;
}

.btn-back,
.btn-pay{
    width:100%;
    display:block;
    text-align:center;
    padding:14px;
    border:none;
    border-radius:12px;
    font-weight:700;
    text-decoration:none;
}

.btn-back{
    background:#334155;
    color:#fff;
}

.btn-back:hover{
    color:#fff;
    background:#475569;
}

.btn-pay{
    background:linear-gradient(
        135deg,
        #22c55e,
        #16a34a
    );
    color:#fff;
}

.btn-pay:hover{
    opacity:.9;
}

@media(max-width:768px){

    .payment-card{
        padding:20px;
    }

    .payment-header h2{
        font-size:28px;
    }

}

</style>

@endsection