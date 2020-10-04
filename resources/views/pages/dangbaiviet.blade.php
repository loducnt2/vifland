@extends('layouts.master')
@section('title','Đăng bài viết')
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
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Tỉnh/Thành phố</label>
											<select class="select1" name="loainhadat[]" multiple="multiple">
												<option value="AL">Alabama</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Quận/Huyện</label>
											<select class="select1" name="loainhadat[]" multiple="multiple">
												<option value="AL">Alabama</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Phường/Xã</label>
											<select class="select1" name="loainhadat[]" multiple="multiple">
												<option value="AL">Alabama</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
										<div class="form-group-sl1 sl-1 select-many">
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
										</div>
									</div>
									<div class="tab-pane fade" id="thongtin" role="tabpanel" aria-labelledby="thongtin-tab">
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Loại hình</label>
											<select class="select1" name="loainhadat[]" multiple="multiple">
												<option value="AL">Alabama</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Mặt tiền</label>
											<input type="number" min="0">
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Chiều sâu</label>
											<input type="number" min="0">
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Diện tích</label>
											<input type="number" min="0">
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Đơn giá </label>
											<input type="number" min="0"><em class="notedongia">Mặc định 0 là thương lượng</em>
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Đường rộng</label>
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
											<input type="number" min="0">
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Số phòng ngủ </label>
											<input type="number" min="0">
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Giấy tờ pháp lý</label>
											<select class="select1" name="loainhadat[]" multiple="multiple">
												<option value="AL">Alabama</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Mức độ giao dịch </label>
											<select class="select1" name="loainhadat[]" multiple="multiple">
												<option value="AL">Alabama</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Đặc điểm nổi trội</label>
											<select class="select1" name="loainhadat[]" multiple="multiple">
												<option value="AL">Alabama</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
										<div class="form-group-sl1 sl-1 select-many">
											<label for="thanhpho">Hoa hồng môi giới</label>
											<select class="select1" name="loainhadat[]" multiple="multiple">
												<option value="AL">Alabama</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
										<div class="form-group-sl1 sl-1 select-many">
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
@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@endsection