@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Orders Management</h2>

</div>

<div class="card shadow">

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">

                <tr>
                    <th>#Order</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th width="150">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($orders as $order)

                <tr>

                    {{-- ORDER NUMBER --}}
                    <td>
                        #{{ $order->order_number }}
                    </td>

                    {{-- CUSTOMER --}}
                    <td>
                        {{ $order->user->name ?? 'Guest' }}
                    </td>

                    {{-- EMAIL --}}
                    <td>
                        {{ $order->user->email ?? '-' }}
                    </td>

                    {{-- TOTAL (FIXED FIELD) --}}
                    <td>
                        ${{ number_format($order->total_amount, 2) }}
                    </td>

                    {{-- PAYMENT STATUS --}}
                    <td>

                        @if($order->payment_status == 'paid')

                            <span class="badge bg-success">
                                Paid
                            </span>

                        @elseif($order->payment_status == 'failed')

                            <span class="badge bg-danger">
                                Failed
                            </span>

                        @else

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @endif

                    </td>

                    {{-- ORDER STATUS (MATCH YOUR ENUM) --}}
                    <td>

                        @if($order->status == 'completed')

                            <span class="badge bg-success">
                                Completed
                            </span>

                        @elseif($order->status == 'cancelled')

                            <span class="badge bg-danger">
                                Cancelled
                            </span>

                        @elseif($order->status == 'paid')

                            <span class="badge bg-primary">
                                Paid
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                Pending
                            </span>

                        @endif

                    </td>

                    {{-- DATE (SAFE FORMAT) --}}
                    <td>
                        {{ optional($order->created_at)->format('d M Y') }}
                    </td>

                    {{-- ACTION --}}
                    <td>

                        <a href="{{ route('admin.orders.show', $order->id) }}"
                           class="btn btn-primary btn-sm">

                            View

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8"
                        class="text-center text-muted py-4">

                        No Orders Found

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $orders->links() }}
        </div>

    </div>

</div>

@endsection