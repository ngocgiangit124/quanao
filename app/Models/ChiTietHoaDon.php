<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $table = 'ChiTietHoaDon';
    protected  $primaryKey = 'ChiTietHoaDonId';
    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';

    public function getArrayInfo() {
        $rels = array(
            "Id"   => $this->ChiTietHoaDonId,
            "Name" => $this->oneTen(),
            "Amount" => $this->SoLuong,
            "Photo"=> $this->onePhoto(),
            "Total" => $this->TongTien,
            "Created_at"  =>date('d-m-Y H:i', strtotime($this->Created_at)),
        );
        return $rels;
    }
    public function oneTen() {
        $sanpham = $this->sanpham;
//        dd($sanpham);
        if($sanpham) {
            return $sanpham->Ten;
        }
        return 'đã bị xóa';
    }
    public function onePhoto() {
        $sanpham = $this->sanpham;
//        dd($sanpham);
        if($sanpham) {
            return $sanpham->onePhoto();
        }
        return 'đã bị xóa';
    }
    public function sanpham() {
        return $this->belongsTo('App\Models\SanPham','SanPhamId','SanPhamId');
    }
}
