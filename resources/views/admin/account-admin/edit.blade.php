@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">cập nhật trạng thái tài khoản</h5>
            <a  class="btn btn-primary" href="/admin/admin">Back</a>
          </div>
          <div class="card-body">
            <form action="/admin/admin/update" method="post">
              @csrf
                <input name="admin_id" hidden value={{$admin->id}}>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name"></label>
                    <div class="col-sm-10">
                        <select name="verify" id="defaultSelect" class="form-select">
                            <option value="1" {{$admin->verify == 1 ? 'selected' : ''}}>Hoạt động</option>
                            <option value="0" {{$admin->verify == 0 ? 'selected' : ''}}>Khóa hoạt động</option>
                        </select>
                    </div>
                </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection