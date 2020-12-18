@extends('.pages.user.slidebar')
@section('title','Tin hết hạn')
@section('headerStyles')
@section('content_child')
<section class="quanlytindang">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="active nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
            aria-controls="nav-profile" aria-selected="false">Tin hết hạn</a>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            @if(count($product_expire) >0 )
            <div class="box-content-table">
                <table>
                    <thead>
                        <tr>
                            <th class="text-secondary text-left">* Tin sẽ tự động xóa sau 7 ngày</th>
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
                                    <div class="col-4">
                                        <div class="img"><a href="{{route('article-detail',$product->slug)}}"><img
                                                    class="lazyload"
                                                    onerror="this.src='{{asset('assets/product/detail/')}}/logo.png' "
                                                    data-src="{{asset('assets/product/detail/')}}/{{$product->thumbnail}}"
                                                    alt=""></a>
                                            @if ($product->type == 4)
                                            @else
                                            <img class="iconVip lazyload"
                                                data-src="{{asset('assets/icon/vip'.$product->type.'.svg')}}" alt="">
                                            @endif
                                            <div class="tag">
                                                {{ $product->price != 0 | $product->price != NULL ? round($product->price,2) : ''}}
                                                {{$product->unit != NULL?$product->unit:'Thương lượng'}}</div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="text">
                                            <a href="{{route('article-detail',$product->slug)}}">
                                                <p class="t-1">{{$product->title}}</p>
                                            </a>
                                            <div class="t-2"><span class="material-icons">location_on</span>
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
                                            <div class="t-4"><span class="material-icons">visibility</span>
                                                <p>{{$product->view}} lượt xem</p>
                                            </div>
                                            <div class="t-4">
                                                <p class="text-danger">{{$product->status==2?"Tin không được duyệt":""}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $product->price == 0 | $product->price == NULL ?'':round($product->price,2)}}
                                {{$product->unit != NULL?$product->unit:'Thương lượng'}}</td>
                            <td>{{$product->facades != NULL ? round($product->facades,2) : ''}}</td>
                            <td>{{$product->depth !=NULL ? round($product->depth,2) : ''}}</td>
                            <td>
                                <a href="{{route('delete-article',$product->product_id)}}"
                                    class="text-danger" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a><br><br>
                                @if( $product->status!=2 )
                                <a href="{{route('add-date-form',$product->product_id)}}" class="text-primary"> Gia
                                    hạn</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="article-none"> <img class="lazyload" data-src="{{asset('assets/san_pham/no-documents.png')}}"
                    alt="">
                <p>Không có bài đăng nào</p>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
@section('footerScripts')

@endsection