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
    </style>
   
@stop

@section('content')
    {{--@include('front.menu',['danhmuc_theloais'=>$danhmuc_theloais])--}}
    <div class="col-sm-9" style="margin: 0;">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    @foreach($sanpham['Photos'] as $index=>$photo)
                        @if($index == 0)
                            <img id="img-main-spec" src="{{$photo['Photos']['Large']}}" alt="" />
                        @endif
                    @endforeach
                    {{--<h3>ZOOM</h3>--}}
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($sanpham['Photos'] as $index=>$photo)
                                @if($index == 3)
                        </div>
                        <div class="item">
                                @endif
                                    <a href="javascript:" class="img-spec" data-src="{{$photo['Photos']['Large']}}"><img style="width: 84px;height: 84px" src="{{$photo['Photos']['Large']}}" alt=""></a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    {{--<img src="/images/product-details/new.jpg" class="newarrival" alt="" />--}}
                    <h2>{{$sanpham['Name']}}</h2>
                    <p> ID: {{$sanpham['Code']}}</p>
                    {{--<img src="/images/product-details/rating.png" alt="" />--}}
                    <span style="width: 100%;">
                        <span style="width: 100%">{{$sanpham['Price']}} VND</span><br>
                        <p><label>Số Lượng:</label>
                        <input type="number" style="width: 60px;" value="0" min="0" max="{{$sanpham['QualityAgain']}}" class="data-qty" />
                        <button type="button" class="btn btn-fefault cart" data-id="{{$sanpham['Id']}}">
                            <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng
                        </button>
                        </p>
                    </span>
                    <p><b>Thương hiệu:</b>{{$sanpham['TheLoai']}}</p>
                    <p><b>Số lượng:</b> {{$sanpham['QualityAgain']}}</p>
                    <p><b>Web:</b> E-SHOPPER</p>
                    <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->


        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-id="details" class="tag" data-toggle="tab">Chi Tiết</a></li>
                    <li ><a href="#companyprofile" data-id="companyprofile" class="tag" data-toggle="tab">Sản phẩm dùng loại</a></li>
                    <li ><a href="#reviews" data-id="reviews" class="tag" data-toggle="tab">Bình Luận (5)</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details" >
                    {!! $sanpham['Description'] !!}
                </div>

                <div class="tab-pane fade" id="companyprofile" >
                    @foreach($sanpham['SameProduct'] as $san)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{$san['Photo']['Medium']}}" alt="" />
                                        <h2>{{$san['Price']}}</h2>
                                        <p>{{$san['Name']}}</p>
                                        <button type="button" class="btn btn-default add-to-cart add-cart" data-id="{{$san['Id']}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="tab-pane fade " id="reviews" >
                    <div class="col-sm-12">
                        @foreach($sanpham['Comments'] as $cm)
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>{{$cm['UserName']}}</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>{{$cm['Created_at']}}</a></li>
                            {{--<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>--}}
                        </ul>
                        <p>{!! $cm['Comment'] !!}</p>
                            <hr>
                        @endforeach
                        <form action="/comments" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="Id" value="{{$auth?$auth->Id:''}}" />
                            <input type="hidden" name="ProductId" value="{{$sanpham['Id']}}" />
                            <span>
                                <input type="text" name="Name" placeholder="Your Name"/>
                                <input type="email" name="Email" placeholder="Email Address"/>
                            </span>
                            <textarea name="Comment"></textarea>
                            <button type="submit" class="btn btn-default pull-right">Submit</button>
                        </form>
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
    <script src="/front/js/price-range.js"></script>
    <script src="/front/js/jquery.scrollUp.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>
    <script src="/front/js/jquery.prettyPhoto.js"></script>
    <script src="/front/js/main.js"></script>
    {{--<script type="text/javascript" src="/front/spec.js"></script>--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('.img-spec').click(function () {
                var src = $(this).attr('data-src');
                $('#img-main-spec').attr('src',src);
                console.log('oke');
            });
            $('.tag').click(function () {
               var id = $(this).attr('data-id');
               $('.tag').parent().removeClass('active');
               $('.tab-pane').removeClass('active');
                $('.tab-pane').removeClass('in');

               $(this).parent().addClass('active');
                $('#'+id).addClass('active');
                $('#'+id).addClass('in');
            });
        });
    </script>
      <script type="text/javascript">
        $(document).ready(function () {
            $('.cart').click(function () {
                var id =  $(this).attr('data-id');
                var qty =  $('.data-qty').val();
                var url = '/edit-cart' + '?id='+id+'&amount='+qty;
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {},
                }).done(function (res) {
                    console.log(res);
                    alert('Bạn đã thêm thành công giỏ hàng');
                    $('#amount-spec').css('display','block');
                    $('#amount-spec').empty();
                    $('#amount-spec').html(res.total);

                });
            });
            $('.data-qty').change(function () {
               var value = $('.data-qty').val();
                var max = $('.data-qty').attr('max');
                console.log(value,max);
               if(parseInt(value)>parseInt(max)) {
                   $('.data-qty').val(max);
               }
            });
        });
    </script>

@stop