<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Payment;
class WalletController extends Controller
{
    //Danh sách
    public function index(){
        $users = User::orderBy('id','desc')->paginate(10);
        return view('admin/wallet/index',compact('users')) ;
    }
    // Cộng tiền thủ công
    public function addWallet(Request $request){
        $payment = Payment::create([
            'user_id' => $request->userid,
            'amount'  => $request->wallet,
            'noti_payment' => 1,
        ]);
        $user = User::find($request->userid);
        $wallet = $user->wallet;
        $total_cash = $user->total_cash;
        $user->wallet = $request->wallet + $wallet;
        $user->total_cash = $request->wallet + $total_cash;
        $user->save();
        return redirect()->back();

    }

    public function Detail_payment($id){
        $payment = Payment::where('user_id',$id)->orderBy('created_at','desc')->paginate(10);
        return view('/admin/wallet/detail_wallet',compact('payment'));
    }
   
}
