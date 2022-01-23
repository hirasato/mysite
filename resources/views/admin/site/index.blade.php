@extends('layouts.admin')
@section('title', '登録済み投稿の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>投稿一覧</h2>
        </div>
        <body class="itirann">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\SiteController@add') }}" role="button" class="btn btn-primary">新規投稿作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\SiteController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトルで検索</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value={{ $cond_title }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="20%">本文</th>
                                <th width="20%">難易度</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $site)
                                <tr>
                                    <th>{{ $site->id }}</th>
                                    <td>{{ str_limit($site->title, 100) }}</td>
                                    <td>{{ str_limit($site->body, 250) }}</td>
                                    <td>
                                         <div class="star">
                                        @if     ($site->rating == 1)
                                            <p>{{ '⭐️' }}</p>
                                        @elseif ($site->rating == 2)
                                            <p>{{ '⭐️⭐️' }}</p>
                                        @elseif ($site->rating == 3)
                                            <p>{{ '⭐️⭐️⭐️' }}</p>
                                        @elseif ($site->rating == 4)
                                            <p>{{ '⭐️⭐️⭐️⭐️' }}</p>
                                        @elseif ($site->rating == 5)
                                            <p>{{ '⭐️⭐️⭐️⭐️⭐️' }}</p>
                                        @endif
                                    　　</div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\SiteController@edit', ['id' => $site->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\SiteController@delete', ['id' => $site->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
        </div>
    </div>
@endsection