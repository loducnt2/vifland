@extends('admin.sidebar')
  @section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <div class="container">
      <h2>Update thông báo</h2>
      <form action="{{route('update-noti',$noti->id)}}" method="post">
      @csrf
          <div class="form-group">
              <label for="">id</label>
              <input type="text"  class="form-control"  value="{{$noti->id}}" disabled>
          </div>
          <div class="form-group">
              <label for="">name</label>
              <input type="text"  class="form-control" name="name" value="{{$noti->name}}" >
          </div>
          <div class="form-group">
              <label for="">content</label>
              <input type="text" name="content"  class="form-control" value="{{$noti->content}}" >
          </div>
          <div class="form-group">
              <label for="">Ngày hết hạn</label>
              <input class="form-control" value="{{$noti->due_date}}" type="date" name="due_date">
          </div>
          <div class="form-group">
              <label for="">Trạng thái</label>
              <select  class="form-control" name="status" value="{{$noti->status}}" id="">
                  <option value="0">Ẩn thông báo</option>
                  <option value="1">Hiện thông báo</option>
              </select>
          </div>
          <div class="form-group">
              <label for="">Ngôn ngữ</label>
              <select  class="form-control" name="lang" value="{{$noti->language}}" id="">
                  <option value="vn">Việt Nam</option>
                  <option value="en">English</option>
              </select>
          </div>
          <div class="form-group">
             <button type="submit" class="btn btn-primary">Cập nhật</button>
          </div>
      </form>
  </div>
@endsection
