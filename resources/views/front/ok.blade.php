@extends('/front/template')
@section('title')
    Sản Phẩm
@stop
@section('css')
    <link href="/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="/front/css/prettyPhoto.css" rel="stylesheet">
    <link href="/front/css/price-range.css" rel="stylesheet">
    <link href="/front/css/animate.css" rel="stylesheet">
    <link href="/front/css/main.css" rel="stylesheet">
    <link href="/front/css/responsive.css" rel="stylesheet">
    <style>
        .brands-name .nav-stacked li a {
            text-transform: none;
            padding: 5px 10px;
        }
        .user_info .single_field {
            width: 100%;
        }
    </style>

@stop

@section('content')

    <section id="do_action">
        <div class="container">
            <div class="heading" style="text-align: center">
                <h3>Bạn đã mua hàng thành công!</h3>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="total_area" style="text-align: center">
                        <a class="btn btn-default update" href="/">Về trang chủ</a>
                        {{--<a class="btn btn-default check_out" href=""></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->


@stop
@section('js')
    <script src="/front/js/price-range.js"></script>
    <script src="/front/js/jquery.scrollUp.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>
    <script src="/front/js/jquery.prettyPhoto.js"></script>
    <script src="/front/js/main.js"></script>
    {{--<script type="text/javascript" src="/front/spec.js"></script>--}}
@stop