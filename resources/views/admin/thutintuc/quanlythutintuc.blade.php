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

    @extends('admin.sidebar')
    @section('content')


    <form action="/admin/index/quan-ly-thu-tin-tuc/export" method="get">
        <button type="submit" class="btn btn-primary" style="background-color:#7174E9;color:white" >Xuất file Excel</button>
    </form>
<form action="{{ route('table.import') }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="AP4B22Q0khG0XP9tMS42wkHnvilK53VBmwd4TjYv">
        {{ csrf_field() }}
        <div class="mt-4 form-group">
            <div class="col-md-12 custom-file ">
                <input type="file" class="custom-file-input" id="import_file" name="import_file" accept=".xlsx, .xls, .csv, .ods">
                <label class="custom-file-label" for="customFile">Chọn tập tin</label>
              </div>
              <button type="submit" class="mt-4 btn btn-primary" style="background-color:#7174E9;color:white" >Nhập file Excel</button>
              <button type="button" class="mt-4 btn btn-primary " data-toggle="modal" data-target="#modelId">
                Gửi thư quảng cáo
              </button>
            </div>
</form>
<div class="container">
    <div class="row">
        <div class="col-md-4 form-group">
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade " id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Gửi thư quảng cáo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form action="/send-email" method="POST" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <textarea type="textarea" name="contents" id="contents" class="form-control" rows="15" placeholder=""></textarea>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <a name="" id="" class="btn btn-primary" href="#" role="button">Gửi</a> --}}
        </div>
    </div>
</div>
{{-- form send email --}}

{{-- end form --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Thời gian đăng kí</th>
                    </tr>
                </thead>


                <tr>
                 @foreach ($newsletter as $newsletter)
                 <tr>
                 <td>{{$newsletter->id}}</td>
                 <td>{{$newsletter->email}}</td>
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
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

</body>
</html>
