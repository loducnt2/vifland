@extends('layouts.master')
@section('title','Quản lý tin đăng')
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->
@stop
@section('content')
<main>
    <div class="global-breadcrumb">
        <div class="max-width-container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> <i class="ri-arrow-left-line icons-breadcrum"></i>Mua/ Bán
                        <span class="sll-breadcrum">&nbsp; (1.475.822 tin đăng)</span></a></li>
                <li class="breadcrumb-item"><a href="#">
                        <p>Mở bán dự án đô thị sinh thái thông minh Aqua City, phía Đông thành phố Hồ Chí Minh Bạn tìm
                            gì hôm nay?</p>
                    </a></li>
                <div class="search">
                    <form action="">
                        <input type="text" placeholder="Bạn cần tìm hôm nay?">
                    </form>
                </div>
            </ol>
        </div>
    </div>
    <section class="quanlytindang">
        <div class="max-width-container">
            <div class="admin-wrap">
                <div class="row">
                    <div class="col-3">
                        <div class="box-left-admin">
                            <div class="bl-1"><img class="lazyload" src="{{asset('assets/avatar/avatar-girl.png')}}"
                                    alt="">
                                <p>{{auth()->user()->full_name}} </p>
                            </div>
                            <div class="bl-2">
                                <div class="row">
                                    <div class="col-6"><span class="vifPay"> <img class="lazyload"
                                                data-src="{{asset('assets/icon/card.png')}}"
                                                alt="">{{number_format(auth()->user()->wallet)}} VNĐ</span></div>
                                    <div class="col-6"><span class="lkngay"><a href="">Liên kết ngay <span
                                                    class="material-icons">keyboard_arrow_right</span></a></span></div>
                                    <!-- <div class="col-12">
                                        <span class="lkvi">
                                            <img src="{{asset('assets/icon/warning.png')}}" alt="">
                                            Chưa liên kết ví
                                        </span>
                                        <span class="text">Liên kết để hưởng khuyến mãi với ưu đãi bạn nhé</span>
                                    </div> -->
                                </div>
                            </div>
                            <div class="bl-3">
                                <div class="title-bl3"> <span class="material-icons">portrait</span>
                                    <p>Quản lý tài khoản cá nhân</p>
                                </div>
                                <ul>
                                    <li> <a class="active" href="/user/profile/{{auth()->user()->id}}">Trang thay đổi
                                            thông tin cá nhân </a></li>
                                    <li> <a href="">Thay đổi mật khẩu</a></li>
                                    <li> <a href="">Số dư tài khoản </a></li>
                                    <li> <a href="">Nạp tiền</a></li>
                                </ul>
                                <div class="title-bl3"> <span class="material-icons">list_alt</span>
                                    <p>Quản lý tin đăng</p>
                                </div>
                                <ul>
                                    <li> <a href="">Tin đang đăng</a></li>
                                    <li> <a href="">Tin chờ đăng</a></li>
                                    <li> <a href="">Tin hết hạn</a></li>
                                </ul>
                            </div>
                            <div class="bl-4"> <span class="material-icons">exit_to_app</span>
                                <p>Thoát tài khoản</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="box-right">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="active nav-link active" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tin
                                        chờ xác nhận</a>
                                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                        role="tab" aria-controls="nav-profile" aria-selected="false">Tin đang đăng</a>
                                    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                        role="tab" aria-controls="nav-contact" aria-selected="false">Tin hết hạn</a>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        @if(count($product_wait1) >0 )
                                        <div class="box-content">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Đơn giá </th>
                                                        <th>Mặt tiền (m)</th>
                                                        <th>Chiều sâu (m)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach( $product_wait1 as $product)
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <div class="img">
                                                                        <a
                                                                            href="{{route('article-detail',$product->slug)}}"><img
                                                                                class="lazyload"
                                                                                data-src="{{asset('assets/product/detail/')}}/{{$product->thumbnail}}"
                                                                                alt=""></a>

                                                                        @if ($product->type == 4)
                                                                        @else
                                                                        <img class="iconVip lazyload"
                                                                            data-src="{{asset('assets/icon/vip'.$product->type.'.svg')}}"
                                                                            alt="">
                                                                        @endif
                                                                        <!-- <div class="tag">Thương lượng</div> -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-9">
                                                                    <div class="text">
                                                                        <a
                                                                            href="{{route('article-detail',$product->slug)}}">
                                                                            <p class="t-1">{{$product->title}}</p>
                                                                        </a>
                                                                        <div class="t-2"><span
                                                                                class="material-icons">location_on</span>
                                                                            <p>{{$product->district}},
                                                                                {{$product->province}}</p>
                                                                        </div>
                                                                        <div class="t-3">
                                                                            <p> <strong>Ngày đăng
                                                                                    tin:</strong>{{date('d-m-Y',strtotime($product->datetime_start) )}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="t-3">
                                                                            <p> <strong>Ngày hết
                                                                                    hạn:</strong>{{date('d-m-Y',strtotime($product->datetime_end) )}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="t-4"><span
                                                                                class="material-icons">visibility</span>
                                                                            <p>{{$product->view}} lượt xem</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $product->price}} {{$product->name}}</td>
                                                        <td>{{$product->facades}}</td>
                                                        <td>{{$product->depth}}</td>
                                                        <td>
                                                            <a href="{{route('delete-article',$product->product_id)}}"
                                                                class="text-danger">Xóa</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        @else
                                        <div class="article-none"> <img class="lazyload"
                                                data-src="{{asset('assets/san_pham/no-documents.png')}}" alt="">
                                            <p>Không có bài đăng nào</p>
                                        </div>
                                        @endif
                                    </div>



                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        @if(count($product_posted) >0 )
                                        <div class="box-content">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Đơn giá </th>
                                                        <th>Mặt tiền (m)</th>
                                                        <th>Chiều sâu (m)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach( $product_posted as $product)
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <div class="img"><a
                                                                            href="{{route('article-detail',$product->slug)}}"><img
                                                                                class="lazyload"
                                                                                data-src="{{asset('assets/product/detail/')}}/{{$product->thumbnail}}"
                                                                                alt=""></a>
                                                                        @if ($product->type == 4)
                                                                        @else
                                                                        <img class="iconVip lazyload"
                                                                            data-src="{{asset('assets/icon/vip'.$product->type.'.svg')}}"
                                                                            alt="">
                                                                        @endif
                                                                        <!-- <div class="tag">Thương lượng</div> -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-9">
                                                                    <div class="text">
                                                                        <a
                                                                            href="{{route('article-detail',$product->slug)}}">
                                                                            <p class="t-1">{{$product->title}}</p>
                                                                        </a>
                                                                        <div class="t-2"><span
                                                                                class="material-icons">location_on</span>
                                                                            <p>{{$product->district}},
                                                                                {{$product->province}}</p>
                                                                        </div>
                                                                        <div class="t-3">
                                                                            <p> <strong>Ngày đăng
                                                                                    tin:</strong>{{date('d-m-Y',strtotime($product->datetime_start) )}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="t-3">
                                                                            <p> <strong>Ngày hết
                                                                                    hạn:</strong>{{date('d-m-Y',strtotime($product->datetime_end) )}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="t-4"><span
                                                                                class="material-icons">visibility</span>
                                                                            <p>{{$product->view}} lượt xem</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $product->price}} {{$product->name}}</td>
                                                        <td>{{$product->facades}}</td>
                                                        <td>{{$product->depth}}</td>
                                                        <td>
                                                            <a href="{{route('delete-article',$product->product_id)}}"
                                                                class="text-danger">Xóa</a><br>
                                                            <a href="{{route('edit-article',$product->product_id)}}"
                                                                class="text-danger">Chỉnh sửa</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                        <div class="article-none"> <img class="lazyload"
                                                data-src="{{asset('assets/san_pham/no-documents.png')}}" alt="">
                                            <p>Không có bài đăng nào</p>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                        aria-labelledby="nav-contact-tab">
                                        <!-- <div class="box-search">
											<div class="row box-search-wrap">
												<div class="col-4">
													<input class="input-search" type="text" placeholder="Nhập tìm kiếm...">
												</div>
											</div>
										</div> -->

                                        @if(count($product_expire) >0 )
                                        <span>*Tin sẽ tự động xóa sau 7 ngày</span>
                                        <div class="box-content">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Đơn giá </th>
                                                        <th>Mặt tiền (m)</th>
                                                        <th>Chiều sâu (m)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach( $product_expire as $product)
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <div class="img"><a
                                                                            href="{{route('article-detail',$product->slug)}}"><img
                                                                                class="lazyload"
                                                                                data-src="{{asset('assets/product/detail/')}}/{{$product->thumbnail}}"
                                                                                alt=""></a>
                                                                        @if ($product->type == 4)
                                                                        @else
                                                                        <img class="iconVip lazyload"
                                                                            data-src="{{asset('assets/icon/vip'.$product->type.'.svg')}}"
                                                                            alt="">
                                                                        @endif
                                                                        <!-- <div class="tag">Thương lượng</div> -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-9">
                                                                    <div class="text">
                                                                        <a
                                                                            href="{{route('article-detail',$product->slug)}}">
                                                                            <p class="t-1">{{$product->title}}</p>
                                                                        </a>
                                                                        <div class="t-2"><span
                                                                                class="material-icons">location_on</span>
                                                                            <p>{{$product->district}},
                                                                                {{$product->province}}</p>
                                                                        </div>
                                                                        <div class="t-3">
                                                                            <p> <strong>Ngày đăng
                                                                                    tin:</strong>{{date('d-m-Y',strtotime($product->datetime_start) )}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="t-3">
                                                                            <p> <strong>Ngày hết
                                                                                    hạn:</strong>{{date('d-m-Y',strtotime($product->datetime_end) )}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="t-4"><span
                                                                                class="material-icons">visibility</span>
                                                                            <p>{{$product->view}} lượt xem</p>
                                                                        </div>
                                                                        <div class="t-4">
                                                                            <p class="text-danger">
                                                                                {{$product->status==2?"Tin không được duyệt":""}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $product->price}} {{$product->name}}</td>
                                                        <td>{{$product->facades}}</td>
                                                        <td>{{$product->depth}}</td>
                                                        <td>
                                                            <a href="{{route('delete-article',$product->product_id)}}"
                                                                class="text-danger">Xóa</a><br>
                                                            @if( $product->status!=2 )
                                                            <a href="{{route('add-date-form',$product->product_id)}}"
                                                                class="text-danger"> Gia hạn</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                        <div class="article-none"> <img class="lazyload"
                                                data-src="{{asset('assets/san_pham/no-documents.png')}}" alt="">
                                            <p>Không có bài đăng nào</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal32" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gian hạn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="index-page" id="js-page-verify" hidden></div>
</main>
@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@endsection