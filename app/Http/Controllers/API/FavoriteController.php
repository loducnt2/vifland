<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorited;
class FavoriteController extends Controller
{
    public function addFavorite(Request $request){
        if( auth()->check() ){
            $product = Favorited::where('favorited.type',2)
            ->where('favorited.user_id',auth()->user()->id)
            ->where('product_extend_id',$request->productId)
            ->first();
            if( $product == NULL ){
                $favorite = Favorited::create([
                    'user_id'           => auth()->user()->id,
                    'product_extend_id' => $request->productId,
                    'type'              => 2,
                ]);
                return 1;
            }else{
                $favorite = Favorited::where('favorited.user_id',auth()->user()->id)
                ->where('product_extend_id',$request->productId)
                ->where('favorited.type',2)
                ->delete();
                return 2; 
            }
        }else{
            return 0;
        }
    }

    public function allFavorite(){
        if(auth()->check()){
            $favorite = Favorited::where('user_id',auth()->user()->id)->where('favorited.type',2)
            ->join('product','favorited.product_extend_id','product.id')
            ->where('product.soft_delete',0)
            ->select('product.id')
            ->get();
        }else{
            $favorite = "chưa có đăng nhập";
        }
        return $favorite;
    }
}
