@extends('layouts.admin')
@section('title', '投稿の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h6>投稿編集</h6>
                <form action="{{ action('Admin\SiteController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <body class="edit">
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $site_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="10">{{ $site_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $site_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                            <div class="rating">
                              <label for="star-select">トレーニング難易度</label>
                                <select name="rating" id="star-select">
                                    <option value="">--難易度選んでください--</option>
                                    <option value="1" {{ $site_form->rating == 1 ? "selected" : ""}}>⭐️</option>
                                    <option value="2" {{ $site_form->rating == 2 ? "selected" : ""}}>⭐️⭐️</option>
                                    <option value="3" {{ $site_form->rating == 3 ? "selected" : ""}}>⭐️⭐️⭐️</option>
                                    <option value="4" {{ $site_form->rating == 4 ? "selected" : ""}}>⭐️⭐️⭐️⭐️</option>
                                    <option value="5" {{ $site_form->rating == 5 ? "selected" : ""}}>⭐️⭐️⭐️⭐️⭐️</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $site_form->id }}">
                            </body>
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                 <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($site_form->histories != NULL)
                                @foreach ($site_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection