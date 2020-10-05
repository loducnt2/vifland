<header>
	<div class="max-width-container container-mb">
		<nav>
			<div class="nav-desktop">
				<div class="logo"><a href="{{route('home')}}"><img src="{{asset('assets/logo/logo-s.png')}}" alt=""></a></div>
				<div class="main-nav">
					<ul class="nav-list">
						<a href="/favorites">
							<li class="nav-item"><i class="ri-heart-fill icon"></i>
								<p class="text">Yêu thích</p>
							</li>
						</a>
						<a href="/compares">
							<li class="nav-item"><i class="ri-equalizer-line icon"></i>
								<p class="text">So sánh</p>
							</li>
						</a>
						<li class="nav-item"><i class="ri-time-line icon"></i>
							<p class="text">Lịch sử</p>
						</li>
						<li class="nav-item"><i class="fas fa-bell icon"></i>
							<p class="text">Thông báo</p>
						</li>
						<li class="post-new"><i class="ri-chat-new-fill icon"></i>
							<p class="text">Đăng bài</p>
						</li>
						<li class="nav-item d-none user-logined"><img class="avatar-login" src="{{asset('assets/avatar/avatar-girl.png')}}" alt=""></li>
						<li class="nav-item">
							@if(auth()->check())
							<span>{{auth()->user()->username}}</span>
							@else
							<a href="/login" class="btn btn__header" style="line-height:36px">Đăng Nhập</a>
							@endif
						</li>
						<li class="nav-item change-lang"><span class="button-change-lang"><img src="{{asset('assets/icon/icon-vn.png')}}" alt=""><i class="ri-arrow-down-s-fill"></i>
								<div class="list-change-lang">
									<div class="list-change-lang-row"><img src="{{asset('assets/icon/icon-vn.png')}}" alt="">
										<p>Tiếng việt</p>
									</div>
									<div class="list-change-lang-row"><img src="{{asset('assets/icon/icon-usa.png')}}" alt="">
										<p>English</p>
									</div>
								</div></span>
						</li>
					</ul>
				</div>
			</div>
			<div class="nav-mobile">
				<div class="nav-mobile-1">
					<div class="img"><a href="{{route('home')}}"><img src="{{asset('assets/logo/logo-res-white.png')}}" alt=""></a></div>
					<div class="button-mobile-post"> 
						<button class="button-mbp"><i class="ri-chat-new-fill icon"></i><span>Đăng bài</span></button>
						<div class="sosanh"><a href="/compares"><i class="ri-equalizer-line icon"></i></a></div>
						<div class="yeuthich"><a href="/favorites"><i class="ri-heart-fill icon"></i></a></div>
					</div>
				</div>
				<div class="nav-mobile-2">
					<div class="toggle-menu"><i class="ri-grid-fill"></i></div>
					<div class="search-menu">
						<input type="text" placeholder="Bạn tìm gì hôm nay?">
					</div>
					<div class="user user-menu"><i class="ri-map-pin-user-fill"></i></div>
				</div>
			</div>
			<div class="menu-mobile">
				<div class="wrap-1">
					<div class="logo"> <a href=""><img src="{{asset('assets/logo/logo-s.png')}}" alt=""></a></div><i class="ri-close-line close-button"></i>
				</div>
				<div class="wrap-2">
					<div class="change-lang">
						<div class="left"><img src="{{asset('assets/icon/vn.svg')}}" alt="">
							<p>Tiếng việt</p>
						</div>
						<div class="right"><i class="ri-arrow-down-s-fill"></i></div>
					</div>
					<ul class="list-items"> 
						<li class="list-item">
							<a href="/favorites">
								<i class="ri-heart-fill icon"></i>
								<p class="text">Yêu thích</p>
							</a>
						</li>
						<li class="list-item">
							<a href="/compares">
								<i class="ri-time-line icon"></i>
								<p class="text">Lịch sử</p>
							</a>
						</li>
						<li class="list-item"> <a href=""><i class="fas fa-bell icon"></i>
								<p class="text">Thông báo</p></a></li>
					</ul>
				</div>
				<div class="wrap-3">
					<div class="title">
						 Công ty <i class="ri-arrow-down-s-fill"></i></div>
					<ul> 
						<li><a href="">Tuyển dụng</a></li>
						<li><a href="">Quy chế hoạt động</a></li>
						<li><a href="">Về Vifland</a></li>
						<li><a href="">Điều khoản thỏa thuận</a></li>
						<li><a href="">Tin tức cổ đông</a></li>
					</ul>
					<div class="title">
						 Hỗ trợ<i class="ri-arrow-down-s-fill"></i></div>
					<ul> 
						<li><a href="">Tuyển dụng</a></li>
						<li><a href="">Quy chế hoạt động</a></li>
						<li><a href="">Về Vifland</a></li>
						<li><a href="">Điều khoản thỏa thuận</a></li>
						<li><a href="">Tin tức cổ đông</a></li>
					</ul>
				</div>
				<div class="wrap-4"> 
					<div class="title">Công ty Cổ phần Tập đoàn Meey Land</div>
					<ul> 
						<li><span class="material-icons">location_on</span>
							<p>Tầng 5 Tòa nhà 97 - 99 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, Thành phố Hà Nội</p>
						</li>
						<li><span class="material-icons">call</span>
							<p>0869 092 929</p>
						</li>
						<li><span class="material-icons">email</span>
							<p>contact@meeyland.com</p>
						</li>
					</ul>
				</div>
				<div class="wrap-5">
					<p>© 2011-2020 Công ty Cổ Phần Tập Đoàn Vif Land</p>
				</div>
			</div>
			<div class="user-mobile">
				<div class="wrap-1"> 
					<div class="title">Tài khoản</div><i class="ri-close-line close-button-2"></i>
				</div>
				<div class="wrap-2 user-admin">
					<div class="bl-1"><img src="{{asset('assets/avatar/avatar-girl.png')}}" alt="">
						<p>Xibachao</p>
					</div>
					<div class="bl-2">
						<div class="row"> 
							<div class="col-6"><span class="vifPay"> <img src="{{asset('assets/icon/card.png')}}" alt="">VifPay</span></div>
							<div class="col-6"><span class="lkngay"><a href="">Liên kết ngay <span class="material-icons">keyboard_arrow_right</span></a></span></div>
							<div class="col-12"><span class="lkvi"><img src="{{asset('assets/icon/warning.png')}}" alt="">Chưa liên kết ví</span><span class="text">Liên kết để hưởng khuyến mãi với ưu đãi bạn nhé</span></div>
						</div>
					</div>
					<div class="bl-3"> 
						<div class="title-bl3"> <span class="material-icons">portrait</span>
							<p>Quản lý tài khoản cá nhân</p>
						</div>
						<ul> 
							<li> <a class="active" href="">Trang thay đổi thông tin cá nhân </a></li>
							<li> <a href="">Thay đổi mật khẩu</a></li>
							<li> <a href="">Số dư tài khoản </a></li>
							<li> <a href="">Nạp tiền</a></li>
						</ul>
						<div class="title-bl3"> <span class="material-icons">list_alt</span>
							<p>Quản lý tin đăng</p>
						</div>
						<ul> 
							<li> <a href="">Tin đã đăng</a></li>
							<li> <a href="">Tin chờ đăng</a></li>
							<li> <a href="">Chờ xác nhận </a></li>
						</ul>
					</div>
					<div class="bl-4"> <span class="material-icons">exit_to_app</span>
						<p>Thoát tài khoản</p>
					</div>
				</div>
			</div>
			<div class="bg-menu"></div>
		</nav>
	</div>
</header>
