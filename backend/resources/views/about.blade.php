@extends('layouts.app')

@section('content')

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

    <div class="wrapper">



      <main class="main">
        <div class="card">
          <h2>ProHikaとは？</h2>
          <p>ProHikaとは、ただプロテインを比較するだけのサイトです。
            「プロテインを比較しているサイトなんて既にあるじゃん。今更なんなの？」と思った方も多いかと思います。
            確かに「プロテイン　おすすめ」などと検索したら多くの情報が手に入ります。
            しかし、その情報は本当に正しいのでしょうか？家族にオススメすることができるような商品でしょうか？
            きっと答えは「No！」ではないでしょうか？
          </p>
        </div>

      </main>


@endsection
