@extends('layouts.app')

@section('content')

<div class="container">
  <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
          </a>
        </div>
        <a href="{{('/')}}" class="left arrow_back -pc"></a>
        <div class="navBtn js-navBtnActive">
          <span></span><span></span><span></span>
        </div>
        @guest
        <div class="right btnWrap">
          <a href="javascript:history.back()" class="btn">ログイン</a>
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
        <div class="card -faq">
          <h1>よくある質問</h1>
          <h2 class="title">ユーザー情報について</h2>
          <p class="question">ユーザー名の変更</p>
          <p class="answer">「メニュー」→「ユーザー情報」→「ユーザー情報を編集」からユーザー名を変更することができます。</p>
          <p class="question">メールアドレスの変更</p>
          <p class="answer">「メニュー」→「ユーザー情報」→「ユーザー情報を編集」からメールアドレスを変更することができます。</p>
          <p class="question">パスワードの変更</p>
          <p class="answer">「メニュー」→「ユーザー情報」→「パスワードを変更」からパスワードを変更することができます。</p>
          <p class="question">退会</p>
          <p class="answer">「メニュー」→「ユーザー情報」→「退会」から退会することができます。
          <br>退会した場合、あなたのアカウントは削除されますが投稿は削除されません。
          <br>もし投稿を残したくない場合は投稿を削除した後に退会してください。</p>
          <p class="question">ログインのパスワードを忘れた</p>
          <p class="answer"><a href="{{ route('password.request') }}">こちらから</a>再設定してください。</p>
          <p class="question">メール認証ができない</p>
          <p class="answer">メールをご確認ください。もし送信されていない場合は、登録したメールアドレスが間違っている可能性があります。</p>

          <h2 class="title">投稿について</h2>
          <p class="question">レビューの投稿</p>
          <p class="answer">レビューの投稿をするには会員登録をしていただく必要があります。
          <a href="{{route('register')}}">こちらから会員登録</a>をし、メニューから「レビューを投稿する」を選択してください。
          <br>また、会員登録を既にされている方は、<a href="{{route('login')}}">ログイン</a>し、メニューから「レビューを投稿する」を選択してください。</p>
          <p class="question">自分の投稿の確認</p>
          <p class="answer">「メニュー」→「あなたの投稿」で過去の投稿の一覧が表示されます。</p>
          <p class="question">投稿を編集</p>
          <p class="answer">「メニュー」→「あなたの投稿」→編集したい投稿を選択→「投稿を編集」で投稿を編集することができます。</p>
          <p class="question">投稿を削除</p>
          <p class="answer">「メニュー」→「あなたの投稿」→削除したい投稿を選択→「投稿を削除」で投稿を削除することができます。</p>
          <p class="question">投稿が完了できない</p>
          <p class="answer">投稿に必要な項目の全てに回答しているかをお確かめください。</p>
          <p class="question">投稿にURLを添付できないのはなぜですか</p>
          <p class="answer">プロコミ！では全ての広告への誘導、全ての勧誘を禁止しているためです。
          <br>全ての広告への誘導、全ての勧誘を禁止することで、ユーザーの皆様に快適にサイトを楽しんでいただく目的があります。</p>
          <p class="question">総合評価とは</p>
          <p class="answer">総合評価とは美味しさ、溶けやすさ、泡立ちの少なさ、コスパ、おすすめ度の平均値です。
          <br>総合評価はプロコミ！で計算するため、入力する必要はありません。</p>
          <!-- <p class="question"></p>
          <p class="answer"></p> -->

        </div>

      </main>


@endsection
