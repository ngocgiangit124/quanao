@extends('/front/template')
@section('title')
    Danh mục sản phẩm
@stop
@section('css')
@stop
@section('content')
    <section class="bandner fix-all">
        <div class="bandner-wellcome" style="height:420px" >
            <img style="height: 420px; width: auto" src="img/bands/background-brand.png" alt="">
        </div>
        <div class="page-title">
            <h2 class="text-uppercase text-center"><img src="img/logo/brand.png" alt=""></h2>
        </div>
        <!--background-image: url(img/bands/bandner-about.jpg);-->
    </section>
    <section class="form-brand">
        <div class="container background-around">
            <div class="row">
                <div class="col-md-12">
                    <div class="select-product">
                        <div class="row">
                        </div>
                    </div>
                    <div class="product-show">
                        <div class="row">
                            @foreach($sanphams as $sanpham)
                                <div class="col-md-3">
                                    <div class="product-show">
                                        <article>
                                            <div class="photo-overlay" style="border: 2px solid #ffffff">
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