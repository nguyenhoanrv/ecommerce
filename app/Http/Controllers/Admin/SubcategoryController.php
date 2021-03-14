<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('category_name', 'id')->get();
        $subcategories = Subcategory::with('category:id,category_name')->get();
        return view('admin.categories.subcategory', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|string',
            'category_id' => 'required'
        ]);
        Subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id
        ]);
        return back()->with('message_noti', 'Created Subcategory Successfuly!')
            ->with('type', 'success');
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $request->validate([
                'category_name' => "required",
                'subcategory_name' => "required",
            ]);
            $subcategory = Subcategory::findOrFail($id);
            if (
                $subcategory->category &&
                $request->category_name ==  $subcategory->category->category_name
                && $request->subcategory_name == $subcategory->subcategory_name
            ) {
                return response()->json([
                    'check' => true,
                    'type' => 'info',
                    'message'   => 'Nothing update!'
                ]);
            }
            $category = Category::select('id')->where('category_name', $request->category_name)->first();
            $subcategory->subcategory_name = $request->subcategory_name;
            $subcategory->category_id = $category->id;
            $subcategory->save();
            return response()->json([
                'check' => true,
                'type' => 'success',
                'message'   => 'Update category successfully!'
            ]);
        }
    }

    public function delete($id)
    {
        $check = Subcategory::destroy($id);
        return response()->json([
            'check' => $check
        ]);
    }
}