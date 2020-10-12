<?php
use Illuminate\Support\Facades\Auth;
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    // login authenication

    // end login
    public function authenticated(Request $request, $user)
    {


        $user = Auth::user();
        $user->update([
            'last_login' => date('y/m/d H:i:s',strtotime('now')),
        ]);
        if ($user->user_type == 1) {
            return redirect('/admin');
        }
        if ($user->user_type == 0 ) {
            return redirect('/');
        }
    }

}
