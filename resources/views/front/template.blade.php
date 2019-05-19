<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="/front/css/prettyPhoto.css" rel="stylesheet">
    <link href="/front/css/price-range.css" rel="stylesheet">
    <link href="/front/css/animate.css" rel="stylesheet">
    <link href="/front/css/main.css" rel="stylesheet">
    <link href="/front/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/front/js/html5shiv.js"></script>
    <script src="/front/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/front/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/front/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/front/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/front/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/front/images/ico/apple-touch-icon-57-precomposed.png">

    @yield('css')

</head>

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
               
                <div class="col-sm-6">
                    <div class="social-icons pull-right">

                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/front/images/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">

                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if(!$auth)
                                <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            @else
                                <li><a href="#"><i class="fa fa-user"></i>{{$auth->Ten}}</a></li>
                            @endif
                            @if($auth)
                                <li><a href="/hoadon"><i class="fa fa-crosshairs"></i>Hóa đơn </a></li>
                            @endif
                            <li style="padding-right: 5px"><a href="/cart" ><i class="fa fa-shopping-cart"></i> Giỏ hàng

                                </a>
                            </li>
                            <li style="padding: 0">
                                <a href="javascript:" id="amount-spec" style="{{$cart>0?"":"display:none"}};font-weight:700;margin-top: 5px;text-align: center;border-radius: 50%;padding: 3px;width:25px;height:25px;background-color: #FEA93A">
                                {{$cart}}
                                </a>
                            </li>
                            @if(!$auth)
                                <li><a href="/login"><i class="fa fa-lock"></i> Đăng nhập </a></li>
                            @else
                                <li><a href="/logout"><i class="fa fa-lock"></i> Đăng xuất </a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Sản Phẩm<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($danhmuc_theloais as $theloai)
                                        <li><a href="/theloai/{{$theloai['Slug']}}/sanpham">{{$theloai['Name']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="/about">Giới thiệu</a></li>
                            {{--<li><a href="/404.html">404</a></li>--}}
                            <li><a href="/contact">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="/search" method="get">
                        <div class="search_box pull-right">
                            <input type="text" name="search" placeholder="Tìm Kiếm"/>
                            <button type="submit" style="background-color: #F0F0E9;border: 0;height: 35px;width: 35px;"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
<!-- offsidebar-->


@yield('slide')
<!-- Main section-->
<section>
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</section>

<!-- Page footer-->

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
          
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                       
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Giới thiệu về công ty</a></li>
                            <li><a href="#">Câu hỏi thường gặp mua hàng</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Quy chế hoạt động</a></li>
                            <li><a href="#">Kiểm tra hóa đơn điện tử</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Tin tuyển dụng</a></li>
                            <li><a href="#">Tin khuyến mãi</a></li>
                            <li><a href="#">Hướng dẫn mua online</a></li>
                            <li><a href="#">Hướng dẫn mua trả góp</a></li>
                            <li><a href="#">Chính sách trả góp</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                       
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Hệ thống cửa hàng</a></li>
                            <li><a href="#">Hệ thống bảo hành</a></li>
                            <li><a href="#">Kiểm tra hàng Apple chính hãng</a></li>
                            <li><a href="#">Giới thiệu máy đổi trả</a></li>
                            <li><a href="#">Chính sách đổi trả</a></li>
                        </ul>
                    </div>
                </div>

                 <div class="single-widget" style="float: right;">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © Chuyên Liêm CL</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="/front/js/jquery.js"></script>
<script src="/front/js/bootstrap.min.js"></script>
<script src="/front/js/jquery.scrollUp.min.js"></script>
<script src="/front/js/price-range.js"></script>
<script src="/front/js/jquery.prettyPhoto.js"></script>
<script src="/front/js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
       $('.add-cart').click(function () {
           var id =  $(this).attr('data-id');
           $.ajax({
               type: "GET",
               url: "/add-cart?id="+id,
               data: {},
           }).done(function (res) {
               console.log(res);
               if(res.status == 200) {
                   alert('Bạn đã thêm thành công giỏ hàng');
                   $('#amount-spec').css('display','block');
                   $('#amount-spec').empty();
                   $('#amount-spec').html(res.total);
               }

           });
       });
    });
</script>

@yield('js')
</body>
</html>
