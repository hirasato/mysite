{{-- layouts/flont.blade.phpを読み込む --}}
@extends('layouts.front')
{{--flont.blade.phpの@yield('title')に'トップページ'を埋め込む --}}
@section('title', 'トップページ')
{{-- flont.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>ようこそマッスル掲示板へ</h1>
                <body class="top">
                    <div class="toppage">
                        <div class="top-right links">
                            @auth
                            @else　　 
                                @if (Route::has('login'))
                                    <a class="toplogin" href="{{ route('login') }}">ログイン</a>
                                @if (Route::has('register'))
                                    <a class="topregister" href="{{ route('register') }}">新規登録</a>
                                @endif
                            @endauth
                        </div>
                            @endif
                    </div>
                </body>
            </div>
        </div>
 </div>
            