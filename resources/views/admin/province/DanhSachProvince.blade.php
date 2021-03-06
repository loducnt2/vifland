@extends('admin.sidebar')
@section('title','Quản lý tỉnh/ thành phố')
@section('breadcum')
Quản lý tỉnh/ thành phố
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-fluid box-n-big">
    <h2 class="section-title-big">Quản lý tỉnh/thành phố</h2>

    <input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm nhanh..">
    <br>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tỉnh</th>
                <th>Trạng thái nội dung</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($Pros as $pro)
            <tr>
                <td>{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
                <td>{{$pro->content==""?'Hiện chưa có Content':'Ấn xem chi tiết'}}</td>
                <td><a href="{{route('edit-province',$pro->id)}}"> Xem chi tiết </a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>

<script>
$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
@endsection