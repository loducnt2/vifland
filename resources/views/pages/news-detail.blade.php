@extends('layouts.master')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

{{-- @if ($news->title =''){ --}}

@if ($news->title =='')
@section('title','Không tiêu đề ')

@else
<title>{{$news->title}}</title>
@endif
@section('headerStyles')

<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=1108629442905255&autoLogAppEvents=1"
    nonce="lpCr0s3t"></script>
<style>
.fb-comments,
.fb-comments iframe[style],
.fb-like-box,
.fb-like-box iframe[style] {
    width: 100% !important;
}

.fb-comments span,
.fb-comments iframe span[style],
.fb-like-box span,
.fb-like-box iframe span[style] {
    width: 100% !important;
}

#u_0_0 {
    width: 100% !important;
}
</style>
<!-- Thêm styles cho trang này ở đây-->
@stop
@section('content')
<style>
div#u_0_0 {
    width: 100% !important;
}
</style>
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
            </ol>
        </div>
    </div>
    <section class="pages-news-detail">
        <div class="container">
            <div class="row">

                <div class="col-xl-9 col-md-9">
                    {{-- Post liên quan cùng category --}}

                    {{-- với {{$news->id_category}} --}}
                    <div class="article-container">
                        <div class="article-title">
                            <div class="title">
                                <h1 class="section-under-title">{{$news->title}}</h1>
                            </div>
                            <div class="wrapper">
                                <div class="date">
                                    <p>{{$news->datepost}}</p>
                                </div>
                                <div class="author">
                                    <p>Tác giả: <a
                                            href="/profile/{{$id_nguoidang->username}}">{{$id_nguoidang->username}}
                                            @if($id_nguoidang->user_type==1)
                                            <span class="badge badge-primary">Quản trị viên</span></h6></a></p>
                                    @else
                                    {{-- <span class="badge badge-primary">Quản trị viên</span></h6></a></p> --}}
                                    @endif
                                </div>

                            </div>
                        </div>

                        <div class="article-content">
                            <div class="content">
                                {!!$news->content!!}
                            </div>
                        </div>
                    </div>
                    <div class="binh-luan-facebook">
                        <?php
                        function getCurURL()
                        {
                            if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
                                $pageURL = "https://";
                            } else {
                                $pageURL = 'http://';
                            }
                            if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
                                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
                            } else {
                                $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
                            }
                            return $pageURL;
                        }

                        ?>
                        <div class="fb-comments" data-href="{{getCurURL()}}" data-width="100%" data-numposts="5">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="orther-news">
                        @foreach ($posts as $news2)
                        @if($news->slug == $news2->slug)
                        {{-- ẩn tin --}}
                        @else
                        <div class="news-content">
                            <div class="img"> <img class="lazyload" data-src="{{asset('assets/news')}}/{{$news2->img}}"
                                    alt=""></div>
                            <div class="content">
                                <div class="date">
                                    <p>{{$news2->datepost}}</p>
                                </div><a href="/news/{{$news2->slug}}">
                                    <h2 class="section-des">{{$news2->title}}</h2>
                                </a>

                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="js-page-verify" hidden></div>
</main>

@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@endsection