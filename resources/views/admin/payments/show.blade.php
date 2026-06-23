@extends('admin.layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <h4>Payment Details</h4>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th>ID</th>
                <td>{{ $payment->id }}</td>
            </tr>

            <tr>
                <th>Order ID</th>
                <td>#{{ $payment->order_id }}</td>
            </tr>

            <tr>
                <th>Transaction ID</th>
                <td>{{ $payment->transaction_id }}</td>
            </tr>

            <tr>
                <th>Method</th>
                <td>{{ $payment->payment_method }}</td>
            </tr>

            <tr>
                <th>Amount</th>
                <td>${{ number_format($payment->amount,2) }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ ucfirst($payment->status) }}</td>
            </tr>

            <tr>
                <th>Created</th>
                <td>{{ $payment->created_at }}</td>
            </tr>

        </table>

    </div>

</div>

@endsection