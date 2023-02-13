<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cormorant+Garamond' rel='stylesheet'>
    <link rel="stylesheet" href="/main/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="icon" href="/main/asset/img/chaai-logo.png" type="image/x-icon">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <link rel="stylesheet" href="/main/css/grid.css">
    <link rel="stylesheet" href="/main/css/home.css">
    <link rel="stylesheet" href="/main/css/register.css">
    <link rel="stylesheet" href="/main/css/product-detail.css">
    <link rel="stylesheet" href="/main/css/animate.css">
    <link rel="stylesheet" href="/main/css/cart-detail.css">
    <link rel="stylesheet" href="/main/css/account.css">
    <link rel="stylesheet" href="/main/css/order.css">
    <link rel="stylesheet" href="/main/css/products.css">
    <link rel="stylesheet" href="/main/css/responsive.css">
    <title>Chaii Tea</title>
</head>
<body>
    <div class="main">

        {{-- model --}}
        @include('main.layouts.confirm-order-model')
        @include('main.layouts.cancel-order-model')

        <div class="loader"></div>
        <div class="toast @if(session()->has('toast_modify')) {{session()->get('toast_modify')}} @endif">
            <div class="toast_content">@if(session()->has('toast_msg')) {{session()->get('toast_msg')}} @endif</div>
            <span><i class="fa-solid fa-xmark"></i></span>
        </div>
        
        
        <!-- cart -->
        @include('main.layouts.cartfixed')

        @include('main.layouts.scrolltop')
        
        {{-- header --}}
        @include('main.layouts.header')
        {{-- end header --}}
        @yield('content')
        {{-- footer --}}
        @include('main.layouts.footer')
        {{-- end footer --}}
    </div>

    <!-- slick-slider -->
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="/main/js/slick.js"></script>
    <script src="/main/js/app.js"></script>
    <script src="/main/js/wow.min.js"></script>
    <script src="/main/js/responesive.js"></script>
    <script>
      new WOW().init();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
      var citis = document.getElementById("city");
      var districts = document.getElementById("district");
      var wards = document.getElementById("ward");
      var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
        method: "GET", 
        responseType: "application/json", 
      };
      var promise = axios(Parameter);
      promise.then(function (result) {
        renderCity(result.data);
      });
      
      function renderCity(data) {
        for (const x of data) {
          citis.options[citis.options.length] = new Option(x.Name, x.Name);
        }
        citis.onchange = function () {
          district.length = 1;
          ward.length = 1;
          if(this.value != ""){
            const result = data.filter(n => n.Name === this.value);
      
            for (const k of result[0].Districts) {
              district.options[district.options.length] = new Option(k.Name, k.Name);
            }
          }
        };
        district.onchange = function () {
          ward.length = 1;
          const dataCity = data.filter((n) => n.Name === citis.value);
          if (this.value != "") {
            const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;
      
            for (const w of dataWards) {
              wards.options[wards.options.length] = new Option(w.Name, w.Name);
            }
          }
        };
      }
      
    </script>
</body>
</html>