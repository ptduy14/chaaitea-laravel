@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between mb-3">
                <h5 class="mb-0">Chi tiết đơn hàng {{$order->product_name}}</h5>
                <a  class="btn btn-primary" href="/admin/order">Back</a>
            </div>
            <div class="card-body">
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Người nhận</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$order->reciver}}</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Số điện thoại nhận hàng</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$order->phone}}</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Địa chỉ nhận hàng</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$order->address}} g</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Tổng tiền</label>
                <div class="col-sm-10">
                  <p class="info-col">₫{{number_format($order->total_money)}}</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Ngày đặt hàng</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$order->order_date}}</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Trạng thái đơn hàng</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$order->order_status}}</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Phương thức thanh toán</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$order->method_payment}}</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Sản phẩm</label>
                <div class="col-sm-10">
                  @foreach ($order->product as $product)
                    <p class="info-col">{{$product->product_name}} x {{$product->pivot->quantity}}</p>
                  @endforeach
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Tổng số lượng</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$order->total_quantity}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection