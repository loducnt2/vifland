<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Payment;
class WalletController extends Controller
{
    //Danh sách
    public function index(){
        $users = User::orderBy('id','desc')->get();
        return view('admin/wallet/index',compact('users')) ;
    }
    // Cộng tiền thủ công
    public function addWallet(Request $request){
        $payment = Payment::create([
            'user_id' => $request->userid,
            'amount'  => $request->wallet
        ]);
        $user = User::find($request->userid);
        $wallet = $user->wallet;
        $total_cash = $user->total_cash;
        $user->wallet = $request->wallet + $wallet;
        $user->total_cash = $request->wallet + $total_cash;
        $user->save();
        return redirect()->back();

    }
}
