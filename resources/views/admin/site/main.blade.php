{{-- layouts/main.blade.phpを読み込む --}}
@extends('layouts.main')
{{--flont.blade.phpの@yield('title')に'プロフィール画面'を埋め込む --}}
@section('title', 'メインページ')
{{-- flont.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>～マッスル掲示板～</h2>
                <body class="main">
                <div class="container">
                    　<div class="row">
                        <div class="posts col-md-8 mx-auto mt-3">
                            @foreach($posts as $post)
                                <div class="post">
                                    <div class="mainwaku">
                                        <div class="text col-md-6">
                                            <div class="row">
                                            <div class="title">
                                               {{ str_limit($post->title, 180) }}
                                            </div>
                                            <P>
                                             <h7>・投稿日</h7>    
                                            <div class="date">
                                              {{ $post->updated_at->format('Y年m月d日') }}
                                            </div>
                                            <h8>・トレーニング写真</h8>
                                            <div class="image col-md-6 text-right mt-4">
                                            @if ($post->image_path)
                                              <img src="{{ $post->image_path }}">
                                            @endif
                                        　　</div>
                                        　　<h9>・トレーニング内容</h9>
                                            <div class="body mt-3">
                                               {{ str_limit($post->body, 1800) }}
                                            </div>
                                            <div class="star">
                                                @if ($post->rating == 1)
                                                 ・トレーニング難易度　<p>{{ '⭐️' }}</p>
                                            @elseif ($post->rating == 2)
                                                 ・トレーニング難易度　<p>{{ '⭐️⭐️' }}</p>
                                            @elseif ($post->rating == 3)
                                                 ・トレーニング難易度　<p>{{ '⭐️⭐️⭐️' }}</p>
                                            @elseif ($post->rating == 4)
                                                 ・トレーニング難易度　<p>{{ '⭐️⭐️⭐️⭐️' }}</p>
                                            @elseif ($post->rating == 5)
                                                 ・トレーニング難易度　<p>{{ '⭐️⭐️⭐️⭐️⭐️' }}</p>
                                            @endif
                                            </div>
                                            </P>
                                        </diV>    
                                      </div>
                                    </div>
                                </div>
                            @endforeach
                      </div>
                    </div>
                </div>
                </body>
            </div>
        </div>
    </div>
@endsection