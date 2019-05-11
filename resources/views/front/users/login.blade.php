@extends('/front/template')
@section('title')
    Danh mục sản phẩm
@stop
@section('css')
    <style>
        .login-buy {
            width: 60%;
        }
    </style>
@stop
@section('content')
    <section class="cart-main" style="padding-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-login-buy">
                        <b style="margin: auto">Đăng nhập </b>
                        <div class="login-buy">
                            <form action="/login" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <input type="email" name="Email" class="form-control" required placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="Password" class="form-control" required placeholder="Mật khẩu">
                                    <a href="" class="forget" style="margin-left: auto">Quên mật khẩu</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-add-cart text-uppercase">Tiếp tục</button>
                                </div>
                                <div class="form-group">
                                    <p class="text-center">Hoặc</p>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i>face book</a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus "></i>face book</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-login-buy">
                        <b>Đăng ký tài khoản</b>
                        <div class="login-buy">
                            <form action="/registration" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <input type="text" name="Name" class="form-control" required placeholder="Họ và Tên">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="Email" class="form-control" required placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="Phone" class="form-control" required placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Address" class="form-control" required placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-add-cart text-uppercase">Tiếp tục</button>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="Password" class="form-control" required placeholder="Mật khẩu">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="PasswordAgain" class="form-control" required placeholder="Mật khẩu lần 2">
                                </div>
                                <div class="form-group">
                                    <p class="text-center">Hoặc</p>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i>face book</a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus "></i>face book</a>
                                </div>
                            </form>

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