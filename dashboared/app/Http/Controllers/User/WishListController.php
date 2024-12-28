<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function showWishlist()
    {
        $customer = Auth::guard('customer')->user();
        $wishlistedProducts = Wishlist::where('customer_id', $customer->id)
            ->with('product')
            ->get();

        return view('front.wishlist', compact('wishlistedProducts'));
    }

    public function addToWishlist(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json(['error' => 'Please login first'], 401);
        }
    
        $customer = Auth::guard('customer')->user();
        $productId = $request->product_id;
    
        $wishlist = Wishlist::where('customer_id', $customer->id)
                            ->where('product_id', $productId)
                            ->first();
    
        if (!$wishlist) {
            Wishlist::create([
                'customer_id' => $customer->id,
                'product_id' => $productId
            ]);
            return response()->json(['status' => 'added']);
        }
    
        $wishlist->delete();
        return response()->json(['status' => 'removed']);
    }


    

}
