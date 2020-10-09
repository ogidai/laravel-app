<!doctype html>
<html lang="ja">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153215987-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-153215987-3');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- sns設定 -->
    <meta name="description" content="広告なしで安心のプロテイン口コミサイト「プロコミ！」　
    プロテインの購入の参考や、お気に入りのプロテインをレビューしてみんなでシェアすることができます！">
  	<meta property="og:title" content="プロコミ！">
  	<meta property="og:type" content="website">
  	<meta property="og:url" content="https://procomi.herokuapp.com">
  	<meta property="og:image" content="https://procomi.herokuapp.com/images/catch.png">
  	<meta property="og:site_name" content="プロコミ！">
  	<meta property="og:description" content="広告なしで安心のプロテイン口コミサイト「プロコミ！」　
    プロテインの購入の参考や、お気に入りのプロテインをレビューしてみんなでシェアすることができます！">
  	<meta name="twitter:card" content="summary_large_image">
    <link rel="apple-touch-icon" href="https://procomi.herokuapp.com/images/icon_square.png">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>プロコミ！</title>

    <!-- Styles -->
    <link href="{{ asset('css/app_min.css') }}" rel="stylesheet">

</head>

<body id="body">

    <div id="loading">
      <figure class="loading_logo">
        <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
      </figure>
      <figure class="loading_icon">
        <img src="{{ asset('images/load.gif') }}" alt="loadeing">
      </figure>
    </div>
    <div id="body_hidden">

    @yield('content')
    @auth

  </div>
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
    @endauth
    <footer class="footer -sp">
      <div class="copyright">
        <small>© 2020 プロコミ！</small>
      </div>
    </footer>

    </div>



  </div>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="{{ asset('js/app_min.js') }}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/ie-buster@1.1.0/dist/ie-buster.min.js"></script>
</body>
</html>
