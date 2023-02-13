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
          <p>Do you want to delete this category ??</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-submit-del">Yess, delete for me</button>
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
        <h5>Category</h5>
        <a class="btn btn-primary" href="/admin/category/create">Create new category</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Cartegory Name</th>
            <th>Status</th>
            <th>Products in category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($category as $cate)
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$cate->category_name}}</strong></td>
              <td>@if ($cate->category_status == 1)
                <strong class="text-status-1">Active</strong>
              @else
              <strong class="text-status-0">Inactive</strong>
              @endif</td>
              <td><a class="btn btn-info btn-sm" href="/admin/category/{{$cate->category_id}}/product-in-cate">View</a></td>
              <td>
                <a class="btn btn-warning  btn-sm" href="/admin/category/{{$cate->category_id}}/edit">Edit</a>
                <a class="btn btn-danger  btn-sm btn-toast-del-cate" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$cate->category_id}}">Delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection