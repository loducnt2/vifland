@extends('layouts.master')
@section('title','Đăng bài viết')
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->
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
        <form class="formDangBaiViet" action="{{route('article-store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="max-width-container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="box-left-form-muaban">
                            <div class="mdm-1">
                                <div class="checked">
                                    <input id="luachonsearch1" type="radio" value="{{$cate_2[0]->id}}" name="cate_id"
                                        checked="">
                                    <label for="luachonsearch1">{{$cate_2[0]->name}}</label>
                                </div>
                                <div class="checked">
                                    <input id="luachonsearch2" type="radio" value="{{$cate_2[1]->id}}" name="cate_id">
                                    <label for="luachonsearch2">{{$cate_2[1]->name}}</label>
                                </div>
                            </div>
                            <div class="mdm-2">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation"><a class="nav-link active" id="vitri-tab"
                                            data-toggle="tab" href="#vitri" role="tab" aria-controls="vitri"
                                            aria-selected="true">Vị trí</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" id="thongtin-tab"
                                            data-toggle="tab" href="#thongtin" role="tab" aria-controls="thongtin"
                                            aria-selected="false">Thông tin </a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" id="khac-tab"
                                            data-toggle="tab" href="#khac" role="tab" aria-controls="khac"
                                            aria-selected="false">Khác</a></li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="vitri" role="tabpanel"
                                        aria-labelledby="vitri-tab">
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Tỉnh/Thành phố</label>
                                            <select class="select1" name="province_id" id="province">
                                                <option value="">Chọn</option>
                                                @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Quận/Huyện</label>
                                            <select class="select1" name="district_id" id="district">
                                                <option value="">Chọn</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Phường/Xã</label>
                                            <select class="select1" name="ward_id" id="ward">
                                                <option value="">Chọn</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="diachi">Địa chỉ</label>
                                            <input type="text" min="0" name="address" id="diachi">
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="thongtin" role="tabpanel"
                                        aria-labelledby="thongtin-tab">
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Loại hình</label>
                                            <select class="select1" name="product_cate[]" multiple="multiple">
                                                @foreach($product_cate as $prodcate)
                                                <option value="{{$prodcate->id}}">{{$prodcate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Mặt tiền</label>
                                            <input type="text" min="0" name="facades" >
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Chiều sâu</label>
                                            <input type="text" min="0" name="depth">
                                        </div>
                                        <!-- <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Diện tích</label>
                                            <input type="number" min="0" name="acreage">
                                        </div> -->
                                        <!-- <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Đơn giá </label>
                                            <input type="text" min="0" name="price"><em class="notedongia">Mặc
                                                định 0 là
                                                thương lượng</em>
                                        </div> -->
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Đơn vị </label>
                                            <select class="select1" name="unit_id" id="unit">
                                                <option value="">Chọn</option>
                                                @foreach($units as $unit)
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Đơn giá </label>
                                            <input type="text" min="0" name="price">
                                            <!-- <em class="notedongia">Mặc
                                                định 0 là thương lượng</em> -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="khac" role="tabpanel" aria-labelledby="khac-tab">

                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Số tầng</label>
                                            <input type="text" min="0" name="floors">
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Số phòng ngủ </label>
                                            <input type="text" min="0" name="bedroom">
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="legal">Giấy tờ pháp lý</label>
                                            <select name="legal" class="select1" id="legal">
                                                <option selected value="Giấy CN QSDĐ - Sổ đỏ - Sổ hồng">Giấy
                                                    CN QSDĐ - Sổ đỏ - Sổ hồng</option>
                                                <option value="Hợp đồng mua bán">Hợp đồng mua bán
                                                </option>
                                                <option value="Hợp đồng góp vốn">Hợp đồng góp vốn
                                                </option>
                                                <option value="Hợp đồng góp vốn">Hợp đồng góp vốn
                                                </option>
                                                <option value="Đất giao - Đất phân">Đất giao - Đất
                                                    phân</option>
                                                <option value="Đang làm giấy CN QSDĐ">Đang làm giấy
                                                    CN QSDĐ</option>
                                                <option value="Đã có giấy hẹn lấy số">Đã có giấy hẹn
                                                    lấy số</option>
                                            </select>
                                        </div>
                                        <div class="note-wrap"><em class="note">* Hãy cập nhật
                                                các thông số đầy đủ và chi
                                                tiết để khách hàng tìm thấy tin đăng của bạn dễ
                                                dàng</em>
                                            <p class="note"> <b>Cảnh báo: &nbsp;</b>Nếu thông
                                                tin không được chọn đầy đủ thì
                                                tin đăng sẽ không thể tìm kiếm.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="row">
                            <div class="col-12 form-group">
                                <input class="input-100" type="text" placeholder="Tiêu đề bài viết" name="title">
                            </div>
                            <div class="col-12 form-group">
                                <textarea class="form-control" id="summary-ckeditor" name="content"></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <!-- <input type="file" name="img[]" multiple>  -->
                                <input class="filepond my-pond" type="file" name="img[]" multiple="multiple"
                                    accept="image/png, image/jpeg, image/gif">
                            </div>
                            <div class="col-12 form-group">
                                <input class="input-100-s" type="text" placeholder="Add tags" name="tags">
                            </div>
                        </div>
                        <div class="row thongtinlh">
                            <div class="col-12 wrap-title">
                                <h4 class="tt-line"> <span>Thông Tin Liên Hệ</span></h4>
                                <p>Hãy điền thông tin liên hệ đầy đủ để khách hàng có thể liên lạc khi
                                    có nhu cầu </p>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">person</span>
                                <input type="text" placeholder="Tên liên lạc" name="name_contact">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">business</span>
                                <input type="text" placeholder="Tên Công ty" name="company_name">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">phone</span>
                                <input type="text" placeholder="Điện thoại cá nhân" name="phone_contact">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><i class="ri-facebook-circle-fill"></i>
                                <input type="text" placeholder="Facebook cá nhân" name="facebook">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">location_on</span>
                                <input type="text" placeholder="Địa chỉ" name="address_contact">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">public</span>
                                <input type="text" placeholder="Trang web" name="website">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">email</span>
                                <input type="text" placeholder="Hộp thư điện tử" name="email">
                            </div>
                        </div>
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
                                        <input id="tinthuong" type="radio" value="0" name="type" checked>
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
                                                    data-fancybox="images"> <img
                                                        src="{{asset('assets/icon/vips1.jpg')}}" alt=""></a>
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
                                                    data-fancybox="images"> <img
                                                        src="{{asset('assets/icon/vips2.jpg')}}" alt=""></a>
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
                                                    data-fancybox="images"> <img
                                                        src="{{asset('assets/icon/vips3.jpg')}}" alt=""></a>
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
                                                    data-fancybox="images"> <img
                                                        src="{{asset('assets/icon/vips4.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END -->
                                <div class="col-12">
                                    <div class="row wrap-lich">

                                        <div class="col-6 form-group">
                                            <label for="songayvip">Ngày đăng bài</label>
                                            <input class="calendar" type="datetime" name="datetime_start" id="testdate">
                                        </div>
                                        <div class="col-6 form-group">
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
                                        <div class="wrap-left"><img src="{{asset('assets/icon/vip1.svg')}}" alt="">
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
                                        <div class="wrap-left"><img src="{{asset('assets/icon/vip2.svg')}}" alt="">
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
                                        <div class="wrap-left"><img src="{{asset('assets/icon/vip3.svg')}}" alt="">
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
                                                        <input type="number" name="pricePost" value="0" style="display:none">
                                                    </strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END -->

                                    <!-- END -->
                                    <div class="col-12 wrap-button-dbv">
                                        <div class="row">
                                            <!-- <button class="button-huy" type="submit">Hủy bỏ</button> -->
                                            <button class="button-luu" type="submit">Đăng bài</button>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<script>
$(function() {

    // Turn input element into a pond
    $('.my-pond').filepond();

    // Turn input element into a pond with configuration options
    $('.my-pond').filepond({
        allowMultiple: true
    });

    // Set allowMultiple property to true
    $('.my-pond').filepond('allowMultiple', false);

    // Listen for addfile event
    $('.my-pond').on('FilePond:addfile', function(e) {
        console.log('file added event', e);
    });

    // Manually add a file using the addfile method
    $('.my-pond').filepond('addFile', 'index.html').then(function(file) {
        console.log('file added', file);
    });

});
</script>
<script>
// $('#testdate').datepicker();
$("#testdate").datepicker({
    language: 'vi',
    format: 'mm/dd/yyyy',

}).attr('readonly', 'readonly');
CKEDITOR.replace('summary-ckeditor');
$(document).ready(function() {
    $('#province').change(function() {
        var province = $(this).val();
        var url = '/get-district/' + province;
        $('#district').load(url, function() {
            var district = $(this).val();
            var url1 = '/get-ward/' + district;
            $('#ward').load(url1);
        });
    });
    $('#district').change(function() {
        var district = $(this).val();
        var url1 = '/get-ward/' + district;
        $('#ward').load(url1);
    });

    FilePond.registerPlugin();
      var element = document.querySelector('meta[name="csrf-token"]');
      var csrf = element && element.getAttribute("content");
      FilePond.setOptions({
        server: {
              url: "{{ url('upload')}}",
              process: {
                  headers: {
                    'X-CSRF-TOKEN': csrf 
                  },
              }
          }
      });
      const inputElement = document.querySelector('input[name="image"]');
      const pond = FilePond.create( inputElement);


      //Validate 
      $('.formDangBaiViet').submit(function(){
        let wallet = {{ auth()->user()->wallet }};
        let pricepost = $('input[name="pricePost"]').val();
        //console.log(wallet + ' ' + pricepost)
        if( parseInt(wallet) < parseInt(pricepost)  ){
            alert( ' k đủ tiền' )
            return false
        }
      })
      $('.formDangBaiViet').validate({
          rules:{
              title:{
                required:true,
              },
              name_contact:{
                required:true,
              },
              phone_contact:{
                required:true,
              },
              address_contact:{
                required:true,
              },
              address:{
                required:true,
              },
              facades:{
                required:true,
                number:true,
              },
              depth:{
                required:true,
                number:true,
              },
              

          },
          messages:{
              title :{
                  required: "Trường này bắt buộc"
              },
              name_contact :{
                  required: "Trường này bắt buộc"
              },
              phone_contact :{
                  required: "Trường này bắt buộc"
              },
              address_contact :{
                  required: "Trường này bắt buộc"
              },
              address :{
                  required: "Trường này bắt buộc"
              },
              facades :{
                  required: "Trường này bắt buộc",
                  number: "Trường này không hợp lệ",
              },
              depth:{
                required: "Trường này bắt buộc",
                number: "Trường này không hợp lệ",
              },

              
          },
          //Custom message validate
          /*errorPlacement: function(error, element) {
              //Custom position: first name
              if (element.attr("name") == "first" ) {
                  $("#errNm1").text(error);
              }
              //Custom position: second name
              else if (element.attr("name") == "second" ) {
                  $("#errNm2").text(error);
              }
              // Default position: if no match is met (other fields)
              else {
                   error.append($('.errorTxt span'));
              }
          },*/
          submitHandler: function(form) {
                  form.submit(function(){

                  });
              }
          
      });


});
</script>
@endsection