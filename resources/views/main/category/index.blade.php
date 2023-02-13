@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail">
        <img src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/10/h1-rev-img3.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>{{$cate->category_name}}</h3>
            <p>{{$cate->category_desc}}</p>
        </div>
    </div>
    <div class="content__main container content__main-product-detail">
        <div class="row">
            <div class="col l-9">
                <div class="row products-heading">
                    <span>Showing 1–9 of 24 results</span>
                    <div class="sort-product">
                        <select data-id="{{$cate->category_id}}" class="sort-product-field sort-product-field-cate">
                            <option value="default">Thứ tự mặc định</option>
                            <option value="price-asc">Giá từ thấp đến cao</option>
                            <option value="price-desc">Giá từ cao đến thấp</option>
                        </select>
                    </div>
                </div>
                <div class="row products">
                    @include('main.products.products')
                </div>
            </div>
            <div class="col l-3">
                <div class="options">
                    <div class="options_search">
                        <input data-id="{{$cate->category_id}}" type="text" placeholder="Tên sản phẩm...">
                        <button class="cate-products">Tìm</button>
                    </div>
                    <div class="options_price">
                        <h4>Lọc theo giá</h4>
                        <div slider id="slider-distance">
                            <div>
                              <div inverse-left style="width:70%;"></div>
                              <div inverse-right style="width:70%;"></div>
                              <div range style="left:0%;right:0%;"></div>
                              <span thumb style="left:0%;"></span>
                              <span thumb style="left:100%;"></span>
                              <div hidden sign style="left:0%;">
                                <span id="value">0</span>
                              </div>
                              <div hidden sign style="left:100%;">
                                <span id="value">800.000</span>
                              </div>
                            </div>
                            <input type="range" value="0" max="999" min="0" step="1" oninput="
                            this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                            let value = (this.value/parseInt(this.max))*100
                            var children = this.parentNode.childNodes[1].childNodes;
                            children[1].style.width=value+'%';
                            children[5].style.left=value+'%';
                            children[7].style.left=value+'%';children[11].style.left=value+'%';
                            children[11].childNodes[1].innerHTML=Number(this.value).toFixed(3)
                            document.querySelector('.price-start').innerText =  Number(this.value).toFixed(3);" />
                          
                            <input type="range" value="999" max="999" min="0" step="1" oninput="
                            this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                            let value = (this.value/parseInt(this.max))*100
                            var children = this.parentNode.childNodes[1].childNodes;
                            children[3].style.width=(100-value)+'%';
                            children[5].style.right=(100-value)+'%';
                            children[9].style.left=value+'%';children[13].style.left=value+'%';
                            children[13].childNodes[1].innerHTML=Number(this.value).toFixed(3);
                            document.querySelector('.price-end').innerText =  Number(this.value).toFixed(3);" />
                          </div>

                          <div class="options_price-display">
                            <h5>Price: </h5>
                            <p><p class="price-start">0.000</p>₫</p>
                            <p style="margin: 0 5px">-</p>
                            <p><p class="price-end">999.000</p>₫</p>
                            <span data-id="{{$cate->category_id}}" class="submit-filter">LỌC</span>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection