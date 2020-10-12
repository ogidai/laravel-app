@extends('layouts.app')

@section('content')

<div class="container scrollTop">
  <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
          </a>
        </div>
        <a href="javascript:history.back()" class="left arrow_back -pc"></a>
        <div class="navBtn js-navBtnActive">
          <span></span><span></span><span></span>
        </div>
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

      @include('layouts.gnav')

      <main class="main">
        <div class="card">
          <h1>お問い合わせ</h1>
          <p>プロコミ！をご利用いただき、誠にありがとうございます。
            <br>ご質問やご不明な点がある場合、まずは<a href="{{ route('faq') }}">よくある質問</a>を参照してみてください。
            <br>
            <br>それでも解決できない場合、お手数をおかけしますが、
            <a href="mailto:procomi2020&#64;gmail.com">procomi2020&#64;gmail.com</a>
            にお問い合わせください。
            <br>
            <br>お問い合わせ内容や、時期によって異なりますが、お問い合わせから10日前後で返信します。
            <br>今後ともプロコミ！をよろしくお願いします。
          </p>
        </div>

      </main>
    </div>
  </div>


@endsection
