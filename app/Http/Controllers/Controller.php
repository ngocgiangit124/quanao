<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->data['auth']= Auth::user();
            $theloais = TheLoai::all();
            $data=[];
            foreach ($theloais as $theloai) {
                $data[] = $theloai->getArrayInfo();
            }
            $this->data['danhmuc_theloais']= $data;
            return $next($request);
        });
    }
}
