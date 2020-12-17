<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách contact</title>
</head>

<body>
    {{-- @extends('layouts.master') --}}
    @extends('admin.sidebar')
    @section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container">
        <h2>Danh sách Contact</h2>

        <!-- table -->
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
            @foreach($contacts as $cot)
               <tr>
                <td>{{$cot->id}}</td>
                <td>{{$cot->name}}</td>
                <td>{{$cot->email}}</td>
                <td>{{$cot->address}}</td>
                <td>{{$cot->phone}}</td>
                <td>{{$cot->title}}</td>
                <td>{{$cot->content}}</td>
               
               </tr>
            @endforeach
            </tbody>
        </table>
      

    <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

</body>
@endsection
</body>

</html>