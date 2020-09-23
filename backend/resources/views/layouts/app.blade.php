<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProHika') }}</title>

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

    $(function() {
      // logout modal
      $('.js-showLogoutModal').click(function() {
          $('.js-logoutModal').addClass('active');
          $('.overlay').addClass('active');
          $('body').css('overflow', 'hidden');
      });
      $('.overlay').click(function() {
          $('.js-logoutModal').removeClass('active');
          $('.overlay').removeClass('active');
          $('body').css('overflow', 'auto');
      });
      $('.js-logoutModalBack').click(function() {
        $('.js-logoutModal').removeClass('active');
        $('.overlay').removeClass('active');
        $('body').css('overflow', 'auto');
      });

      // delete an account modal
      $('.js-showDeleteAccountModal').click(function() {
          $('.js-deleteAccountModal').addClass('active');
          $('.overlay').addClass('active');
          $('body').css('overflow', 'hidden');
      });
      $('.overlay').click(function() {
          $('.js-deleteAccountModal').removeClass('active');
          $('.overlay').removeClass('active');
          $('body').css('overflow', 'auto');
      });
      $('.js-deleteAccountModalBack').click(function() {
        $('.js-deleteAccountModal').removeClass('active');
        $('.overlay').removeClass('active');
        $('body').css('overflow', 'auto');
      });

      // delete post modal
      $('.js-showDeletePostModal').click(function() {
          $('.js-deletePostModal').addClass('active');
          $('.overlay').addClass('active');
          $('body').css('overflow', 'hidden');
      });
      $('.overlay').click(function() {
          $('.js-deletePostModal').removeClass('active');
          $('.overlay').removeClass('active');
          $('body').css('overflow', 'auto');
      });
      $('.js-deletePostModalBack').click(function() {
        $('.js-deletePostModal').removeClass('active');
        $('.overlay').removeClass('active');
        $('body').css('overflow', 'auto');
      });
    });

    $(function() {
      $('#term_check').attr('disabled', 'disabled');
      $('form input:required').change(function() {
          //必須項目が空かどうかフラグ
          let flag = true;
          //必須項目をひとつずつチェック
          $('form input:required').each(function(e) {
              //もし必須項目が空なら
              if ($('form input:required').eq(e).val() === "") {
                  flag = false;
              }
          });
          //全て埋まっていたら
          if (flag) {
              //送信ボタンを復活
              $('#term_check').removeAttr('disabled');
          }
          else {
              //送信ボタンを閉じる
              $('#term_check').attr('disabled', 'disabled');
          }
      });
    });

    // 新規登録のフォームが全て入力されていたらsubmitできるようにする
    $(function() {
      $('#register_submit').attr('disabled', 'disabled');

      $('#term_check').click(function() {
        if ( $(this).prop('checked') == false ) {
          $('#register_submit').attr('disabled', 'disabled');
        } else {
          $('#register_submit').removeAttr('disabled');
        }
      });
    });


  // コンテンツの高さがない時にフッターを下に固定する
  $(function(){
    var winHeight = $(window).height();
    var containerHeight = $('.container').height();
    var contentHeight = winHeight - containerHeight;
    if (contentHeight > 0) {
      $('footer').css({'position':'fixed','bottom':'0','left':'0'});
    }
  });

  // 画像の追加
  $(function() {
    $('#addImages02, #addImages03').attr('disabled', 'disabled');

    $('#addImages01').on('change', function() {
      if ( $(this).prop('')) {
        $('#addImages02').attr('disabled', 'disabled');
      } else {
        $('#addImages02').removeAttr('disabled');
      }
    });
    $('#addImages02').on('change', function() {
      if ( $(this).prop('')) {
        $('#addImages03').attr('disabled', 'disabled');
      } else {
        $('#addImages03').removeAttr('disabled');
        $('#delete01').removeClass('-hidden');
      }
    });
    $('#addImages03').on('change', function() {
      if ( $(this).prop('')) {
        $('#delete01').removeClass('-hidden');
        $('#delete02').addClass('-hidden');
      } else {
        // $('#delete01').addClass('-hidden');
        $('#delete02').removeClass('-hidden');
      }
    });

  $('#addImages01').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#showImages01").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
  });
  $('#addImages02').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#showImages02").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
  });
  $('#addImages03').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#showImages03").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
  });

  $('#delete01').click(function() {
    $("#showImages02").attr('src', '');
    $('#addImages03').attr('disabled', 'disabled');
    $('#delete01').addClass('-hidden');
  });
  $('#delete02').click(function() {
    $("#showImages03").attr('src', '');
    $('#delete02').addClass('-hidden');
  });
});

$(function(){
  $('.question').on('click', function() {
    $(this).next('.answer').slideToggle();
  })
});
  </script>
</body>
</html>
