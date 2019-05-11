<?php namespace App\Repositories;

use App\Models\TheLoai;
use Auth,Input,Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class TheLoaiRepository {
    public function index() {
        $theloais = TheLoai::all();
        $data = [];
        foreach ($theloais as $theloai) {
            $data[] = $theloai->getArrayInfo();
        }
        $res['data'] = $data;
        $res['status'] = 200;
//        $this->data['theloais'] = $data;
        return $res;

    }
    public function show($slug) {
        $theloai = TheLoai::where('Slug',$slug)
            ->orWhere('TheLoaiId',$slug)
            ->first();
        $data = $theloai->getArrayInfo();
        $res['data'] = $data;
        $res['status'] = 200;
//        $this->data['theloais'] = $data;
        return $res;
    }
}