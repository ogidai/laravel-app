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
        <a href="{{route('home')}}" class="left arrow_back"></a>
      </div>

    </header>


    <div class="wrapper -hasform">



      <main class="main">
        <div class="inner">
          <form class="post_form form" action="show" method="post">
            @csrf
            <div class="card -form">
              <input type="hidden" name="id" class="-secondary" id="" value="{{Auth::user()->id}}">

              <div class="input_wrap -margin">
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
              <input type="text" name="pro_name" class="-secondary @error('email') is-invalid @enderror" required placeholder="プロヒカマッスルプロテイン" id="pro_name">
              @error('email')
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
                <label for="weight" class="label">内容量（ kg 換算）</label>
                <input type="text" name="weight" value="" class="-secondary @error('text') is-invalid @enderror" required placeholder="500g→0.5 / 1kg→1" id="weight">
                <p class="alert -top">＊単位はつけないでください！</p>
                @error('text')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="input_wrap">
                <label for="price" class="label">参考価格（大体の税抜き価格で結構です）</label>
                <input type="text" name="price" value=""class="-secondary @error('text') is-invalid @enderror" required placeholder="3000円→3000" id="price">
                <p class="alert -top">＊単位はつけないでください！</p>
                @error('text')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="input_wrap">
                <label for="per_protein" class="label">１食あたりのタンパク質含有量</label>
                <input type="text" name="per_protein" value="" class="-secondary @error('numeric') is-invalid @enderror" required placeholder="20g→20" id="per_protein">
                <p class="alert -top">＊単位はつけないでください！</p>
                @error('numeric')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="radio_wrap">
                <p>日本のメーカーですか？</p>
                <input type="radio" name="made" value="0" class="-secondary @error('text') is-invalid @enderror" required id="madejapan">
                <label for="madejapan" class="label">はい</label>
                <input type="radio" name="made" value="1" class="-secondary @error('text') is-invalid @enderror" required id="madeother">
                <label for="madeother" class="label">いいえ</label>
              </div>
              <div class="radio_wrap">
                <p>プロテインの種類を選択してください。</p>
                <input type="radio" name="type" value="1" class="-secondary" required id="whey">
                <label for="whey" class="label">ホエイ</label>
                <input type="radio" name="type" value="2" class="-secondary" required id="soy">
                <label for="soy" class="label">SOY</label>
                <input type="radio" name="type" value="3" class="-secondary" required id="casein">
                <label for="casein" class="label">カゼイン</label>
                <input type="radio" name="type" value="4" class="-secondary" required id="typeother">
                <label for="typeother" class="label">わからん</label>
              </div>
              <div class="radio_wrap -hasStar">
                <p>美味しさ（５段階評価）</p>
                <input type="radio" name="taste_good" value="1" class="-secondary" required id="">
                <input type="radio" name="taste_good" value="2" class="-secondary" required id="">
                <input type="radio" name="taste_good" value="3" class="-secondary" required id="">
                <input type="radio" name="taste_good" value="4" class="-secondary" required id="">
                <input type="radio" name="taste_good" value="5" class="-secondary" required id="">
              </div>
              <div class="radio_wrap -hasStar">
                <p>コスパ（５段階評価）</p>
                <input type="radio" name="cost_paf" value="1" class="-secondary" required id="">
                <input type="radio" name="cost_paf" value="2" class="-secondary" required id="">
                <input type="radio" name="cost_paf" value="3" class="-secondary" required id="">
                <input type="radio" name="cost_paf" value="4" class="-secondary" required id="">
                <input type="radio" name="cost_paf" value="5" class="-secondary" required id="">
              </div>
              <div class="radio_wrap -hasStar">
                <p>おすすめ度（５段階評価）</p>
                <input type="radio" name="recomend" value="1" class="-secondary" required id="">
                <input type="radio" name="recomend" value="2" class="-secondary" required id="">
                <input type="radio" name="recomend" value="3" class="-secondary" required id="">
                <input type="radio" name="recomend" value="4" class="-secondary" required id="">
                <input type="radio" name="recomend" value="5" class="-secondary" required id="">
              </div>
              <label for="how_to_buy" class="label">購入方法（URL不可）</label>
              <input type="text" name="how_to_buy" value="" class="-secondary @error('text') is-invalid @enderror" placeholder="〇〇のECサイト" id="how_to_buy">
              @error('text')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="how_to_drink" class="label">おすすめの飲み方</label>
              <input type="text" name="how_to_drink" value="" class="-secondary @error('text') is-invalid @enderror" placeholder="牛乳で飲むと美味しいです！" id="how_to_drink">
              @error('text')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="comment" class="label">コメント</label>
              <textarea type="text" name="comment" value="" class="textarea -secondary @error('text') is-invalid @enderror" placeholder="このプロテインはすっきりとしていて、プロテインの独特な味がほとんどしないのでとてもおすすめです！プロテインは毎日飲むものですから、美味しいのが一番ですよね。是非お試しください！" id="comment"></textarea>
              @error('text')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">投稿する</label>

          </form>
        </div>

      </main>

@endsection
