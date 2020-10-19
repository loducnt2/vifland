@extends('layouts.app')
@section('title','Đăng ký')
@section('content')
<main>
    <section class="dangky login">
        <form action="{{ route('createUser') }}" method="POST">
            @csrf
            <div class="login-wrap">
                <div class="logo"><img src="./assets/logo/logo_orther_pages.png" alt=""></div>
                <div class="box-login">
                    <div class="title">
                        <a href="{{route('login')}}"><span class="material-icons">keyboard_backspace</span></a>
                        <p> Đăng ký</p>
                    </div>
                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">person</span></div>
                        <div class="box-mid-se">
                            <input type="text" placeholder="Tên Đăng Nhập" name="username">
                        </div>
                    </div>
                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">lock</span></div>
                        <div class="box-mid-se">
                            <input type="password" placeholder="Mật khẩu" name="password" id="password">
                        </div>
                        <div class="box-right-se"><span class="material-icons mk-icons" onclick="showpass();">visibility</span></div>
                    </div>
                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">contact_phone</span></div>
                        <div class="box-mid-se">
                            <input type="text" placeholder="Email hoặc Số điện thoại" name="email">
                        </div>
                    </div>
                    <div class="form-group-input">
                        <div class="box-left-se"><span class="material-icons">assignment_ind</span></div>
                        <div class="box-mid-se">
                            <input type="text" placeholder="Chứng minh thư hoặc mã số thuế" name="card_id">
                        </div>
                    </div>
                    <p class="dieukhoan">Bằng việc đăng ký tài khoản bạn đồng ý với <a href="">điều khoản dịch vụ</a></p>
                    <div class="button-submit">
                        <input type="submit" value="Đăng Ký">
                    </div>
                    <p class="logindef">Hoặc đăng ký bằng</p>
                    <div class="button-loginSocial"><a href=""><img src="./assets/icon/gmail.svg" alt="">
                            <p>Đăng ký bằng Gmail</p></a></div>
                    <div class="button-loginSocial"><a href=""><img src="./assets/icon/facebook.svg" alt="">
                            <p>Đăng ký bằng Facebook</p></a></div>
                </div>
            </div>
        </form>
    </section>
    <div class="index-page" id="js-page-verify" hidden></div>
</main>
@endsection
{{-- hiện password --}}
<script>
    function showpass(){
       var password  = document.getElementById('password');
       if(password.type == "password")
        {
            password.type="text"
        }
        else{
            password.type="password";
        }
    }
</script>

