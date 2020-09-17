@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
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
        <div class="navBtn js-navBtnActive">
          <span class="js-badge"></span><span></span><span></span>
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

    @extends('layouts.gnav')

    @section('gnav')

    <div class="wrapper -top">



      <main class="main">
        @guest
        <div class="inner -top">
          <p class="catch">会員になってプロテインのレビューを書きませんか？</p>
          <div class="btnWrap">
            <a href="{{route('register')}}" class="btn -full">新規会員登録！</a>
          </div>
        </div>
        @endguest

        <div class="options_wrap">
          <form class="options" action="{{ route('home')}}" method="post">
            @csrf
            <div class="options_item">
              <input type="radio" name="option" value="all" id="all"　 checked="checked">
              <label for="all">総合評価</label>
            </div>
            <div class="options_item">
              <input type="radio" name="option" value="taste" id="taste">
              <label for="taste">美味しさ</label>
            </div>
            <div class="options_item">
              <input type="radio" name="option" value="cost" id="cost">
              <label for="cost">コスパ</label>
            </div>
            <div class="submit">
              <input type="submit" name="submit" value="submit">
              <p class="search_text">検索</p>
            </div>
          </form>
        </div>



        <ul class="pro_list">
          <li class="pro_item">
            <a href="{{ route('detail') }} ">
              <div class="pro_item_left">
                <figure>
                  <img src="images/sample.png" alt="">
                </figure>
              </div>
              <div class="pro_item_right">
                <p class="pro_name">ビーレジェンド ホエイプロテイン ベリベリベリー風味</p>
                <div class="review -row_pc">
                  <p class="review_cat">おすすめ度</p>
                  <div class="star_icons">
                    <i class="star_icon">
                      <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                        <style type="text/css">
                        .st0{fill:#4B4B4B;}
                        </style>
                        <g>
                          <path class="st0" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                          C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                          c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                          c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                          c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                          C510.498,220.621,514.362,207.749,510.549,196.024z" style="fill: rgb(255, 208, 12);"></path>
                        </g>
                      </svg>
                    </i>
                    <i class="star_icon">
                      <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                        <style type="text/css">
                        .st0{fill:#4B4B4B;}
                        </style>
                        <g>
                          <path class="st0" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                          C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                          c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                          c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                          c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                          C510.498,220.621,514.362,207.749,510.549,196.024z" style="fill: rgb(255, 208, 12);"></path>
                        </g>
                      </svg>
                    </i>
                    <i class="star_icon">
                      <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                        <style type="text/css">
                        .st0{fill:#4B4B4B;}
                        </style>
                        <g>
                          <path class="st0" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                          C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                          c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                          c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                          c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                          C510.498,220.621,514.362,207.749,510.549,196.024z" style="fill: rgb(255, 208, 12);"></path>
                        </g>
                      </svg>
                    </i>
                    <i class="star_icon">
                      <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                        <style type="text/css">
                        .st0{fill:#4B4B4B;}
                        </style>
                        <g>
                          <path class="st0" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                          C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                          c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                          c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                          c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                          C510.498,220.621,514.362,207.749,510.549,196.024z" style="fill: rgb(255, 208, 12);"></path>
                        </g>
                      </svg>
                    </i>
                    <i class="star_icon">
                      <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                        <style type="text/css">
                          .st0{fill:#4B4B4B;}
                        </style>
                        <g>
                          <path class="st0" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                          C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                          c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                          c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                          c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                          C510.498,220.621,514.362,207.749,510.549,196.024z" style="fill: rgb(255, 208, 12);"></path>
                        </g>
                      </svg>
                    </i>

                  </div>
                </div>
              </div>
            </a>
          </li>

        </ul>

      </main>


@endsection
