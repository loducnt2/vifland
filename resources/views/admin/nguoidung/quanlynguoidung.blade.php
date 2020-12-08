<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Quản lý người dùng</title>

    {!! Toastr::message() !!}
</head>

<body>

    {{-- @extends('layouts.master') --}}
    @extends('admin.sidebar')
    @section('breadcum')
    Quản lý người dùng
    @endsection
    @section('content')
    
    

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered box-n" id="table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Họ và tên</th>
                        <th>Username</th>
                        <th>Email</th>
                        {{-- <th>Năm sinh </th> --}}
                        <th>Thời gian đăng kí</th>
                        {{-- <th>Salary</th> --}}
                        <th>Hoạt động</th>
                        <th>Hành động</th>
                        <th>Chi tiết</th>
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
                   <p> @if ($user->status == '1')
                        Hoạt động
                    @else
                        Bị ban
                    @endif
                    </p>
                  </td>

                  <td>
                  {{-- <input type="checkbox" class="toggle-class" checked data-toggle="toggle" data-on="Ban" data-off="Unban" id-data="{{$user->id}}" {{ $user->status ? 'checked' : '' }}> --}}
                  <input data-id="{{$user->id}}" data-style="ios" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-style="ios" data-on="On" data-off="Off" {{ $user->status ? 'checked' : '' }} class="toggle-class" onchange="refreshTable()">
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
            {{$users->links()}}
            <!-- <button type="submit" class="btn btn-primary">Lưu thông tin </button> -->
        </div>
    </div>
    
    @endsection
{{-- @extends(') --}}

    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>
