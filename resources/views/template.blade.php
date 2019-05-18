<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <title>@yield('title') | Comeup</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="/vendor/fontawesome/css/font-awesome.min.css">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.css">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="/vendor/animate.css/animate.min.css">
    <!-- WHIRL (spinners)-->
    <link rel="stylesheet" href="/vendor/whirl/dist/whirl.css">
    <!-- =============== PAGE VENDOR STYLES ===============-->
@yield('css')
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="/css/bootstrap.css" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="/css/app.css" id="maincss">
    <link rel="stylesheet" href="/css/theme-g.css" id="maincss">


</head>

<body>
<div class="wrapper">
    <!-- top navbar-->
    <header class="topnavbar-wrapper">
        <!-- START Top Navbar-->
        <nav class="navbar topnavbar" role="navigation">
            <!-- START navbar header-->
            <div class="navbar-header">
                <a class="navbar-brand" href="/admin/">
                    <div class="brand-logo">
                        <img class="img-responsive" src="/img/logo.png" alt="App Logo">
                    </div>
                    <div class="brand-logo-collapsed">
                        <img class="img-responsive" src="/img/logo-single.png" alt="App Logo">
                    </div>
                </a>
            </div>
            <!-- END navbar header-->
            <!-- START Nav wrapper-->
            <div class="nav-wrapper">
                <!-- START Left navbar-->
                <ul class="nav navbar-nav">
                    <li>
                        <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                        <a class="hidden-xs" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
                            <em class="fa fa-navicon"></em>
                        </a>
                        <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                        <a class="visible-xs sidebar-toggle" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
                            <em class="fa fa-navicon"></em>
                        </a>
                    </li>
                    <!-- START User avatar toggle-->
                    <li>
                        <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                        <a id="user-block-toggle" href="#user-block" data-toggle="collapse">
                            <em class="icon-user"></em>
                        </a>
                    </li>
                    <!-- END User avatar toggle-->
                    <!-- START lock screen-->
                    <li>
                        <a href="/logout" title="Lock screen">
                            <em class="icon-lock"></em>
                        </a>
                    </li>
                    <!-- END lock screen-->
                </ul>
                <!-- END Left navbar-->
                <!-- START Right Navbar-->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Search icon-->
                    <li>
                        <a href="#" data-search-open="">
                            <em class="icon-magnifier"></em>
                        </a>
                    </li>
                    <!-- Fullscreen (only desktops)-->
                    <li class="visible-lg">
                        <a href="#" data-toggle-fullscreen="">
                            <em class="fa fa-expand"></em>
                        </a>
                    </li>
                    <!-- START Alert menu-->
                    <li class="dropdown dropdown-list">
                        <a href="#" data-toggle="dropdown">
                            <em class="icon-bell"></em>
                            <div class="label label-danger">11</div>
                        </a>
                        <!-- START Dropdown menu-->
                        <ul class="dropdown-menu animated flipInX">
                            <li>
                                <!-- START list group-->
                                <div class="list-group">
                                    <!-- list item-->
                                    <a class="list-group-item" href="#">
                                        <div class="media-box">
                                            <div class="pull-left">
                                                <em class="fa fa-twitter fa-2x text-info"></em>
                                            </div>
                                            <div class="media-box-body clearfix">
                                                <p class="m0">New followers</p>
                                                <p class="m0 text-muted">
                                                    <small>1 new follower</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- list item-->
                                    <a class="list-group-item" href="#">
                                        <div class="media-box">
                                            <div class="pull-left">
                                                <em class="fa fa-envelope fa-2x text-warning"></em>
                                            </div>
                                            <div class="media-box-body clearfix">
                                                <p class="m0">New e-mails</p>
                                                <p class="m0 text-muted">
                                                    <small>You have 10 new emails</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- list item-->
                                    <a class="list-group-item" href="#">
                                        <div class="media-box">
                                            <div class="pull-left">
                                                <em class="fa fa-tasks fa-2x text-success"></em>
                                            </div>
                                            <div class="media-box-body clearfix">
                                                <p class="m0">Pending Tasks</p>
                                                <p class="m0 text-muted">
                                                    <small>11 pending task</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- last list item-->
                                    <a class="list-group-item" href="#">
                                        <small>More notifications</small>
                                        <span class="label label-danger pull-right">14</span>
                                    </a>
                                </div>
                                <!-- END list group-->
                            </li>
                        </ul>
                        <!-- END Dropdown menu-->
                    </li>
                    <!-- END Alert menu-->
                    <!-- START Offsidebar button-->
                    <li>
                        <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                            <em class="icon-notebook"></em>
                        </a>
                    </li>
                    <!-- END Offsidebar menu-->
                </ul>
                <!-- END Right Navbar-->
            </div>
            <!-- END Nav wrapper-->
            <!-- START Search form-->
            <form class="navbar-form" role="search" action="search.html">
                <div class="form-group has-feedback">
                    <input class="form-control" type="text" placeholder="Type and hit enter ...">
                    <div class="fa fa-times form-control-feedback" data-search-dismiss=""></div>
                </div>
                <button class="hidden btn btn-default" type="submit">Submit</button>
            </form>
            <!-- END Search form-->
        </nav>
        <!-- END Top Navbar-->
    </header>
    <!-- sidebar-->


    <aside class="aside">
        <!-- START Sidebar (left)-->
        <div class="aside-inner">
            <nav class="sidebar" data-sidebar-anyclick-close="">
                <!-- START sidebar nav-->
                <ul class="nav">
                    <!-- START user info-->
                    <li class="has-user-block">
                        <div class="collapse" id="user-block">
                            <div class="item user-block">
                                <!-- User picture-->
                                <div class="user-block-picture">
                                    <div class="user-block-status">
                                        <img class="img-thumbnail img-circle" src=" {{$auth['HinhAnh']}}  " alt="Avatar" width="60" height="60">
                                        {{--<img class="img-thumbnail img-circle" src=" {{$auth->getAvatar('100x100')}}  " alt="Avatar" width="60" height="60">--}}
                                        <div class="circle circle-success circle-lg"></div>
                                    </div>
                                </div>
                                <!-- Name and Job-->
                                <div class="user-block-info">
                                    <span class="user-block-name">Hello, {{$auth['Ten']}}</span>
                                   
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- END user info-->
                    <!-- Iterates over all sidebar items-->
                    <li class="nav-heading ">
                        <span data-localize="sidebar.heading.HEADER">Thương hiệu</span>
                    </li>
                    
                    <li class=" ">
                        <a href="#dashboard" title="Dashboard" data-toggle="collapse">
                            <div class="pull-right label label-info">3</div>
                            <em class="icon-speedometer"></em>
                            <span data-localize="sidebar.nav.DASHBOARD">Mục sản phẩm</span>
                        </a>
                        <ul class="nav sidebar-subnav collapse" id="dashboard">
                            <li class="sidebar-subnav-header">Dashboard</li>
                            @foreach($danhmuc_theloais as $theloai)
                            <li class=" ">
                                <a href="/admin/danhmuc/{{$theloai['Slug']}}/sanpham" title="Dashboard v1">
                                    <span>{{$theloai['Name']}}</span>
                                </a>
                            </li>
                            @endforeach
                            <li class=" ">
                                <a href="/admin/danhmuc" title="Dashboard v3">
                                    <span>Tất cả danh mục</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="/admin/danhmuc-create" title="Dashboard v3">
                                    <span>Thêm danh mục</span>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="nav-heading ">
                        <span data-localize="sidebar.heading.COMPONENTS">Khách hàng</span>
                    </li>
                    <li class=" ">
                        <a href="/admin/khachhang" title="Layouts" data-toggle="">
                            <em class="icon-layers"></em>
                            <span>Danh sách</span>
                        </a>
                        <a href="/admin/hoadon" title="Layouts" data-toggle="">
                            <em class="icon-layers"></em>
                            <span>Hóa đơn</span>
                        </a>
                    </li>



                    <li class="nav-heading ">
                        <span data-localize="sidebar.heading.COMPONENTS">Slides</span>
                    </li>
                    <li class=" ">
                        <a href="/admin/slides" title="Widgets">
                            <div class="pull-right label label-success">10</div>
                            <em class="icon-layers"></em>
                            <span data-localize="sidebar.nav.WIDGETS">Danh sách</span>
                        </a>
                    </li>


                </ul>
                <!-- END sidebar nav-->
            </nav>
        </div>
        <!-- END Sidebar (left)-->
    </aside>
    <!-- offsidebar-->



    <!-- Main section-->


    <section>
        <!-- Page content-->
        <div class="content-wrapper">
            @yield('content')

        </div>
    </section>
    <!-- Page footer-->

    <footer>
        <span>&copy; 2019 - Chuyên liêm CL</span>
    </footer>


</div>
<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="/vendor/modernizr/modernizr.custom.js"></script>
<!-- MATCHMEDIA POLYFILL-->
<script src="/vendor/matchMedia/matchMedia.js"></script>
<!-- JQUERY-->
<script src="/vendor/jquery/dist/jquery.js"></script>
<!-- BOOTSTRAP-->
<script src="/vendor/bootstrap/dist/js/bootstrap.js"></script>
<!-- STORAGE API-->
<script src="/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
<!-- JQUERY EASING-->
<script src="/vendor/jquery.easing/js/jquery.easing.js"></script>
<!-- ANIMO-->
<script src="/vendor/animo.js/animo.js"></script>
<!-- SLIMSCROLL-->
<script src="/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<!-- SCREENFULL-->
<script src="/vendor/screenfull/dist/screenfull.js"></script>
<!-- LOCALIZE-->
<script src="/vendor/jquery-localize-i18n/dist/jquery.localize.js"></script>
<!-- RTL demo-->
<script src="/js/demo/demo-rtl.js"></script>
<!-- =============== PAGE VENDOR SCRIPTS ===============-->
@yield('js')
<!-- =============== APP SCRIPTS ===============-->
<script src="/js/app.js"></script>



</body>

</html>