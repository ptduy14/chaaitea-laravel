@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail">
        <img src="../main/asset/img/thumbnail-login.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>Đăng Nhập</h3>
        </div>
    </div>

    <div class="content__main container content__main-container row">
        <div class="col l-3 m-12 c-12">
            <div class="content__main-r">
                <h2 class="cmr__heading">Đăng Nhập</h2>
                <p class="cmr__desc">
                    Dữ liệu cá nhân của bạn sẽ được sử dụng để hỗ trợ trải nghiệm của bạn trên toàn bộ trang web này, quản lý quyền truy cập vào tài khoản của bạn, và cho các mục đích khác được mô tả trong chính sách riêng tư của chúng tôi.
                </p>        
            </div>
        </div>
        <div class="col l-9 m-12 c-12">
            <div class="content__main-l">
                <form action="/login" method="post">
                    @csrf
                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div class="form-gruop">
                                <input type="text" class="input" name="email" placeholder="Email..." value="{{old('email')}}">
                                @if ($errors->first('email'))
                                    <span class="err-msg">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div class="form-gruop">
                                <input type="password" class="input" name="password" placeholder="Mật khẩu...">
                                @if ($errors->first('password'))
                                    <span class="err-msg">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div class="form-gruop" style="display: flex; float:left; width: 100%;">
                                <input id="input-checkbox" style="width: 2%; transform: scale(1.3);" type="checkbox" class="input" name="remenber" placeholder="Mật khẩu...">
                                <label for="input-checkbox" style="margin-left:15px; margin-bottom: 0">Ghi nhớ mật khẩu</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div class="form-gruop dp-flex">
                                <button type="submit" class="submit-btn">Đăng nhập</button>
                                <a href="/forget-password" style="margin-left: 20px; color: #98a67c">Quên mật khẩu ?</a>
                            </div>
                        </div>
                    </div>

                    @if (session()->has('user_id'))
                        <div class="row">
                            <div class="col l-12">
                                <div class="form-gruop dp-block">
                                    <span>Tài khoản của bạn hiện chưa được xác thực, vui lòng kiểm tra lại email hoặc <a href="/re-verify/{{session()->get('user_id')}}" style="color: #98a67c">nhấn vào đây.</a> để gửi lại mã xác thực</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection