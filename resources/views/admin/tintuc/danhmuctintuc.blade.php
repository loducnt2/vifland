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
                 <td>{{$item->category_name}}</td>
                 <td>{{$item->status}}</td>
                 <td>
                 <a href="" data-id="{{ $item->id }}" data-category_name="{{$item->category_name}}" class="btn btn-danger btn-edit">Sửa</a></td>

                 </td>

                </button>
                   <td> <a href="" data-id="{{ $item->id }}" class="btn btn-danger btn-delete">Xoá</a></td>
                </td>

                 @endforeach
                 <div class="modal fade" id="modal-edit-form" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="userCrudModal"></h4>
                          </div>
                          <form id="userForm" name="userForm" class="form-horizontal">
                            <div class="modal-body">
                                {{-- <input type="hidden" name="user_id" id="user_id"> --}}
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Category_Name</label>
                                  <div class="col-sm-12">
                                  <input type="text" class="form-control" data-category_name="{{$item->category_name}}" id="category_name" name="category_name">

                                    </div>
                                </div>

                                <div class="form-group">
                                <label class="col-sm-2 control-label">ID</label>
                                  <div class="col-sm-12">
                                  <input type="text" class="form-control" data-id = "{{$item->id}}"id="category_id" name="category_id" disabled>

                                      </p>
                                      {{-- <input type="text" class="form-control" id="category_name" name="category_name"> --}}
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="create">

                                </button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                              </div>

                            </div>
                        </div>
                </tr>
                <tbody>

                </tbody>
            </table>
        </div>
</div>

@endsection
