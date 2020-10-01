<form method="post" action="{{ route('update-product-cate',$cate->id) }}">
	@csrf
	Tên <br>	
	<input type="text" name="name" value="{{$cate->name}}"><br>
	
	Ngôn ngữ <br>
	<input type="text" name="lang" value="{{$cate->language}}"><br>
	Thứ tự <br>
	<input type="text" name="orders" value="{{$cate->orders}}"><br>
	Hiện <input type="radio" name="status" value="1" {{$cate->status==1?'checked':''}} >
	Ẩn <input type="radio" name="status" value="0" {{$cate->status==0?'checked':''}} ><br>
	<button type="">Cập nhật</button>
</form>