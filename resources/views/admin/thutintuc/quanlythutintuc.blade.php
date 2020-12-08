@section('title','Quản lý thư tin tức')
    <style>
        .custom-file-label::after {
content: "Chọn tập tin " !important; }
    </style>

    @extends('admin.sidebar')
    @section('content')
    @section('breadcum')
    Quản lý thư tin tức
    @endsection
    {!! Toastr::message() !!}

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
                            <h5 class="modal-title">Form gửi thư quảng cáo cho tất cả</h5>

                        </div>
                        <div class="modal-body">
                            <form action="/send-email" method="POST" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <label for="">Tiêu đề thư</label>
                                  <input type="text" class="form-control" name="subject" id="subject" aria-describedby="helpId" placeholder="">
                                  {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                </div>
                                <textarea type="textarea" name="contents" id="contents" class="form-control" rows="15" placeholder=""></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Gửi thư</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

                            </form>

                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            {{-- <a name="" id="" class="btn btn-primary" href="#" role="button">Gửi</a> --}}
        </div>
    </div>
</div>
{{-- form send email --}}
<!-- Button trigger modal -->

{{-- end form --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Thời gian đăng kí</th>
                        <th></th>
                    </tr>
                </thead>
                <!-- Button trigger modal -->



                <tr>
                 @foreach ($newsletter as $newsletter)
                 <tr>
                 <td>{{$newsletter->id}}</td>
                 <td>{{$newsletter->email}}</td>
                 <td>{{$newsletter->created_at}}</td>
                 <td><!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendEmail{{$newsletter->id}} ">
                   Gửi thư
                 </button>
                </td>
                 <!-- Modal -->
                 <!-- Button trigger modal -->


                 <!-- Modal -->



                 <div class="modal fade" id="sendEmail{{$newsletter->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Gửi thư giới thiệu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                             <div class="modal-body">

                                 <div class="form-group">
                                     <form action="/guithu" method="post" enctype="multipart/form-data">
                                      @csrf

                                    <label for="">Người nhận</label>
                                   <div class="form-group">
                                   <input type="text" class="form-control" name="email" aria-describedby="helpId" placeholder="" value="{{$newsletter->email}}">
                                   </div>
                                   <textarea type="textarea" name="contents" id="contents" class="form-control" rows="15" placeholder=""></textarea>
                                </div>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary text">Gửi thư</button>

                                </div>
                            </form>
                         </div>
                     </div>
                 </div>

                </td>
                <td>

                 @endforeach

                </tr>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    @endsection

