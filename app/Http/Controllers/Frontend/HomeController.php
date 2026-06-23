<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\Slider;
use App\Models\Coupon;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)
            ->latest()
            ->get();

        $categories = Category::where('status', 1)
            ->withCount('games')
            ->latest()
            ->get();

        $featuredGames = Game::with('category')
            ->where('status', 1)
            ->where('featured', 1)
            ->latest()
            ->take(8)
            ->get();

        $latestGames = Game::with('category')
            ->where('status', 1)
            ->where('latest_games', 1)
            ->latest()
            ->take(8)
            ->get();

        $coupons = Coupon::whereDate('expire_date', '>=', now())
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.home.index', compact(
            'sliders',
            'categories',
            'featuredGames',
            'latestGames',
            'coupons'
        ));
    }
}