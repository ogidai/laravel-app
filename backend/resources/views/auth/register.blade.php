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
        <!-- <div class="navBtn js-navBtn">
          <span class="js-badge active"></span><span></span><span></span>
        </div> -->
        <!-- <div class="right btnWrap">
          <a href="index.html" class="btn">トップへ</a>
        </div> -->
        <a href="{{('/')}}" class="left arrow_back"></a>
      </div>

    </header>



    <div class="wrapper -secondary">



      <main class="main">
        <div class="inner">
          <div class="btnWrap">
            <a href="/login/google" class="btn -hasicon">
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
            <p class="alert">
              ＊ログインの際に、メールアドレスとパスワードを使用します。入力内容をご確認ください。
              <br>＊全ての項目が入力されていない場合、以下をチェックできません。
            </p>
            <div class="check_me">
              <input type="checkbox" name="check" value="check" id="register_check" required>
              <label for="register_check">確認しました</label>
            </div>
            <div class="js-submitBtn">
                <input type="submit" name="submit" value="submit" id="register_submit">
                <label for="register_submit" class="submit">上記の新規内容で登録</label>
            </div>
          </form>
        </div>

      </main>


@endsection
