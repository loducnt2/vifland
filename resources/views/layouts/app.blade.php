<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/core.min.css">
    <link rel="stylesheet" href="./css/main.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Toastr::message() !!}
    {{-- form validate --}}

</head>

<body>
    <div class="ov-h" id="wrapper">
        @yield('content')
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
    <script type="text/javascript" src="./js/core.min.js"></script>
    <script type="text/javascript" src="./js/main.min.js"></script>
</body>
<script>
function showpass() {
    //    var password  = document.getElementById('password');
    //    if(password.type == "password")
    //     {
    //         password.type="text"
    //     }
    //     else{
    //         password.type="password";
    //     }
}
</script>
{{-- form validate --}}

</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js
    "></script>

    <script>
        console.log("Ready");
    </script>
