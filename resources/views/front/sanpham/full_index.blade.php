@extends('/front/template')
@section('title')
    Danh mục sản phẩm
@stop
@section('css')
@stop
@section('content')
    {{--@include('front.menu',['danhmuc_theloais'=>$danhmuc_theloais])--}}
    <div class="col-sm-12 ">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Sản phẩm</h2>
            @foreach($sanphams as $sanpham)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">

                                <a href="/sanphams/{{$sanpham['Slug']}}"><img style="width: 100%;height:250px;object-fit: cover " src="{{$sanpham['Photo']['Medium']}}" alt="" /></a>
                                <h2>{{$sanpham['Price']}}VNĐ</h2>
                                <p>{{$sanpham['Name']}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
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
        </div><!--features_items-->
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