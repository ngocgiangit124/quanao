<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\HoaDon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $hoadons = HoaDon::all();
        $data = [];
        foreach ($hoadons as $hoadon) {
            $data[] = $hoadon->getArrayInfo();
        }
        $this->data['hoadons'] = $data;
        return view('hoadon.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slides/add',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = new Slide();
        $slide->Ten = '.';
        $slide->TrangThai = Input::get('Status');
        $slide->save();
        if (Input::hasFile('Image')) {
            $this->uploadImage(Input::file('Image'),$slide);
        } else {
            $slide->delete();
        }
        return redirect('/admin/slides');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        $data = $slide->getArrayInfo();
        $this->data['slide'] = $data;
        return view('slides.detail',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide = Slide::find($id);
        $slide->TrangThai = Input::get('Status');
        $slide->save();
        if (Input::hasFile('Image')) {
            $this->delete($slide);
            $this->uploadImage(Input::file('Image'),$slide);
        }
        return redirect('/admin/slides/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $this->delete($slide);
        $slide->delete();
        $rels['status']= 200;
        return response()->json($rels);
    }
}
