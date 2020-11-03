<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @extends('admin.sidebar')
    <title>Danh mục tin tức</title>
</head>
<body>
    {{-- @extends('layouts.master') --}}
    @section('content')
    <div class="container">

        <h2>Danh mục tin tức</h2>
        <style>
            /* .btn{margin-top:40px;} */
          #myInput{
              margin-top:20px;
          }
          .form-input{
              margin-top:20px;
          }
          .add-cate{
              margin-top:20px;
          }
          table{margin-top:20px;}
        </style>
    <!-- table -->
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
     Thêm danh mục tin tức
   </button>

    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Thêm danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
               <form id="myform">
                        {{ csrf_field() }}
                <div class="form-group">
                  {{-- <label for=""></label> --}}
                  <input type="text" class="form-control" id="category_name" onkeyup="ChangeToSlug();" placeholder="" value="" name="category_name">
                  <small class="text">
                    <input type="hidden"
                    class="form-control" name="slug" id="slug2" aria-describedby="helpId" placeholder="" readonly>
                    <div id ="slug" name="slug">
                    </div>
                  </small>
                </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                   <button type="submit" class="btn btn-primary">Thực thi</button>
               </div>
            </form>
           </div>
       </div>

   </div>

    <br>
    <table class="table table-bordered table-striped" id="myTable">
      <thead>
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Slug</th>
            <th>Hiện ẩn</th>
            <th>Hành động</th>

        </tr>
      </thead>
      <tbody id="myTable2">
        @foreach($newsCategory as $category)
        <tr>

        <td>{{$category->id}}</td>
        <td>{{$category->category_name}}</td>
        <td>{{$category->slug}}</td>
        <td>{{$category->status}}</td>
        <td><a name="" id="" data-toggle="modal" data-target="#bootstrapmodal" class="btn btn-primary">
        Xoá
        </a></td>


</tr>
        @endforeach

      </tbody>
    </table>
    @endsection

</body>

<script language="javascript">
    function ChangeToSlug()
    {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("category_name").value;

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”

        document.getElementById('slug').innerHTML = slug;
        document.getElementById('slug2').value=slug;

    }
// form add thông tin
</script>
@extends('admin.footer');
</html>


