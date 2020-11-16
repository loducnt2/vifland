<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý thư tin tức</title>
</head>
<body>
    <style>
        .custom-file-label::after {
content: "Chọn tập tin " !important; }
    </style>

    {{-- @extends('layouts.master') --}}
    @extends('admin.sidebar')
    @section('content')

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        {{-- <th>Username</th> --}}
                        {{-- <th>Email</th> --}}
                        {{-- <th>Năm sinh </th> --}}
                        <th>Thời gian đăng kí</th>

                    </tr>
                </thead>


                <tr>
                 @foreach ($newsletter as $newsletter)
                 <tr>
                 <td>{{$newsletter->id}}</td>
                    {{-- <td>{{$newsletter->full_name}}</td> --}}
                 {{-- <td>{{$newsletter->username}}</td> --}}
                 <td>{{$newsletter->email}}</td>
                 {{-- <td>{{$user->birth_day}}</td> --}}
                 <td>{{$newsletter->created_at}}</td>

                <td>

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
