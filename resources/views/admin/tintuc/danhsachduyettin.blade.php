@extends('admin.sidebar')
    @section('content')
    <div class="container">
    <h2>Danh sách tin chưa duyệt</h2>

    <!-- table -->
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Mã</th>
          <th>Tiêu đề</th>
          <th>trạng thái</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="myTable">
        @foreach($news as $new)
        <tr>
          <td>{{$new->post_id}}</td>
          <td>{{$new->product_title}}</td>
          <td>{{$new->status == 1 ? 'Đang hiện':'Chờ duyệt'}}</td>
          <td>
            <a href="{{route('show-tintuc',$new->product_id)}}">Detail</a>
            <a href="{{route('update-post',$new->post_id)}}">Duyệt</a>
          </td>
          
        </tr>
        @endforeach

      </tbody>
    </table>
   
    </div>
    @endsection