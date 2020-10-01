<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<div class="container">
	<p>CRUD Product Unit</p>
    <table border="1">
    	<tr>
    		<th>Mã</th>
    		<th>Tên</th>
    		<th>Ngôn ngữ</th>
            <th>Loại</th>
            <th>Thứ tự</th>
    		<th>Trạng thái</th>
    		<th>Action</th>
    	</tr>
    	@foreach($prod_unit as $unit)
    	<tr>
    		<td>{{$unit->id}}</td>
    		<td>{{$unit->name}}</td>
    		<td>{{$unit->language}}</td>
            <td>
                <?php
                    if($unit->type==1){
                        echo "Mua/Bán";
                    }elseif($unit->type==2){
                        echo "Thuê/Cho thuê";
                    }else{
                        echo "Khác";
                    }
                ?>
            </td>
            <td>{{$unit->orders}}</td>
    		<td>{{$unit->status==1?'Đang hiện':'Đang ẩn'}}</td>
    		<td>
    			<a href="{{route('delete-product-unit',$unit->id)}}">Xóa</a>
    			<a href="{{route('edit-product-unit',$unit->id)}}">Sửa</a>
    		</td>
    	</tr>
    	@endforeach
    </table><br>
    <form method="post" action="{{ route('create-product-unit') }}">
    	@csrf
    	Tên đơn vị<br>	
    	<input type="text" name="name"><br>
    	Ngôn ngữ <br>
    	<input type="text" name="lang"><br>
        Loại <br>    
        <select name="type" >
            <option value="">Chọn</option>}
            <option value="1">Mua/Bán</option>
            <option value="2">Thuê/Cho thuê</option>
            <option value="3">Khác</option>
        </select><br>
    	Hiện <input type="radio" name="status" value="1" checked>
    	Ẩn <input type="radio" name="status" value="0"><br>
    	<button type="">tạo</button>
    </form>
	<hr>
	

</div>		


