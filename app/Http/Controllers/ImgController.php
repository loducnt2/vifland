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
            //'name'      => $request->get("name") ,
            'status'  => $request->get("status"),
            'position'    => $request->get("position"),
        ]);
        if ($request->has('img')) {
                 $file = $request->file('img');
                 $name = $file->getClientOriginalName();
                 //$extension = $file->getClientOriginalExtension();
                 //$filename = $name.'.'.$extension;
                 $file->move("assets/banner/", $name);
                 $banner->name = $name;


        //    // $name = Str::slug($request->input('name')).'_'.time();
        //     $folder ='/assets/banner';
        //     $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        //     $this->uploadOne($image, $folder, 'public', $name);
        //     $banner->profile_image = $filePath;
        }
        $banner->save();

        

        return redirect('/admin/danh-sach-banner'); 
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
        $banner = Image::find($id);
       
        return view('/admin/banner/capnhatbanner',compact('banner'));
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
       $banner = Image::find($id);
        $banner->status    = $request->get('status');
        $banner->position    = $request->get('position');
        if ($request->has('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $file->move(public_path('/../../assets/banner/'), $name);
            $banner->name = $name;


   //    // $name = Str::slug($request->input('name')).'_'.time();
   //     $folder ='/assets/banner';
   //     $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
   //     $this->uploadOne($image, $folder, 'public', $name);
   //     $banner->profile_image = $filePath;
   }
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
        $banner = Image::find($id);
        $banner->delete();
        return redirect('/admin/danh-sach-banner');
    }
}
