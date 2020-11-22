<?php

namespace App\Http\Controllers;
use App\PriceTypePost;

use Illuminate\Http\Request;



class PriceTypePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = PriceTypePost::orderBy('id','asc')->get();
        return view('/admin/PriceTypeOfPost/danhsachPrice',compact('prices'));
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
        //
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
        $price = PriceTypePost::find($id);
        return view('/admin/PriceTypeOfPost/chinhsuaprice',compact('price'));
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
        
        $price = PriceTypePost::find($id);
       
        $price->price = $request->get('price');
       
        $price->save();
        return redirect('/admin/danh-sach-gia-vip');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = PriceTypePost::find($id);
        $price->delete();
        return redirect('/admin/danh-sach-gia-vip');
    }
}
