<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class CompareController extends Controller
{
    public function index(Request $request){
    	/*$compare = Cookie::get('compare');
    	return view('pages/compare',compact('compare'));
    	$compare = $request->listcomp;
    	return $compare;*/
    	$arr = Cookie::get('compare');
    	$compare = explode( ',',$arr);
    	foreach( $compare as $comp ){
    		$product = Product::where('product.id',$comp)
    		->join('product_extend','product.id','product_extend.product_id')
    		->join('product_unit','product_extend.unit_id','product_unit.id')
    		->join('province','product.province_id','province.id')
    		->join('district','product.district_id','district.id')
    		->select([
    			'product_unit.name as unit',
    			'product.*',
    			'product_extend.*',
    			'province.name as province',
    			'district.name as district'
    		])
    		->get();
    		$products[] = $product;
    	}
    	


    	return view('pages/compare',compact('products'));

    }
}
