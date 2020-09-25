<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProHika') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body id="body">
    @yield('content')
    @auth
    <div class="modal js-logoutModal">
      <p class="text">ログアウトしてもよろしいですか？</p>
      <div class="btnWrap">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn -primary">はい</a>
        <span class="btn js-logoutModalBack">いいえ</span>
      </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
        @csrf
      </form>
    </div>
    <div class="modal js-deleteAccountModal">
      <p class="text">この操作は戻せません。<br>本当に退会しますか？</p>
      <div class="btnWrap">
        <a href="{{ action('Admin\UserController@destroy')}}" class="btn -primary">はい</a>
        <span class="btn js-deleteAccountModalBack">いいえ</span>
      </div>
    </div>
    @endauth
    <footer class="footer -sp">
      <div class="copyright">
        <small>© 2020 ProHika</small>
      </div>
    </footer>

    </div>



  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

</body>
</html>
