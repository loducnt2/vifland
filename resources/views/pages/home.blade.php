
@extends('layouts.master')
@section('title','VIF Land - Sàn rao bán bất động sản')
@section('headerStyles')

@stop

@if(Auth::check() && Auth::user()->user_type == "1")
<!-- Nav tabs -->

@endif
@section('content')


<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
</div>

<script>
    $('#navId a').click(e => {
        e.preventDefault();
        $(this).tab('show');
    });
</script>
{{-- @endif --}}
<!-- @include('layouts.logo_animation') -->

<main>
    {{--  --}}

    <section class="index-s1" id="home">
        <div class="max-width-container">
            <div class="row pd-banner">
                <div class="col-xs-4 col-md-4 col-lg-3">
                    <div class="box-left-banner">
                        <h2 class="title-banner">Hệ sinh thái<br>Bất động sản</h2>

                        <p class="text-banner">Cuộc cách mạng vĩ đại trong kỷ nguyên 4.0 với sự kết hợp hoàn hảo giữa:
                            con người + trí thông minh nhân tạo + bất động sản + đầu tư tài chính</p>
                    </div>
                </div>
				<?php
				$banners = DB::table('image')
				->where('status',1)
				->orderby('position', 'asc')
				->get();
				?>
                <div class="col-xs-8 col-md-8 col-lg-9">
                    <div class="slide-banner">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
								@foreach($banners as $banner)
                                <div class="swiper-slide">
                                    <div class="img-banner"><img src="{{asset('assets/banner')}}/{{$banner->name}}" alt=""></div>
								</div>
								@endforeach
                                <!-- <div class="swiper-slide">
                                    <div class="img-banner"><img src="{{asset('assets/bg/banner2.png')}}" alt=""></div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="img-banner"><img src="{{asset('assets/bg/banner3.png')}}" alt=""></div>
                                </div> -->
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
					<div class="box-m"><a href="{{route('cate',$categories['0']->slug)}}"><img src="{{asset('assets/icon/house@3x.png')}}" alt="">
							<p>{{$categories['0']->name}} </p></a></div>
					<div class="box-m"><a href="{{route('cate',$categories['1']->slug)}}"><img src="{{asset('assets/icon/rent@3x.png')}}" alt="">
							<p>{{$categories['1']->name}}</p></a></div>
					<div class="box-m"><a href="{{route('cate',$categories['2']->slug)}}"><img src="{{asset('assets/icon/transfer-image-category.png')}}" alt="">
							<p>{{$categories['2']->name}}</p></a></div>
				</div>
			</div>

			<div class="box-search-index">
				<form action="{{route('search',$categories['0']->slug)}}" method="post" id="formsearch">
					@csrf
				<div class="row">
					<div class="col-3">
						<div class="box-left">
							<div class="warp-form">
								<div class="checked">
									<input id="idgiaohang1" slug="{{$categories['0']->slug}}" type="radio" value="{{$categories['0']->id}}" name="cate" checked="">
									<label for="idgiaohang1">{{$categories['0']->name}}</label>
								</div>
								<div class="checked">
									<input id="idgiaohang2" slug="{{$categories['1']->slug}}" type="radio" value="{{$categories['1']->id}}" name="cate">
									<label for="idgiaohang2">{{$categories['1']->name}}</label>
								</div>
								<div class="checked">
									<input id="idgiaohang3" slug="{{$categories['2']->slug}}" type="radio" value="{{$categories['2']->id}}" name="cate">
									<label for="idgiaohang3">{{$categories['2']->name}}</label>
									<!-- <input id="idgiaohang3" type="radio" value="{{$categories['2']->id}}" name="cate">
									<label for="idgiaohang3">{{$categories['2']->name}}</label> -->
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
										<select class="select1 sltp" name="province">
											<option value="">Tỉnh/ Thành phố</option>
											@foreach($province as $prov)
												<option value="{{$prov->id}}">{{$prov->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-3">
									<div class="form-group-sl1 sl-2 select-many">
										<select class="select1 slnhadat" name="product_cate[]" multiple="multiple">
											@foreach($product_cate as $prodcate)
											<option value="{{$prodcate->id}}">{{$prodcate->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-3">
									<div class="form-group-sl1 sl-3 select-many">
										<select class="select1 slgia" name="price[]" multiple="multiple">
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
				</form>
			</div>
		</div>
	</section>

	<section class="index-sc3">
		<div class="max-width-container border-botfm">
			<div class="category-container">
				<div class="row">
					<div class="col-4">
						<div class="box-cate">
							<a href="{{route('cate',$categories['0']->slug)}}">
								<div class="img"><img src="{{asset('assets/index/mua-ban-nha-dat.png')}}" alt=""></div>
								<div class="title-box">{{$categories[0]->name}}</div>
							</a>
							<div class="end-box">
								<a href="{{route('cate',$categories['0']->slug)}}">
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
							<a href="{{route('cate',$categories['1']->slug)}}">
								<div class="img"><img src="{{asset('assets/index/cho-thue-nha-dat.png')}}" alt=""></div>
								<div class="title-box">{{$categories[1]->name}}</div>
							</a>
							<div class="end-box">
								<a href="{{route('cate',$categories['1']->slug)}}">
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
							<a href="{{route('cate',$categories['2']->slug)}}">
								<div class="img"><img src="{{asset('assets/index/sang-nhuong-nha-dat.png')}}" alt=""></div>
								<div class="title-box">{{$categories[2]->name}}</div>
							</a>
							<div class="end-box">
								<a href="{{route('cate',$categories['2']->slug)}}">
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
				<div class="text-left"><a class="text-desktop" href="{{route('cate',$categories['0']->slug)}}">
						<h3>{{$categories[0]->name}}</h3></a></div>
				<div class="text-right"><a class="text-desktop" href="{{route('cate',$categories['0']->slug)}}"><i class="ri-equalizer-line"></i>
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
					<script>
		
					</script>
					<div class="swiper-slide">
						<div class="box-sp">
							<div class="box-sp-img"><a class="localstore" localstore="{{$product->product_id}}" href="{{route('article-detail',$product->slug)}}"><img src="{{asset('assets/product/detail/')}}/{{$product->thumbnail}}" alt=""></a>
								<div class="tag-thuongluong">{{ $product->price == 0?$product->price="":$product->price}} {{$product->unit}}</div>
								<div class="box-icon"><i class="fav ri-heart-line icons" productid="{{$product->product_id}}"></i><a href="{{$product->product_id}}" class="comp" ><i class="ri-equalizer-line icons"></i></a></div>
								<div class="overlay"></div>
								<div class="vip">
								<!-- {{$product->type}} -->
									
									@if ($product->type == 4)
									@else
										<img src="{{asset('assets/icon/vip'.$product->type.'.svg')}}" alt="">
									@endif
								</div>
							</div>
							<div class="box-sp-text">
								<a class="localstore" localstore="{{$product->product_id}}" href="{{route('article-detail',$product->slug)}}">
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
									<p class="lcl lcl-1" data-toggle="tooltip" data-placement="bottom" title="{{$product->district}}, {{$product->province}}">{{$product->district}}, {{$product->province}}</p>
								</div>
								<div class="mota-place">
									<div class="mota-place-1">
										<div class="mota-place-tt"><img src="{{asset('assets/icon/dientich.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{intval($product->depth)*intval($product->facades) }} m²">{{intval($product->depth)*intval($product->facades) }} m²</span></div>
										<div class="mota-place-tt"><img src="{{asset('assets/icon/icon-road@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Mặt phố - mặt đường</span></div>
										<div class="mota-place-tt"><img src="{{asset('assets/icon/rectangle-copy-2@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{$product->facades}}">{{$product->facades}} m</span></div>
									</div>
									<div class="mota-place-1">
									    <div class="mota-place-tt"><img src="{{asset('assets/icon/rectangle-2@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{$product->floors}} Tầng">{{$product->floors>0?$product->floors.' '.'Tầng':""}}</span></div>
									    <div class="mota-place-tt"><img src="{{asset('assets/icon/rectangle-3@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{$product->bedroom}} Phòng ngủ">{{$product->bedroom > 0 ? $product->bedroom.' '.'Phòng ngủ':""}} </span></div>
									    <div class="mota-place-tt"><span class="material-icons icons-15">group</span><span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom"></span></div>
									</div>
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
                            <div class="box-sp-img"><a class="localstore" localstore="{{$product->product_id}}"
                                    href="{{route('article-detail',$product->slug)}}"><img
                                        src="{{asset('assets/product/detail/')}}/{{$product->thumbnail}}" alt=""></a>
                                <div class="tag-thuongluong">{{ $product->price == 0?$product->price="":$product->price}} {{$product->unit}}</div>
                                <div class="box-icon"><i class="fav ri-heart-line icons" productid="{{$product->product_id}}"></i><a href="{{$product->product_id}}" class="comp"
                                        productid="{{$product->product_id}}"><i class="ri-equalizer-line icons"></i></a>
                                </div>
                                <div class="overlay"></div>
                                <div class="vip">
                                <!-- {{$product->type}} -->
                                	
                                	@if ($product->type == 4)
                                	@else
                                		<img src="{{asset('assets/icon/vip'.$product->type.'.svg')}}" alt="">
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
                                        <div class="mota-place-tt"><img src="{{asset('assets/icon/rectangle-2@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{$product->floors}} Tầng">{{$product->floors>0?$product->floors.' '.'Tầng':""}}</span></div>
                                        <div class="mota-place-tt"><img src="{{asset('assets/icon/rectangle-3@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{$product->bedroom}} Phòng ngủ">{{$product->bedroom > 0 ? $product->bedroom.' '.'Phòng ngủ':""}}</span></div>
                                        <div class="mota-place-tt"><span class="material-icons icons-15">group</span><span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom"></span></div>
                                    </div>
                                </div>
                                <div class="end-mota">
                                    <div class="mota-end-box">
                                        <div class="end-box-tt"><span
                                                class="material-icons icons-15">event_note</span><span>22/09/2020</span>
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
                            <div class="box-sp-img"><a href="{{route('article-detail',$product->slug)}}"><img src="{{asset('assets/product/detail/')}}/{{$product->thumbnail}}" alt=""></a>
                                <div class="tag-thuongluong">{{ $product->price == 0?$product->price="":$product->price}} {{$product->unit}}</div>
                                <div class="box-icon"><i class="fav ri-heart-line icons" productid="{{$product->product_id}}"></i><a href="{{$product->product_id}}" class="comp" ><i class="ri-equalizer-line icons"></i></a></div>
                                <div class="overlay"></div>
                                <div class="vip">
                                <!-- {{$product->type}} -->
                                	
                                	@if ($product->type == 4)
                                	@else
                                		<img src="{{asset('assets/icon/vip'.$product->type.'.svg')}}" alt="">
                                	@endif
                                </div>
                            </div>
                            <div class="box-sp-text"> <a href="{{route('article-detail',$product->slug)}}">
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
                                        title="{{$product->district}}, {{$product->province}}">
                                        {{$product->district}},
                                        {{$product->province}}</p>
                                </div>
                                <div class="mota-place">
                                    <div class="mota-place-1">
                                        <div class="mota-place-tt"><img src="{{asset('assets/icon/dientich.png')}}" alt=""><span
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="{{intval($product->depth)*intval($product->facades) }} m²">{{intval($product->depth)*intval($product->facades) }}
                                                m²</span></div>
                                        <div class="mota-place-tt"><img src="{{asset('assets/icon/icon-road@3x.png')}}"
                                                alt=""><span data-toggle="tooltip" data-placement="bottom"
                                                title="Tooltip on bottom">Mặt phố - mặt đường</span></div>
                                        <div class="mota-place-tt"><img src="{{asset('assets/icon/rectangle-copy-2@3x.png')}}"
                                                alt=""><span data-toggle="tooltip" data-placement="bottom"
                                                title="{{$product->facades}}">{{$product->facades}} m</span></div>
                                    </div>
                                    <div class="mota-place-1">
                                        <div class="mota-place-tt"><img src="{{asset('assets/icon/rectangle-2@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{$product->floors}} Tầng">{{$product->floors>0?$product->floors.' '.'Tầng':""}}</span></div>
                                        <div class="mota-place-tt"><img src="{{asset('assets/icon/rectangle-3@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{$product->bedroom}} Phòng ngủ">{{$product->bedroom > 0 ? $product->bedroom.' '.'Phòng ngủ':""}}</span></div>
                                        <div class="mota-place-tt"><span class="material-icons icons-15">group</span><span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom"></span></div>
                                    </div>
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
    <div class="index-page" id="js-page-verify" hidden></div>
</main>
@stop
@section('footerScripts')
<script type="text/javascript">
	$(document).ready(function(){
		
		$('input[name="cate"]').click(function() {
		  if ($(this).is(':checked')) {
		    let cate = $(this).attr('slug')
		    let route = '/search/'+cate
		    let action = $('#formsearch').attr('action',route)
		    console.log($('#formsearch').attr('action'))

		  }
		});
	})
</script>
@endsection
