@extends('layouts.app')

@section('content')

<div class="container scrollTop">
  <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="overlay"></div>
        <div class="logo">
          <a href="{{ ('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
          </a>
        </div>
        <div class="navBtn js-navBtnActive">
          <span></span><span></span><span></span>
        </div>
        <!-- <a href="{{('/')}}" class="left arrow_back"></a> -->
      </div>
    </header>

    <div class="wrapper -top">

      @include('layouts.gnav')

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
    </div>
  </div>



@endsection
