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
    {!! Form::open (['route' => 'posts.kensaku','method' => 'post']) !!}
    <menu>
        <div class="row">
            
            
            <select type="text" class="form-control col-sm-4" name="area">     
                <option value='' selected>都道府県（未選択）</option>
                @foreach(config('pref') as $key => $pref)
                    <option value="{{ $pref }}">{{ $pref }}</option>
                @endforeach
            </select>
            
            <select type="text" class="form-control col-sm-4" name="type"> 
                <option value='' selected>ラーメンの種類（未選択）</option>
                @foreach(config('type') as $key => $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
            
        </div>
        <div class="kensaku">
            <input type="submit" value="検索する" class="modal-open btn btn-primery" style="background-color:#ff7f00;">
        </div>
        
    </menu>
    <div class="mainmanu col-sm-12">
    {!! Form::close() !!}
    <main class="col-sm-12">
        <h1>投稿</h1>
        @if (Auth::check())
        <input type="botton" value="投稿する" id="modal-open" class="modal-open btn btn-primery" style="background-color:#ff7f00;">
        @else
         <a href="/login"><input type="botton" value="投稿する" id="modal-open" class="modal-open btn btn-primery" style="background-color:#ff7f00;"></a>
        @endif
        
        
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
        
        
        
        <div class="modal-m" id="modal-m">
            <h2>投稿する</h2>
            
            {!! Form::open(['route' => 'posts.store','method' => 'post', 'class' => 'form', 'files' => true]) !!}
            <div class="modal-content">
                <div class="row">
                    <input type="file" name="ramen_img" value="ラーメンの画像" class="form-control">
                    
                   
                    {!! Form::text('store_name',null, ['class' => 'form-control','placeholder' => '店名']) !!}
                    <select type="text" class="form-control" name="evaluation">                          
                        @foreach(config('score') as $key => $score)
                            <option value="{{ $score }}">{{ $score }}</option>
                            
                        @endforeach
                    </select>
                    <select type="text" class="form-control" name="location">
                        <option value='' selected>都道府県（未選択）</option>                          
                        @foreach(config('pref') as $key => $pref)
                            <option value="{{ $pref }}">{{ $pref }}</option>
                        @endforeach
                    </select>
                    
                    <select type="text" class="form-control" name="type">    
                        <option value='' selected>都道府県（未選択）</option>
                        @foreach(config('type') as $key => $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    
                    
                    {!! Form::text('comment',null, ['class' => 'form-control','placeholder' => 'コメント']) !!}
                </div>
            </div>
            <input type="botton" value="閉じる" id="modal-close" class="modal-close btn btn" style="background-color:#828282;">
            {!! Form::submit('投稿する', ['class' => 'toukou btn btn', 'style' => 'background-color:#ff7f00;']) !!}
            {!! Form::close() !!}
        </div>
        <div class="mask" id="mask"></div>
    
    </main>
@endsection