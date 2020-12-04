@extends('layouts.master')
@section('title','Danh sách tin tức')
@section('headerStyles')
<!-- Thêm styles cho trang này ở đây-->
@stop
@section('content')

			<h1 class="section-title text-uppercase">tin tức mới nhất </h1>
			<div class="row sec-1">
				<div class="col-xl-6 col-md-6 col-12">
					<div class="article-big"><a class="bg" href="/news/{{$latest[0]->slug}}"><img src="{{asset('assets/news/' .$latest[0]->img)}}" alt=""></a>
						<div class="content"> <a href="">
								{{-- Tin mới nhất :{{$latest->title}} --}}
								<h2 class="section-under-title">{{$latest[0]->title}}</h2></a>
							<p>{{$latest[0]->summary}}</p>
						</div>
					</div>
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
						<?php $tomtat = \Illuminate\Support\Str::limit($posts->content, 150, '...')
						?>
						<div class="article-small">
							<div class="img"><a href="/tin-tuc/{{$posts->slug}}"><img src="{{asset('assets/news/' .$posts->img)}}" alt=""></a></div>
							<div class="content"><a href="/tin-tuc/{{$posts->slug}}">
									<h2 class="section-under-title">{{$posts->title}}</h2>
								</a>
								<p><?php echo "" . $tomtat; ?></p>
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
	<div id="js-page-verify" hidden></div>
</main>
@stop
@section('footerScripts')
<!-- Thêm script cho trang này ở đây -->
@endsection