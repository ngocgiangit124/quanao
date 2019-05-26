<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--{!! Html::style('css/bootstrap.min.css') !!}--}}
    <style>
        body {

            font-family: 'Times New Roman',"DejaVu Sans";
            font-size: 12px;
        }
        table{
            width: 100%;
            border-collapse: collapse ;
            margin-bottom: 50px;
        }
        td,th{

            padding: 3px;
            border: 1px solid;
        }
        .form
        {
            width: 100%;
            height: auto;
            border-collapse: collapse ;
        }
        .form>.form-group
        {
            border: 1px solid green;
            width: 100%;
            height: auto;
            border-collapse: collapse ;
        }
        .form-group
        {
            border: 1px solid green;
            width: 100%;
            height: auto;
        }
    </style>

</head>
<body>
<div class="form" style="margin: 10px">
    <img src="front/images/home/logo.png">
</div>
<h1> Thông tin hóa đơn</h1>
<div>
    <div>
        <p>Tên khách hàng : <span>{{$khach['Name']}}</span></p>
    </div>
    <div>
        <p>Email: <span>{{$khach['Email']}}</span></p>
    </div>
    <div>
        <p>Địa chỉ: <span>{{$khach['DiaChi']}}</span></p>
    </div>
    <div>
        <p>Số điện thoại: <span>{{$khach['Phone']}}</span></p>
    </div>
</div>
<table>
    <tr>
        <th>Mã hóa đơn</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Tổng giá</th>
        {{--<th>Ngày Khám</th>--}}

    </tr>
    @foreach($chitiets as $index=>$value)
        <tr>
            <td>{{$index}}</td>
            <td>{{$value['Name']}}</td>
            <td>{{$value['Amount']}}</td>
            <td>{{$value['Price']}}</td>
            <td>{{$value['Total']}} VND</td>
            {{--<td>{{$value->ngaykham}}</td>--}}
        </tr>
    @endforeach
</table>
<div>
    <div>
        <p>Tổng giá: <span> {{$hoadontong}}</span> VND</p>
    </div>
    <div>
        <p>Thời gian mua: <span> {{$hoadontg}}</span></p>
    </div>
</div>
</body>
</html>