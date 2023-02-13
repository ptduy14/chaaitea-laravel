@extends('admin.layout.app')
@section('content')
    <!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header">
        <h5>Product</h5>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Product Status</th>
            <th>Product Detail</th>
            <th>Category</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($products as $product)
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$product->product_name}}</strong></td>
              <td>{{$product->product_price}} $</td>
              <td>@if ($product->product_status == 1)
                <strong class="text-status-1">Active</strong>
              @else
              <strong class="text-status-0">Inactive</strong>
              @endif</td>
              <td>@if ($product->productDetail == null)
                <a class="btn btn-dark btn-sm" href="/admin/product-detail/{{$product->product_id}}/create">Create</a>
              @else
                <a class="btn btn-info btn-sm" href="/admin/product-detail/{{$product->product_id}}/index">View</a>
              @endif</td>
              <td><strong>{{$product->category->category_name ?? 'code notfound'}}</strong></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection