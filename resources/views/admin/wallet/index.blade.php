@extends('admin.sidebar')
@section('title','Nạp tiền')
@section('content')
<div class="container-fluid box-n-big page-nap-tien">
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
                            <div class="wrap-button">
                                <input type="number" name="wallet" value="">
                                <button class="btn button-color" type="submit">Thêm</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection