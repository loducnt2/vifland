 @extends('admin.sidebar')
 @section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <div class="container">
   <h2>Banner</h2>
   <button class="btn btn-primary mb-3 " id="btn-create-banner">Thêm banner</button>
   

  
   <div class="form-create-banner d-none">
     <form action="{{route('create-banner')}}" method="POST" enctype="multipart/form-data">
     {{csrf_field()}}
        <!-- <div class="form-group">
          <label for="">Tên Banner</label>
          <input type="text" name="name" class="form-control">
        </div> -->
        <div class="form-group">
          <label for="">Hình</label>
          <input type="file" name="img" class="form-control-file">
        </div>
        <div class="form-group">
          <label for="">Status</label>
          <select name="status" id="" class="form-control">
            <option value="0">Ẩn banner</option>
            <option value="1">Hiện banner</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Position</label>
          <input type="number" name="position" class="form-control">
        </div>
        <div>
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
     </form>
   </div>
   <div class="table-list-banner">
   <input class="form-control" id="myInput" type="text" placeholder="Search..">
   <br>
     <table class="table table-bordered table-striped">
       <thead>
         <tr>
           <th>Id</th>
           <th>name</th>
           <th>Ảnh</th>
           <th>Position</th>
           <th>status</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody id="myTable">
         @foreach($banners as $banner)
         <tr>
           <td>{{$banner->id}}</td>
           <td>{{$banner->name}}</td>
           <td> <img class="" style="width:200px" src="{{asset('assets/banner')}}/{{$banner->name}}" alt=""></td>
           <td>{{$banner->position}}</td>
           <td>{{$banner->status}}</td>
           <td>
             <a href="{{route('edit-banner',$banner->id)}}">sửa</a>
             <a href="{{route('del-banner',$banner->id)}}">xóa</a>
            </td>
         </tr>
         @endforeach
       </tbody>
     </table>
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

     $("#btn-create-banner").click(function(){
       $(".form-create-banner,.table-list-banner,#btn-create-banner").toggleClass("d-none");
     });
   });
 </script>
 @endsection