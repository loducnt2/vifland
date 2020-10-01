<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\ProductCate;
class ProductCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod_cates = ProductCate::orderBy('id','asc')->get();
        return view('/test/product-cate/home',compact('prod_cates'));
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
        $cate = new ProductCate([
            'name'      => $req->name ,
            'language'  => $req->lang ,
            'slug'      => Str::slug($req->name,'-'),
            'status'    => 1,
        ]);
        $cate->save();
        return redirect('/test/product-cate/home'); 
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
        $cate = ProductCate::find($id);
        return view('/test/product-cate/edit',compact('cate'));
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
        $cate = ProductCate::find($id);
        $cate->name      = $req->name;
        $cate->language  = $req->lang;
        $cate->slug      = Str::slug($req->name,'-');
        $cate->status    = $req->status;
        $cate->orders    = $req->orders;
        $cate->update();
        return redirect('/test/product-cate/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = ProductCate::find($id);
        $cate->delete();
        return redirect('/test/product-cate/home');
    }
}
