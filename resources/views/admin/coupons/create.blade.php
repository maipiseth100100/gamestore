@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-lg">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                🎟 Create Coupon
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.coupons.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Coupon Code
                    </label>

                    <input type="text"
                           name="code"
                           class="form-control @error('code') is-invalid @enderror"
                           value="{{ old('code') }}"
                           placeholder="WELCOME50"
                           required>

                    @error('code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Discount (%)
                    </label>

                    <input type="number"
                           name="discount"
                           class="form-control @error('discount') is-invalid @enderror"
                           value="{{ old('discount') }}"
                           min="1"
                           max="100"
                           required>

                    @error('discount')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Expire Date
                    </label>

                    <input type="date"
                           name="expire_date"
                           class="form-control @error('expire_date') is-invalid @enderror"
                           value="{{ old('expire_date') }}"
                           required>

                    @error('expire_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Usage Limit
                    </label>

                    <input type="number"
                           name="usage_limit"
                           class="form-control @error('usage_limit') is-invalid @enderror"
                           value="{{ old('usage_limit',100) }}"
                           min="1"
                           required>

                    @error('usage_limit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="d-flex justify-content-end">

                    <a href="{{ route('admin.coupons.index') }}"
                       class="btn btn-secondary me-2">

                        Cancel

                    </a>

                    <button type="submit"
                            class="btn btn-success">

                        <i class="fas fa-save me-2"></i>
                        Save Coupon

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection