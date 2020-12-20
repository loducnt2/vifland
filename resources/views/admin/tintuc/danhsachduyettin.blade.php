@extends('admin.sidebar')

@section('breadcum')

Quản lý tin đăng > Duyệt tin

@endsection

@section('content')

<div class="container-fluid box-n-big">

    <h2>Danh sách tin duyệt</h2>

    <!-- table -->

    <div class="row">

        <div class="col-5">

            <div class="form-group">

                <label for="">Từ khóa</label>

                <input class="form-control" id="myInput" type="text" placeholder="Search..">

            </div>

        </div>

        <div class="col-3">

            <div class="form-group">

                <label for="">Loại</label>

                <select class="form-control" name="" id="type">

                    <option value=""> ---------</option>

                    <option value="Vip1"> Tin vip 1</option>

                    <option value="Vip2"> Tin vip 2</option>

                    <option value="Vip3">Tin vip 3</option>

                    <option value="thường">Tin thường</option>

                </select>

            </div>



        </div>

        <div class="col-4">

            <div class="form-group">

                <label for="">Trạng thái</label>

                <select class="form-control" name="" id="status">

                    <option value=""> ---------</option>

                    <option value="Đã Duyệt"> Đã duyệt</option>

                    <option value="Chưa duyệt"> Chưa duyệt</option>

                </select>

            </div>

        </div>

    </div>



    <br>



    <table class="table table-bordered table-striped">

        <thead>

            <tr>

                <<<<<<< HEAD <th>Mã post</th>
                    =======
                    <th>Mã bài đăng</th>
                    >>>>>>> 49fa6c0a12893552e20e7999348819f4973e4b2f

                    <th>Mã tin</th>

                    <th>Tiêu đề</th>

                    <th>Loại tin</th>

                    <<<<<<< HEAD <th>Trạng thái</th>
                        =======
                        <th>trạng thái</th>
                        >>>>>>> 49fa6c0a12893552e20e7999348819f4973e4b2f

                        <th>Hành động</th>

            </tr>

        </thead>

        <tbody id="myTable">

            @foreach($news as $new)

            <tr>

                <td>{{$new->post_id}}</td>

                <td>{{$new->product_id}}</td>

                <td>{{$new->product_title}}</td>



                @if($new->product_type==1)

                <td id="productType"> <button class="btn bg-danger text-white">Vip1</button> </td>

                @elseif($new->product_type==2)

                <td id="productType"><button class="btn bg-warning text-white"> Vip2</button> </td>

                @elseif($new->product_type==3)

                <td id="productType"><button class="btn bg-success text-white">Vip3</button> </td>

                @else

                <td id="productType"> <button class="btn bg-secondary text-white">Thường</button> </td>

                @endif



                <<<<<<< HEAD <td id="valueStatus" style="width:15%"> <button class="btn {{$new->status == 1 ? 'btn-success':'btn-warning'}}">{{$new->status == 1 ? 'Đã duyệt':'Chờ duyệt'}}</button>
                    =======
                    <td id="valueStatus" style="width:15%"> <button class="btn {{$new->status == 1 ? 'btn-success':'btn-warning'}}">{{$new->status == 1 ? 'Đã duyệt':'Chờ duyệt'}}</button>
                        >>>>>>> 49fa6c0a12893552e20e7999348819f4973e4b2f

                    </td>

                    <td style="width:30%">

                        <a href="{{route('show-tintuc',$new->product_id)}}"><button class="btn button-color">

                                <<<<<<< HEAD Chi tiết tin</button> </a>=======Chi tiết </button> </a>>>>>>>> 49fa6c0a12893552e20e7999348819f4973e4b2f @if($new->status == 1)

                                    <a href="{{route('del-post',$new->product_id)}}"><button class="btn btn-danger"> Xóa
                                        </button></a>

                                    @else

                                    <a href="{{route('update-post',$new->post_id)}}"> <button class="btn btn-success"> Duyệt
                                        </button>

                                    </a>

                                    <a href="{{route('cancel-post',$new->product_id)}}"><button class="btn btn-danger"> Hủy

                                        </button></a>

                                    @endif









                    </td>

            </tr>

            @endforeach



        </tbody>

    </table>

    <<<<<<< HEAD {{ $news->links() }}=======>>>>>>> 49fa6c0a12893552e20e7999348819f4973e4b2f



</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    << << << < HEAD
    $(document).ready(function() {



                $("#myInput").on("keyup", function() {

                    var value = $(this).val().toLowerCase();

                    $("#myTable tr").filter(function() {

                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

                    });

                });

                $("#status").on("change", function() {

                    var value = $(this).val().toLowerCase();

                    $("#myTable tr td[id='valueStatus']").filter(function() {

                        $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)

                    });

                });



                $("#type").on("change", function() {

                    var value = $(this).val().toLowerCase();

                    $("#myTable tr td[id='productType']").filter(function() {

                        $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)

                    });

                });

                ===
                ===
                =

                $(document).ready(function() {



                    $("#myInput").on("keyup", function() {

                        var value = $(this).val().toLowerCase();

                        $("#myTable tr").filter(function() {

                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

                        });

                    });

                    $("#status").on("change", function() {

                        var value = $(this).val().toLowerCase();

                        $("#myTable tr td[id='valueStatus']").filter(function() {

                            $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -
                                1)

                        });

                    });



                    $("#type").on("change", function() {

                        var value = $(this).val().toLowerCase();

                        $("#myTable tr td[id='productType']").filter(function() {

                            $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -
                                1)

                        });

                    }); >>>
                    >>>
                    >
                    49 fa6c0a12893552e20e7999348819f4973e4b2f




                        <<
                        <<
                        <<
                        <
                        HEAD
                });
</script>

<style>
    th,

    tr {

        margin: 0 auto;

        text-align: center;

    }

    =======
    }

    );

    </script><style>th,

    tr {

        margin: 0 auto;

        text-align: center;

    }

    >>>>>>>49fa6c0a12893552e20e7999348819f4973e4b2f
</style>

@endsection