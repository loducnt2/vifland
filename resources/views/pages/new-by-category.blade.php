@extends('layouts.master')
{{-- @section('title','Tin tức theo danh mục') --}}
<title>{{$news_cate->category_name}}</title>
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
				<li class="breadcrumb-item"><a href="#"> <i class="ri-arrow-left-line icons-breadcrum"></i>Mua/ Bán <span class="sll-breadcrum">&nbsp; (1.475.822 tin đăng)</span></a></li>
				<li class="breadcrumb-item"><a href="#">
						<p>Mở bán dự án đô thị sinh thái thông minh Aqua City, phía Đông thành phố Hồ Chí Minh Bạn tìm gì hôm nay?</p></a></li>
			</ol>
		</div>
	</div>
	<section class="pages-news-list">
		<div class="container">
{{-- --}}

<h1 class="section-title text-uppercase">tin tức theo danh mục {{$news_cate->category_name}} </h1>

			<div class="row sec-2">
                {{-- foreach --}}

                @foreach ($posts as $posts2)
                <div class="col-xl-4 col-md-4 col-sm-6 wrapper">
					<div class="article-wrapper">
						<div class="date">
                        <p>{{$posts2->datepost}}</p>
						</div>
                    <div class="article-small"><a href="/tin-tuc/{{$posts2->slug}}"><img src="{{asset('assets/news/' .$posts2->img)}}" alt=""></a>
                    <div class="content"><a href="/tin-tuc/{{$posts2->slug}}">
                            <h2 class="section-under-title">{{$posts2->title}}</h2></a>
							</div>
						</div>
					</div>
				</div>
                @endforeach
			</div>
            <div class="paginationSP ">
                {{ $posts->links() }}


            </div>

		</div>
	</section>
	<div id="js-page-verify" hidden></div>
</main>
@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@endsection
