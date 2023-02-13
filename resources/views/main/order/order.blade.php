@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail">
        <img src="https://images5.alphacoders.com/436/436006.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>Đơn hàng của bạn</h3>
        </div>
        <ul class="section-nav section-nav-account">
            <li class="btn btn-intro mt-0 active">Đơn hàng</li>
            <li class="btn btn-intro mt-0">Lịch sử đơn hàng</li>
            <div class="line line-nav-account" style="left: 0px; width: 159px;"></div>
        </ul>
    </div>
    <div class="content__main container content__main-container" style="justify-content: center;">
        <div class="section-content_text form-layout-order mt-0 active">
            <table class="order-table">
                <thead>
                    <tr>
                        <td class="order-id">mã đơn hàng</td>
                        <td class="order-reciver">Người nhận</td>
                        <td class="order-money">Tổng tiền</td>
                        <td class="order-date">Ngày đặt hàng</td>
                        <td class="order-status">Trạng thái</td>
                        <td class="order-detail"></td>
                        <td class="order-confirm"></td>
                        <td class="order-cancel"></td>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($orders as $order)
                        @if ($order->order_status === 'đang xử lí' || $order->order_status === 'đang giao hàng') 
                            <tr>
                                <td class="order-id">
                                    <span>{{$order->order_id}}</span>
                                </td>
                                <td class="order-reciver">{{$order->reciver}}</td>
                                <td class="order-money">₫{{number_format($order->total_money)}}</td>
                                <td class="order-date">{{$order->order_date}}</td>
                                @if ($order->order_status === 'đang xử lí')
                                    <td class="order-status" style="color: rgb(255, 0, 0); font-weight:bold">{{$order->order_status}}</td>
                                @elseif ($order->order_status === 'đang giao hàng')
                                    <td class="order-status" style="color: rgb(255, 165, 0); font-weight:bold">{{$order->order_status}}</td>
                                @else
                                    <p> I don't have any records! </p>
                                @endif
                                <td class="order-detail">
                                    <button class="btn btn-intro info mt-0"><a href="/order/detail/{{$order->order_id}}">Chi tiết</a></button>
                                </td>
                                <td class="order-confirm">
                                    @if ($order->order_status === 'đang giao hàng')
                                        <button class="btn btn-intro mt-0 btn-confirm-order" data-id='{{$order->order_id}}'>Đã nhận hàng</button>
                                    @else
                                        
                                    @endif
                                </td>
                                <td class="order-cancel">
                                    @if ($order->order_status === 'đang xử lí')
                                        <button class="btn btn-intro mt-0 btn-cancel-order" data-id='{{$order->order_id}}'>Hủy đơn</button>
                                    @else
                                        
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class=" section-content_text form-layout-account">
            <table class="order-table">
                <thead>
                    <tr>
                        <td class="order-id">mã đơn hàng</td>
                        <td class="order-reciver">Người nhận</td>
                        <td class="order-money">Tổng tiền</td>
                        <td class="order-date">Ngày đặt hàng</td>
                        <td class="order-status">Trạng thái</td>
                        <td class="order-detail"></td>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($orders as $order)
                        @if ($order->order_status == 'đã hoàn thành' || $order->order_status == 'đã hủy') 
                            <tr>
                                <td class="order-id">
                                    <span>{{$order->order_id}}</span>
                                </td>
                                <td class="order-reciver">{{$order->reciver}}</td>
                                <td class="order-money">₫{{number_format($order->total_money)}}</td>
                                <td class="order-date">{{$order->order_date}}</td>
                                @if ($order->order_status == 'đã hoàn thành') 
                                    <td class="order-status" style="color: #90a663; font-weight:bold">{{$order->order_status}}</td>
                                @else
                                    <td class="order-status" style="color: #d82253; font-weight:bold">{{$order->order_status}}</td>
                                @endif
                                <td class="order-detail">
                                    <button class="btn btn-intro info mt-0"><a href="/order/detail/{{$order->order_id}}">Chi tiết</a></button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection