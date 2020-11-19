@extends('layouts.master')
@section('title',$product->title)
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->
@stop
@section('content')
<main>
  <h2 class="text-center">Chi Tiết Tin</h2>
    <section class="pages-sanpham pt-30">
        <h3 class="text-right"></h3>
        <div class="max-width-container">
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-4 col-12 sec-1">
                    <section class="sanpham-s1">
                        <div class="sec-1">
                            <div class="sec-1-box">
                                <div class="avatar"> <img src="{{asset('assets/icon/avatar.png')}}" alt=""></div>
                                <div class="content">
                                    <div class="content-1">
                                        <div class="name">
                                            <p class="section-content">{{$product->name_contact}}</p>
                                        </div>
                                        <div class="host">
                                            <p class="section-content">Nhà môi giới</p>
                                        </div>
                                    </div>
                                    <div class="content-2">
                                        <div class="vertical-line"></div>
                                    </div>
                                    <div class="content-3">
                                        <p> <span class="material-icons">call </span>{{$product->phone_contact}}</p>
                                        <p> <span class="material-icons">chat </span>Gửi tin nhắn </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sec-2">
                            <div class="sec-2-box">
                                <h2 class="section-content text-uppercase">THÔNG TIN CHÍNH</h2>
                                <div class="sec-2-content">
                                    <p class="section-content">Nhu Cầu </p>
                                    <div class="dashed-line"> </div>
                                    <p class="section-content active">{{$cate}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="sec-3">
                            <div class="sec-3-box">
                                <h2 class="section-content text-uppercase">vị trí</h2>
                                <div class="sec-3-content">
                                    <div class="line-text">
                                        <p class="section-content">Tỉnh/Thành Phố</p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">{{$product->province}}</p>
                                    </div>
                                    <div class="line-text">
                                        <p class="section-content">Quận/Huyện</p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">{{$product->district}}</p>
                                    </div>
                                    <div class="line-text">
                                        <p class="section-content">Phường/Xã</p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">{{$product->ward}}</p>
                                    </div>
                                    <!-- <div class="line-text">
										<p class="section-content">Đường, Phố </p>
										<div class="dashed-line"> </div>
										<p class="section-content active">Cần bán</p>
									</div>
									<div class="line-text">
										<p class="section-content">Dự Án</p>
										<div class="dashed-line"> </div>
										<p class="section-content active">Cần bán</p>
									</div> -->
                                </div>
                            </div>
                        </div>
                        <div class="sec-3">
                            <div class="sec-3-box">
                                <h2 class="section-content text-uppercase">THÔNG TIN BĐS</h2>
                                <div class="sec-3-content">
                                    <!-- <div class="line-text">
										<p class="section-content">Loại hình</p>
										<div class="dashed-line"> </div>
										<p class="section-content active">Dự án bất động sản</p>
									</div> -->
                                    <div class="line-text">
                                        <p class="section-content">Mặt Tiền</p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">{{$product->facades}} m</p>
                                    </div>
                                    <div class="line-text">
                                        <p class="section-content">Chiều Sâu</p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">{{$product->depth}} m</p>
                                    </div>
                                    <div class="line-text">
                                        <p class="section-content">Diện Tích </p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">{{$acreage}} m²</p>
                                    </div>
                                    <div class="line-text">
                                        <p class="section-content">Đơn Giá</p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">{{$product->price}} {{$product->unit}}</p>
                                    </div>
                                    <!-- <div class="line-text">
										<p class="section-content">Tổng Giá</p>
										<div class="dashed-line"> </div>
										<p class="section-content active"></p>
									</div> -->
                                    <!-- <div class="line-text">
										<p class="section-content">Hướng</p>
										<div class="dashed-line"> </div>
										<p class="section-content active"> </p>
									</div>
									<div class="line-text">
										<p class="section-content">Đường Rộng</p>
										<div class="dashed-line"> </div>
										<p class="section-content active"> </p>
									</div> -->
                                    <div class="line-text">
                                        <p class="section-content">Loại Nhà Đất</p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">
                                            @foreach($product_cate as $cate)
                                            {{$cate->name}},
                                            @endforeach
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="sec-3">
                            <div class="sec-3-box">
                                <h2 class="section-content text-uppercase">vị trí</h2>
                                <div class="sec-3-content">
                                    <div class="line-text">
                                        <p class="section-content">Số Tầng</p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">{{$product->floor}}</p>
                                    </div>
                                    <div class="line-text">
                                        <p class="section-content">Số Phòng Ngủ</p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">{{$product->bedroom}}</p>
                                    </div>
                                    <div class="line-text">
                                        <p class="section-content">Giấy Tờ Pháp Lý</p>
                                        <div class="dashed-line"> </div>
                                        <p class="section-content active">{{$product->legal}}</p>
                                    </div>
                                    <!-- <div class="line-text">
										<p class="section-content">Mức Độ Giao Dịch</p>
										<div class="dashed-line"> </div>
										<p class="section-content active"> </p>
									</div>
									<div class="line-text">
										<p class="section-content">Đặc Điểm Nổi Trội</p>
										<div class="dashed-line"> </div>
										<p class="section-content active"> </p>
									</div>
									<div class="line-text">
										<p class="section-content">Tiền Hoa Hồng</p>
										<div class="dashed-line"> </div>
										<p class="section-content active"> </p>
									</div> -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-9 col-sm-12 col-md-8 col-12 sec-2">
                    <section class="sanpham-s-2" id="mota">
                        <div class="sanpham-wrapper">
                            <div class="swiper-container sanpham-slider">
                                <!-- <div class="tag-thuongluong">Thương lượng</div> -->
                                <div class="swiper-wrapper">
                                    @foreach($image as $img)
                                    <div class="swiper-slide">
                                        <div class="img-box">
                                            <a href="{{asset('assets/product/detail/')}}/{{$img->name}}" data-fancybox>
                                                <img src="{{asset('assets/product/detail')}}/{{$img->name}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="arrow-button">
                                <div class="swiper-button-next"> <span
                                        class="material-icons">keyboard_arrow_right</span></div>
                                <div class="swiper-button-prev"><span class="material-icons">keyboard_arrow_left</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <h1 class="section-under-title text-uppercase">{{$product->title}}</h1>
                            <div class="info">
                                <div class="cover"> <span class="material-icons">calendar_today </span>
                                    <p>{{date('d-m-Y',strtotime($product->datetime_start))}}</p>
                                </div>
                                <div class="cover"> <span class="material-icons">visibility </span>
                                    <p>{{$product->view}}</p>
                                </div>
                                <div class="cover"> <span class="material-icons">loyalty </span>
                                    <p>Nhà môi giới</p>
                                </div>
                            </div>
                            <div class="article-content">
                                <div class="title">
                                    <h2>mô tả</h2>
                                </div>

                                <?php echo $product->content ; ?>
                            </div>
                            <div class="share">
                                <button class="btn btn-share">
                                    <p>Chia sẻ Facebook</p>
                                </button>
                                <button class="btn btn-share">
                                    <p>Chia sẻ Zalo</p>
                                </button>
                            </div>
                            <div class="contact-info" id="info">
                                <div class="title">
                                    <h2>thông tin liên hệ</h2>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 content"><span class="material-icons">account_circle </span>
                                        <p>{{$product->name_contact}}</p>
                                    </div>
                                    <div class="col-sm-6 content"><span class="material-icons">call</span>
                                        <p>{{$product->phone_contact}}</p>
                                    </div>
                                    <div class="col-sm-6 content"><span class="material-icons">room</span>
                                        <p>{{$product->address_contact}}</p>
                                    </div>
                                    <div class="col-sm-6 content"><span class="material-icons">email</span>
                                        <p>{{$product->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            
            <div class="button-sm d-block d-md-none">
                <div class="btn"><a href="#mota">Mô tả</a></div>
                <div class="btn"><a href="#info">Thông tin </a></div>
                <div class="btn"><a href="#contact">Liên hệ</a></div>
            </div>
        </div>
        <div class="">
        @if($new->status==0)
        <a href="{{route('update-post',$new->id)}}"> <button class="btn btn-success "> Duyệt tin </button> </a>
        <a href="{{route('del-post',$product->id)}}"><button class="btn btn-danger">Xóa bài </button></a>
        @else
        <a href="{{route('del-post',$product->id)}}"><button class="btn btn-danger">Xóa bài </button></a>
        @endif
        </div>
    </section>
    <div class="index-page" id="js-page-verify" hidden></div>
</main>
@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@endsection