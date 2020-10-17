<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate_level1 = Category::orderBy('id','asc')->where('parent_id',NULL)->get();
        $cates = Category::orderBy('id','asc')->get();
        return view('/admin/danhmuc/danhsachdanhmuc',compact('cates','cate_level1'));
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
    public function store(Request $req)
    {
       
        $cate = new Category([
            'name'      => $req->get("name") ,
            'language'  => $req->get("lang"),
            'status'    => $req->get("status"),
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
        $cate = Category::find($id);
        $cate_level1 = Category::orderBy('id','asc')->where('parent_id',NULL)->get();
        return view('/admin/danhmuc/capnhatdanhmuc',compact('cate','cate_level1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $cate = Category::find($id);
        $cate->name      = $req->get('name');
        $cate->language  = $req->get('lang');
        $cate->slug      = Str::slug($req->name,'-');
        $cate->status    = $req->get('status');
        $cate->orders    = $req->get('orders');
        $cate->parent_id = $req->get('parent_id');
        $cate->save();
        return redirect('/admin/danh-sach-danh-muc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return redirect('/admin/danh-sach-danh-muc');
    }
}
