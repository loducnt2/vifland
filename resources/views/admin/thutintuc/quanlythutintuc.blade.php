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
        content: "Chọn tập tin " !important;
    }
    </style>

    {{-- @extends('layouts.master') --}}
    @extends('admin.sidebar')
    @section('content')
    {!! Toastr::message() !!}
    <div class="container-fluid box-n-big">
        <form action="/admin/index/quan-ly-thu-tin-tuc/export" method="get">
            <button type="submit" class="btn btn-primary" style="background-color:#7174E9;color:white">Xuất file
                Excel</button>
        </form>

        <form action="/admin/index/quan-ly-thu-tin-tuc/import" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="AP4B22Q0khG0XP9tMS42wkHnvilK53VBmwd4TjYv">
            <div class="mt-4 form-group">
                <div class="col-md-12 custom-file ">
                    <input type="file" class="custom-file-input" id="import_file" name="import_file"
                        accept=".xlsx, .xls, .csv, .ods">
                    <label class="custom-file-label" for="customFile">Chọn tập tin</label>
                </div>
                <button type="submit" class="mt-4 btn btn-primary" style="background-color:#7174E9;color:white">Nhập
                    file
                    Excel</button>
                <script>
                $(document).on('change', '.custom-file-input', function(event) {
                    $(this).next('.custom-file-label').html(event.target.files[0].name);
                })
                </script>
            </div>
        </form>
        <div class="container-fluid">
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