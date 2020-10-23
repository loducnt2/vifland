<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý người dùng</title>

</head>

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
                  {{-- <input type="checkbox" class="toggle-class" checked data-toggle="toggle" data-on="Ban" data-off="Unban" id-data="{{$user->id}}" {{ $user->status ? 'checked' : '' }}> --}}
                  <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Mở tài khoản" data-off="Khoá tài khoản" {{ $user->status ? 'checked' : '' }}>
gi
                </td>
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
