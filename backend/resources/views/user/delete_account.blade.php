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
        <!-- <div class="navBtn js-navBtn">
          <span class="js-badge active"></span><span></span><span></span>
        </div> -->
        <a href="{{route('user')}}" class="left arrow_back"></a>
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
        <div class="card">
          <p>退会した場合、あなたに関する情報やあなたの投稿は完全に削除されます。
          <br>アカウントを復旧することはできません。
          <br>それでもよろしいですか？</p>
          <div class="btnWrap">
            <a class="btn -full -primary js-showDeleteAccountModal">はい</a>
            <a class="btn -full" href="{{ route('user') }}">いいえ</a>
          </div>
        </div>
      </main>

@endsection
