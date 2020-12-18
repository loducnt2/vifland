<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
{{-- css --}}
<style>
   span.error3 {
       color:red;
       font-size:12px;
    /* margin-left: 6px; */
    /* height:17px; */
    /* background: url('http://i45.tinypic.com/f9ifz6.png') no-repeat left center; */
}
label.error {
    position: absolute;
    top:60px;
    left:20px;
    color:red;
    font-size:12px;
}
   </style>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js
"></script>

    <footer id="newsletterform">
        <div class="footer-block">
            <div class="max-width-container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-box">
                            <div class="img"><img class="lazyload"
                                    data-src="{{asset('assets/logo/logo-footer-300.png')}}" alt=""></div>
                            <ul class="list-items">
                                <li class="list-item"><span class="material-icons">location_on</span>
                                    <p>152/1A Nguyễn Văn Thương, Phường 25, Quận Bình Thạnh, Tphcm</p>
                                </li>
                                <li class="list-item"><span class="material-icons">call</span>
                                    <p>Hotline: 0869 092 929</p>
                                </li>
                                <li class="list-item"><span class="material-icons">email</span>
                                    <p>tuvan@vifland.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-box list">
                            <h4 class="title-footer">Liên kết nhanh</h4>
                            <ul class="list-items">
                                <li class="list-item"> <a href="/about">Giới thiệu</a></li>
                                <li class="list-item"> <a href="/contact">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-box list">
                            <h4 class="title-footer">Tin bất động sản</h4>
                            <ul class="list-items">
                                <?php
                                $danhmuc = App\Models\NewsCategory::all();
                                ?>
                                @foreach ($danhmuc as $item)
                                <li class="list-item"> <a href="/tin-tuc/danh-muc/{{$item->slug}}">{{$item->category_name}} </a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-box list">
                            <h4 class="title-footer">Đăng ký nhận bản tin</h4>
                            <p class="small-text">Vui lòng để lại địa chỉ email để nhận thông tin mới nhất về Bất Động
                                Sản</p>
                            <div class="btn-wrap-submit">
                                <input class="input-footer" type="text" placeholder="Nhập địa chỉ email...">
                                <button class="arrow_submit" type="submit"></button>
                            </div>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </footer>
    {{-- modal --}}
    <!-- Button trigger modal -->


    <!-- Modal -->
    <form action="" method="post" enctype="multipart/form-data" id="locationForm">
    <div class="modal  fade modal-location" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đăng kí thư tin tức</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">

                        {{ csrf_field() }}
                    <div class="form-group">
                        <input class="email form-control " type="text" name="email3" id="email3" placeholder ="Nhập địa chỉ email...">

                        <label for="text" class="error4"></label>
                        <select class="form-control" name="location" id="location" required>

                            {{-- <option value="0" >Vui lòng chọn 1 tỉnh/ thành phố</option> --}}
                        <?php $province = App\Models\Province::all()  ?>

                        @foreach ($province as $item)
                            <option value="{{$item->name}}"> {{$item->name}}</option>
                        @endforeach
                      </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>

            </div>
        </div>
    </div>
</form>
<script>
    // $('#userTable').on("click", ".btn-user-delete", function (e) {
$('#newsletterform').on("click",".input-footer",function(e){
    e.preventDefault();
    $('.modal-location').modal('show');
    $('#locationForm').attr('action', "/sub");
    $('#location').select2({
        width :'100%'
    });


})
</script>


<script>
    // validate email phải có đuôi @gmail đằng sau
    jQuery.validator.addMethod("end_with", function(value, element) {

if (/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i.test(value)) {
    return true;
} else {
    return false;
}
}, "Email không đúng định dạng!.");
// thêm class
    $('#locationForm').validate({
        errorPlacement: function(label, element) {
        label.addClass('error3');
        label.insertAfter(element);
    },

    wrapper: 'span',
rules: {

    'email3': {
        email: true,
        end_with: true,
        required: true,
        maxlength: 255

    },

},
messages: {

    'email3': {
        required: "Email không được để trống",
        email: "Nhập đúng định dạng Email",
        end_with: "Email phải có định dạng ....@gmail.com"

    },

},

});
</script>
</form>
