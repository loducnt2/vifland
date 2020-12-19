@extends('admin.sidebar')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<style>
<style>span.error {
    color: red;
    font-size: 12px;
    /* margin-left: 6px; */
    /* height:17px; */
    /* background: url('http://i45.tinypic.com/f9ifz6.png') no-repeat left center; */
}

label.error {
    font-weight: bold;
    color: red;
    font-size: 14px;
}
</style>
<div class="container-fluid box-n-big">
    <h2 class="section-title-big">Danh sách thông báo</h2>

    <!-- table -->
    <button class="btn button-color btn-create-noti mb-3"> Tạo thông báo</button>
    <div class="form-create-noti d-none">
        <form id="thongbao" action="{{route('create-noti')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="text" class="error4"></label>

                <label for="">Tiêu đề</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="text" class="error"></label>

                <label for="">Nội dung</label>
                <input type="text" name="noidung" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="text" class="error"></label>
                <label for="">Trạng thái</label>
                <select class="form-control" name="status" id="">
                    <option value="0">Ẩn thông báo</option>
                    <option value="1">Hiện thông báo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Ngày hết hạn</label>
                <input class="form-control" type="date" name="due_date">
            </div>
            <div class="form-group">
                <label for="">Ngôn ngữ</label>
                <select class="form-control" name="lang" id="">
                    <option value="vn">Việt Nam</option>
                    <option value="en">English</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
        </form>

    </div>
    <div class="table-list-noti">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="table table-bordered table-striped">
            <thead id="myTable">
                <tr>
                    <th>Id</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Ngày hết hạn</th>
                    <th>ngôn ngữ</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>


                </tr>
            </thead>
            <tbody id="myTable">
                @foreach($notis as $noti)
                <tr>
                    <td>{{$noti->id}}</td>
                    <td>{{$noti->name}}</td>
                    <td>{{$noti->content}}</td>
                    <td>{{$noti->due_date}}</td>
                    <td>{{$noti->language}}</td>
                    <td>{{$noti->status==0?'Đang ẩn':'Đang hiện'}}</td>
                    <td>
                        <a href="{{route('del-noti',$noti->id)}}"> <button class="btn btn-danger">Xóa</button> </a>
                        <a href="{{route('edit-noti',$noti->id)}}"> <button class="btn btn-info">Update</button> </a>
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

    $(".btn-create-noti").click(function() {
        $(".form-create-noti,.table-list-noti,#btn-create-noti").toggleClass("d-none");
    });

    $("#form-noti").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "name": {
                required: true,

            },
            "noidung": {
                required: true,

            },

        },
        messages: {
            "name": {
                required: "Bắt buộc nhập tiêu đề",

            },
            "noidung": {
                required: "Bắt buộc nhập nội dung",

            },

        }
    });
});
</script>
@endsection