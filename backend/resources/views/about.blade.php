@extends('layouts.app')

@section('content')

<div class="container scrollTop">
  <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
          </a>
        </div>
        <a href="javascript:history.back()" class="left arrow_back -pc"></a>
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
        <div class="card">
          <h1><img class="title_logo" src="{{ asset('images/logo.png') }}" alt="プロコミ！">とは？</h1>
          <div class="talking -left">
            <figure>
              <img src="{{ asset('images/men01.png') }}" alt="男性１">
            </figure>
            <p>最近筋トレ始めたし、プロテイン飲もう！
              <br><strong>でも…プロテインってどれがいいのかよくわからん！</strong>
              <br>周りに詳しい人もいないしなぁ〜、もうダメだ…</p>
          </div>
          <div class="talking -right">
            <p>大丈夫！そんなときはプロテインの口コミサイト、<strong>「プロコミ！」</strong>を見るといいよ！</p>
            <figure>
              <img src="{{ asset('images/men022.png') }}" alt="男性１">
            </figure>
          </div>
          <div class="talking -left">
            <figure>
              <img src="{{ asset('images/men01.png') }}" alt="男性１">
            </figure>
            <p>プロコミ！って何だよ！へへっ、ダッセェ名前だな！</p>
          </div>
          <div class="talking -right">
            <p>名前はダサいけど、とても便利で素晴らしいサイトだよ！
              <br><strong>みんなが投稿したプロテインの口コミが見れるんだ。</strong>とても参考になるよ！</p>
            <figure>
              <img src="{{ asset('images/men022.png') }}" alt="男性１">
            </figure>
          </div>
          <div class="talking -left">
            <figure>
              <img src="{{ asset('images/men014.png') }}" alt="男性１">
            </figure>
            <p>どーせ他のサイトと同じで広告まみれなんだろ！<br>俺は信用できねぇ。
              <br>はー、もううんざりだよ。</p>
          </div>
          <div class="talking -right">
            <p>それが違うんだ！
              <br><strong>プロコミ！は全く広告を掲載していないんだ。</strong>
              <br><strong>それに投稿には、広告への誘導を未然に防ぐために、URLが貼れないようになっているから安心だよ。</strong>
              <br>口コミを見て、興味があれば自分で検索すればいいんだよ。</p>
            <figure>
              <img src="{{ asset('images/men02.png') }}" alt="男性１">
            </figure>
          </div>
          <div class="talking -left">
            <figure>
              <img src="{{ asset('images/men01.png') }}" alt="男性１">
            </figure>
            <p>マジかよ…　めっちゃいいじゃん。
              <br>でも口コミサイトって使いにくいのが多くない？</p>
          </div>
          <div class="talking -right">
            <p>確かにね、でも安心して！
              <br><strong>プロコミ！は検索機能、さらに様々な項目の並べ替え機能もついているんだ！</strong>
              <br>だからすごく使いやすいよ。</p>
            <figure>
              <img src="{{ asset('images/men02.png') }}" alt="男性１">
            </figure>
          </div>
          <div class="talking -left">
            <figure>
              <img src="{{ asset('images/men013.png') }}" alt="男性１">
            </figure>
            <p>それは激アツだな。早速使ってみるぜ！</p>
          </div>

        </div>

      </main>
    </div>
  </div>


@endsection
