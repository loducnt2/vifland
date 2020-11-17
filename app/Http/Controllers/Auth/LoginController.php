<?php
use Illuminate\Support\Facades\Auth;
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;
use Toastr;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function
        protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    // login authenication
    public function login(Request $request)
{
    // $username =
    // Hệ thống tìm user kiểm tra mật khẩu - Thọ
    $username = $request->input('username');
    // tìm username và password trong database
    $query = DB::table('user')->where('username',$username)->first();
    if(!$query){
        // nếu user không có mặt trong database thì sẽ thông báo "Không thấy người dùng"
        Toastr::error('Tài khoản không tồn tại,vui lòng kiểm tra lại','Thông báo');
        return redirect()->back();
    }
    else{
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'status' => '1'])){
            // nếu đúng mật khẩu
            return $this->sendLoginResponse($request);
        }
        else{

            Toastr::error('Sai mật khẩu,vui lòng kiểm tra lại','Thông báo');
            return redirect()->back();
        }
    }
    // {
    //     dd('Có tồn tại trong Database');
    //     // Updated this line
    //     // dd(true);
    //
    //     // OR this one
    //     // return $this->authenticated($request, auth()->user());
    // }
    // else
    // {
    //     dd('Không tồn tại trong Database');
    //
    //

    // }
}


    public function authenticated(Request $request, $user)
    {
        $user = Auth::user();
        // Kiểm tra dữ liệu nhập vào
        // tài khoản bị ban
        $username = $request->input('username');
        $password = $request->input('password');
        if ($user->status == 0 ) {
            return redirect ('/login')->with(Auth::logout())->with('msg','Tài khoản đã bị ban ! ');
        }
        $user->update([
            'last_login' => date('y/m/d H:i:s',strtotime('now')),
        ]);
        if ($user->user_type == 1) {
            return redirect ('/');
        }
        else {
        return redirect('/');
        }
            // check password mật khẩu


    }

}
