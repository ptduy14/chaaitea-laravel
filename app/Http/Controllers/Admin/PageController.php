<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index() {

        // get order number and add to pie chart
        $orders =DB::table('table_order')
                    ->select(DB::raw('count(*) as total_order, order_status'))           
                    ->groupBy('order_status')
                    ->get();    
        
        $orders_total = Order::all();
        
        
        $chartData = "";
        
        foreach($orders as $order) {
            $chartData .="['$order->order_status', $order->total_order],";
        }    

        $chartData = rtrim($chartData, ',');

        $processing_orders = Order::where('order_status', 'đang xử lí')->get();

        return view('admin.pages.home', compact('chartData', 'processing_orders', 'orders_total'));

    }
}
