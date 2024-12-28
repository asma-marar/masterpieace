<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function updateOrderStatus(Request $request, $order_id)
{
    $request->validate([
        'status' => 'required|in:pending,processing,delivered,cancelled',
    ]);

    $order = Order::find($order_id);

    if (!$order) {
        return response()->json(['success' => false, 'message' => 'Order not found']);
    }

    $order->order_status = $request->status;

    if ($order->save()) {
        return response()->json(['success' => true, 'message' => 'Order status updated successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Failed to update order status']);
}

};
