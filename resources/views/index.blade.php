@extends('/template')
@section('title')
    Sản Phẩm
@stop
@section('css')
    <style>
        .d-flex {
            display: -ms-flexbox!important;
            display: flex!important;
        }
        .justify-content-between {
            -ms-flex-pack: justify!important;
            justify-content: space-between!important;
        }
    </style>
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- DATATABLES-->
    <link rel="stylesheet" href="/vendor/datatables-colvis/css/dataTables.colVis.css">
    <link rel="stylesheet" href="/vendor/datatables/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="/vendor/dataTables.fontAwesome/index.css">
@stop

@section('content')

<section>
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="content-heading">
            <!-- START Language list-->

            <div class="pull-right">
                <div class="btn-group">
                    <button class="btn btn-default" type="button" data-toggle="dropdown">{{$doanhthu['chon']['time']}}</button>
                    <ul class="dropdown-menu dropdown-menu-right animated fadeInUpShort" role="menu">
                        <li><a href="/admin">Tất cả</a>
                        <li><a href="/admin?time=1">Hôm nay</a>
                        </li>
                        <li><a href="/admin?time=7">7 ngày trước</a>
                        </li>
                        <li><a href="/admin?time=14">14 ngày trước</a>
                        </li>
                        <li><a href="javascript:">tùy chỉnh</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="pull-right" style="margin-right: 100px">
                <div class="btn-group">
                    <span class="text-uppercase" style="font-size: 16px" for="">đầu tiên</span>
                    <input type="date" value="{{$doanhthu['chon']['time_f']}}" class="time-spec time-f" style="height: 35px;width: 210px;border-radius: 10px">
                </div>
                <div class="btn-group">
                    <span class="text-uppercase" style="font-size: 16px" for="">kết thúc</span>
                    <input type="date"  value="{{$doanhthu['chon']['time_e']}}" class="time-spec time-e" style="height: 35px;width: 210px;border-radius: 10px">
                </div>
                <div class="btn-group">
                    <a href="/admin" class="customer btn btn-default" type="button" >Cập nhật</a>
                </div>
            </div>
            <!-- END Language list-->Dashboard
            <small data-localize="dashboard.WELCOME"></small>
        </div>
        <!-- START widgets box-->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- START date widget-->
                <div class="panel widget">
                    <div class="row row-table">
                        <div class="col-xs-4 text-center bg-green pv-lg">
                            <!-- See formats: https://docs.angularjs.org/api/ng/filter/date-->
                            <div class="text-sm" data-now="" data-format="MMMM"></div>
                            <br>
                            <div class="h2 mt0" data-now="" data-format="D"></div>
                        </div>
                        <div class="col-xs-8 pv-lg">
                            <div class="text-uppercase" data-now="" data-format="dddd"></div>
                            <br>
                            <div class="h2 mt0" data-now="" data-format="h:mm"></div>
                            <div class="text-muted text-sm" data-now="" data-format="a"></div>
                        </div>
                    </div>
                </div>
                <!-- END date widget-->
            </div>
            <div class="col-lg-3 col-sm-6">
                <!-- START widget-->
                <div class="panel widget bg-primary">
                    <div class="row row-table">
                        <div class="col-xs-4 text-center bg-primary-dark pv-lg">
                            <em class="icon-cloud-upload fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                            <div class="h2 mt0">{{$doanhthu['tongsanpham']}}</div>
                            <small style="font-size: 16px"> </small>
                            <div class="text-uppercase" style="font-size: 14px">số lượng(sp)</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <!-- START widget-->
                <div class="panel widget bg-purple">
                    <div class="row row-table">
                        <div class="col-xs-4 text-center bg-purple-dark pv-lg">
                            <em class="icon-globe fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                            <div class="h2 mt0">{{$doanhthu['sanpham']}}
                                <small style="font-size: 16px"> </small>
                            </div>
                            <div class="text-uppercase" style="font-size: 14px">Sản phẩm(thể loại)</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- START widget-->
                <div class="panel widget bg-green">
                    <div class="row row-table">
                        <div class="col-xs-4 text-center bg-green-dark pv-lg">
                            <em class="icon-bubbles fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                            <div class="h2 mt0">{{$doanhthu['tongdanhgia']}}
                                <small style="font-size: 16px">lượt </small>
                            </div>
                            <div class="text-uppercase">Đánh giá (tất cả)</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <!-- START widget-->
                <div class="panel widget bg-primary">
                    <div class="row row-table">
                        <div class="col-xs-4 text-center bg-primary-dark pv-lg">
                            <em class="icon-basket fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                            <div class="h2 mt0">{{$doanhthu['tongluongBan']}}</div>
                            <div class="text-uppercase">Sản phẩm(đã bán)</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <!-- START widget-->
                <div class="panel widget bg-purple">
                    <div class="row row-table">
                        <div class="col-xs-4 text-center bg-purple-dark pv-lg">
                            <em class="icon-basket-loaded fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                            <div class="h2 mt0" style="font-size: 24px">{{$doanhthu['tongtien']}}
                                {{--<small style="font-size: 14px">vnd </small>--}}
                            </div>
                            <div class="text-uppercase" style="">Doanh thu(vnd)</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- START widget-->
                <div class="panel widget bg-green">
                    <div class="row row-table">
                        <div class="col-xs-4 text-center bg-green-dark pv-lg">
                            <em class="icon-list fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                            <div class="h2 mt0">{{$doanhthu['tonghoadon']}}
                                <small style="font-size: 16px">hóa đơn </small>
                            </div>
                            <div class="text-uppercase">Hóa đơn xuất</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- START widget-->
                <div class="panel widget bg-green">
                    <div class="row row-table">
                        <div class="col-xs-4 text-center bg-green-dark pv-lg">
                            <em class="icon-people fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                            <div class="h2 mt0">{{$doanhthu['tongkhachhang']}}
                                <small style="font-size: 16px">khách hàng </small>
                            </div>
                            <div class="text-uppercase">Mới</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- END widgets box-->
        <div class="row">
            <!-- START dashboard main content-->
            <div class="col-lg-12">
                <!-- START chart-->
                <!-- END chart-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-right label label-success">10</div>
                                <div class="panel-title">Đánh giá gần đây!</div>
                            </div>
                            <!-- START list group-->
                            <div class="list-group" data-height="180" data-scrollable="">
                                <!-- START list group item-->
                                @foreach($binhluans as $binhluan)
                                <a class="list-group-item" href="#">
                                    <div class="media-box">
                                        {{--<div class="pull-left">--}}
                                            {{--<img class="media-box-object img-circle thumb32" src="img/user/02.jpg" alt="Image">--}}
                                        {{--</div>--}}
                                        <div class="media-box-body clearfix">
                                            <small class="pull-right">{{$binhluan['Created_at']}}</small>
                                            <strong class="media-box-heading text-primary">
                                                <span class="circle circle-success circle-lg text-left"></span>{{$binhluan['UserName']}}</strong>
                                            <p class="mb-sm">
                                                <small>{{$binhluan['Comment']}}</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                                <!-- END list group item-->
                                <!-- START list group item-->
                            </div>
                            <!-- END list group-->
                            <!-- START panel footer-->

                            <!-- END panel-footer-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END dashboard main content-->
            <!-- START dashboard sidebar-->
            <!-- END dashboard sidebar-->
        </div>
    </div>
