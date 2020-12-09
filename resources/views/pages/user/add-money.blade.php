@extends('.pages.user.slidebar')
@section('title','Nạp tiền')
@section('headerStyles')
@section('content_child')
<?php $money = ""; ?>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="active nav-link active" id="addmoney-tab" data-toggle="tab" href="#addmoney" role="tab" aria-controls="nav-home" aria-selected="true">Nạp tiền vào tài khoản</a>
</div>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="addmoney" role="tabpanel" aria-labelledby="addmoney-tab">
        <div class="col-6 mx-auto">
            <form action="{{route('create-payment')}}" id="create_form" method="post">
                @csrf
                <div class="form-group">
                    <!-- <label for="language">Loại hàng hóa </label> -->
                    <select name="order_type" id="order_type" class="form-control" hidden="">
                        <!-- <option value="topup">Nạp tiền điện thoại</option> -->
                        <option value="billpayment" selected>Thanh toán hóa đơn</option>
                        <!-- <option value="fashion">Thời trang</option> -->
                        <!-- <option value="other">Khác - Xem thêm tại VNPAY</option> -->
                    </select>
                </div>
                <div class="form-group">
                    <!-- <label for="order_id">Mã hóa đơn</label> -->
                    <input hidden="" class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date('YmdHis') ?>" />
                </div>
                <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input class="form-control" id="amount" name="amount" type="number" value="10000" />
                </div>
                <div class="form-group">
                    <!-- <label for="order_desc">Nội dung thanh toán</label> -->
                    <textarea hidden class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
                </div>
                <div class="form-group">
                    <label for="bank_code">Ngân hàng</label>
                    <select name="bank_code" id="bank_code" class="form-control">
                        <option value="NCB" selected> Ngân hàng NCB</option>
                        <!--  <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option> -->
                    </select>
                </div>
                <div class="form-group">
                    <!-- <label for="language">Ngôn ngữ</label> -->
                    <select name="language" id="language" class="form-control" hidden="">
                        <option value="vn" selected="">Tiếng Việt</option>
                        <option value="en">English</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mx-auto p-2" id="btnPopup">Tiến hành thanh toán</button>
                    <button disabled hidden type="submit" class="btn btn-default">Thanh toán Redirect</button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('footerScripts')

@endsection