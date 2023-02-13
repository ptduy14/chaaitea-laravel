@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Create new product</h5>
            <a  class="btn btn-primary" href="/admin/product">Back</a>
          </div>
          <div class="card-body">
            <form action="/admin/product" method="post">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" name="product_name" />
                  @if ($errors->first('product_name'))
                    <span class="err-msg">{{$errors->first('product_name')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Price</label>
                <div class="col-sm-10">
                <textarea id="basic-default-name" class="form-control"  name="product_price"></textarea>
                @if ($errors->first('product_price'))
                  <span class="err-msg">{{$errors->first('product_price')}}</span>
                @endif
              </div>
              </div>
              <div class="mb-3" style="display: flex">
                <label for="defaultSelect" class="col-sm-2 col-form-label">Category</label>
                <select id="defaultSelect" class="form-select" name="category_id">
                    @foreach ($category as $cate)
                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10" style="margin-top: 20px">
                  <h5>NOTE: the product is only activated when the product details are available</h5>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection