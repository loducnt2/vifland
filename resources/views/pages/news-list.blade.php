@extends('layouts.master')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@section('title','Không tiêu đề ')

<!-- Thêm styles cho trang này ở đây-->
    @section('content')
    <main>

	<section class="pages-news-list">
		<div class="container">

			<h1 class="section-title text-uppercase">tin tức mới nhất </h1>

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
			<div class="paginationSP mx-auto">
				<div class="paginationSP-box mx-auto"><span class="material-icons button-s">skip_previous</span>
					<div class="paginationSP mx-auto">
						{{ $news->links() }}
						{{-- phân trang --}}
					</div>
				</div>
			</div>
		</div>
    </section>
    @endsection
</main>
{{-- section('name') --}}
