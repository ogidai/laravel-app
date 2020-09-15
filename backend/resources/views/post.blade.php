@extends('layouts.app')

@section('content')

<div class="container">

    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{route('home')}}">
            <img src="images/logo.png" alt="">
          </a>
        </div>
        <a href="{{route('home')}}" class="left arrow_back"></a>
      </div>

    </header>


    <div class="wrapper -secondary">



      <main class="main">
        <div class="inner">
          <form class="post_form form" action="" method="post">
            @csrf
            <label for="pro_maker" class="label -margin">プロテインのメーカー</label>
            <input type="text" name="pro-maker" class="-secondary @error('text') is-invalid @enderror" required placeholder="〇〇スポーツ" id="pro_maker">
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="pro_flavor" class="label">プロテインの味</label>
            <input type="text" name="pro-flavor" value=""class="-secondary @error('text') is-invalid @enderror" required placeholder="チョコレート" id="pro_flavor">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">投稿する</label>

          </form>
        </div>

      </main>

@endsection
