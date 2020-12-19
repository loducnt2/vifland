@extends('layouts.app')

@section('content')
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
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                    class="btn btn-link p-0 m-0 align-baseline">{{ __('Click nếu bạn không nhận được mail xác minh') }}</button>.
            </form>
        </div>
    </div>
</section>
@endsection