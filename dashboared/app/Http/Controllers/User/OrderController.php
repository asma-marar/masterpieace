<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class OrderController extends Controller
{
    public function index()
    {

        $customer = Auth::guard('customer')->user();
        $cartItem = CartItem::with('product')->get();
        return view('front.order-detail', compact('customer', 'cartItem'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
    
            // Get logged-in customer
            $customerId = auth('customer')->id();
            if (!$customerId) {
                return redirect()->back()->with('error', 'Customer is not logged in.');
            }
    
            // Get cart for the customer
            $cart = Cart::where('customer_id', $customerId)->first();
            if (!$cart) {
                return redirect()->back()->with('error', 'No cart found for the logged-in customer.');
            }
    
            // Get cart items
            $cartItems = CartItem::where('cart_id', $cart->id)
                ->with('product')
                ->get();
    
            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Your cart is empty.');
            }
    
            // Calculate totals
            $subtotal = 0;
            foreach ($cartItems as $item) {
                if (!$item->product) {
                    return redirect()->back()->with('error', 'Product not found for a cart item.');
                }
                $subtotal += $item->product->price * $item->quantity;
            }
    
            $shipping = 5.00;
            $total = $subtotal + $shipping;
    
            // Create order
            $order = Order::create([
                'customer_id' => $customerId,
                'order_total' => $total,
                'order_status' => 'pending',
                'order_address' => auth('customer')->user()->address,
            ]);
    
            foreach ($cartItems as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }
    
            // Clear cart items
            CartItem::where('cart_id', $cart->id)->delete();
    
            DB::commit();
    
            return redirect()->route('user.orders.success')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Order Store Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    

    public function success()
    {
        return view('front.order-success');
    }

    public function orderHistory()
    {
        $customerId = auth('customer')->id();
    
        // Fetch orders with related products
        $orders = Order::where('customer_id', $customerId)
            ->with('orderProducts.product') // Eager load related products
            ->orderBy('created_at', 'desc')
            ->get();
    
        // // Debugging line to check the content of $orders
        // dd($orders);
    
        return view('front.order-history', compact('orders'));
    }
    
}
