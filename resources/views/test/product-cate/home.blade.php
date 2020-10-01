<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<div class="container">
	<p>CRUD Product Category</p>
    <table border="1">
    	<tr>
    		<th>Mã</th>
    		<th>Thứ tự</th>
    		<th>Tên</th>
    		<th>Ngôn ngữ</th>
    		<th>Trạng thái</th>
    		<th>Slug</th>
    		<th>Action</th>
    	</tr>
    	@foreach($prod_cates as $cate)
    	<tr>
    		<td>{{$cate->id}}</td>
    		<td>{{$cate->orders}}</td>
    		<td>{{$cate->name}}</td>
    		<td>{{$cate->language}}</td>
    		<td>{{$cate->status==1?'Đang hiện':'Đang ẩn'}}</td>
    		<td>{{$cate->slug}}</td>
    		<td>
    			<a href="{{route('delete-product-cate',$cate->id)}}">Xóa</a>
    			<a href="{{route('edit-product-cate',$cate->id)}}">Sửa</a>
    		</td>
    	</tr>
    	@endforeach
    </table><br>
    <form method="post" action="{{ route('create-product-cate') }}">
    	@csrf
    	Tên <br>	
    	<input type="text" name="name"><br>
    	Ngôn ngữ <br>
    	<input type="text" name="lang"><br>
    	Hiện <input type="radio" name="status" value="1" checked>
    	Ẩn <input type="radio" name="status" value="0"><br>
    	<button type="">tạo</button>
    </form>
	<hr>
	

</div>		


