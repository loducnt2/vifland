<!DOCTYPE html>
<!-- <html class="overflow-hidden" lang="en"> -->
<html lang="en">

<head>
    @section('title','Trang chủ')
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/core.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/update.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/favicon.ico')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    @yield('headerStyles')
    <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

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
        <div class="modal fade" id="dangnhapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <h3 class="title">Đăng nhập</h3>
                    <p>Bạn cần đăng nhập để sử dụng chức năng này. Bạn có muốn đăng nhập không?</p>
                    <div class="wrap-button">
                        <button class="btn-huy" type="button" data-dismiss="modal">Hủy</button><a class="btn-login"
                            href="\login">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/core.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.min.js')}}"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        if( !$('.btn__header').hasClass('login1') ){
            $.ajax({
                url: '{{route("all-favorite")}}',
                type: 'GET',
                success: function(data, status) {
                    let arr = [];
                    data.forEach(function(item, index, array) {
                        arr.push(item.id)
                    })
                    let countfav = arr.length;
                    if( countfav == 0 ){
                        $('.number-yt').css('display','none')
                    }else{
                        $('.number-yt').text(countfav)
                        $('.number-yt').css('display','flex')
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
        $('.number-yt').css('display','none')
        $(".fav").click(function() {
            //$(this).toggleClass("active");
            if ($(this).hasClass("ri-heart-line")) {
                $(this).addClass("ri-heart-fill")
                $(this).addClass("active")
                $(this).removeClass("ri-heart-line");
                let productid = $(this).attr('productid');
                $.post({
                    url: '{{ route("add-favorite") }}',
                    data: {
                        productId: productid,
                        _token: "{{ csrf_token() }}"
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
                    if( countfav == 0 ){
                        $('.number-yt').css('display','none')
                    }else{
                        $('.number-yt').text(countfav)
                        $('.number-yt').css('display','flex')
                    }

                }
            })
        });
        
        if( $.cookie('compare') != null ){
            let checkcookie = $.cookie('compare')
            console.log( checkcookie.length )
            if( checkcookie.length == 0 ){
               $.removeCookie('compare')
            }
        }

        $('.number-ss').css('display','none')
        $('.comp').each(function() {
            $(this).click(function() {
                if($.cookie('compare')){
                    let listcomp = $.cookie('compare').split(',')
                    let productid = $(this).attr('href')
                    console.log(listcomp)
                    if (listcomp.indexOf(productid) != -1) {
                        listcomp.splice(listcomp.indexOf(productid), 1)

                        $(this).children().removeClass('active')
                        if( listcomp.length == 0 ){
                            $('.number-ss').css('display','none')
                        }else{
                            $('.number-ss').css('display','flex')
                            $('.number-ss').text( listcomp.length )
                        }
                        
                    } else {
                        
                        listcomp.push(productid);
                        console.log(listcomp.join())

                        $(this).children().addClass('active')
                        $('.number-ss').css('display','flex')
                        $('.number-ss').text( listcomp.length )

                    }
                    $.cookie('compare', listcomp.join())
                    return false
                }else{
                    
                    let listcomp = []
                    let productid = $(this).attr('href')
                    listcomp.push(productid);
                    $(this).children().addClass('active') 
                    console.log(listcomp.join())
                    $.cookie('compare', listcomp.join())

                    $('.number-ss').text( listcomp.length )
                    $('.number-ss').css('display','flex')

                    return false
                }
                
            })
            if($.cookie('compare')){
                let listcomp = $.cookie('compare').split(',')

                $('.number-ss').css('display','flex')
                $('.number-ss').text( listcomp.length )
                
                let productid = $(this).attr('href')
                if( listcomp.indexOf(productid) != -1 ){
                    $(this).children().addClass('active')
                }else{
                    $(this).children().removeClass('active')
                }

                
            }
        })

        
    })
    </script>
    @yield('footerScripts')
</body>

</html>
