@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

```
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4">
        {{ session('success') }}
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="fw-bold">
        🎟 Coupon Management
    </h2>

    <a href="{{ route('admin.coupons.create') }}"
       class="btn btn-primary">

        <i class="fas fa-plus me-2"></i>
        Add Coupon

    </a>

</div>

<div class="card border-0 shadow">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Coupon Code</th>
                        <th>Discount</th>
                        <th>Expire Date</th>
                        <th>Usage Limit</th>
                        <th width="180">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($coupons as $coupon)

                    <tr>

                        <td>
                            {{ $coupon->id }}
                        </td>

                        <td>

                            <span class="badge bg-primary fs-6">
                                {{ $coupon->code }}
                            </span>

                        </td>

                        <td>

                            <span class="badge bg-success">
                                {{ $coupon->discount }}%
                            </span>

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($coupon->expire_date)->format('d M Y') }}

                            @if(\Carbon\Carbon::parse($coupon->expire_date)->isPast())

                                <span class="badge bg-danger ms-2">
                                    Expired
                                </span>

                            @endif

                        </td>

                        <td>

                            <span class="badge bg-secondary">
                                {{ $coupon->usage_limit }}
                            </span>

                        </td>

                        <td>

                            <a href="{{ route('admin.coupons.edit',$coupon->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('admin.coupons.destroy',$coupon->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this coupon?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-5 text-muted">

                            No Coupons Found

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $coupons->links() }}
        </div>

    </div>

</div>
```

</div>

@endsection
