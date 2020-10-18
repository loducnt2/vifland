<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CompareController extends Controller
{
    public function addCompare(Request $request){
    	$compare = Cookie::get('compare');
    	//return view('pages/compare',compact('compare'));
    	//$compare = $request->listcomp;
    	return $compare;
    }
    public function testCompare(Request $request){
    	
    }


}
