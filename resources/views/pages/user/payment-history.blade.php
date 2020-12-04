@extends('.pages.user.slidebar')
@section('title','Lịch sử giao dịch')
@section('headerStyles')
@section('content_child')
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="active nav-link active" id="addmoney-tab" data-toggle="tab"
            href="#addmoney" role="tab" aria-controls="nav-home"
            aria-selected="true">Lịch sử giao dịch</a>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="addmoney" role="tabpanel"
            aria-labelledby="addmoney-tab">
            <div class="col-12 mx-auto">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Mã Giao Dịch</th>
                      <th scope="col">Số Hóa Đơn</th>
                      <th scope="col">Ngân Hàng</th>
                      <th scope="col">Số Tiền (VND)</th>
                      <th scope="col">Thời gian</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($payment as $key => $pmt)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>
                          {{$pmt->trade_code}}
                          <?php
                           $date = date('d',strtotime('now'))-date('d',strtotime($pmt->datetime)) ;
                           if( intval(date('d',strtotime($date))) <=1 ){
                              echo '<span class="badge badge-pill badge-success">Mới</span>';
                           }
                          ?>
                        </td>
                        <td>{{$pmt->bank_trans_no}}</td>
                        <td>{{$pmt->bank_code}}</td>
                        <td>
                            <span class="float-left" >{{number_format($pmt->amount)}}</span>
                        </td>
                        <td>{{$pmt->datetime}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footerScripts')

@endsection


