<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý tin tức</title>
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
          <th>Cấp cha</th>
          <th>Tên</th>
          <th>Ngôn ngữ</th>
          <th>Trạng thái</th>
          <th>Thứ tự</th>
          <th>Slug</th>
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
          <td>{{$new->summary}}</td>
          <td>{{$new->datepost}}</td>
          <td>{{$new->view}}</td>
          <td><img class="img-tintuc" src="{{$new->img}}" alt=""></td>
          <td>{{$new->tag}}</td>
          <td>{{$new->status==1?'Đang hiện':'Đang ẩn'}}</td>
          <td>
            <a href="{{route('edit-new',$new->id)}}"> <button class="btn btn-info">Duyệt tin</button> </a>
            <a href="{{route('delete-new',$new->id)}}"> <button class="btn btn-danger">Xóa tin</button> </a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
 @endsection
</body>
</html>
