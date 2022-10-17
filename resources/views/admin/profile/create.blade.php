@extends('layouts.profile')
@section('title', 'My プロフィールの新規作成')

<!--【応用】 resources/views/admin/profile/create.blade.php を編集して、-->
<!--氏名(name)、性別(gender)、趣味(hobby)、自己紹介欄(introduction)を入力するフォームを作成してください。-->
<!--また、formの送信先(<form action=”この部分”>)を、 Admin\ProfileController の create Action に指定してください (ヒント: resources/views/admin/news/create.blade.php)-->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール新規作成</h2>
                <form action="{{ route('admin.profile.create') }}" method="post">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @csrf

                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
                
            </div>
        </div>
    </div>
@endsection