<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Collection;


class OrderManageController extends Controller
{
    public function index() {
        return view('admin.order.index');
    }

    public function hanldeSortOrder($type) {
        if ($type === 'mặc định') {
            $reusult = $this->renderData();
            return $reusult;
        } else if ($type === 'đơn hàng tuần này') {
            $orders = Order::whereBetween('order_date', [today()->startOfWeek(), today()->endOfWeek()])->get();
            return view('admin.order.body-table-order', compact('orders'));
        }
        else {
            $orders = Order::where('order_status', $type)->get();

            return view('admin.order.body-table-order', compact('orders'));
        }
        
    }

    public function renderData() {
        $orders = Order::all();
        return view('admin.order.body-table-order', compact('orders'));
    }

    public function handleChangeStatusOrder($id, $status) {
        Order::where('order_id', $id)->update([
            'order_status' => $status
        ]);

        $orders = Order::all();
        return view('admin.order.body-table-order', compact('orders'));
    }

    public function indexOrderDetail($id) {
        $order = Order::find($id);

        return view('admin.order.order-detail', compact('order'));
    }

    public function handleSearchOrder($type, $content) {
        if ($type === 'mã đơn hàng') {
            $orders = Order::where('order_id', $content)->get();
        } else {
            $users = User::where('name', 'like', '%' . $content . '%')->where('role', 0)->get();
            
            $orders = collect();

            foreach($users as $user) {
                $orders_collection = $user->order;
                
                foreach($orders_collection as $order) {
                    $orders->push($order);
                }
            }
        }
        

        return view('admin.order.body-table-order', compact('orders'));
    }
}
