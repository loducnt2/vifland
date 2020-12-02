@extends('admin.sidebar')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .error{
        width: 200px;
        /* background-color:red; */
        /* float:left; */
        /* margin-top:80px; */

        /* top:100px; */
        width:600px;
        color:tomato;
        /* font-weight: bold; */
        font-size:13px;
        font-weight: bold;
    }
</style>
<form action="{{url('/admin/danh-muc-tin-tuc/them-moi')}}" method="post" enctype="multipart/form-data" id="myform">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8 mt-4 form-group">
            <label for="">Nhập tiêu đề</label>
            <div class="error"></div>
            <input type="text" class="form-control" name="category_name" id="category_name"
                aria-describedby="helpId" placeholder="">
                <input type="text" class="form-control" name="category_name_hidden" hidden aria-describedby="helpId" placeholder="">

            <input type="hidden" class="form-control" name="slug2" id="slug2" aria-describedby="helpId"
                placeholder="">
                <br>
                <a name="" id="" class="btn button-delete" href="{{route('newsletter_deleteall')}}" role="button">Xoá tất cả danh
                    mục</a>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm nhanh..">
{{-- form input text --}}
<table class=" table table-bordered" id="myTable" width="100%" cellspacing="0">


    <thead class="thead-dark">

        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>Tên danh mục</th>
            <th>Tình trạng</th>
            <th>Thực thi</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($news_cate as $item)
        <tr>
            <td>{{$item->id}}</td>
             <td >{{$item->slug}}</td>
            <td>{{$item->category_name}}</td>
            <td >{{$item->status}}</td>
            <td> <a href="" data-id="{{ $item->id }}" class="btn btn-danger btn-delete">Xoá</a>
             <a href="" data-id="{{ $item->id }}" data-category_name={{$item->category_name}} class="btn btn-danger btn-edit">Sửa</a> </td>
            </td>
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
                <input type="text" class="form-control" name="category_name" aria-describedby="helpId" placeholder="">

                <input type="text" class="form-control" name="category_id" hidden aria-describedby="helpId" placeholder="">

            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-save" >Save</button>
            </div>
        </div>
    </div>
</div>
