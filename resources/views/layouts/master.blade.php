<!DOCTYPE html>
<!-- <html class="overflow-hidden" lang="en"> -->
<html  lang="en">
	<head>
		@section('title','Trang chủ')
		<title>@yield('title')</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="{{asset('css/core.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/main.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/update.css')}}">
		<link rel="shortcut icon" type="image/png" href="{{asset('assets/favicon.ico')}}"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		  <link rel="stylesheet" href="/resources/demos/style.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		@yield('headerStyles')
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
		@yield('footerScripts')
	</body>
</html>
