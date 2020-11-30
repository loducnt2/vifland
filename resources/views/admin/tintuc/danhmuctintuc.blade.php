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
                <input type="text" class="form-control" name="category_name" id="category_name"
                    aria-describedby="helpId" placeholder="">
                <input type="hidden" class="form-control" name="slug2" id="slug2" aria-describedby="helpId"
                    placeholder="">

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

                            <th>Hành động</th>
                            <th></th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>


                    <tr>
                        @foreach ($news_cate as $item)
                    <tr id="row_{{$item->id}}">
                        <td>{{$item->id}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->category_name}}</td>
                        {{-- <td>{{$item->status}}</td> --}}

                        </button>
                        <td> <a href="" data-id="{{ $item->id }}" class="btn btn-danger btn-delete">Xoá</a></td>
                        </td>
                        <td> <a href="" data-id="{{ $item->id }}" data-category_name={{$item->category_name}} class="btn btn-danger btn-edit">Sửa</a></td>
                        </td>

                        @endforeach

    </form>
</div>

</div>
</div>
</tr>
<tbody>

</tbody>
</table>
</div>
</div>

</form>
@endsection
<!-- Button trigger modal -->


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
                <div class="form-group">
                  {{-- <label for=""></label> --}}
                <input type="text" class="form-control" name="category_name" data-category_name="{{$item->category_name}}" aria-describedby="helpId" placeholder="">
                ID
                <input type="text" class="form-control" name="category_id" hidden data-id="{{$item->category_id}}" aria-describedby="helpId" placeholder="">

            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-save" id="{{$item->id}}" data-id="{{$item->id}}">Save</button>
            </div>
        </div>
    </div>
</div>
