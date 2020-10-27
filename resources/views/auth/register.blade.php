<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js
"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

@extends('layouts.app')
@section('title','Đăng ký')
@section('content')
<style>
.error {
    color: tomato;
    font-weight: bold;
    font-size: 12px;
}
</style>
<main>
    <section class="dangky login">
        <form action="{{ route('createUser') }}" method="POST" id="dangki">
            @csrf
            <div class="login-wrap">
                <div class="logo"><img src="./assets/logo/logo-footer-300.png" alt=""></div>
                <div class="box-login">
                    <div class="title">
                        <a href="{{route('login')}}"><span class="material-icons">keyboard_backspace</span></a>
                        <p> Đăng ký</p>
                    </div>
                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">person</span></div>
                        <div class="box-mid-se">
                            <input type="text" placeholder="Tên Đăng Nhập" name="username">
                            <label for="text" class="error"></label>
                        </div>
                    </div>
                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">lock</span></div>
                        <div class="box-mid-se">
                            <input type="password" placeholder="Mật khẩu" name="password" id="password">
                            {{-- <label for="text" class="error"></label> --}}
                        </div>
                        <div class="box-right-se"><span class="material-icons mk-icons"
                                onclick="showpass();">visibility</span></div>
                    </div>
                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">contact_phone</span></div>
                        <div class="box-mid-se">
                            <input type="email" placeholder="Email hoặc Số điện thoại" name="email">
                            {{-- <label for="text" class="error"></label> --}}
                        </div>
                    </div>
                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">assignment_ind</span></div>
                        <div class="box-mid-se">
                            <input type="text" placeholder="Chứng minh thư hoặc mã số thuế" name="card_id">
                            {{-- <label for="text" class="error"></label> --}}
                        </div>
                    </div>
                    <p class="dieukhoan">Bằng việc đăng ký tài khoản bạn đồng ý với <a href="">điều khoản dịch vụ</a>
                    </p>
                    <div class="button-submit">
                        <input type="submit" value="Đăng Ký">
                    </div>
                    <p class="logindef">Hoặc đăng ký bằng</p>
                    <div class="button-loginSocial"><a href=""><img src="./assets/icon/gmail.svg" alt="">
                            <p>Đăng ký bằng Gmail</p>
                        </a></div>
                    <div class="button-loginSocial"><a href=""><img src="./assets/icon/facebook.svg" alt="">
                            <p>Đăng ký bằng Facebook</p>
                        </a></div>
                </div>
            </div>
        </form>
    </section>
    <div class="index-page" id="js-page-verify" hidden></div>
</main>
@endsection
{{-- hiện password --}}
<script>
function showpass() {
    var password = document.getElementById('password');
    if (password.type == "password") {
        password.type = "text"
    } else {
        password.type = "password";
    }
}
</script>

{{-- form đăng ki --}}
<script>
$(document).ready(function() {
    $('#dangki').validate({

        rules: {

            'username': {
                required: true,
                maxlength: 60,
                minlength: 5,
            },

            'email': {
                email: true,
                required: true,
                maxlength: 255
            },
            'password': {
                required: true,
                maxlength: 255,
                minlength: 8,
            },
            'card_id': {
                required: true,
                digits: true
            },
        },
        messages: {
            'username': {
                required: "Tên đăng nhập không được để trống",
                minlength: "Vui lòng nhập tên tài khoản giữa 5 đến 60 kí tự",
                maxlength: "Vui lòng nhập tên tài khoản giữa 5 đến 60 kí tự"
            },
            'email': {
                required: "Emal không được để trống",
                email: "Nhập đúng định dạng Email",
                // maxlength: "Email must be less than or equal 255 letters",
            },

            'card_id': {
                required: "Số nhân dân không đươc để trống",
                digits: "Chỉ được nhập số"
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