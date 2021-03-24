<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category:id,category_name')->with('brand:id,brand_name')->get();
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
            'brand_id' => 'required',
            'image_one' => 'mimes:png,jpg,jpeg',
            'image_two' => 'mimes:png,jpg,jpeg',
            'image_three' => 'mimes:png,jpg,jpeg',
        ]);
        $product  = new Product();
        $product->fill($request->all());
        $product->image_one = $this->moveImage($request->file('image_one'));
        $product->image_two = $this->moveImage($request->file('image_two'));
        $product->image_three = $this->moveImage($request->file('image_three'));
        $product->save();
        return back()->with('message_noti', 'Created Product Successfuly!')
            ->with('type', 'success');
    }

    public function moveImage($image)
    {
        if ($image) {
            $name = $image->hashName();
            $path = '/images/product/';
            $image->move(
                public_path($path),
                $name
            );
            return $path . $name;
        }
        return '';
    }

    public function edit($id)
    {
        $product = Product::with('category:id,category_name')->with('brand:id,brand_name')->findOrFail($id);
        $categorys = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit_product', compact('product', 'categorys', 'brands'));
    }

    public function update(Request $request, $id)
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
            'brand_id' => 'required',
            'image_one' => 'mimes:png,jpg,jpeg',
            'image_two' => 'mimes:png,jpg,jpeg',
            'image_three' => 'mimes:png,jpg,jpeg',
        ]);
        $product = Product::findOrFail($id);
        if ($request->hasFile('image_one')) {
            if ($product->image_one) {
                unlink(public_path($product->image_one));
            }
            $product->image_one = $this->moveImage($request->file('image_one'));
        }
        if ($request->hasFile('image_two')) {
            if ($product->image_two) {
                unlink(public_path($product->image_two));
            }
            $product->image_two = $this->moveImage($request->file('image_two'));
        }
        if ($request->hasFile('image_three')) {
            if ($product->image_three) {
                unlink(public_path($product->image_three));
            }
            $product->image_three = $this->moveImage($request->file('image_three'));
        }
        $product->fill($request->except(['image_one', 'image_two', 'image_three']));
        $product->save();
        return back()->with('message_noti', 'Update Product Successfully!')->with('type', 'success');
    }

    public function delete($id)
    {

        $product = Product::findOrFail($id);
        if ($product->image_one) {
            unlink(public_path($product->image_one));
        }
        if ($product->image_two) {
            unlink(public_path($product->image_two));
        }
        if ($product->image_three) {
            unlink(public_path($product->image_three));
        }
        $product->delete();
        return response()->json([
            'check' => true
        ]);
    }

    public function changeStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        if ($request->status == 0) {
            $product->status = 1;
            $product->save();
            return response()->json([
                'type' => 'success',
                'message'   => 'Show product successfully!'
            ]);
        }
        $product->status = 0;
        $product->save();
        return response()->json([
            'type' => 'warning',
            'message'   => 'Hide product successfully!'
        ]);
    }
}