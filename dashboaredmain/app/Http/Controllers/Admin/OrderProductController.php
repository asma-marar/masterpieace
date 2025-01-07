<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    function index($order_id){
        $orderproduct = OrderProduct::with(['order', 'product'])->find($order_id);
        return view('admin.order.view' , compact('orderproduct'));
    }
}
