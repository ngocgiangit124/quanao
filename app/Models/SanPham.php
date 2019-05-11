<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPham extends Model
{
    use SoftDeletes;
    const DELETED_AT = 'Deleted_at';
    protected $dates = ['Deleted_at'];
    protected $table = 'SanPham';
    protected  $primaryKey = 'SanPhamId';

    public $timestamps = true;
    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';

    public function getArrayInfo() {
        $rels = array(
            "Id"   => $this->SanPhamId,
            "Name" => $this->Ten,
            "Code" => $this->Code,
            "Quality" => $this->Gia,
            "Description" => $this->Mota,
            "Amount" => $this->SoLuong,
            "Info" => $this-> ThongSo,
            "Slug" => $this-> Slug,
            "TheLoai" => $this-> NameTheloai(),
            "TheLoaiId" => $this->TheLoaiId,
            "Photo" => $this -> onePhoto(),
            "Photos" => $this -> listPhoto(),
            "Created_at"  =>date('d-m-Y H:i', strtotime($this->Created_at)),

        );
//        dd($rels);
//        dd($rels['Photos']);
        return $rels;
    }

    public function theloai() {
        return $this->belongsTo('App\Models\TheLoai','TheLoaiId','TheLoaiId');

    }
    public function NameTheloai() {
        $theloai = $this->theloai()->select('Ten')->first();
        return $theloai->Ten;
    }

    public function listPhoto() {
        $data = [];
        $res =[];
        if($this->images->count()>0) {
            foreach ($this->images as  $photo) {
                $res[] = $photo->getArrayInfo($this->Created_at);
            }
            return $res;
        } else {
            return $data;
        }
    }
    public function onePhoto() {
        $res = '';
        if($this->images->count()>0) {
            $photo = $this->images->first();
            $res = $photo->getOneInfo($this->Created_at);
            return $res;
        } else {
            $data['Small'] = env("HOME_PAGE").'/img/logo.png';
            $data['Medium'] = env("HOME_PAGE").'/img/logo.png';
            $data['Large'] = env("HOME_PAGE").'/img/logo.png';
                $res = $data;
            return $res;
        }
    }
//    public function onePhoto() {
//        $img = $this->images()->first();
//        return $img->getOneInfo();
//    }
    public function images() {
        return $this->hasMany('App\Models\HinhAnh','SanPhamId','SanPhamId');
    }

}
