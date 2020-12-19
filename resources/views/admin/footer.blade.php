  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  {{-- <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  <script src="{{asset('js/core.min.js') }}"></script>
  <script src="{{asset('js/scripts.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.12.5/sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
  {{-- thêm validate --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"></script> --}}
  <script src="{{asset('js/ckeditor.js')}}"></script>
  {{-- Style --}}
  <style>
.disabled {
    background-color: #F1F1F1 !important;
    color: gray;
    font-size: 14px;
}

.enabled {
    background-color: #ffffff !important;
    color: black;
    font-size: 14px;
}

.answered {
    background-color: #F1F1F1 !important;
    color: gray;
    font-size: 14px;
}

.not-answered {
    background-color: #ffffff !important;
    color: black;
    font-size: 14px;
}
  </style>

  {!! Toastr::message() !!}
  {{-- end style --}}
  <script>
function ChangeToSlug() {
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
    document.getElementById('slug2').value = slug;

}
  </script>

  <!-- Danh mục -->



  <script>
$(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/changestatus',
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
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
  <!-- {{-- quản lý danh mục --}}
  {{-- 1.1 Xoá danh mục khi bấm vào nút xoá --}} -->

  <!-- {{-- 1.2 Thêm danh mục mới--}}

  {{-- Xoá Record --}} -->
  <script>
//   CKEDITOR.replaceAll();
$(document).on({
    'show.bs.modal': function() {
        $(this).removeAttr('tabindex');
    }
}, '.modal');
  </script>
  <!-- {{-- select2 --}} -->
  <!-- {{-- 1 - Event khi user click vào nút model --}} -->
  <script>
$("#myTable").on('click', '.btn-edit', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var category_name = $(this).attr('data-category_name');
    console.log(category_name);
    e.preventDefault();

    $('.modal').modal('show');

    $('input[name=category_name]').val(category_name);

    $('input[name=category_id]').val(id);
    console.log(id);
    console.log(category_name);
})
  </script>

  <!-- {{-- 1-2 Khi user click vào nút save để lưu thông tin --}} -->
  <script>
$("body").on('click', '.btn-save', function(e) {
    e.preventDefault();
    var category_name = $('input[name=category_name]').val();
    var id = $('input[name=category_id]').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/admin/index/danh-muc-tin-tuc/sua-danh-muc/" + id,
        type: 'PUT',
        dataType: "JSON",
        data: {
            "id": id,
            "category_name": category_name
        },
        success: function(response) {
            console.log(response);
            $('.modal').modal('hide');
            // setInterval('location.reload()', 100);
            $(this).fadeOut();
            var refInterval = window.setTimeout('location.reload()', 1);

        },
        error: function(error) {
            console.log(error);
        }
    });
});
  </script>
  <!--
  {{-- quản lý tin tức --}}
  {{-- 1 - Event khi user click vào nút model --}} -->

  <script>
$("#myTable").on('click', '.btn-news-edit', function(e) {
    var id = $(this).data('id');
    // id.find( '*:not(a,img)' ).remove();
    var title = $(this).data('title');
    var content = $(this).attr('data-content');
    e.preventDefault();

    $('.modal').modal('show');
    // truyền vào text input theo name
    $('input[name=title]').val(title);
    $('input[name=id]').val(id);
    CKEDITOR.instances.contents.setData("" + content);


    console.log("ID =" + id);
    console.log("Title =" + title);
    console.log("Content = " + content);

})
  </script>
  <!-- {{-- 1-2 Khi user click vào nút save để lưu thông tin --}} -->

  <script>
$("body").on('click', '.btn-news_save', function(e) {
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
    $.ajax({
        url: "/admin/index/danh-muc-tin-tuc/sua-tin-tuc/" + id,
        type: 'PUT',
        dataType: "JSON",
        data: {

            "id": id,
            "title": title,
            "content": content,
            // "slug" :slug,
        },
        success: function(response) {
            console.log(response);
            $('.modal').modal('hide');
            $(this).fadeOut();

            var refInterval = window.setTimeout('location.reload()', 1);

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
$(document).ready(function() {

    $.validator.addMethod("check",

        function(data, value) {
            var category_name = $('#myform input[name="category_name"]').val();
            $('input[name=category_name_hidden]').val(category_name);
            var input = $('#myform input[name="category_name_hidden"]').val();
            // console.log(category_name);
            var result = true;
            // false tức là có record trong database
            // true là không có record
            $.ajax({
                type: "POST",
                async: true,
                url: "/admin/index/danh-muc-tin-tuc/checkunique=" +
                    input, // url check unique trong laravel

                data: {
                    input: input
                },
                success: function(data) {
                    console.log("Thành công");
                },
                error: function(error) {
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
$('#category_form').validate({
    rules: {

        'category_name': {
            required: true,
            check: false
        },
    },
    messages: {
        'category_name': {
            required: "Tên danh mục không được để trống",
            check: "Tên danh mục đã bị trùng "
        },
    },

    submitHandler: function(e) {

        let formData = {

            category_name: $("#category_name").val(),
            slug: $("#slug2").val()
        };
        $.ajax({
            // setup ajax
            type: 'POST',
            url: '/admin/danh-muc-tin-tuc/them-moi/',
            data: formData,
            success: function(data) {
                $('#myTable').prepend(`<tr>
                <td>` + data.id + `</td>
                <td>` + data.slug + `</td>
                <td>` + data.category_name + `</td>
                <td>` + data.status + `</td>

                <td>
                    <a href="" data-id="` + data.id + `" data-category_name="` + data.category_name + `"class="btn btn-danger btn-edit">Sửa</a>
                        <a href="" data-id="` + data.id + `" class="btn btn-danger btn-delete">Xoá</a> </td>
                </tr>`

                    // edit record

                );
            },
            error: function(error) {
                alert("Lỗi");
            },
        });
    }

});
  </script>

  {{-- Ban/unban user --}}
  <script>
$(function() {
    $('#table').on("change", ".btn-user", function() {
        var id = $(this).data('id');
        var status = $(this).prop('checked') == true ? 1 : 0;
        $.ajax({
            type: "GET",
            url: '/admin/changestatus',
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                if (status === 1) {
                    toastr.success("Người dùng có thể hoạt động");
                    $('#status-' + id).html("Hoạt động");
                } else {
                    toastr.error("Người dùng bị dừng hoạt động");
                    $("#status-" + id).html("Bị ban");
                }
            },
            //  báo lỗi
            error: function(error) {
                console.log(error);
            },
        });
    });

})
  </script>


  <script>
$(function() {
    $('#myTable').on("change", ".btn-news", function() {
        var id = $(this).data('id');
        var status = $(this).prop('checked') == true ? 1 : 0;
        $.ajax({
            type: "GET",
            url: '/admin/danh-sach-tin-tuc/changestatus/',
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                if (status === 1) {
                    toastr.success("Hiện");
                    $('#status-' + id).html("Hiện");
                    $('#table-' + id).removeClass("disabled").addClass("enabled");
                } else {
                    toastr.error("Ẩn");
                    $("#status-" + id).html("Ẩn");
                    $('#table-' + id).removeClass("enabled").addClass("disabled");

                }
            },
            //  báo lỗi
            error: function(error) {
                console.log(error);
            },
        });
    });

})
  </script>

  <script>
function getDataSelect(id, id_city) {
    $.ajax({
        url: "/admin/index/quan-ly-thu-tin-tuc/products/" + id + "/" + id_city,
        type: 'GET',
        dataType: 'JSON',
        success: function(result) {
            if (result.length > 0) {
                let option_html = '';
                $.each(result, function(key, product) {
                    option_html +=
                        `<option id="${product.id}" class="products">${product.title}</option>`;
                });
                $('#productFilter').html(option_html);
                $('#productFilter').trigger('click');
            } else {
                toastr.error('Dữ liệu không có', 'Thông báo');
            }
        },
        error: function(errors) {
            console.log(errors);
        }
    });
}
$('#myTable').on("click", ".btn-sendmail-one", function(e) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    var idcity = $(this).data('id_city');
    var id = $(this).data('id');
    var email = $(this).data('email');
    var city = $(this).data('city');
    console.log(id);
    console.log(idcity);
    console.log(city);
    $('input[name=email]').val(email);
    $('#city').val(city);
    $('#modelId_one').modal('show');
    $('#productFilter').select2({
        theme: 'bootstrap4',
        maximumSelectionSize: '4'
    });

    getDataSelect(id, idcity);

});
  </script>
  <script>
$('#letter-form').on('submit', function() {
    var minimum = 1;

    if ($("#productFilter").select2('data').length >= minimum) {
        toastr.success('Hợp lệ! ', 'Thông báo');
        return true;
    } else {
        toastr.warning('Vui lòng chọn ít nhất 1 tin bất động sản ', 'Thông báo');
        return false;
    }
})
  </script>
  <script>
$('#productFilter').select2().on('select2:open', function() {
    $('.select2-search__field').attr('maxlength', 10);
});
  </script>
  {{-- patch xoá tag bằng nút backspace --}}
  <script>
$.fn.select2.amd.require(['select2/selection/search'], function(Search) {
    var oldRemoveChoice = Search.prototype.searchRemoveChoice;
    Search.prototype.searchRemoveChoice = function() {
        oldRemoveChoice.apply(this, arguments);
        this.$search.val('');
    };
});
  </script>
  {{-- thay đổi cấu trúc CSS khi chọn kết quả trong select2 --}}
  <script>
$("#productFilter").on({
    "select2:select": function(e) {
        $("li[aria-selected='true']").addClass("customclass");
        $("li[aria-selected='false']").removeClass("customclass");
    },
    "select2:opening": function(e) {
        setTimeout(function() {
            $("li[aria-selected='true']").addClass("customclass");
            $("li[aria-selected='false']").removeClass("customclass");
        }, 0)
    },
    "select2:unselect": function(e) {
        $("li[aria-selected='false']").removeClass("customclass");
    }
});
  </script>


  <script>
$(document).on('change', '.custom-file-input', function(event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
})
  </script>

  {{-- function Unsub --}}
  <script>
function unsub(email, $ele) {
    // var $ele = $(this).parent.parent();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/admin/index/quan-ly-thu-tin-tuc/unsub/" + email,
        type: 'DELETE',
        data: {

            "email": email
        },
        success: function(response) {
            // success

            $ele.fadeOut().remove();
            toastr.success('Huỷ đăng kí thành công', 'Quản trị viên');
        },
        error: function(error) {
            console.log(error);
            // error.preventDefault();
        }
    });
}
  </script>
  {{-- unsub --}}
  <script>
$('#myTable').on("click", ".btn-unsub", function(e) {
    e.preventDefault();
    var $ele = $(this).parent().parent();
    var idcity = $(this).data('id_city');
    var id = $(this).data('id');
    var email = $(this).data('email');
    var city = $(this).data('city');
    console.log(id);
    console.log(email);
    // then sweet alert fire
    Swal.fire({
        title: 'Thông báo?',
        text: "Bạn muốn huỷ đăng kí?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8072EA',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Huỷ đăng kí'
    }).then((result) => {
        if (result.isConfirmed) {

            unsub(email, $ele);
        }
    })
})
  </script>
  {{-- xoá tin tức --}}
  <script>
$('#myTable').on("click", ".btn_news-delete", function(e) {
    e.preventDefault();
    var id = $(this).data("id");
    var $ele = $(this).parent().parent();
    console.log(id);
    Swal.fire({
        title: 'Thông báo',
        text: "Bạn muốn xoá bài viết này?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8072EA',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xoá bài'
    }).then((result) => {
        if (result.isConfirmed) {

            delete_post(id, $ele);
        }
    })
});
  </script>

  <script>
function delete_post(id, $ele) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/admin/index/danh-muc-tin-tuc/xoa-tin-tuc/" + id,
        type: 'DELETE',
        // dataType: "Json",
        data: {
            "id": id
        },
        success: function(response) {

            $ele.fadeOut().remove();
            toastr.success('Xoá thành công bài viết thành công', 'Quản trị viên');
        },
        error: function(error) {
            console.log(error);

        }
    });
}
  </script>
  {{-- danh mục --}}
  <script>
$('#myTable').on("click", ".btn-delete", function(e) {
    e.preventDefault();
    var id = $(this).data("id");
    var category = $(this).data("category_name");
    console.log(category);
    var $ele = $(this).parent().parent();
    console.log(id);
    console.log(id);
    Swal.fire({
        title: 'Thông báo',
        text: "Bạn muốn xoá danh mục  " + category,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8072EA',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xoá danh mục'
    }).then((result) => {
        if (result.isConfirmed) {

            delete_Category(id, $ele);
        }
    })
});
  </script>

  <script>
function delete_Category(id, $ele) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/admin/index/danh-muc-tin-tuc/xoa-danh-muc/" + id,
        type: 'get',
        dataType: "json",
        data: {
            "id": id
        },
        success: function(response) {
            var number = JSON.parse(response);
            console.log(typeof(number));
            // typeof của number = number
            if (number > 0) {

                toastr.warning("Bạn còn " + number + " bài viết chưa xoá");
                console.log('Không thể xoá được danh mục');
            }
            // nếu không còn tin
            else {
                $ele.fadeOut().remove();
                toastr.success("Xoá thành công!");
                console.log('Có thể xoá được danh mục');
            }

        },
        error: function(error) {
            console.log(error);

        }
    });
}
  </script>

  {{-- user  --}}
  <script>
function deleteUser(id, $ele, username) {
    // var $ele = $(this).parent.parent();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/admin/index/profile/delete/" + username,
        type: 'DELETE',
        data: {
            "id": id,
            "username": username

        },
        success: function(response) {
            // success

            $ele.fadeOut().remove();
            toastr.success('Xoa user thành công', 'Quản trị viên');
        },
        error: function(error) {
            console.log(error);
            // error.preventDefault();
        }
    });
}
  </script>

  <script>
$('#userTable').on("click", ".btn-user-delete", function(e) {
    e.preventDefault();
    var $ele = $(this).parent().parent();
    var username = $(this).data('username');
    var id = $(this).data('id');
    // var city = $(this).data('city');
    console.log(id);

    // then sweet alert fire
    Swal.fire({
        title: 'Thông báo?',
        text: "Bạn muốn xoa' username ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8072EA',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Huỷ đăng kí'
    }).then((result) => {
        if (result.isConfirmed) {

            deleteUser(username, id, $ele);
        }
    })
})
  </script>

  {{-- xoá tin duyệt bằng tin --}}
  <script>
function deleteDuyettin(productid, $ele) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({

        url: "/admin/danh-sach-duyet-tin/delete/" + productid,
        //    data: "data",
        type: 'DELETE',
        dataType: "Content-Type: application/javascript",
        data: {
            // "id" :id,
            "productid": productid

        },

        success: function(response) {
            // success
            $ele.fadeOut().remove();
            toastr.success('Xoá tin duyệt thành công', 'Thông báo');
        },
        error: function(error) {
            console.log(error);
            // error.preventDefault();
        }
    });
}
  </script>
  <script>
