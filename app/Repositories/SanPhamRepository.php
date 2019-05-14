<?php namespace App\Repositories;

use App\Models\SanPham;
use Auth,Input,Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class SanPhamRepository {
    public function indexNews() {
        $sanphams = SanPham::orderBy('SanPhamId','DESC')->paginate(12);
        $data = [];
        foreach ($sanphams as $sanpham) {
            $data[] = $sanpham->getArrayInfo();
        }
        $res['data'] = $data;
        $res['status'] = 200;
        return $res;
    }
    public function indexSale() {
        $sanphams = SanPham::where('SoLuong','>=',50)
            ->where('TiLe','>=',20)
            ->orderBy('TiLe','DESC')
            ->paginate(12);;
        $data = [];
        foreach ($sanphams as $sanpham) {
            $data[] = $sanpham->getArrayInfo();
        }
        $res['data'] = $data;
        $res['status'] = 200;
        return $res;
    }
    public function index() {
        $sanphams = SanPham::paginate(12);
        $data = [];
        foreach ($sanphams as $sanpham) {
            $data[] = $sanpham->getArrayInfo();
        }
        $res['data'] = $data;
        $res['status'] = 200;
        return $res;
    }
    public function indexRandom() {
        $start = rand(1,100);
        $sanphams = SanPham::where('SoLuong','>=',$start)
            ->orderBy('SanPhamId','DESC')
            ->paginate(6);
        $data = [];
        foreach ($sanphams as $sanpham) {
            $data[] = $sanpham->getArrayInfo();
        }
        $res['data'] = $data;
        $res['status'] = 200;
        return $res;
    }
}