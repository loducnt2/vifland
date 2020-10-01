<form method="post" action="{{ route('update-product-unit',$unit->id) }}">
	@csrf
	Tên <br>	
    	<input type="text" name="name" value="{{$unit->name}}"><br>
    	Ngôn ngữ <br>
    	<input type="text" name="lang" value="{{$unit->language}}"><br>
        Loại <br>    
        <select name="type" >
            <option value="" >Chọn</option>}
            <option value="1" <?php if($unit->type==1) echo 'selected'; ?> >Mua/Bán</option>
            <option value="2" <?php if($unit->type==2) echo 'selected'; ?> >Thuê/Cho thuê</option>
            <option value="3" <?php if($unit->type==3) echo 'selected'; ?> >Khác</option>
        </select><br>
    	Hiện <input type="radio" name="status" value="1" <?php if($unit->status==1) echo 'checked'; ?> >
    	Ẩn <input type="radio" name="status" value="0" <?php if($unit->status==0) echo 'checked'; ?> ><br>
	<button type="">Cập nhật</button>
</form>