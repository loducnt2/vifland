@extends('layouts.master')
@section('title','Trang cá nhân ')
@section('headerStyles')

<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@section('content')

<main>
    <div class="global-breadcrumb">
        <div class="max-width-container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}"> <i class="ri-arrow-left-line icons-breadcrum"></i>Trang chủ</span></a></li>
                <li class="breadcrumb-item"><a href="#">
                        @if(isset($product_posted))
                        <p>Tin hiện tại</p>
                        @elseif(isset($product_wait))
                        <p>Tin đang chờ</p>
                        @elseif(isset($product_expire))
                        <p>Tin hết hạn</p>
                        @endif
                    </a></li>
                <div class="search">
                    <!-- <form action="">
                        <input type="text" placeholder="Bạn cần tìm hôm nay?">
                    </form> -->
                </div>
            </ol>
        </div>
    </div>
    <section class="thaydoithongtin">
        <div class="max-width-container">
            <div class="admin-wrap">
                <div class="row">
                    <div class="col-md-12 col-lg-3">
                        <div class="box-left-admin">

                            <div class="bl-1"><img src="{{asset('assets/avatar')}}/{{auth()->user()->img != NULL?auth()->user()->img:'user.png'}}" alt="">
                                <p>{{auth()->user()->full_name}}</p>
                            </div>
                            <div class="bl-2">
                                <div class="row">
                                    <div class="col-12">
                                        <span class="vifPay"><img src="{{asset('assets/icon/card.png')}}"
                                                alt="">{{number_format(auth()->user()->wallet)}} VNĐ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bl-3">
                                <div class="title-bl3"> <span class="material-icons">portrait</span>
                                    <p>Quản lý tài khoản cá nhân</p>
                                </div>
                                <ul>
                                    <li> <a href="{{route('profile')}}">Trang thay đổi thông tin cá nhân </a></li>
                                    <li> <a href="{{route('change-password')}}">Thay đổi mật khẩu</a></li>
                                    <!-- <li> <a href="">Số dư tài khoản </a></li> -->
                                    <li> <a href="{{route('add-money')}}">Nạp tiền</a></li>
                                    <li><a href="{{route('payment-history')}}">Lịch sử giao dịch</a></li>
                                </ul>
                                <div class="title-bl3"> <span class="material-icons">list_alt</span>
                                    <p>Quản lý tin đăng</p>
                                </div>
                                <ul>
                                    <li> <a href="{{route('article-posted')}}">Tin hiện tại</a></li>
                                    <li> <a href="{{route('article-wait')}}">Tin chờ đăng</a></li>
                                    <li> <a href="{{route('article-expire')}}">Tin hết hạn</a></li>
                                </ul>
                            </div>
                            <div class="bl-4"> <span class="material-icons">exit_to_app</span>
                                <a href="{{route('logout')}}">
                                    <p>Thoát tài khoản </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9">
                        <div class="box-right">
                            @yield('content_child')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="index-page" id="js-page-verify" hidden></div>
</main>



@endsection
{{-- Footer --}}
@section('footerScripts')

<script>
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#upload-image').click(function (e) {
    $('#upload').click(function (e) e.preventDefault();
            //    let formData = new FormData(this);
            //    $('#image-input-error').text('');
            $.ajax({
                type: 'post',
                url: 'google.com',
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    if (response) {
                        this.reset();
                        alert('Image has been uploaded successfully');
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#image-input-error').text(response.responseJSON.errors.file);
                }
            });

</script>
@endsection