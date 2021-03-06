@extends('layouts.master')
@section('title','Đăng bài viết')
@section('headerStyles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.css">

@stop
@section('content')
<main>

    <div class="global-breadcrumb">
        <div class="max-width-container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}"></i>Trang chủ
                    </a></li>
                <li class="breadcrumb-item"><a class="text" href="/article/new/mua-ban-nha-dat" data-toggle="modal"
                        data-target="#exampleModal">
                        <p>Đăng bài</p>
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
                                        checked>
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
                                            <input type="text" name="address" id="diachi">
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="thongtin" role="tabpanel"
                                        aria-labelledby="thongtin-tab">
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Loại nhà đất</label>
                                            <select class="select1" name="product_cate" id="product_cate">
                                                <option value="">Chọn</option>
                                                @foreach($product_cate as $prodcate)
                                                <option value="{{$prodcate->id}}">{{$prodcate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Mặt tiền</label>
                                            <input type="text" name="facades" id="facades">
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Chiều sâu</label>
                                            <input type="text" name="depth" id="depth">
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
                                        <div class="form-group-sl1 sl-1 select-many" id="dongia">
                                            <label for="thanhpho">Đơn giá &nbsp; </label>
                                            <input type="text" name="price" id="price" value="">
                                             <em class="notedongia">Ví dụ đơn giá: 32 Triệu/m²</em>
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
                                                <option value="">Chọn</option>}
                                                <option value="Giấy CN QSDĐ - Sổ đỏ - Sổ hồng">Giấy
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
                                <input class="input-100" type="text" placeholder="Tiêu đề bài viết" name="title" requ>
                            </div>
                            <div class="col-12 form-group">
                                <textarea class="form-control" id="summary-ckeditor" name="content"
                                    id="content"></textarea>
                            </div>
                            <!-- <div class="col-12 form-group">
                                <span>Ảnh tiêu đề : &nbsp;</span>
                                <input type="file" name="thumbnail" disabled="">
                            </div> -->
                            <!-- <div class="col-12 form-group">
                                <input type="text" value="" data-role="tagsinput" placeholder="Add tags" name="tags">
                            </div> -->
                            <div class="col-12 form-group wrap-input-img form-upload">
                                <div class="form-upload__preview"></div>
                                <div class="form-upload__field">
                                    <label class="form-upload__title" for="upload">Thêm ảnh
                                        <input class="form-upload__control js-form-upload-control" id="upload"
                                            type="file" multiple="true" style="display:none" name="img[]">
                                    </label>
                                    <button class="btn btn-clear ml-3">Xóa ảnh</button>
                                </div>
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
                                <input type="text" placeholder="Tên liên lạc" name="name_contact" id="name_contact">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">business</span>
                                <input type="text" placeholder="Tên Công ty" name="company_name">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">phone</span>
                                <input type="tel" placeholder="Điện thoại cá nhân" name="phone_contact"
                                    id="phone_contact" pattern="[0-9]{3}[0-9]{3}[0-9]{4}">
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
                                <input type="email" placeholder="Hộp thư điện tử" name="email" id="email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
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
                                        <input id="tinthuong" type="radio" value="4" name="type" checked>
                                        <label for="tinthuong">Tin Thường</label>
                                    </div>
                                    <div class="checked">
                                        <input id="vip1" type="radio" value="1" name="type">
                                        <label class="vip1" for="vip1">tin {{$prices[0]->name}}</label>
                                    </div>
                                    <div class="checked">
                                        <input id="vip2" type="radio" value="2" name="type">
                                        <label class="vip2" for="vip2">tin {{$prices[1]->name}}</label>
                                    </div>
                                    <div class="checked">
                                        <input id="vip3" type="radio" value="3" name="type">
                                        <label class="vip3" for="vip3">Tin {{$prices[2]->name}}</label>
                                    </div>
                                </div>
                                <div class="wrap-vip-mobile">
                                    <input id="value-vip-1" type="number" value="{{$prices[0]->price}}" hidden>
                                    <input id="value-vip-2" type="number" value="{{$prices[1]->price}}" hidden>
                                    <input id="value-vip-3" type="number" value="{{$prices[2]->price}}" hidden>
                                    <input id="money-wallet" type="number" value="{{auth()->user()->wallet}}" hidden>
                                    <div class="form-group-sl1 sl-1 select-many">
                                        <select class="select1" name="loainhadat" id="select-vip-all">
                                            <option value="tinthuong"> <strong>Tin
                                                    thường&nbsp;</strong>(Miễn phí)
                                            </option>
                                            <option class="vip1" value="1">
                                                <p>Tin {{$prices[0]->name}}&nbsp;</p>({{$prices[0]->price}} ₫ tin/ngày)
                                            </option>
                                            <option class="vip2" value="2"> <span>Tin
                                                    {{$prices[1]->name}}&nbsp;</span>({{$prices[1]->price}} ₫
                                                tin/ngày)</option>
                                            <option class="vip3" value="3"> <span>Tin
                                                    {{$prices[2]->name}}&nbsp;</span>({{$prices[2]->price}} ₫
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
                                                    <td class="mb-30"> <strong>{{number_format($prices[0]->price)}} ₫
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
                                                    <td class="mb-30"> <strong>{{number_format($prices[1]->price)}} ₫
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
                                                    <td class="mb-30"> <strong>{{number_format($prices[2]->price)}} ₫
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
                                            <div class="wrap-text"><strong><span class="total"></span></strong><span>
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
CKEDITOR.replace('summary-ckeditor');
$(document).ready(function() {

    $('#unit').change(function() {
        if ($(this).val() == 13) {
            $('#price').attr('value','')
            $('#price').attr('disabled', true);
            $('#dongia').attr('hidden',true);
            
        } else {
            $('#price').attr('disabled', false);
            $('#price').attr('value','');
            $('#dongia').attr('hidden',false);
        }
    })

    $('#province').change(function() {
        let province = $(this).val();
        let url = '/get-district/' + province;
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data, status) {
                data = '<option value="0" selected>Chọn</option>' + data
                $('#district').html(data)
            }
        })
        $.ajax({
            url: '/get-content-province/' + province,
            type: 'GET',
            success: function(data, status) {
                $('#content-province').html(data)
            }
        })

    })
    $('#district').change(function() {
        let district = $(this).val();
        let url1 = '/get-ward/' + district;
        $.ajax({
            url: url1,
            type: 'GET',
            success: function(data, status) {
                data = '<option value="0" selected>Chọn</option>' + data
                $('#ward').html(data)
            }
        })
    })

    
    /*$('#price').keyup(function(){
        let price = $(this).val()
        $('#pr_price').text(price)
    })*/

    //Validate

    $('.formDangBaiViet').on('submit', function(e) {
        function delay_submit() {
            $('.button-luu').attr('disabled', 'disabled')
            setTimeout(function() {
                $('.button-luu').removeAttr('disabled')
            }, 5000);
        }
        if ($('#phone_contact').val() == "") {
            toastr.warning("Vui lòng nhập số điện thoại liên lạc");
            e.preventDefault();
            delay_submit();
        }

        if ($('#name_contact').val() == "") {
            toastr.warning("Vui lòng nhập tên liên lạc");
            e.preventDefault();
            delay_submit();
        }
       if ($('#unit').val() != 13){
           if ($('#price').val() == "" | $('#price').val() == 0) {
               toastr.warning("Vui lòng nhập đơn giá");
               e.preventDefault();
               delay_submit();
           }
           if (isNaN($('#price').val())) {
               toastr.warning("Đơn giá không xác định");
               e.preventDefault();
               delay_submit();
           }
       } 
        
        
        if (isNaN($('#facades').val())) {
            toastr.warning("Mặt tiền không xác định");
            e.preventDefault();
            delay_submit();
        }
        if (isNaN($('#depth').val())) {
            toastr.warning("Chiều sâu không xác định");
            e.preventDefault();
            delay_submit();
        }

        if ($('#unit option:selected').index() == 0) {
            toastr.warning("Vui lòng chọn đơn vị");
            e.preventDefault();
            delay_submit();
        }
        if ($('#content').val() == "") {
            toastr.warning("Vui lòng nhập nội dung ");
            e.preventDefault();
            delay_submit();
        }
        if ($('.form-upload__preview').children().length < 3) {
            toastr.warning("Vui lòng nhập ít nhất 3 hình ");
            e.preventDefault();
            delay_submit();
        }
        if ($('#product_cate option:selected').index() == 0) {
            toastr.warning("Vui lòng chọn loại nhà đất");
            e.preventDefault();
            delay_submit();
        }
        if ($('#ward option:selected').index() == 0) {
            toastr.warning("Vui lòng chọn Phường/Xã");
            e.preventDefault();
            delay_submit();
        }
        if ($('#district option:selected').index() == 0) {
            toastr.warning("Vui lòng chọn Quận/Huyện");
            e.preventDefault();
            delay_submit();
        }
        if ($('#province option:selected').index() == 0) {
            toastr.warning("Vui lòng chọn Tỉnh/Thành phố");
            e.preventDefault();
            delay_submit();
        }
        if ($('input[name="title"]').val() == "") {
            toastr.warning("Vui lòng thêm tiêu đề");
            e.preventDefault();
            delay_submit();
        }
    });
    $('.formDangBaiViet').submit(function() {

        let wallet = $("#money-wallet").val()
        let pricepost = $('input[name="pricePost"]').val();
        //console.log(wallet + ' ' + pricepost)
        if (parseInt(wallet) < parseInt(pricepost)) {
            alert('Ví không đủ tiền')
            return false
        }
    });



});
</script>
@endsection