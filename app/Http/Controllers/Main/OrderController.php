<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentFormRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankForOrderMail;

class OrderController extends Controller
{

    public function indexPayment() {
        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        $user = Auth::user();
        $address = explode(', ', $user->address, 4);

        return view('main.order.payment', compact('category', 'products', 'address'));
    }

    public function handlePaymentRequest(PaymentFormRequest $request) {
        $request->validated();

        $order = Order::create([
            'reciver' => $request->input('reciver'),
            'phone' => $request->input('phone'),
            'address' => $request->input('city').', '.$request->input('district').', '.$request->input('ward').', '.$request->input('street_name'),
            'total_money' => Session()->get('cart')->totalPrice,
            'order_date' => Carbon::now()->toDateString(),
            'order_status' => 'đang xử lí',
            'method_payment' => $request->input('method_payment'),
            'total_quantity' => Session()->get('cart')->totalQuantity,
            'id' => Auth::user()->id
        ]);        
        
        $products = Session()->get('cart')->products;
        
        foreach ($products as $product_item) {
            $product_id = $product_item['productInfo']->product_id;
            $quantity_product_item = $product_item['quantity'];
            
            $order->product()->attach($product_id, ['quantity' => $quantity_product_item]);
        }

        Session()->forget('cart');
        Session()->save();

        Mail::to(Auth::user())->send(new ThankForOrderMail(Auth::user(), $order));

        return redirect('/order');
    }


    public function indexOrder() {
        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();
        
        // orders là một nhiều vì user sở hữu nhiều order
        $orders = Auth::user()->order;
        
        return view('main.order.order', compact('category', 'products', 'orders'));
    }

    public function indexOrderDetail($id) {
        $category = Category::where('category_status','=', 1)->get();
        $products = Product::where('product_status','=', 1)->get();

        $order = Order::find($id);

        return view('main.order.order-detail', compact('category', 'products', 'order'));
    }

    public function handleConfirmOrder($id) {
        Order::find($id)->update([
            'order_status' => 'đã hoàn thành'
        ]);

        $toast_msg = 'Đơn hàng đã được cập nhật !!';
        $toast_modify = 'toast-success';
        return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
    }

    public function handleCancelOrder($id) {
        Order::find($id)->update([
            'order_status' => 'đã hủy'
        ]);
        
        $toast_msg = 'Đơn hàng đã được hủy !!';
        $toast_modify = 'toast-success';
        return redirect()->back()->with(compact('toast_msg', 'toast_modify'));
    }
}
