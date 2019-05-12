@extends('/template')
@section('title')
    Sản Phẩm
@stop
@section('css')
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- DATATABLES-->
    <link rel="stylesheet" href="/vendor/datatables-colvis/css/dataTables.colVis.css">
    <link rel="stylesheet" href="/vendor/datatables/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="/vendor/dataTables.fontAwesome/index.css">
    {{--<link rel="stylesheet" href="/css/bootstrap.min.css?v=1.00">--}}
    <!-- SWEET ALERT-->
    <link rel="stylesheet" href="/vendor/sweetalert/dist/sweetalert.css">
    <style>
        .d-flex {
            display: -webkit-box!important;
            display: -ms-flexbox!important;
            display: flex!important;
        }
        .flex-wrap {
            -ms-flex-wrap: wrap!important;
            flex-wrap: wrap!important;
        }
    </style>
@stop

@section('content')
    <h3>Thể Loại
        <small>??</small>
    </h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="/admin/sanpham/{{$sanpham['Id']}}/update" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- START panel-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Update San Pham</div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Tên</label>
                                <input class="form-control" type="text" name="Name" value="{{$sanpham['Name']}}" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Thuộc danh mục</label>
                                <input class="form-control" type="text" value="{{$sanpham['TheLoai']}}" readonly>
                                <input class="form-control" type="hidden" hidden="" name="TheLoaiId" value="{{$sanpham['TheLoaiId']}}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mã sản phẩm</label>
                                <input class="form-control" id="id-password" value="{{$sanpham['Code']}}" type="text" name="Code" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Số lượng</label>
                                <input class="form-control" type="number" value="{{$sanpham['Amount']}}" name="Amount" required >
                            </div>
                            <div class="form-group">
                                <label class="control-label">Thông số</label>
                                <input class="form-control" type="text" value="{{$sanpham['Info']}}" name="Spec" required >
                            </div>
                            <div class="form-group">
                                <label class="control-label">Giá</label>
                                <input class="form-control" type="number" value="{{$sanpham['Quality']}}" name="Price" required >
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mô tả</label>
                                <input class="form-control" type="text" value="{{$sanpham['Description']}}" name="Description" required >
                            </div>
                            <div class="form-group">
                                <label class="control-label">Anh</label>
                                <input class="form-control" type="file" value="" name="Image[]" multiple  >
                            </div>
                            <div class="form-group">
                                <label class="control-label">Hình ảnh</label>
                                <div class="d-flex flex-wrap">
                                    @if(isset($sanpham['Photos']))
                                        @foreach($sanpham['Photos'] as $photo)
                                        <li id="{{$photo['Id']}}" style="list-style-type: none;text-align: center;margin-right: 20px">
                                            <i class="fa fa-window-close fa-2x" data-id="{{$photo['Id']}}" aria-hidden="true" style="color: red" ></i><br>
                                            <img style=" height: 100px;object-fit: cover" width="150px" src="{{$photo['Photos']['Small']}}" alt="">
                                        </li>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                            {{--<input type="checkbox" name="agreements" required data-parsley-error-message="Please read and agree the terms">--}}
                                            {{--<span class="fa fa-check"></span>I agree with the <a href="#">terms</a>--}}
                                        </label>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END panel-->
                </form>
            </div>
        </div>
    </div>
@stop
@section('js')
    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <!-- DATATABLES-->
    <script src="/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables-colvis/js/dataTables.colVis.js"></script>
    <script src="/vendor/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="/vendor/datatables-buttons/js/dataTables.buttons.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.bootstrap.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.colVis.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.flash.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.html5.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.print.js"></script>
    <script src="/vendor/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="/vendor/datatables-responsive/js/responsive.bootstrap.js"></script>
    <script src="/js/demo/demo-datatable.js"></script>
    <script src="/vendor/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.fa-window-close').on('click', function (e) {
                var id = $(this).attr('data-id');
                e.preventDefault();
                swal({
                    title: "Bạn có chắc chắn xóa?",
                    text: "Bạn sẽ xóa product này , nó sẽ ko hiển thị nữa!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        var data = new FormData();
                        console.log(id);
                        data.append('_token',"{{csrf_token()}}");
//                        data.append('keyword',txtInput);
                        var url ='/admin/hinhanh/'+id+'/delete';
                        console.log(url);
                        $.ajax({
                            data:data,
                            url: url,
                            type: "post",
                            error: function (xhr) {
                                console.log('xhr');
                            },
                            processData: false,
                            contentType: false
                        })
                            .done(function( data) {
                                console.log(data.status);
                                console.log(data.aaa);
                                if(data.status===200)
                                {
                                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                    document.getElementById(id).remove();
                                }
                                else
                                {
                                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                                }
//                                 $('#myData').html(data.html);
//                        $('#div-content').append('<img src="'+'/'+data.src+'">');
                            });
                    }
                    else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });

            });
        });
    </script>
@stop