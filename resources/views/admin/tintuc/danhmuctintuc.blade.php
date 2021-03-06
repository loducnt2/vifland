@extends('admin.sidebar')
@section('title','Danh mục tin tức')
@section('breadcum')
Quản lý tin tức > Danh mục tin tức
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
.error {
    width: 200px;
    /* background-color:red; */
    /* float:left; */
    /* margin-top:80px; */

    /* top:100px; */
    width: 600px;
    color: tomato;
    /* font-weight: bold; */
    font-size: 13px;
    font-weight: bold;
}
.disabled{
        background-color: #F1F1F1 !important;
        color:gray;
        font-size:14px;
    }
    .enabled{
        background-color: #ffffff !important;
        color:black;
        font-size:14px;
    }
.form-group-flex {
    display: flex;
    align-items: center;

}

.form-group-flex button {
    flex: 0 0 136px;
}
</style>
<form action="{{url('/admin/danh-muc-tin-tuc/them-moi')}}" method="post" enctype="multipart/form-data" id="category_form">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 mt-4 form-group">
            <label for="">Nhập tiêu đề</label>
            <div class="error"></div>
            <div class="form-group-flex">
                <input type="text" class="form-control" name="category_name" id="category_name"
                    aria-describedby="helpId" placeholder="">
                <button type="submit" class="btn btn-primary">Tạo danh mục</button>
            </div>
            <input type="text" class="form-control" name="category_name_hidden" hidden aria-describedby="helpId"
                placeholder="">

            <input type="hidden" class="form-control" name="slug2" id="slug2" aria-describedby="helpId" placeholder="">

            <br>
            <a name="" id="" class="btn button-delete" href="{{route('newsletter_deleteall')}}" role="button">Xoá tất cả
                danh
                mục</a>
        </div>
    </div>
</form>
<input class="form-control mb-4" id="myInput" type="text" placeholder="Tìm kiếm nhanh..">
{{-- form input text --}}
<table class=" table table-bordered" id="myTable" width="100%" cellspacing="0">


    <thead class="thead-dark">

        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>Tên danh mục</th>
            <th>Tình trạng</th>
            <th>Thực thi</th>
            <th></th>

        </tr>
    </thead>
    <tbody id="myTable" >
        @foreach ($news_cate as $item)
        @if ($item->status == '1')
                   <?php $class="enabled" ?>
                @else
                    <?php $class="disabled"?>
                @endif
        <tr class="{{$class}} " id="newscategory-{{$item->id}}">
            <td>{{$item->id}}</td>
            <td><a href="/tin-tuc/danh-muc/{{$item->slug}}">{{$item->slug}}</a></td>
            <td>{{$item->category_name}}</td>
           <td> <p id="status-{{$item->id}}">
                @if ($item->status == '1')
                   Hiện
                @else
                    Ẩn
                @endif
                </p>
            </td>
            <td>
                <input data-id="{{$item->id}}"  class="danhmuc" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Hiện" data-off="Ẩn" {{ $item->status ? 'checked' : '' }}>

            </td>
            <td>
                <a href="" data-id="{{ $item->id }}" data-category_name="{{$item->category_name}}" class="btn btn-danger btn-delete">Xoá</a>
                    <a href="" data-id="{{$item->id}}" data-category_name="{{$item->category_name}}" class="btn btn-danger btn-edit">Sửa</a>

        </tr>
        @endforeach


    </tbody>
</table>
@endsection
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông tin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{-- <label for=""></label> --}}
                    <div class="error"></div>
                    <input type="text" class="form-control" name="category_name" aria-describedby="helpId"
                        placeholder="">
                        {{-- <input type="text" class="form-control" name="content" id="" aria-describedby="helpId" placeholder=""> --}}

                    <input type="text" class="form-control" name="category_id" hidden aria-describedby="helpId"
                        placeholder="">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-save">Sửa modal</button>
            </div>
        </div>
    </div>
</div>
