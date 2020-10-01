
<form action="{{route('dang-tin')}}" method="post" accept-charset="utf-8">
	@csrf
	
	@foreach($cate_2 as $cate)
	{{$cate->name}} <input type="radio" name="cate_id">
	@endforeach
	<br>
	Đơn vị
	<select name="">
		@foreach($units as $unit)
			<option value="{{$unit->id}}">{{$unit->name}}</option>
		@endforeach
	</select><br>
	<br>
	<input type="text" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<input type="" name=""><br>
	<button type="">submit</button>
</form>