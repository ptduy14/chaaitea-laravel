@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Thêm Admin</h5>
            <a  class="btn btn-primary" href="/admin/admin">Back</a>
          </div>
          <div class="card-body">
            <form action="/admin/admin/store" method="post">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Tên Admin</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" name="admin_name" />
                  @if ($errors->first('admin_name'))
                    <span class="err-msg">{{$errors->first('admin_name')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Tên đăng nhập</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" name="user_name" />
                  @if ($errors->first('user_name'))
                    <span class="err-msg">{{$errors->first('user_name')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Số điện thoại</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-name" name="admin_phone" />
                  @if ($errors->first('admin_phone'))
                    <span class="err-msg">{{$errors->first('admin_phone')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Mật khẩu</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="basic-default-name" name="password" />
                  @if ($errors->first('password'))
                    <span class="err-msg">{{$errors->first('password')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Nhập lại mật khẩu</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="basic-default-name" name="password_confirmation" />
                  @if ($errors->first('password_confirmation'))
                    <span class="err-msg">{{$errors->first('password_confirmation')}}</span>
                  @endif
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection