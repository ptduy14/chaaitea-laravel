@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail">
        <img src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/08/h3-rev-img1.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>Product detail</h3>
        </div>
    </div>
    <div class="content__main container content__main-product-detail dp-block">
        <div class="pd-row row">
            <div class="col l-6 m-12">
                <div class="pd-row_img">
                    <div class="pd-img-main">
                        <img src="{{asset('upload/images/product-imgs/'.$product_photo->product_photo_1st)}}" alt="">
                    </div>
                    <div class="pd-img-sub">
                        <div class="pd-img-sub-1">
                            <img src="{{asset('upload/images/product-imgs/'.$product_photo->product_photo_2nd)}}" alt="">
                        </div>
                        <div class="pd-img-sub-2">
                            <img src="{{asset('upload/images/product-imgs/'.$product_photo->product_photo_3rd)}}" alt="">
                        </div>
                        <div class="pd-img-sub-3">
                            <img src="{{asset('upload/images/product-imgs/'.$product_photo->product_photo_4th)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-6 m-12 mt-90">
                <div class="pd-row_info">
                    <h1 class="product-name">{{$product->product_name}}</h1>
                    <span class="product-price">{{ number_format($product->product_price) }}  VND</span>
                    <div class="product-desc">
                        {{$product_detail->product_detail_desc}}
                    </div>
                    <form class="cart-add" method='post' action="/cart/add-cart-item/{{$product->product_id}}">
                        @csrf
                        <div class="label-input">Quantity</div>
                        <div class="input-quatinty">
                            <span class="minus">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5" height="9" viewBox="0 0 5.05 9.55" enable-background="new 0 0 5.05 9.55" xml:space="preserve">
                                    <g>
                                    <path fill="black" d="M4.78,9.53c-0.03,0-0.06-0.01-0.1-0.02S4.63,9.48,4.61,9.46l-4.5-4.5C0.06,4.91,0.03,4.85,0.03,4.78
                                                            S0.06,4.65,0.11,4.6l4.5-4.5c0.05-0.05,0.11-0.07,0.18-0.07s0.13,0.02,0.18,0.07s0.07,0.11,0.07,0.18S5.01,0.41,4.96,0.46
                                                            L0.64,4.78L4.96,9.1c0.05,0.05,0.07,0.11,0.07,0.18S5.01,9.41,4.96,9.46C4.94,9.48,4.91,9.5,4.88,9.51S4.82,9.53,4.78,9.53z"></path>
                                    </g>
                                </svg>
                            </span>
                            <input type="text" id="quantity_637ce9fd68357" data-step="1" data-min="1" data-max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric">
                            <span class="plus">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="5" height="9" viewBox="0 0 5.05 9.55" enable-background="new 0 0 5.05 9.55" xml:space="preserve">
                                    <g>
                                    <path fill="black" d="M0.19,9.51C0.16,9.5,0.13,9.48,0.11,9.46C0.06,9.41,0.03,9.35,0.03,9.28S0.06,9.15,0.11,9.1l4.32-4.32
                                                            L0.11,0.46C0.06,0.41,0.03,0.35,0.03,0.28s0.02-0.13,0.07-0.18s0.11-0.07,0.18-0.07s0.13,0.02,0.18,0.07l4.5,4.5
                                                            c0.05,0.05,0.07,0.11,0.07,0.18S5.01,4.91,4.96,4.96l-4.5,4.5C0.43,9.48,0.41,9.5,0.38,9.51s-0.06,0.02-0.1,0.02
                                                            S0.22,9.52,0.19,9.51z"></path>
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <button data-id="{{$product->product_id}}" data-method="POST" class="btn btn-add add-cart-item">thêm giỏ hàng</button>
                    </form>
                    <div class="product-category">
                        <span>Category: </span>
                        <span>trà nở hoa</span>
                    </div>
                    <ul class="product-share">
                        <li>Share:</li>
                        <li><i class="fa-brands fa-facebook"></i></li>
                        <li><i class="fa-brands fa-square-instagram"></i></li>
                        <li><i class="fa-brands fa-twitter"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pd-row dp-block mt-90">
            <div class="dp-flex al-center jc-center">
                <ul class="section-nav">
                    <li>GIỚI THIỆU</li>
                    <li>THÔNG TIN KHÁC</li>
                    <div class="line"></div>
                </ul>
            </div>
            <div class="section-content">
                <div class="section-content_text active">
                    <p>{{$product_detail->product_detail_intro}}</p>
                </div>
                <div class="section-content_text">
                    <ul>
                        <li>
                            Cân nặng: <p>{{$product_detail->product_detail_weight}} G.</p>
                        </li>
                        <li>
                            Ngày sản xuất: <p>{{$product_detail->product_detail_mfg}}.</p>
                        </li>
                        <li>
                            Hạn sử dụng: <p>{{$product_detail->product_detail_exp}} tháng kể từ ngày sản xuất.</p>
                        </li>
                        <li>
                            Xuất xứ: <p>{{$product_detail->product_detail_origin}}.</p>
                        </li>
                        <li>
                            Hướng dẫn sử dụng: <p>{{$product_detail->product_detail_manual}}.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="pd-row dp-block mt-90">
            <div class="main__slider w-100">
                <div class="main__slider-heading">
                    <h3>Các sản phẩm khác</h3>
                    <div class="main__slider-nav">
                        <svg class="nav-prev" x="0px" y="0px" width="24.83px" height="18.58px" viewBox="3.33 2.67 24.83 18.58" enable-background="new 3.33 2.67 24.83 18.58" xml:space="preserve">
                            <line fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" x1="27.25" y1="12" x2="4.25" y2="12"/>
                            <polyline fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="12.75,20.5 4.25,12 12.75,3.5 "/>
                        </svg>
                        <svg class="nav-next" x="0px" y="0px" width="24.83px" height="18.58px" viewBox="3.33 2.67 24.83 18.58" enable-background="new 3.33 2.67 24.83 18.58" xml:space="preserve">
                            <line fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" x1="4.25" y1="12" x2="27.25" y2="12"/>
                            <polyline fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="18.75,3.5   27.25,12 18.75,20.5 "/>
                        </svg>
                    </div>
                </div>
                <div class="main__slider-wrapper">
                    @foreach ($random_products as $product)
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection