<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Danh Mục</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach($danhmuc_theloais as $theloai)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="/theloai/{{$theloai['Slug']}}/sanpham">{{$theloai['Name']}}</a></h4>
                    </div>
                </div>
            @endforeach
        </div><!--/category-products-->

        <div class="shipping text-center"><!--shipping-->
            <img src="/front/images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->

    </div>
</div>