<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/dashboard-admin.css')}}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <title>@yield('title','Thống kê dữ liệu')</title>
    <script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>

</head>

<link rel="stylesheet" href="{{asset('css/admin_styles.css') }}">
<link href="{{asset('css/update-admin.css') }}" rel="stylesheet" />
<link href="{{asset('css/profile.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/datatables.css')}}">
{{-- <link rel="stylesheet" href="style.css"> --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.4.0/dist/select2-bootstrap4.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.12.5/sweetalert2.min.css">
<style>
::-webkit-scrollbar {
    width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>

<body class="sb-nav-fixed">
    <!-- <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav> -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion " id="sidenavAccordion">
                <a class="navbar-brand" href="{{url('')}}">VIFLAND</a>
                <nav class="sb-sidenav accordion " id="sidenavAccordion">
                    <!-- <a class="sidebar-title" href="/admin/index">Trang quản trị</a> -->
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">MỤC THỐNG KÊ</div> -->
                            <a class="nav-link" href="{{url('admin/index')}}">
                                <div class="sb-nav-link-icon"><span class="material-icons">
                                        home
                                    </span></div>
                                Trang thống kê dữ liệu
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Quản lí sản phẩm và danh mục</div> -->
                            <!-- <div class="sb-sidenav-menu-heading">Quản trị trang web</div> -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
                                aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><span class="material-icons">
                                        post_add
                                    </span></i></div>
                                Quản lý tin tức
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages3" aria-labelledby="headingFour"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="{{ url('admin/cap-nhat-tin-tuc') }}">Đăng tin tức</a>
                                    <a class="nav-link" href="{{ url('admin/danh-muc-tin-tuc') }}">Quản lý danh mục tin
                                        tức</a>
                                    <a class="nav-link" href="{{ url('admin/danh-sach-tin-tuc') }}">Danh sách tin
                                        tức</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4"
                                aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><span class="material-icons">
                                        wysiwyg
                                    </span></i></div>
                                Quản lý tin đăng
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages4" aria-labelledby="headingFour"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="{{ url('admin/danh-sach-duyet-tin') }}">Duyệt tin</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="{{ url('admin/index/profiles') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                Quản lý người dùng
                            </a>
                            <a class="nav-link" href="{{route('admin-list')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
                                Quản lý quản trị viên
                            </a>
                            <a class="nav-link" href="{{ url('admin/danh-sach-gia-vip') }}">
                                <div class="sb-nav-link-icon"><span class="material-icons">
                                        request_quote
                                    </span></div>
                                Quản lý giá post
                            </a>
                            <a class="nav-link" href="{{ route('wallet')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                                Nạp tiền thủ công
                            </a>
                            <a class="nav-link" href="{{ url('admin/danh-sach-province') }}">
                                <div class="sb-nav-link-icon"><span class="material-icons">
                                        domain
                                    </span></div>
                                Quản lý tỉnh/ thành phố
                            </a>
                            <a class="nav-link" href="{{ url('admin/index/quan-ly-thu-tin-tuc') }}">
                                <div class="sb-nav-link-icon"><span class="material-icons">
                                        forward_to_inbox
                                    </span></div>
                                Quản lý thư tin tức
                            </a>
                            <a class="nav-link" href="{{ url('admin/danh-sach-contact') }}">
                                <div class="sb-nav-link-icon"><span class="material-icons">
                                        forward_to_inbox
                                    </span></div>
                                Quản lý liên hệ
                            </a>

                            <a class="nav-link" href="{{ url('admin/danh-sach-banner') }}">
                                <div class="sb-nav-link-icon"><span class="material-icons">
                                        add_to_photos
                                    </span></div>
                                Banner
                            </a>
                            <a class="nav-link" href="{{ url('admin/danh-sach-thong-bao') }}">
                                <div class="sb-nav-link-icon"><span class="material-icons">
                                        notifications_active
                                    </span></div>
                                Thông báo
                            </a>

                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small">Tài khoản đăng nhập</div>
                            Admin
                        </div>
                </nav>
        </div>
        <div id="layoutSidenav_content">
            <div class="breadcrumb-n">
                <div class="breadcrumb-left">
                    <ul>
                        <li>
                            <a href="">Bảng điều khiển</a>
                        </li>
                        <li>
                            @yield('breadcum')
                        </li>
                    </ul>
                </div>
                @if(Auth::check() && Auth::user()->user_type == "1")
                <div class="avatar">
                    <img class="lazyload" data-src="{{asset('assets/icon/avatar.png')}}" alt="">
                    <div class="list-menu-login">
                        <div class="wrap-title">
                            <div class="title">{{auth()->user()->username}}</div>
                            <p>Quản trị viên</p>
                        </div>

                        <ul>
                            <li> <span class="material-icons">
                                    person_outline
                                </span> <a href="/admin/index/profile/{{auth()->user()->id}}">Hồ sơ</a></li>
                        </ul>
                        <div class="logout">
                            <span class="material-icons">
                                toggle_on
                            </span>
                            <a href="/logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')

        </div>
    </div>
    @endif
    <script>
    $(document).ready(function() {
        $(".breadcrumb-n .avatar").click(function() {
            $(".breadcrumb-n .list-menu-login").toggleClass("show")
        })
    });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


    @extends('admin.footer')