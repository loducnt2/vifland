<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Toastr;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    public function sendResetLinkEmail(Request $request)
{
    $this->validate($request, ['email' => 'required|email']);
    $user_check = User::where('email', $request->email)->first();

    if (!$user_check == "1" ) {
        Toastr::error('Tài khoản không tồn tại, vui lòng kiểm tra lại','Thông báo');
        return redirect()->back();

    } else {
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            Toastr::success('Chúng tôi sẽ gửi liên kết khôi phục mật khẩu vào hòm thư của bạn','Thông báo');
        }

        return back()->withErrors(
            ['email' => trans($response)]
        );
    }
}
}
