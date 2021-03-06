<style>
.verfiy-bar a {
    color: white;
}
</style>
<header>
    @if(Auth::check() && Auth::user()->email_verified_at =="")
    <nav>
        {{-- gửi email xác minh lại --}}

        <nav class="navbar navbar-expand navbar-dar bg-dark mx-auto verfiy-bar" style="color:white">
            <a href="/email/verify">
                Tài khoản chưa xác minh. Xin vui Lòng kiểm tra hòm thư để kích hoạt tài khoản

            </a>
        </nav>

    </nav>
    @endif

    @if(Auth::check() && Auth::user()->user_type == "1")
    <div class="top-bar-admin">
        <div class="max-width-container">
            <div class="wrap-text-left">
                <a class="truycapadmin" href="/admin/index">Truy cập Admin</a>
                <a class="truycapadmin chathotro" href="https://dashboard.tawk.to"><i
                        class="far fa-comment-alt"></i></a>
            </div>
            <div class="wrap-text-right">
                <p>Xin chào mừng: <span>{{auth()->user()->username}}</span></p>
                <div class="line"> </div><a class="dangxuat" href="/logout">Đăng xuất</a>
            </div>
        </div>
    </div>
    @endif
    <div class="user-login d-none d-lg-block">
        <div class="wrap-1">
            <div class="title">Tài khoản</div><i class="ri-close-line close-button-3"></i>
        </div>
        <div class="wrap-2 user-admin">
            @if(auth()->check())
            <div class="bl-1"><img class="lazyload"
                    data-src="{{asset('assets/avatar')}}/{{auth()->user()->img != NULL?auth()->user()->img:'user.png'}}"
                    alt="" onerror="this.src='{{asset('assets/avatar/')}}/user.png' ">
                <div class="content"> <b>{{auth()->user()->username}}</b>
                    @if(Auth::check() && Auth::user()->user_type == "1")

                    <p>Quản trị viên</p>

                    @else
                    <p>Khách</p>

                    @endif
                </div>
            </div>
            <div class="bl-3">
                <div class="title-bl3"> <span class="material-icons">portrait</span>
                    <p>Quản lý tài khoản cá nhân</p>
                </div>
                <ul>
                    <li> <a href="{{route('profile')}}">Thay đổi thông tin cá nhân
                        </a></li>
                    <li> <a id="thaydoimk-link" href="{{route('change-password')}}">Thay đổi mật khẩu</a></li>
                    <!-- <li> <a href="">Số dư tài khoản </a></li> -->
                    <li> <a href="{{route('add-money')}}">Nạp tiền</a></li>
                    <li><a href="{{route('payment-history')}}">Lịch sử giao dịch</a></li>
                </ul>
                <div class="title-bl3">
                    <span class="material-icons">list_alt</span>
                    <p>Quản lý tin đăng</p>
                </div>
                <ul>
                    <li> <a href="{{route('article-posted')}}">Tin hiện tại </a></li>
                    <li> <a href="{{route('article-wait')}}">Tin chờ đăng</a></li>
                    <li> <a href="{{route('article-expire')}}">Tin hết hạn</a></li>
                </ul>
            </div>
            <div class="bl-4"> <span class="material-icons">exit_to_app</span>
                <a href="/logout">
                    <p>Thoát tài khoản</p>
                </a>
            </div>
            @endif
        </div>
    </div>
    <div class="max-width-container container-mb">
        <nav>
            <div class="nav-desktop">
                <div class="logo"><a href="{{route('home')}}"><img class="lazyload"
                            data-src="{{asset('assets/logo/logo-s.png')}}" alt=""></a>
                </div>
                <div class="main-nav">
                    <ul class="nav-list">
                        <a href="{{route('favorites')}}">
                            <li class="nav-item">
                                <div class="yeuthich">
                                    <i class="ri-heart-fill icon"></i>
                                    <div class="number-yt"></div>
                                </div>
                                <p class="text">Yêu thích</p>
                            </li>
                        </a>
                        <a href="/compares" id="compare">
                            <li class="nav-item">
                                <div class="sosanh-num">
                                    <i class="ri-equalizer-line icon"></i>
                                    <div class="number-ss"></div>
                                </div>
                                <p class="text">So sánh</p>
                            </li>
                        </a>
                        <a href="{{route('history')}}">
                            <li class="nav-item"><i class="ri-time-line icon"></i>
                                <p class="text">Lịch sử</p>
                            </li>
                        </a>
                        <li class="nav-item thong-bao">
                            <div class="thong-bao-num"><i class="fas fa-bell icon"></i>
                                <div class="number-tb"></div>
                            </div>
                            <p class="text">Thông báo</p>
                            <div class="wrap-list-thongbao">
                                <div class="wrap-1">
                                    <p>Thông báo mới</p><em class="material-icons close-tb">close</em>
                                </div>
                                <div class="wrap-2">
                                    <div class="khong-thong-bao"> <img src="" alt="">
                                        <p>Không có thông báo nào</p>
                                    </div>

                                    <?php
                                    // noti
                                    $notis = DB::table('notification')
                                        ->where('status', 1)
                                        ->where('due_date', '>', date('Y-m-d', strtotime('now')))
                                        ->orderby('id', 'asc')
                                        ->get();

                                    // noti product
                                    if (auth()->check()) {
                                        $duedate = DB::table('post_history')
                                            ->leftJoin('product', 'post_history.product_id', 'product.id')
                                            ->where('post_history.user_id', auth()->user()->id)
                                            ->where('product.datetime_end', '<=', date('Y-m-d', strtotime("+2 day")))
                                            ->where('product.datetime_end', '>', date('Y-m-d', strtotime('now')))
                                            ->where('post_history.status', 1)
                                            ->orderby('id', 'asc')
                                            ->select(
                                                'product.id as id',
                                                'product.datetime_end as date',
                                                'product.slug as slug'
                                            )
                                            ->get();

                                        $duedate1 = DB::table('post_history')
                                            ->leftJoin('product', 'post_history.product_id', 'product.id')
                                            ->where('post_history.user_id', auth()->user()->id)
                                            ->where('product.datetime_end', '<=', date('Y-m-d', strtotime('now')))
                                            ->where('product.datetime_end', '>=', date('Y-m-d', strtotime("-7 day")))
                                            ->where('post_history.status', 1)
                                            ->orderby('id', 'asc')
                                            ->select(
                                                'product.id as id',
                                                'product.datetime_end as date',
                                                'product.slug as slug'
                                            )
                                            ->get();

                                        $notiPayment = DB::table('payment')
                                            ->where('user_id', auth()->user()->id)
                                            ->where('created_at', '>', date('Y-m-d', strtotime("-7 day")))
                                            ->whereIn('noti_payment', [1, 2])
                                            ->orderby('id', 'desc')
                                            ->get();




                                        $noAccept = DB::table('post_history')
                                            ->leftJoin('product', 'post_history.product_id', 'product.id')
                                            ->where('post_history.user_id', auth()->user()->id)
                                            ->where('product.created_at', '<=', date('Y-m-d', strtotime("+1 day")))
                                            ->where('product.soft_delete', 1)
                                            ->where('post_history.status', 2)
                                            ->orderby('id', 'asc')
                                            ->select(
                                                'product.id as id',
                                                'product.datetime_end as date',
                                                'product.slug as slug'
                                            )
                                            ->get();
                                            $AcceptPost = DB::table('post_history')
                                            ->leftJoin('product', 'post_history.product_id', 'product.id')
                                            ->where('post_history.user_id', auth()->user()->id)
                                            ->where('product.created_at', '<=', date('Y-m-d', strtotime("+1 day")))
                                            ->where('post_history.status', 1)
                                            ->orderby('id', 'asc')
                                            ->select(
                                                'product.id as id',
                                                'product.datetime_end as date',
                                                'product.slug as slug'
                                            )
                                            ->get();
                                    } else {
                                        $duedate = [];
                                        $duedate1 = [];
                                        $noAccept = [];
                                        $notiPayment = [];
                                        $AcceptPost=[];
                                    }
                                    ?>
                                    <div class="co-thong-bao">
                                        @foreach($notis as $noti)
                                        <div class="item">
                                            <div class="wrap-text">
                                                <div class="thongbao thongbao-color">Thông báo</div><a
                                                    href="#">{{$noti->content}}</a>
                                                <div class="date"> {{$noti->created_at}}</div>
                                            </div>
                                        </div>
                                        @endforeach

                                        @foreach($notiPayment as $ad)
                                        @if($ad->noti_payment == 1)
                                        <div class="item">
                                            <div class="wrap-text products-duedate ">
                                                <div class="thongbao post-expired bg-success">Nạp tiền</div><a
                                                    href="">Tài khoản: +{{number_format($ad->amount)}} VND</a>
                                                <div class="date">Vào ngày:{{$ad->created_at}}</div>

                                            </div>
                                        </div>
                                        @endif
                                        @if($ad->noti_payment == 2)
                                        <div class="item">
                                            <div class="wrap-text products-duedate ">
                                                <div class="thongbao post-expired bg-danger">Trừ tiền</div><a href="">
                                                    Tài khoản: -{{number_format($ad->amount)}} VND</a>
                                                <div class="date">Vào ngày:{{$ad->created_at}}</div>

                                            </div>
                                        </div>
                                        @endif
                                        @endforeach

                                        @foreach($duedate as $due)
                                        <div class="item">
                                            <div class="wrap-text products-duedate ">
                                                <div class="thongbao post-expired">Thông báo</div><a
                                                    href="{{route('article-detail',$due->slug)}}">Bài
                                                    viết của bạn sắp hết hạn</a>
                                                <div class="date"> ngày hết hạn: {{$due->date}}</div>

                                            </div>
                                        </div>
                                        @endforeach

                                        @foreach($duedate1 as $due1)
                                        <div class="item">
                                            <div class="wrap-text products-duedate ">
                                                <div class="thongbao post-due" style="background: red;">Thông báo</div>
                                                <a href="{{route('article-detail',$due1->slug)}}">Bài
                                                    viết của bạn đã hết hạn</a>
                                                <div class="date"> ngày hết hạn: {{$due1->date}}</div>

                                            </div>
                                        </div>
                                        @endforeach
                                        @foreach($noAccept as $post)
                                        <div class="item">
                                            <div class="wrap-text products-duedate ">
                                                <div class="thongbao post-due" style="background: red;">Thông báo</div>
                                                <a href="{{route('article-detail',$post->slug)}}">Bài
                                                    viết của bạn không được duyệt </a>
                                            </div>
                                        </div>
                                        @endforeach

                                        @foreach($AcceptPost as $post)
                                        <div class="item">
                                            <div class="wrap-text products-duedate ">
                                                <div class="thongbao post-due bg-success">Thông báo</div>
                                                <a href="{{route('article-detail',$post->slug)}}">Bài
                                                    viết của bạn đã được duyệt </a>
                                            </div>
                                        </div>
                                        @endforeach







                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="nav-item tin-tuc-icon"><a class="text" href="/tin-tuc"><em
                                    class="material-icons icon">list_alt</em>Tin tức</a></li>
                        <li class="post-new"><i class="ri-chat-new-fill icon"></i>
                            <a class="text" href="/article/new/mua-ban-nha-dat" data-toggle="modal"
                                data-target="#exampleModal">Đăng bài</a>
                        </li>
                        <li class="nav-item d-none user-logined">
                            <img class="avatar-login lazyload" data-src="{{asset('assets/avatar/avatar.png')}}" alt="">
                        </li>
                        <li class="nav-item">
                            @if(auth()->check())
                            <div class="avatar-user"><img class="lazyload"
                                    src="{{asset('assets/avatar')}}/{{auth()->user()->img != NULL?auth()->user()->img:'user.png'}}"
                                    alt=""></div>
                            @else
                            <a href="/login" class="btn btn__header login1" style="line-height:36px">Đăng Nhập</a>
                            @endif
                        </li>
                        <!-- <li class="nav-item change-lang"><span class="button-change-lang"><img
                                    src="{{asset('assets/icon/icon-vn.png')}}" alt=""><i
                                    class="ri-arrow-down-s-fill"></i>
                                <div class="list-change-lang">
                                    <div class="list-change-lang-row"><img src="{{asset('assets/icon/icon-vn.png')}}"
                                            alt="">
                                        <p>Tiếng việt</p>
                                    </div>
                                    <div class="list-change-lang-row"><img src="{{asset('assets/icon/icon-usa.png')}}"
                                            alt="">
                                        <p>English</p>
                                    </div>
                                </div>
                            </span>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="nav-mobile">
                <div class="nav-mobile-1">
                    <div class="img"><a href="{{route('home')}}"><img class="lazyload"
                                data-src="{{asset('assets/logo/logo-res-white.png')}}" alt=""></a></div>
                    <div class="button-mobile-post">
                        <button class="button-mbp"><i class="ri-chat-new-fill icon"></i><a style="color:#fff"
                                class="text" href="/article/new/mua-ban-nha-dat" data-toggle="modal"
                                data-target="#exampleModal">Đăng bài</a></button>
                        <div class="sosanh">
                            <a href="/compares">
                                <i class="ri-equalizer-line icon"></i>
                            </a>
                        </div>
                        <div class="yeuthich">
                            <a href="{{route('favorites')}}">
                                <i class="ri-heart-fill icon"></i>
                                <div class="number-yt"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{route('searchmob')}}" method="get" id="" style="margin-bottom:0px">
                    <div class="nav-mobile-2">
                        <div class="toggle-menu"><i class="ri-grid-fill"></i></div>

                        <div class="search-menu">

                            <input type="text" placeholder="Bạn tìm gì hôm nay?" name="kyw">

                        </div>

                        @if(auth()->check())
                        <div class="user user-menu"><i class="ri-map-pin-user-fill"></i></div>
                        @else
                        <div class="user"><a href="/login"><i class="ri-map-pin-user-fill"></i></a></div>
                        @endif
                    </div>
                </form>

            </div>
            <div class="menu-mobile">
                <div class="wrap-1">
                    <div class="logo"> <a href=""><img class="lazyload" data-src="{{asset('assets/logo/logo-s.png')}}"
                                alt=""></a></div><i class="ri-close-line close-button"></i>
                </div>
                <div class="wrap-2">
                    <!-- <div class="change-lang">
                        <div class="left"><img src="{{asset('assets/icon/icon-vn.png')}}" alt="">
                            <p>Tiếng việt</p>
                        </div>
                        <div class="right"><i class="ri-arrow-down-s-fill"></i></div>
                    </div> -->
                    <ul class="list-items">
                        <li class="list-item">
                            <a href="/favourites">
                                <i class="ri-heart-fill icon"></i>
                                <p class="text">Yêu thích</p>
                            </a>
                        </li>
                        <li class="list-item">
                            <a href="/history">
                                <i class="ri-time-line icon"></i>
                                <p class="text">Lịch sử</p>
                            </a>
                        </li>
                        <!-- <li class="list-item"> <a href=""><i class="fas fa-bell icon"></i>
                                <p class="text">Thông báo</p>
                            </a></li> -->
                    </ul>
                </div>
                <div class="wrap-3">
                    <div class="title">
                        Công ty <i class="ri-arrow-down-s-fill"></i></div>
                    <ul>
                        <li><a href="/about">Về Vifland</a></li>
                    </ul>
                    <div class="title">
                        Hỗ trợ<i class="ri-arrow-down-s-fill"></i></div>
                    <ul>
                        <li><a href="/contact">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="wrap-4">
                    <div class="title">Công ty Cổ phần Tập đoàn Vifland</div>
                    <ul>
                        <li><span class="material-icons">location_on</span>
                            <p>Tầng 5 Tòa nhà 97 - 99 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, Thành phố Hà Nội</p>
                        </li>
                        <li><span class="material-icons">call</span>
                            <p>0869 092 929</p>
                        </li>
                        <li><span class="material-icons">email</span>
                            <p>contact@vifland.com</p>
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
                    @if(auth()->check())
                    <div class="bl-1"><img class="lazyload"
                            data-src="{{asset('assets/avatar')}}/{{auth()->user()->img != NULL?auth()->user()->img:'user.png'}}"
                            alt="">
                        <p>{{auth()->user()->username}}</p>
                    </div>
                    <div class="bl-2">
                        <div class="row">
                            <div class="col-12"><span class="vifPay"> <img class="lazyload"
                                        data-src="{{asset('assets/icon/card.png')}}"
                                        alt="">{{number_format(auth()->user()->wallet)}} VNĐ</span></div>
                            <!-- <div class="col-6"><span class="lkngay"><a href="">Liên kết ngay <span
                                            class="material-icons">keyboard_arrow_right</span></a></span></div>
                            <div class="col-12"><span class="lkvi"><img src="{{asset('assets/icon/warning.png')}}"
                                        alt="">Chưa liên kết ví</span><span class="text">Liên kết để hưởng khuyến mãi
                                    với ưu đãi bạn nhé</span></div> -->
                        </div>
                    </div>
                    <div class="bl-3">
                        <div class="title-bl3"> <span class="material-icons">portrait</span>
                            <p>Quản lý tài khoản cá nhân</p>
                        </div>
                        <ul>
                            <li> <a href="{{route('profile')}}">Trang thay đổi thông tin cá nhân </a></li>
                            <li> <a href="{{route('change-password')}}">Thay đổi mật khẩu</a></li>
                            <li> <a href="{{route('add-money')}}">Nạp tiền</a></li>
                            <li><a href="{{route('payment-history')}}">Lịch sử giao dịch</a></li>
                        </ul>
                        <div class="title-bl3"> <span class="material-icons">list_alt</span>
                            <p>Quản lý tin đăng</p>
                        </div>
                        <ul>
                            <li> <a href="{{route('article-posted')}}">Tin hiện tại</a></li>
                            <li> <a href="{{route('article-wait')}}">Tin chờ đăng</a></li>
                            <li> <a href="{{route('article-expire')}}">Tin hết hạn</a></li>
                        </ul>
                    </div>
                    <div class="bl-4"> <span class="material-icons">exit_to_app</span>
                        <a href="/logout">
                            <p>Thoát tài khoản</p>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="bg-menu"></div>
        </nav>
    </div>
</header>
<div class="wrap-modal-post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"><a class="box" href="/article/new/mua-ban-nha-dat"><img class="lazyload"
                        data-src="{{asset('assets/index/mua-ban-nha-dat.png')}}" alt="">
                    <p>Mua/ Bán</p><em class="material-icons">double_arrow</em>
                </a><a class="box" href="/article/new/cho-thue-nha-dat"><img class="lazyload"
                        data-src="{{asset('assets/index/cho-thue-nha-dat.png')}}" alt="">
                    <p>Thuê/ Cho Thuê</p><em class="material-icons">double_arrow</em>
                </a><a class="box" href="/article/new/sang-nhuong-nha-dat"><img class="lazyload"
                        data-src="{{asset('assets/index/sang-nhuong-nha-dat.png')}}" alt="">
                    <p>Sang Nhượng</p><em class="material-icons">double_arrow</em>
                </a></div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var number_noti = 0;
$(".item").each(function() {
    number_noti += 1
})
if (number_noti == 0) {
    $(".number-tb").hide();
} else {
    $(".number-tb").text(number_noti);
}
</script>