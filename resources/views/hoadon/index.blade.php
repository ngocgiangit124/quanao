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
@stop

@section('content')
    <h3>Sẩn Phẩm
        <small>??</small>
    </h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Danh sách|
                        <small>Hóa đơn</small>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable2">
                                <thead>
                                <tr>
                                    <th style="width:15%;">ID</th>
                                    <th style="width:15%;">Mã</th>
                                    <th style="width:15%;">Số lượng sản phẩm</th>
                                    <th style="width:25%;">Người mua</th>
                                    <th style="width:15%;">Tổng Tiền</th>
                                    <th style="width:15%;">Chi Tiết</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hoadons as $hoadon)
                                    <tr class="gradeX">
                                        <td>{{$hoadon['Id']}}</td>
                                        <td>{{$hoadon['Code']}}</td>
                                        <td>{{$hoadon['Amount']}}</td>
                                        <td>{{$hoadon['User']}}</td>
                                        <td>{{$hoadon['Total']}}</td>
                                        <td><a href="/admin/hoadon/{{$hoadon['Id']}}">Chi Tiết</a></td>
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
@stop