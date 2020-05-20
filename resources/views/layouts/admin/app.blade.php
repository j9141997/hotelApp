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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

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
                <a href="/admin/home">
                    新宿トラベル
                </a>
            </div>
            <ul class="header-menu">
                @unless (Auth::guard('admin')->check())
                    <li class="menu-list">
                        <a href="{{ route('admin.login' )}}">ログイン</a>
                    </li>
                @else
                    <li class="nav-item dropdown menu-list">
                        <a id="navbarDropdown" class="dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.home.index') }}">
                                {{ __('HOME') }}
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