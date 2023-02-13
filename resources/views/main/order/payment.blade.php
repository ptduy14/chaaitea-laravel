@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail">
        <img src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/08/landing-parallax-img1.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>Thanh Toán</h3>
        </div>
    </div>
    <div class="content__main container content__main-product-detail dp-block">
        <h1 class="cart-info-header" style="margin-top: 0px">Thông tin giỏ hàng</h1>
        <table class="cart-info-table">
            <tbody>
                <tr>
                    <th>Tổng số lượng sản phẩm: </th>
                    <td>{{Session()->get('cart')->totalQuantity}}</td>
                </tr>
                <tr>
                    <th>Tổng tiền: </th>
                    <td class="product-subtotal">₫{{number_format(Session()->get('cart')->totalPrice)}}</td>
                </tr>
            </tbody>
        </table>
        <h1 class="cart-info-header">Thông tin đơn hàng</h1>
        <form action="/order/payment" method="post">
            @csrf
            <div class="row">
                <div class="col l-12 m-12 c-12">
                    <div class="form-gruop">
                        <label for="">Người nhận: </label>
                        <input type="text" class="input" name="reciver" value="{{Auth::user()->name}}">
                        @if ($errors->first('reciver'))
                            <span class="err-msg">{{$errors->first('reciver')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col l-12 m-12 c-12">
                    <div class="form-gruop">
                        <label for="">Số điện thoại: </label>
                        <input class="input" name="phone" placeholder="Số điện thoại..." value="{{Auth::user()->phone}}">
                        @if ($errors->first('phone'))
                            <span class="err-msg">{{$errors->first('phone')}}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l-6 m-12 c-12">
                    <div class="form-gruop">
                        <label for="">Tỉnh/thành: </label>
                        <select class="input input-select form-select form-select-sm mb-3" name="city" id="city" aria-label=".form-select-sm">
                            <option value="{{$address[0]}}" selected>{{$address[0]}}</option>           
                        </select>
                        @if ($errors->first('city'))
                            <span class="err-msg">{{$errors->first('city')}}</span>
                        @endif
                    </div>
                </div>
                <div class="col l-6 m-12 c-12">
                    <div class="form-gruop">
                        <label for="">Quận/huyện: </label>
                        <select class="input input-select form-select form-select-sm mb-3" name="district" id="district" aria-label=".form-select-sm">
                            <option value="{{$address[1]}}" selected>{{$address[1]}}</option>
                        </select>
                        @if ($errors->first('district'))
                            <span class="err-msg">{{$errors->first('district')}}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l-6 m-12 c-12">
                    <div class="form-gruop">
                        <label for="">Phường/xã: </label>
                        <select class="input input-select form-select form-select-sm" name="ward" id="ward" aria-label=".form-select-sm">
                            <option value="{{$address[2]}}" selected>{{$address[2]}}</option>
                        </select>
                        @if ($errors->first('ward'))
                            <span class="err-msg">{{$errors->first('ward')}}</span>
                        @endif
                    </div>
                </div>
                <div class="col l-6 m-12 c-12">
                    <div class="form-gruop">
                        <label for="">Tên đường, số nhà: </label>
                        <input class="input" name="street_name" placeholder="Số nhà, tên đường..." value="{{$address[3]}}">
                        @if ($errors->first('street_name'))
                            <span class="err-msg">{{$errors->first('street_name')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l-6 m-12 c-12">
                    <div class="form-gruop">
                        <select class="input input-select form-select form-select-sm" name="method_payment" id="method_payment" aria-label=".form-select-sm">
                            <option value="" selected>Phương Thức Thanh Toán</option>
                            <option value="Tiền mặc">Tiền mặt</option>
                            <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                        </select>
                        @if ($errors->first('method_payment'))
                            <span class="err-msg">{{$errors->first('method_payment')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l-12">
                    <div class="form-gruop dp-flex">
                        <button type="submit" class="submit-btn">Xác nhận đặt hàng</button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection