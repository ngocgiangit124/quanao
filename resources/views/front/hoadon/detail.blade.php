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
    {{--@include('front.menu',['danhmuc_theloais'=>$danhmuc_theloais])--}}
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Hóa đơn</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed" >
                    <thead >
                    <tr >
                        <th style="width:5%;text-align: center">Id</th>
                        <th style="width:20%;text-align: center">Tên sản phẩm</th>
                        <th style="width:20%;text-align: center">Hình ảnh</th>
                        <th style="width:20%;text-align: center">Số lượng mua</th>
                        <th style="width:20%;text-align: center">Tổng Tiền</th>
                        <th style="width:20%;text-align: center">Thời gian</th>
                        {{--<th style="width:5%;">Action</th>--}}
                    </tr>
                    </thead>
                    <tbody style="text-align: center">
                    @foreach($chitiets as $chitiet)
                        <tr class="gradeX" id="{{$chitiet['Id']}}">
                            <td>{{$chitiet['Id']}}</td>
                            <td>{{$chitiet['Name']}}</td>
                            <td><img style="max-height: 100px;object-fit: cover" src="{{$chitiet['Photo']['Small']}}" alt=""></td>
                            <td>{{$chitiet['Amount']}}</td>
                            <td>{{$chitiet['Total']}}</td>
                            <td>{{$chitiet['Created_at']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->


@stop
@section('js')
    <script src="/front/js/price-range.js"></script>
    <script src="/front/js/jquery.scrollUp.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>
    <script src="/front/js/jquery.prettyPhoto.js"></script>
    <script src="/front/js/main.js"></script>
    {{--<script type="text/javascript" src="/front/spec.js"></script>--}}
    <script type="text/javascript">
    </script>
@stop