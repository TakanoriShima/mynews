@extends('layouts.front')

@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>名前</th>
                <td>{{$profile->name}}</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>{{$profile->gender}}</td>
            </tr>
            <tr>
                <th>趣味</th>
                <td>{{$profile->hobby}}</td>
            </tr>
            <tr>
                <th>自己紹介</th>
                <td>{{$profile->introduction}}</td>
            </tr>
        </table>
    </div>
@endsection