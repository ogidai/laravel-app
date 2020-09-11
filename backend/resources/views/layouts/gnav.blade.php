<nav class="gnav">
    <div class="navBtn -back js-navBtnBack">
        <span></span><span></span><span></span>
    </div>
    <ul class="gnav_list">
        @auth
        <li class="gnav_item">
            <p class="greeting">こんにちは！<span>{{Auth::user()->name}}</span>さん</p>
        </li>
        @endauth
        <li class="gnav_item">
            <a href="#" class="arrow -next">ProHikaとは？</a>
        </li>
        <li class="gnav_item">
            <a href="#" class="arrow -next">FAQ</a>
        </li>
        <li class="gnav_item">
            <a href="#" class="arrow -next">お問い合わせ</a>
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
</nav>

@yield('gnav')