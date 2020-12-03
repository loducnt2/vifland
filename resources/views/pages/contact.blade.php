@extends('layouts.master')
@section('title','Liên hệ')
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->
 @stop
@section('content')
<main>
	<section class="banner-top"> 
		<div class="img"> </div>
	</section>
	<div class="global-breadcrumb">
		<div class="max-width-container">
		    <ol class="breadcrumb">
		        <li class="breadcrumb-item">
		            <a href="{{route('home')}}"><!--  <i class="ri-arrow-left-line icons-breadcrum"></i> -->Trang chủ
		                <!-- <span class="sll-breadcrum">&nbsp; (1.475.822 tin đăng)</span> -->
		            </a>
		        </li>
		         <li class="breadcrumb-item"><a href="{{route('cate1')}}">
		                    <p>Liên hệ</p>
		            </a></li> 
		    </ol>
		</div>
	</div>
	<section class="pages-lienhe"> 
		<section class="lienhe-l-1"> 
			<div class="container"> 
				<h1 class="section-title text-center">Liên hệ</h1>
				<div class="row"> 
					<div class="col-xl-5">
						<div class="warpper-content">
							<div class="logo"> <img src="./assets/logo/logo-footer-300.png" alt=""></div>
							<h2 class="section-under-title">CÔNG TY CỔ PHẨN BẤT ĐỘNG SẢN VIVA HOMES</h2>
							<div class="info"> 
								<div class="wrapper"><span class="material-icons">room</span>
									<p> Cơ sở 3 trường FPT Polytechnic Công viên phẩn mềm Quang Trung, Quận 12, Thành Phố Hồ Chí Minh</p>
								</div>
								<div class="wrapper"> <span class="material-icons">call</span>
									<p> (+84) 0989.999.999</p>
								</div>
								<div class="wrapper"><span class="material-icons">print</span>
									<p> info@fpoly.com.vn</p>
								</div>
								<div class="wrapper"><span class="material-icons">mail</span>
									<p> vifland@fpoly.com.vn</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-7">
						<div class="wrapper-form">
							<p>Quý khách vui lòng điền thông tin vào mẫu bên dưới và gửi những góp ý, thắc mắc cho chúng tôi</p>
							<div class="form-wrap">
								<div class="row"> 
									<div class="col-xl-6 col-sm-6 col-12 form-group">
										<input type="text" placeholder="Họ và Tên" id="name">
									</div>
									<div class="col-xl-6 col-sm-6 col-12 form-group">
										<input type="mail" placeholder="Email" id="email">
									</div>
									<div class="col-xl-6 col-sm-6 col-12 form-group">
										<input type="text" placeholder="Số điện thoại" id="sdt">
									</div>
									<div class="col-xl-6 col-sm-6 col-12 form-group">
										<input type="text" placeholder="Địa chỉ" id="address">
									</div>
									<div class="col-xl-12 form-group">
										<input type="text" placeholder="Tiêu đề" id="title">
									</div>
									<div class="col-xl-12 form-group">
										<textarea name="content" rows="5" placeholder="Nội dung..."></textarea>
									</div>
								</div>
								<div class="button">
									<button class="btn btn-return" type="submit">Quay lại</button>
									<button class="btn btn-submit" type="submit">Gửi</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="lienhe-l-2"> 
			<div class="container">
				<div class="map"> 
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1333.0493696577748!2d106.62953699383226!3d10.852832765862265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529e76ef4ac4d%3A0x30d6a9932e802efe!2sFPT%20Polytechnic%20HCM%20-%20C%C6%A1%20s%E1%BB%9F%203!5e0!3m2!1svi!2s!4v1601302166398!5m2!1svi!2s" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</section>
	</section>
	<div id="js-page-verify" hidden></div>
</main>
@endsection
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@stop