<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('game')
            ->where('user_id',auth()->id())
            ->get();

        return view(
            'frontend.wishlist.index',
            compact('wishlists')
        );
    }

    public function store($gameId)
{
    $exists = Wishlist::where('user_id', auth()->id())
        ->where('game_id', $gameId)
        ->first();

    if ($exists) {
        return back()->with('error', 'Already in wishlist!');
    }

    Wishlist::create([
        'user_id' => auth()->id(),
        'game_id' => $gameId,
    ]);

    return back()->with('success', '❤️ Added to wishlist!');
}

    public function destroy($id)
{
    Wishlist::where('id', $id)
        ->where('user_id', auth()->id())
        ->delete();

    return back()->with('success', '🗑️ Removed from wishlist!');
}
}