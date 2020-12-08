@extends('.pages.user.slidebar')
@section('title','Tin hiện tại')
@section('headerStyles')
@section('content_child')
<div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
        aria-controls="nav-profile" aria-selected="false">Tin hiện tại</a>
</div>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        @if(count($product_posted) >0 )
        <div class="box-content-table">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Đơn giá </th>
                        <th>Mặt tiền </th>
                        <th>Chiều sâu </th>
                        <th>Nhu cầu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $product_posted as $product)
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    <div class="img"><a href="{{route('article-detail',$product->slug)}}"><img
                                        onerror="this.src='{{asset('assets/product/detail/')}}/logo.png' "
                                                src="{{asset('assets/product/detail/')}}/{{$product->thumbnail}}"
                                                alt=""></a>
                                        @if ($product->type == 4)
                                        @else
                                        <img class="iconVip" src="{{asset('assets/icon/vip'.$product->type.'.svg')}}"
                                            alt="">
                                        @endif
                                        <div class="tag">{{ $product->price != 0 | $product->price != NULL ? round($product->price,2) : ''}} {{$product->unit != NULL?$product->unit:'Thương lượng'}}</div>
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
                                    </div>
                                </div>
                            </div>
                            <div class="edit-post-sub">
                                <div class="edit">
                                    <a href="{{route('edit-article',$product->product_id)}}" data-toggle="tooltip"
                                        data-placement="bottom" title="Chỉnh sửa bài đăng">
                                        <span class="material-icons">
                                            create
                                        </span>
                                        Sửa
                                    </a>
                                </div>
                                <div class="delete">
                                    <a href="{{route('delete-article',$product->product_id)}}" data-toggle="tooltip"
                                        data-placement="bottom" title="Xóa bài đăng">
                                        <span class="material-icons">
                                            delete_forever
                                        </span>
                                        Xóa
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>{{ $product->price == 0 | $product->price == NULL ?'':round($product->price,2)}} {{$product->unit != NULL?$product->unit:'Thương lượng'}}</td>
                        <td>{{$product->facades != NULL ? round($product->facades,2) : ''}} m</td>
                        <td>{{$product->depth !=NULL ? round($product->depth,2) : ''}} m</td>
                        <td>
                            <!-- <a href="{{route('delete-article',$product->product_id)}}" class="text-danger">Xóa</a><br><br>
                            <a href="{{route('edit-article',$product->product_id)}}" class="text-primary">Chỉnh sửa</a> -->
                            @foreach($cate as $cat) {{$cat->id == $product->cate_id? $cat->name:""}} @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="article-none"> <img src="{{asset('assets/san_pham/no-documents.png')}}" alt="">
            <p>Không có bài đăng nào</p>
        </div>
        @endif
    </div>
</div>
@endsection
@section('footerScripts')

@endsection