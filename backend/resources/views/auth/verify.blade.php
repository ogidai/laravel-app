@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container">
  <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="#">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
        </div>
        <!-- <a href="{{('/')}}" class="left arrow_back"></a> -->
      </div>
    </header>

    <div class="wrapper -top">
      @extends('layouts.gnav')

      @section('gnav')
      <main class="main">
        <div class="card">
          <h2 class="page_title">本登録が完了していません！</h2>
          <p>{{Auth::user()->name}}さんのメールアドレス({{Auth::user()->email}})に送信された認証リンクを確認してください。</p>
          <p>もしメールが届いていない場合は再送信します。</p>
          @if (session('resent'))
          <p class="alert" role="alert">
            {{ __('新しい認証リンクを送信しました。メールを確認してください。') }}
          </p>
          @endif
          <div class="btnWrap">
            <form class="form" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit" class="btn -primary -full">メールを再送信する</button>
            </form>
          </div>
        </div>
      </main>



@endsection
