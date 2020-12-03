@extends('admin.sidebar')
@section('title','Nạp tiền')
@section('content')
<div id="wallet">
    <div class="container">
        <!-- table -->
        <div class="row">
            <div class="col-4">
                <h3>Danh sách quản trị viên</h3>
            </div>
            <div class="col-2 float-left">
                <button type="button" class=" btn btn-success" data-toggle="modal" data-target="#exampleModal">Thêm admin</button>
            </div>
        </div>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col">Tên truy cập</th>
                <th scope="col">Lần cuối đăng nhập</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="">
              @foreach($admin as $ad)
              <tr>
                <td>
                    {{$ad->username}}
                    <?php
                     $date = strtotime('now')-strtotime($ad->updated_at) ;
                     if( intval(date('d',strtotime($date))) <=3 ){
                        echo '<span class="badge badge-pill badge-success">Mới</span>';
                     }
                    ?>
                </td>
                <td>{{$ad->last_login}}</td>
                <td><a href="{{route('destroy-admin',$ad->id)}}" class="btn btn-danger">Hủy quyền</a></td>
              </tr>
              @endforeach
            </tbody>
        </table>
        {{$admin->links()}}
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
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
                        <th scope="col">Tên truy cập</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                      @foreach($user as $us)
                      <tr>
                        <td>{{$us->username}} </td>
                        <td><a href="{{route('add-admin',$us->id)}}" class="btn btn-success">Thêm</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
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
    $(".btn-change-table").click(function(){
        $("#wallet").toggleClass("d-none");
        $("#statistical").toggleClass("d-none");
    })
</script>
<style>
    th,
    tr {
        margin: 0 auto;
        text-align: center;
    }
</style>
@endsection