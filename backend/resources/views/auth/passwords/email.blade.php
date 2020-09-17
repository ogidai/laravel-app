@extends('layouts.app')

@section('content')

<div class="container">

    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{route('home')}}">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
        </div>
        <!-- <div class="navBtn js-navBtn">
          <span class="js-badge active"></span><span></span><span></span>
        </div> -->
        <a href="{{route('user')}}" class="left arrow_back"></a>
      </div>
    </header>

    <div class="wrapper -hasform">

      <main class="main">
        <div class="inner">
          @if (session('status'))
              <p class="alert alert-success" role="alert">
                  {{ session('status') }}
              </p>
          @endif

          <form class="form" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="card -form">
              <p class="explain">パスワード再設定用のURLをメールで送信します。
                <br>登録しているメールアドレスを入力してください。</p>
              <label for="email" class="label">メールアドレス</label>
              <input id="email" type="email" name="email" value="" class="-secondary @error('email') is-invalid @enderror" required>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <p class="alert -margin">＊もしメールが届かない場合は、入力したメールアドレスが正しいかをお確かめの上、もう一度「メールを送信する」を押してください。</p>
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">メールを送信する</label>
          </form>
        </div>

      </main>

@endsection



<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset aaPassword') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
