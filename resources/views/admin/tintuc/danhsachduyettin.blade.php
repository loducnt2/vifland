@extends('admin.sidebar')
    @section('content')
    <div class="container">
    <h2>Danh sách tin </h2>

    <!-- table -->
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Mã post</th>
          <th>Mã tin</th>
          <th>Tiêu đề</th>
          <th>trạng thái</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="myTable">
        @foreach($news as $new)
        <tr>
          <td>{{$new->post_id}}</td>
          <td>{{$new->product_id}}</td>
          <td>{{$new->product_title}}</td>
          <td style="width:15%"> <button class="btn {{$new->status == 1 ? 'btn-success':'btn-warning'}}">{{$new->status == 1 ? 'Đã duyệt':'Chờ duyệt'}}</button></td>
          <td style="width:30%">
          <a href="{{route('show-tintuc',$new->product_id)}}"><button class="btn btn-primary"> Detail</button></a>
          @if($new->status == 1)
          <a href="{{route('del-post',$new->product_id)}}"><button class="btn btn-danger"> Xóa </button></a>
          @else
           <a href="{{route('update-post',$new->post_id)}}"> <button class="btn btn-success"> Duyệt </button> </a>
           <a href="{{route('cancel-post',$new->product_id)}}"><button class="btn btn-danger"> Hủy </button></a>
          @endif
         
           
           
            
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    {{ $news->links() }}
   
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
    <style>
      
      th,tr{
        margin: 0 auto;
        text-align: center;
      }
    </style>
    @endsection