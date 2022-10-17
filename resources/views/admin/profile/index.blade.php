@extends('layouts.admin')
@section('title', 'My プロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <h2>My プロフィール</h2>
        </div>
        @if($profile === null) 
        <div class="row mb-2">
            <div class="col-md-4">
                <a href="{{ route('admin.profile.add') }}" role="button" class="btn btn-primary">プロフィール新規作成</a>
            </div>
        </div>
        @else
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">名前</th>
                                <th width="10%">性別</th>
                                <th width="50%">趣味</th>
                                <th width="10%">自己紹介</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th>{{ $profile->id }}</th>
                                    <td>{{ Str::limit($profile->name, 100) }}</td>
                                    <td>{{ Str::limit($profile->gender, 250) }}</td>
                                    <td>{{ Str::limit($profile->introduction, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.profile.edit', ['id' => $profile->id]) }}">編集</a>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection