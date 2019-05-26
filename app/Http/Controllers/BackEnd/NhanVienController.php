<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\BinhLuan;
use App\Models\HoaDon;
use App\Models\SanPham;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class NhanVienController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index() {
        $data = [];
        $datatime = [];
        $datatime['time'] = 'Tất cả';

        $time = Input::get('time');
        $timeF = Input::has('time_f')?Input::get('time_f'):'';
        $timeE = Input::has('time_e')?Input::get('time_e'):'';
        $time_start='';
        $time_end='';
        if($time == 1) {
            $time_start = Carbon::createFromFormat('d-m-Y H:i:s',$this->getToday() . ' 00:00:00');
            $time_end = Carbon::createFromFormat('d-m-Y H:i:s', $this->getToday() . ' 23:59:59');
            $datatime['time'] = 'Hôm nay';
        } elseif($time == 7) {
            $time_start = Carbon::createFromFormat('d-m-Y H:i:s',$this->get7Day() . ' 00:00:00');
            $time_end = Carbon::createFromFormat('d-m-Y H:i:s',$this->getToday() . ' 23:59:59');
            $datatime['time'] = '7 ngày trước';
        } elseif($time == 14) {
            $time_start = Carbon::createFromFormat('d-m-Y H:i:s',$this->get14Day() . ' 00:00:00');
            $time_end = Carbon::createFromFormat('d-m-Y H:i:s',$this->getToday() . ' 23:59:59');
            $datatime['time'] = '14 ngày trước';
        } elseif($timeF && $timeE ) {
            $time_start = Carbon::createFromFormat('d-m-Y H:i:s',$this-> getCustomer($timeF) . ' 00:00:00');
            $time_end = Carbon::createFromFormat('d-m-Y H:i:s',$this-> getCustomer($timeE) . ' 23:59:59');
            $datatime['time'] = 'tùy chỉnh';
        }

        $soluong = 0;
        $soluongBan = 0;
        $sanphamall = SanPham::select('SoLuong','SoLuongBan')->get();
        foreach ($sanphamall as $a) {
            $soluong = $soluong +($a->SoLuong);
            $soluongBan = $soluongBan + ($a->SoLuongBan);
        }
        $danhgia = BinhLuan::count();



        $query = HoaDon::select('SoLuongSanPham','TongTien');
        $soluongEdit = $query->where(function ($query) use ($time_start,$time_end) {
            if (!empty($time_start)&&!empty($time_end)) {
                return $query->where('Created_at','>', $time_start)->where('Created_at','<', $time_end);
            }
        })->get();
        $soluongCheck = 0;
        $tien = 0;
        $soluonghoadon = $soluongEdit->count();
        foreach ($soluongEdit as $b) {
            $soluongCheck =$soluongCheck+($b->SoLuongSanPham);
            $tien = $tien + ($b->TongTien);
        }

        $query = User::select('NguoiDungId');
        $users = $query->where(function ($query) use ($time_start,$time_end) {
            if (!empty($time_start)&&!empty($time_end)) {
                return $query->where('Created_at','>', $time_start)->where('Created_at','<', $time_end);
            }
        })->get();

        $comments = $this->listComments();


        $datatime['time_f'] = $timeF;
        $datatime['time_e'] = $timeE;

        $data['tongsanpham'] = $soluong;
        $data['sanpham'] = SanPham::count();
        $data['tongdanhgia'] = $danhgia;
        $data['tongluongBan'] = $soluongCheck;
        $data['tongtien'] = $tien;
        $data['tonghoadon'] =$soluonghoadon;
        $data['tongkhachhang'] =$users->count();
        $data['chon'] =$datatime;
        $this->data['doanhthu'] =$data;
        $this->data['binhluans'] =$comments;
//dd($this->data);
        return view('index',$this->data);
    }
    function listComments() {
        $comments = BinhLuan::orderBy('BinhLuanId','desc')->paginate(10);
        $data =[];
        foreach ($comments as $comment ) {
            $data[] = $comment->getArrayInfo();
        }
        return $data;
    }

    public function index1() {

        return view('index',$this->data);
    }
    public function testCreate() {
       $nhanvien = new User();
       $nhanvien->Ten = 'Giang';
       $nhanvien->Email = '2@gmail.com';
       $nhanvien->SDT = '0963187845';
       $nhanvien->Code = 'fg748';
       $nhanvien->Password = bcrypt(2);
       $nhanvien->save();
       dd($nhanvien);
        return $nhanvien;
    }
    function getCustomer($date) {
        $customer = date('d-m-Y', strtotime($date));
        return $customer;
    }
    function getToday() {
        $today = date('d-m-Y');
        return $today;
    }
    function get7Day() {
        $day7 = date('d-m-Y', strtotime(date('d-m-Y') . ' -6 day'));
        return $day7;
    }
    function get14Day() {
        $day14 = date('d-m-Y', strtotime(date('d-m-Y') . ' -13 day'));
        return $day14;
    }
    function getTomorrow() {
        $tomorrow = date('d-m-Y', strtotime(date('d-m-Y') . ' +1 day'));
        return $tomorrow;
    }
    function getMonDay() {
        $monday = date('d-m-Y' ,strtotime( "previous monday"));
        return $monday;
    }
    function getSaturday() {
        $today = strtotime(date('d-m-Y'));
        $date_today = date('D');
        if ($date_today != 'Mon') {
            $saturday = date('d-m-Y', strtotime( "previous monday +5 day" ));

        } else {
            $saturday = date('d-m-Y', strtotime(date('d-m-Y') . ' +5 day'));
        }
        return $saturday;
    }
    function getSunday() {
        $date_today = date('D');
        if ($date_today != 'Mon') {
            $sunday = date('d-m-Y', strtotime( "previous monday +5 day" ));

        } else {
            $sunday = date('d-m-Y', strtotime(date('d-m-Y') . ' +5 day'));
        }
        return $sunday;
    }



}
