<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class WishlistController extends Controller
{

    public function index()
    {
        $wl = DB::table('wishlists')->join('products', 'products.id', '=', 'wishlists.product_id')->where('wishlists.user_id', '=', Auth::id())
            ->select('wishlists.id as id', 'products.product_name as product_name', 'products.image_one as image_one', 'products.selling_price as selling_price', 'products.discount_price as discount_price', 'products.product_quantity as product_quantity', 'products.id as product_id')->orderByDesc('wishlists.id')->get();
        return view('wishlist', compact('wl'));
    }

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
        // return response()->json([
        //     'message' => 'Plese Login',
        //     'type' => 'error'
        // ]);
    }

    public function delete($id)
    {

        $check = Wishlist::destroy((int)$id);
        if ($check) {
            return response()->json(
                [
                    'message' => "Delete successfully!",
                    'type' => 'success'
                ]
            );
        }
        return response()->json(
            [
                'message' => "Delete error!",
                'type' => 'warning'
            ]
        );
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