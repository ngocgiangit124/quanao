<?php

namespace App\Http\Controllers\BackEnd;

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
    public function create() {
        return view('theloai.add',$this->data);
    }
    public function store() {
        $theloai = new TheLoai();
        $theloai->Code = Input::get('Code');
        $theloai->Ten = Input::get('Name');
        $theloai->MoTa = Input::get('Description');
        $theloai->Slug = str_slug(Input::get('Name'));
        $theloai->save();
        return redirect('/admin/danhmuc');
    }
    public function show($slug) {
        $theloai = TheLoai::where('Slug',$slug)
            ->orWhere('TheLoaiId',$slug)
            ->first();
        $data = $theloai->getArrayInfo();
        $this->data['theloai'] = $data;
        return view('theloai.detail',$this->data);
    }
    public function update($slug) {
        $theloai = TheLoai::where('Slug',$slug)
            ->orWhere('TheLoaiId',$slug)
            ->first();
        $theloai->Code = Input::get('Code');
        $theloai->Ten = Input::get('Name');
        $theloai->MoTa = Input::get('Description');
        $theloai->Slug = str_slug(Input::get('Name'));
        $theloai->save();
        return redirect('/admin/danhmuc');
    }
    public function delete($slug) {
        $theloai = TheLoai::where('Slug',$slug)
            ->orWhere('TheLoaiId',$slug)
            ->first();
        $theloai->delete();
        $data['status']=200;
        return response()->json($data);
    }
}
