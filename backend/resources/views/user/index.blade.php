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
        <a href="{{route('home')}}" class="left arrow_back"></a>
      </div>
    </header>

    <div class="wrapper -secondary">

      <main class="main">
        <div class="inner">
          <form class="form" action="" method="post">
            @csrf
            <label for="name" class="label -margin">ユーザー名</label>
            <input id="name" type="text" name="name" value="{{ $user->name }}" class="-secondary" disabled>
            <label for="email" class="label">メールアドレス</label>
            <input id="email" type="text" name="email" value="{{ $user->email }}" class="-secondary" disabled>
            <label for="created" class="label">登録日時</label>
            <input id="created" type="text" name="created" value="{{ $user->created_at }}" class="-secondary" disabled>
            <label for="update" class="label">更新日時</label>
            <input id="update" type="text" name="update" value="{{ $user->updated_at }}" class="-secondary" disabled>
            <div class="btnWrap">
              <a href="{{ action('Admin\UserController@edit') }}" class="btn -full -primary">ユーザー情報を編集</a>
              <a href="{{ route('changepassword') }}" class="btn -full">パスワードを変更</a>
            </div>
          </form>
        </div>

      </main>

@endsection
