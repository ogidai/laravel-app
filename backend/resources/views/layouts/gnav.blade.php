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
          <a href="{{ route('about') }}" class="arrow -next">プロコミ！とは？</a>
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
        <li class="gnav_item">
            <a href="support" class="arrow -next">プロコミ！を支援する</a>
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

@yield('gnav')
