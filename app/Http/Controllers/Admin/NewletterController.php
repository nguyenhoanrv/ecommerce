<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Newletter;
use Illuminate\Http\Request;

class NewletterController extends Controller
{
    public function index()
    {
        $newletters = Newletter::all();
        return view('admin.coupon.newletter', compact('newletters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        Newletter::create([
            'email' => $request->email
        ]);
        return back()->with('message_noti', 'Subcribed successfuly!')->with('type', 'success');
    }

    public function delete($id)
    {
        $check = Newletter::destroy($id);
        return response()->json([
            'check' => $check
        ]);
    }
}