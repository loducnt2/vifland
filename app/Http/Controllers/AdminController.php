<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PostHistory;
use App\User;
use App\Models\Payment;
use DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
class AdminController extends Controller
{
    public function index(){
    	$product_posted = Product::count();
    	$product_current = Product::where('soft_delete',0)->count();
    	$views = Product::select('view')->get();
    	$view = 0;
    	foreach( $views as $vs ){
    		$view += intval($vs->view);
    	}
    	$post_history_0 = PostHistory::where('status',0)->count(); //chưa duyệt
    	$post_history_1 = PostHistory::where('status',1)->count(); //đã duyệt

    	if($post_history_0==0){
    		$post_history_00 = 0;
    	}else{
    		$post_history_00 = number_format(doubleval( $post_history_0*100/( $post_history_1 + $post_history_0)),0 );
    	}
    	if( $post_history_1 != 0 ){
    		$post_history_11 = number_format(100 - $post_history_00,0);
    	}else{
    		$post_history_11 = 0;
    	}
    	
    	$user_count = User::count();

    	$user_by_cash = User::orderBy('total_cash','desc')
    	->select('full_name','username','total_cash')
    	->limit(7)
    	->get();

    	$total_cashs = Payment::select('amount')->get(); //Tổng doanh thu
    	$total_cash = 0;
    	foreach( $total_cashs as $ps ){
    		$total_cash += intval($ps->amount);
    	}
    	$cashs_by_month = Payment::select('amount')->whereMonth('datetime', '=', date('m'))->get(); //Tổng doanh thu tháng này
    	$cash_by_month = 0;
    	foreach( $cashs_by_month as $ps ){
    		$cash_by_month += intval($ps->amount);
    	}

    	$cash = [];
    	for($i = 1; $i <= 12; $i++){
    		$cash_month = 0;
    		$cash_months = Payment::select('amount')->whereMonth('created_at', '=',$i)->get();
    		foreach( $cash_months as $ps ){
    			$cash_month += intval($ps->amount);
    		}

    		$cash[] = $cash_month;
    	}
    	//return $cash;
    	$email = DB::table('newsletters')->count();
    	return view('admin/index',compact('product_posted','product_current','view','user_count','email','post_history_0','post_history_1','post_history_00','post_history_11','user_by_cash','total_cash','cash_by_month','cash'));
        //return view('admin/index');
    }

    public function dashboard()
    {
        return response()->stream(function () {
            while (true) {
                if (connection_aborted()) {
                    break;
                }
                $payment = Payment::count();
                $account = User::count();
                $email = DB::table('newsletters')->count();
                $product_posted = Product::count();
                $product_current = Product::where('soft_delete',0)->count();
                $views = Product::select('view')->get();
                $view = 0;
                foreach( $views as $vs ){
                    $view += intval($vs->view);
                }
                $post_history_0 = PostHistory::where('status',0)->count(); //chưa duyệt
                $post_history_1 = PostHistory::where('status',1)->count(); //đã duyệt

                $cash = [];
                for($i = 1; $i <= 12; $i++){
                    $cash_month = 0;
                    $cash_months = Payment::select('amount')->whereMonth('created_at', '=',$i)->get();
                    foreach( $cash_months as $ps ){
                        $cash_month += intval($ps->amount);
                    }

                    $cash[] = $cash_month;
                }
                $total_cashs = Payment::select('amount')->get(); //Tổng doanh thu
                $total_cash = 0;
                foreach( $total_cashs as $ps ){
                    $total_cash += intval($ps->amount);
                }
                $cashs_by_month = Payment::select('amount')->whereMonth('datetime', '=', date('m'))->get(); //Tổng doanh thu tháng này
                $cash_by_month = 0;
                foreach( $cashs_by_month as $ps ){
                    $cash_by_month += intval($ps->amount);
                }




                $result = [
                    'payment'        =>$payment,
                    'account'        =>$account,
                    'email'          =>$email,
                    'product_posted' =>$product_posted,
                    'product_current'=>$product_current,
                    'view'           =>$view,
                    'post_history_0' =>$post_history_0,
                    'post_history_1' =>$post_history_1,
                    'cash'           =>$cash,
                    'total_cash'     =>$total_cash,
                    'cashs_by_month' =>$cashs_by_month,
                ];


                if ($result ) {
                    echo "data: ".json_encode($result)."\n\n";
                }
                ob_flush();
                flush();
                sleep(5);
            }
        }, 200, [
            'Cache-Control' => 'no-cache',
            'Content-Type' => 'text/event-stream',
        ]);
    }
}
