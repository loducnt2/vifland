<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/dashboard-admin.css')}}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <title>@yield('title','Thống kê dữ liệu')</title>
    <script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>

</head>

<body>
    {{-- @extends('layouts.master') --}}
    @extends('admin.sidebar')
    @section('breadcum')
    <a href="/admin/index">Trang thông kê dữ liệu</a>
    @endsection
    @section('content')
    <main>
        <div class="container-fluid">
            <div class="section-title">Báo Cáo Tổng Quan</div>
            <div class="wrap-db-1">
                <div class="row">
                    
                    <div class="col-lg">
                        <div class="report-box zoom-in">
                            <div class="box-n p-5">
                                <div class="wrap-db-head">
                                    <i class="far fa-file fs-icon blue-n"></i>
                                    <div class="badege">
                                        Tin Đang Đăng
                                    </div>
                                </div>
                                <div class="wrap-sl">
                                    <div class="amount counter" id="current">{{ number_format($product_current) }}</div>
                                    <div class="text-smalls">Tin Đăng</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="report-box zoom-in">
                            <div class="box-n p-5">
                                <div class="wrap-db-head">
                                    <i class="far fa-eye fs-icon cam-n"></i>
                                    <div class="badege">
                                        Lượt Xem
                                    </div>
                                </div>
                                <div class="wrap-sl">
                                    <div class="amount" id="view">{{ number_format($view) }}</div>
                                    <div class="text-smalls">Lượt Xem</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="report-box zoom-in">
                            <div class="box-n p-5">
                                <div class="wrap-db-head">
                                    <i class="far fa-user fs-icon vang-n"></i>
                                    <div class="badege">
                                        Tài Khoản Đăng Ký
                                    </div>
                                </div>
                                <div class="wrap-sl">
                                    <div class="amount" id="account">{{ number_format($user_count) }}</div>
                                    <div class="text-smalls">Tài Khoản</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="report-box zoom-in">
                            <div class="box-n p-5">
                                <div class="wrap-db-head">
                                    <i class="far fa-envelope fs-icon green-n"></i>
                                    <div class="badege">
                                        Email Theo Dõi
                                    </div>
                                </div>
                                <div class="wrap-sl">
                                    <div class="amount" id="email">{{ number_format($email) }}</div>
                                    <div class="text-smalls">Email</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-db-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title">
                            Báo Cáo Doanh Thu
                        </div>
                        <div class="box-n p-5 bcdt">
                            <div class="title-money">
                                <div class="money-now">
                                    <span class="money-big" id="cash_by_month">
                                        {{ number_format($cash_by_month) }} VNĐ
                                    </span>
                                    <span class="money-small">
                                        Tháng Này
                                    </span>
                                </div>
                                <div class="line-dive"></div>
                                <div class="money-total">
                                    <span class="money-big" id="total_cash">
                                        {{ number_format($total_cash) }} VNĐ
                                    </span>
                                    <span class="money-small">
                                        Tổng Doanh Thu
                                    </span>
                                </div>
                            </div>
                            <div class="bcdt-chart">
                                <canvas id="bcdt" data-1="50" data-2="50" data-3="50" data-4="50" data-5="50"
                                    data-6="50" data-7="50" data-8="50" data-9="50" data-10="50" data-11="50"
                                    data-12="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="header-title">
                                    <div class="section-title">
                                        Báo Cáo Duyệt Tin
                                    </div>
                                    <div class="link">
                                        <a href="">Chi tiết</a>
                                    </div>
                                </div>
                                <div class="box-n baocaoduyettin-chart">
                                    <div class="baocaoduyettin">
                                        <canvas id="baocaoduyettin"></canvas>
                                    </div>
                                    <div class="baocaoduyettin_mota p-5">
                                        <div class="line-1">
                                            <div class="line-left">
                                                <div class="circle xanh"></div>
                                                <p>Bài viết đã duyệt</p>
                                            </div>
                                            <div class="line-right xanh ">
                                                <span>{{ $post_history_1 }}</span>
                                                {{ $post_history_11 }} %
                                            </div>
                                        </div>
                                        <div class="line-1">
                                            <div class="line-left">
                                                <div class="circle cam"></div>
                                                <p>Bài viết chưa duyệt</p>
                                            </div>
                                            <div class="line-right cam">
                                                <span>{{ $post_history_0 }}</span>
                                                {{ $post_history_00 }} %
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 list-bxh-ov">

                                <div class="header-title">
                                    <div class="section-title">
                                        Bảng Xếp Hạng Thành viên
                                    </div>
                                    <div class="link">
                                        <a href="">Chi tiết</a>
                                    </div>
                                </div>
                                <!-- Start -->
                                <div class="wrap-list-bxh" id="user_rank">
                                     @foreach($user_by_cash as $user) 
                                    <div class="list-items-bxh">
                                        <div class="box-n px-4 py-3 item zoom-in">
                                            <div class="left-bxh">
                                                <div class="img">
                                                    <img src="{{asset('assets/avatar/user.png')}}" alt="">
                                                </div>
                                                <div class="text">
                                                    <div class="title">{{ $user->full_name == NULL ? $user->username : $user->full_name }}</div>
                                                    <div class="ngaygianhap">12/07/2020</div>
                                                </div>
                                            </div>
                                            <div class="right-bxh">
                                                <span class="amount">{{ number_format($user->total_cash) }}</span> VNĐ
                                            </div>
                                        </div>
                                    </div>
                                     @endforeach 
                                    <!-- End list -->
                                </div>
                                <!-- End  -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="cash" hidden="" cash=""></div>
    @endsection
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://bfintal.github.io/Counter-Up/jquery.counterup.min.js"></script>

