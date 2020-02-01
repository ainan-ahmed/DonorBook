@extends('layouts.app')
@section('style')
<style>


</style>
@endsection
@section('content')
<div class="container">
    <div class="banner mb-3" >
        <a href="{{ route('register')}}"><img src="{{ asset('img/donate_blood.jpg') }} " alt="" style="width:100%"></a>
    </div>
</div>
<div class="col-6">
    <h2 class=" font-weight-bold text-center ">Donor Statistics</h2>
    <table class="col-3 ml-3 table table-bordered float-left text-center">
        <caption class="ml-4 font-weight-bold" style="caption-side: top;color:green">Donor by blood group</caption>
        <thead class="table-dark">
            <tr>
                <th>Blood Group</th>
                <th>Total Donor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>A+</td>
                <td>{{$bg[0]}}</td>
            </tr>
            <tr>
                <td>A-</td>
                <td>{{$bg[1]}}</td>
            </tr>
            <tr>
                <td>B+</td>
                <td>{{$bg[2]}}</td>
            </tr>
            <tr>
                <td>B-</td>
                <td>{{$bg[3]}}</td>
            </tr>
            <tr>
                <td>AB+</td>
                <td>{{$bg[4]}}</td>
            </tr>
            <tr>
                <td>AB-</td>
                <td>{{$bg[5]}}</td>
            </tr>
            <tr>
                <td>0+</td>
                <td>{{$bg[6]}}</td>
            </tr>
            <tr>
                <td>0-</td>
                <td>{{$bg[7]}}</td>
            </tr>
        </tbody>
    </table>
    <table class="col-3 ml-5  table table-bordered float-left text-center">
        <caption class="ml-4 font-weight-bold" style="caption-side: top;color:green">Donor by Division</caption>
        <thead class="table-dark">
            <tr>
                <th>Division</th>
                <th>Total Donor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dhaka</td>
                <td>{{$division[0]}}</td>
            </tr>
            <tr>
                <td>Chittagong</td>
                <td>{{$division[1]}}</td>
            </tr>
            <tr>
                <td>Khulna</td>
                <td>{{$division[2]}}</td>
            </tr>
            <tr>
                <td>Rajshahi</td>
                <td>{{$division[3]}}</td>
            </tr>
            <tr>
                <td>Barisal</td>
                <td>{{$division[4]}}</td>
            </tr>
            <tr>
                <td>Sylhet</td>
                <td>{{$division[5]}}</td>
            </tr>

        </tbody>
    </table>
</div>
<br>
<br>
<div class="col-7  float-right" >
<h2 class=" font-weight-bold text-center">Searching for a donor??? Click <a href="{{route('search')}}">here</a></h2>

</div>

@endsection
