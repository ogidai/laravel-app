@extends('layouts.app')

@section('content')

<div class="container">

    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{route('home')}}">
            <img src="../images/logo.png" alt="">
          </a>
        </div>
        <!-- <div class="navBtn js-navBtn">
          <span class="js-badge active"></span><span></span><span></span>
        </div> -->
        <a href="{{route('user')}}" class="left arrow_back"></a>
      </div>
    </header>

    <div class="wrapper -secondary">

      <main class="main">
        <div class="inner">
          <form class="form" action="{{ action('Admin\UserController@update') }}" method="POST">
            @csrf
            <label for="name" class="label -margin">ユーザー名</label>
            <input id="name" type="text" name="name" value="{{ $user->name }}" class="-secondary @error('name') is-invalid @enderror" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="email" class="label -margin">メールアドレス</label>
            <input id="email" type="email" name="email" value="{{ $user->email }}" class="-secondary @error('email') is-invalid @enderror" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">登録情報を変更</label>
          </form>
        </div>

      </main>

@endsection
