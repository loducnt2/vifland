<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\ProductExtend;
use App\Models\ProductUnit;
use App\Models\ProductCate;
use App\Models\Product;
use App\Models\ProductImg;
use App\Models\PostHistory;
use App\Models\FilterPrice;
use App\Models\FilterFacades;
use App\Models\TypeProduct;
use App\Models\Favorited;
use App\User;
use Str;
class SearchController extends Controller
{
    public function index(Request $request)
    {
        //return $request;
    	$cate          = $request->cate;
    	$kyw           = $request->keyword;
    	$province      = $request->province;
    	$product_cate  = $request->product_cate;
    	$price       = $request ->price;
        
        if( $kyw == NULL && $province == NULL && $product_cate == NULL &&  $price == NULL ){
            $slug = Category::where('id',$cate)->value('slug');
            return redirect( route('cate',$slug) );
        }

    	$products = Category::leftJoin('product','category.id','product.cate_id')
    	->leftJoin('product_extend','product.id','product_extend.product_id')
    	->leftJoin('type_of_product','product_extend.id','type_of_product.product_extend_id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('post_history','product.id','post_history.product_id')
	    ->where('product.soft_delete',0)
	    ->where('category.parent_id',$cate)
        ->where('post_history.status',1)
    	->when($kyw, function ($q) use ($kyw) {
    	    return $q->where('product.title', 'like','%'.$kyw.'%');
    	})
    	->when($province, function ($q) use ($province) {
    	    return $q->where('product.province_id',$province);
    	})
    	->when($product_cate, function ($q) use ($product_cate) {

    	    return $q->whereIn('product_extend.product_cate',$product_cate);
    	})
    	->when($price, function ($q) use ($price) {

    	    return $q->whereIn('product_extend.filter_price',$price);
    	})
        
    	->select(
            'product.id as product_id',
            'product.thumbnail',
    		'product.title',
            'product.type',
    		'product.slug',
            'product.view',
            'product.datetime_start',
    		'product_extend.filter_price',
            'product_extend.filter_facades',
            'product_extend.price',
            'product_extend.floors',
            'product_extend.bedroom',
    		'product.province_id',
    		'type_of_product.product_cate_id',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit',
            'product_extend.depth',
            'product_extend.facades',
            'product.view'
    	)
        ->orderBy('product.type','asc')
    	->paginate(12);
    	
    	switch ($cate) {
    		case 1:
    			$title = "Mua Bán Nhà Đất Bất động sản Giá Rẻ, Mới Nhất 2020";
    			break;
    		case 2:
    			$title = "Cho Thuê Nhà Nguyên Căn Giá Rẻ, Chính Chủ Mới Nhất 2020";
    			break;
    		case 3:
    			$title = "Sang Nhượng Cửa Hàng, Mặt Bằng Giá Rẻ Mới Nhất 2020";
    			break;
    	}
    	$cate_child     = Category::where('parent_id',$cate)->get();
    	$provinces    = Province::orderBy('orders','desc')->orderBy('name','asc')->get();
        $content_province = Province::where('id',$request->province)->value('content');
        $filter_price = FilterPrice::orderBy('id','asc')->get();
        $filter_facades = FilterFacades::orderBy('id','asc')->get();
        $product_cate = ProductCate::orderBy('id','desc')->get();
    	return view('pages.category',compact('products','title','cate_child','provinces','content_province','filter_price','product_cate','filter_facades'));
    }

    public function filter(Request $request)
    {

        //return $request;
        $cate          = $request->cate_child;
        $floors        = $request->floors;
        $bedroom       = $request->bedroom;
        $province      = $request->province;
        $district      = $request->district;
        $ward          = $request->ward;
        $product_cate  = $request->product_cate;
        $price         = $request->price;
        $facades     = $request->facades;

        $products = Category::leftJoin('product','category.id','product.cate_id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        //s->leftJoin('type_of_product','product_extend.id','type_of_product.product_extend_id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->where('datetime_start','<=',date('Y-m-d',strtotime('now')))
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))
        ->where('product.soft_delete',0)
        ->where('post_history.status',1)
        //->where('category.parent_id',$cate)
        /*->when($kyw, function ($q) use ($kyw) {
            return $q->where('product.title', 'like','%'.$kyw.'%');
        })*/
        ->when($cate, function ($q) use ($cate) {
            return $q->whereIn('category.id',$cate);
        })
        ->when($province, function ($q) use ($province) {
            return $q->where('product.province_id',$province);
        })
        ->when($district, function ($q) use ($district) {
            return $q->where('product.district_id',$district);
        })
        ->when($ward, function ($q) use ($ward) {
            return $q->where('product.ward_id',$ward);
        })
        ->when($product_cate, function ($q) use ($product_cate) {
            return $q->whereIn('product_extend.product_cate',$product_cate);
        })
        /*->when($product_cate, function ($q) use ($product_cate) {

            return $q->whereIn('type_of_product.product_cate_id',$product_cate);
        })*/
        ->when($price, function ($q) use ($price) {

            return $q->whereIn('product_extend.filter_price',$price);
        })
        ->when($facades, function ($q) use ($facades) {

            return $q->whereIn('product_extend.filter_facades',$facades);
        })
        ->when($floors, function ($q) use ($floors) {

            return $q->where('product_extend.floors',$floors);
        })
        ->when($bedroom, function ($q) use ($bedroom) {

            return $q->where('product_extend.bedroom',$bedroom);
        })
        ->select(
            //'product_image.name as img',
            'product.id as product_id',
            'product.thumbnail as thumbnail',
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
        ->get();
        return $products;

    }

    public function getByCate($slug){
        $cate           = Category::where('slug',$slug)->value('id');
        $cate_child     = Category::where('parent_id',$cate)->get();
        $product_extend = Product::where('cate_id',$cate)->get();
        $wards        = Ward::orderBy('name','asc')->get();
        $districts    = District::orderBy('name','asc')->get();
        $provinces    = Province::orderBy('orders','desc')->orderBy('name','asc')->get();
        $filter_price = FilterPrice::orderBy('id','asc')->get();
        $filter_facades = FilterFacades::orderBy('id','asc')->get();
        $product_cate = ProductCate::orderBy('id','desc')->get();

        $products = Category::where('parent_id',$cate)
        ->leftJoin('product','category.id','product.cate_id')
        ->leftJoin('product_extend','product.id','product_extend.product_id')
        ->leftJoin('post_history','product.id','post_history.product_id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        //->leftJoin('product_image','product_extend.id','product_image.product_extend_id')
        //->leftJoin('ward','product.ward_id','ward.id')
        ->where('post_history.status',1)
        ->where('datetime_start','<=',date('Y-m-d',strtotime('now')))
        ->where('datetime_end','>',date('Y-m-d',strtotime('now')))
        ->where('soft_delete',0)
        ->select(
            //'product_image.name as img',
            'product.id as product_id',
            'product.thumbnail as thumbnail',
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
        ->paginate(12);

        switch ($cate) {
            case 1:
                $title = 'Mua Bán Nhà Đất';
                break;
            case 2:
                $title = 'Cho Thuê Nhà Đất';
                break;
            case 3:
                $title = 'Sang Nhượng Nhà Đất';
                break;
        }


        return view('pages/category',compact('cate_child','product_extend','title','products','wards','districts','provinces','filter_price','product_cate','filter_facades'));
    }
}
