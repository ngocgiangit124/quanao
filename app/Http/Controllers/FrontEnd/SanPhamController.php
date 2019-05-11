<?php

namespace App\Http\Controllers\FrontEnd;

use App\Libraries\ImageLib;
use App\Models\HinhAnh;
use App\Models\SanPham;
use App\Models\TheLoai;
use App\Repositories\TheLoaiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SanPhamController extends Controller
{
    protected $theloaiRepository;
    public function __construct(TheLoaiRepository $theloaiRepository)
    {
        parent::__construct();
        $this->theloaiRepository =$theloaiRepository;
    }
    public function index() {
        $sanphams = SanPham::orderBy('SanPhamId','DESC')->paginate(12);
        $data = [];
        foreach ($sanphams as $sanpham) {
            $data[] = $sanpham->getArrayInfo();
        }
        $res=$sanphams->toArray();
        $res['total'] = $sanphams->total();
        $this->data['sanphams'] = $data;
        $this->data['paginate'] = $res;
        return view('front.sanpham.full_index',$this->data);
    }

    public function listSanPham($slug) {
        $theloai = TheLoai::where('TheLoai.Slug','=',$slug)->orWhere('TheLoai.TheLoaiId','=',$slug)->first();
        $sanphams = $theloai->sanphams;
        $theloai1 = $theloai->getArrayInfo();
        $data = [];
        foreach ($sanphams as $sanpham) {
            $data[] = $sanpham->getArrayInfo();
        }
        $this->data['theloai'] = $theloai1;
        $this->data['sanphams'] = $data;
//        dd($this->data);
//        dd($this->data);
        return view('sanpham.index',$this->data);
    }
    public function create($slug) {
        $theloai = $this->theloaiRepository->show($slug);
        $this->data['theloai'] = $theloai['data'];
        return view('sanpham/add',$this->data);
    }
    public function show($slug) {
        $theloai = SanPham::where('Slug',$slug)
            ->orWhere('SanPhamId',$slug)
            ->first();
        $data = $theloai->getArrayInfo();
        $this->data['sanpham'] = $data;
//        dd($this->data);
        return view('front.sanpham.detail',$this->data);
    }
}
