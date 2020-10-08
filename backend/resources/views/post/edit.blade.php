@extends('layouts.app')

@section('content')

<div class="container scrollTop">
<div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{route('home')}}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
          </a>
        </div>
        <a href="javascript:history.back()" class="left arrow_back -pc"></a>
        <div class="navBtn js-navBtnActive">
          <span></span><span></span><span></span>
        </div>
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

      <nav id="gnav">
          <div class="navBtn -back js-navBtnBack">
              <span></span><span></span><span></span>
          </div>
          <ul class="gnav_list">
              @auth
              <li class="gnav_item">
                  <p class="greeting">こんにちは！<span>{{Auth::user()->name}}</span>さん</p>
                  <p class="auth_email">{{Auth::user()->email}}</p>
              </li>
              <li class="gnav_item">
                <a href="{{ route('post') }}" class="arrow -next">レビューを投稿する</a>
              </li>
              <li class="gnav_item">
                <a href="{{ route('your_post') }}" class="arrow -next">あなたの投稿</a>
              </li>
              <li class="gnav_item -margin">
                <a href="{{ route('user') }}" class="arrow -next">ユーザー情報</a>
              </li>
              @endauth
              <li class="gnav_item">
                <a href="{{ ('/') }}" class="arrow -next">トップページへ</a>
              </li>
              <li class="gnav_item">
                <a href="{{ route('faq') }}" class="arrow -next">よくある質問</a>
              </li>
              <li class="gnav_item">
                  <a href="{{ route('contact') }}" class="arrow -next">お問い合わせ</a>
              </li>
              <li class="gnav_item">
                  <a href="{{ route('policy') }}" class="arrow -next">利用規約・プライバシーポリシー</a>
              </li>
              <li class="gnav_item -sns">
                  <a href="https://twitter.com/procomi2020"><img src="{{ asset('images/t_logo.svg') }}" alt="Twitter"></a>
              </li>
          </ul>
          <footer class="footer -pc">
              <div class="copyright">
                <small>© 2020 プロコミ！</small>
              </div>
            </footer>
      </nav>

      <!-- @extends('layouts.gnav')

      @section('gnav') -->

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
                      <img src="{{ $path_01 }}" alt="" id="showImages01">
                    </figure>
                    <p class="number">1</p>
                  </div>
                  <div class="add_image_input">
                    <input type="file" name="image_02" class="-secondary" id="addImages02" accept="image/*">
                    <figure>
                      @if( is_null($path_02) == false )
                      <img src="{{ $path_02 }}" alt="" id="showImages02">
                      @else
                      <img src="" alt="" id="showImages02">
                      @endif
                    </figure>
                    <p class="number">2</p>
                    <div class="delete -sm" id="delete01"></div>
                  </div>
                  <div class="add_image_input">
                    <input type="file" name="image_03" class="-secondary" id="addImages03" accept="image/*">
                    <figure>
                      @if( is_null($path_02) == false )
                      <img src="{{ $path_03 }}" alt="" id="showImages03">
                      @else
                      <img src="" alt="" id="showImages03">
                      @endif
                    </figure>
                    <p class="number">3</p>
                    <div class="delete -sm" id="delete02"></div>
                  </div>
                </div>
              </div>
              @error('image_01')
                <p class="alert -margin_bottom">{{ $message }}</p>
              @enderror

              <label for="pro_name" class="label -margin"><span class="alert">＊</span>商品名</label>
              <input type="text" name="pro_name" class="-secondary @error('pro_name') is-invalid @enderror" placeholder="プロコミマッスルプロテイン" id="pro_name" value="@if( is_null(old('pro_name')) == false){{ old('pro_name') }}@else{{ $items->pro_name }}@endif">
              @error('pro_name')
                <p class="alert -top">{{ $message }}</p>
              @enderror
              <label for="flavor" class="label"><span class="alert">＊</span>プロテインの味</label>
              <input type="text" name="flavor" class="-secondary @error('flavor') is-invalid @enderror" placeholder="チョコレート味" id="flavor" value="@if( is_null(old('flavor')) == false ){{ old('flavor') }}@else{{ $items->flavor }}@endif">
              @error('flavor')
                <p class="alert -top">{{ $message }}</p>
              @enderror
              <div class="radio_wrap -hasStar @if( is_null(old('taste_good')) == false )star_icon_{{ old('taste_good') }}@else star_icon_{{ $items->taste_good }}@endif">
                <p><span class="alert">＊</span>美味しさ（５段階評価）</p>
                <input type="radio" name="taste_good" value="1" class="-secondary @error('taste_good') is-invalid @enderror" id="taste_check_01" @if( is_null(old('taste_good')) == false ){{ old('taste_good') == "1" ? 'checked' : '' }}@else{{ $items->taste_good == "1" ? 'checked' : '' }}@endif>
                <input type="radio" name="taste_good" value="2" class="-secondary @error('taste_good') is-invalid @enderror" id="taste_check_02" @if( is_null(old('taste_good')) == false ){{ old('taste_good') == "2" ? 'checked' : '' }}@else{{ $items->taste_good == "2" ? 'checked' : '' }}@endif>
                <input type="radio" name="taste_good" value="3" class="-secondary @error('taste_good') is-invalid @enderror" id="taste_check_03" @if( is_null(old('taste_good')) == false ){{ old('taste_good') == "3" ? 'checked' : '' }}@else{{ $items->taste_good == "3" ? 'checked' : '' }}@endif>
                <input type="radio" name="taste_good" value="4" class="-secondary @error('taste_good') is-invalid @enderror" id="taste_check_04" @if( is_null(old('taste_good')) == false ){{ old('taste_good') == "4" ? 'checked' : '' }}@else{{ $items->taste_good == "4" ? 'checked' : '' }}@endif>
                <input type="radio" name="taste_good" value="5" class="-secondary @error('taste_good') is-invalid @enderror" id="taste_check_05" @if( is_null(old('taste_good')) == false ){{ old('taste_good') == "5" ? 'checked' : '' }}@else{{ $items->taste_good == "5" ? 'checked' : '' }}@endif>
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
                <p class="alert -top">{{ $message }}</p>
              @enderror
              <div class="radio_wrap -hasStar @if( is_null(old('melt')) == false )star_icon_{{ old('melt') }}@else star_icon_{{ $items->melt }}@endif">
                <p><span class="alert">＊</span>溶けやすさ（５段階評価）</p>
                <input type="radio" name="melt" value="1" class="-secondary @error('melt') is-invalid @enderror" id="melt_check_01" @if( is_null(old('melt')) == false ){{ old('melt') == "1" ? 'checked' : '' }}@else{{ $items->melt == "1" ? 'checked' : '' }}@endif>
                <input type="radio" name="melt" value="2" class="-secondary @error('melt') is-invalid @enderror" id="melt_check_02" @if( is_null(old('melt')) == false ){{ old('melt') == "2" ? 'checked' : '' }}@else{{ $items->melt == "2" ? 'checked' : '' }}@endif>
                <input type="radio" name="melt" value="3" class="-secondary @error('melt') is-invalid @enderror" id="melt_check_03" @if( is_null(old('melt')) == false ){{ old('melt') == "3" ? 'checked' : '' }}@else{{ $items->melt == "3" ? 'checked' : '' }}@endif>
                <input type="radio" name="melt" value="4" class="-secondary @error('melt') is-invalid @enderror" id="melt_check_04" @if( is_null(old('melt')) == false ){{ old('melt') == "4" ? 'checked' : '' }}@else{{ $items->melt == "4" ? 'checked' : '' }}@endif>
                <input type="radio" name="melt" value="5" class="-secondary @error('melt') is-invalid @enderror" id="melt_check_05" @if( is_null(old('melt')) == false ){{ old('melt') == "5" ? 'checked' : '' }}@else{{ $items->melt == "5" ? 'checked' : '' }}@endif>
                <div class="star_icons -lg">
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st1 st mst01" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
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
                        <path class="st2 st mst02" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
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
                        <path class="st3 st mst03" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
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
                      <path class="st st4 mst04" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
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
                      <path class="st5 st mst05" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
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
              @error('melt')
                <p class="alert -top">{{ $message }}</p>
              @enderror
              <div class="radio_wrap -hasStar @if( is_null(old('foam')) == false )star_icon_{{ old('foam') }}@else star_icon_{{ $items->foam }}@endif">
                <p><span class="alert">＊</span>泡立ちの少なさ（５段階評価）</p>
                <input type="radio" name="foam" value="1" class="-secondary @error('foam') is-invalid @enderror" id="foam_check_01" @if( is_null(old('foam')) == false ){{ old('foam') == "1" ? 'checked' : '' }}@else{{ $items->foam == "1" ? 'checked' : '' }}@endif>
                <input type="radio" name="foam" value="2" class="-secondary @error('foam') is-invalid @enderror" id="foam_check_02" @if( is_null(old('foam')) == false ){{ old('foam') == "2" ? 'checked' : '' }}@else{{ $items->foam == "2" ? 'checked' : '' }}@endif>
                <input type="radio" name="foam" value="3" class="-secondary @error('foam') is-invalid @enderror" id="foam_check_03" @if( is_null(old('foam')) == false ){{ old('foam') == "3" ? 'checked' : '' }}@else{{ $items->foam == "3" ? 'checked' : '' }}@endif>
                <input type="radio" name="foam" value="4" class="-secondary @error('foam') is-invalid @enderror" id="foam_check_04" @if( is_null(old('foam')) == false ){{ old('foam') == "4" ? 'checked' : '' }}@else{{ $items->foam == "4" ? 'checked' : '' }}@endif>
                <input type="radio" name="foam" value="5" class="-secondary @error('foam') is-invalid @enderror" id="foam_check_05" @if( is_null(old('foam')) == false ){{ old('foam') == "5" ? 'checked' : '' }}@else{{ $items->foam == "5" ? 'checked' : '' }}@endif>
                <div class="star_icons -lg">
                  <i class="star_icon">
                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                      <g>
                        <path class="st1 st fst01" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
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
                        <path class="st2 st fst02" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
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
                        <path class="st3 st fst03" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
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
                      <path class="st st4 fst04" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
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
                      <path class="st5 st fst05" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
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
              @error('foam')
                <p class="alert -top">{{ $message }}</p>
              @enderror
              <div class="radio_wrap -hasStar @if( is_null(old('cost_paf')) == false )star_icon_{{ old('cost_paf') }}@else star_icon_{{ $items->cost_paf }}@endif">
                <p><span class="alert">＊</span>コスパ（５段階評価）</p>
                <input type="radio" name="cost_paf" value="1" class="-secondary @error('cost_paf') is-invalid @enderror" id="cost_check_01" @if( is_null(old('cost_paf')) == false ){{ old('cost_paf') == "1" ? 'checked' : '' }}@else{{ $items->cost_paf == "1" ? 'checked' : '' }}@endif>
                <input type="radio" name="cost_paf" value="2" class="-secondary @error('cost_paf') is-invalid @enderror" id="cost_check_02" @if( is_null(old('cost_paf')) == false ){{ old('cost_paf') == "2" ? 'checked' : '' }}@else{{ $items->cost_paf == "2" ? 'checked' : '' }}@endif>
                <input type="radio" name="cost_paf" value="3" class="-secondary @error('cost_paf') is-invalid @enderror" id="cost_check_03" @if( is_null(old('cost_paf')) == false ){{ old('cost_paf') == "3" ? 'checked' : '' }}@else{{ $items->cost_paf == "3" ? 'checked' : '' }}@endif>
                <input type="radio" name="cost_paf" value="4" class="-secondary @error('cost_paf') is-invalid @enderror" id="cost_check_04" @if( is_null(old('cost_paf')) == false ){{ old('cost_paf') == "4" ? 'checked' : '' }}@else{{ $items->cost_paf == "4" ? 'checked' : '' }}@endif>
                <input type="radio" name="cost_paf" value="5" class="-secondary @error('cost_paf') is-invalid @enderror" id="cost_check_05" @if( is_null(old('cost_paf')) == false ){{ old('cost_paf') == "5" ? 'checked' : '' }}@else{{ $items->cost_paf == "5" ? 'checked' : '' }}@endif>
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
                <p class="alert -top">{{ $message }}</p>
              @enderror
              <div class="radio_wrap -hasStar @if( is_null(old('recomend')) == false )star_icon_{{ old('recomend') }}@else star_icon_{{ $items->recomend }}@endif">
                <p><span class="alert">＊</span>おすすめ度（５段階評価）</p>
                <input type="radio" name="recomend" value="1" class="-secondary @error('recomend') is-invalid @enderror" id="recomend_check_01" @if( is_null(old('recomend')) == false ){{ old('recomend') == "1" ? 'checked' : '' }}@else{{ $items->recomend == "1" ? 'checked' : '' }}@endif>
                <input type="radio" name="recomend" value="2" class="-secondary @error('recomend') is-invalid @enderror" id="recomend_check_02" @if( is_null(old('recomend')) == false ){{ old('recomend') == "2" ? 'checked' : '' }}@else{{ $items->recomend == "2" ? 'checked' : '' }}@endif>
                <input type="radio" name="recomend" value="3" class="-secondary @error('recomend') is-invalid @enderror" id="recomend_check_03" @if( is_null(old('recomend')) == false ){{ old('recomend') == "3" ? 'checked' : '' }}@else{{ $items->recomend == "3" ? 'checked' : '' }}@endif>
                <input type="radio" name="recomend" value="4" class="-secondary @error('recomend') is-invalid @enderror" id="recomend_check_04" @if( is_null(old('recomend')) == false ){{ old('recomend') == "4" ? 'checked' : '' }}@else{{ $items->recomend == "4" ? 'checked' : '' }}@endif>
                <input type="radio" name="recomend" value="5" class="-secondary @error('recomend') is-invalid @enderror" id="recomend_check_05" @if( is_null(old('recomend')) == false ){{ old('recomend') == "5" ? 'checked' : '' }}@else{{ $items->recomend == "5" ? 'checked' : '' }}@endif>
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
              @error('recomend')
                <p class="alert -top">{{ $message }}</p>
              @enderror

              <span class="border_line">必須項目はここまで</span>

              <div class="input_wrap">
                <label for="weight" class="label">内容量（ kg 換算）</label>
                <input type="text" name="weight" class="-secondary @error('weight') is-invalid @enderror" placeholder="500g→0.5 / 1kg→1" id="weight" value="@if( is_null(old('weight')) == false){{ old('weight') }}@else{{ $items->weight }}@endif">
                <p class="alert -top">＊半角数字のみ。単位は省略してください。</p>
                @error('weight')
                  <p class="alert -margin_bottom">入力方法が間違っています。</p>
                @enderror
              </div>
              <div class="input_wrap">
                <label for="price" class="label">参考価格（大体の税抜き価格で結構です）</label>
                <input type="text" name="price" class="-secondary @error('price') is-invalid @enderror" placeholder="3000円→3000" id="price" value="@if( is_null(old('price')) == false){{ old('price') }}@else{{ $items->price }}@endif">
                <p class="alert -top">＊半角数字のみ。単位は省略してください。</p>
                @error('price')
                  <p class="alert -margin_bottom">入力方法が間違っています。</p>
                @enderror
              </div>
              <div class="input_wrap">
                <label for="per_protein" class="label">１食あたりのタンパク質含有量</label>
                <input type="text" name="per_protein" class="-secondary @error('per_protein') is-invalid @enderror" placeholder="20g→20" id="per_protein" value="@if( is_null(old('per_protein')) == false){{ old('per_protein') }}@else{{ $items->per_protein }}@endif">
                <p class="alert -top">＊半角数字のみ。単位は省略してください。</p>
                @error('per_protein')
                  <p class="alert -margin_bottom">入力方法が間違っています。</p>
                @enderror
              </div>
              <div class="radio_wrap">
                <p>製造は日本ですか？</p>
                <input type="radio" name="made" value="0" class="-secondary @error('made') is-invalid @enderror" id="madejapan" @if( is_null(old('made')) == false ){{ old('made') == "0" ? 'checked' : '' }}@else{{ $items->made == "0" ? 'checked' : '' }}@endif>
                <label for="madejapan" class="label">はい</label>
                <input type="radio" name="made" value="1" class="-secondary @error('made') is-invalid @enderror" id="madeother" @if( is_null(old('made')) == false ){{ old('made') == "1" ? 'checked' : '' }}@else{{ $items->made == "1" ? 'checked' : '' }}@endif>
                <label for="madeother" class="label">いいえ</label>
              </div>
              <div class="radio_wrap">
                <p>プロテインの種類を選択してください。</p>
                <input type="radio" name="type" value="0" class="-secondary @error('type') is-invalid @enderror" id="whey" @if( is_null(old('type')) == false ){{ old('type') == "0" ? 'checked' : '' }}@else{{ $items->type == "0" ? 'checked' : '' }}@endif>
                <label for="whey" class="label">ホエイ</label>
                <input type="radio" name="type" value="1" class="-secondary @error('type') is-invalid @enderror" id="soy" @if( is_null(old('type')) == false ){{ old('type') == "1" ? 'checked' : '' }}@else{{ $items->type == "1" ? 'checked' : '' }}@endif>
                <label for="soy" class="label">SOY</label>
                <input type="radio" name="type" value="2" class="-secondary @error('type') is-invalid @enderror" id="casein" @if( is_null(old('type')) == false ){{ old('type') == "2" ? 'checked' : '' }}@else{{ $items->type == "2" ? 'checked' : '' }}@endif>
                <label for="casein" class="label">カゼイン</label>
                <input type="radio" name="type" value="3" class="-secondary @error('type') is-invalid @enderror" id="typeother" @if( is_null(old('type')) == false ){{ old('type') == "3" ? 'checked' : '' }}@else{{ $items->type == "3" ? 'checked' : '' }}@endif>
                <label for="typeother" class="label">その他</label>
              </div>
              <label for="how_to_buy" class="label">購入方法（任意）</label>
              <input type="text" name="how_to_buy" value="@if( is_null(old('how_to_buy')) == false){{ old('how_to_buy') }}@else{{ $items->how_to_buy }}@endif" class="-secondary @error('how_to_buy') is-invalid @enderror" placeholder="〇〇のECサイト" id="how_to_buy">
              <p class="alert -top">＊URL不可</p>
              @error('how_to_buy')
                <p class="alert -margin_bottom">入力方法が間違っています。</p>
              @enderror
              <label for="how_to_drink" class="label">おすすめの飲み方（任意）</label>
              <input type="text" name="how_to_drink" value="@if( is_null(old('how_to_drink')) == false){{ old('how_to_drink') }}@else{{ $items->how_to_drink }}@endif" class="-secondary @error('how_to_drink') is-invalid @enderror" placeholder="牛乳で飲むと美味しいです！" id="how_to_drink">
              <p class="alert -top">＊URL不可</p>
              @error('how_to_drink')
                <p class="alert -margin_bottom">入力方法が間違っています。</p>
              @enderror
              <label for="comment" class="label">コメント（任意）</label>
              <textarea type="text" name="comment" class="textarea -secondary @error('comment') is-invalid @enderror"
              placeholder="このプロテインはすっきりとしていて、プロテインの独特な味がほとんどしないのでとてもおすすめです！プロテインは毎日飲むものですから、美味しいのが一番ですよね。是非お試しください！"
              id="comment">@if( is_null(old('comment')) == false){{ old('comment') }}@else{{ $items->comment }}@endif</textarea>
              <p class="alert -top">＊URL不可</p>
              @error('comment')
                <p class="alert -margin_bottom">入力方法が間違っています。</p>
              @enderror
            </div>
            <input type="submit" name="submit" value="submit" id="submit">
            <label for="submit" class="submit">上記の内容で再投稿</label>

          </form>
        </div>

      </main>

@endsection
