@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Thêm ảnh cho sản phẩm {{$product->product_name}}</h5>
            <a  class="btn btn-primary" href="/admin/product">Back</a>
          </div>
          <div class="card-body">
            <form action="/admin/product-photos/{{$product->product_id}}/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh sản phẩm 1</label>
                    <input class="form-control" type="file" id="formFile" name="product_photo_1st">
                    @if ($errors->first('product_photo_1st'))
                    <span class="err-msg">{{$errors->first('product_photo_1st')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh sản phẩm 12</label>
                    <input class="form-control" type="file" id="formFile" name="product_photo_2nd">
                    @if ($errors->first('product_photo_2nd'))
                    <span class="err-msg">{{$errors->first('product_photo_2nd')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh sản phẩm 3</label>
                    <input class="form-control" type="file" id="formFile" name="product_photo_3rd">
                    @if ($errors->first('product_photo_3rd'))
                    <span class="err-msg">{{$errors->first('product_photo_3rd')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh sản phẩm 4</label>
                    <input class="form-control" type="file" id="formFile" name="product_photo_4th">
                    @if ($errors->first('product_photo_4th'))
                    <span class="err-msg">{{$errors->first('product_photo_4th')}}</span>
                    @endif
                </div>
              <input hidden type="text" class="form-control" id="basic-default-name" name="product_id" value="{{$product->product_id}}"/>
              <div class=" justify-content-end" style="margin-top: 20px">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection