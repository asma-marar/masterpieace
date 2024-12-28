<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class DashboardController extends Controller
{
    public function index(){
        $users= User::whereIn('role', ['customer', 'intermediary'])->count();
        $products= Product::count();
        $orders= Order::count();
        $totalSales = Order::where('order_status', 'delivered')
        ->sum('order_total');
        
        $chart = new LaravelChart([
            'chart_title' => 'Users by Day',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
        ]);

        return view('admin.dashboard' , compact('users' , 'products' , 'orders' , 'totalSales', 'chart'));
    }

    
    
}
