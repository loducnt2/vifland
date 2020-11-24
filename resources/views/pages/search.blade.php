@extends('layouts.master')
@section('title',$title)
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
    <section class="danhmuc">
        <div class="max-width-container">
            <div class="row bo-loc-1">
                <div class="col-sm-12 col-md-3">
                    <div class="search">
                        <form action="">
                            <input type="text" placeholder="Bạn cần tìm hôm nay?">
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group-sl1 sl-1 select-many">
                                <select class="select1 sluser" name="loainhadat[]" multiple="multiple">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group-sl1 sl-2 select-many">
                                <select class="select1 sltinhinh" name="loainhadat[]" multiple="multiple">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group-sl1 sl-3 select-many">
                                <select class="select1 slbaidang" name="loainhadat[]" multiple="multiple">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-1">
                    <button><span>Xóa bộ lọc</span></button>
                </div>
            </div>
            <div class="row main-danh-muc">
                <div class="col-lg-3 col-md-12">
                    <div class="box-left-form-muaban">
                        <form action="">
                            <div class="mdm-1">
                                <div class="checked">
                                    <input id="luachonsearch1" type="radio" value="muaban" name="canmuaban">
                                    <label for="luachonsearch1">{{$cate_child[0]->name}}</label>
                                </div>
                                <div class="checked">
                                    <input id="luachonsearch2" type="radio" value="muaban" name="canmuaban">
                                    <label for="luachonsearch2">{{$cate_child[1]->name}}</label>
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
                                        <!-- <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Đường, Phố</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Dự án</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="tab-pane fade" id="thongtin" role="tabpanel"
                                        aria-labelledby="thongtin-tab">
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Loại hình</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Khoảng mặt tiền</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Khoảng dự tính</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Mức giá </label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Hướng</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Đường tộng</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Loại nhà đất</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="khac" role="tabpanel" aria-labelledby="khac-tab">
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Số tầng</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Số phòng ngủ</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                        <div class="form-group-sl1 sl-1 select-many">
                                            <label for="thanhpho">Giấy tờ pháp lý</label>
                                            <select class="select1" name="loainhadat[]" multiple="multiple">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row box-right">
                        @if(count($products)>0)
                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-sx-12">
                            <div class="box-sp">
                                <div class="box-sp-img"><a class="localstore" localstore="{{$product->product_id}}" href="{{route('article-detail',$product->slug)}}"><img src="{{asset('assets/product/sanpham1.webp')}}" alt=""></a>
                                    <div class="tag-thuongluong">{{$product->price}} {{$product->unit}}</div>
                                    <div class="box-icon">
                                        <i class="fav ri-heart-line icons" productid="{{$product->product_id}}"></i>
                                        <i class="ri-equalizer-line icons comp" productid="{{$product->product_id}}" ></i>
                                    </div>
                                    <div class="overlay"></div>
                                </div>
                                <div class="box-sp-text"> 
                                    <a class="localstore" localstore="{{$product->product_id}}" href="{{route('article-detail',$product->slug)}}">
                                        <h5 class="title-text lcl lcl-2">{{$product->title}}</h5>
                                    </a>
                                    <div class="location"> <span class="material-icons">location_on</span>
                                        <p class="lcl lcl-1" data-toggle="tooltip" data-placement="bottom" title="{{$product->district}}, {{$product->province}}">{{$product->district}}, {{$product->province}}</p>
                                    </div>
                                    <div class="mota-place">
                                        <div class="mota-place-1">
                                            <div class="mota-place-tt"><img src="{{asset('assets/icon/dientich.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{intval($product->depth)*intval($product->facades) }} m²">{{intval($product->depth)*intval($product->facades) }} m²</span></div>
                                            <div class="mota-place-tt"><img src="{{asset('assets/icon/icon-road@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Mặt phố - mặt đường</span></div>
                                            <div class="mota-place-tt"><img src="{{asset('assets/icon/rectangle-copy-2@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{$product->facades}}">{{$product->facades}} m</span></div>
                                        </div>
                                        <!-- <div class="mota-place-1">
                                            <div class="mota-place-tt"><img src="./assets/icon/rectangle-2@3x.png" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Sàn văn phòng, Mặt bằng thương mại, Phòng học </span></div>
                                            <div class="mota-place-tt"><img src="./assets/icon/rectangle-3@3x.png" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">---</span></div>
                                            <div class="mota-place-tt"><span class="material-icons icons-15">group</span><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">{{$product->depth*$product->facades}} m²</span></div>
                                        </div> -->
                                    </div>
                                    <div class="end-mota">
                                        <div class="mota-end-box">
                                            <div class="end-box-tt"><span class="material-icons icons-15">event_note</span><span>{{date('d/m/Y',strtotime($product->datetime_start))}}</span></div>
                                            <div class="end-box-tt"><span class="material-icons icons-15">visibility</span><span>{{$product->view}}</span></div>
                                            <div class="end-box-tt"><span class="material-icons icons-15 chat">chat</span><span class="chat">chat ngay</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="article-none"> <img src="{{asset('assets/san_pham/no-documents.png')}}" alt="">
                            <p>Không có bài đăng nào</p>
                        </div>
                        @endif


                        <div class="col-12">
                            <div class="paginationSP">
                                <div class="paginationSP-box"><span
                                        class="material-icons button-s mr-2">skip_previous</span>
                                    <ul>
                                        <li> <a class="active" href="">1</a></li>
                                        <li> <a href="">2</a></li>
                                        <li> <a href="">3</a></li>
                                    </ul><span class="3cham">...</span><a class="last-pg" href="">4534</a><span
                                        class="material-icons button-s ml-2">skip_next</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="content-box">
                                <div class="inner-content">
                                    <h1 class="MsoNormal" align="center">Mua bán nhà đất bất động sản </h1>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font><i><a href="https://meeyland.com/mua-ban-nha-dat">Mua bán
                                                nhà đất</a> hay còn gọi là mua bán bất động sản được coi là cuộc giao
                                            dịch lớn. Đặc biệt nó còn là cơ hội vàng để các nhà
                                            đầu tư có thể sinh lời mang về 1 khoản lợi nhuận lớn gia tăng sản nghiệp từ
                                            sự
                                            thức thời đúng đắn của mình.</i>
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font><i>
                                            Với những chia sẻ dưới đây mà MeeyLand mang tới, hi vọng sẽ giúp quý độc
                                            giả có được những thông tin quý giá nhất.</i>
                                    </span>
                                    <h2></h2><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Nhà đất là
                                            gì?<span style="mso-spacerun:yes">                </span></font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Theo như<span style="mso-spacerun:yes">  </span>định nghĩa
                                        của các
                                        chuyên gia hàng đầu nhà đất chính là đất đai và những gì liên quan chặt chẽ với
                                        mảnh đất như nhà ở, kiến trúc và những gì dưới mặt đất như dầu mỏ, khoáng chất…
                                    </span>
                                    <p class="MsoNormal" style="text-align: center;"></p><span
                                        style="line-height: 107%; font-family: Roboto;"><img
                                            src="https://news.meeycdn.com/uploads/2020/06/Quy-trinh-xay-dung-nha-2-tang-dep-1.jpg"
                                            alt="Nhà 2 tầng đẹp">
                                        <font size="3"></font><br>
                                    </span>
                                    <p class="MsoNormal" style="text-align: center;"></p><span
                                        style="line-height: 107%; font-family: Roboto;"><i></i><span
                                            style="font-size: medium; text-align: start;">Nhà đất hay còn gọi là bất
                                            động sản được coi là tài sản lớn nhất của đời người theo quan điểm của người
                                            Việt</span><br></span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Nhà đất không bao gồm những thứ có thể tách rời được như
                                        nhà tạm, lều…
                                        Có một mối quan hệ vô cùng mật thiết với tài chính. Sở hữu nhà đất hay bất động
                                        sản bạn hoàn toàn có quyền quyết định với chính những với quyền sở hữu của
                                        mình, hoàn toàn có thể kinh doanh cho thuê lại bán lại thế chấp cho vay….
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Hiểu một cách nôm na là đơn giản và dễ hiểu nhất thì chúng
                                        ta có thể hiểu
                                        nhà đất thuộc hai dạng như sau:
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span><b
                                            style="mso-bidi-font-weight:									normal">Động sản</b>: Động sản là tất
                                        cả những tài sản có thể di dịch được như
                                        tivi, tủ lạnh, bàn ghế, tủ, tiền…
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span><b
                                            style="mso-bidi-font-weight:									normal">Bất động sản</b>: Bất động sản
                                        bao gồm tất cả những gì gắn liền với mặt
                                        đất và không thể tách rời
                                    </span>
                                    <h2></h2><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            15 loại hình nhà đất
                                            phổ biến<span style="mso-spacerun:yes">                </span></font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Tại Việt Nam khi mà nhà đất đang trở thành một trong những
                                        mối quan tâm
                                        hàng đầu của những nhà đầu tư cũng như trở thành xu hướng mới của thời đại Có
                                        rất
                                        nhiều những loại hình nhà đất phổ biến để bạn có thể lựa chọn phù hợp với mục
                                        đích sử dụng của mình đáng kể nhất phải nói đến.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Căn hộ chung cư</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Căn hộ chung cư là một loại hình bất động sản cho phép rất
                                        nhiều người
                                        có thể sinh sống bên trong các căn hộ, chung cư có cơ sở hạ tầng diện tích sử
                                        dụng
                                        chung, khá phổ biến tại các thành phố lớn đô thị.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Căn hộ chung cư cho phép người sử dụng hoàn toàn có thể
                                        hoàn thiện nội
                                        thất theo nhu cầu để thể hiện được phong cách và gu thẩm mỹ của bản thân phù hợp
                                        với đặc thù sống cũng như điều kiện của gia đình.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Nhà phố liên kề</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Nhà phố liền kề là một loại hình bất động sản được sử dụng
                                        trong hệ thống
                                        cơ sở đô thị được thiết kế với kiểu dáng giống nhau. Nó được xây dựng liền kề
                                        nhau theo quy hoạch có thể phục vụ cho việc làm văn phòng kinh doanh mua bán.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Nhà riêng</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Nhà riêng được xây dựng trên một mảnh đất chính chủ, toàn
                                        quyền sở hữu
                                        của tổ chức và hộ gia đình nhà riêng bao gồm các loại biệt thự, nhà độc lập…
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Đất nền</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Đất nền là một phần trong nhà đất, nó được coi là phân húc
                                        vô cùng HOT
                                        được nhiều người quan tâm trong thời điểm hiện tại. Đất nền là những mảnh đất
                                        chưa chịu sự tác động của con người.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Biệt thự</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Biệt thự là những ngôi nhà có diện tích lớn thiết kế hiện
                                        đại sang trọn,
                                        đầy đủ tiện ích tiện nghi có tường rào bao quanh là kiểu nhà có sân vườn..
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Condotel</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Condotel là loại hình nhà đất kết hợp với lưu trú du lịch
                                        mới được phát
                                        triển mạnh mẽ trong thời gian gần đây được khá nhiều người yêu thích.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Biệt thự nghỉ dưỡng</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Các loại biệt thự được xây dựng tại các khu vực có không
                                        gian thoáng
                                        đãng trong lành có thể là gần điểm du lịch, đẹp phù hợp với nhu cầu nghỉ ngơi
                                        thư giãn và cho thuê của chủ sở hữu.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Bungalow</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Bungalow là những ngôi nhà được xây dựng thiết kế đơn
                                        giản, thường chỉ
                                        có diện tích nhỏ gọn, thường được kết cấu bằng gỗ phù hợp cho việc du lịch nghỉ
                                        dưỡng, mới được du nhập từ Ấn Độ vào Việt Nam trong một khoảng thời gian ngắn.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Nhà xưởng</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Nhà xưởng là 1 tổ hợp được xây dựng trong một không gian
                                        rộng lớn có diện
                                        tích lớn, chứa đầy đủ các tiện ích tiện nghi máy móc công nghiệp, con người,
                                        hàng hóa, quy trình sản xuất trong mọi lĩnh vực khác nhau.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Tòa nhà văn phòng</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Tòa nhà văn phòng thiết kế vô cùng hiện đại với quy mô lớn
                                        sử dụng cho
                                        mục đích cho thuê giúp các tổ chức cá nhân doanh nghiệp thực hiện các hoạt động
                                        văn phòng của mình.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Tòa nhà khách sạn</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Là một công trình kiên cố, được xây dựng nhiều tầng, tòa
                                        nhà khách sạn
                                        đáp ứng đầy đủ tất cả mọi yêu cầu về lưu trú, vui chơi giải trí và các dịch vụ
                                        thiết yếu dành cho con người. Nó phục vụ cho mục đích kinh doanh.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Trung tâm thương mại
                                            dịch vụ</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Trung tâm thương mại dịch vụ được thiết kế kiên cố để phục
                                        vụ cho việc
                                        kinh doanh. Ở tại đây là một mô hình tổng hợp có đầy đủ các dịch vụ như văn
                                        phòng cho thuê cửa hàng cơ sở hoạt động dịch vụ.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Shophouse</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Còn được gọi với một cái tên gọi khác đó chính là nhà phố
                                        thương mại,
                                        shophouse vừa có thể cho phép người sử dụng ở vừa giúp cho khách hàng có thể kết
                                        hợp làm cửa hàng kinh doanh.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Officetel</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Đây là một trong những loại nhà đất vừa làm nhà ở vừa có
                                        thể làm văn
                                        phòng còn có thể đăng ký tạm trú nghỉ ngơi qua đêm không giới hạn giờ giấc. Loại
                                        nhà đất này có đầy đủ những tiện ích tiện nghi.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Loại Khác</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Đặc biệt với sự đa dạng của nhà đất còn rất nhiều các loại
                                        hình bất động
                                        sản khác tất cả các loại hình bất động sản không thuộc ở phần trên cũng được
                                        nước
                                        ta quy định rõ ràng. Chúng tôi sẽ tiếp tục cập nhật cùng bạn trong những nội
                                        dung của bài viết sau:
                                    </span>
                                    <p class="MsoNormal" style="text-align: center;"></p><span
                                        style="line-height: 107%; font-family: Roboto;"><img
                                            src="https://news.meeycdn.com/uploads/2020/06/Phong-cach-thiet-ke-dau-tien-la-nha-o-truyen-thong-.jpg"
                                            alt="Phong cach thiet ke dau tien la nha o truyen thong  - [ Chia Sẻ ] 99+ mẫu thiết kế nhà 2 tầng đẹp nhất 2020 - thu-vien-mau-nha">
                                        <font size="3"></font><br>
                                    </span>
                                    <p class="MsoNormal" style="text-align: center;"></p><span
                                        style="line-height: 107%; font-family: Roboto;"><i></i><span
                                            style="font-size: medium; text-align: start;">Tại Việt Nam khi mà nhà đất
                                            đang trở thành một trong những mối quan tâm hàng đầu của những nhà đầu tư
                                            cũng như trở thành xu hướng mới của thời đại</span><br></span>
                                    <h2></h2><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Những lưu ý quan
                                            trọng cần biết khi mua bán nhà đất<span style="mso-spacerun:yes">    </span>
                                        </font>
                                    </b>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Nghề môi giới nhà
                                            đất</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Được coi là một trong những ngành nghề vô cùng hot trong
                                        thời điểm hiện
                                        tại nghề môi giới nhà đất được là hình thức kết nối những người có nhu cầu bán
                                        và những người có nhu cầu mua giúp họ tìm ra những sản phẩm bất động phù hợp với
                                        nhu cầu cũng như nhận về cho mình những khoản hoa hồng và lợi nhuận.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Để có thể trở thành một nhà môi giới nhà đất tài năng bạn
                                        cần phải
                                        trang bị cho mình rất nhiều những kỹ năng quan trọng.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Trang bị
                                        đầy đủ tất cả
                                        mọi kiến thức kinh nghiệm về sản phẩm và dịch vụ.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Dựa vào
                                        đặc thù của từng
                                        loại hình nhà đất khác nhau, cần phải có kỹ năng tìm kiếm phân loại khách hàng
                                        tiềm năng.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Áp dụng
                                        các hình thức
                                        Marketing hiện đại nhất kết hợp với việc mua bán nhà đất truyền thống để có thể
                                        gia tăng thêm hiệu quả.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Cần phải
                                        trang bị cho
                                        mình kỹ năng gặp gỡ khách hàng kỹ năng đàm phán thương lượng kỹ năng thuyết phục
                                        khách hàng.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Luôn giữ
                                        một thái độ
                                        niềm nở với khách hàng.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Có quy
                                        trình chăm sóc
                                        khách hàng sau gặp gỡ một cách tốt nhất để tạo ấn tượng.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Trang bị cho mình đầy đủ những kinh nghiệm và kiến thức ở
                                        trên chắc chắn
                                        bạn sẽ trở thành một nhà môi giới nhà đất tốt nhất.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Đầu tư nhà đất</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Đầu tư nhà đất thành công đồng nghĩa với việc bạn sẽ có cơ
                                        hội được gia
                                        tăng thêm tài sản của mình. Để trở thành 1 nhà đầu tư nhà đất tốt cũng yêu cầu
                                        nhiều những kinh nghiệm và những lưu ý quan trọng:
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Tìm hiểu
                                        kỹ lưỡng về
                                        chủ đầu tư và sản phẩm nhà đất.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Đặt giá
                                        trị pháp lý
                                        lên hàng đầu tuyệt đối không được giao dịch viết tay.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Đánh giá
                                        một cách chi
                                        tiết về tiềm năng của mảnh đất, vị trí, tiện ích, tiện nghi đó là cơ sở để bạn
                                        có thể có được một vụ đầu tư thuận lợi
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Hãy đảm
                                        bảo đầu tư nhà
                                        đất khi bạn có một số vốn nhàn rỗi nhận định tuyệt đối không nên vay vượt quá
                                        40% nếu không có thể là yếu tố khiến cho bạn bị thua lỗ.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Tìm bất
                                        động sản của
                                        những người có nhu cầu bán gấp gáp sẽ giúp bạn mua được thuận lợi tiết kiệm.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Pháp luật quy định
                                            về nhà đất</font>
                                    </b>
                                    <p class="MsoNormal"></p><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Sổ Đỏ<span style="mso-spacerun:yes">    </span></font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Đối với các cuộc giao dịch mua bán nhà đất thì sổ đỏ là 1
                                        yếu tố vô
                                        cùng quan trọng nó còn được gói với 1 cái tên khác là giấy chứng nhận quyền sử
                                        dụng đất. Nó thể hiện cho quyền sở hữu nhà cũng như tất cả mọi tài sản gắn liền
                                        với đất, mang lại tính hợp pháp cho tất cả các sản phẩm bất động sản mà bạn sở
                                        hữu.
                                    </span>
                                    <p class="MsoNormal"></p><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Sổ Hồng<span style="mso-spacerun:yes">       </span></font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Cũng tương tự như sổ đỏ, sổ hồng cũng là giấy chứng nhận
                                        quyền sử dụng
                                        đất và các tài sản gắn liền với đất đó là cơ sở pháp lý khẳng định có quyền sở
                                        hữu, sử dụng các tài sản gắn liền với đất.
                                    </span>
                                    <p class="MsoNormal"></p><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Sổ Xanh<span style="mso-spacerun:yes">    </span></font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>So xanh là giấy chứng nhận quyền sử dụng đất được Lâm
                                        trường cung cấp
                                        nó phục vụ cho mục đích trồng và khai thác rừng có thời hạn. Khi hết thời hạn sẽ
                                        bị thu hồi có một vài trường hợp số xanh sẽ không thể chuyển thành số đỏ.
                                    </span>
                                    <p class="MsoNormal"></p><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Sổ Trắng</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Sổ trắng là giấy chứng nhận quyền sử dụng đất đã được cấp
                                        từ rất lâu từ
                                        trước năm 1975 để công nhận về quyền sở hữu nhà ở và tài sản gắn liền với nhà.
                                    </span>
                                    <h2></h2><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Toàn cảnh về thị
                                            trường nhà đất tại Việt Nam</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Thị trường nhà đất Việt Nam có lúc thăng lúc trầm, tuy
                                        nhiên vào giai
                                        đoạn 2020 thị trường nhà đất luôn giữ được một sự ổn định khi toàn bộ các phân
                                        khúc đều có sự<span style="mso-spacerun:yes">  </span>phục hồi trở lại.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Thị trường nhà đất Việt Nam trong thời điểm hiện tại không
                                        có nhiều những
                                        nhà đầu tư nước ngoài bởi sự ảnh hưởng của đại dịch. Tuy nhiên nó mở ra một cơ
                                        hội không hề nhỏ cho những nhà đầu tư thông thái nước nhà có thể tìm ra hướng
                                        đi riêng tạo nên một sự khởi sắc để mang về những khoản lợi nhuận tối ưu nhất.
                                    </span>
                                    <h2></h2><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Ưu và nhược điểm của
                                            mua bán nhà đất<span style="mso-spacerun:yes">    </span></font>
                                    </b>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Ưu điểm</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Có rất
                                        nhiều các sản
                                        phẩm nhà đất với nhiều mức giá thành khác nhau để bạn có thể lựa chọn.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Thủ tục
                                        sang tên chuyển
                                        nhượng trong thời điểm hiện tại được hỗ trợ vô cùng nhiệt tình và nhanh chóng.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Có nhiều
                                        phân khúc
                                        khác nhau phù hợp với khả năng tài chính của những người có nhu cầu.
                                    </span>
                                    <h3></h3><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font><b>Nhược điểm    </b>
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Mua bán
                                        bất cập mất
                                        nhiều thời gian.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Không tìm
                                        ra được những
                                        cuộc giao dịch như ý chất lượng và an toàn.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Vẫn
                                        thường xuyên gặp
                                        phải các tình trạng giá ảo, nâng giá khiến cho những người mua bán gặp phải
                                        những
                                        vấn đề rủi ro về tài chính.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Không thể
                                        kiểm soát được
                                        mức độ uy tín của chủ đầu tư nhất là đối với những người không có nhiều kinh
                                        nghiệm.
                                    </span>
                                    <h2></h2><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Giá nhà đất thay đổi
                                            liên tục từng ngày từng giờ<span style="mso-spacerun:yes">    </span></font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Giá đất liên tục thay đổi từng ngày từng giờ, đó cũng là
                                        một trong những
                                        yếu tố mà bạn chắc chắn phải quan tâm. Hãy cập nhật ngay cho mình những phương
                                        pháp định giá đúng đắn, hãy trang bị cho mình những kiến thức thậm chí nếu như
                                        không phải là một người sành sỏi sẽ cần đến sự tư vấn của những chuyên gia hàng
                                        đầu. Điều này giúp cho bạn có thể mua bán nhà đất một cách thuận tiện tránh bị
                                        lừa.
                                    </span>
                                    <h2></h2><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Những nguyên tắc
                                            vàng khi lựa chọn vào đầu tư mua bán nhà đất</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Đầu tư mua bán nhà đất là một bài toán khó đòi hỏi bạn
                                        phải giải mã tất
                                        cả những quy tắc.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Tính pháp
                                        lý là một
                                        trong những yếu tố bắt buộc trong tất cả các cuộc giao dịch bất động sản. Yếu tố
                                        này sẽ mang lại cho giá trị cũng như giúp đảm bảo tính pháp chỉ nên mua các sản
                                        phẩm bất động sản có sổ hồng sổ đỏ đang tuyệt đối không mua bằng hình thức viết
                                        tay.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Nên lựa
                                        chọn cho mình
                                        những mảnh đất hội tụ đầy đủ những yếu tố như vị trí đắc địa, gần khu dân cư
                                        đông đúc. Đó là những tiêu chí để giúp cho việc đầu tư của bạn đạt được hiệu quả
                                        cao giúp bạn có thể nhanh chóng mua bán.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Phải kiểm
                                        soát về tài
                                        chính một cách tối đa, bởi việc đầu tư mua bán nhà đất không phải lúc nào cũng
                                        sẽ bán được ngay. Nếu như bạn vay ngân hàng cũng như đầu tư quá nhiều có thể bạn
                                        gặp phải sẽ gặp phải rủi ro tài chính thậm chí dẫn tới thua lỗ.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Hãy để ý
                                        đến tính
                                        thanh khoản của mảnh đất tìm hiểu thông tin kỹ lưỡng đánh giá xem mảnh đất có
                                        nằm
                                        trong diện quy hoạch hay không bằng cách đến các văn phòng địa chính địa phương.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Ngoài ra
                                        còn rất nhiều
                                        những nguyên tắc quan trọng khác khi đầu tư nhà đất như tìm cho mình một nơi an
                                        ninh đảm bảo, không gần đền chùa miếu mạo. Ở nơi có dân cư tốt. Tất cả những yếu
                                        tố này sẽ cộng hưởng với nhau để tạo nên thế mạnh giúp cho mọi giao dịch của bạn
                                        trở nên dễ dàng nhất.
                                    </span>
                                    <h2></h2><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Xu hướng đầu tư
                                            nhà đất mới nhất 2020.</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Từ những quy luật và sự nghiên cứu kỹ càng về thị trường,
                                        các chuyên
                                        gia cũng chia sẻ rằng trong năm 2020 những phân khúc nhà đất dưới đây sẽ trở
                                        thành điểm nóng.
                                    </span>
                                    <p class="MsoNormal" style="text-align: center;"></p><span
                                        style="line-height: 107%; font-family: Roboto;"><img
                                            src="https://news.meeycdn.com/uploads/2020/07/Cac-chuyen-gia-dau-nganh-se-ho-tro-ban-khi-lam-hop-dong-dat-coc-dat.jpg"
                                            alt="Các chuyên gia đầu ngành sẽ hỗ trợ bạn khi làm hợp đồng đặt cọc mua đất"></span>
                                    <p class="MsoNormal" style="text-align: center;"></p><span
                                        style="line-height: 107%; font-family: Roboto;"><i></i><span
                                            style="font-size: medium;">Đầu tư mua bán nhà đất là một bài toán khó đòi
                                            hỏi bạn phải giải mã tất cả những quy tắc vàng.</span>
                                        <font size="3"><br></font>
                                    </span>
                                    <div></div><span style="line-height: 107%; font-family: Roboto;"><span
                                            style="font-size: medium;"></span><br></span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Đất nền</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Đất nền luôn luôn được coi là một trong những sản phẩm đầu
                                        tư vô cùng
                                        an toàn và hiệu quả. Đối với sự phát triển của cơ sở hạ tầng và sự xuất hiện của
                                        các chủ đầu tư uy tín, giá thành phù hợp nó sẽ tiếp tục nóng lên trong giai đoạn
                                        2020.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">Nhà ở bình dân</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Đặc biệt cũng theo các chuyên gia nhận định thì thị trường
                                        nhà đất ở tại
                                        Việt Nam năm 2020 sẽ nổi bật với phân khúc nhà bình dân. Phân khúc nhà đất này
                                        sẽ<span style="mso-spacerun:yes">  </span>phát triển một cách bền vững bởi nó
                                        hướng tới đối tượng khách hàng có thu nhập thấp, thu nhập trung bình đó là 1
                                        kênh mà chắc chắn rằng các chủ đầu tư sẽ không thể bỏ qua.
                                    </span>
                                    <h3></h3><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Bất động sản
                                            thương mại</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Hòa cùng sự phát triển của thời đại bất động sản thương
                                        mại đầu tư chắc
                                        chắn cũng là 1 trong những sự lựa chọn mà bạn không thể bỏ qua. Nó sẽ mang lại
                                        cho bạn cơ hội sinh lợi nhuận đặc biệt phải kể đến các loại hình nhà đất như
                                        văn phòng cho thuê văn phòng dịch vụ., căn hộ du lịch...<span
                                            style="mso-spacerun:yes">    </span>
                                    </span>
                                    <h2></h2><b style="mso-bidi-font-weight:normal"><span
                                            style="line-height: 107%; font-family: Roboto;"></span>
                                        <font size="3">
                                            Đầu tư mua bán nhà
                                            đất tại Meey Land là hiệu quả nhất</font>
                                    </b>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Thấu hiểu được tất cả những bất cập của thị trường mua bán
                                        nhà đất vốn
                                        dĩ còn nhiều bất cập. Từ những con người tài năng am hiểu BĐS với hơn 10 năm
                                        trăn trở. Sàn giao dịch bất động sản Meeyland đã chính thức được ra mắt. Tại
                                        đây mang tới cho bạn vô vàn ưu điểm để bạn có thể kiểm soát được những cuộc
                                        giao dịch chất lượng của mình.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Tích hợp
                                        công nghệ hiện
                                        đại 4.0 như trí tuệ nhân tạo ai, công nghệ blockchain big data, để mang lại cho
                                        những cuộc giao dịch trở nên chất lượng an toàn và hiệu quả.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Số lượng
                                        người mua bán
                                        truy cập vào website rất đông, đó là cơ hội để bạn có thể tiếp cận và tìm kiếm
                                        được các sản phẩm bất động sản tốt nhất.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Tất cả
                                        mọi chức năng đều
                                        được kiểm duyệt một cách kỹ lưỡng hạn chế được thông tin rác, tin đăng Spam.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Giao diện
                                        hiện đại
                                        thân thiện tích hợp đa nền tảng: website, App Mobile vì thế mà mà không cần phải
                                        đi đâu xa chỉ cần ngồi một chỗ bạn vấn sẽ tìm kiếm được những cuộc giao dịch
                                        chất
                                        lượng an toàn.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>•<span style="mso-tab-count:1">           </span>Mua bán
                                        bất động sản dễ
                                        dàng hơn nhiều với tính năng đăng tin VIP<span
                                            style="mso-spacerun:yes"></span>mọi thông tin của bạn sẽ được hiển thị ở tại
                                        trang chủ với một mức chi
                                        phí hợp lý.
                                    </span>
                                    <p class="MsoNormal"></p><span style="line-height: 107%; font-family: Roboto;">
                                        <font size="3"></font>Nhà đất vẫn luôn là mối quan tâm hàng đầu của người Việt,
                                        với tất cả những
                                        chia sẻ trong nội dung bài viết trên hi vọng bạn đã có được cái nhìn tổng quan
                                        nhất. Đừng quên quay trở lại với website của chúng tôi để cập nhật thêm những
                                        tin tức hữu ích cũng như săn tìm cho mình những sản phẩm bất động sản giá trị
                                        nhất.
                                    </span>
                                    <p class="MsoNormal"></p>
                                    <font face="Roboto" size="3"><b>Mua bán nhà Đất MVT</b> với công cụ MVT phát triển
                                        bởi Meeyland. Bạn hoàn toàn có thể tiếp cận bất động sản nhanh nhất, đúng nhu
                                        cầu, giá hợp lý. Với nền tảng công nghệ 4.0, Big data, Artificial
                                        Intelligence(AI),  Machine Learning(ML) sẽ giúp bạn Mua bán nhà Đất nhanh nhất,
                                        Phương pháp MVT của chúng tôi chưa từng có ai làm được tại Việt Nam.</font>
                                </div>
                                <div class="moreContent"><span class="xemthem" id="xemthem">Xem thêm</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="index-page" id="js-page-verify" hidden></div>
</main>
@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
<script type="text/javascript">
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

    });
</script>
@endsection