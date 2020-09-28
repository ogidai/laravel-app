@extends('layouts.app')

@section('content')

<div class="container">
<div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{route('home')}}">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>
        </div>
        <a href="{{route('your_post')}}" class="left arrow_back"></a>
        @guest
        <div class="right btnWrap">
          <a href="{{ route('login') }}" class="btn">ログイン</a>
        </div>
        @else
        <div class="right btnWrap">
          <span class="btn js-showLogoutModal">ログアウト</span>
        </div>
        @endguest
      </div>

    </header>


    <div class="wrapper -top">

      @extends('layouts.gnav')

      @section('gnav')

      <main class="main">
        <div class="inner">
          <form class="post_form form" action="{{ route('post.update', $items->id )}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card -form">
              <p class="alert -top">＊は必須です</p>
              <input type="hidden" name="id" class="-secondary" id="" value="{{ $items->id }}">
              <input type="hidden" name="user_id" class="-secondary" id="" value="{{ Auth::user()->id }}">

              <div class="input_wrap -margin">
                <label for="addImages01" class="label"><span class="alert">＊</span>画像を追加（最低１枚、最大３枚）</label>
                <div class="add_images_wrap">
                  <div class="add_image_input">
                    <input type="file" name="image_01" class="-secondary" id="addImages01" accept="image/*">
                    <figure>
                      <img src="../../{{ $items->read_temp_path_01 }}" alt="" id="showImages01">
                    </figure>
                    <p class="number">1</p>
                  </div>
                  <div class="add_image_input">
                    <input type="file" name="image_02" class="-secondary" id="addImages02" accept="image/*">
                    <figure>
                      <img src="../../{{ $items->read_temp_path_02 }}" alt="" id="showImages02">
                    </figure>
                    <p class="number">2</p>
                    <div class="delete -sm" id="delete01"></div>
                  </div>
                  <div class="add_image_input">
                    <input type="file" name="image_03" class="-secondary" id="addImages03" accept="image/*">
                    <figure>
                      <img src="../../{{ $items->read_temp_path_03 }}" alt="" id="showImages03">
                    </figure>
                    <p class="number">3</p>
                    <div class="delete -sm" id="delete02"></div>
                  </div>
                </div>
              </div>
              @error('image_01')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

              <label for="pro_name" class="label -margin"><span class="alert">＊</span>商品名</label>
              <input type="text" name="pro_name" class="-secondary @error('pro_name') is-invalid @enderror" required placeholder="プロヒカマッスルプロテイン" id="pro_name" value="{{ $items->pro_name }}">
              @error('pro_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="flavor" class="label"><span class="alert">＊</span>プロテインの味</label>
              <input type="text" name="flavor" class="-secondary @error('flavor') is-invalid @enderror" required placeholder="チョコレート" id="flavor" value="{{ $items->flavor }}">
              @error('flavor')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="radio_wrap -hasStar star_icon_{{ $items->taste_good + 1 }}">
                <p><span class="alert">＊</span>美味しさ（５段階評価）</p>
                <input type="radio" name="taste_good" value="0" class="-secondary @error('taste_good') is-invalid @enderror" required id="taste_check_01" {{ $items->taste_good == "0" ? 'checked' : '' }}>
                <input type="radio" name="taste_good" value="1" class="-secondary @error('taste_good') is-invalid @enderror" required id="taste_check_02" {{ $items->taste_good == "1" ? 'checked' : '' }}>
                <input type="radio" name="taste_good" value="2" class="-secondary @error('taste_good') is-invalid @enderror" required id="taste_check_03" {{ $items->taste_good == "2" ? 'checked' : '' }}>
                <input type="radio" name="taste_good" value="3" class="-secondary @error('taste_good') is-invalid @enderror" required id="taste_check_04" {{ $items->taste_good == "3" ? 'checked' : '' }}>
                <input type="radio" name="taste_good" value="4" class="-secondary @error('taste_good') is-invalid @enderror" required id="taste_check_05" {{ $items->taste_good == "4" ? 'checked' : '' }}>
                <div class="star_icons -lg">
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st1 st tst01" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                        C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                        c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                        c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                        c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                        C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                      </g>
                    </svg>
                  </i>
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st2 st tst02" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                        C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                        c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                        c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                        c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                        C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                      </g>
                    </svg>
                  </i>
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st3 st tst03" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                        C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                        c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                        c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                        c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                        C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                      </g>
                    </svg>
                  </i>
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                    <g>
                      <path class="st st4 tst04" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                    <g>
                      <path class="st5 st tst05" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
              </div>
              </div>
              @error('taste_good')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="radio_wrap -hasStar star_icon_{{ $items->cost_paf + 1 }}">
                <p><span class="alert">＊</span>コスパ（５段階評価）</p>
                <input type="radio" name="cost_paf" value="0" class="-secondary @error('cost_paf') is-invalid @enderror" required id="cost_check_01" {{ $items->cost_paf == "0" ? 'checked' : '' }}>
                <input type="radio" name="cost_paf" value="1" class="-secondary @error('cost_paf') is-invalid @enderror" required id="cost_check_02" {{ $items->cost_paf == "1" ? 'checked' : '' }}>
                <input type="radio" name="cost_paf" value="2" class="-secondary @error('cost_paf') is-invalid @enderror" required id="cost_check_03" {{ $items->cost_paf == "2" ? 'checked' : '' }}>
                <input type="radio" name="cost_paf" value="3" class="-secondary @error('cost_paf') is-invalid @enderror" required id="cost_check_04" {{ $items->cost_paf == "3" ? 'checked' : '' }}>
                <input type="radio" name="cost_paf" value="4" class="-secondary @error('cost_paf') is-invalid @enderror" required id="cost_check_05" {{ $items->cost_paf == "4" ? 'checked' : '' }}>
                <div class="star_icons -lg">
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st1 st cst01" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                        C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                        c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                        c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                        c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                        C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                      </g>
                    </svg>
                  </i>
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st2 st cst02" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                        C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                        c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                        c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                        c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                        C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                      </g>
                    </svg>
                  </i>
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st3 st cst03" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                        C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                        c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                        c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                        c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                        C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                      </g>
                    </svg>
                  </i>
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                    <g>
                      <path class="st st4 cst04" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                    <g>
                      <path class="st5 st cst05" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
              </div>
              </div>
              @error('cost_paf')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="radio_wrap -hasStar star_icon_{{ $items->recomend + 1 }}">
                <p><span class="alert">＊</span>おすすめ度（５段階評価）</p>
                <input type="radio" name="recomend" value="0" class="-secondary @error('recomend') is-invalid @enderror" required id="recomend_check_01" {{ $items->recomend == "0" ? 'checked' : '' }}>
                <input type="radio" name="recomend" value="1" class="-secondary @error('recomend') is-invalid @enderror" required id="recomend_check_02" {{ $items->recomend == "1" ? 'checked' : '' }}>
                <input type="radio" name="recomend" value="2" class="-secondary @error('recomend') is-invalid @enderror" required id="recomend_check_03" {{ $items->recomend == "2" ? 'checked' : '' }}>
                <input type="radio" name="recomend" value="3" class="-secondary @error('recomend') is-invalid @enderror" required id="recomend_check_04" {{ $items->recomend == "3" ? 'checked' : '' }}>
                <input type="radio" name="recomend" value="4" class="-secondary @error('recomend') is-invalid @enderror" required id="recomend_check_05" {{ $items->recomend == "4" ? 'checked' : '' }}>
                <div class="star_icons -lg">
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st1 st rst01" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                        C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                        c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                        c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                        c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                        C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                      </g>
                    </svg>
                  </i>
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st2 st rst02" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                        C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                        c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                        c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                        c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                        C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                      </g>
                    </svg>
                  </i>
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st3 st rst03" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                        C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                        c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                        c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                        c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                        C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                      </g>
                    </svg>
                  </i>
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                    <g>
                      <path class="st st4 rst04" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                    <g>
                      <path class="st5 st rst05" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
              </div>
              </div>
              <div class="input_wrap">
                <label for="weight" class="label">内容量（ kg 換算）</label>
                <input type="text" name="weight" class="-secondary @error('weight') is-invalid @enderror" placeholder="500g→0.5 / 1kg→1" id="weight" value="{{ $items->weight }}">
                <p class="alert -top">＊半角数字のみ。単位は省略してください。</p>
              </div>
              <div class="input_wrap">
                <label for="price" class="label">参考価格（大体の税抜き価格で結構です）</label>
                <input type="text" name="price" class="-secondary @error('price') is-invalid @enderror" placeholder="3000円→3000" id="price" value="{{ $items->price }}">
                <p class="alert -top">＊半角数字のみ。単位は省略してください。</p>
              </div>
              <div class="input_wrap">
                <label for="per_protein" class="label">１食あたりのタンパク質含有量</label>
                <input type="text" name="per_protein" class="-secondary @error('per_protein') is-invalid @enderror" placeholder="20g→20" id="per_protein" value="{{ $items->per_protein }}">
                <p class="alert -top">＊半角数字のみ。単位は省略してください。</p>
              </div>
              <div class="radio_wrap">
                <p>日本のメーカーですか？</p>
                <input type="radio" name="made" value="0" class="-secondary @error('made') is-invalid @enderror" id="madejapan" {{ $items->made == "0" ? 'checked' : '' }}>
                <label for="madejapan" class="label">はい</label>
                <input type="radio" name="made" value="1" class="-secondary @error('made') is-invalid @enderror" id="madeother" {{ $items->made == "1" ? 'checked' : '' }}>
                <label for="madeother" class="label">いいえ</label>
                <!-- <input type="hidden" name="made" value="2" class="-secondary @error('made') is-invalid @enderror"  {{ $items->made == "2" ? 'checked' : '' }}> -->
              </div>
              @error('made')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="radio_wrap">
                <p>プロテインの種類を選択してください。</p>
                <input type="radio" name="type" value="0" class="-secondary @error('type') is-invalid @enderror" id="whey" {{ $items->type == "0" ? 'checked' : '' }}>
                <label for="whey" class="label">ホエイ</label>
                <input type="radio" name="type" value="1" class="-secondary @error('type') is-invalid @enderror" id="soy" {{ $items->type == "1" ? 'checked' : '' }}>
                <label for="soy" class="label">SOY</label>
                <input type="radio" name="type" value="2" class="-secondary @error('type') is-invalid @enderror" id="casein" {{ $items->type == "2" ? 'checked' : '' }}>
                <label for="casein" class="label">カゼイン</label>
                <input type="radio" name="type" value="3" class="-secondary @error('type') is-invalid @enderror" id="typeother" {{ $items->type == "3" ? 'checked' : '' }}>
                <label for="typeother" class="label">わからん</label>
                <!-- <input type="hidden" name="type" value="4" class="-secondary @error('type') is-invalid @enderror" {{ $items->type == "4" ? 'checked' : '' }}> -->
              </div>
              @error('type')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="how_to_buy" class="label">購入方法（任意）</label>
              <input type="text" name="how_to_buy" value="{{ $items->how_to_buy }}" class="-secondary @error('how_to_buy') is-invalid @enderror" placeholder="〇〇のECサイト" id="how_to_buy">
              <p class="alert -top">＊URL不可</p>
              @error('how_to_buy')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="how_to_drink" class="label">おすすめの飲み方（任意）</label>
              <input type="text" name="how_to_drink" value="{{ $items->how_to_drink }}" class="-secondary @error('how_to_drink') is-invalid @enderror" placeholder="牛乳で飲むと美味しいです！" id="how_to_drink">
              <p class="alert -top">＊URL不可</p>
              @error('how_to_drink')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label for="comment" class="label">コメント（任意）</label>
              <textarea type="text" name="comment" class="textarea -secondary @error('comment') is-invalid @enderror" placeholder="このプロテインはすっきりとしていて、プロテインの独特な味がほとんどしないのでとてもおすすめです！プロテインは毎日飲むものですから、美味しいのが一番ですよね。是非お試しください！" id="comment">{{ $items->comment }}</textarea>
              <p class="alert -top">＊URL不可</p>

            </div>
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">上記の内容で再投稿</label>

          </form>
        </div>

      </main>

@endsection
