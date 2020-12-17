@extends('layouts.master')
@section('title','Gia hạn tin')
@section('headerStyles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.css">

@stop
@section('content')
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
            </ol>
        </div>
    </div>
    <section class="dangbaiviet">
        <form class="formDangBaiViet" action="{{route('add-date-article')}}" method="post"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{$product_id}}">
            <div class="max-width-container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 mx-auto">
                        <h3 class="text-center">Gia Hạn Tin</h3>

                        <div class="row loaitindang">
                            <div class="col-12">
                                <div class="title">
                                    <h5>Loại tin đăng</h5><a href="" data-toggle="modal" data-target="#cacgoitin">So
                                        sánh các gói tin </a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="wrap-vip">
                                    <div class="checked">
                                        <input id="tinthuong" type="radio" value="4" name="type" checked>
                                        <label for="tinthuong">Tin Thường</label>
                                    </div>
                                    <div class="checked">
                                        <input id="vip1" type="radio" value="1" name="type">
                                        <label class="vip1" for="vip1">Tin VIP 1</label>
                                    </div>
                                    <div class="checked">
                                        <input id="vip2" type="radio" value="2" name="type">
                                        <label class="vip2" for="vip2">Tin VIP 2</label>
                                    </div>
                                    <div class="checked">
                                        <input id="vip3" type="radio" value="3" name="type">
                                        <label class="vip3" for="vip3">Tin VIP 3</label>
                                    </div>
                                    <input id="money-wallet" type="number" value="{{auth()->user()->wallet}}" hidden>
                                </div>
                                <div class="wrap-vip-mobile">
                                    <div class="form-group-sl1 sl-1 select-many">
                                        <select class="select1" name="loainhadat">
                                            <option value="tinthuong"> <strong>Tin
                                                    thường&nbsp;</strong>(Miễn phí)
                                            </option>
                                            <option class="vip1" value="vip1">
                                                <p>TIN VIP 1&nbsp;</p>(15.000 ₫ tin/ngày)
                                            </option>
                                            <option class="vip2" value="vip2"> <span>TIN VIP
                                                    2&nbsp;</span>(25.000 ₫
                                                tin/ngày)</option>
                                            <option class="vip3" value="vip3"> <span>TIN VIP
                                                    3&nbsp;</span>(35.000 ₫
                                                tin/ngày)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="wrap-moTaVip active" id="tinthuong-ct">
                                    <div class="row">
                                        <div class="col-6">
                                            <table>
                                                <tr>
                                                    <td class="mb-30">Giá: </td>
                                                    <td class="mb-30"> <strong>Miễn Phí</strong></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Hiển thị dưới tất các tin VIP</span></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Hiển thị dưới tất các tin VIP</span></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Hiển thị dưới tất các tin VIP</span></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Hiển thị dưới tất các tin VIP</span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <div class="img"> <a href="{{asset('assets/icon/vips1.jpg')}}"
                                                    data-fancybox="images"> <img class="lazyload"
                                                        data-src="{{asset('assets/icon/vips1.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END -->
                                <div class="wrap-moTaVip" id="vip1-ct">
                                    <div class="row">
                                        <div class="col-6">
                                            <table>
                                                <tr>
                                                    <td class="mb-30">Giá: </td>
                                                    <td class="mb-30"> <strong>40.000 ₫
                                                            tin/ngày</strong></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Đứng đầu danh sách các tin đăng</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Có tiêu đề <em style="color:#993393">CHỮ
                                                                IN HOA MÀU
                                                                TÍM</em></span></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Hiển thị dưới tất các tin VIP</span></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Hiển thị dưới tất các tin VIP</span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <div class="img"><a href="{{asset('assets/icon/vips2.jpg')}}"
                                                    data-fancybox="images"> <img class="lazyload"
                                                        data-src="{{asset('assets/icon/vips2.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-moTaVip" id="vip2-ct">
                                    <div class="row">
                                        <div class="col-6">
                                            <table>
                                                <tr>
                                                    <td class="mb-30">Giá: </td>
                                                    <td class="mb-30"> <strong>25.000 ₫
                                                            tin/ngày</strong></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Hiển thị dưới tin VIP 1, trên tin VIP 3
                                                            và tin
                                                            thường</span></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Có tiêu đề <em style="color: #dd8c43">CHỮ
                                                                IN HOA MÀU
                                                                CAM</em></span></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Được chèn link video vào trong tin
                                                            đăng</span></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Được đăng tối đa 30 ảnh</span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <div class="img"><a href="{{asset('assets/icon/vips3.jpg')}}"
                                                    data-fancybox="images"> <img class="lazyload"
                                                        data-src="{{asset('assets/icon/vips3.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-moTaVip" id="vip3-ct">
                                    <div class="row">
                                        <div class="col-6">
                                            <table>
                                                <tr>
                                                    <td class="mb-30">Giá: </td>
                                                    <td class="mb-30"> <strong>15.000 ₫
                                                            tin/ngày</strong></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Hiển thị dưới tin VIP1, VIP2 và trên tin
                                                            thường</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Có tiêu đề <em style="color: #b18734">Chữ
                                                                thường màu vàng
                                                                đồng</em></span></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Được chèn link video vào trong tin
                                                            đăng</span></td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="material-icons">done</span></td>
                                                    <td> <span>Được đăng tối đa 30 ảnh</span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <div class="img"><a href="{{asset('assets/icon/vips4.jpg')}}"
                                                    data-fancybox="images"> <img class="lazyload"
                                                        data-src="{{asset('assets/icon/vips4.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END -->
                                <div class="col-12">
                                    <div class="row wrap-lich">

                                        <div class="col-md-4 form-group">
                                            <label for="songayvip">Ngày đăng bài</label>
                                            <input class="calendar" type="datetime" name="date_start" id="testdate">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="songayvip">Giờ đăng bài</label>
                                            <input class="timepicker" type="text" name="time_start" id="timepicker"
                                                data-mintime="now" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="songayvip">Số ngày</label>
                                            <select class="selectNgay" name="songaydangbai">
                                                <option value="7">7</option>
                                                <option value="15">15</option>
                                                <option value="30">30</option>
                                                <option value="90">90</option>
                                            </select>
                                        </div>
                                        <!-- <div class="col-6 form-group">
                                            <label for="songayvip">Ngày kết thúc</label>
                                            <input class="calendar" id="ngayktvip" type="datetime" name="datetime_end">
                                        </div> -->
                                    </div>
                                    <div class="wrap-des-vip" id="sub-vip1">
                                        <div class="wrap-left"><img class="lazyload"
                                                data-src="{{asset('assets/icon/vip1.svg')}}" alt="">
                                            <div class="wrap-text">
                                                <p style="color:#993393">Tin VIP 1 - Gói 7 ngày</p><small>Từ
                                                    ngày
                                                    12/10/2020</small>
                                            </div>
                                        </div>
                                        <div class="wrap-right">
                                            <div class="wrap-text"><strong> <span class="total"></span></strong><span>
                                                    <del class="priceBase">280.000đ</del>
                                                    <p> <span>(-</span><span class="phantram"></span><span>%)</span>
                                                    </p>
                                                </span></div>
                                        </div>
                                    </div>
                                    <div class="wrap-des-vip" id="sub-vip2">
                                        <div class="wrap-left"><img class="lazyload"
                                                data-src="{{asset('assets/icon/vip2.svg')}}" alt="">
                                            <div class="wrap-text">
                                                <p style="color:#dd8c43">Tin VIP 2 - Gói 7 ngày</p><small>Từ
                                                    ngày
                                                    12/10/2020</small>
                                            </div>
                                        </div>
                                        <div class="wrap-right">
                                            <div class="wrap-text"><span class="total"></span></strong><span>
                                                    <del class="priceBase">280.000đ</del>
                                                    <p><span>(-</span><span class="phantram"></span><span>%)</span></p>
                                                </span></div>
                                        </div>
                                    </div>
                                    <div class="wrap-des-vip" id="sub-vip3">
                                        <div class="wrap-left"><img class="lazyload"
                                                data-src="{{asset('assets/icon/vip3.svg')}}" alt="">
                                            <div class="wrap-text">
                                                <p style="color:#b18734">Tin VIP 3 - Gói 7 ngày</p><small>Từ
                                                    ngày
                                                    12/10/2020</small>
                                            </div>
                                        </div>
                                        <div class="wrap-right">
                                            <div class="wrap-text"><strong><span class="total"></span></strong><span>
                                                    <del class="priceBase">280.000đ</del>
                                                    <p><span>(-</span><span class="phantram"></span><span>%)</span></p>
                                                </span></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row wrap-tongthanhtoan">
                                            <div class="tongThanhToan-box">
                                                <div class="ttt-1">
                                                    <p>Thành tiền (Gồm VAT)</p>
                                                    <p> <span class="total">0</span></p>
                                                </div>
                                                <div class="ttt-2">
                                                    <p>Khuyến mại</p>
                                                    <p>0 ₫</p>
                                                </div>
                                                <hr>
                                                <div class="ttt-3"><strong>Thanh toán</strong><strong>
                                                        <span class="total">0</span>
                                                        <input type="text" name="totalPriceVip" value="0" readonly
                                                            style="display:none" disabled>

                                                        <!-- HUY -->
                                                        <input type="number" name="pricePost" value="0"
                                                            style="display:none">
                                                    </strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END -->

                                    <!-- END -->
                                    <div class="col-12 wrap-button-dbv">
                                        <div class="row">
                                            <!-- <button class="button-huy" type="submit">Hủy bỏ</button> -->
                                            <button class="button-luu" type="submit">Gia hạn</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
        <div class="modal fade" id="cacgoitin" tabindex="-1" role="dialog" aria-labelledby="cacgoitin"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="close-button-modal"></div>
                    <p class="section-title"> So Sánh các gói tin </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box-tin">
                                <div class="wrap-1">
                                    <div class="button-vip">Tin vip 1</div>
                                    <div class="wrap-text">
                                        <h4>40,000đ</h4>
                                        <p>Tin/ Ngày</p>
                                    </div>

                                </div>
                                <div class="wrap-2">
                                    <table>
                                        <tr>
                                            <td>
                                                <p>Gói 7 ngày <span>(KM 5%)</span></p>
                                            </td>
                                            <td><span>266,000 đ</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 15 ngày <span>(KM 10%)</span></p>
                                            </td>
                                            <td><span>540,000 đ</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 30 ngày <span>(KM 15%)</span></p>
                                            </td>
                                            <td><span>1,020,000 đ</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 90 ngày <span>(KM 20%)</span></p>
                                            </td>
                                            <td><span>2,880,000 đ</span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="wrap-3">
                                    <ul>
                                        <li>Đứng đầu danh sách các tin đăng</li>
                                        <li>Có tiêu đề &nbsp;<span style="color:#993393"> CHỮ IN HOA MÀU TÍM</span></li>
                                        <li>Được chèn link video vào trong tin đăng</li>
                                        <li>Được đăng tối đa 30 ảnh</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-tin">
                                <div class="wrap-1">
                                    <div class="button-vip" style="background-color:#DD8C43">Tin vip 2</div>
                                    <div class="wrap-text">
                                        <h4>25,000đ</h4>
                                        <p>Tin/ Ngày</p>
                                    </div>

                                </div>
                                <div class="wrap-2">
                                    <table>
                                        <tr>
                                            <td>
                                                <p>Gói 7 ngày <span>(KM 5%)</span></p>
                                            </td>
                                            <td><span>166,250 đ</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 15 ngày <span>(KM 10%)</span></p>
                                            </td>
                                            <td><span>337,500 đ</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 30 ngày <span>(KM 15%)</span></p>
                                            </td>
                                            <td><span>637,500 đ</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 90 ngày <span>(KM 20%)</span></p>
                                            </td>
                                            <td><span>1,800,000 đ</span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="wrap-3">
                                    <ul>
                                        <li>Hiển thị dưới tin VIP 1, trên tin VIP 3 và tin thường</li>
                                        <li>Có tiêu đề &nbsp;<span style="color:#dd8c43"> CHỮ IN HOA MÀU Cam</span></li>
                                        <li>Được chèn link video vào trong tin đăng</li>
                                        <li>Được đăng tối đa 30 ảnh</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-tin">
                                <div class="wrap-1">
                                    <div class="button-vip" style="background-color:#B18734">Tin vip 3</div>
                                    <div class="wrap-text">
                                        <h4>15,000đ</h4>
                                        <p>Tin/ Ngày</p>
                                    </div>

                                </div>
                                <div class="wrap-2">
                                    <table>
                                        <tr>
                                            <td>
                                                <p>Gói 7 ngày <span>(KM 5%)</span></p>
                                            </td>
                                            <td><span>99,750 đ</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 15 ngày <span>(KM 10%)</span></p>
                                            </td>
                                            <td><span>202,500 đ</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 30 ngày <span>(KM 15%)</span></p>
                                            </td>
                                            <td><span>382,500 đ</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 90 ngày <span>(KM 20%)</span></p>
                                            </td>
                                            <td><span>1,080,000 đ</span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="wrap-3">
                                    <ul>
                                        <li>Hiển thị dưới tin VIP1, VIP2 và trên tin thường</li>
                                        <li>Có tiêu đề &nbsp;<span style="color:#b18734"> CHỮ THƯỜNG MÀU VÀNG
                                                ĐỒNG</span>
                                        </li>
                                        <li>Được chèn link video vào trong tin đăng</li>
                                        <li>Được đăng tối đa 30 ảnh</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-tin">
                                <div class="wrap-1">
                                    <div class="button-vip" style="background-color:#2b2b2b">Tin thường</div>
                                    <div class="wrap-text">
                                        <h4>Miễn phí</h4>
                                        <p>Tin/ Ngày</p>
                                    </div>

                                </div>
                                <div class="wrap-2">
                                    <table>
                                        <tr>
                                            <td>
                                                <p>Gói 7 ngày <span>(KM 0%)</span></p>
                                            </td>
                                            <td><span>Miễn phí</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 15 ngày <span>(KM 0%)</span></p>
                                            </td>
                                            <td><span>Miễn phí</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 30 ngày <span>(KM 0%)</span></p>
                                            </td>
                                            <td><span>Miễn phí</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Gói 90 ngày <span>(KM 0%)</span></p>
                                            </td>
                                            <td><span>Miễn phí</span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="wrap-3">
                                    <ul>
                                        <li>Hiển thị dưới tất các tin VIP </li>
                                        <li>Có tiêu đề &nbsp;<span>CHỮ THƯỜNG MÀU ĐEN</span></li>
                                        <li>Được chèn link video vào trong tin đăng</li>
                                        <li>Được đăng tối đa 30 ảnh</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>
@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/bootstrap-datepicker.vi.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.js"></script>
<script>
// var date = new Date();
// date.setDate(date.getDate()-1);
// var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
var now = new Date();
var formatted = now.getHours() + ":" + now.getMinutes();
$('#timepicker').mdtimepicker({
    format: 'hh:mm'
});
$('#timepicker').mdtimepicker('setValue', formatted);

var date = new Date();
var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
$("#testdate").datepicker({
    startDate: today,
    todayHighlight: true,
    language: 'vi',
    format: 'mm/dd/yyyy',
}).attr('readonly', 'readonly');
$('#testdate').datepicker('setDate', today);
$(document).ready(function() {
    $('.formDangBaiViet').submit(function() {

        let wallet = $("#money-wallet").val()
        let pricepost = $('input[name="pricePost"]').val();
        //console.log(wallet + ' ' + pricepost)
        if (parseInt(wallet) < parseInt(pricepost)) {
            alert('Ví không đủ tiền')
            return false
        }
    });
})
</script>
@endsection