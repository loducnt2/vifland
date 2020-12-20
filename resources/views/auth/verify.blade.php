@extends('layouts.app')

@section('content')
<!-- Hiện conflig -->
<style>
    .verify_email {
        position: relative;
        background-image: url(../assets/bg/bg_login.png);
        background-position: 50%;
        background-size: cover;
        width: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .box-verify {
        max-width: 650px;
        box-shadow: 0 3px 21px 0 hsla(0, 0%, 82%, .5);
        border-radius: 8px;
        background-color: #fff;
        border: 0;
        margin: 0 15px;
    }

    .card-header {
        width: 100%;
        height: 50px;
        background: #22429d;
        background: linear-gradient(169deg, #22429d 0%, #273879 100%);
        background: #22429d url(https://cdn-mobile.meeyland.com/images/bgtop3x.png) no-repeat center -40px/100% auto;
        display: flex;
        align-items: center;
        padding: 0 0 0 9px;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
        text-transform: uppercase;
    }

    .card-body {
        text-align: center;
    }

    .box-form {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .box-form button {
        padding: 0 25px;
        height: 50px;
        background: linear-gradient(169deg, #22429d 0%, #273879 100%);
        color: white !important;
        font-weight: bold;
        font-size: 14px;
    }

    .card-header,
    .card-body {
        border: none;
    }
</style>
<section class="verify_email">
    <div class="card box-verify">
        <div class="card-header">{{ __('Vui lòng xác minh địa chỉ email') }}</div>
        <div class="card-body">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('Link xác minh đã được gửi đến email của bạn') }}
            </div>
            @endif
            {{ __('Trước khi đăng nhập, hãy truy cập email để có thể xác minh tài khoản.') }}
            {{ __('Nếu bạn không nhận được email') }},
            <form class="box-form" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn">{{ __('Không nhận được mail xác minh') }}</button>
            </form>
        </div>
    </div>
</section>
@endsection