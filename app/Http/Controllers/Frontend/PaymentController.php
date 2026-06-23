<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Library;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Payment Page
     */
    public function index(Order $order)
    {
        // Payment methods shown on frontend
        $paymentMethods = [
            [
                'name' => 'ABA Bank',
                'code' => 'ABA',
            ],
            [
                'name' => 'ACLEDA Bank',
                'code' => 'ACLEDA',
            ],
            [
                'name' => 'Wing Money',
                'code' => 'WING',
            ],
            [
                'name' => 'PayPal',
                'code' => 'PAYPAL',
            ],
        ];

        return view(
            'frontend.payment.index',
            compact(
                'order',
                'paymentMethods'
            )
        );
    }

    /**
     * Process Payment
     */
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        $payment = Payment::create([
            'order_id'       => $order->id,
            'transaction_id' => 'PAY-' . strtoupper(uniqid()),
            'payment_method' => $request->payment_method,
            'amount'         => $order->total_amount,
            'status'         => 'success',
        ]);

        $order->update([
            'status' => 'completed',
        ]);

        foreach ($order->items as $item) {

            Library::firstOrCreate([
                'user_id' => auth()->id(),
                'game_id' => $item->game_id,
            ]);

        }

        return redirect()
            ->route('payment.success', $order->id)
            ->with(
                'success',
                'Payment completed successfully.'
            );
    }

    /**
     * Success Page
     */
    public function success(Order $order)
    {
        $payment = Payment::where(
            'order_id',
            $order->id
        )->latest()->first();

        return view(
            'frontend.payment.success',
            compact(
                'order',
                'payment'
            )
        );
    }
}