</section>
    @stop
@section('js')
    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <!-- DATATABLES-->
    <script src="/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables-colvis/js/dataTables.colVis.js"></script>
    <script src="/vendor/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="/vendor/datatables-buttons/js/dataTables.buttons.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.bootstrap.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.colVis.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.flash.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.html5.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.print.js"></script>
    <script src="/vendor/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="/vendor/datatables-responsive/js/responsive.bootstrap.js"></script>
    <script src="/js/demo/demo-datatable.js"></script>

    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <!-- SPARKLINE-->
    <script src="/vendor/sparkline/index.js"></script>
    <!-- FLOT CHA-->
    <script src="/vendor/flot/jquery.flot.js"></script>
    <script src="/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="/vendor/flot/jquery.flot.resize.js"></script>
    <script src="/vendor/flot/jquery.flot.pie.js"></script>
    <script src="/vendor/flot/jquery.flot.time.js"></script>
    <script src="/vendor/flot/jquery.flot.categories.js"></script>
    <script src="/vendor/flot-spline/js/jquery.flot.spline.min.js"></script>
    <!-- EASY PIEHART-->
    <script src="/vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>
    <!-- MOMENT J-->
    <script src="/vendor/moment/min/moment-with-locales.min.js"></script>
    <!-- DEMO-->
    <script src="/js/demo/demo-flot.js"></script>
    <!-- ========/======= APP SCRIPTS ===============-->
    <script src="/js/app.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
           $('.time-spec').change(function () {
               var a = $('.time-f').val();
               var b = $('.time-e').val();
               var url = '/admin?time_f='+a+'&time_e='+b;
               $('.customer').removeAttr('href');
               $('.customer').attr('href',url);
           }) ;
        });
    </script>
@stop