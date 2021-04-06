<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $size = explode(',', $product->product_size)[0];
        $color = explode(',', $product->product_color)[0];
        $data = array();
        $data['id'] = $id;
        $data['name'] = $product->product_name;
        $data['qty'] = 1;
        $data['weight'] = 1;
        $data['price'] = $product->discount_price ?? $product->selling_price;
        $data['options'] = ['image' => $product->image_one, 'size' => $size, 'color' => $color];
        Cart::add($data);
        // Cart::store(auth()->user()->id);
        return response()->json([
            'message' => 'Add to cart successfully!',
            'type' => 'success'
        ]);
    }
    public function addToCartDetail(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $size = explode(',', $product->product_size)[0];
        $color = explode(',', $product->product_color)[0];
        $data = array();
        $data['id'] = $request->id;
        $data['name'] = $product->product_name;
        $data['qty'] = $request->qty;
        $data['weight'] = 1;
        $data['price'] = $product->discount_price ?? $product->selling_price;
        $data['options'] = ['image' => $product->image_one, 'size' => $request->size, 'color' => $request->color];
        Cart::add($data);
        // Cart::store(auth()->user()->id);
        return response()->json([
            'message' => 'Add to cart successfully!',
            'type' => 'success'
        ]);
    }

    public function view()
    {
        $cart = Cart::content();
        $products = [];
        $data = [];
        foreach ($cart as $item) {
            $product = Product::select('id', 'product_size', 'product_color')->where('id', $item->id)->first();
            $data['product_size'] = explode(',', $product->product_size);
            $data['product_color'] = explode(',', $product->product_color);
            $products[$item->id] = $data;
        }
        return view('pages.cart', compact('cart', 'products'));
    }

    public function delete($id)
    {
        Cart::remove($id);
        $total = Cart::total();
        $count = Cart::count();
        return response()->json([
            'message' => 'Delete cart item successfully!',
            'type' => 'success',
            'total' => $total,
            'count' => $count,

        ]);
    }

    public function addCoupon(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required'
        ]);

        $coupon = Coupon::where('coupon_name', $request->coupon_name)->first();
        if ($coupon) {
            Cart::setGlobalDiscount($coupon->discount);
            Session::put('coupon', $coupon->coupon_name);
            Session::put('coupon_discount', $coupon->discount);
            return redirect()->back()->with('message', 'Apply coupon successfully!')->with('type', 'success');
        } else return redirect()->back()->with('error', 'Coupon not found!');
    }

    public function removeCoupon()
    {
        Cart::setGlobalDiscount(0);
        Session::forget('coupon');
        Session::forget('coupon_discount');
        return redirect()->back()->with('message', 'Remove coupon successfully!')->with('type', 'success');
    }
}