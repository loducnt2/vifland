@extends('.pages.user.slidebar')
@section('title','Thông tin cá nhân')
@section('headerStyles')
@section('content_child')
@if(Auth::check() && Auth::user()->username != $profile->username)
<script>
$("#form-profile :input").prop("disabled", true);
</script>
@endif
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
                    <div class="wrap-img"> <img class="lazyload img" data-src="{{asset('assets/avatar')}}/{{$profile->img}}" alt="" onerror="this.src='{{asset('assets/avatar/')}}/user.png' ">
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
                    @if(Auth::check() && Auth::user()->email_verified_at =="")
                        {{-- nếu user không kích hoạt --}}
                        {{-- <a href=""></a> --}}

                        <span class="badge badge-warning"><a href="/resend">Kích hoạt tài khoản</a></span>
                    @endif
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

                </div>
                <div class="col-sm-5 form-group">
                    <input class="calendar" type="datetime" id="borndate" value="{{date('d/m/Y',strtotime($profile->birthday))}}" name="birthday">
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
                            <input class="phone" type="text" placeholder="Số điện thoại" name="phone"
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/bootstrap-datepicker.vi.min.js') }}"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script type="text/javascript">
var date = new Date();
var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
$("#borndate").datepicker({
    language: 'vi',
    format: 'dd/mm/yyyy',
    changeMonth: true,
    changeYear: true,
    yearRange: '1930:2010',
    defaultDate: null
}).on('change', function() {
    $(this).valid(); // triggers the validation test
    // '$(this)' refers to '$("#datepicker")'
});
// $('#form-profile').submit(function(e) {
//     let year = $('#year').val()
//     let month = $('#month').val()
//     let date = $('#date').val()
//     if (year % 4 == 0) {
//         if (month.indexOf(4, 6, 9, 11)) {
//             if (date == 31) {
//                 e.preventDefault();
//                 toastr.warning('Ngày sinh không hợp lệ')
//             }
//         }
//         if (month == 2) {
//             if (date == 31 || date == 30) {
//                 e.preventDefault();
//                 toastr.warning('Ngày sinh không hợp lệ')
//             }
//         }
//     } else {
//         if (month.indexOf(4, 6, 9, 11)) {
//             if (date == 31) {
//                 e.preventDefault();
//                 toastr.warning('Ngày sinh không hợp lệ')
//             }
//         }
//         if (month == 2) {
//             if (date == 31 || date == 30 || date == 29) {
//                 e.preventDefault();
//                 toastr.warning('Ngày sinh không hợp lệ')
//             }
//         }
//     }

// });
</script>
@endsection
