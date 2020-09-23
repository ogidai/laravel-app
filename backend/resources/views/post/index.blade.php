@extends('layouts.app')

@section('content')

<div class="container">
    <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{ route('home') }}">
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
        @if($items->isEmpty())
        <div class="card">
          <p class="text_align">{{Auth::user()->name}}さんの投稿は、まだありません。
          <br>あなたが好きなプロテインをシェアしませんか？</p>
          <div class="btnWrap">
            <a href="{{ route('post') }}" class="btn -full -primary">好きなプロテインをシェアする！</a>
          </div>
        </div>
        @endif

        <ul class="pro_list">
          @foreach($items as $item)
          <li class="pro_item">
            <a href="{{ route('post.show', [$item->id]) }}">
              <div class="pro_item_left">
                <div class="img_outer">
                  <figure>
                    <img src="../{{$item->read_temp_path_01}}" alt="">
                  </figure>
                </div>
              </div>
              <div class="pro_item_right">
                <p class="pro_name"><span>{{$item->pro_name}}</span><span>{{$item->flavor}}</span>{{$item->weight}}kg</p>
              <p class="post_date">投稿日：<span>{{date('Y/m/d', strtotime($item->created_at))}}</span></p>
            </div>
            </a>
          </li>
          @endforeach

        </ul>

      </main>


@endsection
