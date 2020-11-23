<title>Nhập tin tức</title>
@extends('admin.sidebar')
{{-- @extends('admin.footer') --}}
@section('content')
<style>
.bootstrap-tagsinput {
    width: 100% !important;

}

li {
    text-decoration: none;
}

#list {
    word-break: break-all;
    /* background-color:blue; */
    width: 100%;
}

.bootstrap-tagsinput input {
    width: 100%;
    /* background-color:red; */
}

.my-0 {
    font-weight: bold;
}
.error{
    color:tomato;
        /* font-weight: bold; */
        font-size:13px;
        font-weight: bold;
}

</style>
<style>

    .select2-selection__choice{
    margin-top: 0px!important;
    padding-right: 5px!important;
    padding-left: 5px!important;
    background-color: transparent!important;
    border:none!important;
    border-radius: 4px!important;
    background-color: rgba(0, 139, 139, 0.09) !important;
}

.select2-selection__choice__remove{
    border: none!important;
    border-radius: 0!important;
    padding: 0 2px!important;
}
.select2-selection{
    background-color:red;
}
.select2-selection__choice__remove:hover{
    background-color: black !important;
    color: #ef5454 !important;
}
</style>
{{-- @extends('admin.sidebar') --}}
@section('title','Quản lý tin tức')



<style>
.error {
    color: red;

}
</style>
{{-- get tags value --}}


<div class="max-width-container">
    {{-- <div class="py-5 text-center"> --}}
    <form method="POST" id="tintuc" action="{{url('admin/index/news/insert')}}" enctype="multipart/form-data">
        {{-- {{ csrf_field() }} --}}
        @csrf

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <!-- <span class="text-muted ">Thông tin bài viết</span> -->
                    {{-- <span class="badge badge-secondary badge-pill">3</span> --}}
                </h4>
                <ul class="list-group mb-3 box-n p-4">
                    <li class=" d-flex justify-content-between align-items-center lh-condensed mb-3">
                        <div>

                            <p class="my-0 section-title-small">Liên kết slug</p>
                            {{-- get slug --}}
                            <small class="text-muted">
                                <div id="slug" class="">
                                    {{-- show kết quả --}}
                                </div>

                            </small>
                            {{-- <input type="text"" value="" name="slug"> --}}
                        </div>
                        <span class="text-muted"></span>
                    </li>
                    <li class=" d-flex justify-content-between align-items-center lh-condensed mb-3">
                        <div>
                            <h6 class="my-0 section-title-small">Tình trạng bài viết</h6>
                            {{-- <small class="text-muted"></small> --}}
                        </div>
                        <span class="text-muted">Hiện</span>
                    </li>

                    <li class=" d-flex justify-content-between align-items-center lh-condensed mb-3">
                        <div>
                            <h6 class="my-0 section-title-small">Ngôn ngữ </h6>
                            {{-- <small class="text-muted"></small> --}}
                        </div>
                        <span class="text-muted">
                            <img src="../../../assets/news/vn.png" alt="">
                        </span>
                    </li>


                    <li class=" d-flex justify-content-between lh-condensed">

                        <span class="text-muted"></span>
                    </li>
                    {{-- <li class=" d-flex justify-content-between bg-light"> --}}
                </ul>
                <div class="wrap-input-img box-n p-4">
                    <div class="section-title-small">Ảnh đại diện bài viết</div>
                    <div class=" custom-file ">
                        <input type="file" class="custom-file-input" id="customFile" name="image"
                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                        <label class="custom-file-label" for="customFile">Chọn tập tin </label>
                    </div>
                    {{-- <input name="photo" type="file" accept="image/*"> --}}

                    <div class="show-img">
                        {{-- <input type="file" name="image" id="" > --}}
                        <img src="{{asset('assets/news/bds_1.jpg')}}" alt="" id="output" class="images-preview"
                            name="image" accept="image/*">
                    </div>
                </div>

                </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <div class="row">
                    <label for="text" class="error">
                        <?php echo $errors->first('title'); ?>
                        </label>
                    <div class="col-md-12 mb-3">

                        <label for="title" class="section-title-small">Tiêu đề bài viết</label>
                        <label for="text" class="error"></label>
                        <input type="text" class="w-full input-n input--lg box-n" id="title" onkeyup="ChangeToSlug();"
                            placeholder="Tiêu đề bài viết" value="" name="title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="section-title-small">Ngày đăng</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                            <input class="form-control" id="email" name="datepost" type="text" readonly
                                value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}" />
                        </div>
                    </div>

                </div>

                <div class="section-title-small">

                </div>
                <div class="form-group">
                    <label for=""></label>
                    <?php $cate = \App\Models\NewsCategory::all()?>
                    <select class="input-n input--lg border select-n" id="category_dropdown" name="id_category"
                        onChange="test();" >
                        <option value="" disable hidden>Lựa chọn danh mục</option>
                        @foreach ($cate as $item)
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="section-title-small">Từ khoá</label>

                    <div class="form-group">
                      {{-- <label for=""></label> --}}
                      {{-- <input type="text" class="form-control" name="tag[]" id="tag" value="" multiple="multiple" hidden aria-describedby="helpId" placeholder=""> --}}
                      <select class="form-control tag"name="tag[]" id="tag" multiple="multiple">
                        @foreach ($tag_input as $item)
                      <option value="{{$item->id}}" name="">{{$item->tag}}</option>
                      @endforeach
                      </select>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="category_news_slug" id="category_news_slug"
                    aria-describedby="helpId" placeholder="">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="content">Nội dung</label>
                        <label for="text" class="error"></label>
                        <textarea id="editor1" name="content" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" name="slug" id="slug2" aria-describedby="helpId"
                        placeholder="" readonly>
                </div>
                <input type="submit" class="btn btn-primary" >Gửi tin</button>
    </form>
</div>
</div>
{{-- tag --}}

{{-- @extends('admin.footer') --}}
<script>
function test() {
    var test = $("#category_dropdown option:selected").text();
    console.log(test);
    $("#category_news_slug").attr('value', test);
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js
  "></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>


<script>
$(document).ready(function() {

    $('#tintuc').validate({
        rules: {
            'title': {
                required: true,
                minlength: 8,
                maxlength: 255
            },

            'tags': {
                required: true,
            },
            'id_category': {
                required: true,
            },
            'editor1': {
                required: function(textarea) {
                    CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                    var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                    return editorcontent.length === 0;
                }
            },
        },
        messages: {
            'title': {
                required: "Tiêu đề không được để trống",
                minlength: "Vui lòng nhập mật khẩu khoản tối đa 8 kí tự",

            },

            'tags[]': {
                required: "Từ khoá không được để trống",
            },
            'id_category': {
                required: "Vui lòng chọn lại danh mục",
            },
            'editor1': {
                maxlength: 'Vui lòng nhập tối đa 20 kí tự',
                required: "Nội dung không được để trống"
            },
        },
    });
});

</script>
