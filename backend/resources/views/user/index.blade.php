@extends('layouts.app')

@section('content')

<div class="container">
<div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{route('home')}}">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
        </div>
        <a href="{{ ('/') }}" class="left arrow_back"></a>
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
        <div class="inner">
          <form class="form" action="" method="post">
            @csrf
            <div class="card -form">
              <label for="name" class="label -margin">ユーザー名</label>
              <input id="name" type="text" name="name" value="{{ $user->name }}" class="-secondary" disabled>
              <label for="email" class="label">メールアドレス</label>
              <input id="email" type="text" name="email" value="{{ $user->email }}" class="-secondary" disabled>
              <label for="created" class="label">登録日時</label>
              <input id="created" type="text" name="created" value="{{ $user->created_at }}" class="-secondary" disabled>
              <label for="update" class="label">更新日時</label>
              <input id="update" type="text" name="update" value="{{ $user->updated_at }}" class="-secondary" disabled>
            <div class="btnWrap">
              <a href="{{ action('Admin\UserController@edit') }}" class="btn -full">ユーザー情報を編集</a>
              <a href="{{ route('changepassword') }}" class="btn -full">パスワードを変更</a>
              <a href="{{ route('delete') }}" class="btn -full">退会</a>
            </div>
          </div>
          </form>
        </div>
      </main>

@endsection
