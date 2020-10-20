<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý người dùng</title>

</head>
<script>
    $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
    </script>
<body>

    {{-- @extends('layouts.master') --}}
    @extends('admin.sidebar')
    @section('content')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Họ và tên</th>
                        <th>Username</th>
                        <th>Email</th>
                        {{-- <th>Năm sinh </th> --}}
                        <th>Thời gian đăng kí</th>
                        {{-- <th>Salary</th> --}}
                        <th>Hoạt động</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>


                <tr>
                 @foreach ($users as $user)
                 <tr>
                 <td>{{$user->full_name}}</td>
                 <td>{{$user->username}}</td>
                 <td>{{$user->email}}</td>
                 {{-- <td>{{$user->birth_day}}</td> --}}
                 <td>{{$user->created_at}}</td>
                 <td>
                    @if ($user->status == '1')
                        Hoạt động
                    @else
                        Bị ban
                    @endif

                  </td>

                  <td>
                   {{-- modal box here --}}
                   <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
    Khoá thành viên
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Khoá thành viên {{$profile->id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

                  </td>
                 @endforeach

                </tr>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    @endsection
</body>
</html>
