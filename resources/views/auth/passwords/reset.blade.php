@extends('layouts.app')

@section('title','Đổi mật khẩu')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
.reset-password {
    padding-top: 100px;
    background-image: url(http://vifland.com/assets/bg/bg_login.png);
    background-position: 50%;
    background-size: cover;
    width: 100%;
    min-height: 100vh;
}

.reset-password .logo {
    width: 270px;
    margin: 0 auto;
    padding-bottom: 40px;
}

.reset-password .logo a {
    display: block;
    width: 100%;
    height: 100%;
}

.reset-password .logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.reset-password .box-reset {
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 3px 21px 0 hsla(0, 0%, 82%, .5);
    border-radius: 8px;
    background-color: #fff;
    padding: 16px 32px;
    width: 100%;
    color: #000;
    font-size: .875rem;
}

.reset-password .title-reset {
    padding-top: 20px;
    font-size: 1.5rem;
    font-weight: 700;
    text-align: center;
}

.reset-password .button-submit {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
    border: 0;
    border-radius: 5px;
    background-color: #ab843a;
    width: 100%;
    height: 52px;
    color: #fff;
    font-size: .875rem;
    font-weight: 500;
}
</style>
<div class="container reset-password">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="box-reset">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="http://127.0.0.1:8000/assets/logo/logo-footer-300.png"
                            alt=""></a>
                </div>
                <div class="title-reset">{{ __('Đặt lại mật khẩu') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                    autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Mật khẩu') }}</label>
                            <div class="col-md-12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-12 col-form-label">{{ __('Xác nhận mật khẩu') }}</label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn button-submit">
                                    {{ __('Đặt lại mật khẩu') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection