<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Province;
use App\Models\ProductCate;
use App\Models\FilterPrice;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $filter_price = FilterPrice::orderBy('id','asc')->get();
        $product_cate = ProductCate::orderBy('id','desc')->get();
        $province = Province::orderBy('orders','desc')->orderBy('name','asc')->get();
        $categories = Category::where('parent_id',NULL)->get();
        return view('/pages/home',compact('categories','province','product_cate','filter_price'));
    }
}
