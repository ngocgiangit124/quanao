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
@stop

@section('content')
    <h3>Thể Loại
        <small>??</small>
    </h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="/admin/danhmuc" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- START panel-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Tạo mới danh mục</div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Tên</label>
                                <input class="form-control" type="text" name="Name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mã danh mục</label>
                                <input class="form-control" id="id-password" type="text" name="Code" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mô tả</label>
                                <input class="form-control" type="text" name="Description" required >
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
                                    <button class="btn btn-primary" type="submit">Tạo mới</button>
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
@stop