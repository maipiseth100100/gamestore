@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-lg">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                ✏️ Edit Coupon
            </h4>

        </div>

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('admin.coupons.update', $coupon->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- Coupon Code --}}
                <div class="mb-3">

                    <label class="form-label">
                        Coupon Code
                    </label>

                    <input type="text"
                           name="code"
                           value="{{ old('code', $coupon->code) }}"
                           class="form-control"
                           required>

                </div>

                {{-- Discount --}}
                <div class="mb-3">

                    <label class="form-label">
                        Discount (%)
                    </label>

                    <input type="number"
                           name="discount"
                           value="{{ old('discount', $coupon->discount) }}"
                           class="form-control"
                           min="1"
                           max="100"
                           required>

                </div>

                {{-- Expire Date --}}
                <div class="mb-3">

                    <label class="form-label">
                        Expire Date
                    </label>

                    <input type="date"
                           name="expire_date"
                           value="{{ old('expire_date', $coupon->expire_date) }}"
                           class="form-control"
                           required>

                </div>

                {{-- Usage Limit --}}
                <div class="mb-3">

                    <label class="form-label">
                        Usage Limit
                    </label>

                    <input type="number"
                           name="usage_limit"
                           value="{{ old('usage_limit', $coupon->usage_limit) }}"
                           class="form-control"
                           min="1"
                           required>

                </div>

                <div class="d-flex justify-content-end">

                    <a href="{{ route('admin.coupons.index') }}"
                       class="btn btn-secondary me-2">

                        Cancel

                    </a>

                    <button type="submit"
                            class="btn btn-success">

                        <i class="fas fa-save me-1"></i>
                        Update Coupon

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection