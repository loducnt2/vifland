@extends('admin.sidebar')
 @section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <div class="container">
   <h2>Update Banner</h2>
   
   

  
   <div class="form-create-banner">
     <form action="{{route('update-banner',$banner->id)}}" method="POST" enctype="multipart/form-data">
     {{csrf_field()}}
     <div class="">
          <label for="">banner cũ</label>
          <div>
              <img  class="img-old" src="{{asset('assets/banner')}}/{{$banner->name}}" alt="">
          </div>
          
        </div>
        <div class="form-group">
          <label for="">banner mới</label>
          <input type="file"  name="img" class="form-control-file">
        </div>
        <div class="form-group">
          <label for="">Status</label>
          <select value="{{$banner->status}}" name="status" id="" class="form-control">
            <option value="0">Ẩn banner</option>
            <option value="1">Hiện banner</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Position</label>
          <input type="number" value="{{$banner->position}}" name="position" class="form-control">
        </div>
        <div>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
     </form>
   </div>
 </div>
 <style>
     .img-old{
         width: 300px;
         height: 200px;

     }
 </style>
 @endsection