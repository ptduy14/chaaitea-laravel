@extends('admin.layout.app')
@section('content')
{{-- modal popup --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #65c439">Xác thực tài khoản</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            x
          </button>
        </div>
          <div class="modal-body">
              <input type="password" id="defaultInput" class="form-control" type="text" name="password" placeholder="Vui lòng nhập mật khẩu của bạn ...">
              <input class="admin-id" name="admin_id" value="" hidden>
              <span style="color: red" hidden>Mật khẩu không được trống</span>
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary btn-submit-password" hidden>Xác nhận</button>
          </div>
      </div>
    </form>
  </div>
</div>
{{-- /modal popup --}}

{{-- toast --}}
<div class="toast bg-{{session()->has('toast_modify') ? session()->get('toast_modify') : 'success'}} align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
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
        <h5>Tài khoản admin</h5>
        <div class="form-search d-flex">
            <select id="smallSelect" class="form-select form-select-sm search-type">
              <option value="tên admin">Tên tài khoản</option>
            </select>
            <input type="text" class="form-control form-control-sm search-input" placeholder="Tìm Kiếm">
            <button class="submit-search btn btn-primary btn-sm btn-search-admin">Xác nhận</button>
          </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Mã tài khoản</th>
            <th>Tên tài khoản</th>
            <th>Tên đăng nhập</th>
            <th>Số điện thoại</th>
            <th>Chức danh</th>
            <th>Tình trạng tài khoản</th>
            <th>Ngày tạo</th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @include('admin.account-admin.admin-table')
        </tbody>
      </table>
      <div class="card-header">
          <a href="/admin/admin/create" class="btn btn-primary">Thêm Admin</a>
      </div>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection