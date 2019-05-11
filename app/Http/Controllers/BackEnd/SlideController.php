<?php

namespace App\Http\Controllers\BackEnd;

use App\Libraries\ImageLib;
use App\Models\Slide;
use Illuminate\Http\Request;
use Input;


use App\Http\Controllers\Controller;

class SlideController extends Controller
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
        $slides = Slide::all();
        $data = [];
        foreach ($slides as $slide) {
            $data[] = $slide->getArrayInfo();
        }
        $this->data['slides'] = $data;
        return view('slides/index',$this->data);
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
    function uploadImage($photo,$sanpham) {
        $date_dir_name = md5( date_format($sanpham->Created_at, 'm-Y'));
        $key = str_random(6);
        $full_item_photo_dir = config('image.image_root').'/slides/'.$date_dir_name;
        $fileName = $sanpham->SlideId.'_'.$key;
        $size = config('image.sanphams');
        ImageLib::upload_image($photo, $full_item_photo_dir, $fileName, config('image.images.slides'), 0);
        $sanpham->Ten = $fileName;
        $sanpham->save();
    }
    function delete($sanpham) {
        $date_dir_name = md5( date_format($sanpham->Created_at, 'm-Y'));
        $full_item_photo_dir = config('image.image_root').'/slides/'.$date_dir_name;
        ImageLib::delete_image( $full_item_photo_dir, $sanpham->Ten, config('image.images.slides'), 0);
    }
}