<script>
$(document).ready(function() {


    /*setTimeout(function(){
        var source = new EventSource("/admin/dashboard");
        source.onmessage = function(event) {
          const result = JSON.parse(event.data)
          console.log(result)
          total_cash = result['total_cash']
          cash_by_month = result['cash_by_month']
          $('#cash').attr('cash',result['cash'])
          $('#account').text(result['account'])
          $('#view').text(result['view'])
          $('#posted').text(result['product_posted'])
          $('#current').text(result['product_current'])
          $('#email').text(result['email'])
          $('#total_cash').text(total_cash + " VNĐ")
          $('#cash_by_month').text(cash_by_month + " VNĐ")

        }
    }, 5000);*/

        const bcdt_1 = $('#bcdt').attr('data-1');
        var cash = $('#cash').attr('cash');
        var bcdtData = {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8',
                'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
            ],
            datasets: [{
                label: 'Tiền',
                borderColor: "#3160D8",
                backgroundColor: "#3160D8",
                fill: false,
                borderWidth: 2,
                data: [@foreach ($cash as $cs){{$cs}}, @endforeach ],
                //data: cash ,

            }]
        };
        window.onload = function() {
            var ctx = document.getElementById("bcdt").getContext("2d");
            window.myLine = Chart.Line(ctx, {
                data: bcdtData,
                options: {
                    hover: {
                        mode: 'index',
                        intersect: false
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeInOutCubic',
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    },
                    legend: {
                        display: false,
                    },
                    responsive: true,
                    stacked: false,
                    title: {
                        display: false,
                        text: 'Chart.js Line Chart - Multi Axis'
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                borderDash: [3, 2],
                                zeroLineBorderDash: [3, 2],
                                zeroLineColor: 'rgba(225,225,225,0.8)'
                            },
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            stacked: true,
                            ticks: {
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return value.toLocaleString('vi', {
                                        style: 'currency',
                                        currency: 'VND'
                                    }); + 'đ';
                                }
                            }
                        }, ],
                        xAxes: [{
                            gridLines: {
                                display: false,
                                borderDash: [3, 2],

                            },
                            ticks: {
                                padding: 1,
                            },
                            stacked: true,
                        }, ],
                    }
                }
            });
        };
    
    
    // Chart 2
    var data = [{
        backgroundColor: ["#285FD3", "#FF8B26"],
        borderColor: "#fff",
        borderWidth: 2,
        data: [{{ $post_history_11 }}, {{ $post_history_00 }}],
        hoverBorderWidth: 5,
        labels: ["Bài viết đã duyệt", "Bài viết chưa duyệt"],
    }, ];
    var options = {
        legend: {
            display: false,
        },
        tooltips: {
            callbacks: {
                label: (tooltipItems, data) => {
                    return (
                        data.datasets[tooltipItems.datasetIndex].labels[
                            tooltipItems.index
                        ] +
                        ": " +
                        data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] +
                        "%"
                    );
                },
            },
        },
    };
    var ctx = $("#baocaoduyettin")[0].getContext("2d");

    var myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            datasets: data,
            labels: ["Trạm đang xử lý", "Hoàn tất", "Call center đang xử lý"],
        },
        options: options,
    });
});
// Counter
jQuery(document).ready(function($) {
    $('.amount').counterUp({
        delay: 10,
        time: 1000
    });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js">
</script>
<script src="http://bfintal.github.io/Counter-Up/jquery.counterup.min.js"></script>



</html>