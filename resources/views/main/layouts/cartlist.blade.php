<div class="cart-fixed__area-product">
    <div class="cart-fixed-close-btn"><i class="fa-regular fa-x"></i></div>
    <ul>
        @if (Session()->has('cart'))
            @foreach (Session()->get('cart')->products as $cartItem)
            <li class="cart-fixed__area-product__item">
                <div class="cfai__img">
                    <img src="{{asset('upload/images/product-imgs/'.$cartItem['productInfo']->productPhotos->product_photo_1st)}}" alt="">
                </div>
                <div class="cfai__info">
                    <h2>{{$cartItem['productInfo']->product_name}}</h2>
                    <p class="cfaii-quatity">Quatity: {{$cartItem['quantity']}}</p>
                    <p class="cfaii-price">₫{{number_format($cartItem['price'])}}</p>
                </div>
                <span data-id="{{$cartItem['productInfo']->product_id}}" class="del-cart-item"><i class="fa-regular fa-x"></i></span>
            </li>
            @endforeach
        @endif
    </ul>
</div>
<div class="cart-fixed__area-nav">
    <div class="cfan__total">
        <h3>Tổng tiền:</h3>
        <p>₫{{number_format(Session()->get('cart')->totalPrice)}}</p>
    </div>
    <a class="cfan__btn" href="/cart-detail">Xem Giỏ Hàng</a>
</div>