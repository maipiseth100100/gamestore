@extends('admin.layouts.app')

@section('content')

<div class="card shadow">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

        <h3 class="mb-0">
            Order #{{ $order->order_number }}
        </h3>

        <a href="{{ route('admin.orders.index') }}"
           class="btn btn-light btn-sm">
            Back
        </a>

    </div>

    <div class="card-body">

        <div class="row">

            {{-- CUSTOMER INFO --}}
            <div class="col-md-6">

                <h4>Customer Information</h4>

                <table class="table table-bordered">

                    <tr>
                        <th>Name</th>
                        <td>{{ $order->user->name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $order->user->email ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Phone</th>
                        <td>{{ $order->phone ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>{{ $order->address ?? '-' }}</td>
                    </tr>

                </table>

            </div>

            {{-- ORDER INFO --}}
            <div class="col-md-6">

                <h4>Order Details</h4>

                <table class="table table-bordered">

                    <tr>
                        <th>Order Number</th>
                        <td>{{ $order->order_number }}</td>
                    </tr>

                    <tr>
                        <th>Total</th>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                    </tr>

                    <tr>
                        <th>Payment Method</th>
                        <td>{{ $order->payment_method ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Payment Status</th>
                        <td>
                            @if($order->payment_status == 'paid')
                                <span class="badge bg-success">Paid</span>
                            @elseif($order->payment_status == 'failed')
                                <span class="badge bg-danger">Failed</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Order Status</th>
                        <td>
                            @if($order->status == 'completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif($order->status == 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @elseif($order->status == 'paid')
                                <span class="badge bg-primary">Paid</span>
                            @else
                                <span class="badge bg-secondary">Pending</span>
                            @endif
                        </td>
                    </tr>

                </table>

            </div>

        </div>

        <hr>

        {{-- ORDER ITEMS --}}
        <h4>Purchased Games</h4>

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead class="table-dark">

                    <tr>
                        <th>Game</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($order->items as $item)

                        <tr>

                            <td>
                                {{ $item->game->title ?? 'Deleted Game' }}
                            </td>

                            <td>
                                ${{ number_format($item->price, 2) }}
                            </td>

                            <td>
                                {{ $item->quantity }}
                            </td>

                            <td>
                                ${{ number_format($item->price * $item->quantity, 2) }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                No items found in this order
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- TOTAL --}}
        <div class="text-end mt-3">

            <h4>
                Total:
                ${{ number_format($order->total_amount, 2) }}
            </h4>

        </div>

    </div>

</div>

@endsection