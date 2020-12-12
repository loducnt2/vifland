@extends('admin.sidebar')
@section('title','Quản lý ví tiền')
@section('breadcum')
Quản lý ví tiền
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-5">
            <button class="btn button-color btn-change-table">Thêm/ trừ tiền</button>
            <button class="btn btn-danger btn-change-table">Thống kê</button>
        </div>
    </div>
</div>
<div id="wallet">
    <div class="container-fluid">
        <!-- table -->
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label for=""></label>
                    <input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm..">
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tên truy cập</th>
                    <th>Ví hiện tại</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach($users as $user)
                <tr>
                    <td>{{$user->username}}</td>
                    <td>{{number_format($user->wallet)}}</td>
                    <td class="text-left">
                        <form action="{{route('add-wallet')}}" method="post" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3">
                                <input type="hidden" name="userid" value="{{$user->id}}" class="">
                                <input type="number" name="wallet" value="" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success form-control">Thêm</button>
                        </form>
                    </td>
                    <td class="text-left">
                        <form action="{{route('sub-wallet')}}" method="post" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3">
                                <input type="hidden" name="userid" value="{{$user->id}}" class="">
                                <input type="number" name="wallet" value="" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-danger form-control">Trừ</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}

    </div>
</div>
<div class="d-none" id="statistical">
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label for=""></label>
                    <input class="form-control" id="myInput2" type="text" placeholder="Tìm kiếm..">
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>

                    <th scope="col">id</th>
                    <th scope="col">Tên truy cập</th>
                    <th scope="col">Tổng ví</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody id="mytable2">
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{number_format($user->total_cash)}} VND</td>
                    <td><a href="{{route('detail-wallet',$user->id)}}"><button class="btn btn-primary">Xem chi
                                tiết</button></a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function() {

    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#myInput2").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#mytable2 tr").filter(function() {
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
$(".btn-change-table").click(function() {
    $("#wallet").toggleClass("d-none");
    $("#statistical").toggleClass("d-none");
})
@if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}";
switch (type) {
    case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;

    case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;

    case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;

    case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
}
@endif
</script>
<style>
th,
tr {
    margin: 0 auto;
    text-align: center;
}
</style>
@endsection