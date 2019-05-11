<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\TheLoai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TheLoaiController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index() {
        $theloais = TheLoai::all();
        $data = [];
        foreach ($theloais as $theloai) {
            $data[] = $theloai->getArrayInfo();
        }
        $this->data['theloais'] = $data;
        return view('theloai.index',$this->data);

    }
    public function show($slug) {
        $per_page = Input::has('per_page') ? 0+Input::get('per_page') : 12;
        $product = Input::has('product')&&Input::get('product') ? Input::get('product') : '';
        $theloai = TheLoai::where('Slug',$slug)
            ->orWhere('TheLoaiId',$slug)
            ->first();
        $query = $theloai->sanphams();
        $sanphams = $query->where(function ($query) use ($product) {
            if($product=='new') {
                return $query->orderBy('SanPhamId','DESC');
            }
            if($product=='sale') {
                return $query->where('SoLuong','>=',20)
                    ->where('TiLe','>=',20)
                    ->orderBy('TiLe','DESC');
            }
        })->paginate($per_page);
        $data = [];
        foreach ($sanphams as $sanpham) {
            $data[] = $sanpham->getArrayInfo();
        }

        $res = $sanphams->toArray();
        $res['total'] = $sanphams->total();
        $this->data['sanphams'] = $data;
        $this->data['paginate'] = $res;
//        dd($this->data);
        return view('front.sanpham.index',$this->data);
    }
}
