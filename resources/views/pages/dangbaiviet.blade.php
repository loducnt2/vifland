<!DOCTYPE html>
<html lang="en">
	<head>
		<title>TRANG CHỦ</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="./css/core.min.css">
		<link rel="stylesheet" href="./css/main.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	</head>
	<body>
		<form action="">
			<div class="ov-h" id="wrapper">
				<header>
					<div class="max-width-container container-mb">
						<nav>
							<div class="nav-desktop">
								<div class="logo"><a href="index.html"><img src="./assets/logo/logo-s.png" alt=""></a></div>
								<div class="main-nav">
									<ul class="nav-list">
										<li class="nav-item"><i class="ri-heart-fill icon"></i>
											<p class="text">Yêu thích</p>
										</li>
										<li class="nav-item"><i class="ri-equalizer-line icon"></i>
											<p class="text">So sánh</p>
										</li>
										<li class="nav-item"><i class="ri-time-line icon"></i>
											<p class="text">Lịch sử</p>
										</li>
										<li class="nav-item"><i class="fas fa-bell icon"></i>
											<p class="text">Thông báo</p>
										</li>
										<li class="post-new"><i class="ri-chat-new-fill icon"></i>
											<p class="text">Đăng bài</p>
										</li>
										<li class="nav-item d-none user-logined"><img class="avatar-login" src="./assets/avatar/avatar-girl.png" alt=""></li>
										<li class="nav-item">
											<button class="btn btn__header">Đăng Nhập</button>
										</li>
										<li class="nav-item change-lang"><span class="button-change-lang"><img src="./assets/icon/icon-vn.png" alt=""><i class="ri-arrow-down-s-fill"></i>
												<div class="list-change-lang">
													<div class="list-change-lang-row"><img src="./assets/icon/icon-vn.png" alt="">
														<p>Tiếng việt</p>
													</div>
													<div class="list-change-lang-row"><img src="./assets/icon/icon-usa.png" alt="">
														<p>English</p>
													</div>
												</div></span></li>
									</ul>
								</div>
							</div>
							<div class="nav-mobile">
								<div class="nav-mobile-1">
									<div class="img"><img src="./assets/logo/logo-res-white.png" alt=""></div>
									<div class="button-mobile-post"> 
										<button class="button-mbp"><i class="ri-chat-new-fill icon"></i><span>Đăng bài</span></button>
										<div class="sosanh"><i class="ri-equalizer-line icon"></i></div>
										<div class="yeuthich"><i class="ri-heart-fill icon"></i></div>
									</div>
								</div>
								<div class="nav-mobile-2">
									<div class="toggle-menu"><i class="ri-grid-fill"></i></div>
									<div class="search-menu">
										<input type="text" placeholder="Bạn tìm gì hôm nay?">
									</div>
									<div class="user"><i class="ri-map-pin-user-fill"></i></div>
								</div>
							</div>
						</nav>
					</div>
				</header>
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
					<section class="dangbaiviet">
						<div class="max-width-container">
							<div class="row"> 
								<div class="col-3">
									<div class="box-left-form-muaban">
										<form action="">
											<div class="mdm-1">
												<div class="checked">
													<input id="luachonsearch1" type="radio" value="muaban" name="canmuaban">
													<label for="luachonsearch1">Cần mua</label>
												</div>
												<div class="checked">
													<input id="luachonsearch2" type="radio" value="muaban" name="canmuaban">
													<label for="luachonsearch2">Cần bán</label>
												</div>
											</div>
											<div class="mdm-2"> 
												<ul class="nav nav-tabs" id="myTab" role="tablist">
													<li class="nav-item" role="presentation"><a class="nav-link active" id="vitri-tab" data-toggle="tab" href="#vitri" role="tab" aria-controls="vitri" aria-selected="true">Vị trí</a></li>
													<li class="nav-item" role="presentation"><a class="nav-link" id="thongtin-tab" data-toggle="tab" href="#thongtin" role="tab" aria-controls="thongtin" aria-selected="false">Thông tin </a></li>
													<li class="nav-item" role="presentation"><a class="nav-link" id="khac-tab" data-toggle="tab" href="#khac" role="tab" aria-controls="khac" aria-selected="false">Khác</a></li>
												</ul>
												<div class="tab-content" id="myTabContent">
													<div class="tab-pane fade show active" id="vitri" role="tabpanel" aria-labelledby="vitri-tab">
														<div class="form-group"> 
															<label for="thanhpho">Tỉnh/Thành phố</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Quận/Huyện</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Phường/Xã</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Đường, Phố</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Dự án</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
													</div>
													<div class="tab-pane fade" id="thongtin" role="tabpanel" aria-labelledby="thongtin-tab">
														<div class="form-group"> 
															<label for="thanhpho">Loại hình</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Mặt tiền</label>
															<input type="number" min="0">
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Chiều sâu</label>
															<input type="number" min="0">
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Diện tích</label>
															<input type="number" min="0">
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Đơn giá </label>
															<input type="number" min="0"><em class="notedongia">Mặc định 0 là thương lượng</em>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Đường rộng</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Loại nhà đất</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
													</div>
													<div class="tab-pane fade" id="khac" role="tabpanel" aria-labelledby="khac-tab"> 
														<div class="form-group"> 
															<label for="thanhpho">Số tầng</label>
															<input type="number" min="0">
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Số phòng ngủ </label>
															<input type="number" min="0">
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Giấy tờ pháp lý</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Mức độ giao dịch </label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Đặc điểm nổi trội</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Hoa hồng môi giới</label>
															<select id="thanhpho" name="thanhpho">
																<option value="Ho Chi Minh">Hồ Chí Minh</option>
															</select>
														</div>
														<div class="form-group"> 
															<label for="thanhpho">Tiền hoa hồng</label>
															<input type="number" min="0">
														</div>
													</div>
													<div class="note-wrap"><em class="note">* Hãy cập nhật các thông số đầy đủ và chi tiết để khách hàng tìm thấy tin đăng của bạn dễ dàng</em>
														<p class="note"> <b>Cảnh báo: &nbsp;</b>Nếu thông tin không được chọn đầy đủ thì tin đăng sẽ không thể tìm kiếm.</p>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-9">
									<div class="row">
										<div class="col-12 form-group">
											<input class="input-100" type="text" placeholder="Tiêu đề bài viết">
										</div>
										<div class="col-12 form-group">
											<input class="input-100-s" type="text" placeholder="Add tags">
										</div>
									</div>
									<div class="row thongtinlh">
										<div class="col-12 wrap-title">
											<h4 class="tt-line"> <span>Thông Tin Liên Hệ</span></h4>
											<p>Hãy điền thông tin liên hệ đầy đủ để khách hàng có thể liên lạc khi có nhu cầu </p>
										</div>
										<div class="col-4 form-group"><span class="material-icons">person</span>
											<input type="text" placeholder="Tên liên lạc">
										</div>
										<div class="col-4 form-group"><span class="material-icons">business</span>
											<input type="text" placeholder="Tên Công ty">
										</div>
										<div class="col-4 form-group"><span class="material-icons">phone</span>
											<input type="text" placeholder="Điện thoại cá nhân">
										</div>
										<div class="col-4 form-group"><i class="ri-facebook-circle-fill"></i>
											<input type="text" placeholder="Facebook cá nhân">
										</div>
										<div class="col-4 form-group"><span class="material-icons">location_on</span>
											<input type="text" placeholder="Địa chỉ">
										</div>
										<div class="col-4 form-group"><span class="material-icons">public</span>
											<input type="text" placeholder="Trang web">
										</div>
										<div class="col-4 form-group"><span class="material-icons">email</span>
											<input type="text" placeholder="Hộp thư điện tử">
										</div>
									</div>
									<div class="row loaitindang">
										<div class="col-12"> 
											<div class="title"> 
												<h5>Loại tin đăng</h5><a href="">So sánh các gói tin </a>
											</div>
										</div>
										<div class="col-12"> 
											<div class="wrap-vip">
												<div class="checked">
													<input id="tinthuong" type="radio" value="1" name="vip">
													<label for="tinthuong">Tin Thường</label>
												</div>
												<div class="checked">
													<input id="vip1" type="radio" value="2" name="vip">
													<label class="vip1" for="vip1">Tin VIP 1</label>
												</div>
												<div class="checked">
													<input id="vip2" type="radio" value="2" name="vip">
													<label class="vip2" for="vip2">Tin VIP 2</label>
												</div>
												<div class="checked">
													<input id="vip3" type="radio" value="2" name="vip">
													<label class="vip3" for="vip3">Tin VIP 3</label>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="wrap-moTaVip">
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
														<div class="img"> <img src="./assets/tinvip/NORMAL.jpg" alt=""></div>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="row wrap-lich">
													<div class="col-4 form-group">
														<label for="songayvip">Số ngày</label>
														<input id="songayvip" type="number" min="0">
													</div>
													<div class="col-4 form-group">
														<label for="songayvip">Ngày đăng bài</label>
														<input class="calendar" id="ngaybdvip" type="text">
													</div>
													<div class="col-4 form-group"> 
														<label for="songayvip">Ngày kết thúc</label>
														<input class="calendar" id="ngayktvip" type="text">
													</div>
												</div>
											</div>
											<div class="col-12"> 
												<div class="row wrap-tongthanhtoan">
													<div class="tongThanhToan-box">
														<div class="ttt-1">
															<p>Thành tiền (Gồm VAT)</p>
															<p>0 ₫</p>
														</div>
														<div class="ttt-2">
															<p>Khuyến mại</p>
															<p>0 ₫</p>
														</div>
														<hr>
														<div class="ttt-3"><strong>Thanh toán</strong><strong>0 ₫</strong></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<div class="index-page" id="js-page-verify" hidden></div>
				</main>
				<footer>
					<div class="footer-block">
						<div class="max-width-container">
							<div class="row">
								<div class="col-lg-3 col-md-6 col-sm-12">
									<div class="footer-box">
										<div class="img"><img src="./assets/logo/logo-footer-300.png" alt=""></div>
										<ul class="list-items">
											<li class="list-item"><span class="material-icons">location_on</span>
												<p>152/1A Nguyễn Văn Thương, Phường 25, Quận Bình Thạnh, Tphcm</p>
											</li>
											<li class="list-item"><span class="material-icons">call</span>
												<p>Hotline: 0869 092 929</p>
											</li>
											<li class="list-item"><span class="material-icons">email</span>
												<p>tuvan@vifland.com</p>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-12">
									<div class="footer-box list">
										<h4 class="title-footer">Liên kết nhanh</h4>
										<ul class="list-items">
											<li class="list-item"> <a href="">Giới thiệu</a></li>
											<li class="list-item"> <a href="">Dự án </a></li>
											<li class="list-item"> <a href="">Thư viện </a></li>
											<li class="list-item"> <a href="">Tuyển dụng </a></li>
											<li class="list-item"> <a href="">Liên hệ</a></li>
											<li class="list-item"> <a href="">Nơi khởi nguồn hạnh phúc</a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-12">
									<div class="footer-box list">
										<h4 class="title-footer">Tin bất động sản</h4>
										<ul class="list-items">
											<li class="list-item"> <a href="">Tin doanh nghiệp </a></li>
											<li class="list-item"> <a href="">Tin dự án </a></li>
											<li class="list-item"> <a href="">Tin thị trường</a></li>
											<li class="list-item"> <a href="">Tin sự kiện</a></li>
											<li class="list-item"> <a href="">Tin cộng đồng</a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-12">
									<div class="footer-box list">
										<h4 class="title-footer">Đăng ký nhận bản tin</h4>
										<p class="small-text">Vui lòng để lại địa chỉ email để nhận thông tin mới nhất về Bất Động Sản</p>
										<input class="input-footer" type="text" placeholder="Nhập địa chỉ email...">
									</div>
								</div>
							</div>
						</div>
					</div>
				</footer>
			</div>
			<div id="searchfancybox" style="display: none;">
				<div class="container">
					<div class="content">
						<div class="form-group">
							<input class="form-control" type="text" placeholder="Tìm sản phẩm...">
							<button class="searchbutton btn btn__search"><em class="material-icons">search</em></button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<script type="text/javascript" src="./js/core.min.js"></script>
		<script type="text/javascript" src="./js/main.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	</body>
</html>