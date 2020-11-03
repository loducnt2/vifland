<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductExtend;
use App\Models\Category;
use App\Models\TypeProduct;
use App\Models\Province;
class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$cate          = $request->cate;
    	$kyw           = $request->keyword;
    	$province      = $request->province;
    	$product_cate  = $request->product_cate;
    	$price       = $request ->price;

    	$products = Category::leftJoin('product','category.id','product.cate_id')
    	->leftJoin('product_extend','product.id','product_extend.product_id')
    	->leftJoin('type_of_product','product_extend.id','type_of_product.product_extend_id')
        ->leftJoin('province','product.province_id','province.id')
        ->leftJoin('district','product.district_id','district.id')
        ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
	    ->where('product.soft_delete',0)
	    ->where('category.parent_id',$cate)
    	->when($kyw, function ($q) use ($kyw) {
    	    return $q->where('product.title', 'like','%'.$kyw.'%');
    	})
    	->when($province, function ($q) use ($province) {
    	    return $q->where('product.province_id',$province);
    	})
    	->when($product_cate, function ($q) use ($product_cate) {

    	    return $q->whereIn('type_of_product.product_cate_id',$product_cate);
    	})
    	->when($price, function ($q) use ($price) {

    	    return $q->whereIn('product_extend.filter_price',$price);
    	})
    	->select(
            'product.id as product_id',
    		'product.title',
    		'product.slug',
            'product.view',
            'product.datetime_start',
    		'product_extend.filter_price',
            'product_extend.price',
    		'product.province_id',
    		'type_of_product.product_cate_id',
            'province.name as province',
            'district.name as district',
            'product_unit.name as unit',
            'product_extend.depth',
            'product_extend.facades',
            'product.view'
    	)
    	->get();
    	
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

    	return view('pages.category',compact('products','title','cate_child','provinces'));
    }
}
