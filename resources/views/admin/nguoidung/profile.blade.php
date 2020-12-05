<title>Thông tin cá nhân</title>
@extends('admin.sidebar')
@section('content')
<style>
body {
    margin-top: 20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;
}

.main-body {
    padding: 15px;
}

.card {
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col,
.gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}

.mb-3,
.my-3 {
    margin-bottom: 1rem !important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}

.h-100 {
    height: 100% !important;
}

.shadow-none {
    box-shadow: none !important;
}

/* faebook timeline */
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

ul.timeline>li {
    margin: 20px 0;
    padding-left: 20px;
}

ul.timeline>li:before {
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->

        <!-- /Breadcrumb -->

        <div class="row col-md-12 gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{asset('assets/avatar')}}/{{$profile->img}}" alt="Admin" class="rounded-circle"
                                width="150">
                            <div class="mt-3">
                                <h4>
                                    <p>{{$profile->full_name}}</p>
                                </h4>

                                <p class="text-muted font-size-sm">
                                <p>
                                    @if ($profile->user_type==1)
                                    Quản trị viên
                                    @else
                                    Nhà đầu tư
                                    @endif
                                </p>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-globe mr-2 icon-inline">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                    </path>
                                </svg>Website</h6>
                            <span class="text-secondary">{{$profile->website}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-facebook mr-2 icon-inline text-primary">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>Facebook</h6>
                            <span class="text-secondary">{{$profile->facebook}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Tên đẩy đủ</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profile->full_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profile->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Số điện thoại</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p>
                                    @if ($profile->phone=='')
                                    Không xác định
                                    @else
                                    {{$profile->phone}}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Ngày sinh</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p>
                                    @if ($profile->birthday=='')
                                    Không xác định
                                    @else
                                    {{$profile->birthday}}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Địa chi</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p>
                                    @if ($profile->address=='')
                                    Không xác định
                                    @else
                                    {{$profile->address}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <div class="col-sm-12 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                {{-- foreach timeline --}}
                                <ul class="timeline">
                                    @foreach ($posts as $posts2)
                                    <li>
                                        <?php
                             \Carbon\Carbon::setLocale('vi');
                                $now = \Carbon\Carbon::now()->format('d-m-Y');
                                // $diff = $now->
                                $end_date = \Carbon\Carbon::parse($posts2->datetime);
                                $diff = $end_date->diffForHumans($now);
                                ?>
                                        <p>{{$diff}}</p>
                                        <b>
                                            <a href="#">
                                                {{$profile->full_name}}
                                            </a>
                                        </b> đã đăng bài viết

                                        <a href="../../../article/{{$posts2->slug}}"><b>{{$posts2->title}}</b></a>
                                        {{-- <a href="#" class="float-right"><b></b></a> --}}
                                        <p>

                                        </p>
                                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p> --}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</form>

</div>

@endsection
