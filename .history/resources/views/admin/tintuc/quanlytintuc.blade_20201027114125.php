@extends('admin.sidebar')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>




{{-- @extends('admin.sidebar') --}}
@section('title','Quản lý tin tức')
{{-- script --}}
<style>
    html {
  font-size: 10px;
}
body {
  font-size: 14px;
}
</style>

<script>
    $(document).ready(function() {
        $('#content').summernote({
            height: 300,
            disableResizeEditor: false,
        });
    });
  </script>
<div class="container">
    <div class="py-5 text-center">
    <form  method="POST" action="{{action('NewsController@store')}}" enctype="multipart/form-data">
        {{-- {{ csrf_field() }} --}}
        @csrf
      <h2>Checkout form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
     </div>

        <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Thông tin bài viết</span>
          {{-- <span class="badge badge-secondary badge-pill">3</span> --}}
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Tags </h6>
              <small class="text-muted" data-role="tagsinput"></small>
            </div>
            <span class="text-muted"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Second product</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$8</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Third item</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">-$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>

        <div class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Đăng tin tức</h4>
        <div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Tiêu đề bài viết</label>
              <input type="text" class="form-control" id="title" placeholder="" value="" name="title">
              {{-- <span class="tag label label-info">Amsterdam<span data-role="remove"></span></span> --}}
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              </div>
          </div>
          <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="tags[]" id="" aria-describedby="helpId" placeholder="" data-role="tagsinput">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>
          {{-- <input id="cities" name="tags"class="form-control" value="New York,London" data-role="tagsinput" type="text"> --}}
          {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}

          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Tags</label>
              <select class="custom-select d-block w-100" id="country" required>
                <option value="">Không sử dụng</option>
                <option value="KD">Kinh doanh</option>
                <option value="MT">Mặt tiền</option>
              </select>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="content">Đăng tin mới</label>
                <div id="content">
                </div>
            </div>

          </div>
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
             </div>

    </div>

    </div>
</form>
@endsection
