@extends('/front/template')
@section('title')
    Sản Phẩm
@stop
@section('css')
    <link rel="stylesheet" href="/front/bootstrap.spec.css">
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="/front/main.css">
@stop

@section('content')
    {{--@include('front.menu',['danhmuc_theloais'=>$danhmuc_theloais])--}}
    <div class="col-sm-12 padding-right">
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
                <div class="product-information"><!--/product-information-->
                    <img src="/images/product-details/new.jpg" class="newarrival" alt="" />
                    <h2>Anne Klein Sleeveless Colorblock Scuba</h2>
                    <p>Web ID: 1089772</p>
                    <img src="/images/product-details/rating.png" alt="" />
                    <span>
									<span>US $59</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                    <p><b>Availability:</b> In Stock</p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b> E-SHOPPER</p>
                    <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li><a href="#details" data-toggle="tab">Details</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                    <li><a href="#tag" data-toggle="tab">Tag</a></li>
                    <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="details" >
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

                <div class="tab-pane fade" id="companyprofile" >
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
                                    <img src="images/home/gallery4.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
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

                <div class="tab-pane fade active in" id="reviews" >
                    <div class="col-sm-12">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p><b>Write Your Review</b></p>

                        <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                            <textarea name="" ></textarea>
                            <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                            <button type="button" class="btn btn-default pull-right">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend1.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend2.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend3.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend1.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend2.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend3.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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





    <section class="form-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
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
                        <ol class="carousel-indicators justify-content-between">
                            @foreach($sanpham['Photos'] as $index=>$photo)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}" class="{{$index==0 ?'active':''}}">
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
                <div class="col-md-6">
                    <div class="info-product">
                        <div class="title-product">
                            <label>{{$sanpham['Name']}}</label>
                            <p><span>Mã sản phẩm:</span>{{$sanpham['Code']}}</p>
                        </div>
                        <div class="content-product">
                            <ol>
                                <li>
                                    {{--<p>Được làm từ hợp kim thép cứng caocấp chịu nhiệt, sáng bong,--}}
                                        {{--tránh gỉ sét, khó bị mài mòn vàbền bỉ với thời gian.--}}
                                        {{--Tay cầm được bọc lớp nhựa cao cấp. Thiết kế vừa tay tạo cảm giác--}}
                                        {{--thoải mái, chống trượt nên rất an toàn cho người sử dụng.--}}
                                        {{--Được gia công tỉ mỉ, chuẩn xác ghi điểm tuyệt đối trong mọi--}}
                                        {{--thao tác. Thiết kế nhỏ, gọn. Cấu trúc nhẹ, lâu bền và tiện--}}
                                        {{--lợi cho người sử dụng, dễ bảo quản. Đầu nam châm giúp người--}}
                                        {{--dùng dễ dàng điều kiển con ốc chính xác và hiệu quả.--}}
                                        {{--Thích hợp dùng trong gia đình--}}
                                    {{--</p>--}}
                                </li>
                                <li><span>Nhà sản xuất:</span> <p>Kingtony</p></li>
                                <li><span>Xuất sứ:</span> <p>Đài Loan</p></li>
                                <li><span>Bảo hành:</span><p> 12 Tháng</p></li>
                                <li><span>Nặng:</span> <p>3kg</p></li>
                                <li><span>Tình trạng:</span><p>còn  hàng</p></li>
                                <li><a href=""><img src="/img/icon/icon-fb.png" alt=""></a>
                                    <a href=""><img src="/img/icon/icon-gg.png" alt=""></a></li>
                            </ol>
                            <div class="price-product">
                                {{--<p >Giá sản phẩm: <span class="sale"> 245,000 VNĐ</span><span class="sale-100">-15%</span></p>--}}
                                <b>{{$sanpham['Amount']}} VNĐ</b>
                            </div>
                            <div class="add-quatity form-group">
                                <input type="number" class="form-control" value="1">
                                <button class="btn btn-danger btn-add-cart"><i class="fa fa-shopping-cart" style="margin-right: 10px"></i>Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="info-product">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="description-product">
                        <h4 class="text-uppercase">Mô tả sản phẩm</h4>
                        <p>
                            {!! $sanpham['Description'] !!}
                        </p>
                    </div>
                    <div class="description-product">
                        <h4 class="text-uppercase">Chính sách bảo hành</h4>
                        <span>1. Sản phẩm được bảo hành miễn phí nếu sản phẩm đó hội đủ các điều kiện sau:</span>
                        <p> Sản phẩm bị lỗi kỹ thuật do nhà sản xuất<br>
                            Còn trong thời hạn bảo hành<br>
                            Phiếu bảo hành phải còn nguyên vẹn, không chấp vá, bôi xóa, sửa chữa.<br>
                            Phiếu bảo hành đầy đủ thông tin: kiểu máy, số seri, ngày sản xuất, tên khách hàng sử dụng, địa chỉ, ngày mua (đối với các sản phẩm không áp dụng Bảo hành điện tử)<br>
                            Tem bảo hành (và tem niêm phong) của nhà sản xuất trên sản phẩm còn nguyên vẹn.<br>
                        </p><br>
                        <span>2. Những trường hợp không được bảo hành hoặc phát sinh phí bảo hành:</span>
                        <p> Vi phạm một trong những điều kiện bảo hành miễn phí ở mục 1.<br>
                            Số series, model sản phẩm không khớp với Phiếu bảo hành.<br>
                            Khách hàng tự ý can thiệp sửa chữa sản phẩm hoặc sửa chữa tại những trung tâm bảo hành không được sự ủy nhiệm của Hãng.<br>
                        </p><br>
                    </div>
                    <div class="product-other">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-uppercase">Sản phẩm khác</label>
                            </div>
                        </div>
                    </div>
                    <div class="product-show">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="product-show">
                                    <article>
                                        <div class="photo-overlay">
                                            <div class="photo-product ">
                                                <img src="img/product/product-1.jpg" alt="">
                                            </div>
                                            <div class="photo-product-overlay">
                                                <div class="background-overlay"></div>
                                                <div class="form-button">
                                                    <a href="product-detail.html" type="" class=" search-overlay"><i class="fa fa-search"></i></a>
                                                    <a href="" type="" class=" cart-overlay"><i class="fa fa-shopping-cart">.</i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="name-item text-center">
                                            <strong>Cờ lê hai đầu trông hệt mêt YATO
                                                YT-4840</strong>
                                        </div>
                                        <div class="price-item hotline-search text-center">
                                            <p>Giá sản phẩm:</p>
                                            <span class="">200,000VNĐ</span>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-show">
                                    <article>
                                        <div class="photo-overlay">
                                            <div class="photo-product ">
                                                <img src="img/product/product-1.jpg" alt="">
                                            </div>
                                            <div class="photo-product-overlay">
                                                <div class="background-overlay"></div>
                                                <div class="form-button">
                                                    <a href="" type="" class=" search-overlay"><i class="fa fa-search"></i></a>
                                                    <a href="" type="" class=" cart-overlay"><i class="fa fa-shopping-cart">.</i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="name-item text-center">
                                            <strong>Cờ lê hai đầu trông hệt mêt YATO
                                                YT-4840</strong>
                                        </div>
                                        <div class="price-item hotline-search text-center">
                                            <p>Giá sản phẩm:</p>
                                            <span class="">200,000VNĐ</span>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-show">
                                    <article>
                                        <div class="photo-overlay">
                                            <div class="photo-product ">
                                                <img src="img/product/product-1.jpg" alt="">
                                            </div>
                                            <div class="photo-product-overlay">
                                                <div class="background-overlay"></div>
                                                <div class="form-button">
                                                    <a href="" type="" class=" search-overlay"><i class="fa fa-search"></i></a>
                                                    <a href="" type="" class=" cart-overlay"><i class="fa fa-shopping-cart">.</i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="name-item text-center">
                                            <strong>Cờ lê hai đầu trông hệt mêt YATO
                                                YT-4840</strong>
                                        </div>
                                        <div class="price-item hotline-search text-center">
                                            <p>Giá sản phẩm:</p>
                                            <span class="">200,000VNĐ</span>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="comment-product input-form-contact">
                        <h4 class="text-uppercase">Bình luận</h4>
                        <textarea type="text" class="form-control" placeholder="Viết bình luận"></textarea>
                        <button class="btn btn-danger btn-contact">Gửi</button>
                        <div class="comment-small-item">
                            <figure class="photo-customer-2">
                                <div class="photo-customer-1 photo-customer-3 ">
                                    <img src="img/customer/kh-1.jpg" class="" alt="">
                                </div>
                                <figure class=" name-customer name-customer-swap comment-item">
                                    <p class="">Nguyễn Tuấn Hưng</p>
                                    <p class="date-comment">11/7/2016</p><br>
                                    <p>Hàng chính hãng, khoan khoẻ dụng cụ tiện lợi có điều thiếu 1 chiếc tô vít cơ để dùng các đầu vít trường hợp mất điện</p>
                                </figure>
                            </figure>
                        </div>
                        <div class="comment-small-item">
                            <figure class="photo-customer-2">
                                <div class="photo-customer-1 photo-customer-3 ">
                                    <img src="img/customer/kh-1.jpg" class="" alt="">
                                </div>
                                <figure class=" name-customer name-customer-swap comment-item">
                                    <p class="">Nguyễn Tuấn Hưng</p>
                                    <p class="date-comment">11/7/2016</p><br>
                                    <p>Hàng chính hãng, khoan khoẻ dụng cụ tiện lợi có điều thiếu 1 chiếc tô vít cơ để dùng các đầu vít trường hợp mất điện</p>
                                </figure>
                            </figure>
                        </div>
                        <div class="comment-small-item">
                            <figure class="photo-customer-2">
                                <div class="photo-customer-1 photo-customer-3 ">
                                    <img src="img/customer/kh-1.jpg" class="" alt="">
                                </div>
                                <figure class=" name-customer name-customer-swap comment-item">
                                    <p class="">Nguyễn Tuấn Hưng</p>
                                    <p class="date-comment">11/7/2016</p><br>
                                    <p>Hàng chính hãng, khoan khoẻ dụng cụ tiện lợi có điều thiếu 1 chiếc tô vít cơ để dùng các đầu vít trường hợp mất điện</p>
                                </figure>
                            </figure>
                        </div>
                        <div class="comment-small-item">
                            <figure class="photo-customer-2">
                                <div class="photo-customer-1 photo-customer-3 ">
                                    <img src="img/customer/kh-1.jpg" class="" alt="">
                                </div>
                                <figure class=" name-customer name-customer-swap comment-item">
                                    <p class="">Nguyễn Tuấn Hưng</p>
                                    <p class="date-comment">11/7/2016</p><br>
                                    <p>Hàng chính hãng, khoan khoẻ dụng cụ tiện lợi có điều thiếu 1 chiếc tô vít cơ để dùng các đầu vít trường hợp mất điện</p>
                                </figure>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('js')
    <script type="text/javascript" src="/front/spec.js"></script>
@stop