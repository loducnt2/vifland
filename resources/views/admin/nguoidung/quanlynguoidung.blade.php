<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <title>Quản lý người dùng</title>

</head>

<body>

    {{-- @extends('layouts.master') --}}
    @extends('admin.sidebar')
    @section('content')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Họ và tên</th>
                        <th>Username</th>
                        <th>Email</th>
                        {{-- <th>Năm sinh </th> --}}
                        <th>Thời gian đăng kí</th>
                        {{-- <th>Salary</th> --}}
                        <th>Hoạt động</th>
                        <th>Chi tiết</th>
                        <th>Hành động</th>
                        <th></th>
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
                  {{-- <input type="checkbox" class="toggle-class" checked data-toggle="toggle" data-on="Ban" data-off="Unban" id-data="{{$user->id}}" {{ $user->status ? 'checked' : '' }}> --}}
                  <input data-id="{{$user->id}}" data-style="ios" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-style="ios" data-on="On" data-off="Off" {{ $user->status ? 'checked' : '' }} >
                {{-- hồ sơ --}}

                </td>
                <td>
                  <button type="submit" class="btn btn-primary">
                      <a href="/admin/index/profile/{{$user->id}}">
                        <i class="fa fa-search" style="font-size:12px;color:white"></i>
                        </a>
                        {{-- Xoá --}}

                  </button>

                </td>
                <td>
                    <button type="button" class="btn btn-danger">
                    <a href="profile/delete/{{$user->id}}">
                        <i class="fas fa-trash" style="color:white" ></i>
                    </a>
                   </button>

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
<script>
 function refreshTable() {
  $('#table').fadeOut();
  $('#table').load(url, function() {
      $('#table').fadeIn();
  });
}
</script>

</html>
