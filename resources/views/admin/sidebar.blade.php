
<link rel="stylesheet" href="{{asset('css/admin_styles.css') }}">
<link rel="stylesheet" href="{{asset('css/styles.css') }}">
    <link href="{{asset('css/update-admin.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/datatables.css')}}">

<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@yield('title')
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
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div> -->
            </form>
            <!-- Navbar-->
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
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                     <a class="navbar-brand" href="index.html">VIFLAND</a>
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <a class="navbar-brand" href="/admin/index">Trang quản trị</a>
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MỤC THỐNG KÊ</div>
                        <a class="nav-link" href="{{url('admin')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                trang thống kê dữ liệu
                            </a>
                            <div class="sb-sidenav-menu-heading">Quản lí sản phẩm và danh mục</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản lý sản phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    {{-- <a class="nav-link" href="layout-static.html"></a> --}}
                                    <a class="nav-link" href="{{ url('admin/san-pham/cap-nhat-san-pham') }}"> Cập nhật sản phẩm</a>
                                    <a class="nav-link" href="{{ url('admin/san-pham/danh-sach-san-pham') }}">Danh sách sản phâm</a>

                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Quản lí danh mục
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                    <a class="nav-link" href="{{ url('admin/cap-nhat-danh-muc') }}">Cập nhật danh mục</a>
                                    <a class="nav-link" href="{{ url('admin/danh-sach-danh-muc') }}">Danh sách danh mục</a>

                                      </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Quản trị trang web</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Quản lý tin tức
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages3" aria-labelledby="headingFour" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                    <a class="nav-link" href="{{ url('admin/cap-nhat-tin-tuc') }}">Cập nhật tin tức</a>
                                    <a class="nav-link" href="{{ url('admin/danh-muc-tin-tuc') }}">Danh mục tin tức</a>
                                    <a class="nav-link" href="{{ url('admin/danh-sach-tin-tuc') }}">Danh sách tin tức</a>
                                    <a class="nav-link" href="{{ url('admin/danh-sach-duyet-tin') }}">Duyệt tin</a>

                                      </nav>
                            </div>
                        <a class="nav-link" href="{{ url('admin/index/profiles') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                Quản lý người dùng
                            </a>

                            <a class="nav-link" href="{{ url('admin/don-hang/quan-ly-don-hang') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Quản lý đơn hàng
                            </a>
                            <a class="nav-link" href="{{ url('admin/danh-sach-province') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                Quản lý tỉnh/ thành phố
                            </a>
                            <a class="nav-link" href="{{ url('admin/index/quan-ly-thu-tin-tuc') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                Quản lý thư tin tức
                            </a>

                            <a class="nav-link" href="{{ url('admin/danh-sach-banner') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                Banner
                            </a>
                            <a class="nav-link" href="{{ url('admin/danh-sach-thong-bao') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                Thông báo
                            </a>
                            <a class="nav-link" href="{{ url('admin/chinh-sua-trang-chu') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                Chỉnh sửa trang chủ
                            </a>

                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Tài khoản đăng nhập</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                @yield('content')

            </div>
        </div>
        @extends('admin.footer')
