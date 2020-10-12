@extends('layouts.app')

@section('content')

<div class="container">
    <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
          </a>
        </div>
        <a href="{{ ('/') }}" class="left arrow_back -pc"></a>
        <div class="navBtn js-navBtnActive">
          <span></span><span></span><span></span>
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
      </div>
    </header>

    <div class="wrapper -top">

    @include('layouts.gnav')

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
                    @if (is_null($item->img_01) == true)
                    <img src="{{ asset('images/noimage.png') }}" alt="no image">
                    @else
                    <img src="{{ Storage::disk('s3')->url($item->img_01)}}" alt="">
                    @endif
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
    </div>
  </div>


@endsection
