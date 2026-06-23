<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\GameController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\LibraryController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\ProfileController;

/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GameController as AdminGameController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Dashboard Redirect
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('home');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Games
|--------------------------------------------------------------------------
*/

Route::get('/games', [GameController::class, 'index'])
    ->name('games.index');

Route::get('/games/{slug}', [GameController::class, 'show'])
    ->name('games.show');

Route::get('/categories/{slug}', [GameController::class, 'category'])
    ->name('games.category');

Route::get('/search', [GameController::class, 'search'])
    ->name('games.search');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Cart
    |--------------------------------------------------------------------------
    */

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/{id}', [CartController::class, 'store'])
        ->name('cart.store');

    Route::put('/cart/{id}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/{id}', [CartController::class, 'destroy'])
        ->name('cart.destroy');

    /*
    |--------------------------------------------------------------------------
    | Wishlist
    |--------------------------------------------------------------------------
    */

    Route::get('/wishlist', [WishlistController::class, 'index'])
        ->name('wishlist.index');

    Route::post('/wishlist/{id}', [WishlistController::class, 'store'])
        ->name('wishlist.store');

    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])
        ->name('wishlist.destroy');

    /*
    |--------------------------------------------------------------------------
    | Checkout
    |--------------------------------------------------------------------------
    */

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
        ->name('checkout.placeOrder');

    /*
    |--------------------------------------------------------------------------
    | Payment
    |--------------------------------------------------------------------------
    */

    Route::get('/payment/{order}', [CheckoutController::class, 'payment'])
        ->name('payment.index');

    Route::post('/payment/{order}', [CheckoutController::class, 'processPayment'])
        ->name('payment.process');

    Route::get('/payment-success/{order}', [CheckoutController::class, 'success'])
        ->name('payment.success');

    /*
    |--------------------------------------------------------------------------
    | Library
    |--------------------------------------------------------------------------
    */

    Route::get('/library', [LibraryController::class, 'index'])
        ->name('library.index');

    /*
    |--------------------------------------------------------------------------
    | Reviews
    |--------------------------------------------------------------------------
    */

    Route::post('/review', [ReviewController::class, 'store'])
        ->name('review.store');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::post('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', CategoryController::class);

        Route::resource('games', AdminGameController::class);

        Route::resource('sliders', SliderController::class);

        Route::resource('orders', OrderController::class);

        Route::get('/orders/{id}/status/{status}',
            [OrderController::class, 'updateStatus']
        )->name('orders.status');

        Route::resource('payments', PaymentController::class)
            ->only([
                'index',
                'show',
                'update',
                'destroy'
            ]);

        Route::resource('users', UserController::class);

        /*
        |--------------------------------------------------------------------------
        | Reviews (FIXED)
        |--------------------------------------------------------------------------
        */

        Route::get('/reviews', [AdminReviewController::class, 'index'])
            ->name('reviews.index');

        Route::get('/reviews/{id}', [AdminReviewController::class, 'show'])
            ->name('reviews.show');

        Route::post('/reviews/{id}/approve',
            [AdminReviewController::class, 'approve']
        )->name('reviews.approve');

        Route::delete('/reviews/{id}',
            [AdminReviewController::class, 'destroy']
        )->name('reviews.destroy');

        /*
        |--------------------------------------------------------------------------
        | Coupons
        |--------------------------------------------------------------------------
        */

        Route::resource('coupons', CouponController::class);

        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        Route::get('/settings',
            [SettingController::class, 'index']
        )->name('settings.index');

        Route::post('/settings/update',
            [SettingController::class, 'update']
        )->name('settings.update');
    });

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';