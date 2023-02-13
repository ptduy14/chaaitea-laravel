    @if (!$products->isEmpty()) 
        @foreach ($products as $product)
            <div class="col l-4 pd-0 mb-30">
                <div class="product-item">
                    <div class="product-item__img">
                        <img src="{{asset('upload/images/product-imgs/'.$product->productPhotos->product_photo_1st)}}" alt="">
                        <img class="img-hov" src="{{asset('upload/images/product-imgs/'.$product->productPhotos->product_photo_2nd)}}" alt="">
                        <a href="/product-detail/{{$product->product_id}}" class="product-link"></a>
                    </div>
                    <div class="product-item__content">
                        <div class="product-item__content-info">
                            <a href="/product-detail/{{$product->product_id}}">{{$product->product_name}}</a>
                            <p> ₫{{ number_format($product->product_price) }}</p>
                        </div>
                        <div class="product-item__content-cart">
                            <span class="add-cart-item" data-id="{{$product->product_id}}" data-method="GET">Thêm giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else 
        <div class="col l-12 pd-0">
            Không tìm thấy sẩn phẩm nào
        </div>
    @endif
    
