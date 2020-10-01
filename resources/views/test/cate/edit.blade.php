<form method="post" action="{{ route('update-cate',$cate->id) }}">
	@csrf
	Tên <br>	
	<input type="text" name="name" value="{{$cate->name}}"><br>
	<?php
		if($cate->parent_id != NULL){
	?>
	Cấp cha <br>	
	<select name="parent_id" >
		<option value="">Chọn</option>}
		@foreach($cate_level1 as $cate1)
		<option value="{{$cate1->id}}" <?php if($cate->parent_id == $cate1->id){echo 'selected';} ?> >{{$cate1->name}}</option>
		@endforeach
	</select><br>
	<?php } ?>
	Ngôn ngữ <br>
	<input type="text" name="lang" value="{{$cate->language}}"><br>
	Thứ tự <br>
	<input type="text" name="orders" value="{{$cate->orders}}"><br>
	Hiện <input type="radio" name="status" value="1" {{$cate->status==1?'checked':''}} >
	Ẩn <input type="radio" name="status" value="0" {{$cate->status==0?'checked':''}} ><br>
	<button type="">Cập nhật</button>
</form>