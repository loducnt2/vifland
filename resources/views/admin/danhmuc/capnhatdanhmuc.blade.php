<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cập nhật danh mục</title>
</head>

<body>
	{{-- @extends('layouts.master') --}}
	@extends('admin.sidebar')

	@section('content')
	<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.3.1021/styles/kendo.default-v2.min.css"/>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2020.3.1021/js/kendo.all.min.js"></script>

<div class="container">

				<form method="post" action="{{ route('update-cate',$cate->id) }}">
					@csrf

					<label for="">Name</label>

					<input  class="form-control" type="text" name="name" value="{{$cate->name}}">

					<label for="">Ngôn ngữ</label>

					<input  class="form-control" type="text" name="lang" value="{{$cate->language}}">

					<label for="">Thu tu</label>

					<input  class="form-control" type="text" name="orders" value="{{$cate->orders}}">
					<label for="">Trạng thái</label>
					<input class="form-control" type="text" value="{{$cate->status==1?'Đang hiện':'Đang ẩn'}}">

					<!-- <input  class="form-check-input" type="radio" name="status" value="1" {{$cate->status==1?'checked':''}}>

					<label class="form-check-label" for="">Hiện</label>
							<br>

					<input class="form-check-input" type="radio" name="status" value="0" {{$cate->status==0?'checked':''}}>

					<label  class="form-check-label" for="">An</label> -->

					<br>
					<label for="exampleFormControlTextarea1">Mô tả </label>
					<textarea class="form-control" name="content" id="editor" rows="30" cols="30" aria-label="editor" style="min-height: 350px;" >
					{!!$cate->content!!}
    		</textarea>

					<button class="btn btn-primary mt-3"  type="">Cập nhật</button>
				</form>
</div>
<script>
		var editor = $("#editor").kendoEditor({
			tools: [
				"bold",
				"italic",
				"underline",
				"justifyLeft",
				"justifyCenter",
				"justifyRight",
				"insertUnorderedList",
				"createLink",
				"unlink",
				"insertImage",
				"tableWizard",
				"createTable",
				"addRowAbove",
				"addRowBelow",
				"addColumnLeft",
				"addColumnRight",
				"deleteRow",
				"deleteColumn",
				"mergeCellsHorizontally",
				"mergeCellsVertically",
				"splitCellHorizontally",
				"splitCellVertically",
				"formatting",
				{
					name: "fontName",
					items: [{
							text: "Andale Mono",
							value: "Andale Mono"
						},
						{
							text: "Arial",
							value: "Arial"
						},
						{
							text: "Arial Black",
							value: "Arial Black"
						},
						{
							text: "Book Antiqua",
							value: "Book Antiqua"
						},
						{
							text: "Comic Sans MS",
							value: "Comic Sans MS"
						},
						{
							text: "Courier New",
							value: "Courier New"
						},
						{
							text: "Georgia",
							value: "Georgia"
						},
						{
							text: "Helvetica",
							value: "Helvetica"
						},
						{
							text: "Impact",
							value: "Impact"
						},
						{
							text: "Symbol",
							value: "Symbol"
						},
						{
							text: "Tahoma",
							value: "Tahoma"
						},
						{
							text: "Terminal",
							value: "Terminal"
						},
						{
							text: "Times New Roman",
							value: "Times New Roman"
						},
						{
							text: "Trebuchet MS",
							value: "Trebuchet MS"
						},
						{
							text: "Verdana",
							value: "Verdana"
						},
					]
				},
				"fontSize",
				"foreColor",
				"backColor",
			]
		});
	</script>
@endsection
</body>

</html>
