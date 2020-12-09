@extends('admin.sidebar')
@section('title','Quản lý giá post')
@section('breadcum')
Quản lý giá post
@endsection
 @section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <div class="container">
    <div class="col-6">
    <form action="{{route('update-price',$price->id)}}" method="post">
    @csrf
        <div class="form-group">
            <label for=""> id</label>
            <input class="form-control" type="text" value="{{$price->id}}" disabled>
         </div>
         <div class="form-group">
            <label for=""> name</label>
            <input class="form-control" type="text" value="{{$price->name}}" disabled>
         </div>
         <div class="form-group">
            <label for=""> price (VNĐ)</label>
            <input class="form-control" name="price" type="number" value="{{$price->price}}">
         </div>
         <div class="form-group">
            <label for=""> status</label>
            <input class="form-control" type="text" value="{{$price->status==0?'Đang Ẩn':'Đang hiện'}}" disabled>
         </div>
         <div>
             <a href=""><button class="btn btn-primary">Update</button></a>
            </div>
    </form>
    </div>
 </div>

 
 @endsection