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
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="">Sản Phẩm</td>
                        <td class=""></td>
                        <td class="">Giá</td>
                        <td class="">Số lượng</td>
                        <td class="">Thành tiền</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach($show_cart as $show)--}}
                        {{--<tr>--}}
                            {{--<td class="">--}}
                                {{--<a href="javascript:"><img src="{{$show['Product']['Photo']['Small']}}" alt=""></a>--}}
                            {{--</td>--}}
                            {{--<td class="">--}}
                                {{--<h4><a href="">{{$show['Product']['Name']}}</a></h4>--}}
                                {{--<p>Web ID: {{$show['Product']['Code']}}</p>--}}
                            {{--</td>--}}
                            {{--<td class="">--}}
                                {{--<p>{{$show['Product']['Price']}} VND</p>--}}
                            {{--</td>--}}
                            {{--<td class="">--}}
                                {{--<div class="cart_quantity_button">--}}
                                    {{--<a class="cart_quantity_up" data-id="{{$show['Id']}}" data-check="1" href="javascript:"> + </a>--}}
                                    {{--<input readonly style="width: 50px" class="cart_quantity_input" id="input-{{$show['Id']}}" type="number" min="1" name="quantity" value="{{$show['Amount']}}" autocomplete="off" size="2">--}}
                                    {{--<a class="cart_quantity_down" data-id="{{$show['Id']}}" data-check="0" href="javascript:"> - </a>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                            {{--<td class="">--}}
                                {{--<p class="cart_total_price">{{$show['Price']}} VND</p>--}}
                            {{--</td>--}}
                            {{--<td class="">--}}
                                {{--<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
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
        $(document).ready(function () {
            $('.cart_quantity_up,.cart_quantity_down').click(function () {
                var id =  $(this).attr('data-id');
                var check =  $(this).attr('data-check');
                var url = '';
                if(check == '1') {
                    url = '/edit-cart' + '?id='+id+'&check=1';
                } else {
                    url = '/edit-cart' + '?id='+id+'&check=0';
                }

                $.ajax({
                    type: "GET",
                    url: url,
                    data: {},
                }).done(function (res) {
                    console.log(res);
                    if(res.status == 200 && res.data == 1) {
                        var v = $('#input-'+id).val();
                        var a = parseInt(v)+1;
                        $('#input-'+id).val(a);
                    }
                    if(res.status == 200 && res.data == 0) {
                        var v1 = $('#input-'+id).val();
                        var a1 = parseInt(v1)-1;
                        $('#input-'+id).val(a1);
                    }
                    else {
                        console.log('xx');
                    }

                });
            });
        });
    </script>
@stop