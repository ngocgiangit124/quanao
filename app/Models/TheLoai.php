<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TheLoai extends Model
{
    use SoftDeletes;
    const DELETED_AT = 'Deleted_at';
    protected $dates = ['Deleted_at'];
    protected $table = 'TheLoai';
    protected  $primaryKey = 'TheLoaiId';

    public $timestamps = true;
    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';

    public function getArrayInfo() {
        $rels = array(
            "Id"   => $this->TheLoaiId,
            "Name"     => $this->Ten,
            "Description"      => $this->MoTa,
            "Code"      => $this->Code,
            "Slug"      => $this->Slug,
//            "CreatedAt"  =>date('d-m-Y H:i', strtotime($this->CreatedAt)),
        );
        return $rels;
    }

    public function sanphams() {
        return $this->hasMany('App\Models\SanPham','TheLoaiId','TheLoaiId');
    }

}
