<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Game;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('game')
            ->where('user_id',auth()->id())
            ->get();

        return view('frontend.cart.index', compact('carts'));
    }

    public function store($id)
{
    $cart = Cart::where('user_id', auth()->id())
                ->where('game_id', $id)
                ->first();

    if ($cart) {
        return redirect()->back()
            ->with('error', 'Game already in cart!');
    }

    Cart::create([
        'user_id' => auth()->id(),
        'game_id' => $id,
        'quantity' => 1,
    ]);

    return redirect()->back()
        ->with('success', 'Game added to cart successfully!');
}

    public function destroy($id)
    {
        Cart::findOrFail($id)->delete();

        return back();
    }
}