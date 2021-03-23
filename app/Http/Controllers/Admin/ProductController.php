<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.product', compact('products'));
    }

    public function create()
    {
        $categorys = Category::all();
        $brands = Brand::all();
        return view('admin.products.create_product', compact('categorys', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'product_code' => 'required|string',
            'product_quantity' => 'required|numeric',
            'product_details' => 'required|string',
            'product_color' => 'required|string',
            'product_size' => 'required|string',
            'selling_price' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required'
        ]);

        $product  = new Product();
        $product->fill($request->all());
        $product->save();
        return back()->with('message_noti', 'Created Product Successfuly!')
            ->with('type', 'success');
    }
}