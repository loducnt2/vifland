<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

class GetZone extends Controller
{
	// Lấy quận/huyện theo tỉnh/thành phố
    public function getDistrictByProvince($id){
    	$districts = District::where('province_id',$id)->orderBy('name','asc')->get();
    	foreach($districts as $district){
    		echo '<option value="'.$district->id.'" district_id="'.$district->id.'">'.$district->name.'</option>';
    	}
    }

    // Lấy phường xã theo quận/huyện
    public function getWardByDistrict($id){
    	$wards = Ward::where('district_id',$id)->orderBy('name','asc')->get();
    	foreach($wards as $ward){
    		echo '<option value="'.$ward->id.'" ward_id="'.$ward->id.'">'.$ward->name.'</option>';
    	}
    }

    public function contentProvince($id){
        $content = Province::where('id',$id)->value('content');
        return $content;
    }

}
