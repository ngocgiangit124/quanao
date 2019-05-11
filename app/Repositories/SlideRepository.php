<?php namespace App\Repositories;

use App\Models\Slide;
use Auth,Input,Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class SlideRepository {
    public function index() {
        $slides = Slide::where('TrangThai',1)->orderBy('SlideId','DESC')->get();
        $data = [];
        foreach ($slides as $slide) {
            $data[] = $slide->getArrayInfo();
        }
        $res['data'] = $data;
        $res['status'] = 200;
//        $this->data['theloais'] = $data;
        return $res;

    }
}