@extends('layouts.app')

@section('content')

<div class="container">

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
        <a href="javascript:history.back()" class="left arrow_back"></a>
      </div>
    </header>

    <div class="wrapper -hasform">

      <main class="main">
        <div class="inner">
          <div class="btnWrap">
            <a href="/login/google" class="btn -hasicon">
              <i class="icon"><img src="images/google.svg" alt=""></i>
              Googleでログイン
            </a>
          </div>
          <p class="or">or</p>
          <div class="card -form">
          <form class="form" action="" method="post">
              @csrf
              <label for="email" class="label -margin">メールアドレス</label>
              <input id="email" type="email" name="email" value="" class="-secondary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="xxxxx@example.com">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="password" class="label">パスワード</label>
              <input id="password" type="password" name="password" value=""class="-secondary @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="check_me">
                <input type="checkbox" name="remember" value="remember" id="remember">
                <label for="remember">ログイン状態を保存する</label>
              </div>
              <input type="submit" name="submit" value="submit" id="submit">
              <label for="submit" class="submit">ログイン</label>
          </form>
          </div>
          <div class="link_wrap">
            <a href="{{ route('password.request') }}" class="link">パスワードをお忘れの方はこちら</a>
            <a href="{{ route('register') }}" class="link">新規登録はこちら</a>
          </div>
        </div>

      </main>

@endsection
