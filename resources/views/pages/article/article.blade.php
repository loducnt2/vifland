@extends('layouts.master')
@section('title',$product->title)
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->
<style>
    .delete-post{
        position: fixed;
        top: 30%;
        right: 0;
        width: 50px;
        height: 50px;
        background: red;
        line-height: 50px;
        text-align: center;
        color: #fff;
    }
</style>

@stop
@section('content')
<main>
    <div class="global-breadcrumb">
        <div class="max-width-container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> <i class="ri-arrow-left-line icons-breadcrum"></i>Mua/ Bán
                        <span class="sll-breadcrum">&nbsp; (1.475.822 tin đăng)</span></a></li>
                <li class="breadcrumb-item"><a href="#">
                        <p>Mở bán dự án đô thị sinh thái thông minh Aqua City, phía Đông thành phố Hồ Chí Minh </p>
                    </a></li>
                <!-- <div class="search">
                    <form action="">
                        <input type="text" placeholder="Bạn cần tìm hôm nay?">
                    </form>
                </div> -->
            </ol>
        </div>
    </div>
    <section class="pages-sanpham pt-30">
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
                                            <p class="section-content">{{auth()->user()->full_name}}</p>
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
                                            {{ App\Models\ProductCate::where('id',$product->product_cate)->value('name')  }}
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
            <section class="sanpham-s-3" id="contact">
                <h2 class="section-under-title text-uppercase">các bài đăng liên quan
                    <!-- <div class="article-none"> <img src="{{asset('assets/san_pham/no-documents.png')}}" alt="">
						<p>Không có bài đăng nào.</p>
					</div> -->
                    <div class="article-wrapper swiper-container">
                        <div class="swiper-wrapper">
                            @foreach( $product_related as $product )
                            <div class="swiper-slide">
                                <div class="box-sp">
                                    <div class="box-sp-img"><a class="localstore" localstore="{{$product->product_id}}"
                                            href="{{route('article-detail',$product->slug)}}"><img
                                                src="{{asset('assets/product/detail/')}}/{{$product->thumbnail}}" alt=""></a>
                                        <div class="tag-thuongluong">
                                            {{ $product->price == 0?$product->price="":$product->price}} {{$product->unit}}
                                        </div>
                                        <div class="box-icon">
                                            <i class="fav ri-heart-line icons" productid="{{$product->product_id}}"></i>
                                            <i class="ri-equalizer-line icons comp" productid="{{$product->product_id}}" ></i>
                                        </div>
                                        <div class="overlay"></div>
                                        <div class="vip">
                                            <!-- {{$product->type}} -->

                                            @if ($product->type != 4)
                                            <img src="{{asset('assets/icon/vip'.$product->type.'.svg')}}" alt="">
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <div class="box-sp-text">
                                        <a class="localstore" localstore="{{$product->product_id}}"
                                            href="{{route('article-detail',$product->slug)}}">
                                            @if($product->type == 1)
                                            <h5 class="title-text lcl lcl-2 vip1">{{$product->title}}</h5>
                                            @elseif($product->type == 2)
                                            <h5 class="title-text lcl lcl-2 vip2">{{$product->title}}</h5>
                                            @elseif($product->type == 3)
                                            <h5 class="title-text lcl lcl-2 vip3">{{$product->title}}</h5>
                                            @else
                                            <h5 class="title-text lcl lcl-2">{{$product->title}}</h5>
                                            @endif
                                        </a>
                                        <div class="location"> <span class="material-icons">location_on</span>
                                            <p class="lcl lcl-1" data-toggle="tooltip" data-placement="bottom"
                                                title="{{$product->district}}, {{$product->province}}">{{$product->district}},
                                                {{$product->province}}</p>
                                        </div>
                                        <div class="mota-place">
                                            <div class="mota-place-1">
                                                <div class="mota-place-tt"><img src="{{asset('assets/icon/dientich.png')}}"
                                                        alt=""><span data-toggle="tooltip" data-placement="bottom"
                                                        title="{{intval($product->depth)*intval($product->facades) }} m²">{{intval($product->depth)*intval($product->facades) }}
                                                        m²</span></div>
                                                <div class="mota-place-tt"><img src="{{asset('assets/icon/icon-road@3x.png')}}"
                                                        alt=""><span data-toggle="tooltip" data-placement="bottom"
                                                        title="Tooltip on bottom">Mặt phố - mặt đường</span></div>
                                                <div class="mota-place-tt"><img
                                                        src="{{asset('assets/icon/rectangle-copy-2@3x.png')}}" alt=""><span
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="{{$product->facades}}">{{$product->facades}} m</span></div>
                                            </div>
                                            <div class="mota-place-1">
                                                <div class="mota-place-tt"><img
                                                        src="{{asset('assets/icon/rectangle-2@3x.png')}}" alt=""><span
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="{{$product->floors}} Tầng">{{$product->floors>0?$product->floors.' '.'Tầng':""}}</span>
                                                </div>
                                                <div class="mota-place-tt"><img
                                                        src="{{asset('assets/icon/rectangle-3@3x.png')}}" alt=""><span
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="{{$product->bedroom}} Phòng ngủ">{{$product->bedroom > 0 ? $product->bedroom.' '.'Phòng ngủ':""}}
                                                    </span></div>
                                                <div class="mota-place-tt"><span
                                                        class="material-icons icons-15">group</span><span data-toggle="tooltip"
                                                        data-placement="bottom" title=""
                                                        data-original-title="Tooltip on bottom"></span></div>
                                            </div>
                                        </div>
                                        <div class="end-mota">
                                            <div class="mota-end-box">
                                                <div class="end-box-tt"><span
                                                        class="material-icons icons-15">event_note</span><span>{{date('d/m/Y',strtotime($product->datetime_start))}}</span>
                                                </div>
                                                <div class="end-box-tt"><span
                                                        class="material-icons icons-15">visibility</span><span>{{$product->view}}</span>
                                                </div>
                                                <div class="end-box-tt"><span
                                                        class="material-icons icons-15 chat">chat</span><span class="chat">chat
                                                        ngay</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination mx-auto"></div>
                    </div>
                </h2>
            </section>
            <div class="button-sm d-block d-md-none">
                <div class="btn"><a href="#mota">Mô tả</a></div>
                <div class="btn"><a href="#info">Thông tin </a></div>
                <div class="btn"><a href="#contact">Liên hệ</a></div>
            </div>
        </div>
    </section>
    <div class="index-page" id="js-page-verify" hidden></div>
</main>

@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@endsection