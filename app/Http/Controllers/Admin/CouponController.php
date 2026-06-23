<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->paginate(20);

        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'discount' => 'required|integer|min:1|max:100',
            'expire_date' => 'required|date',
            'usage_limit' => 'required|integer|min:1',
        ]);

        Coupon::create([
            'code' => $request->code,
            'discount' => $request->discount,
            'expire_date' => $request->expire_date,
            'usage_limit' => $request->usage_limit,
        ]);

        return redirect()
            ->route('admin.coupons.index')
            ->with('success', 'Coupon created successfully.');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code,' . $coupon->id,
            'discount' => 'required|integer|min:1|max:100',
            'expire_date' => 'required|date',
            'usage_limit' => 'required|integer|min:1',
        ]);

        $coupon->update([
            'code' => $request->code,
            'discount' => $request->discount,
            'expire_date' => $request->expire_date,
            'usage_limit' => $request->usage_limit,
        ]);

        return redirect()
            ->route('admin.coupons.index')
            ->with('success', 'Coupon updated successfully.');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()
            ->route('admin.coupons.index')
            ->with('success', 'Coupon deleted successfully.');
    }
}