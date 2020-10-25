<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sản phẩm</title>
</head>
<body>

    {{-- @extends('layouts.master') --}}
    @extends('admin.sidebar')
    @section('content')
    <div class="container">
    <h2>Danh sách tin tức</h2>

    <!-- table -->
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Mã</th>
          <th>Tiêu đề</th>
          <th>slug</th>
          <th>Ngôn ngữ</th>
          <th>Nội dung</th>
          <th>summary</th>
          <th>daypost</th>
          <th>hình</th>
          <th>tag</th>
          <th>trạng thái</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="myTable">
        @foreach($news as $new)
        <tr>
          <td>{{$new->id}}</td>
          <td>{{$new->title}}</td>
          <td>{{$new->slug}}</td>
          <td>{{$new->language}}</td>
          <td>{{$new->content}}</td>
          <td>{{$new->summary}}</td>
          <td>{{$new->datepost}}</td>
          <td><img class="img-tintuc" src="{{$new->img}}" alt=""></td>
          <td>{{$new->tag}}</td>
          <td>{{$new->status==1?'Đang hiện':'Đang ẩn'}}</td>
          <td>
            <a href="{{route('edit-new',$new->id)}}"> <button class="btn btn-info">Xem chi tiết</button> </a>
            <a href="{{route('delete-new',$new->id)}}"> <button class="btn btn-danger">Xóa tin</button> </a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    @endsection
</body>
</html>
