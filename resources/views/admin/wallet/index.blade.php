@extends('admin.sidebar')
@section('title','Nạp tiền')
@section('content')
<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table" width="100%" cellspacing="0">
            	<tbody>
            		@foreach($users as $user)
            		<tr>
	            		<td>{{$user->username}}</td>
	            		<td>{{number_format($user->wallet)}}</td>
	            		<td>
	            			<form action="{{route('add-wallet')}}" method="post">
	            				@csrf
	            				<input type="hidden" name="userid" value="{{$user->id}}">
	            				<input type="number" name="wallet" value="">
	            				<button type="submit">Thêm</button>
	            			</form>
	            		</td>
            		</tr>
            		@endforeach
            	</tbody>
            </table>
        </div>
    </div>
@endsection