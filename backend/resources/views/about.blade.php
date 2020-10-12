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
        <div class="card -about">
          <h1>プロコミとは？</h1>
          <p>プロコミとはプロテインの口コミサイトです。</p>
          <p></p>

        </div>

      </main>
    </div>
  </div>


@endsection
