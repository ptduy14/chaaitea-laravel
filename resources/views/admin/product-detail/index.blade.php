@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between mb-3">
                <h5 class="mb-0">Chi tiết sản phẩm {{$product->product_name}}</h5>
                <a  class="btn btn-primary" href="/admin/product">Back</a>
            </div>
            <div class="card-body">
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Giới thiệu sản phẩm</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$product_detail->product_detail_intro}}</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Mô tả sản phẩm</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$product_detail->product_detail_desc}}</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Cân nặng</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$product_detail->product_detail_weight}} g</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Ngày sản xuất</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$product_detail->product_detail_mfg}}</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Hạn sử dụng</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$product_detail->product_detail_exp}} tháng</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Xuất xứ</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$product_detail->product_detail_origin}}</p>
                </div>
              </div>
              <div class="mb-4">
                <label class="lb-title mb-2" for="basic-default-name">Hướng dẫn sử dụng</label>
                <div class="col-sm-10">
                  <p class="info-col">{{$product_detail->product_detail_manual}}</p>
                </div>
              </div>
            </div>
              <div class="justify-content-end" style="padding: 0 0 20px 20px">
                <div class="col-sm-10">
                  <a class="btn btn-warning  btn-sm" href="/admin/product-detail/{{$product_detail->product_detail_id}}/edit">Edit</a>
                </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection