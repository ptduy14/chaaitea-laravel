@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail">
        <img src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/08/landing-parallax-img1.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>Đơn hàng của bạn</h3>
        </div>
    </div>
    <div class="content__main container content__main-product-detail dp-block">
        <h1 class="cart-info-header" style="margin-top: 0px">Thông tin chi tiết đơn hàng</h1>
        <table class="cart-info-table">
            <tbody>
                <tr>
                    <th>Mã đơn hàng: </th>
                    <td>{{$order->order_id}}</td>
                </tr>
                <tr>
                    <th>Người nhận: </th>
                    <td>{{$order->reciver}}</td>
                </tr>
                <tr>
                    <th>Số điện thoại: </th>
                    <td>{{$order->phone}}</td>
                </tr>
                <tr>
                    <th>Địa chỉ nhận hàng: </th>
                    <td>{{$order->address}}</td>
                </tr>
                <tr>
                    <th>Ngày đặt hàng: </th>
                    <td>{{$order->order_date}}</td>
                </tr>
                <tr>
                    <th>Phương thức thanh toán: </th>
                    <td>{{$order->method_payment}}</td>
                </tr>
                <tr>
                    <th>Trạng thái: </th>
                    @if ($order->order_status === 'đang xử lí')
                        <td class="order-status" style="color: rgb(255, 0, 0); font-weight:bold">{{$order->order_status}}</td>
                    @elseif ($order->order_status === 'đang giao hàng')
                        <td class="order-status" style="color: rgb(255, 165, 0); font-weight:bold">{{$order->order_status}}</td>
                    @elseif ($order->order_status === 'đã hủy')
                        <td class="order-status" style="color: #d82253; font-weight:bold">{{$order->order_status}}</td>
                    @else
                    <td class="order-status" style="color: #98a67c; font-weight:bold">{{$order->order_status}}</td>
                    @endif
                </tr>
                <tr>
                    <th>Sản phẩm: </th>
                    <td>
                        @foreach ($order->product as $product)
                            {{$product->product_name}} <span style="font-size: 12px">x {{$product->pivot->quantity}}</span> <br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>Số lượng sản phẩm: </th>
                    <td>{{$order->total_quantity}}</td>
                </tr>
                <tr>
                    <th>Tổng tiền: </th>
                    <td class="product-subtotal">₫{{number_format($order->total_money)}}</td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-intro 0" href="/order">Quay Lại</a>
    </div>
</div>
@endsection