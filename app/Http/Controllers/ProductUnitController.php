<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductUnit;
use App\Models\Category;
class ProductUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate_level1 = Category::orderBy('id','asc')->where('parent_id',NULL)->get();
        $prod_unit = ProductUnit::orderBy('id','asc')->get();
        return view('/test/product-unit/home',compact('prod_unit','cate_level1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $unit = new ProductUnit([
            'name'      => $req->name ,
            'language'  => $req->lang ,
            'status'    => 1,
            'type'      => $req->type,
        ]);
        $unit->save();
        return redirect('/test/product-unit/home');
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
        $unit = ProductUnit::find($id);
        return view('/test/product-unit/edit',compact('unit'));
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
        $unit = ProductUnit::find($id);
        $unit->name      = $req->name;
        $unit->language  = $req->lang;
        $unit->status    = $req->status;
        $unit->orders    = $req->orders;
        $unit->type      = $req->type;
        $unit->update();
        return redirect('/test/product-unit/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = ProductUnit::find($id);
        $unit->delete();
        return redirect('/test/product-unit/home');
    }
}
