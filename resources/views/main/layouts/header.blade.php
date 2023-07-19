<div class="header">
    <!-- header unfixed-->
    <div class="header-unfixed container header-container">
        <div class="header__menu">
            <ul class="header__menu-main">
                <li><a href="/">Home</a></li>
                <li><a href="#">pages</a>
                    <ul class="header__menu-subone">
                        <li><a href="#">Về chúng tôi</a></li>
                        <li><a href="#">Địa chỉ</a></li>
                        <li><a href="#">Liên Hệ</a></li>
                    </ul>
                </li>
                <li><a href="#">shop</a>
                    <ul class="header__menu-subone">
                        <li><a href="/products">Sản phẩm</a></li>
                        <li><a href="#">
                            Các loại trà
                            <svg class="qodef-svg--slider-arrow-right" x="0px" y="0px" width="15px" height="15px" viewBox="3.33 2.67 24.83 18.58" enable-background="new 3.33 2.67 24.83 18.58" xml:space="preserve">
                                <line fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" x1="4.25" y1="12" x2="27.25" y2="12"/>
                                <polyline fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="18.75,3.5   27.25,12 18.75,20.5 "/>
                            </svg>
                            </a>
                            <ul class="header__menu-subtwo">
                                @foreach ($category as $cate)
                                    @if($cate->category_status == 1)
                                        <li><a href="/category/{{$cate->category_id}}/products">{{$cate->category_name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#">our location</a></li>
                        <li><a href="#">contact us</a></li>
                    </ul>
                </li>
                <li><a href="#">blog</a></li>
            </ul>
        </div>
        <div class="header__logo">
            <a href="/">
                <img src="/main/asset/img/chaai-logo.png" alt="">
            </a>
        </div>
        <div class="header__right">
            <div class="header__right-cart">
                <i class="fa fa-solid fa-cart-shopping"></i>
                <span class="cart-count">(0)</span>
            </div>
            <div class="header__right-login">
                @if (Auth::check())
                    <span class="user-tie"><i class="fa-solid fa-user"></i></span>
                    <div class="user-dropdown-menu-contain">
                        <div class="user-dropdown-menu">
                            <ul>
                                <li class="user-dropdown-item">
                                    <div class="user-highlight">
                                        @if (Auth::user()->avata !== null)
                                            <img src="{{asset('upload/images/customer-avata/'.Auth::user()->avata)}}" alt="">
                                        @else
                                            <img src="https://pbs.twimg.com/media/EbNX_erVcAUlwIx.jpg:large" alt="">
                                        @endif
                                    </div>
                                    <div class="user-detail">
                                        <div class="user-detail-name">{{Auth::user()->name}}</div>
                                        <div class="user-detail-role">{{Auth::user()->role->role_name}}                                   </div>
                                </li>
                                <li class="line"></li>
                                @if (Auth::user()->role->role_id === 3)
                                    <li class="user-dropdown-item">
                                        <a href="/account" class="user-menu-link">
                                            <i class="fa-regular fa-user"></i>
                                            <span>Tài khoản của tôi</span>
                                        </a>
                                    </li>
                                    <li class="line"></li>
                                    <li class="user-dropdown-item">
                                        <a href="/order" class="user-menu-link">
                                            <i class="fa-solid fa-file-invoice"></i>
                                            <span>Đơn hàng của tôi</span>
                                        </a>
                                    </li>
                                    <li class="line"></li>
                                @endif
                                <li class="user-dropdown-item">
                                    <a href="/logout" class="user-menu-link">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-layout"></div>    
                @else
                    <a href="/register">
                        <p>Đăng kí</p>
                        <svg width="32" height="32" viewBox="0 0 32 32" style="fill: #fff;height: 20px;">
                            <path d="M 4,15C 4,15.552, 4.448,16, 5,16l 19.586,0 l-4.292,4.292c-0.39,0.39-0.39,1.024,0,1.414 c 0.39,0.39, 1.024,0.39, 1.414,0l 6-6c 0.092-0.092, 0.166-0.202, 0.216-0.324C 27.972,15.26, 28,15.132, 28,15.004c0-0.002,0-0.002,0-0.004 l0,0c0-0.13-0.026-0.26-0.078-0.382c-0.050-0.122-0.124-0.232-0.216-0.324l-6-6c-0.39-0.39-1.024-0.39-1.414,0 c-0.39,0.39-0.39,1.024,0,1.414L 24.586,14L 5,14 C 4.448,14, 4,14.448, 4,15z"/>
                        </svg>
                    </a>
                @endif  
            </div>
        </div>
    </div>
    <!-- header fixed -->
    <div class="header-wrapper-fixed">
        <div class="header-fixed container header-container">
            <div class="header__menu header__menu-fixed">
                <ul class="header__menu-main header__menu-main-fixed">
                    <li><a href="/">home</a></li>
                    <li><a href="#">pages</a>
                        <ul class="header__menu-subone header__menu-subone-fixed">
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Địa chỉ</a></li>
                            <li><a href="#">Liên Hệ</a></li>
                        </ul>
                    </li>
                    <li><a href="#">shop</a>
                        <ul class="header__menu-subone header__menu-subone-fixed">
                            <li><a href="/products">Sản phẩm</a></li>
                            <li><a href="#">
                                Các loại trà
                                <svg class="qodef-svg--slider-arrow-right" x="0px" y="0px" width="15px" height="15px" viewBox="3.33 2.67 24.83 18.58" enable-background="new 3.33 2.67 24.83 18.58" xml:space="preserve">
                                    <line fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" x1="4.25" y1="12" x2="27.25" y2="12"/>
                                    <polyline fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="18.75,3.5   27.25,12 18.75,20.5 "/>
                                </svg>
                                </a>
                                <ul class="header__menu-subtwo header__menu-subtwo-fixed">
                                    @foreach ($category as $cate)
                                    <li><a href="/category/{{$cate->category_id}}/products">{{$cate->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">our location</a></li>
                            <li><a href="#">contact us</a></li>
                        </ul>
                    </li>
                    <li><a href="#">blog</a></li>
                </ul>
            </div>
            <div class="header__logo header__logo-fixed">
                <a href="/">
                    <img src="/main/asset/img/chaai-logo2.png" alt="">
                </a>
            </div>
            <div class="header__right">
                <div class="header__right-cart header__right-cart-fixed">
                    <i class="fa fa-solid fa-cart-shopping"></i>
                    <span class="cart-count">(0)</span>
                </div>
                <div class="header__right-login header__right-login-fixed">
                    @if (Auth::check())
                        <span class="user-tie"><i class="fa-solid fa-user"></i></span>
                        <div class="user-dropdown-menu-contain">
                            <div class="user-dropdown-menu">
                                <ul>
                                    <li class="user-dropdown-item">
                                        <div class="user-highlight">
                                            @if (Auth::user()->avata !== null)
                                                <img src="{{asset('upload/images/customer-avata/'.Auth::user()->avata)}}" alt="">
                                            @else
                                                <img src="https://pbs.twimg.com/media/EbNX_erVcAUlwIx.jpg:large" alt="">
                                            @endif
                                        </div>
                                        <div class="user-detail">
                                            <div class="user-detail-name">{{Auth::user()->name}}</div>
                                            <div class="user-detail-role">{{Auth::user()->role->role_name}}</div>
                                        </div>
                                    </li>
                                    <li class="line"></li>
                                    @if (Auth::user()->role->role_id === 3)
                                        <li class="user-dropdown-item">
                                            <a href="/account" class="user-menu-link">
                                                <i class="fa-regular fa-user"></i>
                                                <span>Tài khoản của tôi</span>
                                            </a>
                                        </li>
                                        <li class="line"></li>
                                        <li class="user-dropdown-item">
                                            <a href="/order" class="user-menu-link">
                                                <i class="fa-solid fa-file-invoice"></i>
                                                <span>Đơn hàng của tôi</span>
                                            </a>
                                        </li>
                                        <li class="line"></li>
                                    @endif
                                    <li class="user-dropdown-item">
                                        <a href="/logout" class="user-menu-link">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                            <span>Đăng xuất</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="user-layout"></div>    
                    @else
                        <a href="/register">
                            <p>Đăng kí</p>
                            <svg width="32" height="32" viewBox="0 0 32 32" style="fill: rgb(0, 0, 0);height: 20px;">
                                <path d="M 4,15C 4,15.552, 4.448,16, 5,16l 19.586,0 l-4.292,4.292c-0.39,0.39-0.39,1.024,0,1.414 c 0.39,0.39, 1.024,0.39, 1.414,0l 6-6c 0.092-0.092, 0.166-0.202, 0.216-0.324C 27.972,15.26, 28,15.132, 28,15.004c0-0.002,0-0.002,0-0.004 l0,0c0-0.13-0.026-0.26-0.078-0.382c-0.050-0.122-0.124-0.232-0.216-0.324l-6-6c-0.39-0.39-1.024-0.39-1.414,0 c-0.39,0.39-0.39,1.024,0,1.414L 24.586,14L 5,14 C 4.448,14, 4,14.448, 4,15z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- header responosivbe --}}
    <div class="header-responesive">
        <div class="header-inner">
            <a class="header-logo-mobile">
                <img src="/main/asset/img/chaai-logo2.png" alt="">
            </a>
            <div class="header-right-mobile">
                <div class="header__right-cart header__right-cart-fixed">
                    <i class="fa fa-solid fa-cart-shopping"></i>
                    <span class="cart-count">(0)</span>
                </div>

                <div class="nav-icon-btn">
                    <div class="nav-icon-line"></div>
                    <div class="nav-icon-line"></div>
                    <div class="nav-icon-line"></div>
                </div>
            </div>
        </div>
        <nav>
            <ul class="header-nav">
                <li>
                    <div class="header-inner-sub">
                        <a href="/">home</a>
                    </div>
                </li>
                <li>
                    <div class="header-inner-sub">
                        <a href="/">Pages</a>
                        <svg class="qodef-svg--menu-arrow qodef-menu-item-arrow" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12" height="8" viewBox="0 0 12.09 8.5" enable-background="new 0 0 12.09 8.5" xml:space="preserve"><g><path d="M11.98,4.02c0.06,0.06,0.09,0.14,0.09,0.23c0,0.09-0.03,0.17-0.09,0.23l-3.9,3.9C8.05,8.41,8.02,8.44,7.97,8.45
                            C7.94,8.47,7.89,8.48,7.85,8.48S7.77,8.47,7.73,8.45C7.69,8.44,7.65,8.41,7.62,8.38c-0.06-0.06-0.1-0.14-0.1-0.23
                            s0.03-0.17,0.1-0.23l3.35-3.35H0.38c-0.09,0-0.17-0.03-0.23-0.09s-0.1-0.14-0.1-0.23c0-0.09,0.03-0.17,0.1-0.24
                            c0.06-0.06,0.14-0.09,0.23-0.09h10.59L7.62,0.58c-0.06-0.06-0.1-0.14-0.1-0.23s0.03-0.17,0.1-0.23c0.06-0.06,0.14-0.1,0.23-0.1
                            c0.09,0,0.16,0.03,0.23,0.1L11.98,4.02z"></path></g></svg>
                    </div>
                    <nav>
                        <ul class="nav-sub-mobile">
                           <li><a href="/">Về chúng tôi</a></li>
                           <li><a href="/">Địa chỉ</a></li>
                           <li><a href="/">Liên hệ</a></li>
                        </ul>
                    </nav>
                </li>
                <li>
                    <div class="header-inner-sub">
                        <a href="/">Shop</a>
                        <svg class="qodef-svg--menu-arrow qodef-menu-item-arrow" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12" height="8" viewBox="0 0 12.09 8.5" enable-background="new 0 0 12.09 8.5" xml:space="preserve"><g><path d="M11.98,4.02c0.06,0.06,0.09,0.14,0.09,0.23c0,0.09-0.03,0.17-0.09,0.23l-3.9,3.9C8.05,8.41,8.02,8.44,7.97,8.45
                            C7.94,8.47,7.89,8.48,7.85,8.48S7.77,8.47,7.73,8.45C7.69,8.44,7.65,8.41,7.62,8.38c-0.06-0.06-0.1-0.14-0.1-0.23
                            s0.03-0.17,0.1-0.23l3.35-3.35H0.38c-0.09,0-0.17-0.03-0.23-0.09s-0.1-0.14-0.1-0.23c0-0.09,0.03-0.17,0.1-0.24
                            c0.06-0.06,0.14-0.09,0.23-0.09h10.59L7.62,0.58c-0.06-0.06-0.1-0.14-0.1-0.23s0.03-0.17,0.1-0.23c0.06-0.06,0.14-0.1,0.23-0.1
                            c0.09,0,0.16,0.03,0.23,0.1L11.98,4.02z"></path></g></svg>
                    </div>
                    <nav>
                        <ul class="nav-sub-mobile">
                            @foreach ($category as $cate)
                                <li><a href="/category/{{$cate->category_id}}/products">{{$cate->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </li>
                <li>
                    <div class="header-inner-sub">
                        <a href="/">blog</a>
                    </div>
                </li>
                <li>
                    @if (Auth::check())
                        <div class="header-inner-sub">
                            <a href="/">My Account</a>
                            <svg class="qodef-svg--menu-arrow qodef-menu-item-arrow" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12" height="8" viewBox="0 0 12.09 8.5" enable-background="new 0 0 12.09 8.5" xml:space="preserve"><g><path d="M11.98,4.02c0.06,0.06,0.09,0.14,0.09,0.23c0,0.09-0.03,0.17-0.09,0.23l-3.9,3.9C8.05,8.41,8.02,8.44,7.97,8.45
                                C7.94,8.47,7.89,8.48,7.85,8.48S7.77,8.47,7.73,8.45C7.69,8.44,7.65,8.41,7.62,8.38c-0.06-0.06-0.1-0.14-0.1-0.23
                                s0.03-0.17,0.1-0.23l3.35-3.35H0.38c-0.09,0-0.17-0.03-0.23-0.09s-0.1-0.14-0.1-0.23c0-0.09,0.03-0.17,0.1-0.24
                                c0.06-0.06,0.14-0.09,0.23-0.09h10.59L7.62,0.58c-0.06-0.06-0.1-0.14-0.1-0.23s0.03-0.17,0.1-0.23c0.06-0.06,0.14-0.1,0.23-0.1
                                c0.09,0,0.16,0.03,0.23,0.1L11.98,4.02z"></path></g></svg>
                        </div>

                        <nav>
                            <ul class="nav-sub-mobile">
                               <li>
                                    <a href="/account" class="user-menu-link">
                                        <span>Tài khoản của tôi</span>
                                    </a>
                                </li>
                               <li>
                                    <a href="/order" class="user-menu-link">
                                        <span>Đơn hàng của tôi</span>
                                    </a>
                               </li>
                               <li>
                                    <a href="/logout" class="user-menu-link">
                                        <span>Đăng xuất</span>
                                    </a>
                               </li>
                            </ul>
                        </nav>
                    @else
                        <div class="header-inner-sub">
                            <a href="/register">Register</a>
                        </div>
                    @endif                   
                </li>
            </ul>
        </nav>
    </div>

</div>