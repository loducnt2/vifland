<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js
"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

@extends('layouts.app')
@section('title','Đăng ký')
@section('content')
<style>
label {
    width: 200px;
    /* background-color:red; */
    /* float:left; */
    /* margin-top:80px; */
    position: absolute;
    left: 40px;
    margin-top: 80px;
    /* top:100px; */
    width: 600px;
    color: tomato;
    /* font-weight: bold; */
    font-size: 13px;
    font-weight: bold;
}
</style>
<main>

    <section class="dangky login">

        <form action="{{ route('createUser') }}" method="POST" id="dangki">
            <?php //Hiển thị thông báo lỗi
            ?>

            @if ( Session::has('error') )

            <div class="alert alert-danger alert-dismissible" role="alert">

                <strong>{{ Session::get('error') }}</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

            </div>

            @endif
            @csrf

            <div class="login-wrap">
                <div class="logo"><img class="lazyload" data-src="./assets/logo/logo-footer-300.png" alt=""></div>
                <div class="box-login">
                    <div class="title">
                        <a href="{{route('login')}}"><span class="material-icons">keyboard_backspace</span></a>
                        <p> Đăng ký</p>
                    </div>

                    <label for="text" class="error">
                        <?php echo $errors->first('username'); ?>
                    </label>

                    <div class="form-group-input">


                        <div class="box-left-se"><span class="material-icons">person</span></div>
                        <div class="box-mid-se">

                            <input type="text" placeholder="Tên Đăng Nhập" name="username"
                                value="{{ old('username') }}">
                        </div>

                    </div>

                    {{-- <label for="text" class="error"></label> --}}
                    <div class="error"></div>
                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">lock</span></div>
                        <div class="box-mid-se">
                            <input type="password" placeholder="Mật khẩu" name="password" id="password"
                                value="{{ old('password') }}">
                            {{-- <label for="text" class="error"></label> --}}
                        </div>
                        <div class="box-right-se"><span class="material-icons mk-icons"
                                onclick="showpass();">visibility</span></div>
                    </div>

                    <div class="form-group-input">

                        <div class="box-left-se"><span class="material-icons">contact_phone</span></div>
                        <div class="box-mid-se">

                            <input type="email" placeholder="Hãy nhập email" name="email" value="{{ old('email') }}"
                                aria-required="true" aria-invalid="false">
                            <label for="text" class="error">
                                <?php echo $errors->first('email'); ?>
                            </label>
                        </div>
                    </div>

                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">assignment_ind</span></div>
                        <div class="box-mid-se">
                            <input type="text" placeholder="Chứng minh thư" name="card_id" value="{{ old('card_id') }}">
                            <label for="text" class="error"></label>
                        </div>
                    </div>
                    </p>
                    <div class="button-submit">
                        <input type="submit" value="Đăng Ký">
                    </div>
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
<script>

</script>
{{-- form đăng ki --}}
<script>
$(document).ready(function() {
    // validate text validate username
    $.validator.addMethod("validUsername", function(value, element) {
        return /^[a-zA-Z0-9_.-]+$/.test(value);
    }, "Please enter a valid username");

    // thêm validate end with email

    jQuery.validator.addMethod("end_with", function(value, element) {

        if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
            return true;
        } else {
            return false;
        }
    }, "Email không đúng định dạng!.");

    $('#dangki').validate({

        rules: {

            'username': {
                required: true,
                maxlength: 60,
                minlength: 5,
                validUsername: true,
            },

            'email': {
                email: true,
                end_with: true,
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
                maxlength: "Vui lòng nhập tên tài khoản giữa 5 đến 60 kí tự",
                validUsername: "Vui lòng nhập tên người dùng đúng định dạng"
            },
            'email': {
                required: "Emal không được để trống",
                email: "Nhập đúng định dạng Email",
                end_with: "Email phải có sau nút @"

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