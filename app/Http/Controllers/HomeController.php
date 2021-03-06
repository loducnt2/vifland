<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Province;
use App\Models\ProductCate;
use App\Models\FilterPrice;
use App\Models\Product;
use App\User;
use App\Notification;
use App\Models\ProductExtends;
use App\Models\PostHistory;
use App\Models\Favorited;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
            // $this->middleware('auth');
            // $this->middleware('verified');

        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        Product::where( 'datetime_start','<=', date('Y-m-d H:i',strtotime('now')) )->update(['status'=>1]);
        Product::where( 'datetime_end','<=', date('Y-m-d H:i',strtotime('now')) )->update(['soft_delete'=>1]);
        Product::where('datetime_delete','<=',date('Y-m-d H:i',strtotime('now') ))->delete();

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
       //->leftJoin('product_image','product_extend.id','product_image.product_extend_id')
       //->leftJoin('ward','product.ward_id','ward.id')
       ->where('post_history.status',1)
       ->where('datetime_start','<=',date('Y-m-d H:i',strtotime('now')))
       ->where('datetime_end','>',date('Y-m-d H:i',strtotime('now')))
       ->where('soft_delete',0)
       ->select(
           //'product_image.name as img',
           'product.id as product_id',
           'product.thumbnail',
           'product.slug as slug',
           'product.view',
           'product.datetime_start',
           'product.title',
           'product.type',
           'product.soft_delete',
           'product.datetime_end',
           'product_extend.address',
           'product_extend.price',
           'product_extend.product_cate',
           'product_extend.depth',
           'product_extend.facades',
           'product_extend.floors',
           'product_extend.bedroom',
           'province.name as province',
           'district.name as district',
           'product_unit.name as unit'
           //'ward.name as ward'
       )
       ->orderBy('product.type','asc')
       ->limit(5)
       ->get();

        $product_by_cate2 = Category::where('parent_id',2)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        //->leftJoin('product_image','product_extend.id','product_image.product_extend_id')
        //->leftJoin('ward','product.ward_id','ward.id')
        ->where('post_history.status',1)
        ->where('datetime_start','<=',date('Y-m-d H:i',strtotime('now')))
        ->where('datetime_end','>',date('Y-m-d H:i',strtotime('now')))
        ->where('soft_delete',0)
        ->select(
            //'product_image.name as img',
            'product.id as product_id',
            'product.thumbnail',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product.type',
            'product.soft_delete',
            'product.datetime_end',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'product_extend.floors',
            'product_extend.bedroom',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit'
            //'ward.name as ward'
        )
        ->orderBy('product.type','asc')
        ->limit(5)
        ->get();

        $product_by_cate3 = Category::where('parent_id',3)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        //->leftJoin('product_image','product_extend.id','product_image.product_extend_id')
        //->leftJoin('ward','product.ward_id','ward.id')
        ->where('post_history.status',1)
        ->where('datetime_start','<=',date('Y-m-d H:i',strtotime('now')))
        ->where('datetime_end','>',date('Y-m-d H:i',strtotime('now')))
        ->where('soft_delete',0)
        ->select(
            //'product_image.name as img',
            'product.id as product_id',
            'product.thumbnail',
            'product.slug as slug',
            'product.view',
            'product.datetime_start',
            'product.title',
            'product.type',
            'product.soft_delete',
            'product.datetime_end',
            'product_extend.address',
            'product_extend.price',
            'product_extend.product_cate',
            'product_extend.depth',
            'product_extend.facades',
            'product_extend.floors',
            'product_extend.bedroom',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit'
            //'ward.name as ward'
        )
        ->orderBy('product.type','asc')
        ->limit(5)
        ->get();



        if( auth()->check() ){
            $Duedate = PostHistory::leftJoin('product','post_history.product_id','product.id')
           ->where('post_history.user_id',auth()->user()->id)
           ->select(
               'product.id',
               'product.datetime_end'
           )
           ->get();
        }
        else {
            $Duedate = "";
        }
        session()->flash('duedate',$Duedate);

        $noti= Notification::orderBy('id','asc')
        ->where('status',1)
        ->get();
        session()->flash('noti',$noti);

        $count_cate1 = Category::where('parent_id',1)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->where('post_history.status',1)
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))
        ->where('product.status',1)
        ->where('soft_delete',0)
        /*->where('datetime_start','<=',date('Y-m-d',strtotime('now')))
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))*/
        ->count();

        $count_cate2 = Category::where('parent_id',2)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->where('post_history.status',1)
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))
        ->where('product.status',1)
        ->where('soft_delete',0)
        /*->where('datetime_start','<=',date('Y-m-d',strtotime('now')))
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))*/
        ->count();

        $count_cate3 = Category::where('parent_id',3)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->where('post_history.status',1)
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))
        ->where('product.status',1)
        ->where('soft_delete',0)
        /*->where('datetime_start','<=',date('Y-m-d',strtotime('now')))
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))*/
        ->count();

       //return $count_cate2;


        return view('/pages/home',compact(
            'categories',
            'province',
            'product_cate',
            'filter_price',
            'product_by_cate1',
            'product_by_cate2',
            'product_by_cate3',
            'count_cate1',
            'count_cate2',
            'count_cate3'
        ));

    }
    public function indexWithOneFolder($folderName,$fileName)
    {
        // Render perticular view file by foldername and filename
        if(view()->exists($folderName.".".$fileName)){
            return view($folderName.".".$fileName);
        }
        return abort('404');
    }
    public function indexWithTwoFolder($folderName1,$folderName2,$fileName)
    {
        // Render perticular view file by foldername and filename
        if(view()->exists($folderName1.".".$folderName2.".".$fileName)){
            return view($folderName1.".".$folderName2.".".$fileName);
        }
        return abort('404');
    }
}
