@extends('layouts.app')

@section('content')

<div class="container">
  <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
        </div>
        <a href="javascript:history.back()" class="left arrow_back"></a>
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
        <div class="card">
          <h2 class="page_title">キーワードで検索</h2>
          <form class="form -search" action="" method="post">
            @csrf
            <div class="input_wrap">
              <label for="search" class="label"></label>
              <input type="text" name="search" value="" id="search" class="-secondary">
              <div class="btnWrap">
                <label for="submit" class="label btn -primary text_align">検索</label>
                <input type="submit" name="" value="submit" id="submit" class="">
              </div>
            </div>
          </form>
        </div>
        <div class="card">
          <h2 class="page_title">並べ替え</h2>
          <!-- <div class="options_wrap"> -->
            <form class="" action="" method="post">
              @csrf

              <div class="options">
                <div class="options_item">
                  <input type="radio" name="option" value="new" id="new" checked="checked">
                  <label for="new">最新</label>
                </div>
                <div class="options_item">
                  <input type="radio" name="option" value="all" id="all">
                  <label for="all">総合評価</label>
                </div>
                <div class="options_item">
                  <input type="radio" name="option" value="taste" id="taste">
                  <label for="taste">美味しさ</label>
                </div>
                <div class="options_item">
                  <input type="radio" name="option" value="cost" id="cost">
                  <label for="cost">コスパ</label>
                </div>
                <div class="options_item">
                  <input type="radio" name="option" value="cost" id="cost">
                  <label for="cost">おすすめ度</label>
                </div>
                <div class="options_item">
                  <input type="radio" name="option" value="cost" id="cost">
                  <label for="cost">価格降順</label>
                </div>
                <div class="options_item">
                  <input type="radio" name="option" value="cost" id="cost">
                  <label for="cost">価格昇順</label>
                </div>

              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          <!-- </div> -->

        </div>

      </main>


@endsection
