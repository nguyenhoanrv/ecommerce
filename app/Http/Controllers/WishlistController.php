<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class WishlistController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'product_id' => ['required']
            ]);
            $check = Wishlist::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();
            if ($check) {
                Wishlist::destroy($check->id);
                return response()->json([
                    'message' => 'Delete to wishlist',
                    'type' => 'success',
                    'check' => true,
                ]);
            } else {
                Wishlist::create([
                    'product_id' => $request->product_id,
                    'user_id' => Auth::id()
                ]);
                return response()->json([
                    'message' => 'Add to wishlist',
                    'type' => 'success',
                    'check' => false
                ]);
            }
        }
        return response()->json([
            'message' => 'Plese Login',
            'type' => 'error'
        ]);
    }

    static public function  getWishlist()
    {
        $rs = [];
        $wl = Wishlist::where('user_id', Auth::id())->get();
        foreach ($wl as $el) {
            $rs[$el->product_id] = 1;
        }
        return $rs;
    }
}