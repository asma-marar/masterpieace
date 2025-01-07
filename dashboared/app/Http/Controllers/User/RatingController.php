<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    // In your controller that loads the orders view
    public function index()
{
    $orders = Order::with(['orderProducts.product.seller'])
        ->where('customer_id', auth('customer')->id())
        ->get();
    
    return view('front.order-history', compact('orders'));
}

public function create(Request $request)
{
    $order = Order::with('orderProducts.product.seller')
        ->where('customer_id', auth('customer')->id())
        ->findOrFail($request->order_id);

    // Get the IDs of all sellers related to this order's products
    $ratedSellerIds = Rating::where('order_id', $order->id)
        ->pluck('rated_customer_id')
        ->toArray();

    $unratedSellers = collect();
    foreach ($order->orderProducts as $orderProduct) {
        if ($orderProduct->product && $orderProduct->product->seller) {
            $seller = $orderProduct->product->seller;
            // Ensure we only add a seller once to the collection
            if (!in_array($seller->id, $ratedSellerIds) && !$unratedSellers->contains('id', $seller->id)) {
                $unratedSellers->push($seller);
            }
        }
    }

    return view('front.rating', compact('order', 'unratedSellers'));
}

    
    

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'rated_customer_id' => 'required|exists:customers,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $rating = Rating::create([
            'order_id' => $request->order_id,
            'customer_id' => auth('customer')->id(),
            'rated_customer_id' => $request->rated_customer_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
    
        // Check if all sellers are rated
        $order = Order::findOrFail($request->order_id);
        $unratedSellers = false;
        
        foreach($order->orderProducts as $orderProduct) {
            if($orderProduct->product && $orderProduct->product->seller) {
                $rating = Rating::where('order_id', $order->id)
                              ->where('rated_customer_id', $orderProduct->product->seller->id)
                              ->first();
                if(!$rating) {
                    $unratedSellers = true;
                    break;
                }
            }
        }
    
        if($unratedSellers) {
            return redirect()->back()->with('success', 'Rating submitted. Please rate other sellers.');
        }
    
        return redirect()->route('home')->with('success', 'All ratings submitted successfully!');
}
}