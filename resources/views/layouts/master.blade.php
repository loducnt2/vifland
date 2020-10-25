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

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
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

    <script type="text/javascript" src="{{asset('js/core.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".fav").click(function() {
            $(this).toggleClass("active");
            if ($(this).hasClass("ri-heart-line")) {
                $(this).addClass("ri-heart-fill");
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
                        console.log(data)
                        console.log(status);
                        //Chưa đăng nhập
                        if (data == 0) {
                            alert('Vui lòng đăng nhập để sử dụng tính năng này');
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
                let productid = $(this).attr('productid');
                $.ajax({
                    url: '{{ route("add-favorite") }}',
                    type: 'POST',
                    data: {
                        productId: productid,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data, status) {
                        console.log(data)
                        console.log(status);
                        //Chưa đăng nhập
                        if (data == 0) {
                            alert('Vui lòng đăng nhập để sử dụng tính năng này');
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
        });


        $.ajax({
            url  : '{{route("all-favorite")}}',
            type : 'GET',
            success: function( data,status ){
                /*$.each(data,function(index,value){
                    let arr = json_encode(value);
                    //console.log(data);

                })*/
                let arr = [];

                data.forEach(function(item,index,array){
                    
                    arr.push(item.id)

                })
                //arr = [63,64]
                //console.log(arr)
                //console.log(arr.indexOf( "65" ))

                $('.fav').each(function(){
                     var productid = parseInt( $(this).attr('productid'));
                    console.log(productid)
                     console.log(arr.indexOf( productid ))
                     if( arr.indexOf( productid ) != -1 ){
                         $(this).addClass('ri-heart-fill')
                        $(this).addClass('active')
                         $(this).removeClass('ri-heart-line')
                     }
                     else{
                         $(this).removeClass('ri-heart-fill')
                         $(this).removeClass('active')
                         $(this).addClass('ri-heart-line')
                     }
                })
                /*for( data ){
                    console.log(data.id);
                }*/
                //console.log(data);
            }
        })


        $('.comp').each(function(){
            $(this).click(function(){
                let listcomp = $.cookie('compare').split(',')
                let productid = $(this).attr('href')
                if(listcomp.indexOf( productid ) != -1 ){
                    listcomp.splice( listcomp.indexOf(productid) , 1)
                    //listcomp = arr;
                    console.log(listcomp.join())
                }else{
                    listcomp.push(productid);
                    console.log(listcomp.join())
                }
                $.cookie('compare',listcomp.join())
                return false
            })
        })
    })
    </script>
    @yield('footerScripts')
</body>

</html>