<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order')
            ->latest()
            ->paginate(20);

        return view(
            'admin.payments.index',
            compact('payments')
        );
    }

    public function show(Payment $payment)
    {
        return view(
            'admin.payments.show',
            compact('payment')
        );
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return back()->with(
            'success',
            'Payment deleted successfully.'
        );
    }
}