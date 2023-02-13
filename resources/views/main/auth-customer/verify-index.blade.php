@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail">
        <img src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/09/h3-rev-img3.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>Xác Nhận Tài Khoản</h3>
        </div>
    </div>

    <div class="content__main container content__main-container" style="justify-content: center">
        <span style="text-align: center;">chúng tôi đã gửi tin nhắn đến địa chỉ email của bạn kèm theo đường dẫn để kích hoạt tài khoản. <br>
             Nếu không tìm thấy email vui lòng nhấn nút bên dưới và thử lại.<br>
            <button class="btn btn-intro submit-btn"><a href="/re-verify/{{$user_id}}">Gửi lại link xác thực</a></button>
        </span>
    </div>
</div>
@endsection