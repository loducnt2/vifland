@extends('.pages.user.slidebar')
@section('title','Thông tin cá nhan')
@section('headerStyles')
@section('content_child')
<div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="active nav-link active" id="thaydoithongtin-tab" data-toggle="tab" href="#thaydoithongtin" role="tab"
        aria-controls="nav-home" aria-selected="true">Thay đổi thông tin cá nhân</a>
</div>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="thaydoithongtin" role="tabpanel" aria-labelledby="thaydoithongtin-tab">
        <form action="{{route('user-update',$profile->id)}}" method="post" enctype="multipart/form-data"
            id="form-profile">
            @csrf
            <div class="row form-wrap anhdaidien">
                <div class="col-md-12 col-lg-2 form-group">
                    <p class="text-f">Ảnh đại diện</p>
                </div>
                <div class="col-md-12 col-lg-10 form-group hinhdd">
                    <div class="wrap-img"> <img class="img" src="{{asset('assets/avatar')}}/{{$profile->img}}" alt="">
                        <label class="wrap-input" for="upload"> <em class="material-icons">add_a_photo</em>
                            <input id="upload" name="image" type="file" style="display:none">
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
                    <p class="text-f">Ngày sinh</p>
                    <?php
                            if( $profile->birthday != NULL ){  //:))))))))))))))))))
                                $birthday = explode('-',$profile->birthday);
                                $year = $birthday[0];
                                $month = $birthday[1];
                                $day = $birthday[2];

                            }else{
                                $year = 0;
                                $month = 0;
                                $day = 0;
                                //  $day1 = 0;
                            }
                        ?>
                </div>
                <div class="col-md-12 col-lg-10 form-group">
                    <div class="row">
                        <div class="col-4 form-group">
                            <!-- <input type="number" value="<?php if(isset($date)){ echo ''.$date[2];} ?>" min="0" placeholder="Ngày" name="date" id="date"> -->
                            <select class="input-select" name="date" id="date">
                                <option value="">Ngày</option>
                                @for( $i = 1; $i <= 31; $i++ ) <option value="{{$i}}" {{$i==$day?'selected':''}}>{{$i}}
                                    </option>
                                    @endfor

                            </select>
                        </div>
                        <div class="col-4 form-group">
                            <select class="input-select" name="month" id="month">
                                <option value="">Tháng</option>
                                @for ($i = 1; $i <= 12; $i++) <option value="{{$i}}" {{$i==$month?'selected':''}}>Tháng
                                    {{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-4 form-group">
                            <!-- <input type="number" min="0" placeholder="Năm" value="<?php if(isset($date)){echo ''.$date[0];} ?>" name="year" id="year"> -->
                            <select class="input-select" name="year" id="year">
                                <option value="">Năm</option>
                                @for ($i = 2020; $i >= 1930; $i--)
                                <option value="{{$i}}" {{$i==$year?'selected':''}}>{{$i}}</option>
                                @endfor
                            </select>
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
                            <input class="user" type="text" placeholder="Họ và tên" name="fullname"
                                value="{{$profile->full_name}}">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <input class="business" type="text" placeholder="Chứng minh nhân dân"
                                value="{{$profile->card_id}}">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <input class="phone" type="number" placeholder="Số điện thoại" name="phone"
                                value="{{$profile->phone}}">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <input class="add" type="text" name="address" placeholder="Địa chỉ"
                                value="{{$profile->address}}">
                        </div>
                    </div>
                    <div class="row last-form mt-20">
                        <div class="col-sm-12 col-md-6 form-group">
                            <input class="web" type="text" placeholder="Website" name="website"
                                value="{{$profile->website}}">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">

                            <input class="email" type="text" placeholder="{{$profile->email}}" readonly>
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <input class="facebook" type="text" placeholder="Facebook" value="{{$profile->facebook}}"
                                name="facebook">
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-save">
                <!-- <button class="button-huy" type="">Hủy bỏ </button> -->
                <button class="button-luu" type="submit " action="">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('footerScripts')
<script type="text/javascript">
$('#form-profile').submit(function(e) {
    let year = $('#year').val()
    let month = $('#month').val()
    let date = $('#date').val()
    if (year % 4 == 0) {
        if (month.indexOf(4, 6, 9, 11)) {
            if (date == 31) {
                e.preventDefault();
                toastr.warning('Ngày sinh không hợp lệ')
            }
        }
        if (month == 2) {
            if (date == 31 || date == 30) {
                e.preventDefault();
                toastr.warning('Ngày sinh không hợp lệ')
            }
        }
    } else {
        if (month.indexOf(4, 6, 9, 11)) {
            if (date == 31) {
                e.preventDefault();
                toastr.warning('Ngày sinh không hợp lệ')
            }
        }
        if (month == 2) {
            if (date == 31 || date == 30 || date == 29) {
                e.preventDefault();
                toastr.warning('Ngày sinh không hợp lệ')
            }
        }
    }

})
</script>
@endsection