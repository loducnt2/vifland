<script
src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('js/core.min.js') }}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/datatables.js') }}"></script>
<script src="{{asset('js/bootstrap-toggle.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
<<<<<<< HEAD
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
=======
{{-- <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> --}}


>>>>>>> 545c2ac (Thọ- Thêm thanh thông báo, thay đổi mật khẩu thành công,)

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>


{{-- get thông tin dropdown-menu--}}
<<<<<<< HEAD
<script>
    function test(){
   var test= $("#category_dropdown option:selected").text();
   console.log(test);
  $("#category_news_slug").attr('value',test);
    }
  </script>
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
=======

>>>>>>> 545c2ac (Thọ- Thêm thanh thông báo, thay đổi mật khẩu thành công,)
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
            url: '/admin/danh-muc-tin-tuc/them-moi',
            data: formData,
            success: function(data){
                $('#myTable').prepend(`<tr>
                <td>`+data.id+`</td>
                <td>`+data.category_name+`</td>
                <td>`+data.slug+`</td>

                <td>`+data.status+`</td>
                <td>`+`<a name="" id="" class="btn btn-primary" href="{{`data.id`}}" data-id="{{`data.id`}}"role="button">Xoá</a>`+`</td>

                </tr>`);
            },
            error: function(error){
                console.log(error);
            },
        })
        })
    </script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
{{-- script delete record --}}
    {{-- <script>
        function delete(id)
        {
            $.ajax({
                url: 'admin/danh-muc-tin-tuc/xoa-danh-muc/'+ id,
                type:'DELETE',
                data:{
                    _token:$("#input[name=_token]").val();
                },
                success:function(response)
                {

                    console.log(url);
                    console.log('Deleted!');
                }
            });
        }
    </script> --}}
<<<<<<< HEAD

    {{-- quản lí tin tức --}}

    $(document).ready( function () {
      $('#table_id').DataTable();
  } );
  </script>
<script> 
 slideNav();
function slideNav() {
    $(".sb-topnav button").on("click", function() {
        // $("#layoutSidenav #layoutSidenav_nav").toggleClass("active");
        $("#layoutSidenav #layoutSidenav_nav").toggleClass("active");
    });
} 
</script>
=======
{{-- validate đăng tin --}}
{{-- validate --}}
>>>>>>> 545c2ac (Thọ- Thêm thanh thông báo, thay đổi mật khẩu thành công,)
