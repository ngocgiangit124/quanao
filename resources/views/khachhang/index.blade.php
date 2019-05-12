@extends('/template')
@section('title')
    Khách hàng
@stop
@section('css')
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- DATATABLES-->
    <link rel="stylesheet" href="/vendor/datatables-colvis/css/dataTables.colVis.css">
    <link rel="stylesheet" href="/vendor/datatables/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="/vendor/dataTables.fontAwesome/index.css">
    <!-- SWEET ALERT-->
    <link rel="stylesheet" href="/vendor/sweetalert/dist/sweetalert.css">
@stop

@section('content')
    <div class="content-heading">Khách hàng
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Data Tables |
                        <small>Ajax Content</small>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable2">
                                <thead>
                                <tr>
                                    <th style="width:5%;">Id</th>
                                    <th style="width:20%;">Tên</th>
                                    <th style="width:20%;">Email</th>
                                    <th style="width:20%;">SDT</th>
                                    {{--<th style="width:5%;">Action</th>--}}
                                    <th style="width:5%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="gradeX" id="{{$user['Id']}}">
                                        <td>{{$user['Id']}}</td>
                                        <td>{{$user['Name']}}</td>
                                        <td>{{$user['Email']}}</td>
                                        <td>{{$user['Phone']}}</td>
                                        {{--<td><a href="/admin/khachhang/{{$user['Id']}}">show</a></td>--}}
                                        {{--<td><a href="javascript:" class="swal-demo5"  data-id="{{$user['Id']}}">Chi tiết</a></td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
    ============== PAGE VENDOR SCRIPTS ===============-->
    <!-- SWEET ALERT-->
    <script src="/vendor/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.swal-demo5').on('click', function (e) {
                var id = $(this).attr('data-id');
                e.preventDefault();
                swal({
                    title: "Bạn có chắc chắn xóa?",
                    text: "Bạn sẽ xóa khachhang này , nó sẽ ko hiển thị nữa!",
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
                        data.append('_method',"DELETE");
                        var url ='/admin/khachhang/'+id;
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