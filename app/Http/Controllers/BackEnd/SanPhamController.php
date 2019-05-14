<?php

namespace App\Http\Controllers\BackEnd;

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
    public function store() {
        $sanpham = new SanPham();
        $sanpham->TheLoaiId = Input::get('TheLoaiId');
        $sanpham->ThongSo = Input::get('Spec');
        $sanpham->Gia = Input::get('Price');
        $sanpham->SoLuong = Input::get('Amount');
        $sanpham->Code = Input::get('Code');
        $sanpham->Ten = Input::get('Name');
        $sanpham->MoTa = Input::get('Description');
        $sanpham->ManHinh = Input::get('ManHinh');
        $sanpham->CameraTruoc = Input::get('CameraTruoc');
        $sanpham->CameraSau = Input::get('CameraSau');
        $sanpham->Ram = Input::get('Ram');
        $sanpham->Rom = Input::get('Rom');
        $sanpham->CPU = Input::get('CPU');
        $sanpham->GPU = Input::get('GPU');
        $sanpham->Pin = Input::get('Pin');
        $sanpham->HeDieuHanh = Input::get('HeDieuHanh');
        $sanpham->Sim = Input::get('Sim');
        $sanpham->Slug = str_slug(Input::get('Name'));
        $sanpham->save();
        if (Input::hasFile('Image')) {
            foreach (Input::file('Image') as $photo){
                $this->uploadImage($photo,$sanpham);
            }
        }

        return redirect('/admin/danhmuc/'.$sanpham->TheLoaiId.'/sanpham');
    }
    public function update($id) {
        $sanpham =  SanPham::find($id);
        $sanpham->TheLoaiId = Input::get('TheLoaiId');
        $sanpham->ThongSo = Input::get('Spec');
        $sanpham->Gia = Input::get('Price');
        $sanpham->SoLuong = Input::get('Amount');
        $sanpham->Code = Input::get('Code');
        $sanpham->Ten = Input::get('Name');
        $sanpham->MoTa = Input::get('Description');
        $sanpham->ManHinh = Input::get('ManHinh');
        $sanpham->CameraTruoc = Input::get('CameraTruoc');
        $sanpham->CameraSau = Input::get('CameraSau');
        $sanpham->Ram = Input::get('Ram');
        $sanpham->Rom = Input::get('Rom');
        $sanpham->CPU = Input::get('CPU');
        $sanpham->GPU = Input::get('GPU');
        $sanpham->Pin = Input::get('Pin');
        $sanpham->HeDieuHanh = Input::get('HeDieuHanh');
        $sanpham->Sim = Input::get('Sim');
        $sanpham->Slug = str_slug(Input::get('Name'));
        $sanpham->save();
        if (Input::hasFile('Image')) {
            foreach (Input::file('Image') as $photo){
                $this->uploadImage($photo,$sanpham);
            }
        }
        return redirect('/admin/danhmuc/'.$sanpham->TheLoaiId.'/sanpham');
    }
    function uploadImage($photo,$sanpham) {
        $date_dir_name = md5( date_format($sanpham->Created_at, 'm-Y'));
        $key = str_random(6);
        $hinhanh = new HinhAnh();
            $full_item_photo_dir = config('image.image_root').'/sanphams/'.$date_dir_name;
            $fileName = $sanpham->SanPhamId.'_'.$key;
            $size = config('image.sanphams');
            ImageLib::upload_image($photo, $full_item_photo_dir, $fileName, config('image.images.sanphams'), 0);
        $hinhanh->Anh = $fileName;
        $hinhanh->SanPhamId = $sanpham->SanPhamId;
        $hinhanh->save();
    }
    public function show($slug) {
        $theloai = SanPham::where('Slug',$slug)
            ->orWhere('SanPhamId',$slug)
            ->first();
        $data = $theloai->getArrayInfo();
        $this->data['sanpham'] = $data;
        return view('sanpham.detail',$this->data);
    }
    public function delete($slug) {
        $theloai = SanPham::where('Slug',$slug)
            ->orWhere('SanPhamId',$slug)
            ->first();
        $theloai->delete();
        $data['status']=200;
        return response()->json($data);
    }

    public function deleteImage($id) {
        $img = HinhAnh::find($id);
        $Created_at = $img->sanpham->Created_at;
        $full_item_photo_dir=md5( date_format($Created_at, 'm-Y'));
        ImageLib::delete_image($full_item_photo_dir, $img->Anh, config('image.images.sanphams'), 0);
        $img->delete();
        $rels['status'] = 200;
        return $rels;
    }

}
