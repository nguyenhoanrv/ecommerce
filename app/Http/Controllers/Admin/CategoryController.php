<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.categories.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => "required|max:50"
        ]);
        Category::create([
            'category_name' => $request->category_name
        ]);
        return redirect()->back()->with('message_noti', 'Created category successfully!')
            ->with('type', 'success');
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $request->validate([
                'category_name' => "required",
            ]);
            $category = Category::findOrFail($id);
            if ($request->category_name === $category->category_name) {
                return response()->json([
                    'check' => true,
                    'type' => 'info',
                    'message'   => 'Nothing update!'
                ]);
            }
            $category->category_name = $request->category_name;
            return response()->json([
                'check' => true,
                'type' => 'success',
                'message'   => 'Update category successfully!'
            ]);
        }
    }

    public function delete($id)
    {
        $check = Category::destroy($id);
        return response()->json([
            'check' => $check
        ]);
    }
}