@extends('layouts.app')

@section('content')

<div class="container">
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
        </div>
        <a href="{{('/')}}" class="left arrow_back"></a>
      </div>
    </header>

    <div class="wrapper">



      <main class="main">
        <div class="card">
          <h1>お問い合わせ</h1>
          <p>ProHikaをご利用いただき、誠にありがとうございます。
            <br>ご質問やご不明な点がある場合、まずは<a href="#">よくある質問</a>を参照してみてください。
            <br>
            <br>それでも解決できない場合、お手数をおかけしますが、
            <a href="mailto:prohika&#64;gmail.com">prohika2020&#64;gmail.com</a>
            にお問い合わせください。
            <br>
            <br>お問い合わせ内容や、時期によって異なりますが、お問い合わせから10日前後で返信します。
            <br>今後ともProHikaをよろしくお願いします。
          </p>
        </div>

      </main>


@endsection
