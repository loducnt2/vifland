@extends('layouts.master')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

{{-- @if ($news->title =''){ --}}

@if ($news->title =='')
@section('title','Không tiêu đề ')

@else
<title>{{$news->title}}</title>
@endif
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
						<p>Mở bán dự án đô thị sinh thái thông minh Aqua City, phía Đông thành phố Hồ Chí Minh Bạn tìm gì hôm nay?</p>
					</a></li>
			</ol>
		</div>
	</div>
	<section class="pages-news-detail">
		<div class="container">
			<div class="row">

				<div class="col-xl-9 col-md-9">
					<div class="article-container">
						<div class="date">
							<p>{{$news->datepost}}</p>
						</div>
						<div class="title">
							<h1 class="section-under-title">{{$news->title}}</h1>
						</div>
						<p>Tác giả: <a href="/user/profile/{{$id_nguoidang->id}}">{{$id_nguoidang->username}} <span class="badge badge-primary">Quản trị viên</span></h6></a></p>
						<a href="/tin-tuc/danh-muc/{{$news_cate->slug}}">{{$news_cate->category_name}}</a>
						<div class="content">
							{!!$news->content!!}
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-3">
					<div class="orther-news">
						<div class="title">
							<h2 class="section-des">Các tin khác</h2>
						</div>
						@foreach ($posts as $news2)
						@if($news->slug == $news2->slug)
						{{-- ẩn tin --}}
						@else
						<div class="news-content">

							<div class="img"> <img src="{{asset('assets/news')}}/{{$news2->img}}" alt=""></div>
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