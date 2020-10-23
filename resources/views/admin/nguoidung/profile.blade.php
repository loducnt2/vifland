<style>

.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
/*=============================== timeline================================= */
ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
</style>
<title>Thông tin cá nhân</title>
@extends('admin.sidebar')
@section('content')


<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-img">
                            <img src="{{asset('assets/avatar')}}/{{$profile->img}}" alt="">
                            <div class="file btn btn-lg btn-primary">
                                Thay avatar
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    {{$profile->full_name}}
                                    </h5>
                                    <h6>
                                        @if ($profile->user_type == '1')
                                        Quản trị viên
                                    @else
                                        Khách hàng
                                    @endif
                                    </h6>
                                    {{-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lịch sử bài viết</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        {{-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Quay về trang trước"/> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Thông tin mạng xã hội</p>
                            <a href="">Facebook</a><br/>
                            <a href="">Website</a><br/>
                            {{-- <a href="">Bootply Profile</a> --}}
                            <p>Tình trạng</p>
                            <button type="button" name="" id="" class="btn btn-primary" btn-lg btn-block">
                                Đang hoạt động
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tên đăng nhập</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->username}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Họ tên</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->full_name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ngày sinh</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    @if ($profile->birthday=='')
                                                      Không xác định
                                                    @else
                                                        {{$profile->birthday}}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                        Các bài viết được đăng theo id {{$profile->id}} <br>
                                        <ul class="timeline">
                                        @foreach ($posts as $posts2)
                                            {{-- {{$posts2->title}}
                                            {{$posts2->datetime}} --}}
                                            <li>
                                            <a target="_blank" href="#">{{$posts2->title}}</a>
                                                <a href="#" class="float-right">{{$posts2->datetime}}</a>
                                                <p>{{$profile->username}} đã đăng bài viết <a href="">{{$posts2->title}}</a> lên trang chủ</p>
                                            </li>
                                            <li>
                                        @endforeach
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection
