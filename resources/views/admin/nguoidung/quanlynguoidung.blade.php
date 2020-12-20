<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

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
            <table class="table table-bordered box-n" id="userTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Họ và tên</th>
                        <th>Tên đăng nhập</th>
                        <th>Email</th>
                        {{-- <th>Năm sinh </th> --}}
                        <th>Thời gian đăng kí</th>
                        <th>Hiện trạng</th>
                        <th>Hoạt động</th>
                        <th>Hành động</th>
                        <th>Chi tiết</th>
                        <th>Xóa</th>

                    </tr>
                </thead>
                @foreach ($users as $user)
                @if ($user->status == '1')
                <?php $class = "enabled" ?>
                @else
                <?php $class = "disabled" ?>
                @endif
                <tr id="user2-{{$user->id}}" class="{{$class}}">
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    {{-- <td>{{$user->birth_day}}</td> --}}
                    <td>{{$user->created_at}}</td>
                    <td>
                        <p id="status-{{$user->id}}">
                            @if ($user->status == '1')
                            Hoạt động
                            @else
                            Bị ban
                            @endif
                        </p>
                    </td>
                    <td>
                        <p id="status3-{{$user->id}}">
                            @if ($user->email_verified_at =="")
                            <span class="badge badge-dark">Chưa xác thực</span>
                            @else
                            <span class="badge badge-primary">Đã xác thực</span>
                            @endif
                        </p>
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="toggle-class" checked data-toggle="toggle" data-on="Ban" data-off="Unban" id-data="{{$user->id}}"
                        {{ $user->status ? 'checked' : '' }}> --}}
                        <input data-id="{{$user->id}}" class="btn-user" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Mở" data-off="Khoá" {{ $user->status ? 'checked' : '' }}>
                        {{-- <input data-id="{{$user->id}}" class="btn-user" type="checkbox" data-onstyle="success"
                        data-offstyle="danger" data-toggle="toggle" data-on="Mở" data-off="Khoá"
                        {{ $user->status ? 'checked' : '' }}> --}}

                        {{-- <input type="checkbox" checked data-toggle="toggle" data-id="{{$user->id}}" class="test">
                        --}}
                        <div id="console-event-{{$user->id}}"></div>
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
                        <a href="" data-id="{{$user->id}}" data-username="{{$user->username}}" class="btn btn-danger btn-user-delete">Xoá</a>
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