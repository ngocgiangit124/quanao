<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NhanVienController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function test() {

        return view('template',$this->data);
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
}
