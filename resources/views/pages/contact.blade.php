@extends('layouts.master')
@section('title','Liên hệ')
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->
@stop
@section('content')
<style>
    label.error {
        position: static !important;
    }
</style>
<main>
    <section class="banner-top">
        <div class="img"> </div>
    </section>
    <div class="global-breadcrumb">
        <div class="max-width-container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">
                        <!--  <i class="ri-arrow-left-line icons-breadcrum"></i> -->Trang chủ
                        <!-- <span class="sll-breadcrum">&nbsp; (1.475.822 tin đăng)</span> -->
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('cate1')}}">
                        <p>Liên hệ 123</p>
                    </a></li>
            </ol>
        </div>
    </div>
    <section class="pages-lienhe">
        <section class="lienhe-l-1">
            <div class="container">
                <h1 class="section-title text-center">Liên hệ</h1>
                <div class="row">
                    <div class="col-xl-5">
                        <div class="warpper-content">
                            <div class="logo"> <img class="lazyload" data-src="./assets/logo/logo-footer-300.png" alt=""></div>
                            <h2 class="section-under-title">CÔNG TY CỔ PHẨN BẤT ĐỘNG SẢN VIVA HOMES</h2>
                            <div class="info">
                                <div class="wrapper"><span class="material-icons">room</span>
                                    <p> Cơ sở 3 trường FPT Polytechnic Công viên phẩn mềm Quang Trung, Quận 12, Thành
                                        Phố Hồ Chí Minh</p>
                                </div>
                                <div class="wrapper"> <span class="material-icons">call</span>
                                    <p> (+84) 0989.999.999</p>
                                </div>
                                <div class="wrapper"><span class="material-icons">print</span>
                                    <p> info@fpoly.com.vn</p>
                                </div>
                                <div class="wrapper"><span class="material-icons">mail</span>
                                    <p> vifland@fpoly.com.vn</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="wrapper-form">
                            <p>Quý khách vui lòng điền thông tin vào mẫu bên dưới và gửi những góp ý, thắc mắc cho chúng
                                tôi</p>
                            <div class="form-wrap">
                                <form id="form-contact1" action="{{route('up-contact')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-xl-6 col-sm-6 col-12 form-group">
                                            <input type="text" placeholder="Họ và Tên" id="name" name="name">
                                        </div>
                                        <div class="col-xl-6 col-sm-6 col-12 form-group">
                                            <input type="email " placeholder="Email" id="email" name="email">
                                        </div>
                                        <div class="col-xl-6 col-sm-6 col-12 form-group">
                                            <input type="text" placeholder="Số điện thoại" id="phone" name="phone">
                                        </div>
                                        <div class="col-xl-6 col-sm-6 col-12 form-group">
                                            <input type="text" placeholder="Địa chỉ" id="address" name="address">
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <input type="text" placeholder="Tiêu đề" id="title" name="title">
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <input id="content" name="content" rows="5" placeholder="Nội dung...">
                                        </div>
                                    </div>
                                    <div class="button">
                                        <button class="btn btn-submit" type="submit">Gửi</button>
                                    </div>
                                </form>
                                <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
                                <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js
"></script>
                                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
                                </script>
                                <script>
                                    $(document).ready(function() {
                                        // $("#form-contact1").hide();
                                        $("#form-contact1").validate({
                                            onfocusout: false,
                                            onkeyup: false,
                                            onclick: false,
                                            rules: {
                                                "name": {
                                                    required: true,

                                                },
                                                "email": {
                                                    required: true,
                                                    email: true
                                                },
                                                "title": {
                                                    required: true,
                                                },
                                                "address": {
                                                    required: true,
                                                },
                                                "phone": {
                                                    required: true,
                                                    number: true,
                                                    minlength: 10
                                                },
                                                "content": {
                                                    required: true,
                                                },

                                            },
                                            messages: {
                                                "name": {
                                                    required: "Bắt buộc nhập tên",

                                                },
                                                "email": {
                                                    required: "Bắt buộc nhập Email",
                                                    email: "Vui lòng nhập đúng email"
                                                },
                                                "phone": {
                                                    required: "Bắt buộc nhập số điện thoại",
                                                    number: "Vui lòng nhập đúng số điện thoại",
                                                    minlength: "Vui lòng nhập đúng số điện thoại",
                                                },
                                                "address": {
                                                    required: "Bắt buộc nhập địa chỉ",
                                                },
                                                "title": {
                                                    required: "Bắt buộc nhập tiêu đề",

                                                },
                                                "content": {
                                                    required: "Bắt buộc nhập nội dung",

                                                },


                                            }
                                        });
                                    })
                                </script>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="lienhe-l-2">
            <div class="container">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1333.0493696577748!2d106.62953699383226!3d10.852832765862265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529e76ef4ac4d%3A0x30d6a9932e802efe!2sFPT%20Polytechnic%20HCM%20-%20C%C6%A1%20s%E1%BB%9F%203!5e0!3m2!1svi!2s!4v1601302166398!5m2!1svi!2s" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </section>
    </section>
    <div id="js-page-verify" hidden></div>
</main>
@endsection
@section('footerScripts')

@stop