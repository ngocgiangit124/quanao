@extends('/front/template')
@section('title')
    Sản Phẩm
@stop
@section('css')
    <style>
        .brands-name .nav-stacked li a {
            text-transform: none;
            padding: 5px 10px;
        }
    </style>
   
@stop

@section('content')
    {{--@include('front.menu',['danhmuc_theloais'=>$danhmuc_theloais])--}}
    <div class="col-sm-9" style="margin: 0;">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sanpham['Photos'] as $index=>$photo)
                            <div class="carousel-item {{$index==0?'active':''}}">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 fix-padding-of-col">
                                        <img class="d-block w-100" style="max-height: 420px;object-fit: cover;" src="{{$photo['Photos']['Large']}}" alt="Second slide">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <ol class="carousel-indicators justify-content-between" style="width: 100%">
                        @foreach($sanpham['Photos'] as $index=>$photo)
                            <li data-target="#carouselExampleIndicators" style="width: 31%;height: 100%;max-height: 130px;margin: 0 2px" data-slide-to="{{$index}}" class="{{$index==0 ?'active':''}}">
                                <img class="d-block w-100" style="max-height: 130px;object-fit: cover;" src="{{$photo['Photos']['Small']}}" alt="First slide">
                            </li>
                        @endforeach
                    </ol>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    {{--<img src="/images/product-details/new.jpg" class="newarrival" alt="" />--}}
                    <h2>{{$sanpham['Name']}}</h2>
                    <p> ID: {{$sanpham['Code']}}</p>
                    {{--<img src="/images/product-details/rating.png" alt="" />--}}
                    <span>
                        <span style="width: 100%">{{$sanpham['Price']}} VND</span><br>
                        <p><label>Quantity:</label>
                        <input type="number" value="3" />
                        <button type="button" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>Add to cart
                        </button>
                        </p>
                    </span>
                    <p><b>Thương hiệu:</b>{{$sanpham['TheLoai']}}</p>
                    <p><b>Số lượng:</b> {{$sanpham['Amount']}}</p>
                    <p><b>Web:</b> E-SHOPPER</p>
                    <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                    <li><a href="#tag" data-toggle="tab">Tag</a></li>
                    <li ><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details" >
                    @foreach($sanpham['SameProduct'] as $san)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{$san['Photo']['Medium']}}" alt="" />
                                    <h2>{{$san['Price']}}</h2>
                                    <p>{{$san['Name']}}</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="tab-pane fade" id="companyprofile" >

                </div>

                <div class="tab-pane fade" id="tag" >
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery1.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery2.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery3.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery4.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade " id="reviews" >
                    <div class="col-sm-12">
                        {!! $sanpham['Description'] !!}
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->

    </div>
    <div class="col-sm-3" style="padding: 0">
        <div class="brands_products"><!--brands_products-->
            <h2>Thông số kỹ thuật</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href=""> <span class="pull-right">{{$sanpham['ManHinh']}}</span>Màn hình:</a></li>
                    <li><a href=""> <span class="pull-right">{{$sanpham['CameraTruoc']}}</span>Camera trước:</a></li>
                    <li><a href=""> <span class="pull-right">{{$sanpham['CameraSau']}}</span>Camera sau:</a></li>
                    <li><a href=""> <span class="pull-right">{{$sanpham['Ram']}}</span>Ram:</a></li>
                    <li><a href=""> <span class="pull-right">{{$sanpham['Rom']}}</span>Rom:</a></li>
                    <li><a href=""> <span class="pull-right">{{$sanpham['CPU']}}</span>CPU:</a></li>
                    <li><a href=""> <span class="pull-right">{{$sanpham['GPU']}}</span>GPU:</a></li>
                    <li><a href=""> <span class="pull-right">{{$sanpham['Pin']}}</span>Pin:</a></li>
                    <li><a href=""> <span class="pull-right">{{$sanpham['GPU']}}</span>Hệ điều hành:</a></li>
                    <li><a href=""> <span class="pull-right">{{$sanpham['Sim']}}</span>Sim:</a></li>
                </ul>
            </div>
        </div>
    </div>


@stop
@section('js')
    <script type="text/javascript" src="/front/spec.js"></script>
@stop