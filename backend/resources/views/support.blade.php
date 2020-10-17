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
          <h1><img class="title_logo" src="{{ asset('images/logo.png') }}" alt="プロコミ！">を支援する</h1>
          <div class="talking -right -vertically">
            <p>プロコミ！をご利用いただき、誠にありがとうございます。
            <br>これからもサービスの向上に全力で努めてまいります。
            <br>ご支援をいただけますと幸いです。
            <br>＊以下のボタンをクリック・タップするとプロコミ！運営者（OGIKUBO DAIKI）のPayPal.Meのページへ移動します。</p>
            <figure>
              <img src="{{ asset('images/men02.png') }}" alt="男性１">
            </figure>
          </div>
          <div class="btnWrap -margin">
            <a href="https://www.paypal.com/paypalme/ogidai" class="btn -full -primary">プロコミ！を支援する</a>
          </div>

        </div>

      </main>
    </div>
  </div>


@endsection
