<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Library;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::with('game')
            ->where('user_id', auth()->id())
            ->get();

        return view('frontend.checkout.index', compact('carts'));
    }

    public function placeOrder()
    {
        $carts = Cart::with('game')
            ->where('user_id', auth()->id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Cart is empty.');
        }

        $total = 0;

        foreach ($carts as $cart) {
            $total += $cart->game->price * $cart->quantity;
        }

        $order = Order::create([
            'user_id'      => auth()->id(),
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'total_amount' => $total,
            'status'       => 'pending',
        ]);

        foreach ($carts as $cart) {

            OrderItem::create([
                'order_id' => $order->id,
                'game_id'  => $cart->game_id,
                'price'    => $cart->game->price,
                'quantity' => $cart->quantity,
            ]);

        }

        return redirect()->route('payment.index', $order->id);
    }

    public function payment(Order $order)
    {
        return view('frontend.payment.index', compact('order'));
    }

    public function processPayment(Request $request, Order $order)
    {
        $request->validate([
            'payment_method' => 'required',
        ]);

        Payment::create([
            'order_id'       => $order->id,
            'transaction_id' => 'PAY-' . strtoupper(Str::random(10)),
            'payment_method' => $request->payment_method,
            'amount'         => $order->total_amount,
            'status'         => 'success',
        ]);

        $order->update([
            'status' => 'paid',
        ]);

        $order->load('items');

        foreach ($order->items as $item) {

            Library::firstOrCreate([
                'user_id' => auth()->id(),
                'game_id' => $item->game_id,
            ]);

        }

        Cart::where('user_id', auth()->id())->delete();

        return redirect()
            ->route('payment.success', $order->id)
            ->with('success', 'Payment Successful');
    }

    public function success(Order $order)
    {
        $payment = Payment::where('order_id', $order->id)
            ->latest()
            ->first();

        return view(
            'frontend.payment.success',
            compact('order', 'payment')
        );
    }
}