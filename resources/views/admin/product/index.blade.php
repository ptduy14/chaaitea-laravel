@extends('admin.layout.app')
@section('content')
{{-- modal popup --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: red">Warring</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          x
        </button>
      </div>
      <form class="form-delete" action="" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p>Bạn có thực sự muốn xóa sản phẩm này ??</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary btn-submit-del">Đúng vậy</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- /modal popup --}}

{{-- toast --}}
<div class="toast bg-success align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      @if (session()->has('toast_msg'))
        {{session()->get('toast_msg')}}
      @endif
    </div>
    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close">x</button>
  </div>
</div>
{{-- /toast --}}
    <!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header">
        <h5>Sản phẩm</h5>
        <a class="btn btn-primary" href="product/create">Thêm sản phẩm</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Trạng thái sản phẩm</th>
            <th>Chi tiết sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Danh mục</th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($products as $product)
            <tr>
              <td>{{$product->product_id}}</td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$product->product_name}}</strong></td>
              <td>{{$product->product_price}} VND</td>
              <td>@if ($product->product_status == 1)
                <strong class="text-status-1">Active </strong>
              @else
                <strong class="text-status-0">Inactive </strong>
              @endif</td>
              <td>@if ($product->productDetail == null)
                <a class="btn btn-dark btn-sm" href="/admin/product-detail/{{$product->product_id}}/create">Create</a>
              @else
                <a class="btn btn-info btn-sm" href="/admin/product-detail/{{$product->product_id}}/index">View</a>
              @endif</td>
              <td>@if ($product->productPhotos == null)
                <a class="btn btn-dark btn-sm" href="/admin/product-photos/{{$product->product_id}}/create">Upload</a>
              @else
                <a class="btn btn-info btn-sm" href="/admin/product-photos/{{$product->product_id}}/index">View</a>
              @endif</td>
              <td>{{$product->category->category_name}}</td>
              <td>
                <a class="btn btn-warning  btn-sm" href="/admin/product/{{$product->product_id}}/edit">Edit</a>
                <a class="btn btn-danger  btn-sm btn-toast-del-pro" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$product->product_id}}">Delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection