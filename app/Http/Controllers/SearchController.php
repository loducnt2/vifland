<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductExtend;
use App\Models\Category;
class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$kyw           = $request->keyword;
    	$province      = $request->province;
    	$cate          = $request->cate;
    	$product_cate  = $request->product_cate;
    	//$price       = $request ->price;

    	$product = Category::where('category.id',$reques->cate)
    	->join('product','category.id','product.cate_id')

    	/*Post::when($text, function ($q) use ($text) {
    	        return $q->where('text', 'like', '%'.$text.'%');
    	    })
    	    ->when($pet, function ($q) use ($pet) {
    	        return $q->where('pet', $pet);
    	    })
    	    ->when($category, function ($q) use ($category) {
    	        return $q->where('category', $category);
    	    })
    	    ->when($city, function ($q) use ($city) {
    	        return $q->where('city', 'like', '%'.$city.'%');
    	    })
    	    ->get();*/
    	
    	return $request;
    }
}
