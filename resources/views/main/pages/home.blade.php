@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="main__background">
        <video autoplay loop muted>
            <source src="/main/asset/vid/background-vid.mp4" type="video/mp4">
        </video>

        {{-- img responsive --}}
        <img src="/main/asset/img/chay-tea-2.jpg" alt="">

        <div class="main__background-text ">
            <div class="main__background-title">
                Sự kì diệu <br>  trong từng tách trà
            </div>
            <div class="main__background-content">
                CHAAI TEA mang đến những loại trà thơm ngon, thỏa mãn vị giác của những người yêu trà và đánh thức niềm đam mê trà cho những người mới bắt đầu. Từ những lá trà tươi ngon thượng hạng tại những vùng trà nổi tiếng Việt Nam - nơi được thiên nhiên ưu đãi đặc biệt - sản phẩm đã đi vào lòng người thưởng trà một cách chân thành và sâu sắc.
            </div>
        </div>
    </div>
    <div class="intro container intro-container wow fadeInUp row" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="10">
        <div class="col l-5 m-12 c-12">
            <div class="intro__img">
                <img src="/main/asset/img/h1-img1.jpg" alt="">
            </div>
        </div>
        <div class="col l-7 m-12 c-12">
            <div class="intro__content">
                <h2 class="intro__content-title">
                    CHAAI TEA khẳng định thương hiệu Việt
                </h2>
                <p class="intro__content-text">
                    Với chất lượng trà 1 tôm 2 lá và cao hơn cho dòng trà cao cấp, Viager Premium Tea chọn lọc từng khu vực trồng trà tại Việt Nam. Độ cao từ 600 – 2000m, đồi trà bạt ngàn đến rừng trà cổ thụ heo hút, từ các vùng trà khác nhau, tạo ra mỗi loại trà có hương vị đặc trưng riêng. Chúng tôi cùng chung tay với nhưng thương hiệu khác để xây dựng thương hiệu Trà Đặc Sản Việt Nam, cũng như giá trị của trà Việt Nam trên thị trường quốc tế, và cốt lõi là người Việt Nam hiểu được giá trị của Trà.
                </p>
                <button class="btn btn-intro"><a href="/products">Xem Thêm</a></button>
            </div>
        </div>
    </div>
    <div class="main__slider">
        <div class="main__slider-heading">
            <h3>Sản phẩm trà</h3>
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
            @foreach ($products as $product)
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
    <div class="main__offers container offer-container row">
        <div class="col l-5 m-12 c-12">
            <div class="main__offers-list wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="10">
                <div class="main__offers-list__header">
                    <h2>Popular Offers</h2>
                </div>
                <ul class="lst-product-offers">
                    <li>
                        <div class="lst-product-offers__heading">
                            <h6 class="lst-product-offers__heading__name">Oolong Tea</h6>
                            <div class="lst-product-offers__heading__line"></div>
                            <h6 class="lst-product-offers__heading__price">₫19.85</h6>
                        </div>
                        <p class="lst-product-offers__desc">Theme nullam quis ante velit</p>
                    </li>
                    <li>
                        <div class="lst-product-offers__heading">
                            <h6 class="lst-product-offers__heading__name">Matcha</h6>
                            <div class="lst-product-offers__heading__line"></div>
                            <h6 class="lst-product-offers__heading__price">₫19.00</h6>
                        </div>
                        <p class="lst-product-offers__desc">Theme nullam quis ante velit</p>
                    </li>
                    <li>
                        <div class="lst-product-offers__heading">
                            <h6 class="lst-product-offers__heading__name">Rooibos Tea</h6>
                            <div class="lst-product-offers__heading__line"></div>
                            <h6 class="lst-product-offers__heading__price">₫39.39</h6>
                        </div>
                        <p class="lst-product-offers__desc">Theme nullam quis ante velit</p>
                    </li>
                    <li>
                        <div class="lst-product-offers__heading">
                            <h6 class="lst-product-offers__heading__name">Chamomile</h6>
                            <div class="lst-product-offers__heading__line"></div>
                            <h6 class="lst-product-offers__heading__price">$42.09</h6>
                        </div>
                        <p class="lst-product-offers__desc">Theme nullam quis ante velit</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col l-7 m-12 c-12">
            <div class="main__offers-img wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="10">
                <img src="/main/asset/img/h1-img2-1.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="main__more-info container more-info-container">
        <h3 class="main__more-info__heading">
            Discover The Magic Of Tea, <br> Learn About Our Signature Flavors
        </h3>
        <div class="main__more-info__wrapper wow fadeInUp row" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="10">
            <div class="col l-3 m-6 c-0">
                <div class="main__more-info__img">
                    <img src="/main/asset/img/h1-img3.jpg" alt="">
                </div>
            </div>
            <div class="col l-4 m-6 c-12">
                <div class="main__more-info__img">
                    <img src="/main/asset/img/h1-img4.jpg" alt="">
                </div>
            </div>
            <div class="col l-5 m-12 c-12">
                <ul class="main__more-info__lst">
                    <li>
                        <h4 class="main__more-info__lst__title">
                            100% Organic
                        </h4>
                        <div class="main__more-info__lst-desc">
                            Et malesuada fames ac turpis egestas maecenas pharetra convallis met nisl purus.
                        </div>
                    </li>
                    <li>
                        <h4 class="main__more-info__lst__title">
                            High Quality
                        </h4>
                        <div class="main__more-info__lst-desc">
                            Et malesuada fames ac turpis egestas maecenas pharetra convallis met nisl purus.
                        </div>
                    </li>
                    <li>
                        <h4 class="main__more-info__lst__title">
                            Always Fresh
                        </h4>
                        <div class="main__more-info__lst-desc">
                            Et malesuada fames ac turpis egestas maecenas pharetra convallis met nisl purus.
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main__feedback container feedback-container">
        <div class="double-sign">”</div>
        <div class="feedback__slider-wrapper">
            <div class="feedback__item">
                <h4 class="">Ipsum a arcu cursus vitae congue mauris. Diam in arcu cursus euismod. Ut porttitor leo a diam sollicitudin tempor id eu. Massa placerat duis ultricies lacus sed turpis tincidunt id ante metus dictum facilisis aliquet.</h4>
                <h6>Sandra Patel</h6>
            </div>
            <div class="feedback__item">
                <h4 class="">Mua đi trà ngon lắm.</h4>
                <h6>Phan Tấn Duy</h6>
            </div>
            <div class="feedback__item">
                <h4 class="">Ipsum a arcu cursus vitae congue mauris. Diam in arcu cursus euismod. Ut porttitor leo a diam sollicitudin tempor id eu. Massa placerat duis ultricies lacus sed turpis tincidunt id ante metus dictum facilisis aliquet.</h4>
                <h6>Sandra Patel</h6>
            </div>
        </div>

        <svg class="feedback__slider-prev" x="0px" y="0px" width="33.6px" height="65.79px" viewBox="0 0 33.6 65.79" enable-background="new 0 0 33.6 65.79" xml:space="preserve">
            <polyline fill="none" stroke="#23261d" stroke-width="1.2" stroke-miterlimit="10" points="33.28,0.41 0.75,32.94 33.22,65.41 "></polyline>
        </svg>
        <svg class="feedback__slider-next" x="0px" y="0px" width="33.67px" height="65.82px" viewBox="0 0 33.67 65.82" enable-background="new 0 0 33.67 65.82" xml:space="preserve">
            <polyline fill="none" stroke="#23261d" stroke-width="1.2" stroke-miterlimit="10" points="0.39,0.39 32.91,32.91 0.44,65.39 "></polyline>
        </svg>
    </div>
    <div class="main__img-container">
        <div class="col l-5 m-0 c-0">
            <div class="img-wrapper img-wrapper__left wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="10">
                <img src="/main/asset/img/h1-img5.jpg" alt="">
            </div>
        </div>
        <div class="col l-7 m-12 c-12">
            <div class="img-wrapper wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="10">
                <img src="/main/asset/img/h1-img6-2.jpg" alt="">
            </div>
        </div>
    </div>
</div>    
@endsection

