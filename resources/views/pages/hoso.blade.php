@extends('layouts.master')
@section('title','Trang cá nhân ')
@section('headerStyles')

<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@section('content')

{{-- trước khi đăng nhập --}}
<main>
    <div class="global-breadcrumb">
        <div class="max-width-container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> <i class="ri-arrow-left-line icons-breadcrum"></i>Mua/ Bán
                        <span class="sll-breadcrum">&nbsp; (1.475.822 tin đăng)</span></a></li>
                <li class="breadcrumb-item"><a href="#">
                        <p>Mở bán dự án đô thị sinh thái thông minh Aqua City, phía Đông thành phố Hồ Chí Minh Bạn tìm
                            gì hôm nay?</p>
                    </a></li>
                <div class="search">
                    <form action="">
                        <input type="text" placeholder="Bạn cần tìm hôm nay?">
                    </form>
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


                            {{-- var_dump($user->full_name); --}}

                            <div class="bl-1"><img class="lazyload"
                                    data-src="{{asset('assets/avatar')}}/{{$profile->img}}" alt="">
                                <p>{{$profile->full_name}}</p>
                            </div>
                            <div class="bl-2">
                                <div class="row">
                                    <div class="col-12"><span class="vifPay"> <img class="lazyload"
                                                data-src="{{asset('assets/icon/card.png')}}"
                                                alt="">{{number_format(auth()->user()->wallet)}} VNĐ</span></div>
                                    <!-- <div class="col-6"><span class="lkngay"><a href="">Liên kết ngay <span
                                                    class="material-icons">keyboard_arrow_right</span></a></span></div> -->
                                    <!-- <div class="col-12"><span class="lkvi"><img
                                                src="{{asset('assets/icon/warning.png')}}" alt="">Chưa liên kết
                                            ví</span><span class="text">Liên kết để hưởng khuyến mãi với ưu đãi bạn
                                            nhé</span></div> -->
                                </div>
                            </div>
                            <div class="bl-3">
                                <div class="title-bl3"> <span class="material-icons">portrait</span>
                                    <p>Quản lý tài khoản cá nhân</p>
                                </div>
                                <ul>
                                    <li> <a class="#" href="">Trang thay đổi thông tin cá nhân </a></li>
                                    <li> <a href="#">Thay đổi mật khẩu</a></li>
                                    <li> <a href="#">Số dư tài khoản </a></li>
                                    <li> <a href="#">Nạp tiền</a></li>
                                </ul>
                                <div class="title-bl3"> <span class="material-icons">list_alt</span>
                                    <a href="/user/my-article">
                                        <p>Quản lý tin đăng</p>
                                    </a>
                                </div>
                                <ul>
                                    <li> <a href="#">Tin đã đăng</a></li>
                                    <li> <a href="#">Tin chờ đăng</a></li>
                                    <li> <a href="#">Chờ xác nhận </a></li>
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
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link" id="thaydoithongtin-tab" data-toggle="tab"
                                        href="#thaydoithongtin" role="tab" aria-controls="nav-home"
                                        aria-selected="true">Thay đổi thông tin cá nhân</a>

                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="thaydoithongtin" role="tabpanel"
                                        aria-labelledby="thaydoithongtin-tab">
                                        <form action="{{route('user-update',$profile->id)}}" method="post"
                                            enctype="multipart/form-data" id="form-profile">
                                            @csrf
                                            <div class="row form-wrap anhdaidien">
                                                <div class="col-md-12 col-lg-2 form-group">
                                                    <p class="text-f">Ảnh đại diện</p>
                                                </div>
                                                <div class="col-md-12 col-lg-10 form-group hinhdd">
                                                    <div class="wrap-img"> <img class="img lazyload"
                                                            data-src="{{asset('assets/avatar')}}/{{$profile->img}}"
                                                            alt="">
                                                        <label class="wrap-input" for="upload"> <em
                                                                class="material-icons">add_a_photo</em>
                                                            <input id="upload" name="image" type="file"
                                                                style="display:none">
                                                        </label>
                                                        <span class="text-danger" id="image-input-error"></span>
                                                    </div>
                                                    <div class="text">
                                                        {{-- cập nhật họ tên --}}
                                                        <p>{{$profile->full_name}}</p>
                                                        @if(Auth::check() && Auth::user()->user_type == "1")
                                                        <span>Quản trị viên</span>
                                                        @else
                                                        <span>Nhà môi giới</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-wrap">
                                                <div class="col-md-12 col-lg-2 form-group">
                                                    <p class="text-f">Loại đối tượng</p>
                                                </div>
                                                <div class="col-md-12 col-lg-10 form-group bdb">
                                                    @if(Auth::check() && Auth::user()->user_type == "1")
                                                    <span>Quản trị viên</span>
                                                    @else
                                                    <span>Nhà môi giới</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row form-wrap">
                                                <div class="col-md-12 col-lg-2 form-group">
                                                    <p class="text-f">Giới tính</p>
                                                </div>
                                                <div class="col-md-12 col-lg-10 form-group bdb d-flex">
                                                    <div class="checked">
                                                        <input id="nam" type="radio" value="1" name="gender"
                                                            {{ ($profile->gender=="1")? "checked" : "" }}>
                                                        <label for="nam">Nam</label>
                                                    </div>
                                                    <div class="checked">
                                                        <input id="nu" type="radio" value="2" name="gender"
                                                            {{ ($profile->gender=="2")? "checked" : "" }}>
                                                        <label for="nu">Nữ</label>
                                                    </div>
                                                    <div class="checked">
                                                        <input id="khac" type="radio" value="3" name="gender"
                                                            {{ ($profile->gender=="3")? "checked" : "" }}>
                                                        <label for="khac">Khác</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-wrap thongtinform">
                                                <div class="col-md-12 col-lg-2 form-group">
                                                    <?php
                                                    $birthday = $profile->birthday;
                                                    $date = explode("-", $birthday);
                                                    if ($birthday == "") {
                                                        $date[0] = "";
                                                        $date[1] = "";
                                                        $date[2] = "";
                                                    }
                                                    // echo(''.$fdate);
                                                    ?>
                                                    <p class="text-f">Ngày sinh</p>
                                                    {{-- cắt chuỗi ngày sinh--}}

                                                </div>
                                                <div class="col-md-12 col-lg-10 form-group">
                                                    <div class="row">
                                                        <div class="col-4 form-group">
                                                            <input type="number" value="<?php if (isset($date)) {
                                                                                            echo '' . $date[2];
                                                                                        } ?>" min="0"
                                                                placeholder="Ngày" name="date" id="date">
                                                            <!-- "Tạm đóng để sử dụng" -->
                                                        </div>
                                                        <div class="col-4 form-group">
                                                            <select class="input-select" name="month" id="month">
                                                                <option hidden="" disabled="" selected value="">
                                                                    <?php
                                                                    if (isset($date)) {
                                                                        echo 'Tháng ' . $date[1];
                                                                    } ?>
                                                                </option>
                                                                @for ($i = 1; $i <= 12; $i++)
                                                                    {{-- <option value="{{$i}}" name="" id="">Tháng
                                                                    {{$i}}</option>
                                                                    @endfor --}}
                                                                    <option value="{{$i}}">Tháng {{$i}}</option>

                                                                    @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-4 form-group">
                                                            <input type="number" min="0" placeholder="Năm"
                                                                value="<?php if (isset($date)) {
                                                                                                                        echo '' . $date[0];
                                                                                                                    } ?>" name="year" id="year">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-wrap thongtinform">
                                                <div class="col-md-12 col-lg-2 form-group">
                                                    <p class="text-f">Thông tin chi tiết</p>
                                                </div>
                                                <div class="col-md-12 col-lg-10 form-group">
                                                    <div class="row last-form">
                                                        <div class="col-sm-12 col-md-6 form-group">
                                                            <input class="user" type="text" placeholder="Họ và tên"
                                                                name="fullname" value="{{$profile->full_name}}">
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 form-group">
                                                            <input class="business" type="text"
                                                                placeholder="Chứng minh nhân dân"
                                                                value="{{$profile->card_id}}">
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 form-group">
                                                            <input class="phone" type="text" placeholder="Số điện thoại"
                                                                name="phone" value="{{$profile->phone}}">
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 form-group">
                                                            <input class="add" type="text" name="address"
                                                                placeholder="Địa chỉ" value="{{$profile->address}}">
                                                        </div>
                                                    </div>
                                                    <div class="row last-form mt-20">
                                                        <div class="col-sm-12 col-md-6 form-group">
                                                            <input class="web" type="text" placeholder="Website"
                                                                name="website" value="{{$profile->website}}">
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 form-group">

                                                            <input class="email" type="text"
                                                                placeholder="{{$profile->email}}" readonly>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 form-group">
                                                            <input class="facebook" type="text" placeholder="Facebook"
                                                                value="{{$profile->facebook}}" name="facebook">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="button-save">
                                                <button class="button-huy" type="">Hủy bỏ </button>
                                                <button class="button-luu" type="submit " action="">Lưu thay
                                                    đổi</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="thaydoimk" role="tabpanel"
                                        aria-labelledby="thaydoimk-tab">
                                        <form action="{{route('user-changePassword',$profile->id)}}" method="post">
                                            @csrf

                                            <div class="row form-wrap thongtinform">
                                                <div class="col-md-12 col-lg-3 form-group">
                                                    <p class="text-f">Mật khẩu hiện tại</p>
                                                </div>
                                                <div class="col-md-12 col-lg-4 form-group">
                                                    <input type="text" placeholder="Nhập mật khẩu hiện tại" value=""
                                                        name="password">
                                                    <p class="notemk">Vì lý do an ninh, bạn phải xác minh mật khẩu hiện
                                                        tại trước khi đặt mật khẩu mới</p>
                                                </div>
                                            </div>
                                            <div class="row form-wrap thongtinform">
                                                <div class="col-md-12 col-lg-3 form-group">
                                                    <p class="text-f">Mật khẩu mới</p>
                                                </div>
                                                <div class="col-md-12 col-lg-4 form-group">
                                                    <input type="text" placeholder="Nhập mật khẩu mới"
                                                        name="newpassword">
                                                </div>
                                            </div>
                                            <div class="row form-wrap thongtinform">
                                                <div class="col-md-12 col-lg-3 form-group">
                                                    <p class="text-f">Xác nhận mật khẩu mới</p>
                                                </div>
                                                <div class="col-md-12 col-lg-4 form-group">
                                                    <input type="text" placeholder="Nhập lai mật khẩu mới">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-lg-3"> </div>
                                                <div class="col-md-12 col-lg-4 tdmk-s">
                                                    <button class="button-huy" type="submit">Hủy</button>
                                                    <button class="button-luu" type="submit">Lưu thay đổi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="index-page" id="js-page-verify" hidden></div>
</main>



</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}
</body>
@if(Auth::check() && Auth::user()->id != $profile->id)
<script>
$("#form-profile :input").prop("disabled", true);
</script>
@endif

</html>
@endsection
{{-- Footer --}}
@section('footerScripts')

@endsection

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// $('#upload-image').click(function(e) {
//             $('#upload').click(function(e) e.preventDefault();
//                     //    let formData = new FormData(this);
//                     //    $('#image-input-error').text('');
//                     $.ajax({
//                         type: 'post',
//                         url: 'google.com',
//                         data: formData,
//                         contentType: false,
//                         processData: false,
//                         success: (response) => {
//                             if (response) {
//                                 this.reset();
//                                 alert('Image has been uploaded successfully');
//                             }
//                         },
//                         error: function(response) {
//                             console.log(response);
//                             $('#image-input-error').text(response.responseJSON.errors.file);
//                         }
//                     });
//
</script>