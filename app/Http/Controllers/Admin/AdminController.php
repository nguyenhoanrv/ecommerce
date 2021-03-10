<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function changePassword()
    {
        return view('admin.setting');
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|string',
                'npassword' => 'required|min:6|confirmed|string',
            ],
            [
                'password.requied' => 'Old password is required.',
                'npassword.comfirmed' => 'New password is not match.',
                'npassword.min' => 'New password is min 6 charactor.',
            ]
        );
        $admin = Auth::guard('admin')->user();
        $hash = Hash::make($request->password);
        if (Hash::check($request->password, $admin->password)) {
            $admin->password = Hash::make($request->npassword);
            $admin->save();
            return redirect()->back()->with('message_noti', 'Password change successfully!')
                ->with('type', 'success');
        }
        // return redirect()->route('admin.home')->with('message_noti', 'Password change successfully!')
        //         ->with('type', 'success');
        return redirect()->back()->with('message_noti', 'Password change failed!')
            ->with('type', 'error');
    }
}