@extends('main.layouts.app')
@section('content')
<div class="content">
    <div class="content__thumbnail" style="background-color: #9ba685">
        <img src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/08/landing-img15.jpg" alt="">
        <div class="content__thumbnail-text">
            <h3>My Account</h3>
        </div>
        <ul class="section-nav section-nav-account">
            <li class="btn btn-intro mt-0 active">Thông Tin</li>
            <li class="btn btn-intro mt-0">Đổi Mật Khẩu</li>
            <div class="line line-nav-account"></div>
        </ul>
    </div>

    <div class="content__main container content__main-container" style="justify-content: center;">
        <div class="section-content_text form-layout-account active">
            <form action="/account" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="form-gruop dp-flex al-center">
                            <div class="img-user">
                                @if ($user->avata !== null)
                                    <img src="{{asset('upload/images/customer-avata/'.$user->avata)}}" alt="">
                                @else
                                    <img src="https://pbs.twimg.com/media/EbNX_erVcAUlwIx.jpg:large" alt="">
                                @endif
                            </div>
                            
                            <label class="btn btn-intro btn-label mt-0" for="img-upload">
                                <span>đổi ảnh đại diện</span>
                                <input type="file" name="img-upload" id="img-upload">
                            </label>
                        </div>
                    </div>
                    @if ($errors->first('img-upload'))
                        <span class="err-msg">{{$errors->first('img-upload')}}</span>
                    @endif
                </div>
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="form-gruop">
                            <input type="text" class="input" name="name" placeholder="Tên của bạn" value="{{$user->name}}">
                            @if ($errors->first('name'))
                                <span class="err-msg">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="form-gruop">
                            <input class="input" name="phone" placeholder="Số điện thoại..." value="{{$user->phone}}">
                            @if ($errors->first('phone'))
                                <span class="err-msg">{{$errors->first('phone')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col l-6 m-12 c-12">
                        <div class="form-gruop">
                            <select class="input input-select form-select form-select-sm mb-3" name="city" id="city" aria-label=".form-select-sm">
                                <option value="{{$address[0]}}" selected>{{$address[0]}}</option>           
                            </select>
                            @if ($errors->first('city'))
                                <span class="err-msg">{{$errors->first('city')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l-6 m-12 c-12">
                        <div class="form-gruop">
                            <select class="input input-select form-select form-select-sm mb-3" name="district" id="district" aria-label=".form-select-sm">
                                <option value="{{$address[1]}}" selected>{{$address[1]}}</option>
                            </select>
                            @if ($errors->first('district'))
                                <span class="err-msg">{{$errors->first('district')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col l-6 m-12 c-12">
                        <div class="form-gruop">
                            <select class="input input-select form-select form-select-sm" name="ward" id="ward" aria-label=".form-select-sm">
                                <option value="{{$address[2]}}" selected>{{$address[2]}}</option>
                            </select>
                            @if ($errors->first('ward'))
                                <span class="err-msg">{{$errors->first('ward')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col l-6 m-12 c-12">
                        <div class="form-gruop">
                            <input class="input" name="street_name" placeholder="Số nhà, tên đường..." value="{{$address[3]}}">
                            @if ($errors->first('street_name'))
                                <span class="err-msg">{{$errors->first('street_name')}}</span>
                            @endif
                        </div>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="form-gruop dp-flex">
                            <label class="form-gruop__lbl" for="male">Nam</label>
                            <input type="radio" name="gender" id="male" value="nam" {{$user->gender == 'nam' ? 'checked' : ''}}>
    
                            <label class="form-gruop__lbl" for="female">nữ</label>
                            <input type="radio" name="gender" id="female" value="nữ" {{$user->gender  == 'nữ' ? 'checked' : ''}}>
    
                            <label class="form-gruop__lbl" for="orther">Khác</label>
                            <input type="radio" name="gender" id="orther" value="khác" {{$user->gender == 'khác' ? 'checked' : ''}}>
                        </div>
                        @if ($errors->first('gender'))
                            <span class="err-msg">{{$errors->first('gender')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="form-gruop dp-flex">
                            <button type="submit" class="submit-btn">Cập nhật</button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
        <div class=" section-content_text form-layout-account">
            <form action="/account/change-passoword" method="post">
                @csrf
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="form-gruop">
                            <input type="password" class="input" name="old_password" placeholder="Mật khẩu cũ ...">
                            @if ($errors->first('old_password'))
                                <span class="err-msg">{{$errors->first('old_password')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="form-gruop">
                            <input type="password" class="input" name="password" placeholder="Mật khẩu mới ...">
                            @if ($errors->first('password'))
                                <span class="err-msg">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="form-gruop">
                            <input type="password" class="input" name="password_confirmation" placeholder="Nhập lại mật khẩu ...">
                            @if ($errors->first('password_confirmation'))
                                <span class="err-msg">{{$errors->first('password_confirmation')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l-12">
                        <div class="form-gruop dp-flex">
                            <button type="submit" class="submit-btn">Xác Nhận</button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection