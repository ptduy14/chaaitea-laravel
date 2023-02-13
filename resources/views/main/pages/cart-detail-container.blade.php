@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail">
        <img src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/08/landing-parallax-img1.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>Your Shopping Cart</h3>
        </div>
    </div>
    <div class="content__main container content__main-product-detail dp-block">
        @if (Session()->has('cart'))
        <table class="cart-table">
            {{-- cart here --}}
        </table>
        <h1 class="cart-info-header">Thông tin giỏ hàng</h1>
        <table class="cart-info-table">
            
        </table>
        <a class="btn btn-intro {{Session()->get('cart')->totalQuantity == 0 ? 'disabled' : 0}}" href="/order/payment">thanh toán</a>
        @endif
    </div>
</div>
@endsection