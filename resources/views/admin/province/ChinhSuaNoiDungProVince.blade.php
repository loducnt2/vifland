
    @extends('admin.sidebar')
    @section('content')
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.3.1021/styles/kendo.default-v2.min.css"/>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2020.3.1021/js/kendo.all.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1> Chi tiết tỉnh {{$Pro->name}}</h1>
                <form method="post" action="{{ route('update-province',$Pro->id) }}">
			@csrf
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Mô tả </label>
				<textarea class="form-control" name="content" id="editor1" rows="40" cols="30" aria-label="editor" style="min-height: 350px;" >
				{!!$Pro->content!!}
    		</textarea>
			</div>

			<br>

			<button class="btn btn-primary" type="">Cập nhật</button>

		</form>
            </div>
        </div>
    </div>
    </div>
    <script>
		var editor = $("#editor1").kendoEditor({
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