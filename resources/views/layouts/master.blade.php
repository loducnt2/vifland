<!DOCTYPE html>
<html class="overflow-hidden">

<head>
    @section('title','Trang chủ')
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/core.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/update.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/favicon.ico')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css"> -->
    @yield('headerStyles')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

</head>

<body>


    @include('layouts.logo_animation')
    <div class="ov-h" id="wrapper">
        @include('layouts.topbar')
        @yield('content')
        @include('layouts.footer')
    </div>
    <div id="searchfancybox" style="display: none;">
        <div class="container">
            <div class="content">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Tìm sản phẩm...">
                    <button class="searchbutton btn btn__search"><em class="material-icons">search</em></button>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap-modal-dangnhap">
        <div class="modal fade" id="dangnhapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <h3 class="title">Đăng nhập</h3>
                    <p>Bạn cần đăng nhập để sử dụng chức năng này. Bạn có muốn đăng nhập không?</p>
                    <div class="wrap-button">
                        <button class="btn-huy" type="button" data-dismiss="modal">Hủy</button><a class="btn-login" href="\login">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/core.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js
"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            if (!$('.btn__header').hasClass('login1')) {
                $.ajax({
                    url: '{{route("all-favorite")}}',
                    type: 'GET',
                    success: function(data, status) {
                        let arr = [];
                        data.forEach(function(item, index, array) {
                            arr.push(item.id)
                        })
                        let countfav = arr.length;
                        if (countfav == 0) {
                            $('.number-yt').css('display', 'none')
                        } else {
                            $('.number-yt').text(countfav)
                            $('.number-yt').css('display', 'flex')
                        }
                        $('.fav').each(function() {
                            var productid = parseInt($(this).attr('productid'));
                            if (arr.indexOf(productid) != -1) {
                                $(this).addClass('ri-heart-fill')
                                $(this).addClass('active')
                                $(this).removeClass('ri-heart-line')
                            } else {
                                $(this).removeClass('ri-heart-fill')
                                $(this).removeClass('active')
                                $(this).addClass('ri-heart-line')
                            }
                        })

                    }
                })
            }
            // Header

            $('.number-yt').css('display', 'none')
            // Chức năng yêu thích

            $(".fav").click(function() {
                if ($(this).hasClass("ri-heart-line")) {
                    $(this).addClass("ri-heart-fill")
                    $(this).addClass("active")
                    $(this).removeClass("ri-heart-line");
                    let productid = $(this).attr('productid');
                    $.ajax({
                        url: '{{ route("add-favorite") }}',
                        type: 'POST',
                        data: {
                            productId: productid,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data, status) {
                            //Chưa đăng nhập
                            console.log(data)
                            if (data == 0) {
                                $("#dangnhapModal").modal("show");
                                $('.fav').addClass("ri-heart-line");
                                $('.fav').removeClass("ri-heart-fill");
                                $('.fav').removeClass("active")
                            }
                            if (data == 1) {
                                //Thích sản phẩm,
                            }
                            if (data == 2) {
                                //Bỏ thích sản phẩm
                            }
                        }
                    })
                } else if ($(this).hasClass("ri-heart-fill")) {
                    $(this).addClass("ri-heart-line");
                    $(this).removeClass("ri-heart-fill");
                    $(this).removeClass("active")
                    let productid = $(this).attr('productid');
                    $.ajax({
                        url: '{{ route("add-favorite") }}',
                        type: 'POST',
                        data: {
                            productId: productid,
                            _token: "{{ csrf_token() }}"
                        },
                    success: function(data, status) {
                        //Chưa đăng nhập
                        console.log(data)
                        if (data == 0) {
                            $("#dangnhapModal").modal("show");
                            $('.fav').addClass("ri-heart-line");
                            $('.fav').removeClass("ri-heart-fill");
                            $('.fav').removeClass("active")
                        }
                        if (data == 1) {
                            //Thích sản phẩm,
                        }
                        if (data == 2) {
                            //Bỏ thích sản phẩm
                        }
                    }
                    })
                }
                $.ajax({
                    url: '{{route("all-favorite")}}',
                    type: 'GET',
                    success: function(data, status) {
                        let arr = [];
                        data.forEach(function(item, index, array) {
                            arr.push(item.id)
                        })
                        let countfav = arr.length;
                        if (countfav == 0) {
                            $('.number-yt').css('display', 'none')
                        } else {
                            $('.number-yt').text(countfav)
                            $('.number-yt').css('display', 'flex')
                        }

                    }
                })
            });
            // End Favorites
            if ($.cookie('compare') != null) {
                let checkcookie = $.cookie('compare')
                if (checkcookie.length == 0) {
                    $.removeCookie('compare')
                }
            }

            $('.number-ss').css('display', 'none')
            $('.comp').each(function() {
                $(this).click(function() {
                    if ($.cookie('compare')) {
                        let listcomp = $.cookie('compare').split(',')
                        let productid = $(this).attr('productid')
                        if (listcomp.indexOf(productid) != -1) {
                            listcomp.splice(listcomp.indexOf(productid), 1)

                            $(this).removeClass('active')
                            if (listcomp.length == 0) {
                                $('.number-ss').css('display', 'none')
                            } else {
                                $('.number-ss').css('display', 'flex')
                                $('.number-ss').text(listcomp.length)
                            }
                        } else {

                            listcomp.push(productid);

                            $(this).addClass('active')
                            $('.number-ss').css('display', 'flex')
                            $('.number-ss').text(listcomp.length)

                        }
                        $.cookie('compare', listcomp.join())

                    } else {

                        let listcomp = []
                        let productid = $(this).attr('productid')
                        listcomp.push(productid);
                        $(this).addClass('active')
                        $.cookie('compare', listcomp.join())

                        $('.number-ss').text(listcomp.length)
                        $('.number-ss').css('display', 'flex')

                    }
                })

                if ($.cookie('compare')) {
                    let listcomp = $.cookie('compare').split(',')
                    $('.number-ss').css('display', 'flex')
                    $('.number-ss').text(listcomp.length)

                    let productid = $(this).attr('productid')
                    if (listcomp.indexOf(productid) != -1) {
                        $(this).addClass('active')
                    } else {
                        $(this).removeClass('active')
                    }
                }
            })

            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
            @endif

        })
    </script>
    <!-- Start of vifland Zendesk Widget script -->
    <!-- <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=ae2d826d-80a8-4bbb-a747-5800e00577c1">
    </script> -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5fdeddbca8a254155ab4e493/1epv94psg';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <!-- End of vifland Zendesk Widget script -->

    @yield('footerScripts')
</body>

</html>