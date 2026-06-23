@extends('admin.layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-warning">

        <h4>Edit Payment</h4>

    </div>

    <div class="card-body">

        <form action="{{ route('admin.payments.update',$payment->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Transaction ID</label>

                <input type="text"
                       class="form-control"
                       value="{{ $payment->transaction_id }}"
                       readonly>

            </div>

            <div class="mb-3">

                <label>Payment Method</label>

                <input type="text"
                       class="form-control"
                       value="{{ $payment->payment_method }}"
                       readonly>

            </div>

            <div class="mb-3">

                <label>Amount</label>

                <input type="text"
                       class="form-control"
                       value="{{ $payment->amount }}"
                       readonly>

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status"
                        class="form-select">

                    <option value="pending"
                        {{ $payment->status=='pending'?'selected':'' }}>
                        Pending
                    </option>

                    <option value="success"
                        {{ $payment->status=='success'?'selected':'' }}>
                        Success
                    </option>

                    <option value="failed"
                        {{ $payment->status=='failed'?'selected':'' }}>
                        Failed
                    </option>

                </select>

            </div>

            <button class="btn btn-success">
                Update Payment
            </button>

        </form>

    </div>

</div>

@endsection