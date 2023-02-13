@extends('admin.layout.app')
@section('content')
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xuất đơn hàng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          x
        </button>
      </div>
        <div class="modal-body">
          <p>Số lượng sản phẩm sẽ được trừ vào kho, đơn hàng sẽ được tự động cập nhật trạng thái chuyển đi. Khi cập nhật trạng thái mới thì sẽ không thể thay đổi trạng thái được nữa. Bạn có chắc muốn thay đổi trạng thái đơn hàng này chứ ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
          <button type="submit" class="btn btn-primary btn-submit-update" data-bs-dismiss="modal" aria-label="Close" data-id='' data-status='đang giao hàng'>Thay đổi</button>
        </div>
    </div>
  </div>
</div>
    <!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header align-items-center">
        <h5 style="margin: 0" >Đơn hàng</h5>
        <div class="form-search d-flex">
          <select id="smallSelect" class="form-select form-select-sm search-type">
            <option value="mã đơn hàng">Mã đơn hàng</option>
            <option value="tên khách hàng">Tên khách hàng</option>
          </select>
          <input type="text" class="form-control form-control-sm search-input" placeholder="Tìm Kiếm">
          <button class="submit-search btn btn-primary btn-sm">Xác nhận</button>
        </div>
        <div class="d-flex">
          <select id="smallSelect" class="form-select form-select-sm sort_type">
            <option value="mặc định">Mặc định</option>
            <option value="đang xử lí">Đang xử lí</option>
            <option value="đang giao hàng">Đang giao hàng</option>
            <option value="đã hoàn thành">Đã hoàn thành</option>
            <option value="đã hủy">Đã hủy</option>
            <option value="đơn hàng tuần này">Đơn hàng trong tuần này</option>
          </select>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Nguời nhận</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt hàng</th>
            <th>Chi tiết</th>
            <th>Trạng thái</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0 js-tbl-order">
          
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection



{{-- TK1: phamlocfreechatgpt@gmail.com
TK2: locmaymo@gmail.com
MK: ungholocnhe
TK bác Duy Nguyễn
daubotq0123@gmail.com
MK: duyduy11
TK bác Mai Huy Bảo
chatgpt1@maihuybao.dev
chatgpt2@maihuybao.dev
chatgpt3@maihuybao.dev
chatgpt4@maihuybao.dev
chatgpt5@maihuybao.dev
MK: maihuybao --}}