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
        <form class="formDangBaiViet" action="{{route('update-article',$product->product_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="max-width-container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="box-left-form-muaban">
                            <div class="mdm-1">
                                <div class="checked">
                                    <input id="luachonsearch1" type="radio" value="{{$cate_2[0]->id}}" name="cate_id" {{$product->cate_id==$cate_2[0]->id?"checked":""}}>
                                    <label for="luachonsearch1">{{$cate_2[0]->name}}</label>
                                </div>
                                <div class="checked">
                                    <input id="luachonsearch2" type="radio" value="{{$cate_2[1]->id}}" name="cate_id" {{$product->cate_id==$cate_2[1]->id?"checked":""}}>
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
                                                <option value="{{$province->id}}" {{$product->province_id==$province->id?"selected":""}} >{{$province->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Quận/Huyện</label>
                                            <select class="select1" name="district_id" id="district">
                                                @foreach($districts as $district)
                                                <option value="{{$district->id}}" {{$product->district_id==$district->id?"selected":""}} >{{$district->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Phường/Xã</label>
                                            <select class="select1" name="ward_id" id="ward">
                                                @foreach($wards as $ward)
                                                <option value="{{$ward->id}}" {{$product->ward_id==$ward->id?"selected":""}} >{{$ward->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="diachi">Địa chỉ</label>
                                            <input type="text" name="address" id="diachi" value="{{$product->address}}">
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="thongtin" role="tabpanel"
                                        aria-labelledby="thongtin-tab">
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Loại hình</label>
                                            <select class="select1" name="product_cate"  >
                                                <option value="">Chọn</option>
                                                @foreach($product_cate as $prodcate)
                                                <option value="{{$prodcate->id}}" {{$product->product_cate==$prodcate->id?"selected":""}}>{{$prodcate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Mặt tiền</label>
                                            <input type="text" min="0" name="facades" value="{{$product->facades}}">
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Chiều sâu</label>
                                            <input type="text" min="0" name="depth" value="{{$product->depth}}">
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
                                                <option value="{{$unit->id}}" {{$product->unit_id == $unit->id?"selected":""}}>{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Đơn giá </label>
                                            <input type="text" min="0" name="price" id="price" value="{{$product->price}}">
                                            <!-- <em class="notedongia">Mặc
                                                định 0 là thương lượng</em> -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="khac" role="tabpanel"
                                        aria-labelledby="khac-tab">
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Số tầng</label>
                                            <input type="text" min="0" name="floors" value="{{$product->floors}}">
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Số phòng ngủ </label>
                                            <input type="text" min="0" name="bedroom" value="{{$product->bedroom}}">
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="legal">Giấy tờ pháp lý</label>
                                            <select name="legal" class="select1" id="legal">
                                                <option value="">Chọn</option>}
                                                <option value="Giấy CN QSDĐ - Sổ đỏ - Sổ hồng" {{$product->legal == "Giấy CN QSDĐ - Sổ đỏ - Sổ hồng"?"selected":""}}>Giấy
                                                    CN QSDĐ - Sổ đỏ - Sổ hồng</option>
                                                <option value="Hợp đồng mua bán" {{$product->legal == "Hợp đồng mua bán"?"selected":""}}>Hợp đồng mua bán
                                                </option>
                                                <option value="Hợp đồng góp vốn" {{$product->legal == "Hợp đồng góp vốn"?"selected":""}}>Hợp đồng góp vốn
                                                </option>
                                                <option value="Đất giao - Đất phân" {{$product->legal == "Đất giao - Đất phân"?"selected":""}}>Đất giao - Đất
                                                    phân</option>
                                                <option value="Đang làm giấy CN QSDĐ" {{$product->legal == "Đang làm giấy CN QSDĐ"?"selected":""}}>Đang làm giấy
                                                    CN QSDĐ</option>
                                                <option value="Đã có giấy hẹn lấy số" {{$product->legal == "Đã có giấy hẹn lấy số"?"selected":""}}>Đã có giấy hẹn
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
                                <input class="input-100" type="text" placeholder="Tiêu đề bài viết" name="title" value="{{$product->title}}">
                            </div>
                            <div class="col-12 form-group">
                                <textarea class="form-control" id="summary-ckeditor" name="content">{{$product->content}}</textarea>
                            </div>
                            <!-- <div class="col-12 form-group">
                                <span>Ảnh tiêu đề : &nbsp;</span>
                                <input type="file" name="thumbnail" disabled="">
                            </div> -->
                            <div class="col-12 form-group">
                                <input type="text" value="" data-role="tagsinput" placeholder="Chỉnh sửa lại tag" name="tags" value="">
                                @if($product->tags!=NULL)
                                <?php 
                                    if(strpos($product->tags,',')){
                                        $tag = explode(",",$product->tags);
                                        foreach( $tag as $tg ){
                                            echo '<span class="badge badge-secondary">'.$tg.'<span data-role="remove"></span></span>&ensp;';
                                        } 
                                    }else{
                                        echo '<span class="badge badge-secondary">'.$product->tags.'<span data-role="remove"></span></span>';
                                    }
                                ?>
                                @endif
                            </div>
                            <div class="col-12 form-group wrap-input-img form-upload">
                                <div class="form-upload__preview">
                                    <div class="mb-2" id="old-img">
                                        @foreach($img as $ig)
                                        <img style="" src="{{asset('assets/product/detail/'.$ig->img)}}" alt="" height="150px" width="150px">
                                        @endforeach
                                    </div>
                                </div>
                                
                                <div class="form-upload__field">
                                    <label class="form-upload__title" for="upload">Thay đổi / thêm ảnh <br> <small>(Chọn nhiều ảnh cùng lúc)</small>
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
                                <input type="text" placeholder="Tên liên lạc" name="name_contact" value="{{$product->name_contact}}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">business</span>
                                <input type="text" placeholder="Tên Công ty" name="company_name" value="{{$product->company}}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">phone</span>
                                <input type="text" placeholder="Điện thoại cá nhân" name="phone_contact" value="{{$product->phone_contact}}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><i class="ri-facebook-circle-fill"></i>
                                <input type="text" placeholder="Facebook cá nhân" name="facebook" value="{{$product->facebook}}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">location_on</span>
                                <input type="text" placeholder="Địa chỉ" name="address_contact" value="{{$product->address_contact}}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">public</span>
                                <input type="text" placeholder="Trang web" name="website" value="{{$product->website}}">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group"><span
                                    class="material-icons">email</span>
                                <input type="text" placeholder="Hộp thư điện tử" name="email" value="{{$product->email}}">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12">
                                <div class="col-12 wrap-button-dbv">
                                    <div class="row">
                                        <!-- <button class="button-huy" type="submit">Hủy bỏ</button> -->
                                        <button class="button-luu" type="submit">Cập nhật</button>
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
    CKEDITOR.replace('summary-ckeditor');
    $(document).ready(function () {



        $('#unit').change(function () {
            if ($(this).val() == 13) {
                $('#price').attr('disabled', true);
            } else {
                $('#price').attr('disabled', false);
            }
        })

        $('#province').change(function () {
            var province = $(this).val();
            var url = '/get-district/' + province;
            $('#district').load(url, function () {
                var district = $(this).val();
                var url1 = '/get-ward/' + district;
                $('#ward').load(url1);
            });
        });
        $('#district').change(function () {
            var district = $(this).val();
            var url1 = '/get-ward/' + district;
            $('#ward').load(url1);
        });

        //Validate 
        $('.formDangBaiViet').submit(function () {

        let wallet = {{ auth()->user()->wallet }};
        let pricepost = $('input[name="pricePost"]').val();
        //console.log(wallet + ' ' + pricepost)
        if( parseInt(wallet) < parseInt(pricepost)  ){
            alert( ' k đủ tiền' )
            return false
        }
      })
    $('.form-upload__title').click(function(){
        $('#old-img').css('display','none');
    })


      /*$('.formDangBaiViet').validate({
          ignore: [],
          rules:{
              province_id:{
                required:true,
              },
              address:{
                required:true,
              },
              title:{
               required :true,
              },
              content:{
                required:true,
                lettersonly: true,
                minlength:50
              },
              img:{
                required:true,
              },
              name_contact:{
               required :true,
              },
              phone_contact:{
               required :true,
              },
              datetime_start:{
                required:true,
              },
              tags:{
                required:true,
              },

              legal:{
                required:true,
              },
              unit_id:{
                required:true,
              },
              price:{
                required:true,
              },
            },
            //Custom
            errorPlacement: function(error, element) {
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
            },
            submitHandler: function (form) {
                form.submit(function () {

                });
            }

        });*/


    });

</script>
@endsection
