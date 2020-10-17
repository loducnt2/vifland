<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý tin tức</title>
</head>
<body>
    {{-- @extends('layouts.master') --}}
    @extends('admin.sidebar')
    @section('content')
    <div class="container"> 
    <form method="post" action="{{ route('update-new',$new->id) }}">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">id</label>
    <input type="text" value="{{$new->id}}" class="form-control" id="exampleFormControlInput1" disabled >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">title</label>
    <input type="text" value="{{$new->title}}" class="form-control" id="exampleFormControlInput1" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">slug</label>
    <input type="text" value="{{$new->slug}}" class="form-control" id="exampleFormControlInput1" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">language</label>
    <input type="text" value="{{$new->language}}" class="form-control" id="exampleFormControlInput1" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">content</label>
    <textarea class="form-control"  aria-valuetext="{{$new->content}}" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">day post</label>
    <input type="text" value="{{$new->daypost}}" class="form-control" id="exampleFormControlInput1" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">tag</label>
    <input type="text" value="{{$new->tag}}" class="form-control" id="exampleFormControlInput1"disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">summary</label>
    <input type="text" value="{{$new->summary}}" class="form-control" id="exampleFormControlInput1"disabled >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">status</label>
    <input type="text" value="{{$new->status}}" class="form-control" id="exampleFormControlInput1" disabled>
    <input type="hidden" value="1" class="form-control" name="statusblock" id="exampleFormControlInput1" disabled>
  </div>
  
  <button type="submit" class="btn btn-primary">Duyệt</button>
 
</form>
    </div>
 @endsection
</body>
</html>
