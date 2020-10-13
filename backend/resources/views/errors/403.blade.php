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
        <div class="card text_align">
          <h1>エラーが発生しました…</h1>
          <figure class="error_img">
            <img src="{{ asset('images/error.png') }}" alt="エラー">
          </figure>
          <div class="btnWrap">
            <a href="{{ route('home') }}" class="btn -full -primary">トップページへ戻る</a>
          </div>
        </div>

      </main>

    </div>
  </div>

@endsection
