<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use App\Repositories\TheLoaiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KhachHangController extends Controller
{
    protected $theloaiRepository;
    public function __construct(TheLoaiRepository $theloaiRepository)
    {
        parent::__construct();
        $this->theloaiRepository =$theloaiRepository;
    }

    public function index() {
        $users = User::where('Quyen','kh')->orderBy('NguoiDungId','DESC')->get();
        $data=[];
        foreach ($users as $user) {
            $data[] = $user->getArrayInfo();
        }
        $this->data['users'] = $data;
        return view('khachhang.index',$this->data);
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $rels['status']= 200;
        return response()->json($rels);
    }
}
