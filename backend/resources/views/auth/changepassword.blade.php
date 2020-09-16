@extends('layouts.app')

@section('content')

<div class="container">

    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{('/')}}">
            <img src="images/logo.png" alt="">
          </a>
        </div>
        <a href="{{('user/index')}}" class="left arrow_back"></a>
      </div>
    </header>

    <div class="wrapper -secondary">

      <main class="main">
        <div class="inner">
          @if (session('change_password_error'))
            <p class="alert">
              {{session('change_password_error')}}
            </p>
          @endif

          @if (session('change_password_success'))
            <p class="alert">
              {{session('change_password_success')}}
            </p>
          @endif
          <form class="login_form form" method="POST" action="{{route('changepassword')}}">
            @csrf
            <label for="password" class="label -margin">現在のパスワード</label>
            <input id="password" type="password" value="" class="-secondary" name="current_password" required placeholder="８文字以上">
            @if ($errors->has('new_password'))
              <p class="alert -margin">
                {{ $errors->first('new_password') }}
              </p>
            @endif
            <label for="password" class="label">新しいパスワード</label>
            <input id="password" type="password" value=""class="-secondary" name="new_password" required placeholder="８文字以上">
            <label for="password_confirm" class="label">新しいパスワード確認</label>
            <input id="password_confirm" type="password" name="new_password_confirmation" value="" class="-secondary" placeholder="同じパスワードを入力"  required>
            <input type="submit" name="submit" value="submit" id="changepassword_submit">
            <label for="changepassword_submit" class="submit">パスワードを変更</label>
          </form>
        </div>

      </main>


@endsection
