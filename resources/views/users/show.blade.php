@extends('layouts.app')

@section('content')
<div class="rankuser row">
    <div class="rankuser1 col-sm-6"><a href="/">ランキング</a></div>
    @if (Auth::check())
    <div class="rankuser1 col-sm-6"><a>{!! link_to_route('users.show', 'ユーザ情報', ['id' => Auth::id()]) !!}</a></div>
    @else
    <div class="rankuser1 col-sm-6"><a>{!! link_to_route('login', 'ユーザ情報', ['id' => Auth::id()]) !!}</a></div>
    @endif
</div>
    
<div class="col-sm-12">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="white-button col-sm-2 btn btn">自分の投稿</li>
                <li class="orange-button btn btn">{!! link_to_route('favorite.favorites', 'いいねした投稿', ['id' => Auth::id()]) !!}</li>
                
               
            </ul>
        <main class="col-sm-12">
        @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="itiran row">
                <div class="col-sm-2">
                    <div class="iine col-sm-12">いいね：{{ $post->favorites_count }}</div>
                    <div class="ramen-img col-sm-12"><img src="{{ $post->ramen_img }}"></div>
                </div>
                
                <div class="offset-sm-1 col-sm-6">
                    <div class="evoluation col-sm-12"><a href="mailto:"></a>{{ $post->evaluation }}</div>
                    <div class="store-name col-sm-12">店名：{{ $post->store_name }}</div>
                    <div class="location col-sm-12">場所：{{ $post->location }}</div>
                    <div class="type col-sm-12">種類：{{ $post->type }}</div>
                    <div class="comment col-sm-12">コメント：{{ $post->comment }}</div>
                    <div class="fabutton col-sm-12">@includeWhen(Auth::check(),'favorite.favorite_button', ['post' => $post])</div>
                    @if (Auth::id() == $post->user_id)
                    <div class="debutton col-sm-12">
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                    </div>
                    @endif
                </div>
                
            </div>
        @endforeach
        @endif
        </main>
    </div>
@endsection