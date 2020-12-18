@extends('layouts.master')
@section('title','Bài viết theo tags')
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->
@stop


@section('content')
<?php
//Get tags names
$tags = \Route::current()->parameter('tags');
//  echo '',$tags;
?>
<main>
    <section class="banner-top">
        <div class="img"> </div>
    </section>
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
    <section class="pages-news-list">
        <div class="container">

            <h1 class="section-title text-uppercase">Các bài viết theo tag :
                <?php
                echo '' . $tags;
                ?>
            </h1>

        </div>
        <div class="col-md-12 row sec-2">
            @foreach ($news3 as $posts)
            <div class="col-xl-4 col-md-4 col-sm-6 wrapper">
                <div class="article-wrapper">
                    <div class="date">
                        <p>{{$posts->datepost}}</p>
                    </div>
                    <div class="article-small"><a href="/tin-tuc/{{$posts->slug}}"><img class="lazyload"
                                data-src="{{asset('assets/news/' .$posts->img)}}" alt=""></a>
                        <div class="content"><a href="/tin-tuc/{{$posts->slug}}">
                                <h2 class="section-under-title">{{$posts->title}}</h2>
                            </a>
                            <p>{{$posts->summary}}</p>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <div class="paginationSP mx-auto">
            <div class="paginationSP-box mx-auto"><span class="material-icons button-s">skip_previous</span>
                <div class="paginationSP mx-auto">
                    {{ $news3->links() }}
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