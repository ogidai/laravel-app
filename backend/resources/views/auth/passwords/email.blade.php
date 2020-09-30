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
          @if (session('status'))
              <p class="alert alert-success" role="alert">
                  {{ session('status') }}
              </p>
          @endif

          <form class="form" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="card -form">
              <p class="explain">パスワード再設定用のURLをメールで送信します。
                <br>登録しているメールアドレスを入力してください。</p>
              <label for="email" class="label">メールアドレス</label>
              <input id="email" type="email" name="email" value="" class="-secondary @error('email') is-invalid @enderror" required>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <p class="alert -margin">＊もしメールが届かない場合は、入力したメールアドレスが正しいかをお確かめの上、もう一度「メールを送信する」を押してください。</p>
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">メールを送信する</label>
          </form>
        </div>

      </main>

@endsection
