@extends('layouts.app')

@section('content')

<div class="container scrollTop">
<div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="overlay"></div>
        <div class="logo">
          <a href="{{('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
          </a>
        </div>
        <div class="navBtn js-navBtnActive">
          <span></span><span></span><span></span>
        </div>
        <a href="javascript:history.back()" class="left arrow_back -pc"></a>
        @guest
        <div class="right btnWrap">
          <a href="{{ route('login') }}" class="btn">ログイン</a>
        </div>
        @else
        <div class="right btnWrap">
          <span class="btn js-showLogoutModal">ログアウト</span>
        </div>
        @endguest
      </div>
    </header>

    <div class="wrapper -top">
      <nav id="gnav">
          <div class="navBtn -back js-navBtnBack">
              <span></span><span></span><span></span>
          </div>
          <ul class="gnav_list">
              @auth
              <li class="gnav_item">
                  <p class="greeting">こんにちは！<span>{{Auth::user()->name}}</span>さん</p>
                  <p class="auth_email">{{Auth::user()->email}}</p>
              </li>
              <li class="gnav_item">
                <a href="{{ route('post') }}" class="arrow -next">レビューを投稿する</a>
              </li>
              <li class="gnav_item">
                <a href="{{ route('your_post') }}" class="arrow -next">あなたの投稿</a>
              </li>
              <li class="gnav_item -margin">
                <a href="{{ route('user') }}" class="arrow -next">ユーザー情報</a>
              </li>
              @endauth
              <li class="gnav_item">
                <a href="{{ ('/') }}" class="arrow -next">トップページへ</a>
              </li>
              <li class="gnav_item">
                <a href="{{ route('faq') }}" class="arrow -next">よくある質問</a>
              </li>
              <li class="gnav_item">
                  <a href="{{ route('contact') }}" class="arrow -next">お問い合わせ</a>
              </li>
              <li class="gnav_item">
                  <a href="{{ route('policy') }}" class="arrow -next">利用規約・プライバシーポリシー</a>
              </li>
              <li class="gnav_item -sns">
                  <a href="https://twitter.com/procomi2020"><img src="{{ asset('images/t_logo.svg') }}" alt="Twitter"></a>
              </li>
          </ul>
          <footer class="footer -pc">
              <div class="copyright">
                <small>© 2020 プロコミ！</small>
              </div>
            </footer>
      </nav>
      <!-- @extends('layouts.gnav')

      @section('gnav') -->
      <main class="main">
        <div class="inner">
          @if (session('change_password_error'))
            <p class="alert">
              {{session('change_password_error')}}
            </p>
          @endif

          @if (session('change_password_success'))
            <p class="alert">
              {{session('change_password_success')}}
            </p>
          @endif
          <form class="login_form form" method="POST" action="{{route('changepassword')}}">
            @csrf
            <div class="card -form">
              <label for="password" class="label -margin">現在のパスワード</label>
              <input id="password" type="password" value="" class="-secondary" name="current_password" required placeholder="８文字以上">
              @if ($errors->has('new_password'))
              <p class="alert -margin">
                {{ $errors->first('new_password') }}
              </p>
              @endif
              <label for="password" class="label">新しいパスワード</label>
              <input id="password" type="password" value=""class="-secondary" name="new_password" required placeholder="８文字以上">
              <label for="password_confirm" class="label">新しいパスワード確認</label>
              <input id="password_confirm" type="password" name="new_password_confirmation" value="" class="-secondary" placeholder="同じパスワードを入力"  required>
            <input type="submit" name="submit" value="submit" id="changepassword_submit">
            <label for="changepassword_submit" class="submit">パスワードを変更</label>
          </div>
          </form>
        </div>

      </main>


@endsection
