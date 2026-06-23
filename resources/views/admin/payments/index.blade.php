@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Payments</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Order</th>
                        <th>Transaction</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($payments as $payment)

                    <tr>

                        <td>{{ $payment->id }}</td>

                        <td>
                            {{ $payment->order->order_number ?? '-' }}
                        </td>

                        <td>
                            {{ $payment->transaction_id }}
                        </td>

                        <td>
                            {{ $payment->payment_method }}
                        </td>

                        <td>
                            ${{ number_format($payment->amount,2) }}
                        </td>

                        <td>

                            <span class="badge bg-success">
                                {{ $payment->status }}
                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            {{ $payments->links() }}

        </div>

    </div>

</div>

@endsection