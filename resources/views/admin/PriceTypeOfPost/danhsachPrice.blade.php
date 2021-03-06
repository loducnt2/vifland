@extends('admin.sidebar')
@section('title','Quản lý giá post')
@section('breadcum')
Quản lý giá post
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid box-n-big">
    <h2>Quản lý giá bài đăng</h2>

    <div class="table-list-banner">
        <input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm nhanh..">
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Loại giá trị</th>
                    <th>Giá</th>
                    <!-- <th>Trạng thái</th> -->
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach($prices as $price)
                <tr>
                    <td>{{$price->id}}</td>
                    <td>{{$price->name}}</td>
                    <td>{{number_format($price->price)}} VNĐ</td>
                    <!-- <td>{{$price->status}}</td> -->
                    <td>
                        <a href="{{route('edit-price',$price->id)}}"><button class="btn button-color text-white"> Chỉnh sửa
                            </button></a>
                        <a href="{{route('del-price',$price->id)}}"><button class="btn btn-danger text-white"> Xóa
                            </button></a>
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