$('#duyettinTable').on("click", ".btn-delete-duyettin", function(e) {
    e.preventDefault();
    var $ele = $(this).parent().parent();
    // var id = $(this).data('id');
    var productid = $(this).data('productid');
    console.log(productid);

    // then sweet alert fire
    Swal.fire({
        title: 'Thông báo?',
        text: "Bạn muốn xoá duyệt tin ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8072EA',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xoá tin duyệt'
    }).then((result) => {
        if (result.isConfirmed) {

            deleteDuyettin(productid, $ele);
        }
    })
})
  </script>

  {{-- content --}}
  <script>
// get thông tin content
$("#myTable").on('click', '.btn-contact-detail', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var content = $(this).attr("data-content");
    var name = $(this).data("name");
    var email = $(this).data("email");
    console.log(name);
    $('#contact-detail').modal('show');
    $('input[name=email]').val(email);
    $('input[name=name]').val(name);
    $('textarea[name=content]').val(content);
})
  </script>
  {{-- end content --}}
  {{-- email --}}
  <script>
$("#myTable").on('click', '.btn-mail-contact', function(e) {
    //
    // $("#contact-form").attr('action',$("#contact-form").attr('action')+ "/tests");

    e.preventDefault();
    var id = $(this).data('id');
    var content = $(this).attr("data-content");
    var name = $(this).data("name");
    var email = $(this).data("email");
    console.log(name);
    $('#send-email-form').modal('show');
    $('input[name=email]').val(email);
    $('#myForm').attr('action', "/admin/danh-sach-contact/phanhoi/" + id);
    // console.log($('#contactsForm').attr('action', "/admin/danh-sach-contact/phanhoi/"+id));
    $('input[name=name]').val(name);
    $('textarea[name=content]').val(content);
})
  </script>

  {{-- duyệt tin --}}
  <script>
$("#status").on("change", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr td[id='status']").filter(function() {
        $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
  </script>
  {{-- <script>
    CKEDITOR.replaceAll();
{{-- </script> --}}
  {{-- <script>
    CKEDITOR.replace('content');
</script> --}}
  <script>
$("#thongbao").validate({
    submitHandler: function(form) {
        return false;
    },
    onfocusout: false,
    onkeyup: false,
    onclick: false,
    rules: {
        "name": {
            required: true,

        },
        "noidung": {
            required: true,

        },
        "due_date": {
            required: true,


        }
    },
    messages: {
        "name": {
            required: "Bắt buộc nhập tiêu đề",

        },
        "noidung": {
            required: "Bắt buộc nhập nội dung",

        },
        "due_date": {
            required: "Yêu cầu nhập ngày tháng năm",

        }
    }
});
  </script>