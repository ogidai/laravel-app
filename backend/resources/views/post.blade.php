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
          <form class="post_form form" action="#" method="post">
            @csrf
            <input type="hidden" name="id" class="-secondary" id="" disabled>

            <div class="input_wrap">
              <label for="addImages01" class="label">画像を追加（最低１枚、最大３枚）</label>
              <div class="add_images_wrap">
                <div class="add_image_input">
                  <input type="file" name="image_01" class="-secondary" required id="addImages01" accept="image/*">
                  <figure>
                    <img src="" alt="" id="showImages01">
                  </figure>
                  <p class="number">1</p>
                </div>
                <div class="add_image_input">
                  <input type="file" name="image_02" class="-secondary" id="addImages02" accept="image/*">
                  <figure>
                    <img src="" alt="" id="showImages02">
                  </figure>
                  <p class="number">2</p>
                  <div class="delete -sm -hidden" id="delete01"></div>
                </div>
                <div class="add_image_input">
                  <input type="file" name="image_03" class="-secondary" id="addImages03" accept="image/*">
                  <figure>
                    <img src="" alt="" id="showImages03">
                  </figure>
                  <p class="number">3</p>
                  <div class="delete -sm -hidden" id="delete02"></div>
                </div>

              </div>
            </div>
            <label for="pro_name" class="label -margin">商品名</label>
            <input type="text" name="pro_name" class="-secondary @error('text') is-invalid @enderror" required placeholder="プロヒカマッスルプロテイン" id="pro_name">
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="flavor" class="label">プロテインの味</label>
            <input type="text" name="flavor" value=""class="-secondary @error('text') is-invalid @enderror" required placeholder="チョコレート" id="flavor">
            @error('text')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input_wrap">
              <label for="flavor" class="label">内容量（ kgで入力してください）</label>
              <input type="text" name="" value=""class="-secondary @error('text') is-invalid @enderror" required placeholder="500g→0.5 / 1kg→1" id="flavor">
              <p class="unit">kg</p>
              @error('text')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="input_wrap">
              <label for="price" class="label">参考価格（大体の税抜き価格で結構です）</label>
              <input type="text" name="price" value=""class="-secondary @error('text') is-invalid @enderror" required placeholder="3000" id="price">
              <p class="unit price">円</p>
              @error('text')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <label for="per_kg" class="label">１kgあたりの価格（自動計算）</label>
            <input type="text" name="per_kg" value="1000 円 / kg"class="-secondary @error('text') is-invalid @enderror" disabled id="per_kg">
            <div class="input_wrap">
              <label for="per_protein" class="label">１食あたりのタンパク質含有量</label>
              <input type="text" name="per_protein" value="" class="-secondary @error('text') is-invalid @enderror" required placeholder="20g" id="per_protein">
              <p class="unit price">円</p>
              @error('text')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="radio_wrap">
              <p>日本のメーカーですか？</p>
              <input type="radio" name="made" value="" class="-secondary @error('text') is-invalid @enderror" required id="madejapan">
              <label for="madejapan" class="label">はい</label>
              <input type="radio" name="made" value="" class="-secondary @error('text') is-invalid @enderror" required id="madeother">
              <label for="madeother" class="label">いいえ</label>
            </div>
            <div class="radio_wrap">
              <p>プロテインの種類を選択してください。</p>
              <input type="radio" name="type" value="" class="-secondary @error('text') is-invalid @enderror" required id="whey">
              <label for="whey" class="label">ホエイ</label>
              <input type="radio" name="type" value="" class="-secondary @error('text') is-invalid @enderror" required id="soy">
              <label for="soy" class="label">SOY</label>
              <input type="radio" name="type" value="" class="-secondary @error('text') is-invalid @enderror" required id="casein">
              <label for="casein" class="label">カゼイン</label>
              <input type="radio" name="type" value="" class="-secondary @error('text') is-invalid @enderror" required id="typeother">
              <label for="typeother" class="label">その他</label>
            </div>
            <div class="radio_wrap">
              <p>どのようなタイプの味ですか？</p>
              <input type="radio" name="taste" value="" class="-secondary @error('text') is-invalid @enderror" required id="sweet">
              <label for="sweet" class="label">甘い系</label>
              <input type="radio" name="taste" value="" class="-secondary @error('text') is-invalid @enderror" required id="light">
              <label for="light" class="label">さっぱり系</label>
              <input type="radio" name="taste" value="" class="-secondary @error('text') is-invalid @enderror" required id="tasteother">
              <label for="tasteother" class="label">わからん</label>
            </div>
            <label for="pro_maker" class="label">プロテインのメーカー</label>
            <input type="text" name="pro-maker" class="-secondary @error('text') is-invalid @enderror" required placeholder="〇〇スポーツ" id="pro_maker">
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="pro_flavor" class="label">プロテインの味</label>
            <input type="text" name="pro-flavor" value=""class="-secondary @error('text') is-invalid @enderror" required placeholder="チョコレート" id="pro_flavor">
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="pro_flavor" class="label">プロテインの味</label>
            <input type="text" name="pro-flavor" value=""class="-secondary @error('text') is-invalid @enderror" required placeholder="チョコレート" id="pro_flavor">
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="pro_maker" class="label">プロテインのメーカー</label>
            <input type="text" name="pro-maker" class="-secondary @error('text') is-invalid @enderror" required placeholder="〇〇スポーツ" id="pro_maker">
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="pro_flavor" class="label">プロテインの味</label>
            <input type="text" name="pro-flavor" value=""class="-secondary @error('text') is-invalid @enderror" required placeholder="チョコレート" id="pro_flavor">
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="pro_maker" class="label">プロテインのメーカー</label>
            <input type="text" name="pro-maker" class="-secondary @error('text') is-invalid @enderror" required placeholder="〇〇スポーツ" id="pro_maker">
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="pro_flavor" class="label">プロテインの味</label>
            <input type="text" name="pro-flavor" value=""class="-secondary @error('text') is-invalid @enderror" required placeholder="チョコレート" id="pro_flavor">
            @error('text')
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
