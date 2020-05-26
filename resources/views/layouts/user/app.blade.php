<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('/js/countNum.js') }}"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="{{ asset('/js/autoDate.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
    body {
        color: #1F2F54;
    }

    /* ヘッダー */

    .header-title {
        font-size: 32px;
        padding: 10px;
        background: #FFFF00;
    }
    .header-title > a {
        color: #1F2F54;
        font-weight: 700;
    }
    .header-title > a:hover {
        color: #1F2F54;
        text-decoration: none;
    }

    ul.header-menu {
        border-bottom: solid 20px #FFFF00;
        background-color: #FFFFFF;
        display: flex;
        justify-content: flex-end;
        list-style: none;
        padding-right: 40px;
        margin: 0;
    }

    li.menu-list {
        padding: 0 20px;
        margin: 10px 0;
        font-weight: bold;
        border-right: 1px solid #1F2F54;
    }
    li.menu-list > a {
        text-decoration: none;
        color: #1F2F54;
    }
    .err_message {
        height: 32px;
        text-align: center;
        line-height: 32px;
        background-color: #E3343F;
        color: #fff;
    }

    /* フッター */
    footer {
        height: 100%;
        background-color: #666666;
        color: #FFFFFF;
    }
    .footer {
        text-align: end;
        padding: 25px 50px;
    }
    .footer-title {
        font-size: 24px;
    }

    </style>
</head>
<body>
    <div id="app">
        <header>
            <div class="header-title">
                <a href="/">
                    新宿トラベル
                </a>
            </div>
            <ul class="header-menu">
                <li class="menu-list">
                    <a href="/hotel/search/input">宿を探す</a>
                </li>
                @unless (Auth::guard('user')->check())
                    <li class="menu-list">
                        <a href="{{ route('user.login' )}}">ログイン</a>
                    </li>
                    @if (Route::has('user.register'))
                        <li class="menu-list">
                            <a href="{{ route('user.register') }}">登録</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown menu-list">
                        <a id="navbarDropdown" class="dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.reservationlist', ['user' => Auth::id()]) }}">
                                {{ __('予約履歴') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.edit', ['user' => Auth::id()]) }}">
                                {{ __('会員情報変更') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.destroy.confirm', ['user' => Auth::id()])}}">
                                {{ __('退会する') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>

                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endunless
            </ul>
            @if (session('msg'))
                <div class="err_message">
                    {{ session('msg') }}
                </div>
            @endif
        </header>
        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <div class="footer">
                <div class="footer-title">
                    新宿トラベル
                </div>
                <div class="copyright">
                    &copy;Shinjku Travel Inc. All Rights Reserved.
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
