<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')
            ->select('id', 'user_id', 'order_total', 'order_status', 'order_address', 'created_at')
            ->get();

        // Pass orders data to the view
        return view('admin.order.index', compact('orders'));
    }

    public function updateStatus(Request $request, $order_id)
    {
    $request->validate([
        'status' => 'required|in:pending,processing,delivered,cancelled',
    ]);

    // Find the order by ID
    $order = Order::find($order_id);

    if ($order) {
        // Update the status
        $order->order_status = $request->status;
        $order->save();

        return response()->json([
            'success' => true,
            'message' => 'Order status updated successfully.',
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Order not found.',
    ]);
    }

    public function delete($order_id)
    {
        $order= Order::find($order_id);
        if ($order) {
            $order->delete();
    
            return redirect('admin/order')->with('message', 'Order deleted successfully');
        }
    
        return redirect('admin/order')->with('error', 'Order not found');
    }
    public function view($order_id){


        $order  = Order::with([
            'user',               // To get user data
            'orderProducts.product'  // To load products related to orderProducts (includes product name)
        ])->find($order_id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        return view('admin.order.view', compact('order'));


    }
}
