  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
{{-- script --}}


{{-- slug --}}
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
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
{{-- form-table --}}

    {{-- xoá danh mục --}}
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
<script>
    function refreshTable(){
        if ($(this).parent().hasClass("off")) {
            toastr.error('Vô hiệu hoá User', 'title')

    }else{
        toastr.success('Cho phép user hoạt động', 'title')
        this.fadeout();
    }

    }
</script>
<script>
    //   insert record ajax
      $('#myform').submit(function(e){
          e.preventDefault();
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

                <td> <value={{`+data.id+`}} data-id="`+data.id+`" class="btn btn-danger btn-delete">Xoá</a></td>
                <td> <value={{`+data.id+`}} data-id="`+data.id+`" class="btn btn-danger btn-edit" data-category_name=`+data.category_name+`>Sửa</a></td>
                </tr>`

                // edit record

                );
            },
            error: function(error){
                console.log(error);
            },
        })
        })
    </script>
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

{{-- button edit record --}}

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
