@extends('layouts.master')
@section('title','Danh sách tin tức')
@section('headerStyles')

<!-- Thêm styles cho trang này ở đây-->
@stop
@section('content')
<style>

</style>
<main>

	<section class="banner-top">
		<div class="img"> </div>
	</section>
	<div class="global-breadcrumb">
		<div class="max-width-container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="/tin-tuc">
						<p>Tin tức</p>
					</a></li>
			</ol>
		</div>
	</div>
	<section class="pages-news-list">
		<div class="container">

            <div class="nav-news-list">
                <nav>
                    <ul class="nav-list">
                        @foreach ($news_cate as $item)

                    <li class="nav-item "><a href="/tin-tuc/danh-muc/{{$item->slug}}">{{$item->category_name}}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
			<h1 class="section-title text-uppercase">tin tức mới nhất </h1>
			<div class="row sec-1">
				<div class="col-xl-6 col-md-6 col-12">

					<div class="article-big"><a class="bg" href="/news/{{$latest[0]->slug}}"><img src="{{asset('assets/news/' .$latest[0]->img)}}" alt="">
						<div class="content">
                            	<h2 class="section-under-title">{{$latest[0]->title}}</h2></a>

<?php
                               // convert data từ ckeditor qua text bình thường
                               $plaintext = strip_tags($latest[0]->content);

                               ?>
                               <p><?php echo ($plaintext); ?></p>

                        </p>
						</div>
                    </div>
                </a>
				</div>
				<div class="col-xl-6 col-md-6 col-12 wrapper">
					<div class="article-wrapper">
						<div class="date">
							<p>{{$latest[1]->datepost}}</p>
						</div>
						<div class="article-small">
							<div class="img">
								<a href="/news/{{$latest[1]->slug}}">
									<img src="{{asset('assets/news/'.$latest[1]->img)}}" alt="">
								</a>
							</div>
							<div class="content"> <a href="">
									<h2 class="section-under-title">{{$latest[1]->title}} </h2>
								</a>
								<p>{{$latest[1]->summary}}</p>
							</div>
						</div>
					</div>
					<div class="article-wrapper">
						<div class="date">
							<p>{{$latest[2]->datepost}}</p>
						</div>
						<div class="article-small">
							<div class="img"><a href="/news/{{$latest[2]->slug}}"><img src="{{asset('assets/news/' .$latest[2]->img)}}" alt=""></a></div>
							<div class="content"> <a href="">
									<h2 class="section-under-title">{{$latest[2]->title}}</h2>
								</a>
								<p>{{$latest[2]->summary}}</p>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row sec-2">
				{{-- foreach --}}
				@foreach ($news as $posts)
				<div class="col-xl-4 col-md-4 col-sm-6 wrapper">
					<div class="article-wrapper">
						<div class="date">
							<p>{{$posts->datepost}}</p>
						</div>

						<div class="article-small">
							<div class="img"><a href="/tin-tuc/{{$posts->slug}}"><img src="{{asset('assets/news/' .$posts->img)}}" alt=""></a></div>
							<div class="content"><a href="/tin-tuc/{{$posts->slug}}">
									<h2 class="section-under-title">{{$posts->title}}</h2>
								</a>

							</div>


						</div>
					</div>
				</div>
				@endforeach

			</div>
					<div class="paginationSP ">
						{{ $news->links() }}

						{{-- phân trang --}}
					</div>

		</div>
	</section>
	<div id="js-page-verify" hidden></div>
</main>
@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@endsection
