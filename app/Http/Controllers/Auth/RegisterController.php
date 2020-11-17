<?php

namespace App\Http\Controllers\Auth;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use App\Http\Requests\Register;
use App\Http\Requests\RegisterRequest;

use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Contact;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(RegisterRequest $data)
    {

        // Thêm email or SĐT vào bảng contact
        $email = $data->email;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = new User([
                'username'  => $data->username,
                'password'  => Hash::make($data->password),
                'user_type' => '0',
                'email'     => $email,
                'status'    => '1',
                'card_id'   => $data->card_id,
                'img'       => 'user.png',
            ]);
            $user->save();
        } else {
            $user = new User([
                'username'  => $data->username,
                'password'  => Hash::make($data->password),
                'user_type' => '0',
                'email'     => $email,
                'status'    => '1',
                'card_id'   => $data->card_id,
                'img'       => 'user.png',
            ]);
            $user->save();
        }
        Auth::login($user);
        return redirect('/')->with('status','Đăng kí thành công!');
    }

}
