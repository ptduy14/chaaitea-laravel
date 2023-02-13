@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-lg-8 mb-4 order-0" style="width: 100%">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Xin chào {{Auth::user()->name}}! 🎉</h5>
              <p class="mb-4">Hiện đang có <span class="fw-bold">{{$processing_orders->count()}}</span> đơn hàng mới đang đợi bạn xử lí.</p>
  
              <a href="/admin/order" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="/admins/assets/img/elements/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Total Revenue -->
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
      <div class="card">
        <div class="row row-bordered g-0">
          <div class="col-md-8" style="width: 100%">
            <h5 class="card-header m-0 me-2 pb-3">Thống kê đơn hàng</h5>
            <div id="" class="px-2" style="min-height: 315px;">
              @include('admin.pages.pie-chart')
            </div>
          <div class="resize-triggers"><div class="expand-trigger"><div style="width: 436px; height: 377px;"></div></div><div class="contract-trigger"></div></div></div>
          
        </div>
      </div>
    </div>
  </div>
@endsection