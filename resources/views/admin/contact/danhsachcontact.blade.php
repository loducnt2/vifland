<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách contact</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

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
                    <th>Địa chỉ</th>
                    <th>SDT</th>
                    <th>Chi tiết</th>
                    <th>Tình trạng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Loại</label>

                </div>

            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select class="form-control" name="" id="status">
                        <option value=""> ---------</option>
                        <option value="Đã trả lời"> Đã trả lời</option>
                        <option value="Chưa trả lời"> Chưa trả lời </option>
                    </select>
                </div>
            </div>
            <tbody id="myTable">
            @foreach($contacts as $cot)
            @if ($cot->status == '1')
            {{-- đã trả lời --}}
                    <?php $class = "answered"; ?>
                    @else
                    {{-- chưa trả lời --}}
                    <?php $class = "not-answered"; ?>
                    @endif
               <tr class="{{$class}}">
                <td>{{$test = $cot->id}}</td>
                <td>{{$cot->name}}</td>
                <td>{{$cot->email}}</td>
                <td>{{$cot->address}}</td>
                <td>{{$cot->phone}}</td>

                <td><a href="" data-id="{{$cot->id}}" data-content="{{$cot->content}}" data-name="{{$cot->name}}" data-email="{{$cot->email}}"class="btn btn-primary btn-contact-detail" id="contact-{{$cot->id}}"><i class="ri-window-fill"></i>
                </a></td>

                <td id="status" > {{$cot->status==0 ?'Chưa trả lời':'Đã trả lời'}} </td>
                <td><a href="" data-id="{{$cot->id}}" data-content="{{$cot->content}}" data-name="{{$cot->name}}" data-email="{{$cot->email}}"class="btn btn-primary btn-mail-contact" id="contact-{{$cot->id}}" ><i class="ri-mail-open-line"></i>
                </a></td>
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
<div class="email modal  fade" id="send-email-form" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" id="email" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thư phản hồi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="myForm">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="form-group">

                            <input type="text" class="form-control" readonly hidden name="name" id="name" aria-describedby="helpId" placeholder="">
                            <label for="">Tiêu đề thư</label>
                            <input
                                type="text"
                                class="form-control"
                                name="subject"
                                id="subject"
                                aria-describedby="helpId"
                                placeholder="">

                        </div>
                        <input
                            type="text"
                            class="form-control"
                            readonly=true
                            name="email"
                            id="email"
                            aria-describedby="helpId"
                            placeholder="">
                        {{-- người nhận :) --}}

                        </div>
                        <textarea class="mt-4 form-control " rows="3" name="content_send" id="content" value=""> </textarea>
                        <br>
                    </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Gửi thư</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </form>
            </div>
        </div>
    </div>
</div>
</html>
{{-- Mail Hồi âm --}}
<div class="modal fade" id="contact-detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" enctype="multipart/form-data" method="POST" id="contact-form">
            <div class="modal-header">
                <h5 class="modal-title">Hòm thư góp ý</h5>

                    {{ csrf_field() }}

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
             <div class="form-group">
                  <input type="text" class="mt-4 form-control" name="email" id="email" readonly="true" placeholder="">
                  <small id="helpId" class="form-text text-muted">Email người gửi</small>
                </div>
                  <div class="form-group">
                    <input type="text" class="mt-4 form-control" name="name" id="name" readonly aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Họ và tên</small>
                  </div>
                  <div class="form-group">
                  <textarea class="mt-4 form-control"rows="4" name="content" readonly></textarea>
                  <small id="helpId" class="form-text text-muted">Nội dung</small>
                </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Lưu</button>
            </form>
            </div>
        </div>

    </div>
</div>

{{-- Email --}}
<!-- Modal -->

