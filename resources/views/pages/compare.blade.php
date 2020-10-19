@extends('layouts.master')
@section('title','So sánh bất động sản')
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->

 @stop
@section('content')
<main>
	<div class="global-breadcrumb">
		<div class="max-width-container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#"> <i class="ri-arrow-left-line icons-breadcrum"></i>Mua/ Bán <span class="sll-breadcrum">&nbsp; (1.475.822 tin đăng)</span></a></li>
				<li class="breadcrumb-item"><a href="#"> 
						<p>Mở bán dự án đô thị sinh thái thông minh Aqua City, phía Đông thành phố Hồ Chí Minh Bạn tìm gì hôm nay?</p></a></li>
			</ol>
		</div>
	</div>
	<section class="pages-compare"> 
		<div class="max-width-container">
			@if($products==NULL)
			<div class="article-none" id="article-none" > <img src="{{asset('assets/san_pham/no-documents.png')}}" alt="">
				<p>Quý khách chưa chọn sản phẩm so sánh.</p>
				
			</div>
			@else
			<div class="row"> 
				<div class="col-xl-3 col-md-3 d-none d-md-block">
					<section class="compare-c-1">
						<div class="wrapper">
							<div class="title-compare text-uppercase">
								<h3>Thông tin so sánh </h3>
							</div>
							<div class="line-break"></div>
							<div class="content">
								<p>Loại hình</p>
								<p>Mặt tiền</p>
								<p>Chiều sâu</p>
								<p>Diện Tích</p>
								<p>Đơn Giá</p>
								<p>Tổng Giá</p>
								<p>Hướng</p>
							</div>
						</div>
					</section>
				</div>
				<div class="col-xl-9 col-md-9 col-12">
					<section class="compare-c-2">
						<div class="compare-wrapper">
							<div class="title-compare">
								<h2>Mua / Bán </h2>
							</div>
							<div class="sanpham-container">
								<div class="sanpham-wrapper">
								@foreach($products as $prod)
									@foreach($prod as $product)
										<div class="box-sp">
											<div class="box-sp-img"><a href=""><img src="./assets/product/sanpham1.webp" alt=""></a>
												<!-- <div class="tag-thuongluong">Thương lượng</div> -->
												<div class="box-icon"><a href=""><i class="ri-heart-line icons"></i></a><a href=""><i class="ri-equalizer-line icons"></i></a></div>
												<div class="overlay"></div>
											</div>
											<div class="box-sp-text"> <a href="{{route('article-detail',$product->slug)}}">
													<h5 class="title-text lcl lcl-2">{{$product->title}}</h5></a>
												<div class="location"> <span class="material-icons">location_on</span>
													<p data-toggle="tooltip" data-placement="bottom" title="{{$product->district}}, {{$product->province}}">{{$product->district}}, {{$product->province}}</p>
												</div>
												<div class="end-mota"> 
													<div class="mota-end-box">
														<div class="end-box-tt"><span class="material-icons icons-15">event_note</span><span data-toggle="tooltip" data-placement="bottom" title="Ngày đăng bài: {{date('d/m/Y',strtotime($product->datetime_start))}}">{{date('d/m/Y',strtotime($product->datetime_start))}}</span></div>
														<div class="end-box-tt"><span class="material-icons icons-15">visibility</span><span data-toggle="tooltip" data-placement="bottom" title="Lượt xem: {{$product->view}}">{{$product->view}}</span></div>
														<div class="end-box-tt"><span class="material-icons icons-15 chat">chat</span><span class="chat">chat ngay</span></div>
													</div>
												</div>
												<div class="info"> 
													<div class="cover"> 
														<p data-toggle="tooltip" data-placement="bottom" title="Loại hình: Đất dự án">Đất dự án </p>
														<div class="dashed-line"></div>
													</div>
													<div class="cover"> 
														<p data-toggle="tooltip" data-placement="bottom" title="Mặt tiền: {{$product->facades}} m">{{$product->facades}} m</p>
														<div class="dashed-line"></div>
													</div>
													<div class="cover"> 
														<p data-toggle="tooltip" data-placement="bottom" title="Chiều sâu: {{$product->depth}} m">{{$product->depth}} m</p>
														<div class="dashed-line"></div>
													</div>
													<div class="cover"> 
														<p data-toggle="tooltip" data-placement="bottom" title="Diện Tích: {{doubleval( $product->depth*$product->facades )}} m²"> {{doubleval( $product->depth*$product->facades )}} m²</p>
														<div class="dashed-line"></div>
													</div>
													<div class="cover"> 
														<p data-toggle="tooltip" data-placement="bottom" title="Đơn Giá: {{$product->price}} {{$product->unit}}"> {{$product->price}} {{$product->unit}}</p>
														<div class="dashed-line"></div>
													</div>
													<!-- <div class="cover"> 
														<p data-toggle="tooltip" data-placement="bottom" title="Tổng Giá: 11,1 Tỷ"> 11,1 Tỷ</p>
														<div class="dashed-line"></div>
													</div>
													<div class="cover"> 
														<p data-toggle="tooltip" data-placement="bottom" title="Hướng: ---"> - - -</p>
														<div class="dashed-line"></div>
													</div> -->
												</div>
											</div>
										</div>
									@endforeach
								@endforeach
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			@endif
		</div>
	</section>
	

    <section class="end"> </section>
    <div id="js-page-verify" hidden></div>
</main>
@endsection
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@endsection
