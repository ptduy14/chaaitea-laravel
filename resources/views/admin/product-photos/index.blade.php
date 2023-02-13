@extends('admin.layout.app')
@section('content')
{{-- toast --}}
<div class="toast bg-{{session()->get('toast_modify')}} align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
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
{{-- modal popup --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm ảnh bạn muốn thay đổi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          x
        </button>
      </div>
      <form class="form-edit" action="/admin/product-photos/{{$product_photo->product_photos_id}}/update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <p>Chọn ảnh</p>
          <input class="form-control" type="file" id="formFile" name="img-changed">
          <input hidden type="text" class="js-input-field" name="input-field">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-submit-update">Change</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- /modal popup --}}
    <!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header">
        <h5>Product Photo</h5>
        <a class="btn btn-primary" href="/admin/product">Back</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Ảnh 1</th>
            <th>Ảnh 2</th>
            <th>Ảnh 3</th>
            <th>Ảnh 4</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <tr>
                <td>
                  <div class="product-img">
                    <img src="{{asset('upload/images/product-imgs/'.$product_photo->product_photo_1st)}}" alt="">
                    <a class="btn btn-info btn-sm btn-toast-update" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="product_photo_1st">Change</a>
                    <div class="overlay"></div>
                  </div>
                </td>
                <td>
                  <div class="product-img">
                    <img src="{{asset('upload/images/product-imgs/'.$product_photo->product_photo_2nd)}}" alt="">
                    <a class="btn btn-info btn-sm btn-toast-update" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="product_photo_2nd">Change</a>
                    <div class="overlay"></div>
                  </div>
                </td>
                <td>
                  <div class="product-img">
                    <img src="{{asset('upload/images/product-imgs/'.$product_photo->product_photo_3rd)}}" alt="">
                    <a class="btn btn-info btn-sm btn-toast-update" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="product_photo_3rd">Change</a>
                    <div class="overlay"></div>
                  </div>
                </td>
                <td>
                  <div class="product-img">
                    <img src="{{asset('upload/images/product-imgs/'.$product_photo->product_photo_4th)}}" alt="">
                    <a class="btn btn-info btn-sm btn-toast-update" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="product_photo_4th">Change</a>
                    <div class="overlay"></div>
                  </div>
                </td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection