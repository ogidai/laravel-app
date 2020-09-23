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
        <a href="{{route('home')}}" class="left arrow_back"></a>
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
        <div class="inner">
          <form class="form" action="" method="post">
            @csrf
            <div class="card -form">
              <label for="name" class="label -margin">ユーザー名</label>
              <input id="name" type="text" name="name" value="{{ $user->name }}" class="-secondary" disabled>
              <label for="email" class="label">メールアドレス</label>
              <input id="email" type="text" name="email" value="{{ $user->email }}" class="-secondary" disabled>
              <label for="created" class="label">登録日時</label>
              <input id="created" type="text" name="created" value="{{ $user->created_at }}" class="-secondary" disabled>
              <label for="update" class="label">更新日時</label>
              <input id="update" type="text" name="update" value="{{ $user->updated_at }}" class="-secondary" disabled>
            <div class="btnWrap">
              <a href="{{ action('Admin\UserController@edit') }}" class="btn -full">ユーザー情報を編集</a>
              <a href="{{ route('changepassword') }}" class="btn -full">パスワードを変更</a>
              <a href="{{ route('delete') }}" class="btn -full">退会</a>
            </div>
          </div>
          </form>
        </div>

      </main>

@endsection
