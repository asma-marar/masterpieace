<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('user.login');
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
    
        $product = Product::findOrFail($productId);
        if ($product->customer_id == $customer->id) {
            return response()->json(['error' => 'You cannot add your own product to cart'], 403);
        }

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
            
            // Get total quantity of all items
            $cartCount = CartItem::where('cart_id', $cart->id)->sum('quantity');
            
            return response()->json([
                'status' => 'added',
                'cartCount' => $cartCount
            ]);
        }
    
        $cartItem->delete();
        
        // Get total quantity after removal
        $cartCount = CartItem::where('cart_id', $cart->id)->sum('quantity');
        
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

    public function check(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json(['error' => 'Please login first'], 401);
        }
    
        $productId = $request->product_id;
        $customerId = Auth::guard('customer')->id();
        
        $cart = Cart::where('customer_id', $customerId)->first();
        
        $inCart = false;
        if ($cart) {
            $inCart = CartItem::where('cart_id', $cart->id)
                             ->where('product_id', $productId)
                             ->exists();
        }
        
        return response()->json(['inCart' => $inCart]);
    }
}
