<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\ChiTietHoaDon;
use App\Models\HoaDon;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart,Input;
use Symfony\Component\Process\Process;

class CartController extends Controller
{
    public function store() {
        $id = Input::get('id');
        $cart = Cart::content();
        $rowId  = Cart::search(function ($cart, $key) use($id) {
            return $cart->id == $id;
        })->first();
//        dd($rowId);
        $product = SanPham::find($id);
        $sanpham = $product->getArrayInfo();
        if ($rowId) {
            Cart::update($rowId->rowId, $rowId->qty + 1);
        } else {
            Cart::add(array('id' => $product->SanPhamId, 'name' => $product->Ten, 'qty' => 1, 'price' => $product->Gia));
        }
        $count = Cart::count();
        $rels['status'] = 200;
        $rels['total'] =$count;
//        Cart::destroy();
        return response()->json($rels);
    }
    public function edit() {
        $id = Input::get('id');
        $check = Input::has('check')?Input::get('check'):2;
        $amount =Input::has('amount')?Input::get('amount'): 0;
        $cart = Cart::content();
        $rowId  = Cart::search(function ($cart, $key) use($id) {
            return $cart->id == $id;
        })->first();
        if ($rowId && $check==1) {
            Cart::update($rowId->rowId, $rowId->qty + 1);
            $rels['data'] = 1;
        }
        elseif($rowId && $check==0) {
            if($rowId->qty >1 ) {
                Cart::update($rowId->rowId, $rowId->qty - 1);
                $rels['data'] = 0;
            }
        }
        elseif($rowId && $amount>0) {
            Cart::update($rowId->rowId, $rowId->qty + $amount);
            $rels['data'] = 0;
        } elseif(!$rowId && $amount>0) {
            $product = SanPham::find($id);
//            dd($id,$product);
            Cart::add(array('id' => $product->SanPhamId, 'name' => $product->Ten, 'qty' => $amount, 'price' => $product->Gia));
        } else {
            $rels['status'] = -1;
            return response()->json($rels);
        }
        $count = Cart::count();
        $rels['status'] = 200;
        $rels['total'] =$count;
//        Cart::destroy();
        return response()->json($rels);
    }
    public function delete()
    {
        $id = Input::get('id');
        $cart = Cart::content();
        $rowId = Cart::search(function ($cart, $key) use ($id) {
            return $cart->id == $id;
        })->first();
        Cart::remove($rowId->rowId);
        $rels['status'] = 200;
//        Cart::destroy();
        return response()->json($rels);
    }

    public function show() {
        $cart = Cart::content();
        $data=[];
        $total = 0;
        foreach($cart as $a) {
            $data[] = $this->getArrayInfoCart($a);
            $total = $total+($a->price*$a->qty);
        }
        $this->data['show_cart'] = $data;
        $this->data['total'] = $total;
        return view('front.cart.index',$this->data);
    }
    function getArrayInfoCart($a) {
        $rels = [
            'Id'=>$a->id,
            'Amount'=>$a->qty,
            'Price'=>$a->price*$a->qty,
            'Name'=>$a->name,
            'Product'=>$this->img($a),
        ];
        return $rels;
    }
    function img($a) {
        $a = SanPham::find($a->id);
        $b = $a->getArrayInfo();
        return $b;
    }
    public function buy() {
        $id = Input::get('Id');
        if($id) {
            $user = User::find($id);
            $user->DiaChi = Input::get('DiaChi');
            $user->SDT = Input::get('Phone');
            $user->save();
        } else {
            $user = new User();
            $user->DiaChi = Input::get('DiaChi');
            $user->SDT = Input::get('Phone');
            $user->save();
        }
        $hoadon = new HoaDon();
        $hoadon->NguoiDungId = $user->NguoiDungId;
        $hoadon->Code = str_random(6);
        $hoadon->save();

        $cart = Cart::content();
        $data=[];
        $total = 0;
        $soluong=0;
        foreach($cart as $a) {
            $total = $total+($a->price*$a->qty);
            $chitiet = new ChiTietHoaDon();
            $chitiet ->SoLuong = $a->qty;
            $chitiet ->TongTien = $a->qty*$a->price;
            $chitiet ->SanPhamId = $a->id;
            $chitiet->HoaDonId = $hoadon->HoaDonId;
            $chitiet->save();
            $total = $total+($a->qty*$a->price);
            $soluong = $soluong +($a->qty);
        }
        $hoadon->TongTien = $total;
        $hoadon->SoLuongSanPham = $soluong;
        $hoadon->save();
        Cart::destroy();
        return view('front.ok',$this->data);
    }
    public function data() {
        $id = Input::get('id');
        $cart = Cart::content();
        $rowId  = Cart::search(function ($cart, $key) use($id) {
            return $cart->id == $id;
        })->first();
//        dd($rowId);
        $product = SanPham::find($id);
        $sanpham = $product->getArrayInfo();
        if ($rowId) {
            Cart::update($rowId->rowId, $rowId->qty + 1);
        } else {
            Cart::add(array('id' => $product->SanPhamId, 'name' => $product->Ten, 'qty' => 1, 'price' => $product->Gia));
        }
        $count = Cart::count();
        $rels['status'] = 200;
        $rels['total'] =$count;
//        Cart::destroy();
        return response()->json($rels);
    }
}
