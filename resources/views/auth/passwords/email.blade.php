{{-- @extends('layouts.app') --}}
@extends('layouts.master')
@section('title','Quên mật khẩu')
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->
@stop
@section('content')
<main>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <section class="quenmk login">
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="login-wrap">
                <div class="logo"><img src="./assets/logo/logo-footer-300.png" alt=""></div>
                <div class="box-login">
                    <div class="title"><a href="{{route('login')}}"><span
                                class="material-icons">keyboard_backspace</span></a>
                        <p> Đặt lại mật khẩu</p>
                    </div>
                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">contact_phone</span></div>
                        <div class="box-mid-se">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                    </div>
                    <div class="button-submit">
                        <input type="submit" value="Đặt lại mật khẩu">
                    </input>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <div class="index-page" id="js-page-verify" hidden></div>
</main>
@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@endsection
