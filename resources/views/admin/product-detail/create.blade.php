@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Thêm mô tả cho sản phẩm {{$product->product_name}}</h5>
            <a  class="btn btn-primary" href="/admin/product">Back</a>
          </div>
          <div class="card-body">
            <form action="/admin/product-detail/{{$product->product_id}}/store" method="post">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Giới thiệu sản phẩm</label>
                <div class="col-sm-10">
                  <textarea id="basic-default-name" class="form-control"  name="product_detail_intro"></textarea>
                  @if ($errors->first('product_detail_intro'))
                    <span class="err-msg">{{$errors->first('product_detail_intro')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Mô tả sản phẩm</label>
                <div class="col-sm-10">
                  <textarea id="basic-default-name" class="form-control"  name="product_detail_desc"></textarea>
                  @if ($errors->first('product_detail_desc'))
                    <span class="err-msg">{{$errors->first('product_detail_desc')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Cân nặng (g)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" name="product_detail_weight" />
                  @if ($errors->first('product_detail_weight'))
                    <span class="err-msg">{{$errors->first('product_detail_weight')}}</span>
                  @endif
                </div>
              </div>
              <div class="mb-3 row">
                <label for="html5-date-input" class="col-md-2 col-form-label">Ngày sản xuất</label>
                <div class="col-md-10">
                  <input class="form-control" type="date" id="html5-date-input" name="product_detail_mfg">
                  @if ($errors->first('product_detail_mfg'))
                    <span class="err-msg">{{$errors->first('product_detail_mfg')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Ngày hết hạn (month)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" name="product_detail_exp" />
                  @if ($errors->first('product_detail_exp'))
                    <span class="err-msg">{{$errors->first('product_detail_exp')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Xuất xứ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" name="product_detail_origin" />
                  @if ($errors->first('product_detail_origin'))
                    <span class="err-msg">{{$errors->first('product_detail_origin')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Hướng dẫn sử dụng</label>
                <div class="col-sm-10">
                <textarea id="basic-default-name" class="form-control"  name="product_detail_manual"></textarea>
                @if ($errors->first('product_detail_manual'))
                  <span class="err-msg">{{$errors->first('product_detail_manual')}}</span>
                @endif
              </div>
              <input hidden type="text" class="form-control" id="basic-default-name" name="product_id" value="{{$product->product_id}}"/>
              <div class="row justify-content-end" style="margin-top: 20px">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection