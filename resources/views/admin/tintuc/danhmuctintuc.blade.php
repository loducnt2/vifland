@extends('admin.sidebar')
@section('content')
<div class="container-fluid box-n-big">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <a name="" id="" class="btn button-delete" href="{{route('newsletter_deleteall')}}" role="button">Xoá tất cả danh
        mục</a>
    <form action="{{url('/admin/danh-muc-tin-tuc/them-moi')}}" method="post" enctype="multipart/form-data" id="myform">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12 mt-4 form-group">
                <label for="">Nhập tiêu đề</label>
                <div class="wrap-input-b">
                    <input type="text" class="form-control" name="category_name" id="category_name"
                        aria-describedby="helpId" placeholder="">
                    <button type="submit" class="btn button-color">Thêm Danh Mục</button>
                </div>

                <input type="hidden" class="form-control" name="slug2" id="slug2" aria-describedby="helpId"
                    placeholder="">

                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
            </div>
        </div>
        <div class="table-style-1">
            <table class=" table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Slug</th>

                        <th>Tên danh mục</th>
                        <th>Tình trạng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>


                <tr>
                    @foreach ($news_cate as $item)
                <tr id="row_{{$item->id}}">
                    <td>{{$item->id}}</td>

                    <td>{{$item->slug}}</td>
                    {{-- <td>{{$user->birth_day}}</td> --}}
                    <td>{{$item->category_name}}</td>
                    <td>{{$item->status}}</td>
                    <td><a href="/detelete" data-id="{{ $item->id }}" class="btn btn-danger delete">Xoá</a></td>

                    </td>
                    @endforeach

                </tr>
                <tbody>

                </tbody>
            </table>
        </div>
</div>
</form>
@endsection