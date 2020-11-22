<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Payment;
class PaymentController extends Controller
{
    public function create(Request $request)
    {
        $vnp_TmnCode = "MNR0GBSC"; //Mã website tại VNPAY 
        $vnp_HashSecret = "AHVEMQRMJESXLLHSFDVMBMKLWGFDLPYR"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('return-payment');


        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function return(Request $request)
    {
        $url = route('payment-history');
        $noti1 = array(
            'message' => 'Nạp tiền thành công', 
            'alert-type' => 'success'
        );
        $noti2 = array(
            'message' => 'Giao dịch không thành công', 
            'alert-type' => 'error'
        );
        if($request->vnp_ResponseCode == "00") {
        	//Lưu vào db
            $s = substr($request->vnp_PayDate,12,2);
            $i = substr($request->vnp_PayDate,10,2);
            $h = substr($request->vnp_PayDate,8,2);
            $d  = substr($request->vnp_PayDate,6,2);
            $m = substr($request->vnp_PayDate,4,2);
            $y = substr($request->vnp_PayDate,0,4);
            $date = $y.'-'.$m.'-'.$d.' '.$h.':'.$i.':'.$s;
        	$payment = Payment::create([
        	    'user_id'      => auth()->user()->id,
                'bank_code'    => $request->vnp_BankCode,
                'bank_trans_no'=>$request->vnp_BankTranNo,
                'trade_code'   => $request->vnp_TransactionNo,
        	    'amount'       => $request->vnp_Amount/100,
                'datetime'     => $date,
        	]);
        	$user = User::find(auth()->user()->id);

        	$wallet = $user->wallet;
        	$total_cash = $user->total_cash;

        	$user->wallet = $request->vnp_Amount/100 + $wallet;
        	$user->total_cash = $request->vnp_Amount/100 + $total_cash;
        	$user->save();
        	//end

            return redirect($url)->with($noti1);
        }else{
        	return redirect($url)->with($noti2);
        }
        
    }
}
