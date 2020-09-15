<nav class="gnav">
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
        <li class="gnav_item -margin">
          <a href="#" class="arrow -next">あなたの投稿</a>
        </li>
        @endauth
        <li class="gnav_item">
            <a href="{{ route('about') }}" class="arrow -next">ProHikaとは？</a>
        </li>
        <li class="gnav_item">
            <a href="{{ route('faq') }}" class="arrow -next">よくある質問</a>
        </li>
        <li class="gnav_item">
            <a href="{{ route('contact') }}" class="arrow -next">お問い合わせ</a>
        </li>
        <li class="gnav_item">
            <a href="#" class="arrow -next">プライバシーポリシー</a>
        </li>
        <li class="gnav_item">
            <a href="#" class="arrow -next">利用規約</a>
        </li>
        <li class="gnav_item -sns">
            <a href="#"><img src="images/t_logo.svg" alt=""></a>
        </li>
    </ul>
    <footer class="footer -pc">
        <div class="copyright">
          <small>© 2020 ProHika</small>
        </div>
      </footer>
</nav>

@yield('gnav')
