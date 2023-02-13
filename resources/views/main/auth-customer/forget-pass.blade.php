@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail">
        <img src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/09/h3-rev-img3.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>Xác Nhận Tài Khoản</h3>
        </div>
    </div>

    <div class="content__main container content__main-container" style="justify-content: center;">
        <form action="/forget-password" method="post" style="width: 60%">
            @csrf
            <div class="row">
                <div class="col l-12 m-12 c-12">
                    <div class="form-gruop">
                        <input type="text" class="input" name="email" placeholder="Email của bạn..." value="{{old('email')}}">
                        @if ($errors->first('email'))
                            <span class="err-msg">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l-12">
                    <div class="form-gruop dp-flex">
                        <button type="submit" class="submit-btn">Gửi mã xác thực</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection