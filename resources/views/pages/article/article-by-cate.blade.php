<section class="index-sc5 sanpham-list">
	<div class="max-width-container">
		<div class="swiper-container slideSpHome">
			<div class="swiper-wrapper">
				@if(count($product_by_cate)>0)
				@foreach($product_by_cate as $product)
				<div class="swiper-slide">
					<div class="box-sp">
						<div class="box-sp-img"><a class="localstore" localstore="{{$product->product_id}}" href="{{route('article-detail',$product->slug)}}"><img src="{{asset('assets/product/sanpham1.webp')}}" alt=""></a>
							<div class="tag-thuongluong">{{$product->price}} {{$product->unit}}</div>
							<div class="box-icon"><a href="" class="fav" productid="{{$product->product_id}}" ><i class="ri-heart-line icons"></i></a><a href="" class="comp" productid="{{$product->product_id}}"><i class="ri-equalizer-line icons"></i></a></div>
							<div class="overlay"></div>
						</div>
						<div class="box-sp-text"> 
							<a class="localstore" localstore="{{$product->product_id}}" href="{{route('article-detail',$product->slug)}}">
								<h5 class="title-text lcl lcl-2">{{$product->title}}</h5>
							</a>
							<div class="location"> <span class="material-icons">location_on</span>
								<p class="lcl lcl-1" data-toggle="tooltip" data-placement="bottom" title="{{$product->district}}, {{$product->province}}">{{$product->district}}, {{$product->province}}</p>
							</div>
							<div class="mota-place">
								<div class="mota-place-1">
									<div class="mota-place-tt"><img src="{{asset('assets/icon/dientich.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{intval($product->depth)*intval($product->facades) }} m²">{{intval($product->depth)*intval($product->facades) }} m²</span></div>
									<div class="mota-place-tt"><img src="{{asset('assets/icon/icon-road@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Mặt phố - mặt đường</span></div>
									<div class="mota-place-tt"><img src="{{asset('assets/icon/rectangle-copy-2@3x.png')}}" alt=""><span data-toggle="tooltip" data-placement="bottom" title="{{$product->facades}}">{{$product->facades}} m</span></div>
								</div>
							</div>
							<div class="end-mota">
								<div class="mota-end-box">
									<div class="end-box-tt"><span class="material-icons icons-15">event_note</span><span>{{date('d/m/Y',strtotime($product->datetime_start))}}</span></div>
									<div class="end-box-tt"><span class="material-icons icons-15">visibility</span><span>{{$product->view}}</span></div>
									<div class="end-box-tt"><span class="material-icons icons-15 chat">chat</span><span class="chat">chat ngay</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				<div class="article-none"> <img src="{{asset('assets/san_pham/no-documents.png')}}" alt="">
					<p>Không có bài đăng nào</p>
				</div>
				@endif
				</div>
			</div>
		</div>
	</div>
</section>