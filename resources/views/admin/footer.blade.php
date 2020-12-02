  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  {{-- <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  <script src="{{asset('js/core.min.js') }}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/bootstrap-toggle.js')}}"></script>
<script src="{{asset('js/ckeditor.js')}}"></script>

<script>
    function ChangeToSlug()
    {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("title").value;

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”

        document.getElementById('slug').innerHTML = slug;
        document.getElementById('slug2').value=slug;

    }

</script>
{{-- </script> --}}
{{-- danh mục --}}
    <script>
        $( document ).ready(function() {
            $('input').on('itemAdded', function(event) {
        //   thêm item

         var t=$("#tag").val();
         $('#tags').html(t);

        });
        $('input').on('itemRemoved', function(event) {
            $t=$("#tag").val()
        console.log($t);
        });
        });
    </script>

{{-- toggle-bootstrap-bar --}}
<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/admin/changestatus',
              data: {'status': status, 'id':id},
              success: function(data){
                console.log(data.success)
                location.reload();

                // console.log('thực thi');

              }
          });
      })
    })
</script>
<script>
    function refreshTable(){
        var status = $('.toggle-class').prop('checked')
        console.log(status);
        if(status === true){

            toastr.success("Người dùng có thể hoạt động");
            $('p').html("Hoạt động");

        }
        else{
            toastr.error("Người dùng bị dừng hoạt động");
            $('p').html("Bị ban");
        }
    }
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
{{-- quản lý danh mục --}}
{{-- 1.1 Xoá danh mục khi bấm vào nút xoá --}}
    <script>
    function deletePost(event) {
   alert('Element ID');
   var id  = $(event).data("id");
    let _url = `/category/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: 'DELETE',
        data: {
          _token: _token
        },
        success: function(response) {
          $("#row_"+id).remove();
        }
      });
  }
    </script>

{{-- 1.2 Thêm danh mục mới--}}

{{-- Xoá Record --}}
<script>
$('#myTable').on("click", ".btn-delete", function(){
    var id = $(this).data("id");
    var $ele = $(this).parent().parent();

    console.log(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
    {
        url: "/admin/index/danh-muc-tin-tuc/xoa-danh-muc/" +id,
        type: 'delete',
        dataType: "JSON",
        data: {
            "id": id
        },
        success: function (response)
        {

            $ele.fadeOut().remove();
            toastr.success('Xoá thành công','Quản trị viên');
            },
        error: function(error) {
         console.log(error);

       }
    });
});
    </script>

<script>
    CKEDITOR.replace('contents');

      $(document).on({'show.bs.modal': function () {
                 $(this).removeAttr('tabindex');
      } }, '.modal');
</script>
{{-- select2 --}}
<script>
    $("#tag2").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})
</script>
<script>
    $('.modal').on("click", "#save-button", function(e){
        console.log('asdasdsad');
    });

</script>


{{-- 1 - Event khi user click vào nút model --}}
<script>

    $("#myTable").on('click','.btn-edit',function(e){
        var id = $(this).data('id');
        var category_name = $(this).data('category_name');

        e.preventDefault();

        $('.modal').modal('show');

        $('input[name=category_name]').val(category_name);

        $('input[name=category_id]').val(id);
        console.log(id);
        console.log(category_name);
    })
</script>

{{-- 1-2 Khi user click vào nút save để lưu thông tin --}}
<script>
    $("body").on('click','.btn-save',function(e){
        e.preventDefault();
        var category_name = $('input[name=category_name]').val();
        var id = $('input[name=category_id]').val();

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
    {
        url: "/admin/index/danh-muc-tin-tuc/sua-danh-muc/" +id,
        type: 'PUT',
        dataType: "JSON",
        data: {
            "id": id,
            "category_name" : category_name
        },
        success: function (response)
        {
            console.log(response);
            $('.modal').modal('hide');
            // setInterval('location.reload()', 100);
            $(this).fadeOut();
            var refInterval = window.setTimeout('location.reload()',1);

            },
        error: function(error) {
         console.log(error);
        }
    });
});
</script>

{{-- quản lý tin tức --}}
{{-- 1 - Event khi user click vào nút model --}}

<script>
    $("#myTable").on('click','.btn-news-edit',function(e){
        var id = $(this).data('id');
        // id.find( '*:not(a,img)' ).remove();
        var title = $(this).data('title');
        var content = $(this).attr('data-content');
        e.preventDefault();

        $('.modal').modal('show');
// truyền vào text input theo name
        $('input[name=title]').val(title);
        $('input[name=id]').val(id);
        CKEDITOR.instances.contents.setData("" +content);


        console.log("ID =" + id);
        console.log("Title =" +  title);
        console.log("Content = "+content);
    })
    </script>
    {{-- 1-2 Khi user click vào nút save để lưu thông tin --}}

    <script>

    $("body").on('click','.btn-news_save',function(e){
        e.preventDefault();
        var title = $('input[name=title]').val();
        var id = $('input[name=id]').val();
        // var content = $('input[name="content"]').val();
        var content = CKEDITOR.instances['contents'].getData();

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
    {
        url: "/admin/index/danh-muc-tin-tuc/sua-tin-tuc/" +id,
        type: 'PUT',
        dataType: "JSON",
        data: {

            "id": id,
            "title":title,
            "content" : content,
            // "slug" :slug,
        },
        success: function (response)
        {
            console.log(response);
            $('.modal').modal('hide');
            $(this).fadeOut();
            var refInterval = window.setTimeout('location.reload()',1);

            },
        error: function(error) {
         console.log(error);
        }
    });
});
</script>

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
{{-- delete record --}}
<script>
    $('#myTable').on("click", ".btn_news-delete", function(){
        var id = $(this).data("id");
        var $ele = $(this).parent().parent();

        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: "/admin/index/danh-muc-tin-tuc/xoa-tin-tuc/" +id,
            type: 'delete',
            dataType: "JSON",
            data: {
                "id": id
            },
            success: function (response)
            {

                $ele.fadeOut().remove();
                toastr.success('Xoá thành công','Quản trị viên');
                },
            error: function(error) {
             console.log(error);

           }
        });
    });
</script>

<script>
$(document).ready(function() {

$.validator.addMethod("check",

    function(data,value) {
        var category_name = $('#myform input[name="category_name"]').val();
        $('input[name=category_name_hidden]').val(category_name);
        var input = $('#myform input[name="category_name_hidden"]').val();
        // console.log(category_name);
        var result = true;
        // false tức là có record trong database
        // true là không có record
        $.ajax({
            type:"POST",
            async: true,
            url: "/admin/index/danh-muc-tin-tuc/checkunique=" + input,  // url check unique trong laravel

            data: {input: input},
            success: function(data) {
                console.log("Thành công");
            },
            error:function(error){
                    console.log(error);
            },
        });
        return result;

    },
    "This username is already taken! Try another."
);
});
</script>

<script>
    $('#myform').validate({
        rules: {

    'category_name': {
         required: true,
         check:false
        },
        },
        messages: {
            'category_name': {
                required: "Tên danh mục không được để trống",
                check:"Tên danh mục đã bị trùng "
            },
        },

        submitHandler: function(e) {

        let formData = {

            category_name : $("#category_name").val(),
            slug : $("#slug2").val()
        };
            $.ajax({
            // setup ajax
            type:'POST',
            url: '/admin/danh-muc-tin-tuc/them-moi/',
            data: formData,
            success: function(data){
                $('#myTable').prepend(`<tr>
                <td>`+data.id+`</td>
                <td>`+data.slug+`</td>
                <td>`+data.category_name+`</td>
                <td>`+data.status+`</td>

                <td>
                    <a href="" data-id="`+data.id+`" data-category_name="`+data.category_name+`"class="btn btn-danger btn-edit">Sửa</a>
                        <a href="" data-id="`+data.id+`" class="btn btn-danger btn-delete">Xoá</a> </td>
                </tr>`

                // edit record

                );
            },
            error: function(error){
                alert("Lỗi");
            },
        });
        }

        });
</script>

{{-- check unique user thông qua url server --}}
{{-- ẩn /hiện bài tin --}}
<script>
    $(function() {
      $('.toggle-class-news').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/admin/quan-li-tin-tuc/changestatus',
              data: {'status': status, 'id':id},
              success: function(data){
                console.log(data.success)
                location.reload();

                // console.log('thực thi');

              }
          });
      })
    })
</script>
<script>
    function refreshTable(){
        var status = $('.toggle-class').prop('checked')
        console.log(status);
        if(status === true){

            toastr.success("Người dùng có thể hoạt động");
            $('p').html("Hoạt động");

        }
        else{
            toastr.error("Người dùng bị dừng hoạt động");
            $('p').html("Bị ban");
        }
    }
</script>
{{--  --}}

<script>
    $('#myTable' ).on("change", ".toggle-class-news", function(){
        // get id
        var id = $(this).data('id');
        var toggle = $('p[data-id]');
        var status = $('.toggle-class-news').prop('checked');
        console.log(status);
        if(status === true){

            toastr.success("Hiện tin tức");
            $("p").html("Hiện");

        }
        else{
            toastr.error("Ẩn tin tức");
            $("p").html("Hiện 2");
        }
    })
        </script>
