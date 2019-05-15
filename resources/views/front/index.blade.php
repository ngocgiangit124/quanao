@extends('/front/template')
@section('title')
    Quần Áo
@stop
@section('css')

@stop
@section('slide')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($slides as $index=>$slide)
                                <li data-target="#slider-carousel" data-slide-to="{{$index}}" class="{{$index==0?"active":""}}"></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            @foreach($slides as $index=>$slide)
                                <div class="item {{$index==0?"active":""}}" style="padding: 0">
                                    <div class="col-sm-12">
                                        <img style="width: 100%;height:441px;object-fit: cover " src="{{$slide['Photos']['Large']}}" class="girl img-responsive" alt="" />
                                    </div>
                                </div>
                            @endforeach
                            {{--<div class="item">--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<h1><span>E</span>-SHOPPER</h1>--}}
                            {{--<h2>100% Responsive Design</h2>--}}
                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>--}}
                            {{--<button type="button" class="btn btn-default get">Get it now</button>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />--}}
                            {{--<img src="images/home/pricing.png"  class="pricing" alt="" />--}}
                            {{--</div>--}}
                            {{--</div>--}}


                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->
    @stop
@section('content')
    @include('front.menu',['danhmuc_theloais'=>$danhmuc_theloais])
    <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($sanphamNews as $sanphamNew)
                            <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="/sanphams/{{$sanphamNew['Slug']}}">
                                            <img style="object-fit: cover;height: 250px;" src="{{$sanphamNew['Photo']['Medium']}}" alt="" /></a>
                                        <h2>{{$sanphamNew['Price']}}VND</h2>
                                        <p>{{$sanphamNew['Name']}}</p>
                                        <a href="javascript:" class="btn btn-default add-to-cart add-cart" data-id="{{$sanphamNew['Id']}}"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        {{--<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div><!--features_items-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    @foreach($sanphamRandom as $index=>$sanpham)
                                        @if($index == 3)
                                        </div>
                                        <div class="item">
                                    @endif
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img style="height: 200px;object-fit: cover" src="{{$sanpham['Photo']['Medium']}}" alt="" />
                                                        <h2>{{$sanpham['Price']}}</h2>
                                                        <p>{{$sanpham['Name']}}</p>
                                                        <a href="javascript:" class="btn btn-default add-to-cart add-cart" data-id="{{$sanpham['Id']}}"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

                </div>
@stop
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#product').change(function () {
                console.log($('#product').val());
//                ??
            });
        });

    </script>
@stop