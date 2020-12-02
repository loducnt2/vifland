@extends('admin.sidebar')
@section('title','Nạp tiền')
@section('content')
    <div class="container">
        <h2>Bảng thống kê thanh toán</h2>
        <table class="table table-bordered">
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
                        <td>{{$pmt->trade_code}}</td>
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
{{ $payment->links() }}

    </div>
@endsection