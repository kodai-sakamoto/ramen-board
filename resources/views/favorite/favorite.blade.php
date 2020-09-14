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
                <li class="orange-button col-sm-2 btn btn">{!! link_to_route('users.show', '自分の投稿', ['id' => Auth::id()]) !!}</li>
                <li class="white-button col-sm-2 btn btn">いいねした投稿</li>
               
            </ul>
             @if(count($favorites) > 0)
        <main>
            <table class="table main2 col-sm-12">
                @foreach ($favorites as $favorite)
                    <tr>
                        <td><img src="{{ $favorite->ramen_img }}"></td>
                        <td>{{ $favorite->evaluation }}</td>
                        <td>{{ $favorite->store_name }}</td>
                        <td>{{ $favorite->location }}</td>
                        <td>{{ $favorite->type }}</td>
                        <td>{{ $favorite->comment }}</td>
                        <td>@includeWhen(Auth::check(),'favorite.favorite_button', ['favorite' => $favorite])</td>
                    </tr>
                @endforeach
            </table>
            @endif
        </main>
    </div>
@endsection