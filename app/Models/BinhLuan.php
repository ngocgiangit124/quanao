<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinhLuan extends Model
{
    use SoftDeletes;
    const DELETED_AT = 'Deleted_at';
    protected $dates = ['Deleted_at'];
    protected $table = 'BinhLuan';
    protected  $primaryKey = 'BinhLuanId';

    public $timestamps = true;
    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';

    public function getArrayInfo() {
        $rels = array(
            "Id"   => $this->BinhLuanId,
            "Comment"     => $this->BinhLuan,
            "UserName"      => $this->user->Ten,
            "ProductName"      => $this->sanpham->Ten,
            "Created_at"  =>date('d-m-Y H:i', strtotime($this->Created_at)),
        );
        return $rels;
    }

    public function sanpham() {
        return $this->belongsTo('App\Models\SanPham','SanPhamId','SanPhamId');
    }
    public function user() {
        return $this->belongsTo('App\Models\User','NguoiDungId','NguoiDungId');
    }
}
