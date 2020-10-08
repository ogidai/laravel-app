@extends('layouts.app')

@section('content')

<div class="container scrollTop">

    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
          </a>
        </div>
        <div class="navBtn js-navBtnActive">
          <span class="js-badge"></span><span></span><span></span>
        </div>
        <a href="{{('/')}}" class="left arrow_back -pc"></a>
      </div>
    </header>

    <div class="wrapper -top">
      <main class="main">
        <div class="inner -max">
          <form class="form" method="POST" action="{{ route('password.update') }}">
            <div class="card -form">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <label for="email" class="label">メールアドレス</label>
              <input id="email" type="email" name="email" class="-secondary @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="xxxxx@example.com"required autofocus>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="password" class="label">パスワード</label>
              <input id="password" type="password" name="password" value=""class="-secondary @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="８文字以上">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="password_confirm" class="label">パスワード確認</label>
              <input id="password_confirm" type="password" name="password_confirmation" value="" class="-secondary" placeholder="同じパスワードを入力"  required autocomplete="new-password">
            </div>
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">パスワードを再設定</label>
          </form>
        </div>

      </main>

@endsection
