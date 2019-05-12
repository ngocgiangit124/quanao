<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    use SoftDeletes;
    const DELETED_AT = 'Deleted_at';
    protected $table = 'HinhAnh';
    protected  $primaryKey = 'HinhAnhId';
    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';
    protected $dates = ['Deleted_at'];

    public function getArrayInfo($time)
    {
        $rels = array(
            "Id" => $this->HinhAnhId,
            "Photos" => $this->getSizes($time),
            "Created_at" => date('d-m-Y H:i', strtotime($this->Created_at)),
        );
        return $rels;
    }
    public function getOneInfo($time)
    {

        $rels = $this->getSizes($time);

        return $rels;
    }
    function getSizes($time) {
            $data = [];
            if ($this->Anh) {
                $date_dir_name = md5(date_format($time, 'm-Y'));
                $data['Small'] = env("IMAGE_URL").'/sanphams/'.$date_dir_name.'/'.$this->Anh.'_150x150.png';
                $data['Medium'] = env("IMAGE_URL").'/sanphams/'.$date_dir_name.'/'.$this->Anh.'_300x300.png';
                $data['Large'] = env("IMAGE_URL").'/sanphams/'.$date_dir_name.'/'.$this->Anh.'.png';
            } else {
                $data['Small'] = env("HOME_PAGE").'/img/team_ing_default.png';
                $data['Medium'] = env("HOME_PAGE").'/img/team_ing_default.png';
                $data['Large'] = env("HOME_PAGE").'/img/team_ing_default.png';
            }
            return $data;
    }
    public function sanpham() {
        return $this->belongsTo('App\Models\SanPham','SanPhamId','SanPhamId');
    }
}
