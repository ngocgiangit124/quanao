<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'Slide';
    protected  $primaryKey = 'SlideId';

    public $timestamps = true;
    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';
    public function getArrayInfo()
    {
        $rels = array(
            "Id" => $this->SlideId,
            "Name" => $this->Ten,
            "Photos" =>$this-> getPhoto(),
            "Status" => $this->TrangThai,
            "Created_at" => date('d-m-Y H:i', strtotime($this->Created_at)),

        );
//        dd($rels);
//        dd($rels['Photos']);
        return $rels;
    }
    function getPhoto() {
        $data = [];
        if ($this->Ten) {
            $date_dir_name = md5(date_format($this->Created_at, 'm-Y'));
            $data['Small'] = env("IMAGE_URL").'/slides/'.$date_dir_name.'/'.$this->Ten.'_150x233.png';
            $data['Medium'] = env("IMAGE_URL").'/slides/'.$date_dir_name.'/'.$this->Ten.'_150x233.png';
            $data['Large'] = env("IMAGE_URL").'/slides/'.$date_dir_name.'/'.$this->Ten.'_450x800.png';
        } else {
            $data['Small'] = env("HOME_PAGE").'/img/team_ing_default.png';
            $data['Medium'] = env("HOME_PAGE").'/img/team_ing_default.png';
            $data['Large'] = env("HOME_PAGE").'/img/team_ing_default.png';
        }
        return $data;
    }
}
