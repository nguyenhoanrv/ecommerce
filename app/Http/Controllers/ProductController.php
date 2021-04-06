<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with('brand:id,brand_name')->findOrFail($id);
        $sizes = explode(',', $product->product_size);
        $colors = explode(',', $product->product_color);
        $same_products = Product::where('category_id', $product->category_id)->limit(10)->orderByDesc('created_at')->get();
        return view('pages.detail', compact('product', 'sizes', 'colors', 'same_products'));
    }
    
}