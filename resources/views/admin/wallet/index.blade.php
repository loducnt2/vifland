@extends('admin.sidebar')
@section('title','Nạp tiền')
@section('content')
<div class="container">
    <h2>Danh sách người dùng </h2>

    <!-- table -->
    <div class="row">
        <div class="col-5">
            <div class="form-group">
                <label for=""></label>
                <input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm..">
            </div>
        </div>
    </div>

    <br>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Mã người dùng</th>
                <th>Tên truy cập</th>
                <th>Ví hiện tại</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>{{number_format($user->wallet)}}</td>
                <td>
                    <form action="{{route('add-wallet')}}" method="post">
                        @csrf
                        <input type="hidden" name="userid" value="{{$user->id}}">
                        <input type="number" name="wallet" value="">
                        <button type="submit btn-success">Thêm</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#status").on("change", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr td[id='valueStatus']").filter(function() {
            $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $("#type").on("change", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr td[id='productType']").filter(function() {
            $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
<style>
th,
tr {
    margin: 0 auto;
    text-align: center;
}
</style>
@endsection