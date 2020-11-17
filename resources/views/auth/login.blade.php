@extends('layouts.app')
@section('title','Đăng nhập')
@section('content')
<style>
    .invalid-feedback{
        color:green;
    }
</style>
<div class="ov-h" id="wrapper">
    <main>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}
        <section class="login">



            <form method="POST" action="{{ route('login') }}">

                {{-- hiện session thông tin nếu --}}
                @csrf
                <div class="login-wrap">
                    <div class="logo"><a href="{{route('home')}}"><img src="./assets/logo/logo-footer-300.png"
                                alt=""></a></div>
                    @if(Session::has('msg'))
                    <p class="alert alert-danger">{{ Session::get('msg') }}</p>
                    @endif

                    <div class="box-login">
                        <div class="title">Đăng nhập</div>
                        @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                        @endif
                        <div class="form-group-input">
                            <div class="box-left-se"><span class="material-icons">person</span></div>
                            <div class="box-mid-se">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" autocomplete="username" autofocus
                                    placeholder="Tên đăng nhập">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group-input">
                            <div class="box-left-se"><span class="material-icons">lock</span></div>
                            <div class="box-mid-se">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password" placeholder="Mật khẩu">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="box-right-se"><span class=" material-icons" id="showpass"
                                    onclick=" showpass(); ">visibility</span></div>
                        </div>
                        <div class=" qmk-f">
                            @if (Route::has('password.request'))
                            <a class="qmk" href="/forgot-password">Quên mật khẩu?</a>
                            @endif
                            <a class="dktk" href="{{route('register')}}">Đăng ký tài khoản mới</a>
                        </div>
                        <div class="button-submit">
                            <input type="submit" value="Đăng nhập">
                        </div>
                        <p class="logindef">Hoặc đăng nhập bằng</p>
                        <div class="button-loginSocial"><a href=""><img src="./assets/icon/gmail.svg" alt="">
                                <p class="m-0">Đăng nhập bằng Gmail</p>
                            </a></div>
                        <div class="button-loginSocial"><a href=""><img src="./assets/icon/facebook.svg" alt="">
                                <p class="m-0">Đăng nhập bằng Facebook</p>
                            </a></div>
                    </div>
                </div>
            </form>
        </section>
        <div class="index-page" id="js-page-verify" hidden></div>
    </main>
</div>
<div id="searchfancybox" style="display: none;">
    <div class="container">
        <div class="content">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Tìm sản phẩm...">
                <button class="searchbutton btn btn__search"><em class="material-icons">search</em></button>
            </div>
        </div>
    </div>
</div>
@endsection
