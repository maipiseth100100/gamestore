@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Checkout</h4>
                </div>

                <div class="card-body">

                    {{-- SUCCESS / ERROR --}}
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

                    {{-- CART EXISTS --}}
                    @if($carts->count())

                        <table class="table table-bordered align-middle">

                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Game</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody>

                                @php $total = 0; @endphp

                                @foreach($carts as $cart)

                                    @php
                                        $price = $cart->game->price;
                                        $subtotal = $price * $cart->quantity;
                                        $total += $subtotal;
                                    @endphp

                                    <tr>

                                        {{-- IMAGE FIX --}}
                                        <td width="120">

                                            <img
                                                src="{{ $cart->game->image 
                                                    ? asset('storage/' . $cart->game->image)
                                                    : 'https://via.placeholder.com/120x150?text=No+Image' }}"
                                                class="img-fluid rounded"
                                                style="max-width:120px; height:150px; object-fit:cover;">

                                        </td>

                                        <td>

                                            <div class="fw-bold">
                                                {{ $cart->game->title }}
                                            </div>

                                            <small class="text-muted">
                                                Qty: {{ $cart->quantity }}
                                            </small>

                                        </td>

                                        <td>

                                            ${{ number_format($subtotal, 2) }}

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                            <tfoot>

                                <tr>

                                    <th colspan="2" class="text-end">
                                        Total
                                    </th>

                                    <th class="text-success fs-5">
                                        ${{ number_format($total, 2) }}
                                    </th>

                                </tr>

                            </tfoot>

                        </table>

                        {{-- PLACE ORDER --}}
                        <form action="{{ route('checkout.placeOrder') }}"
                              method="POST">

                            @csrf

                            <button type="submit"
                                    class="btn btn-success btn-lg w-100">

                                Place Order & Continue Payment

                            </button>

                        </form>

                    @else

                        <div class="alert alert-warning text-center">

                            Your cart is empty.

                        </div>

                        <div class="text-center">

                            <a href="{{ route('games.index') }}"
                               class="btn btn-primary">

                                Browse Games

                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection