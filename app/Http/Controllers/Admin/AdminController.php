<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function changePassword()
    {
        return view('admin.setting');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
            'npassword' => 'min:6|required|confirmed|string',
        ]);
        $admin = Auth::guard('admin')->user();
        if (Hash::check($request->password, $admin->password)) {
            $admin->password = Hash::make($request->npassword);
            $admin->save();
            return \redirect()->back()->with('message', 'Password change successfully!')
                ->with('type', 'success');
        }

    }
}