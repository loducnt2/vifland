@extends('layouts.master')
@section('title','Trang chủ')
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->
@stop
@section('content')
<!-- @include('layouts.logo_animation') -->
<main>
    <<<<<<< HEAD <section class="index-s1" id="home">
        <div class="max-width-container">
            <div class="row pd-banner">
                <div class="col-xs-4 col-md-4 col-lg-3">
                    <div class="box-left-banner">
                        <h2 class="title-banner">Hệ sinh thái <br>Bất động sản</h2>
                        <p class="text-banner">Cuộc cách mạng vĩ đại trong kỷ nguyên 4.0 với sự kết hợp hoàn hảo giữa:
                            con người + trí thông minh nhân tạo + bất động sản + đầu tư tài chính</p>
                    </div>
                </div>
                <div class="col-xs-8 col-md-8 col-lg-9">
                    <div class="slide-banner">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="img-banner"><img src="{{asset('assets/bg/banner1.png')}}" alt=""></div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="img-banner"><img src="{{asset('assets/bg/banner2.png')}}" alt=""></div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="img-banner"><img src="{{asset('assets/bg/banner3.png')}}" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <section class="index-s2">
            <div class="max-width-container">
                <div class="box-menu-mobile">
                    <div class="box-mobile-wrap">
                        <div class="box-m"><a href=""><img src="./assets/icon/house@3x.png" alt="">
                                <p>{{$categories['0']->name}} </p>
                            </a></div>
                        <div class="box-m"><a href=""><img src="./assets/icon/rent@3x.png" alt="">
                                <p>{{$categories['1']->name}}</p>
                            </a></div>
                        <div class="box-m"><a href=""><img src="./assets/icon/transfer-image-category.png" alt="">
                                <p>{{$categories['2']->name}}</p>
                            </a></div>
                    </div>
                </div>
                <div class="box-search-index">
                    <form action=""></form>
                    <div class="row">
                        <div class="col-3">
                            <div class="box-left">
                                <div class="warp-form">
                                    <div class="checked">
                                        <input id="idgiaohang1" type="radio" value="{{$categories['0']->id}}"
                                            name="requirement">
                                        <label for="idgiaohang1">{{$categories['0']->name}}</label>
                                    </div>
                                    <div class="checked">
                                        <input id="idgiaohang2" type="radio" value="{{$categories['1']->id}}"
                                            name="requirement">
                                        <label for="idgiaohang2">{{$categories['1']->name}}</label>
                                    </div>
                                    <div class="checked">
                                        <input id="idgiaohang3" type="radio" value="{{$categories['2']->id}}"
                                            name="requirement">
                                        <label for="idgiaohang3">{{$categories['2']->name}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="box-right">
                                <div class="row">
                                    <div class="col-9">
                                        <input class="search" type="text" name="keyword"
                                            placeholder="Bạn tìm gì hôm nay?">
                                    </div>
                                    <div class="col-3">
                                        <button class="timkiem-1"> <span>Tìm Kiếm</span></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group-sl1 sl-1">
                                            <select class="select1 sltp" name="tinhthanh">
                                                <option value="">Tỉnh/ Thành phố</option>
                                                @foreach($province as $prov)
                                                <option value="{{$prov->id}}">{{$prov->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group-sl1 sl-2 select-many">
                                            <select class="select1 slnhadat" name="loainhadat[]" multiple="multiple">
                                                @foreach($product_cate as $prodcate)
                                                <option value="{{$prodcate->id}}">{{$prodcate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group-sl1 sl-3 select-many">
                                            <select class="select1 slgia" name="khoanggia[]" multiple="multiple">
                                                @foreach($filter_price as $price)
                                                <option value="{{$price->id}}">{{$price->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group-select">
                                            <div class="box-left-se"><i class="ri-filter-line"></i></div>
                                            <div class="box-mid-se"><span class="timnangcao">Tìm Nâng Cao</span></div>
                                            <div class="box-right-se"><i class="ri-arrow-down-s-fill"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="index-sc3">
            <div class="max-width-container border-bottom">
                <div class="category-container">
                    <div class="row">
                        <div class="col-4">
                            <div class="box-cate">
                                <a href="/mua-ban-nha-dat">
                                    <div class="img"><img src="{{asset('assets/index/mua-ban-nha-dat.png')}}" alt="">
                                    </div>
                                    <div class="title-box">{{$categories[0]->name}}</div>
                                </a>
                                <div class="end-box">
                                    <a href="/mua-ban-nha-dat">
                                        <div class="box-left"><span class="material-icons">list</span>
                                            <p>{{count($product_by_cate1)}} Tin đăng</p>
                                        </div>
                                    </a>
                                    <a href="{{route('new',$categories[0]->slug)}}">
                                        <div class="box-right"><span class="material-icons">playlist_add</span>
                                            <p>Đăng bài</p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-cate">
                                <a href="/cho-thue-nha-dat">
                                    <div class="img"><img src="{{asset('assets/index/cho-thue-nha-dat.png')}}" alt="">
                                    </div>
                                    <div class="title-box">{{$categories[1]->name}}</div>
                                </a>
                                <div class="end-box">
                                    <a href="/cho-thue-nha-dat">
                                        <div class="box-left"><span class="material-icons">list</span>
                                            <p>{{count($product_by_cate2)}} Tin đăng</p>
                                        </div>
                                    </a>
                                    <a href="{{route('new',$categories[1]->slug)}}">
                                        <div class="box-right"><span class="material-icons">playlist_add</span>
                                            <p>Đăng bài</p>
                                        </div>
                                    </a>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-cate">
                                <a href="/sang-nhuong-nha-dat">
                                    <div class="img"><img src="{{asset('assets/index/sang-nhuong-nha-dat.png')}}"
                                            alt="">
                                    </div>
                                    <div class="title-box">{{$categories[2]->name}}</div>
                                </a>
                                <div class="end-box">
                                    <a href="/sang-nhuong-nha-dat">
                                        <div class="box-left"><span class="material-icons">list</span>
                                            <p>{{count($product_by_cate3)}} Tin đăng</p>
                                        </div>
                                    </a>
                                    <a href="{{route('new',$categories[2]->slug)}}">
                                        <div class="box-right"><span class="material-icons">playlist_add</span>
                                            <p>Đăng bài</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="index-sc4">
            <div class="max-width-container">
                <div class="text-title">
                    <div class="text-left"><a class="text-desktop" href="/mua-ban-nha-dat">
                            <h3>{{$categories[0]->name}}</h3>
                        </a></div>
                    <div class="text-right"><a class="text-desktop" href="/mua-ban-nha-dat"><i
                                class="ri-equalizer-line"></i>
                            <p>Xem tất cả &nbsp;<span>({{count($product_by_cate1)}} Tin đăng)</span></p>
                        </a></div>
                </div>
            </div>
        </section>
        <section class="index-sc5 sanpham-list">
            <div class="max-width-container">
                <div class="swiper-container slideSpHome">
                    <div class="swiper-wrapper">
                        @if(count($product_by_cate1)>0)
                        @foreach($product_by_cate1 as $product)
                        <div class="swiper-slide">
                            <div class="box-sp">
                                <div class="box-sp-img"><a href="{{route('article-detail-1',$product->slug)}}"><img
                                            src="{{asset('assets/product/sanpham1.webp')}}" alt=""></a>
                                    <div class="tag-thuongluong">Thương lượng</div>
                                    <div class="box-icon"><i class="ri-heart-line icons"></i><i
                                            class="ri-equalizer-line icons"></i></div>
                                    <div class="overlay"></div>
                                </div>
                                <div class="box-sp-text">
                                    <a href="{{route('article-detail-1',$product->slug)}}">
                                        <h5 class="title-text lcl lcl-2">{{$product->title}}</h5>
                                    </a>
                                    <div class="location"> <span class="material-icons">location_on</span>
                                        <p class="lcl lcl-1" data-toggle="tooltip" data-placement="bottom"
                                            title="{{$product->district}}, {{$product->province}}">
                                            {{$product->district}},
                                            {{$product->province}}</p>
                                    </div>
                                    <div class="mota-place">
                                        <div class="mota-place-1">
                                            <div class="mota-place-tt"><img src="{{asset('assets/icon/dientich.png')}}"
                                                    alt=""><span data-toggle="tooltip" data-placement="bottom"
                                                    title="{{intval($product->depth)*intval($product->facades) }} m²">{{intval($product->depth)*intval($product->facades) }}
                                                    m²</span></div>
                                            <div class="mota-place-tt"><img
                                                    src="{{asset('assets/icon/icon-road@3x.png')}}" alt=""><span
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Tooltip on bottom">Mặt phố - mặt đường</span></div>
                                            <div class="mota-place-tt"><img
                                                    src="{{asset('assets/icon/rectangle-copy-2@3x.png')}}" alt=""><span
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="{{$product->facades}}">{{$product->facades}} m</span></div>
                                        </div>
                                        <!-- <div class="mota-place-1">
=======

	<section class="index-s1" id="home">
		<div class="max-width-container">
			<div class="row pd-banner">
				<div class="col-xs-4 col-md-4 col-lg-3">
					<div class="box-left-banner">
						<h2 class="title-banner">Hệ sinh thái <br>Bất động sản</h2>
						<p class="text-banner">Cuộc cách mạng vĩ đại trong kỷ nguyên 4.0 với sự kết hợp hoàn hảo giữa: con người + trí thông minh nhân tạo + bất động sản + đầu tư tài chính</p>
					</div>
				</div>
				<div class="col-xs-8 col-md-8 col-lg-9">
					<div class="slide-banner">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="img-banner"><img src="{{asset('assets/bg/banner1.png')}}" alt=""></div>
								</div>
								<div class="swiper-slide">
									<div class="img-banner"><img src="{{asset('assets/bg/banner2.png')}}" alt=""></div>
								</div>
								<div class="swiper-slide">
									<div class="img-banner"><img src="{{asset('assets/bg/banner3.png')}}" alt=""></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="index-s2">
		<div class="max-width-container">
			<div class="box-menu-mobile">
				<div class="box-mobile-wrap">
					<div class="box-m"><a href=""><img src="./assets/icon/house@3x.png" alt="">
							<p>{{$categories['0']->name}} </p></a></div>
					<div class="box-m"><a href=""><img src="./assets/icon/rent@3x.png" alt="">
							<p>{{$categories['1']->name}}</p></a></div>
					<div class="box-m"><a href=""><img src="./assets/icon/transfer-image-category.png" alt="">
							<p>{{$categories['2']->name}}</p></a></div>
				</div>
			</div>
			<div class="box-search-index">
				<form action=""></form>
				<div class="row">
					<div class="col-3">
						<div class="box-left">
							<div class="warp-form">
								<div class="checked">
									<input id="idgiaohang1" type="radio" value="{{$categories['0']->id}}" name="requirement">
									<label for="idgiaohang1">{{$categories['0']->name}}</label>
								</div>
								<div class="checked">
									<input id="idgiaohang2" type="radio" value="{{$categories['1']->id}}" name="requirement">
									<label for="idgiaohang2">{{$categories['1']->name}}</label>
								</div>
								<div class="checked">
									<input id="idgiaohang3" type="radio" value="{{$categories['2']->id}}" name="requirement">
									<label for="idgiaohang3">{{$categories['2']->name}}</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-9">
						<div class="box-right">
							<div class="row">
								<div class="col-9">
									<input class="search" type="text" name="keyword" placeholder="Bạn tìm gì hôm nay?">
								</div>
								<div class="col-3">
									<button class="timkiem-1"> <span>Tìm Kiếm</span></button>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<div class="form-group-sl1 sl-1">
										<select class="select1 sltp" name="tinhthanh">
											<option value="">Tỉnh/ Thành phố</option>
											@foreach($province as $prov)
												<option value="{{$prov->id}}">{{$prov->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-3">
									<div class="form-group-sl1 sl-2 select-many">
										<select class="select1 slnhadat" name="loainhadat[]" multiple="multiple">
											@foreach($product_cate as $prodcate)
											<option value="{{$prodcate->id}}">{{$prodcate->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-3">
									<div class="form-group-sl1 sl-3 select-many">
										<select class="select1 slgia" name="khoanggia[]" multiple="multiple">
											@foreach($filter_price as $price)
												<option value="{{$price->id}}">{{$price->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-3">
									<div class="form-group-select">
										<div class="box-left-se"><i class="ri-filter-line"></i></div>
										<div class="box-mid-se"><span class="timnangcao">Tìm Nâng Cao</span></div>
										<div class="box-right-se"><i class="ri-arrow-down-s-fill"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="index-sc3">
		<div class="max-width-container border-bottom">
			<div class="category-container">
				<div class="row">
					<div class="col-4">
						<div class="box-cate">
							<a href="/mua-ban-nha-dat">
								<div class="img"><img src="{{asset('assets/index/mua-ban-nha-dat.png')}}" alt=""></div>
								<div class="title-box">{{$categories[0]->name}}</div>
							</a>
							<div class="end-box">
								<a href="/mua-ban-nha-dat">
									<div class="box-left"><span class="material-icons">list</span>
										<p>{{$count_cate1}} Tin đăng</p>
									</div>
								</a>
								<a href="{{route('new',$categories[0]->slug)}}">
									<div class="box-right"><span class="material-icons">playlist_add</span>
											<p>Đăng bài</p>
									</div>
								</a>
							</div>
							
						</div>
					</div>
					<div class="col-4">
						<div class="box-cate">
							<a href="/cho-thue-nha-dat">
								<div class="img"><img src="{{asset('assets/index/cho-thue-nha-dat.png')}}" alt=""></div>
								<div class="title-box">{{$categories[1]->name}}</div>
							</a>
							<div class="end-box">
								<a href="/cho-thue-nha-dat">
									<div class="box-left"><span class="material-icons">list</span>
										<p>{{$count_cate2}} Tin đăng</p>
									</div>
								</a>
								<a href="{{route('new',$categories[1]->slug)}}">
									<div class="box-right"><span class="material-icons">playlist_add</span>
										<p>Đăng bài</p>
									</div>
								</a>
							</div>
							</a>
						</div>
					</div>
					<div class="col-4">
						<div class="box-cate">
							<a href="/sang-nhuong-nha-dat">
								<div class="img"><img src="{{asset('assets/index/sang-nhuong-nha-dat.png')}}" alt=""></div>
								<div class="title-box">{{$categories[2]->name}}</div>
							</a>
							<div class="end-box">
								<a href="/sang-nhuong-nha-dat">
									<div class="box-left"><span class="material-icons">list</span>
										<p>{{$count_cate3}} Tin đăng</p>
									</div>
								</a>
								<a href="{{route('new',$categories[2]->slug)}}">
									<div class="box-right"><span class="material-icons">playlist_add</span>
										<p>Đăng bài</p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="index-sc4">
		<div class="max-width-container">
			<div class="text-title">
				<div class="text-left"><a class="text-desktop" href="/mua-ban-nha-dat">
						<h3>{{$categories[0]->name}}</h3></a></div>
				<div class="text-right"><a class="text-desktop" href="/mua-ban-nha-dat"><i class="ri-equalizer-line"></i>
						<p>Xem tất cả &nbsp;<span>({{count($product_by_cate1)}} Tin đăng)</span></p></a></div>
			</div>
		</div>
	</section>
	<section class="index-sc5 sanpham-list">
		<div class="max-width-container">
			<div class="swiper-container slideSpHome">
				<div class="swiper-wrapper">
					@if(count($product_by_cate1)>0)
					@foreach($product_by_cate1 as $product)
					<div class="swiper-slide">
						<div class="box-sp">
							<div class="box-sp-img"><a class="localstore" localstore="{{$product->product_id}}" href="{{route('article-detail',$product->slug)}}"><img src="{{asset('assets/product/sanpham1.webp')}}" alt=""></a>
								<div class="tag-thuongluong">{{$product->price}} {{$product->unit}}</div>
								<div class="box-icon"><a href="" class="fav" productid="{{$product->product_id}}" ><i class="ri-heart-line icons"></i></a><a href="" class="comp" productid="{{$product->product_id}}"><i class="ri-equalizer-line icons"></i></a></div>
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
>>>>>>> 5c37e6449c6199eee9610ab0f5f59c86434c326d
										<div class="mota-place-tt"><img src="./assets/icon/rectangle-2@3x.png" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Sàn văn phòng, Mặt bằng thương mại, Phòng học </span></div>
										<div class="mota-place-tt"><img src="./assets/icon/rectangle-3@3x.png" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">---</span></div>
										<div class="mota-place-tt"><span class="material-icons icons-15">group</span><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">{{$product->depth*$product->facades}} m²</span></div>
									</div> -->
                                        <<<<<<< HEAD </div>
                                            <div class="end-mota">
                                                <div class="mota-end-box">
                                                    <div class="end-box-tt"><span
                                                            class="material-icons icons-15">event_note</span><span>22/09/2020</span>
                                                    </div>
                                                    <div class="end-box-tt"><span
                                                            class="material-icons icons-15">visibility</span><span>{{$product->view}}</span>
                                                    </div>
                                                    <div class="end-box-tt"><span
                                                            class="material-icons icons-15 chat">chat</span><span
                                                            class="chat">chat
                                                            ngay</span></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="index-sc4">
            <div class="max-width-container">
                <div class="text-title">
                    <div class="text-left"><a class="text-desktop" href="/cho-thue-nha-dat">
                            <h3>{{$categories[1]->name}}</h3>
                        </a></div>
                    <div class="text-right"><a class="text-desktop" href="/cho-thue-nha-dat"><i
                                class="ri-equalizer-line"></i>
                            <p>Xem tất cả &nbsp;<span>({{count($product_by_cate2)}} Tin đăng)</span></p>
                        </a></div>
                </div>
            </div>
        </section>
        <section class="index-sc5 sanpham-list">
            <div class="max-width-container">
                <div class="swiper-container slideSpHome">
                    <div class="swiper-wrapper">
                        @if(count($product_by_cate2)>0)
                        @foreach($product_by_cate2 as $product)
                        <div class="swiper-slide">
                            <div class="box-sp">
                                <div class="box-sp-img"><a href="{{route('article-detail-2',$product->slug)}}"><img
                                            src="{{asset('assets/product/sanpham1.webp')}}" alt=""></a>
                                    <div class="tag-thuongluong">Thương lượng</div>
                                    <div class="box-icon"><i class="ri-heart-line icons"></i><i
                                            class="ri-equalizer-line icons"></i></div>
                                    <div class="overlay"></div>
                                </div>
                                <div class="box-sp-text">
                                    <a href="{{route('article-detail-2',$product->slug)}}">
                                        <h5 class="title-text lcl lcl-2">{{$product->title}}</h5>
                                    </a>
                                    <div class="location"> <span class="material-icons">location_on</span>
                                        <p class="lcl lcl-1" data-toggle="tooltip" data-placement="bottom"
                                            title="{{$product->district}}, {{$product->province}}">
                                            {{$product->district}},
                                            {{$product->province}}</p>
                                    </div>
                                    <div class="mota-place">
                                        <div class="mota-place-1">
                                            <div class="mota-place-tt"><img src="{{asset('assets/icon/dientich.png')}}"
                                                    alt=""><span data-toggle="tooltip" data-placement="bottom"
                                                    title="{{intval($product->depth)*intval($product->facades) }} m²">{{intval($product->depth)*intval($product->facades) }}
                                                    m²</span></div>
                                            <div class="mota-place-tt"><img
                                                    src="{{asset('assets/icon/icon-road@3x.png')}}" alt=""><span
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Tooltip on bottom">Mặt phố - mặt đường</span></div>
                                            <div class="mota-place-tt"><img
                                                    src="{{asset('assets/icon/rectangle-copy-2@3x.png')}}" alt=""><span
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="{{$product->facades}}">{{$product->facades}} m</span></div>
                                        </div>
                                        <!-- <div class="mota-place-1">
=======
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
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="index-sc4">
		<div class="max-width-container">
			<div class="text-title">
				<div class="text-left"><a class="text-desktop" href="/cho-thue-nha-dat">
						<h3>{{$categories[1]->name}}</h3></a></div>
				<div class="text-right"><a class="text-desktop" href="/cho-thue-nha-dat"><i class="ri-equalizer-line"></i>
						<p>Xem tất cả &nbsp;<span>({{count($product_by_cate2)}} Tin đăng)</span></p></a></div>
			</div>
		</div>
	</section>
	<section class="index-sc5 sanpham-list">
		<div class="max-width-container">
			<div class="swiper-container slideSpHome">
				<div class="swiper-wrapper">
					@if(count($product_by_cate2)>0)
					@foreach($product_by_cate2 as $product)
					<div class="swiper-slide">
						<div class="box-sp">
							<div class="box-sp-img"><a class="localstore" localstore="{{$product->product_id}}" href="{{route('article-detail',$product->slug)}}"><img src="{{asset('assets/product/sanpham1.webp')}}" alt=""></a>
								<div class="tag-thuongluong">{{$product->price}} {{$product->unit}}</div>
								<div class="box-icon"><a href="" class="fav" productid="{{$product->product_id}}"><i class="ri-heart-line icons"></i></a><a href="" class="comp" productid="{{$product->product_id}}"><i class="ri-equalizer-line icons"></i></a></div>
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
>>>>>>> 5c37e6449c6199eee9610ab0f5f59c86434c326d
										<div class="mota-place-tt"><img src="./assets/icon/rectangle-2@3x.png" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Sàn văn phòng, Mặt bằng thương mại, Phòng học </span></div>
										<div class="mota-place-tt"><img src="./assets/icon/rectangle-3@3x.png" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">---</span></div>
										<div class="mota-place-tt"><span class="material-icons icons-15">group</span><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">{{$product->depth*$product->facades}} m²</span></div>
									</div> -->
                                        <<<<<<< HEAD </div>
                                            <div class="end-mota">
                                                <div class="mota-end-box">
                                                    <div class="end-box-tt"><span
                                                            class="material-icons icons-15">event_note</span><span>22/09/2020</span>
                                                    </div>
                                                    <div class="end-box-tt"><span
                                                            class="material-icons icons-15">visibility</span><span>{{$product->view}}</span>
                                                    </div>
                                                    <div class="end-box-tt"><span
                                                            class="material-icons icons-15 chat">chat</span><span
                                                            class="chat">chat
                                                            ngay</span></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="index-sc4">
            <div class="max-width-container">
                <div class="text-title">
                    <div class="text-left"><a class="text-desktop" href="/sang-nhuong-nha-dat">
                            <h3>{{$categories[2]->name}}</h3>
                        </a></div>
                    <div class="text-right"><a class="text-desktop" href="/sang-nhuong-nha-dat"><i
                                class="ri-equalizer-line"></i>
                            <p>Xem tất cả &nbsp;<span>({{count($product_by_cate3)}} Tin đăng)</span></p>
                        </a></div>
                </div>
            </div>
        </section>
        <section class="index-sc5 sanpham-list">
            <div class="max-width-container">
                <div class="swiper-container slideSpHome">
                    <div class="swiper-wrapper">
                        @if(count($product_by_cate3)>0)
                        @foreach($product_by_cate3 as $product)
                        <div class="swiper-slide">
                            <div class="box-sp">
                                <div class="box-sp-img"><a href=""><img src="./assets/product/sanpham1.webp" alt=""></a>
                                    <div class="tag-thuongluong">Thương lượng</div>
                                    <div class="box-icon"><i class="ri-heart-line icons"></i><i
                                            class="ri-equalizer-line icons"></i></div>
                                    <div class="overlay"></div>
                                </div>
                                <div class="box-sp-text"> <a href="">
                                        <h5 class="title-text lcl lcl-2">{{$product->title}}</h5>
                                    </a>
                                    <div class="location"> <span class="material-icons">location_on</span>
                                        <p class="lcl lcl-1" data-toggle="tooltip" data-placement="bottom"
                                            title="{{$product->district}}, {{$product->province}}">
                                            {{$product->district}},
                                            {{$product->province}}</p>
                                    </div>
                                    <div class="mota-place">
                                        <div class="mota-place-1">
                                            <div class="mota-place-tt"><img src="./assets/icon/dientich.png"
                                                    alt=""><span data-toggle="tooltip" data-placement="bottom"
                                                    title="{{intval($product->depth)*intval($product->facades) }} m²">{{intval($product->depth)*intval($product->facades) }}
                                                    m²</span></div>
                                            <div class="mota-place-tt"><img src="./assets/icon/icon-road@3x.png"
                                                    alt=""><span data-toggle="tooltip" data-placement="bottom"
                                                    title="Tooltip on bottom">Mặt phố - mặt đường</span></div>
                                            <div class="mota-place-tt"><img src="./assets/icon/rectangle-copy-2@3x.png"
                                                    alt=""><span data-toggle="tooltip" data-placement="bottom"
                                                    title="{{$product->facades}}">{{$product->facades}} m</span></div>
                                        </div>
                                        <!-- <div class="mota-place-1">
=======
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
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="index-sc4">
		<div class="max-width-container">
			<div class="text-title">
				<div class="text-left"><a class="text-desktop" href="/sang-nhuong-nha-dat">
						<h3>{{$categories[2]->name}}</h3></a></div>
				<div class="text-right"><a class="text-desktop" href="/sang-nhuong-nha-dat"><i class="ri-equalizer-line"></i>
						<p>Xem tất cả &nbsp;<span>({{count($product_by_cate3)}} Tin đăng)</span></p></a></div>
			</div>
		</div>
	</section>
	<section class="index-sc5 sanpham-list">
		<div class="max-width-container">
			<div class="swiper-container slideSpHome">
				<div class="swiper-wrapper">
					@if(count($product_by_cate3)>0)
					@foreach($product_by_cate3 as $product)
					<div class="swiper-slide">
						<div class="box-sp">
							<div class="box-sp-img"><a class="localstore" localstore="{{$product->product_id}}" href="{{route('article-detail',$product->slug)}}"><img src="{{asset('assets/product/sanpham1.webp')}}" alt=""></a>
								<div class="tag-thuongluong">{{$product->price}} {{$product->unit}}</div>
								<div class="box-icon"><a href="" class="fav" productid="{{$product->product_id}}"><i class="ri-heart-line icons"></i></a><a href="" class="comp" productid="{{$product->product_id}}"><i class="ri-equalizer-line icons"></i></a></div>
								<div class="overlay"></div>
							</div>
							<div class="box-sp-text"> <a  class="localstore" localstore="{{$product->product_id}}" href="{{route('article-detail',$product->slug)}}">
									<h5 class="title-text lcl lcl-2">{{$product->title}}</h5></a>
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
>>>>>>> 5c37e6449c6199eee9610ab0f5f59c86434c326d
										<div class="mota-place-tt"><img src="./assets/icon/rectangle-2@3x.png" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Sàn văn phòng, Mặt bằng thương mại, Phòng học </span></div>
										<div class="mota-place-tt"><img src="./assets/icon/rectangle-3@3x.png" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">---</span></div>
										<div class="mota-place-tt"><span class="material-icons icons-15">group</span><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">{{$product->depth*$product->facades}} m²</span></div>
									</div> -->
                                        <<<<<<< HEAD </div>
                                            <div class="end-mota">
                                                <div class="mota-end-box">
                                                    <div class="end-box-tt"><span
                                                            class="material-icons icons-15">event_note</span><span>22/09/2020</span>
                                                    </div>
                                                    <div class="end-box-tt"><span
                                                            class="material-icons icons-15">visibility</span><span>{{$product->view}}</span>
                                                    </div>
                                                    <div class="end-box-tt"><span
                                                            class="material-icons icons-15 chat">chat</span><span
                                                            class="chat">chat
                                                            ngay</span></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="index-page" id="js-page-verify" hidden></div>
        =======
        </div>
        <div class="end-mota">
            <div class="mota-end-box">
                <div class="end-box-tt"><span
                        class="material-icons icons-15">event_note</span><span>{{date('d/m/Y',strtotime($product->datetime_start))}}</span>
                </div>
                <div class="end-box-tt"><span
                        class="material-icons icons-15">visibility</span><span>{{$product->view}}</span></div>
                <div class="end-box-tt"><span class="material-icons icons-15 chat">chat</span><span class="chat">chat
                        ngay</span></div>
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
        </div>
        </div>
        </div>
        </div>

        </section>
        <div class="index-page" id="js-page-verify" hidden></div>
        >>>>>>> 5c37e6449c6199eee9610ab0f5f59c86434c326d
</main>
@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
</script>
<script>
$(document).ready(function() {

    var listcomp = [];
    $('.comp').each(function() {
        $(this).click(function() {
            var productid = $(this).attr('productid');
            listcomp.push(productid);
            /*$.ajax({
            	url : '{{ route("add-compare") }}',

            	type: 'POST',
            	data: { 
            		productId : productid,
            		_token: "{{ csrf_token() }}"
            	},
            	success: function(data,status){
            		console.log(data)
            		console.log(status);
            		//Chưa đăng nhập
            		if(data == 0){
            			alert('Vui lòng đăng nhập để sử dụng tính năng này');
            		}
            		
            		if(data == 1){
            			//Thích sản phẩm, icon đỏ
            		}
            		
            		if(data == 2){
            			//Bỏ thích sản phẩm, icon bình thường lại
            		}
            	}
            })*/
            console.log(listcomp);
            $.cookie('compare', listcomp.join());
            return false;
        })
    })




})
</script>
@endsection