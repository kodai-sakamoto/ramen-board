@if (Auth::user()->is_favorites($post->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
        {!! Form::submit('いいねを外す', ['class' => "btn btn-danger btn-block"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
        {!! Form::submit('いいね！', ['class' => "btn btn-primary btn-block"]) !!}
    {!! Form::close() !!}
@endif
