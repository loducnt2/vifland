@if(count($productss)>0)
@foreach($productss as $product)
@php $acreage = intval($product->depth)*intval($product->facades); @endphp
<div class="col-lg-3 col-md-4 col-sm-6 col-sx-12 vass">
    <div class="box-sp">
        <div class="box-sp-img"><a class="localstore" localstore="{{$product->product_id}}"
                href="{{route('article-detail',$product->slug)}}"><img class="lazyload"
                    data-src="{{asset('assets/product/detail/')}}/{{$product->thumbnail}}" alt=""></a>
            <div class="tag-thuongluong">
                {{ $product->price == 0?$product->price="":$product->price}}
                {{$product->unit}}</div>
            <div class="box-icon">
                <i class="fav ri-heart-line icons" productid="{{$product->product_id}}"></i>
                <i class="ri-equalizer-line icons comp" productid="{{$product->product_id}}"></i>
            </div>
            <div class="overlay"></div>
            <div class="vip">
                <!-- {{$product->type}} -->

                @if ($product->type != 4)
                <img class="lazyload" data-src="{{asset('assets/icon/vip'.$product->type.'.svg')}}" alt="">
                @else
                @endif
            </div>
        </div>
        <div class="box-sp-text">
            <a class="localstore" localstore="{{$product->product_id}}"
                href="{{route('article-detail',$product->slug)}}">
                @if($product->type == 1)
                <h5 class="title-text lcl lcl-2 vip1">{{$product->title}}</h5>
                @elseif($product->type == 2)
                <h5 class="title-text lcl lcl-2 vip2">{{$product->title}}</h5>
                @elseif($product->type == 3)
                <h5 class="title-text lcl lcl-2 vip3">{{$product->title}}</h5>
                @else
                <h5 class="title-text lcl lcl-2">{{$product->title}}</h5>
                @endif
            </a>
            <div class="location"> <span class="material-icons">location_on</span>
                <p class="lcl lcl-1" data-toggle="tooltip" data-placement="bottom"
                    title="{{$product->district}}, {{$product->province}}">
                    {{$product->district}}, {{$product->province}}</p>
            </div>
            <div class="mota-place">
                <div class="mota-place-1">
                    <div class="mota-place-tt"><img class="lazyload" data-src="{{asset('assets/icon/dientich.png')}}"
                            alt=""><span data-toggle="tooltip" data-placement="bottom"
                            title="{{$acreage == 0 ? '' : $acreage}} m²">{{$acreage == 0 ? "" : $acreage}}
                            m²</span></div>
                    <div class="mota-place-tt"><img class="lazyload"
                            data-src="{{asset('assets/icon/icon-road@3x.png')}}" alt=""><span data-toggle="tooltip"
                            data-placement="bottom" title="Tooltip on bottom">Mặt phố - mặt
                            đường</span></div>
                    <div class="mota-place-tt"><img class="lazyload"
                            data-src="{{asset('assets/icon/rectangle-copy-2@3x.png')}}" alt=""><span
                            data-toggle="tooltip" data-placement="bottom"
                            title="{{$product->facades}}">{{$product->facades}} m</span>
                    </div>
                </div>
                <div class="mota-place-1">
                    <div class="mota-place-tt"><img class="lazyload"
                            data-src="{{asset('assets/icon/rectangle-2@3x.png')}}" alt=""><span data-toggle="tooltip"
                            data-placement="bottom"
                            title="{{$product->floors}} Tầng">{{$product->floors>0?$product->floors.' '.'Tầng':""}}
                            Tầng</span></div>
                    <div class="mota-place-tt"><img class="lazyload"
                            data-src="{{asset('assets/icon/rectangle-3@3x.png')}}" alt=""><span data-toggle="tooltip"
                            data-placement="bottom"
                            title="{{$product->bedroom}} Phòng ngủ">{{$product->bedroom > 0 ? $product->bedroom.' '.'Phòng ngủ':""}}</span>
                    </div>
                    <div class="mota-place-tt"><span class="material-icons icons-15">group</span><span
                            data-toggle="tooltip" data-placement="bottom" title=""
                            data-original-title="Tooltip on bottom"></span></div>
                </div>
            </div>
            <div class="end-mota">
                <div class="mota-end-box">
                    <div class="end-box-tt"><span
                            class="material-icons icons-15">event_note</span><span>{{date('d/m/Y',strtotime($product->datetime_start))}}</span>
                    </div>
                    <div class="end-box-tt"><span
                            class="material-icons icons-15">visibility</span><span>{{$product->view}}</span>
                    </div>
                    <div class="end-box-tt"><a href="{{route('article-detail',$product->slug)}}"><span
                                class="material-icons icons-15 chat">input</span><span class="chat">Xem chi
                                tiết</span></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="article-none"> <img class="lazyload" data-src="{{asset('assets/san_pham/no-documents.png')}}" alt="">
    <p>Không có bài đăng nào</p>
</div>
@endif
<div class="col-12">
    <div class="paginationSP">
        <?php echo $productss->render(); ?>
    </div>
</div>