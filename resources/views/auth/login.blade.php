@extends('layouts.app')
@section('title','Đăng nhập')
@section('content')
<style>
label.error {
    color: tomato;
    font-weight: bold;
    position: absolute;
    left: 0;
    bottom: -31px;

}

.form-group-input {
    position: relative;
}
</style>
<div class="ov-h" id="wrapper">
    <main>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js
"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <section class="login">
            <form method="POST" action="{{ route('login') }} " id="dangnhap">

                {{-- hiện session thông tin nếu --}}
                @csrf
                <div class="login-wrap">


                    <div class="logo"><a href="{{route('home')}}"><img class="lazyload"
                                data-src="./assets/logo/logo-footer-300.png" alt=""></a></div>


                    <div class="box-login">

                        <div class="title">Đăng nhập</div>
                        @if($errors->any())
                        <h6 class="error">{{$errors->first()}}</h6>
                        @endif
                        <label for="text" class="error"></label>
                        <div class="form-group-input">
                            <div class="box-left-se"><span class="material-icons">person</span></div>
                            <div class="box-mid-se">

                                <input id="username" type="text" class="form-control" name="username"
                                    value="{{ old('username') }}" autocomplete="username" autofocus
                                    placeholder="Tên đăng nhập">

                            </div>
                        </div>
                        <div class="form-group-input">
                            <div class="box-left-se"><span class="material-icons">lock</span></div>
                            <div class="box-mid-se">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password" placeholder="Mật khẩu" value="{{ old('password')}}">
                            </div>
                            <div class="box-right-se"><span class=" material-icons" id="showpass"
                                    onclick=" showpass(); ">visibility</span></div>
                        </div>
                        <label for="text" class="error"></label>
                        <div class=" qmk-f">
                            @if (Route::has('password.request'))
                            <a class="qmk" href="/forgot-password">Quên mật khẩu?</a>
                            @endif
                            <a class="dktk" href="{{route('register')}}">Đăng ký tài khoản mới</a>
                        </div>
                        <div class="button-submit">
                            <input type="submit" value="Đăng nhập">
                        </div>
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
<script>
$(document).ready(function() {
    $('#dangnhap').validate({

        rules: {

            'username': {
                required: true,
                maxlength: 60,
                minlength: 5,
            },


            'password': {
                required: true,
                maxlength: 255,
                minlength: 8,
            },

        },
        messages: {
            'username': {
                required: "Tên đăng nhập không được để trống",
                minlength: "Vui lòng nhập tên tài khoản giữa 5 đến 60 kí tự",
                maxlength: "Vui lòng nhập tên tài khoản giữa 5 đến 60 kí tự"
            },

            'password': {
                required: "Mật khẩu không được để trống",
                minlength: "Vui lòng nhập mật khẩu khoản  giữa 8 đến 255 kí tự",
                maxlength: "Vui lòng nhập tên tài khoản giữa 8 đến 255 kí tự"
            },
        },

    });
});
</script>

@endsection
{{-- form validate-login --}}

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js
"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
</script>
