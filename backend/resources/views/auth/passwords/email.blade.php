@extends('layouts.app')

@section('content')

<div class="container">

    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{route('home')}}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
          </a>
        </div>
        <div class="navBtn js-navBtnActive">
          <span class="js-badge"></span><span></span><span></span>
        </div>
        <a href="javascript:history.back()" class="left arrow_back -pc"></a>
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
        <div class="inner -max">
          @if (session('status'))
              <p class="alert alert-success" role="alert">
                  {{ session('status') }}
              </p>
          @endif

          <form class="form" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="card -form">
              <p class="explain">パスワード再設定用のURLをメールで送信します。
                <br>登録しているメールアドレスを入力してください。</p>
              <label for="email" class="label">メールアドレス</label>
              <input id="email" type="email" name="email" value="" class="-secondary @error('email') is-invalid @enderror" required>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <p class="alert -margin">＊もしメールが届かない場合は、入力したメールアドレスが正しいかをお確かめの上、もう一度「メールを送信する」を押してください。</p>
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">メールを送信する</label>
          </form>
        </div>

      </main>

@endsection
