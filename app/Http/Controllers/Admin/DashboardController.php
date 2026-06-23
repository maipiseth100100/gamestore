<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Game;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalGames = Game::count();
        $totalOrders = Order::count();

        $revenue = Order::where('status','paid')
            ->sum('total_amount');

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalGames',
            'totalOrders',
            'revenue'
        ));
    }
}