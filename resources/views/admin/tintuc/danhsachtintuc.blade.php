<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <style>
        .disabled {
            color: gray !important;
        }
    </style>

    @extends('admin.sidebar')
    @section('title','Danh sách tin tức')
    @section('breadcum')


    Quản lý tin tức > Danh sách tin tức
    @endsection
    @section('content')

    <div class="container-fluid box-n-big">


        <h2 class="section-title-big">Danh sách tin tức</h2>

        <!-- table -->
        <a name="" id="" class="btn btn-primary" href="{{route('news_deleteall')}}" role="button">Xoá tất cả tin tức</a>


        <div class="table-list-news_category">
            <input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm nhanh..">
            <br>
            <table class="table table-bordered table-striped thead-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên tiêu đề</th>
                        <th>Slug</th>
                        <th>Tình trạng</th>
                        <th>Thực thi</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach($news as $item)
                    @if ($item->status == '1')
                    <?php $class = "enabled"; ?>
                    @else
                    <?php $class = "disabled"; ?>
                    @endif
                    <tr id="table-{{$item->id}}" class="{{$class}}">

                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>

                        <td><a href="/tin-tuc/{{$item->slug}}">{{$item->slug}}</a></td>
                        <td>
                            <p id="status-{{$item->id}}">
                                @if ($item->status == '1')
                                Hiện

                                @else Ẩn
                                @endif
                            </p>
                        </td>
                        <td>
                            <a href="" data-id="{{ $item->id }}" data-title="{{$item->title}} " data-content="{{$item->content}}" class="btn btn-danger btn-news-edit">Sửa</a>
                            <a href="" data-id="{{ $item->id }}" class="btn btn-danger btn_news-delete">Xoá</a>
                            </a>
                            <input data-id="{{$item->id}}" data-style="ios" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-style="ios" data-on="Hiện" data-off="Ẩn" {{ $item->status ? 'checked' : '' }} class="btn-news">

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-content" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="text" class="form-control" name="title" aria-describedby="helpId" placeholder="">
                        {{-- id --}}
                        <input type="text" class="form-control" name="id" aria-describedby="helpId" placeholder="" hidden>
                        <div class="form-group">
                            {{-- <label for=""></label> --}}
                            {{-- contents = ckeditors --}}
                            <textarea class="mt-4 form-control" name="contents" id="contents" rows="3" name="content"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary btn-news_save" id="">Sửa</button>


                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <input type="text" class="form-control" name="title" aria-describedby="helpId" placeholder="">
                                        {{-- id --}}
                                        <input type="text" class="form-control" name="id" aria-describedby="helpId" placeholder="" hidden>
                                        <div class="form-group">
                                            {{-- <label for=""></label> --}}
                                            {{-- contents = ckeditors --}}
                                            <textarea class="mt-4 form-control" name="contents" id="contents" rows="3" name="content"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary btn-news_save" id="">Sửa</button>

                                    </div>
                                </div>
                            </div>
                        </div>


</html>
<!-- Button trigger modal -->

@endsection

<!-- Button trigger modal -->
