<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('login');
        }
        $cart = Cart::with('items.product')->where('customer_id', Auth::guard('customer')->user()->id)->first();
        return view('front.cart', compact('cart'));
    }

    // CartController.php
    public function addToCart(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json(['error' => 'Please login first'], 401);
        }

        $customer = Auth::guard('customer')->user();
        $productId = $request->product_id;

        $cart = Cart::firstOrCreate(['customer_id' => $customer->id]);

        $cartItem = CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $productId)
                        ->first();

        if (!$cartItem) {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => 1
            ]);
            
            // Get updated cart count
            $cartCount = CartItem::where('cart_id', $cart->id)->count();
            
            return response()->json([
                'status' => 'added',
                'cartCount' => $cartCount
            ]);
        }

        $cartItem->delete();
        $cartCount = CartItem::where('cart_id', $cart->id)->count();
        
        return response()->json([
            'status' => 'removed',
            'cartCount' => $cartCount
        ]);
    }

    public function deleteItem($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();
        
        return redirect()->back()->with('success', 'Item removed from cart successfully');
    }

    public function updateQuantity(Request $request)
{
    try {
        $cartItem = CartItem::findOrFail($request->item_id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'success' => true,
            'message' => 'Quantity updated successfully'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error updating quantity'
        ], 500);
    }
}
}
