<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\ProductUnit;
class ProductExtendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cate)
    {
        $wards     = Ward::orderBy('name','asc')->get(); 
        $districts = District::orderBy('name','asc')->get();
        $provinces = Province::orderBy('orders','desc')->orderBy('name','asc')->get();
        $cate_1   = Category::where('slug',$cate)->first(); //Lấy id category thông qua slug
        $cate_2   = Category::where('parent_id',$cate_1->id)->get();//Lấy category con
        if($cate == "cho-thue-nha-dat"){
            $units   = ProductUnit::where('type',2)->get();//Lấy đơn vị theo category cha
        }else{
            $units   = ProductUnit::where('type',1)->get();//Lấy đơn vị theo category cha
        }
        return view('/pages/new',compact('cate_2','units','provinces','districts','wards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        //
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
        //
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
