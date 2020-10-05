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

      <nav id="gnav">
          <div class="navBtn -back js-navBtnBack">
              <span></span><span></span><span></span>
          </div>
          <ul class="gnav_list">
              @auth
              <li class="gnav_item">
                  <p class="greeting">こんにちは！<span>{{Auth::user()->name}}</span>さん</p>
                  <p class="auth_email">{{Auth::user()->email}}</p>
              </li>
              <li class="gnav_item">
                <a href="{{ route('post') }}" class="arrow -next">レビューを投稿する</a>
              </li>
              <li class="gnav_item">
                <a href="{{ route('your_post') }}" class="arrow -next">あなたの投稿</a>
              </li>
              <li class="gnav_item -margin">
                <a href="{{ route('user') }}" class="arrow -next">ユーザー情報</a>
              </li>
              @endauth
              <li class="gnav_item">
                <a href="{{ ('/') }}" class="arrow -next">トップページへ</a>
              </li>
              <li class="gnav_item">
                <a href="{{ route('faq') }}" class="arrow -next">よくある質問</a>
              </li>
              <li class="gnav_item">
                  <a href="{{ route('contact') }}" class="arrow -next">お問い合わせ</a>
              </li>
              <li class="gnav_item">
                  <a href="{{ route('policy') }}" class="arrow -next">利用規約・プライバシーポリシー</a>
              </li>
              <li class="gnav_item -sns">
                  <a href="https://twitter.com/procomi2020"><img src="{{ asset('images/t_logo.svg') }}" alt="Twitter"></a>
              </li>
          </ul>
          <footer class="footer -pc">
              <div class="copyright">
                <small>© 2020 プロコミ！</small>
              </div>
            </footer>
      </nav>

      <!-- @extends('layouts.gnav')

      @section('gnav') -->


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
                    <img src="{{ Storage::disk('s3')->url($item->img_01)}}" alt="">
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
