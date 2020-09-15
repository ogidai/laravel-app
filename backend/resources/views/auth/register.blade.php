@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container">

    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{('/')}}">
            <img src="images/logo.png" alt="">
          </a>
        </div>
        <a href="{{('/')}}" class="left arrow_back"></a>
      </div>

    </header>



    <div class="wrapper -secondary">



      <main class="main">
        <div class="inner">
          <div class="btnWrap">
            <a href="{{ route('policy_confirm') }}" class="btn -hasicon">
              <i class="icon"><img src="images/google.svg" alt=""></i>
              Googleで新規登録
            </a>
          </div>
          <p class="or">or</p>
          <form class="login_form form" method="POST" action="{{ route('register') }}">
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
              <p>ProHika（以下「当方」）は、アプリケーション（以下「アプリ」）を開発・運用しています。本アプリのご使用によって、本規約に同意していただいたものとみなします。</p>
              <h2>2.収集する情報</h2>
              <p>アプリのご利用に際して、以下の利用者情報を取得いたします。</p>
              <h3>2.1 アプリケーションの利用状況の収集</h3>
              <p></p>
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
              <h2>9.連絡先</h2>
              <p><a href="mailto:prohika2020&#64;gmail.com">prohika2020&#64;gmail.com</a></p>
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
                <label for="register_submit" class="submit">上記の新規内容で登録</label>
            </div>
          </form>
        </div>

      </main>


@endsection
