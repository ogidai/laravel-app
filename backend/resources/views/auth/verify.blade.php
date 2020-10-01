@extends('layouts.app')

@section('content')

<div class="container">
  <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{ ('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
        </div>
        <!-- <a href="{{('/')}}" class="left arrow_back"></a> -->
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
                  <a href="https://twitter.com/procomi2020"><img src="{{ asset('images/t_logo.svg') }}" alt=""></a>
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
        <div class="card">
          <h2 class="page_title">本登録が完了していません！</h2>
          <p>{{Auth::user()->name}}さんのメールアドレス({{Auth::user()->email}})に送信された認証リンクを確認してください。</p>
          <p>もしメールが届いていない場合は再送信します。</p>
          @if (session('resent'))
          <p class="alert" role="alert">
            {{ __('新しい認証リンクを送信しました。メールを確認してください。') }}
          </p>
          @endif
          <div class="btnWrap">
            <form class="form" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit" class="btn -primary -full">メールを再送信する</button>
            </form>
          </div>
        </div>
      </main>



@endsection
