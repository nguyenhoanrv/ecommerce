<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class BrandController extends Controller
{
    //
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('admin.categories.brand', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string',
            'brand_logo' => 'required|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        if ($request->hasFile('brand_logo')) {
            $logo = $request->file('brand_logo');
            $logoName = $logo->hashName();
            $path = '/images/logo/';
            $logo->move(public_path($path), $logoName);
            Brand::create([
                'brand_name' => $request->brand_name,
                'brand_logo' => $path . $logoName
            ]);
            return back()->with('message_noti', 'Created brand successfully!')
                ->with('type', 'success');
        }
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.categories.update_brand', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required|string'
        ]);
        $logoName = $request->old_logo;
        if ($request->hasFile('brand_logo')) {
            $request->validate([
                'brand_logo' => 'mimes:png,jpg,jpeg'
            ]);
            unlink(public_path($logoName));
            $logo = $request->file('brand_logo');
            $logoName = $logo->hashName();
            $path = '/images/logo/';
            $logo->move(public_path($path), $logoName);
        }
        $brand = Brand::findOrFail($id);
        if ($brand->brand_name == $request->brand_name && $brand->brand_logo == $logoName)
            return back()->with('message_noti', 'Nothing to update!')->with('type', 'info');
        $brand->brand_name = $request->brand_name;
        $brand->brand_logo = $path . $logoName;
        $brand->save();
        return back()->with('message_noti', 'Updated brand successfuly!')->with('type', 'success');
    }

    public function delete($id)
    {

        $brand = Brand::findOrFail($id);
        unlink(public_path($brand->brand_logo));
        $brand->delete();
        return response()->json([
            'check' => true
        ]);
    }
}