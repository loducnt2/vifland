@extends('admin.sidebar')
    @section('content')
    <div class="container">
    <form action="{{route('duyet-new',$new->id)}}" method="POST"> 
    @csrf
        <h2>Chi tiết tin </h2>
        <div class="form-group">
            <label for="">Id</label>
        <input type="text" value="{{$new->id}}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="id">title</label>
        <input type="text" value="{{$new->title}}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="id">content</label>
            <textarea name="" id="" cols="30" rows="10" class="form-control" disabled>
                {!!$new->title!!}
            </textarea>
        </div>
        <div class="form-group">
            <label for="id">Date post</label>
        <input type="text" value="{{$new->datepost}}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="id">image</label>
            <img src="{{asset('assets/news')}}/{{$new->img}}" alt="">
        </div>
        <div class="form-group">
            <label for="id">Tag</label>
        <input type="text" value="{{$new->tags}}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Duyệt bài</button>
        </div>
     
        
    
    </form>
    </div>
    @endsection