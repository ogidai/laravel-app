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
        @guest
        <div class="right btnWrap">
          <a href="{{ route('login') }}" class="btn">ログイン</a>
        </div>
        @else
        <div class="right btnWrap">
          <span class="btn js-showLogoutModal">ログアウト</span>
        </div>
        @endguest
        <a href="javascript:history.back()" class="left arrow_back"></a>
      </div>
    </header>

    <div class="wrapper -top">
      @extends('layouts.gnav')

      @section('gnav')
      <main class="main">
        <div class="inner">
          <form class="form" action="{{ action('Admin\UserController@update') }}" method="POST">
            @csrf
            <div class="card -form">
              <label for="name" class="label -margin">ユーザー名</label>
              <input id="name" type="text" name="name" value="{{ $user->name }}" class="-secondary @error('name') is-invalid @enderror" required>
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="email" class="label">メールアドレス</label>
              <input id="email" type="email" name="email" value="{{ $user->email }}" class="-secondary @error('email') is-invalid @enderror" required>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">登録情報を変更</label>
          </div>
          </form>
        </div>

      </main>

@endsection
