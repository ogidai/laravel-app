@extends('layouts.app')

@section('content')

<div class="container scrollTop">

    <header class="header">
      <div class="contentInner">
        <div class="overlay"></div>
        <div class="logo">
          <a href="{{('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
          </a>
        </div>
        <div class="navBtn js-navBtnActive">
          <span></span><span></span><span></span>
        </div>
        <a href="javascript:history.back()" class="left arrow_back -pc"></a>
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
        <div class="inner -max">
          <h2 class="page_title">仮登録</h2>
          <p class="alert">＊仮登録後、メール認証が完了すると新規会員登録が完了します。</p>
          <div class="btnWrap">
            <a href="{{ route('policy_confirm') }}" class="btn -hasicon">
              <i class="icon"><img src="images/google.svg" alt=""></i>
              Googleで新規登録
            </a>
          </div>
          <p class="or">or</p>
          <form class="login_form form" method="POST" action="{{ route('register') }}">
            <div class="card -form">
              @csrf
              <p class="alert -top">＊全ての項目を入力してください。</p>
              <label for="username" class="label">ユーザー名</label>
              <input id="username" type="text" name="name" value="" class="-secondary @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="プロヒカ（公開されます）">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="email" class="label">メールアドレス</label>
              <input id="email" type="email" name="email" value="" class="-secondary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="xxxxx@example.com">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="password" class="label">パスワード</label>
              <input id="password" type="password" name="password" value=""class="-secondary @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="８文字以上">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="password_confirm" class="label">パスワード確認</label>
              <input id="password_confirm" type="password" name="password_confirmation" value="" class="-secondary" placeholder="同じパスワードを入力"  required autocomplete="new-password">
              <p class="alert -margin">＊ログインの際に、メールアドレスとパスワードを使用します。</p>
              <div class="card -policy -register">
                <h1>利用規約・プライバシーポリシー</h1>
                <h2 class="-top">1.はじめに</h2>
                <p>プロコミ！（以下「当方」）は、アプリケーション（以下「アプリ」）を開発・運用しています。本アプリのご使用によって、本規約に同意していただいたものとみなします。</p>
                <h2>2.収集する情報</h2>
                <p>アプリのご利用に際して、以下の利用者情報を取得いたします。</p>
                <h3>2.1 アプリケーションの利用状況の収集</h3>
                <p>当方が運営するアプリでは、利用状況解析のためのツールを使用する場合がございます。個人を特定するためなどには使用しておりません。</p>
                <h3>2.2 お問い合わせやご意見を頂く際の個人情報の収集</h3>
                <h4>2.2.1 送信元のメールアドレス</h4>
                <h4>2.2.2 お問い合わせ内容</h4>
                <h2>3.利用目的</h2>
                <p>当方は、2.2 において収集した情報を、お問い合わせに対する返信のために利用いたします。また、2.2 において収集した情報を、本アプリの品質向上のために利用いたします</p>
                <h2>4.個人情報の管理</h2>
                <p>当方は、お客さまの個人情報を正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止するため、安全対策を実施し個人情報の厳重な管理を行ないます。</p>
                <h2>5.個人情報の第三者への開示・提供の禁止</h2>
                <p>当方は、お客さまよりお預かりした個人情報を適切に管理し、次のいずれかに該当する場合を除き、個人情報を第三者に開示いたしません。
                <br>・お客さまの同意がある場合
                <br>・法令に基づき開示することが必要である場合</p>
                <h2>6.法令、規範の遵守と見直し</h2>
                <p>当方は、保有する個人情報に関して適用される日本の法令、その他規範を遵守するとともに、本ポリシーの内容を適宜見直し、その改善に努めます。</p>
                <h2>7.免責事項</h2>
                <p>本アプリがユーザーの特定の目的に適合すること、期待する機能・商品的価値・正確性・有用性を有すること、および不具合が生じないことについて、何ら保証するものではありません。
                  当方の都合によりアプリの仕様を変更できます。当方は、本アプリの提供の終了、変更、または利用不能、本アプリの利用によるデータの消失または機械の故障もしくは損傷、その他本アプリに関してユーザーが被った損害につき、賠償する責任を一切負わないものとします。</p>
                <h2>8.著作権・知的財産権等</h2>
                <p>著作権その他一切の権利は、当方又は権利を有する第三者に帰属します。</p>
                <h2>9.禁止行為</h2>
                <p>プロコミ！では、全てのユーザーが快適にアプリを利用できるよう、以下の行為を禁止とします。
                <br>・全ての広告への誘導
                <br>・全ての勧誘
                <br>・過激な表現を含む投稿
                <br>・誤った情報と知りながら投稿すること
                <br>・特定の人物や団体を攻撃すること
                <br>・本アプリに対し、何らかの攻撃をすること
                <br>以上の禁止行為を発見した場合、該当ユーザーを強制退会させる可能性があります。
                <br>また、禁止行為に記されていない行為であったとしても、運営の判断により、警告などをさせていただきます。
                </p>
                <h2>10.連絡先</h2>
                <p><a href="mailto:procomi2020&#64;gmail.com">procomi2020&#64;gmail.com</a></p>
              </div>
              <p class="alert -margin">＊利用規約・プライバシーポリシーを確認の上、同意される方はチェクを入れてください。
              <br>＊全ての項目が入力されていない場合、以下をチェックできません。
              </p>
              <div class="check_me">
                <input type="checkbox" name="check" value="check" id="term_check" required>
                <label for="term_check">同意します。</label>
              </div>
            <div class="js-submitBtn">
                <input type="submit" name="submit" value="submit" id="register_submit">
                <label for="register_submit" class="submit">上記の内容で仮登録</label>
            </div>
          </div>
          </form>
        </div>

      </main>


@endsection
