@extends('/front/template')
@section('title')
    Danh mục sản phẩm
@stop
@section('css')
@stop

@section('content')
    <section class="bandner fix-all">
        <div class="bandner-wellcome" style="   ">
            <img src="/img/bands/banner-product.png" alt="">
        </div>
        <div class="page-title">
            <h2 class="text-uppercase text-center">Sản phẩm</h2>
        </div>
        <!--background-image: url(img/bands/bandner-about.jpg);-->
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 0;padding-top: 10px">
                    <div class="menu-about">
                        <ul class="breadcrumb">
                            <li><a href="">  <i class="fa fa-home" style="color: #E2851B;" ></i></a></li>
                            <li><a href="">Danh sách sản phẩm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="form-product">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-all">
                        <div class="menu-product">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                               Danh mục
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <ul class="list-group">
                                            @foreach($danhmuc_theloais as $danhmuc_theloai)
                                                <li class="list-group-item"><a href="/theloai/{{$danhmuc_theloai['Slug']}}/sanpham">{{$danhmuc_theloai['Name']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--price-range-->
                    <!--/price-range-->
                    <div class="photo-pa pa-product">
                        <img src="/img/bands/pa-pr-1.jpg" alt="">
                    </div>
                    <div class="photo-pa pa-product">
                        <img src="/img/bands/pa-pr-2.jpg" alt="">
                    </div>
                    <div class="photo-pa pa-product">
                        <img src="/img/bands/pa-pr-2.jpg" alt="">
                    </div>
                    <div class="photo-pa pa-product">
                        <img src="/img/bands/pa-pr-5.jpg" alt="">
                    </div>
                    <div class="photo-pa pa-product">
                        <img src="/img/bands/pa-pr-4.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="select-product">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="intro-product" style="margin-bottom: 10px">
                                    <p style="margin: 0">Sản Phẩm</p>
                                    <p style="margin: 0">{{$paginate['total']}}<span></span> sản phẩm</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="option-product">
                                    {{--<select name="" id="" class="form-control">--}}
                                        {{--<option value="1" selected>Sản phẩm bán chạy nhất</option>--}}
                                        {{--<option value="">1</option>--}}
                                        {{--<option value="">1</option>--}}
                                    {{--</select>--}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="option-product">
                                    <select name="" id="product" class="form-control">
                                        <option value="new" selected>Sản phẩm mới nhất</option>
                                        <option value="sale">Sản phẩm bán chạy nhất</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-show">
                        <div class="row">
                            @foreach($sanphams as $sanpham)
                                <div class="col-md-4">
                                    <div class="product-show">
                                        <article>
                                            <div class="photo-overlay">
                                                <div class="photo-product ">
                                                    <img src="{{$sanpham['Photo']['Medium']}}" alt="">
                                                </div>
                                                <div class="photo-product-overlay">
                                                    <div class="background-overlay"></div>
                                                    <div class="form-button">
                                                        <a href="/sanphams/{{$sanpham['Slug']}}" type="" class=" search-overlay"><i class="fa fa-search"></i></a>
                                                        <a href="javascript:" type="" class=" cart-overlay"><i class="fa fa-shopping-cart">.</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="name-item text-center">
                                                <strong>{{$sanpham['Name']}}</strong>
                                            </div>
                                            <div class="price-item hotline-search text-center">
                                                <p>Giá sản phẩm:</p>
                                                <span class="">{{$sanpham['Amount']}}VNĐ</span>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                <div class="text-center pagination-wrap">
                                    <ul class="pagination ">
                                        <li><a href="{{$paginate['first_page_url']}}">Trang đầu</a></li>
                                        <li><a href="{{$paginate['prev_page_url']}}"><i class="fa fa-angle-left"></i></a></li>
                                        @for($i=1 ; $i<=$paginate['last_page'];$i++)
                                        <li class="{{$i==$paginate['from']?'active':''}}"><a href="{{$i!=$paginate['from'] ? $paginate['path'].'?'.'page='.$i : 'javascript:'}}">{{$i}}</a></li>
                                        @endfor
                                        <li><a href="{{$paginate['next_page_url']}}"><i class="fa fa-angle-right"></i></a></li>
                                        <li><a href="">Trang cuối</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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