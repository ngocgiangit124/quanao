<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'HoaDon';
    protected  $primaryKey = 'HoaDonId';
    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';

    public function getArrayInfo() {
        $rels = array(
            "Id"   => $this->HoaDonId,
            "Code" => $this->Code,
            'Product' =>$this->chitiets()->count(),
            "Amount" => $this->SoLuongSanPham,
            "User" => $this->user->Ten,
            "Total" => $this->TongTien,
            "Created_at"  =>date('d-m-Y H:i', strtotime($this->Created_at)),
        );
        return $rels;
    }
    public function user() {
        return $this->belongsTo('App\Models\User','NguoiDungId','NguoiDungId');
    }
    public function chitiets() {
        return $this->hasMany('App\Models\ChiTietHoaDon','HoaDonId','HoaDonId');
    }
}
