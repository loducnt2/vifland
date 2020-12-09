<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class CompareController extends Controller
{
    public function index(){
    	$arr = Cookie::get('compare');
        $products = [];
        if( $arr != null ){
            $compare = explode( ',',$arr);
            foreach( $compare as $comp ){
                $product = Product::where('product.id',intval($comp))
                ->leftJoin('product_extend','product.id','product_extend.product_id')
                ->leftJoin('product_unit','product_extend.unit_id','product_unit.id')
                ->leftJoin('province','product.province_id','province.id')
                ->leftJoin('district','product.district_id','district.id')
                ->leftJoin('product_cate','product_extend.product_cate','product_cate.id')
                ->select([
                    'product_unit.name as unit',
                    'product.*',
                    'product_extend.*',
                    'product_cate.name as product_cate',
                    'province.name as province',
                    'district.name as district'
                ])
                ->get();

                $products[] = $product;
            }
            return view('pages/compare',compact('products'));
        }else{
            return view('pages/compare',compact('products'));
        }
    	

    }
}
