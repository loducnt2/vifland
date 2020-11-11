<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @extends('admin.sidebar')

    <title>Danh mục tin tức</title>
</head>
<body>

   @section('content')
    <div class="form-group">
      <label for=""></label>
      <input type="text"
        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
      {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
    </div>
   <table id="myTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Slug</th>
                <th>Hiện ẩn</th>
                <th>Hành động</th>

        </tr>
      </thead>
      <tbody id="myTable">
        @foreach ($news_cate as $category_news)
        <tr>
        <td id="id">{{$category_news->id}}</td>
            <td>{{$category_news->category_name}}</td>
            <td>{{$category_news->slug}}</td>
            <td>{{$category_news->status}}</td>
        {{-- <td><a name="" id="" onclick="delete({{$category_news->id}})" class="btn btn-primary" href="{{$category_news->id}}" role="button">Xoá</a></td> --}}
            {{-- <td>{{$category_news->category_name}}</td> --}}
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
</html>
