<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Wishlist;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bootstrap Pagination
        Paginator::useBootstrapFive();

        View::composer('*', function ($view) {

            $wishlistCount = 0;

            if (auth()->check()) {
                $wishlistCount = Wishlist::where('user_id', auth()->id())->count();
            }

            $view->with('wishlistCount', $wishlistCount);
        });
    }
}