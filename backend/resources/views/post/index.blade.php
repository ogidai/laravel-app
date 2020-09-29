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
                <p class="pro_name"><span>{{$item->pro_name}}</span><span>{{$item->flavor}}</span>
                  @if( empty($items->weight) != true )
                  {{$items->weight}}kg
                  @endif
                  </p>
                <div class="post_date_wrap">
                  <p class="post_date -secondary">投稿日：<span>{{date('Y/m/d', strtotime($item->created_at))}}</span></p>
                  @if ( $item->created_at != $item->updated_at )
                  <p class="post_date">更新日：<span>{{date('Y/m/d', strtotime($item->updated_at))}}</span></p>
                  @endif
                </div>
              </div>
            </a>
          </li>
          @endforeach

        </ul>
          {{ $items->links() }}
      </main>


@endsection
