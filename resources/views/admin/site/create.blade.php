{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
{{-- admin.blade.phpの@yield('title')に'投稿作成画面'を埋め込む --}}
@section('title', '投稿作成画面')
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3>投稿作成</h3>
                <form action="{{ action('Admin\SiteController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}入力してください。</li>
                            @endforeach
                        </ul>
                    @endif
                    <body class="create">
                    <div class="form-group row">
                        <label class="col-md-2">・トレーニング部位</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">・トレーニング内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="image">
                    <div class="form-group row">
                        <label class="col-md-2">・画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    </div>
                    <div class="rating">
                        <label for="star-select">・トレーニング難易度</label>
                        <select name="rating" id="star-select">
                            <option value="">--難易度選んでください--</option>
                            <option value="1">⭐️</option>
                            <option value="2">⭐️⭐️</option>
                            <option value="3">⭐️⭐️⭐️</option>
                            <option value="4">⭐️⭐️⭐️⭐️</option>
                            <option value="5">⭐️⭐️⭐️⭐️⭐️</option>
                        </select>
                    </div>
                    </body>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection