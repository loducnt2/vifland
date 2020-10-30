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
    <h2>Danh sách danh mục</h2>

    <!-- table -->
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Mã</th>
          <th>Tên</th>
          <th>Ngôn ngữ</th>
          <th>Trạng thái</th>
          <th>Thứ tự</th>
          <th>Slug</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="myTable">
        @foreach($cates as $cate)
        <tr>
          <td>{{$cate->id}}</td>
          <td>{{$cate->name}}</td>
          <td>{{$cate->language}}</td>
          <td>{{$cate->status==1?'Đang hiện':'Đang ẩn'}}</td>
          <td>{{$cate->orders}}</td>
          <td>{{$cate->slug}}</td>
          <td>
            <a href="{{route('delete-cate',$cate->id)}}"> <button class="btn btn-danger">Xóa</button> </a>
            <a href="{{route('edit-cate',$cate->id)}}"> <button class="btn btn-info">Sửa</button> </a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    <!-- tạo dannh mục -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
      Tạo danh mục mới
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin danh mục</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form action="{{route('create-cate')}}" method="POST">
              {{csrf_field()}}

              <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục :</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Cấp cha</label>
                <select class="custom-select" name="parent" id="inputGroupSelect01">

                  <option value="">Chọn</option>}
                  @foreach($cate_level1 as $cate1)
                  <option value="{{$cate1->id}}">{{$cate1->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Ngôn ngữ</label>
                <select class="custom-select" name="lang" id="inputGroupSelect01">

                  <option value="">Chọn</option>}
                  @foreach($cate_level1 as $cate1)
                  <option value="{{$cate1->language}}">{{$cate1->language}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Ẩn hiện</label>
                <select class="custom-select" name="status" id="inputGroupSelect01">

                  <option value="0">Ẩn </option>
                  <option value="1">Hiện </option>

                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tạo mới</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- edit danh mục -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action=" {{route('edit-cate',$cate->id)}}">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tên danh mục :</label>
              <input type="text" class="form-control" name="name" value="{{$cate->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <?php
            if ($cate->parent_id != NULL) {
            ?>
              <div class="form-group">
                <label for="exampleInputPassword1">Cấp cha</label>
                <select class="custom-select" name="parent" id="inputGroupSelect01">
                  <option value="">Chọn</option>
                  @foreach($cate_level1 as $cate1)
                  <option value="{{$cate1->id}}" <?php if ($cate->parent_id == $cate1->id) {
                                                    echo 'selected';
                                                  } ?>>{{$cate1->name}}</option>
                  @endforeach
                </select>
              </div>
            <?php } ?>
            <div class="form-group">
              <label for="exampleInputPassword1">Ngôn ngữ</label>
              <select class="custom-select" name="lang" value="{{$cate->language}}" id="inputGroupSelect01">

                <option value="">Chọn</option>
                @foreach($cate_level1 as $cate1)
                <option value="{{$cate1->language}}">{{$cate1->language}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Ẩn hiện</label>
              <select class="custom-select" value="{{$cate->orders}}" name="status" id="inputGroupSelect01">

                <option value="">Chọn</option>

                <option value="0">Ẩn </option>
                <option value="1">Hiện </option>

              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{ route('update-cate',$cate->id) }}"><button type="button" class="btn btn-primary">Save changes</button></a>
        </div>
      </div>
    </div>
  </div>
  </div>


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

</body>
@endsection
</body>

</html>