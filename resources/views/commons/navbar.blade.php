<header>
    <div class="header-logo">
        <h2><a href="/">全国ラーメンランキング</a></h2>
        <ul class="header-login">
            @if (Auth::check())
                <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
            @else
                <li class="nav-item">{!! link_to_route('signup.get', '登録') !!}</li>
                <li class="nav-item">{!! link_to_route('login', 'ログイン') !!}</li>
            @endif
        </ul>
    </div>
</header>