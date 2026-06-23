@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Dashboard
            </h2>

            <p class="text-muted mb-0">
                Welcome back
            </p>
        </div>
    </div>

    <!-- Stats Cards -->

    <div class="row g-4">

        <div class="col-md-3">

            <div class="dashboard-card bg-primary">

                <div>
                    <h6>Total Games</h6>
                    <h2>{{ $totalGames }}</h2>
                </div>

                <div class="icon">
                    🎮
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="dashboard-card bg-success">

                <div>
                    <h6>Total Users</h6>
                    <h2>{{ $totalUsers }}</h2>
                </div>

                <div class="icon">
                    👥
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="dashboard-card bg-warning">

                <div>
                    <h6>Total Orders</h6>
                    <h2>{{ $totalOrders }}</h2>
                </div>

                <div class="icon">
                    🛒
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="dashboard-card bg-danger">

                <div>
                    <h6>Revenue</h6>
                    <h2>${{ number_format($revenue,2) }}</h2>
                </div>

                <div class="icon">
                    💰
                </div>

            </div>

        </div>

    </div>

    <!-- Quick Actions -->

    <div class="card border-0 shadow mt-5">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Quick Actions
            </h5>

        </div>

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-3">

                    <a href="{{ route('admin.games.index') }}"
                       class="quick-btn btn btn-dark">

                        🎮 Games

                    </a>

                </div>

                <div class="col-md-3">

                    <a href="{{ route('admin.categories.index') }}"
                       class="quick-btn btn btn-success">

                        📂 Categories

                    </a>

                </div>

                <div class="col-md-3">

                    <a href="{{ route('admin.orders.index') }}"
                       class="quick-btn btn btn-warning">

                        🛒 Orders

                    </a>

                </div>

                <div class="col-md-3">

                    <a href="{{ route('admin.users.index') }}"
                       class="quick-btn btn btn-info">

                        👥 Users

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- Recent Activity -->

    <div class="card border-0 shadow mt-4">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                System Overview
            </h5>

        </div>

        <div class="card-body">

            <div class="row text-center">

                <div class="col-md-4">

                    <h3 class="text-primary">
                        {{ $totalGames }}
                    </h3>

                    <p>Published Games</p>

                </div>

                <div class="col-md-4">

                    <h3 class="text-success">
                        {{ $totalUsers }}
                    </h3>

                    <p>Registered Users</p>

                </div>

                <div class="col-md-4">

                    <h3 class="text-danger">
                        ${{ number_format($revenue,2) }}
                    </h3>

                    <p>Total Revenue</p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('styles')

<style>

.dashboard-card{
    border-radius:20px;
    padding:25px;
    color:#fff;
    display:flex;
    justify-content:space-between;
    align-items:center;
    min-height:140px;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
    transition:.3s;
}

.dashboard-card:hover{
    transform:translateY(-6px);
}

.dashboard-card h2{
    font-size:34px;
    font-weight:700;
    margin-top:10px;
}

.dashboard-card h6{
    opacity:.9;
}

.dashboard-card .icon{
    font-size:55px;
    opacity:.7;
}

.quick-btn{
    width:100%;
    padding:18px;
    border-radius:12px;
    font-weight:600;
}

.card{
    border-radius:18px;
}

</style>

@endpush