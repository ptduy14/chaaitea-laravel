@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail">
        <img src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/09/h3-rev-img3.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>Đổi mật khẩu</h3>
        </div>
    </div>

    <div class="content__main container content__main-container" style="justify-content: center;">
        <form action="/forget-password/handling" method="post" style="width: 60%">
            @csrf
            <div class="row">
                <div class="col l-12">
                    <div class="form-gruop">
                        <input type="password" class="input" name="password" placeholder="Mật khẩu mới ...">
                        @if ($errors->first('password'))
                            <span class="err-msg">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l-12">
                    <div class="form-gruop">
                        <input type="password" class="input" name="password_confirmation" placeholder="Nhập lại mật khẩu ...">
                        @if ($errors->first('password_confirmation'))
                            <span class="err-msg">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l-12">
                    <div class="form-gruop">
                        <input type="hidden" class="input" name="id" value="{{$user->id}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l-12">
                    <div class="form-gruop dp-flex">
                        <button type="submit" class="submit-btn">Xác nhận</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection