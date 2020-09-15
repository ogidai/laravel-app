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
        <div class="card -faq">
          <h1>FAQ</h1>
          <p class="question">どうやってレビューを投稿するのですか？</p>
          <p class="answer">レビューの投稿をするには会員登録をしていただく必要があります。こちらから会員登録し、メニューから「レビューを投稿する」を選択してください。</p>
          <p class="question">どうやってレビューを投稿するのですか？</p>
          <p class="answer">レビューの投稿をするには会員登録をしていただく必要があります。こちらから会員登録し、メニューから「レビューを投稿する」を選択してください。</p>
        </div>

      </main>


@endsection
