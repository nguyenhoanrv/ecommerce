<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.counpon', compact('coupons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required|string',
            'discount' => 'required|numeric'
        ]);
        Coupon::create([
            'coupon_name' => $request->coupon_name,
            'discount' => $request->discount
        ]);
        return back()->with('message_noti', 'Created coupon successfuly!')->withType('success');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'coupon_name' => 'required|string',
            'discount' => 'required|numeric|min:0|max:100'
        ]);

        $coupon = Coupon::findOrFail($id);
        if ($coupon->coupon_name === $request->coupon_name && $coupon->discount == $request->discount) {
            return response()->json([
                'message' => 'Notthing to update!',
                'type' => 'info'
            ]);
        }

        $coupon->fill($request->only('coupon_name', 'discount'));
        $coupon->save();
        return response()->json([
            'message' => 'Updated coupon successfuly!',
            'type' => 'success'
        ]);
    }

    public function delete($id)
    {
        $check = Coupon::destroy($id);
        return response()->json([
            'check' => $check
        ]);
    }
}