@extends('layouts.profile')
@section('title', 'プロフィール画面')
@section('content')
    <div class="container">
         <div class="profilerow">
            <div class="col-md-8 mx-auto">
                  <h4>管理者プロフィール</h4>
                    <div class="profilerow">
                        <div class="posts col-md-8 mx-auto mt-3">
                            @foreach($posts as $post)
                                <div class="post">
                                    <div class="profilerow">
                                        <div class="profilewaku">
                                            <div class="text col-md-6">
                                                <body class="profile">
                                                <p>
                                                <h5>(名前)</h5>
                                                <div class="name">
                                                    {{ str_limit($post->name, 20) }}
                                                </div>
                                                <h5>(性別)</h5>
                                                <div class="gender">
                                                    {{ str_limit($post->gender,20) }}
                                                </div>
                                                <h5>(趣味)</h5>
                                                <div class="hobby">
                                                    {{ str_limit($post->hobby, 20) }}
                                                </div>
                                                <h5>(目標)</h5>
                                                <div class="target">
                                                    {{ str_limit($post->target, 50) }}
                                                </div>
                                                </p>
                                                </body> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       　　　@endforeach
                       </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection