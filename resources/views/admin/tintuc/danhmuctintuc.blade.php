@extends('admin.sidebar')
@section('content')
<div class="container-fluid box-n-big">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <a name="" id="" class="btn button-delete" href="{{route('newsletter_deleteall')}}" role="button">Xoá tất cả danh
        mục</a>
    <form action="{{url('/admin/danh-muc-tin-tuc/them-moi')}}" method="post" enctype="multipart/form-data" id="myform">
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8 mt-4 form-group">
            <label for="">Nhập tiêu đề</label>
        <input type="text" class="form-control" name="category_name" id="category_name"  aria-describedby="helpId" placeholder="">
            <input type="hidden" class="form-control" name="slug2" id="slug2" aria-describedby="helpId" placeholder="">

            {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
          </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

    <div class="card-body">
        <div class="col-md-8 table-responsive">
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
                 <td>
                    <!-- Button trigger modal -->

                 <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#exampleModal{{$item->id}}" data-category_name="{{$item->category_name}}" data-id="{{$item->id}}">Open modal for {{$item->id}}</button>


                    <a href="" data-id="{{ $item->id }}" class="btn btn-danger btn-delete">Xoá</a></td>

                </td>
                {{-- inside modal --}}
            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId{{$item->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Sửa thông tin </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data" id="editForm">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                <input type="text" class="form-control" name="id" date-id="{{$item->value}}"value="{{$item->id}}">
                                <input type="text" class="form-control" name="catergory_name" id="id_edit" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary save_btn">Lưu</button>
                            </div>

                        </div>
                    </div>
                 @endforeach

                </tr>
                <tbody>

                </tbody>
            </table>
        </div>
</div>
</form>
<<<<<<< HEAD
@endsection
=======

</div>
@endsection


    <!-- Modal form to edit a form -->
   <!-- Button trigger modal -->


   <!-- Modal -->


>>>>>>> c13d67726b991973eebb9ad3e5356ea719df9c70
