<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<div class="container">
	<p>Đăng tin</p>
	@foreach($cate_level1 as $cate)
	    <a href="/new/{{$cate->slug}}">{{$cate->name}}</a><br>
	@endforeach
	<hr>
	<p>CRUD Category</p>
	    <table border="1">
	    	<tr>
	    		<th>Mã</th>
	    		<th>Cấp cha</th>
	    		<th>Tên</th>
	    		<th>Ngôn ngữ</th>
	    		<th>Trạng thái</th>
	    		<th>Thứ tự</th>
	    		<th>Slug</th>
	    		<th>Action</th>
	    	</tr>
	    	@foreach($cates as $cate)
	    	<tr>
	    		<td>{{$cate->id}}</td>
	    		<td>{{$cate->parent_id}}</td>
	    		<td>{{$cate->name}}</td>
	    		<td>{{$cate->language}}</td>
	    		<td>{{$cate->status==1?'Đang hiện':'Đang ẩn'}}</td>
	    		<td>{{$cate->orders}}</td>
	    		<td>{{$cate->slug}}</td>
	    		<td>
	    			<a href="{{route('delete-cate',$cate->id)}}">Xóa</a>
	    			<a href="{{route('edit-cate',$cate->id)}}">Sửa</a>
	    		</td>
	    	</tr>
	    	@endforeach
	    </table><br>
	    <form method="post" action="{{ route('create-cate') }}">
	    	@csrf
	    	Tên <br>	
	    	<input type="text" name="name"><br>
	    	Cấp cha <br>	
	    	<select name="parent_id" >
	    		<option value="">Chọn</option>}
	    		@foreach($cate_level1 as $cate1)
	    		<option value="{{$cate1->id}}">{{$cate1->name}}</option>
	    		@endforeach
	    	</select><br>
	    	Ngôn ngữ <br>
	    	<input type="text" name="lang"><br>
	    	Hiện <input type="radio" name="status" value="1" checked>
	    	Ẩn <input type="radio" name="status" value="0"><br>
	    	<button type="">tạo</button>
	    </form>
	<hr>
	

</div>		


