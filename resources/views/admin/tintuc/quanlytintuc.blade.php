@extends('admin.sidebar')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <style>
    .bootstrap-tagsinput {
  width: 100% !important;
}
li{
    text-decoration: none;
}
#list{
    word-break: break-all;
    /* background-color:blue; */
width: 100%;
}
.text-muted{
}
.my-0{
    font-weight: bold;
}
.images-preview{
    margin-top:20px;

    margin-left:40px;
    float:left;
    width:250px;
}
</style>
{{-- @extends('admin.sidebar') --}}
@section('title','Quản lý tin tức')
{{-- get tags value --}}


<div class="container">
    <div class="py-5 text-center">
    <form  method="POST" action="{{url('admin/index/news/insert')}}" enctype="multipart/form-data">
        {{-- {{ csrf_field() }} --}}
        @csrf

     </div>

        <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Thông tin bài viết</span>
          {{-- <span class="badge badge-secondary badge-pill">3</span> --}}
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Liên kết slug</h6>
              {{-- get slug --}}
              <small class="text-muted">

                <div id ="slug">
            {{-- show kết quả --}}
                </div>

              </small>
              {{-- <input type="text"" value="" name="slug"> --}}
            </div>
            <span class="text-muted"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Tag</h6>

            </div>
            <span class="text-muted"><div id="list"></div></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Tình trạng bài viết</h6>
              {{-- <small class="text-muted"></small> --}}
            </div>
            <span class="text-muted">Hiện</span>
          </li>

            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Ngôn ngữ </h6>
                  {{-- <small class="text-muted"></small> --}}
                </div>
                <span class="text-muted">
                  <img src="../../../assets/news/vn.png" alt="">
                </span>
              </li>


              <li class="list-group-item d-flex justify-content-between lh-condensed">

                <span class="text-muted"></span>
              </li>
          {{-- <li class="list-group-item d-flex justify-content-between bg-light"> --}}
            <div class="col-md-12 custom-file ">
                <input type="file" class="custom-file-input" id="customFile" name="image" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                <label class="custom-file-label" for="customFile">Chọn tập tin</label>
              </div>
              {{-- <input name="photo" type="file" accept="image/*"> --}}

              <div class="col-md-12">
                <div class="text-muted" style="font-weight:bold; text-align:center" >
                    Ảnh minh hoạ
                </div>
                {{-- <input type="file" name="image" id="" > --}}
                <img src="{{asset('assets/news/bds_1.jpg')}}" alt="" id="output" class="images-preview" name="image" accept="image/*">
              </div>
              <script language="javascript">
                $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            </script>
                 </li>
                  </ul>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Đăng tin tức</h4>
        <div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Tiêu đề bài viết</label>
              <input type="text" class="form-control" id="title" onkeyup="ChangeToSlug();" placeholder="" value="" name="title">
              {{-- <span class="tag label label-info">Amsterdam<span data-role="remove"></span></span> --}}
            </div>

            {{-- <input data-id="{{$user->id}}" data-style="ios" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-style="ios" data-on="On" data-off="Off" {{ $user->status ? 'checked' : '' }} > --}}
            <div class="col-md-6 mb-3">
                <label for="">Ngày đăng</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                <input class="form-control" id="email" name="datepost" type="text" readonly value="
                {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}"/>
                  </div>
              </div>

          </div>
          Danh mục tin tức
          <div class="form-group">
            <label for=""></label>
            <?php $cate = \App\Models\NewsCategory::all()?>
            <select class="form-control" id="category_dropdown" name="id_category" onchange="test(this);">
                <option value="0">Lựa chọn danh mục</option>
                @foreach ($cate as $item)
            <option value="{{$item->id}}">{{$item->category_name}}</option>
              @endforeach
            </select>
          </div>

          <input type="hidden" class="form-control" name="category_news_slug" id="category_news_slug" aria-describedby="helpId" placeholder="" >

          <div class="form-group">
            <label for="">Từ khoá</label>
            <input type="text" class="form-control typeahead" name="tags[]" id="tag" aria-describedby="helpId" placeholder="" data-role="tagsinput" >
          </div>
          Từ khoá của bài viết:<div id="tags"></div>
          <div class="row">
            <div class="col-md-12 mb-3">

              <label for="content">Đăng tin mới</label>
                <textarea id="editor1" name="content">

                </textarea>
                {{-- quản lí tin tức --}}
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

            </div>

          </div>
          <div class="form-group">

            <input type="hidden"
              class="form-control" name="slug" id="slug2" aria-describedby="helpId" placeholder="" readonly>
            {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
          </div>

          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
             </div>
    </div>
    </div>
</form>

@endsection
<script language="javascript">
    function ChangeToSlug()
    {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("title").value;

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

</script>

