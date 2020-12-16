@section('title','Quản lý thư tin tức')
<style>
    .custom-file-label::after {
        content: "Chọn tập tin " !important;
    }
</style>
<style>
    .select2-selection--single {
        height: 100% !important;
    }

    .selectRow {
        background-color: red;
        display: block;
        padding: 20px;
    }

    .select2-container {
        width: 200px;
        /* background-color:red; */
    }

    .customclass {
        background-color: blue;
        color: blue;
    }
</style>
@extends('admin.sidebar') @section('content') @section('breadcum') Quản lý thư
tin tức @endsection {!! Toastr::message() !!}

<meta name="csrf-token" content="{{ csrf_token() }}">

<form action="/admin/index/quan-ly-thu-tin-tuc/export" method="get">
    <button type="submit" class="btn btn-primary" style="background-color:#7174E9;color:white">Xuất file Excel</button>
</form>
<form action="{{ route('table.import') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="AP4B22Q0khG0XP9tMS42wkHnvilK53VBmwd4TjYv">
    {{ csrf_field() }}
    <div class="mt-4 form-group">
        <div class="col-md-12 custom-file ">
            <input type="file" class="custom-file-input" id="import_file" name="import_file" accept=".xlsx, .xls, .csv, .ods">
            <label class="custom-file-label" for="customFile">Chọn tập tin</label>
        </div>
        <button type="submit" class="mt-4 btn btn-primary" style="background-color:#7174E9;color:white">Nhập file Excel</button>
        <button type="button" class="mt-4 btn btn-primary " data-toggle="modal" data-target="#modelId">
            Gửi thư quảng cáo
        </button>
    </div>
</form>
<div class="container">
    <div class="row">
        <div class="col-md-4 form-group">

            <div class="modal fade" id="modelId" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Form gửi thư quảng cáo cho tất cả</h5>

                        </div>
                        <div class="modal-body">
                            <form action="/send-email" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Tiêu đề thư</label>
                                    <input type="text" class="form-control" name="subject" id="subject" aria-describedby="helpId" placeholder="">
                                    {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                </div>
                                <textarea type="textarea" name="contents" id="contents" class="form-control" rows="15" placeholder=""></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Gửi thư</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

                        </div>
                        <div class="modal-body">
                            <form action="/send-email" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Tiêu đề thư</label>
                                    <input type="text" class="form-control" name="subject" id="subject" aria-describedby="helpId" placeholder="">
                                    {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                </div>
                                <textarea type="textarea" name="contents" id="contents" class="form-control" rows="15" placeholder=""></textarea>
                                <br>
                                <button type="submit" class="btn button-color">Gửi thư</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

                            </form>

                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
                {{-- <a name="" id="" class="btn button-color" href="#" role="button">Gửi</a> --}}
            </div>
        </div>
    </div>
    {{-- form send email --}}
    <!-- Button trigger modal -->

    {{-- end form --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Thời gian đăng kí</th>
                        <th>Nơi đăng kí</th>
                        <th></th>
                    </tr>
                </thead>

                <tr>
                    @foreach ($newsletter as $newsletter)
                <tr>
                    <td>{{$newsletter->id}}</td>
                    <td>{{$newsletter->email}}</td>
                    <td>{{$newsletter->created_at}}</td>
                    <td>{{$newsletter->IP_Location}}</td>
                    {{-- button modal  --}}
                    <td>
                        <a href="" data-id="{{$newsletter->id }}" data-id_city="{{$newsletter->ID_City}} " data-email="{{$newsletter->email}}" class="btn btn-primary btn-sendmail-one">Gửi thư</a>
                    </td>
                    @endforeach

                </tr>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <div class="modal fade " id="modelId_one" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Gửi thư</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- form content --}}
                <form action="/guithu" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">

                            <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                            {{-- sản phẩm --}}
                            <div class="mt-4 input-group col-sm-12">
                                <select class="js-example-basic-multiple" id="productFilter" name="productFilter[]" multiple="multiple" style="width: 100%"></select>
                            </div>

                        </div>
                </form>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Gửi thư</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    @endsection