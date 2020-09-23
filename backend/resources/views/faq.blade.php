@extends('layouts.app')

@section('content')

<div class="container">
  <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
        </div>
        <a href="{{('/')}}" class="left arrow_back"></a>
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

      @extends('layouts.gnav')

      @section('gnav')

      <main class="main">
        <div class="card -faq">
          <h1>FAQ</h1>
          <p class="question">レビューの投稿</p>
          <p class="answer">レビューの投稿をするには会員登録をしていただく必要があります。
            <a href="{{route('register')}}">こちらから会員登録</a>をし、メニューから「レビューを投稿する」を選択してください。
          <br>また、会員登録を既にされている方は、<a href="{{route('login')}}">ログイン</a>し、メニューから「レビューを投稿する」を選択してください。</p>
          <p class="question">退会</p>
          <p class="answer">「メニュー」→「ユーザー情報」→「退会」から退会することができます。</p>
          <p class="question">メールアドレスの変更</p>
          <p class="answer">「メニュー」→「ユーザー情報」→「ユーザー情報を編集」からメールアドレスを変更することができます。</p>
          <p class="question">ユーザー名の変更</p>
          <p class="answer">「メニュー」→「ユーザー情報」→「ユーザー情報を編集」からユーザー名を変更することができます。</p>
          <p class="question">パスワードの変更</p>
          <p class="answer">「メニュー」→「ユーザー情報」→「パスワードを変更」からパスワードを変更することができます。</p>
          <p class="question">ログインのパスワードを忘れた</p>
          <p class="answer"><a href="{{ route('password.request') }}">こちらから</a>再設定してください。</p>
          <p class="question">メール認証ができない</p>
          <p class="answer">メールをご確認ください。もし送信されていない場合は、登録したメールアドレスが間違っている可能性があります。</p>
          <p class="question"></p>
          <p class="answer"></p>
          <p class="question"></p>
          <p class="answer"></p>
        </div>

      </main>


@endsection
