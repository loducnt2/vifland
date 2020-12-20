@extends('admin.sidebar')
@section('title','Quản lý banner')
@section('breadcum')
Quản lý banner
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<div class="container">
    <h2>Update Banner</h2>
    <div class="form-create-banner">
        <form action="{{route('update-banner',$banner->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="">
                <label for="">banner cũ</label>
                <div>
                    <img class="img-old lazyload" data-src="{{asset('assets/banner')}}/{{$banner->name}}" alt="">
                </div>

            </div>
            <div class="form-group">
                <label for="">banner mới</label>
                <input type="file" name="img" class="form-control-file">
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
                <button type="submit" class="btn btn-primary">Thêm banner</button>
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
</div>
<style>
.img-old {
    width: 300px;
    height: 200px;

}
</style>
@endsection