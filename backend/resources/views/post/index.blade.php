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
          <form class="post_form form" action="show" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card -form">
              <input type="hidden" name="user_id" class="-secondary" id="" value="{{Auth::user()->id}}">

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
              @error('image_01')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

              <label for="pro_name" class="label -margin">商品名</label>
              <input type="text" name="pro_name" class="-secondary @error('pro_name') is-invalid @enderror" required placeholder="プロヒカマッスルプロテイン" id="pro_name" value="{{ old('pro_name') }}">
              @error('pro_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="flavor" class="label">プロテインの味</label>
              <input type="text" name="flavor" class="-secondary @error('flavor') is-invalid @enderror" required placeholder="チョコレート" id="flavor" value="{{ old('flavor') }}">
              @error('flavor')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="input_wrap">
                <label for="weight" class="label">内容量（ kg 換算）</label>
                <input type="text" name="weight" class="-secondary @error('weight') is-invalid @enderror" required placeholder="500g→0.5 / 1kg→1" id="weight" value="{{ old('weight') }}">
                <p class="alert -top">＊半角数字のみ。単位は省略してください。</p>
              </div>
              <div class="input_wrap">
                <label for="price" class="label">参考価格（大体の税抜き価格で結構です）</label>
                <input type="text" name="price" class="-secondary @error('price') is-invalid @enderror" required placeholder="3000円→3000" id="price" value="{{ old('price') }}">
                <p class="alert -top">＊半角数字のみ。単位は省略してください。</p>
              </div>
              <div class="input_wrap">
                <label for="per_protein" class="label">１食あたりのタンパク質含有量</label>
                <input type="text" name="per_protein" class="-secondary @error('per_protein') is-invalid @enderror" required placeholder="20g→20" id="per_protein" value="{{ old('per_protein') }}">
                <p class="alert -top">＊半角数字のみ。単位は省略してください。</p>
              </div>
              <div class="radio_wrap">
                <p>日本のメーカーですか？</p>
                <input type="radio" name="made" value="0" class="-secondary @error('made') is-invalid @enderror" required id="madejapan" {{ old('made') == "0" ? 'checked' : '' }}>
                <label for="madejapan" class="label">はい</label>
                <input type="radio" name="made" class="-secondary @error('made') is-invalid @enderror" required id="madeother" {{ old('made') == "1" ? 'checked' : '' }}>
                <label for="madeother" class="label">いいえ</label>
              </div>
              @error('made')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="radio_wrap">
                <p>プロテインの種類を選択してください。</p>
                <input type="radio" name="type" value="0" class="-secondary @error('type') is-invalid @enderror" required id="whey" {{ old('type') == "0" ? 'checked' : '' }}>
                <label for="whey" class="label">ホエイ</label>
                <input type="radio" name="type" value="1" class="-secondary @error('type') is-invalid @enderror" required id="soy" {{ old('type') == "1" ? 'checked' : '' }}>
                <label for="soy" class="label">SOY</label>
                <input type="radio" name="type" value="2" class="-secondary @error('type') is-invalid @enderror" required id="casein" {{ old('type') == "2" ? 'checked' : '' }}>
                <label for="casein" class="label">カゼイン</label>
                <input type="radio" name="type" value="3" class="-secondary @error('type') is-invalid @enderror" required id="typeother" {{ old('type') == "3" ? 'checked' : '' }}>
                <label for="typeother" class="label">わからん</label>
              </div>
              @error('type')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="radio_wrap -hasStar">
                <p>美味しさ（５段階評価）</p>
                <input type="radio" name="taste_good" value="0" class="-secondary @error('taste_good') is-invalid @enderror" required id="" {{ old('taste_good') == "0" ? 'checked' : '' }}>
                <input type="radio" name="taste_good" value="1" class="-secondary @error('taste_good') is-invalid @enderror" required id="" {{ old('taste_good') == "1" ? 'checked' : '' }}>
                <input type="radio" name="taste_good" value="2" class="-secondary @error('taste_good') is-invalid @enderror" required id="" {{ old('taste_good') == "2" ? 'checked' : '' }}>
                <input type="radio" name="taste_good" value="3" class="-secondary @error('taste_good') is-invalid @enderror" required id="" {{ old('taste_good') == "3" ? 'checked' : '' }}>
                <input type="radio" name="taste_good" value="4" class="-secondary @error('taste_good') is-invalid @enderror" required id="" {{ old('taste_good') == "4" ? 'checked' : '' }}>
              </div>
              @error('taste_good')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="radio_wrap -hasStar">
                <p>コスパ（５段階評価）</p>
                <input type="radio" name="cost_paf" value="0" class="-secondary @error('cost_paf') is-invalid @enderror" required id="" {{ old('cost_paf') == "0" ? 'checked' : '' }}>
                <input type="radio" name="cost_paf" value="1" class="-secondary @error('cost_paf') is-invalid @enderror" required id="" {{ old('cost_paf') == "1" ? 'checked' : '' }}>
                <input type="radio" name="cost_paf" value="2" class="-secondary @error('cost_paf') is-invalid @enderror" required id="" {{ old('cost_paf') == "2" ? 'checked' : '' }}>
                <input type="radio" name="cost_paf" value="3" class="-secondary @error('cost_paf') is-invalid @enderror" required id="" {{ old('cost_paf') == "3" ? 'checked' : '' }}>
                <input type="radio" name="cost_paf" value="4" class="-secondary @error('cost_paf') is-invalid @enderror" required id="" {{ old('cost_paf') == "4" ? 'checked' : '' }}>
              </div>
              @error('cost_paf')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="radio_wrap -hasStar">
                <p>おすすめ度（５段階評価）</p>
                <input type="radio" name="recomend" value="0" class="-secondary @error('recomend') is-invalid @enderror" required id="" {{ old('recomend') == "0" ? 'checked' : '' }}>
                <input type="radio" name="recomend" value="1" class="-secondary @error('recomend') is-invalid @enderror" required id="" {{ old('recomend') == "1" ? 'checked' : '' }}>
                <input type="radio" name="recomend" value="2" class="-secondary @error('recomend') is-invalid @enderror" required id="" {{ old('recomend') == "2" ? 'checked' : '' }}>
                <input type="radio" name="recomend" value="3" class="-secondary @error('recomend') is-invalid @enderror" required id="" {{ old('recomend') == "3" ? 'checked' : '' }}>
                <input type="radio" name="recomend" value="4" class="-secondary @error('recomend') is-invalid @enderror" required id="" {{ old('recomend') == "4" ? 'checked' : '' }}>
              </div>
              <label for="how_to_buy" class="label">購入方法（任意）</label>
              <input type="text" name="how_to_buy" value="{{ old('how_to_buy') }}" class="-secondary @error('how_to_buy') is-invalid @enderror" placeholder="〇〇のECサイト" id="how_to_buy">
              <p class="alert -top">＊URL不可</p>
              @error('how_to_buy')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="how_to_drink" class="label">おすすめの飲み方（任意）</label>
              <input type="text" name="how_to_drink" value="{{ old('how_to_drink') }}" class="-secondary @error('how_to_drink') is-invalid @enderror" placeholder="牛乳で飲むと美味しいです！" id="how_to_drink">
              @error('how_to_drink')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="comment" class="label">コメント（任意）</label>
              <textarea type="text" name="comment" value="{{ old('comment') }}" class="textarea -secondary @error('comment') is-invalid @enderror" placeholder="このプロテインはすっきりとしていて、プロテインの独特な味がほとんどしないのでとてもおすすめです！プロテインは毎日飲むものですから、美味しいのが一番ですよね。是非お試しください！" id="comment">{{ old('comment')}}</textarea>
              <p class="alert -top">＊URL不可</p>

            </div>
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">確認画面へ</label>

          </form>
        </div>

      </main>

@endsection
