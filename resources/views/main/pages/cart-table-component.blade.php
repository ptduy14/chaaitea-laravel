<thead>
    <tr>
        <td class="product-remove"></td>
        <td class="product-thumnail"></td>
        <td class="product-name">Tên sản phẩm</td>
        <td class="product-price">giá</td>
        <td class="product-quantity">số lượng</td>
        <td class="product-subtotal">thành tiền</td>
        <td class="product-save"></td>
    </tr>
</thead>

<tbody>
    @foreach (Session()->get('cart')->products as $cartItem)
    <tr>
        <td class="product-remove">
            <span data-id="{{$cartItem['productInfo']->product_id}}" class="del-cart-item" name="del-cart-item"><i class="fa-regular fa-x"></i></span>
        </td>
        <td class="product-thumnail">
            <img src="{{asset('upload/images/product-imgs/'.$cartItem['productInfo']->productPhotos->product_photo_1st)}}" alt="">
        </td>
        <td class="product-name">{{$cartItem['productInfo']->product_name}}</td>
        <td class="product-price js-product-price" data-price="{{$cartItem['productInfo']->product_price}}">₫{{number_format($cartItem['productInfo']->product_price)}}</td>
        <td class="product-quantity">
            <div class="input-quatinty dp-flex">
                <span class="minus">
                    <
                </span>
                <input  class="quantity" disabled value="{{$cartItem['quantity']}}" type="text" id="quantity_637ce9fd68357" data-step="1" data-min="1" data-max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric">
                <span class="plus">
                    >
                </span>
            </div>
        </td>
        <td class="product-subtotal js-product-subtotal"> ₫{{number_format($cartItem['price'])}}</td>
        <td class="product-save">
            <button data-id="{{$cartItem['productInfo']->product_id}}" id="save-cart" class="btn btn-intro mt-0">save</button>
        </td>
    </tr>
    @endforeach
</tbody>