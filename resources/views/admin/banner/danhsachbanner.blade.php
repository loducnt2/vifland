 @extends('admin.sidebar')
 @section('title','Quản lý banner')
 @section('breadcum')
 Quản lý banner
 @endsection
 @section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <style>
        span.error {
       color:red;
       font-size:12px;
    /* margin-left: 6px; */
    /* height:17px; */
    /* background: url('http://i45.tinypic.com/f9ifz6.png') no-repeat left center; */
}
label.error {
    font-weight: bold;
    color:red;
    font-size:14px;
}
 </style>
 <div class="container-fluid box-n-big">
     <h2>Banner</h2>
     <button class="btn button-color mb-3 " id="btn-create-banner">Thêm banner</button>



     <div class="form-create-banner d-none">
         <form id="form-banner" action="{{route('create-banner')}}" method="POST" enctype="multipart/form-data">
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
                 <input type="number" name="position" value="0" class="form-control">
             </div>
             <div>
                 <button type="submit" class="btn button-color">Thêm Banner</button>
             </div>
         </form>
         <script>
             $(document).ready(function(){
                $("#form-banner").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "img": {
                required: true,

            },
        },
        messages: {
            "img": {
                required: "Bắt buộc nhập hình",

            },
           

        }
    });
             })
         </script>
     </div>
     <div class="table-list-banner">
         <input class="form-control" id="myInput" type="text" placeholder="Search..">
         <br>
         <table class="table table-bordered table-striped">
             <thead>
                 <tr>
                     <th>Id</th>
                     <th>Tên hình ảnh</th>
                     <th>Ảnh</th>
                     <th>Vị trí ưu tiên</th>
                     <th>Ẩn/hiện</th>
                     <th>Hành động</th>
                 </tr>
             </thead>
             <tbody id="myTable">
                 @foreach($banners as $banner)
                 <tr>
                     <td>{{$banner->id}}</td>
                     <td>{{$banner->name}}</td>
                     <td> <img class="lazyload" style="width:200px"
                             data-src="{{asset('assets/banner')}}/{{$banner->name}}" alt="">
                     </td>
                     <td>{{$banner->position}}</td>
                     <td>{{$banner->status==0?"Đang ẩn":"Đang hiện"}}</td>
                     <td>
                         <a href="{{route('edit-banner',$banner->id)}}"><button class="btn btn-primary">sửa</button> </a>
                         <a href="{{route('del-banner',$banner->id)}}"><button class="btn btn-danger">xóa</button> </a>
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

    $("#btn-create-banner").click(function() {
        $(".form-create-banner,.table-list-banner,#btn-create-banner").toggleClass("d-none");
    });
});
 </script>
 @endsection