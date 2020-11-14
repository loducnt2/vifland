<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class WalletController extends Controller
{
    //Danh sách
    public function index(){
        $users = User::orderBy('id','desc')->get();
        return view('admin/wallet/index',compact('users')) ;
    }
    // Cộng tiền thủ công
    public function addWallet(Request $request){
        $user = User::find($request->userid);
        $wallet = $user->wallet;
        $user->wallet = $request->wallet + $wallet;
        $user->save();
        return redirect()->back();

    }
}
