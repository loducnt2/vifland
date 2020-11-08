<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Str;

class ImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Image::orderBy('id','asc')->get();
        return view('/admin/banner/danhsachbanner',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $banner = new Image([
            'name'      => $req->get("name") ,
            'status'  => $req->get("status"),
            'position'    => $req->get("position"),
            'parent_id' => $req->get("parent"),
        ]);
        $cate->save();
        return redirect('/admin/danh-sach-danh-muc'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Category::find($id);
       
        return view('/admin/danhmuc/capnhatdanhmuc',compact('$banner'));
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
       $banner = bannergory::find($id);
        $banner->name      = $req->get('name');
        $banner->status    = $req->get('status');
        $banner->image    = $req->get('image');
        $banner->position    = $req->get('position');
        $banner->save();
        return redirect('/admin/danh-sach-banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
