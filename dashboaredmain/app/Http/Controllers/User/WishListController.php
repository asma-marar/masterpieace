<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function showWishlist()
    {
        if (Auth::guard('customer')->check()) {
            // If a customer is logged in, fetch their wishlist
            $customer = Auth::guard('customer')->user();
            $wishlistedProducts = Wishlist::where('customer_id', $customer->id)
                ->with('product')
                ->orderBy('created_at', 'desc')
                ->paginate(8);
        } else {
            // If no customer is logged in, return an empty array
            $wishlistedProducts = [];
        }
    
        return view('front.wishlist', compact('wishlistedProducts'));
    }

    public function addToWishlist(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json(['error' => 'Please login first'], 401);
        }
    
        $customer = Auth::guard('customer')->user();
        $productId = $request->product_id;
    
        // Check if customer is trying to add their own product
        $product = Product::findOrFail($productId);
        if ($product->customer_id == $customer->id) {
            return response()->json(['error' => 'You cannot add your own product to wishlist'], 403);
        }

        $wishlist = Wishlist::where('customer_id', $customer->id)
                            ->where('product_id', $productId)
                            ->first();
    
        if (!$wishlist) {
            Wishlist::create([
                'customer_id' => $customer->id,
                'product_id' => $productId
            ]);
            return response()->json([
                'status' => 'added',
                'count' => Wishlist::where('customer_id', $customer->id)->count()
        ]);
        }
    
        $wishlist->delete();
        return response()->json([
            'status' => 'removed',
            'count' => Wishlist::where('customer_id', $customer->id)->count()
        ]);
    }


    

}
