@extends('/template')
@section('title')
    Hóa đơn
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
    <div class="content-heading">
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">chi tiết |
                        <small>Hóa đơn</small>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable2">
                                <thead>
                                    <tr>
                                        <th style="width:5%;">Id</th>
                                        <th style="width:20%;">Tên sản phẩm</th>
                                        <th style="width:20%;">Hình ảnh</th>
                                        <th style="width:20%;">Số lượng mua</th>
                                        <th style="width:20%;">Tổng Tiền</th>
                                        <th style="width:20%;">Thời gian</th>
                                        {{--<th style="width:5%;">Action</th>--}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chitiets as $chitiet)
                                        <tr class="gradeX" id="{{$chitiet['Id']}}">
                                            <td>{{$chitiet['Id']}}</td>
                                            <td>{{$chitiet['Name']}}</td>
                                            <td><img style="max-height: 100px;object-fit: cover" src="{{$chitiet['Photo']['Small']}}" alt=""></td>
                                            <td>{{$chitiet['Amount']}}</td>
                                            <td>{{$chitiet['Total']}}</td>
                                            <td>{{$chitiet['Created_at']}}</td>
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

@stop