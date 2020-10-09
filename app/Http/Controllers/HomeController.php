<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Province;
use App\Models\ProductCate;
use App\Models\FilterPrice;
use App\Models\Product;
use App\Models\ProductExtends;
use App\Models\PostHistory;
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

        $product_by_cate1 = Category::where('parent_id',1)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        //->leftJoin('ward','product.ward_id','ward.id')
        ->where('post_history.status',1)
        ->select(
            'product.id as product_id',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit'
            //'ward.name as ward'
        )
        ->orderBy('product.type','desc')
        ->limit(5)
        ->get();

        $product_by_cate2 = Category::where('parent_id',2)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        //->leftJoin('ward','product.ward_id','ward.id')
        ->where('post_history.status',1)
        ->select(
            'product.id as product_id',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit'
            //'ward.name as ward'
        )
        ->orderBy('product.type','desc')
        ->limit(5)
        ->get();

        $product_by_cate3 = Category::where('parent_id',3)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        //->leftJoin('ward','product.ward_id','ward.id')
        ->where('post_history.status',1)
        ->select(
            'product.id as product_id',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit'
            //'ward.name as ward'
        )
        ->orderBy('product.type','desc')
        ->limit(5)
        ->get();

        //return $product_by_cate1;

        return view('/pages/home',compact(
            'categories',
            'province',
            'product_cate',
            'filter_price',
            'product_by_cate1',
            'product_by_cate2',
            'product_by_cate3'
        ));
    }
}
