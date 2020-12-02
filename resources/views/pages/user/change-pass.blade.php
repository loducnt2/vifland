@extends('.pages.user.slidebar')
@section('title','Thay đổi mật khẩu')
@section('headerStyles')

<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@section('content_child')
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="active nav-link active" id="thaydoimk-tab" data-toggle="tab" href="#thaydoimk"
                role="tab" aria-controls="thaydoimk" aria-selected="true">Thay đổi mật
                khẩu</a>
        </div>
        <div class="tab-content " id="nav-tabContent">
            <div class="tab-pane fade show active" id="thaydoimk" role="tabpanel"
                aria-labelledby="thaydoimk-tab">
                <form action="{{route('user-changePassword',$id)}}" method="post">
                    @csrf

                    <div class="row form-wrap thongtinform">
                        <div class="col-md-12 col-lg-3 form-group">
                            <p class="text-f">Mật khẩu hiện tại</p>
                        </div>
                        <div class="col-md-12 col-lg-4 form-group">
                            <input type="text" placeholder="Nhập mật khẩu hiện tại" value=""
                                name="password">
                            <!-- <p class="notemk">Vì lý do an ninh, bạn phải xác minh mật khẩu hiện
                                tại trước khi đặt mật khẩu mới.</p> -->
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
@endsection
@section('footerScripts')

@endsection


