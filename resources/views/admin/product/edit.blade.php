@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Chỉnh sửa thông tin sản phẩm</h5>
            <a  class="btn btn-primary" href="/admin/product">Back</a>
          </div>
          <div class="card-body">
            <form action="/admin/product/{{$product->product_id}}" method="post">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Tên sản phẩm</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" name="product_name" value="{{$product->product_name}}"/>
                  @if ($errors->first('product_name'))
                    <span class="err-msg">{{$errors->first('product_name')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Giá</label>
                <div class="col-sm-10">
                <textarea id="basic-default-name" class="form-control"  name="product_price">{{$product->product_price}}</textarea>
                @if ($errors->first('product_price'))
                  <span class="err-msg">{{$errors->first('product_price')}}</span>
                @endif
              </div>
              </div>
              <div class="mb-3" style="display: flex">
                <label for="defaultSelect" class="col-sm-2 col-form-label">Danh mục</label>
                <select id="defaultSelect" class="form-select" name="category_id">
                    @foreach ($category as $cate)
                      <option value="{{$cate->category_id}}" {{$cate->category_id == $product->category->category_id ? 'selected' : ''}}>{{$cate->category_name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3" style="display: flex">
                <label for="defaultSelect" class="col-sm-2 col-form-label">Trạng thái</label>
                <select id="defaultSelect" class="form-select js-select-input-cate" name="product_status" {{($product->productDetail == null || $product->productPhotos == null) ? 'disabled' : ''}}>
                  <option value="1" {{$product->product_status == 1 ? 'selected' : ''}}>Active</option>
                  <option value="0" {{$product->product_status == 0 ? 'selected' : ''}}>Inactive</option>
                </select>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary js-btn-update">Cập nhật</button>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10" style="margin-top: 20px">
                  <h5>Lưu ý: sản phẩm chỉ được "Active" khi có thông tin về chi tiết và hình ảnh sản phẩm</h5>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection