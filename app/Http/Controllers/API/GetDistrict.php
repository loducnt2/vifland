<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class GetDistrict extends Controller
{
	// Lấy quận/huyện theo tỉnh/thành phố
    public function getDistrictByProvince($id){
    	$district = District::where('province_id',$id)->orderBy('name','asc')->get();
    	return response()->json($district);
    	/*foreach($district as $dist){
    		echo '<option value="'.$dist->id.'">'.$dist->name.'</option>';
    	}*/
    }

    // Lấy phường xã theo quận/huyện

}
