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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            
        </main>
    </div> -->
    @yield('content')
    <footer class="footer">
        <div class="fNav">
          <div class="contentInner">
            <ul class="fNavList">
              <li>
                <span>ProHikaについて</span>
                <ul class="fNav_sub -about">
                  <li><a href="#">ProHikaとは</a></li>
                  <li><a href="#">プライバシーポリシー</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">利用規約</a></li>
                  <li><a href="#">お問い合わせ</a></li>
                </ul>
              </li>
              <li>
                <span>公式SNSアカウント</span>
                <ul class="fNav_sub -sns">
                  <li><a href="#"><img src="images/t_logo.svg" alt=""></a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="copyright">
          <small>© ProHika All rights reserved.</small>
        </div>
      </footer>

    </div>



  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script>
  // spハンバーガーメニューのクリックイベント
    $(function() {
      $('.js-navBtnActive').click(function() {
          $('.gnav').addClass('active');
          $('.overlay').addClass('active');
          $('body').css('overflow', 'hidden');
      });
      $('.js-navBtnBack').click(function() {
          $('.gnav').removeClass('active');
          $('.overlay').removeClass('active');
          $('body').css('overflow', 'auto');
      });
      $('.overlay').click(function() {
          $('.gnav').removeClass('active');
          $('.overlay').removeClass('active');
          $('body').css('overflow', 'auto');
      });
    });
  </script>
</body>
</html>
