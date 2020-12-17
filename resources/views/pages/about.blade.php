@extends('layouts.master')
@section('title','Giới thiệu')
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
                    <a href="{{route('home')}}">
                        <!--  <i class="ri-arrow-left-line icons-breadcrum"></i> -->Trang chủ
                        <!-- <span class="sll-breadcrum">&nbsp; (1.475.822 tin đăng)</span> -->
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('cate1')}}">
                        <p>Giới thiệu</p>
                    </a></li>
            </ol>
        </div>
    </div>
    <section class="pages-introduce-sec-1 section">
        <div class="container">
            <h1 class="block-title text-center text-uppercase">Về VIFLAND</h1>
            <div class="head-content">
                <p>VifLand là một công ty bên thứ 3 chuyên hỗ trợ những nhà đầu tư, doanh nhân và những người có nhu cầu
                    tìm mua những miếng đất liên quan đến bất động sản như nhà, đất đai, chung cư…Qua những bài đăng tin
                    bất động sản trên website cung cấp cho người dùng có thừ vừa mua và bán. Mang đến cho khách hàng một
                    hệ thống cập nhật nhanh các tin tức bất động sản uy tín nhất</p>
            </div>
            <div class="intro-banner"> <img class="lazyload" data-src="./assets/banner/banner-intro.png" alt=""></div>
            <!-- <div class="box-info" >
					<div class="row"> 
						<div class="col-xl-4 col-sm-6 intro-pic">
							<div class="img"> <img src="./assets/banner/sumenh.png" alt=""></div>
						</div>
						<div class="col-xl-4 col-sm-6">
							<div class="intro-content">
								<div class="icon"> <i class="fas fa-users"></i></div>
								<div class="wrapper"> 
									<div class="title"> 
										<p>Với khách hàng</p>
									</div>
									<div class="content"> 
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis tenetur molestias voluptate labore consequatur, sint omnis!</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6">
							<div class="intro-content">
								<div class="icon"> <i class="fas fa-hands"></i></div>
								<div class="wrapper"> 
									<div class="title"> 
										<p>Với cổ đông</p>
									</div>
									<div class="content"> 
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis tenetur molestias voluptate labore consequatur, sint omnis!</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6">
							<div class="intro-content">
								<div class="icon"> <i class="far fa-handshake"></i></div>
								<div class="wrapper"> 
									<div class="title"> 
										<p>Với đối tác</p>
									</div>
									<div class="content"> 
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis tenetur molestias voluptate labore consequatur, sint omnis!</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6">
							<div class="intro-content">
								<div class="icon"> <i class="fas fa-people-arrows"></i></div>
								<div class="wrapper"> 
									<div class="title"> 
										<p>Với nhân viên</p>
									</div>
									<div class="content"> 
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis tenetur molestias voluptate labore consequatur, sint omnis!</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-6">
							<div class="intro-content">
								<div class="icon"> <i class="fas fa-share-alt"></i></div>
								<div class="wrapper"> 
									<div class="title"> 
										<p>Với xã hội</p>
									</div>
									<div class="content"> 
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis tenetur molestias voluptate labore consequatur, sint omnis!</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
        </div>
    </section>
    <section class="pages-introduce-sec-2 section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 box-content">
                    <div class="content-item">
                        <div class="icon"> <i class="fas fa-gem"></i></div>
                        <div class="title">
                            <p>giá trị cốt lỗi</p>
                        </div>
                        <div class="content">
                            <p>Kết nối giá trị (Connection of Values)</p>
                            <p>Hợp tác phụng sự (Collaboration of Services)</p>
                        </div>
                    </div>
                    <div class="content-item">
                        <div class="icon"> <i class="fas fa-signal"></i></div>
                        <div class="title">
                            <p>Mục tiêu - chiến lượt</p>
                        </div>
                        <div class="content">
                            <p>Đặt ra hai nhiệm vụ liên quan đến mục tiêu tài chính để có thể trụ vững trên thị trường.
                                Một là, tập trung ưu tiên quản lý dòng tiền có sẵn phục vụ kinh doanh, đảm bảo duy trì
                                hoạt động ổn định, không mở rộng nhiệm vụ tăng nguồn vốn vì khả năng huy động vốn giai
                                đoạn này là bất khả thi. Hai là, điều chỉnh cơ cấu chi phí sau khi có sự phân tích nguồn
                                vốn, giúp doanh nghiệp có thêm dòng tiền để duy trì hoạt động kinh doanh. Công ty đã
                                thực hiện việc phân công nhân sự làm luân phiên để cắt giảm chi phí, thương lượng với
                                chủ cho thuê mặt bằng để giảm giá, đồng thời tìm kiếm vị trí có giá rẻ hơn, cho thuê lại
                                một phần tòa nhà Công ty và chuyển những cửa hàng thành kho lưu động hàng hóa</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 box-img">
                    <div class="img"> <img class="lazyload" data-src="./assets/banner/banner-intro-2.png" alt=""></div>
                </div>
            </div>
        </div>
    </section>
    <div id="js-page-verify" hidden></div>

    <div id="js-page-verify" hidden></div>
</main>
@endsection
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@stop