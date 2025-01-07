<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
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
        $cartItem = CartItem::with('product')
            ->whereHas('cart', function($query) use ($customer) {
                $query->where('customer_id', $customer->id);
            })
            ->get();
            
        return view('front.order-detail', compact('customer', 'cartItem'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
    
            $customerId = auth('customer')->id();
            if (!$customerId) {
                return redirect()->route('login')->with('error', 'Please log in first.');
            }
    
            $cart = Cart::where('customer_id', $customerId)->first();
            if (!$cart || $cart->items->isEmpty()) {
                return redirect()->back()->with('error', 'Cart is empty.');
            }
    
            $cartItems = $cart->items;
            $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
    
            // Check product quantities before proceeding
            foreach ($cartItems as $item) {
                if ($item->quantity > $item->product->quantity) {
                    DB::rollback();
                    return redirect()->back()->with('error', "Insufficient stock for {$item->product->name}. Only {$item->product->quantity} available.");
                }
            }
    
            $shipping = 5.00;
            $total = $subtotal + $shipping;
    
            $order = Order::create([
                'customer_id' => $customerId,
                'order_total' => $total,
                'order_status' => 'pending',
                'order_address' => auth('customer')->user()->address,
            ]);
    
            foreach ($cartItems as $item) {
                // Create order product entry
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
    
                // Update product quantity
                $item->product->decrement('quantity', $item->quantity);
            }
    
            $cart->items()->delete();
            DB::commit();
    
            return redirect()->route('user.orders.success')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Order Error: ' . $e->getMessage());
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
