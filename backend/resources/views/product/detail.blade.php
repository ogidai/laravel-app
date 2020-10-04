@extends('layouts.app')

@section('content')

<div class="container">
<div class="overlay"></div>
<header class="header">
  <div class="contentInner">
    <div class="logo">
      <a href="{{ route('home') }}">
        <img src="{{ asset('images/logo.png') }}" alt="">
      </a>
    </div>
    <!-- <div class="navBtn js-navBtn">
      <span class="js-badge active"></span><span></span><span></span>
    </div> -->
    <!-- <a href="{{ route('home') }}" class="left arrow_back"></a> -->
    <!-- <a href="{{ action('HomeController@index') }}" class="left arrow_back"></a> -->
    <a href="javascript:history.back()" class="left arrow_back"></a>
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
              <a href="https://twitter.com/procomi2020"><img src="{{ asset('images/t_logo.svg') }}" alt=""></a>
          </li>
      </ul>
      <footer class="footer -pc">
          <div class="copyright">
            <small>© 2020 プロコミ！</small>
          </div>
        </footer>
  </nav>



  <main class="main">
    @guest
    <div class="card">
      <p class="catch">会員になってプロテインのレビューを書きませんか？</p>
      <div class="btnWrap -margin">
        <a href="{{route('register')}}" class="btn -full -primary">新規登録！</a>
      </div>
    </div>
    @endguest
    <div class="card">

      <div class="pro_detail">
          <h2 class="pro_name"><span>{{$items->pro_name}}</span><span>{{$items->flavor}}</span><span>
            @if( is_null($items->weight) != true )
            {{$items->weight}}kg
            @endif
          </span></h2>
          <div class="pro_img_wrap
            @if (  is_null($path_02) == false && is_null($path_03) == true  )
            pro_img_2
            @endif
            @if (  is_null($path_02 ) == true && is_null($path_03) == false  )
            pro_img_2
            @endif
            @if (  is_null($path_02 ) == false && is_null($path_03) == false  )
            pro_img_3
            @endif
          ">
            <div class="img_outer">
              <figure>
                <img src="{{$path_01}}" alt="">
              </figure>
              @if (  is_null($path_02) == false && is_null($path_03) == true  )
              <div class="arrow -next js-arrow -tab"></div>
              <div class="arrow -prev js-arrow -tab"></div>
              @endif
              @if (  is_null($path_02 ) == true && is_null($path_03) == false  )
              <div class="arrow -next js-arrow -tab"></div>
              <div class="arrow -prev js-arrow -tab"></div>
              @endif
              @if (  is_null($path_02 ) == false && is_null($path_03) == false  )
              <div class="arrow -next js-arrowTransN -tab"></div>
              <div class="arrow -prev js-arrowTransM -tab"></div>
              @endif
              <div class="number">1</div>
            </div>
            @if ( is_null($path_02) == false )
            <div class="img_outer">
              <figure>
                <img src="{{$path_02}}" alt="">
              </figure>
              @if (  is_null($path_02) == false && is_null($path_03) == true  )
              <div class="arrow -next js-arrow -tab"></div>
              <div class="arrow -prev js-arrow -tab"></div>
              <div class="number">2</div>
              @endif
              @if (  is_null($path_02 ) == true && is_null($path_03) == false  )
              <div class="arrow -next js-arrow -tab"></div>
              <div class="arrow -prev js-arrow -tab"></div>
              <div class="number">2</div>
              @endif
              @if (  is_null($path_02 ) == false && is_null($path_03) == false  )
              <div class="arrow -next js-arrowTransM -tab"></div>
              <div class="arrow -prev js-arrowTransP -tab"></div>
              <div class="number">2</div>
              @endif
            </div>
            @endif
            @if ( is_null($path_03) == false )
            <div class="img_outer">
              <figure>
                <img src="{{$path_03}}" alt="">
              </figure>
              @if (  is_null($path_02) == false && is_null($path_03) == true  )
              <div class="arrow -next js-arrow -tab"></div>
              <div class="arrow -prev js-arrow -tab"></div>
              <div class="number">2</div>
              @endif
              @if (  is_null($path_02 ) == true && is_null($path_03) == false  )
              <div class="arrow -next js-arrow -tab"></div>
              <div class="arrow -prev js-arrow -tab"></div>
              <div class="number">2</div>
              @endif
              @if (  is_null($path_02 ) == false && is_null($path_03) == false  )
              <div class="arrow -next js-arrowTransP -tab"></div>
              <div class="arrow -prev js-arrowTransN -tab"></div>
              <div class="number">3</div>
              @endif
            </div>
            @endif
          </div>
          <ul class="list_items">
            <li class="list_item">
              <p class="list_left">投稿日</p>
              <p class="list_right">{{date('Y/m/d', strtotime($items->created_at))}}</p>
            </li>
            @if($items->created_at != $items->updated_at)
            <li class="list_item">
              <p class="list_left">更新日</p>
              <p class="list_right">{{date('Y/m/d', strtotime($items->updated_at))}}</p>
            </li>
            @endif
            <li class="list_item">
              <p class="list_left">商品名</p>
              <p class="list_right">{{ $items->pro_name }}</p>
            </li>
            <li class="list_item">
              <p class="list_left">味</p>
              <p class="list_right">{{ $items->flavor }}</p>
            </li>
            @if( is_null($items->weight) == false )
            <li class="list_item">
              <p class="list_left">内容量</p>
              <p class="list_right">{{ $items->weight }}kg</p>
            </li>
            @endif
            @if( is_null($items->price) == false )
            <li class="list_item">
              <p class="list_left">参考価格</p>
              <p class="list_right">{{ $items->price }}円</p>
            </li>
            @endif
            @if( is_null($items->per_price) == false )
            <li class="list_item">
              <p class="list_left">参考価格／１kg</p>
              <p class="list_right">{{ $items->per_price }}円</p>
            </li>
            @endif
            @if( is_null($items->per_protein) == false )
            <li class="list_item">
              <p class="list_left">タンパク質／１食</p>
              <p class="list_right">{{ $items->per_protein }}g</p>
            </li>
            @endif
            @if( $items->made == 0 || $items->made == 1 )
            <li class="list_item">
              <p class="list_left">製造</p>
              <p class="list_right">
                @if($items->made == 0)
                日本
                @else
                海外
                @endif
              </p>
            </li>
            @endif
            @if( $items->type == 0 || $items->type == 1 || $items->type == 2 || $items->type == 3 )
            <li class="list_item">
              <p class="list_left">プロテインの種類</p>
              <p class="list_right">
                @if( $items->type == 0)
                ホエイ
                @endif
                @if( $items->type == 1)
                ソイ
                @endif
                @if( $items->type == 2)
                カゼイン
                @endif
                @if( $items->type == 3)
                その他
                @endif
              </p>
            </li>
            @endif
            <li class="list_item">
              <p class="list_left">おいしさ</p>
              <div class="star_icons list_right star_icon_{{ $items->taste_good }}">
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st1 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st2 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st3 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                  <g>
                    <path class="st st4" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                    C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                    c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                    c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                    c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                    C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                  </g>
                </svg>
              </i>
              <i class="star_icon">
                <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                  <g>
                    <path class="st5 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                    C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                    c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                    c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                    c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                    C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                  </g>
                </svg>
              </i>
            </div>
            </li>
            <li class="list_item">
              <p class="list_left">コスパ</p>
              <div class="star_icons list_right star_icon_{{ $items->cost_paf }}">
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st1 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st2 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st3 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                  <g>
                    <path class="st4 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                    C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                    c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                    c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                    c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                    C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                  </g>
                </svg>
              </i>
              <i class="star_icon">
                <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                  <g>
                    <path class="st5 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                    C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                    c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                    c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                    c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                    C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                  </g>
                </svg>
              </i>
            </div>
            </li>
            <li class="list_item">
              <p class="list_left">おすすめ度</p>
              <div class="star_icons list_right star_icon_{{ $items->recomend }}">
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st1 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st2 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st3 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                  <g>
                    <path class="st4 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                    C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                    c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                    c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                    c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                    C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                  </g>
                </svg>
              </i>
              <i class="star_icon">
                <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                  <g>
                    <path class="st5 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                    C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                    c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                    c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                    c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                    C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                  </g>
                </svg>
              </i>
            </div>
            </li>
            <li class="list_item">
              <p class="list_left">総合評価</p>
              <div class="star_icons list_right star_icon_{{ $items->total }}">
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st1 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st2 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                    <g>
                      <path class="st3 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                      C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                      c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                      c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                      c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                      C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                    </g>
                  </svg>
                </i>
                <i class="star_icon">
                  <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                  <g>
                    <path class="st4 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                    C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                    c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                    c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                    c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                    C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                  </g>
                </svg>
              </i>
              <i class="star_icon">
                <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                  <g>
                    <path class="st5 st" d="M510.549,196.024c-3.812-11.726-14.5-19.868-26.82-20.42l-147.935-6.686l-52.09-138.642
                    C279.37,18.739,268.329,11.089,256,11.089c-12.329,0-23.37,7.65-27.704,19.187l-52.089,138.642l-147.935,6.686
                    c-12.321,0.552-23.008,8.694-26.821,20.42c-3.812,11.726,0.052,24.598,9.689,32.283l115.756,92.368L87.542,463.453
                    c-3.27,11.889,1.155,24.554,11.136,31.808c9.985,7.246,23.404,7.548,33.704,0.758L256,414.473l123.617,81.547
                    c10.3,6.789,23.719,6.487,33.704-0.758c9.982-7.245,14.405-19.92,11.131-31.808l-39.347-142.779l115.756-92.368
                    C510.498,220.621,514.362,207.749,510.549,196.024z"></path>
                  </g>
                </svg>
              </i>
            </div>
            </li>
            @if( is_null($items->how_to_buy) != true )
            <li class="list_item">
              <p class="list_left">購入方法</p>
              <p class="list_right">{{ $items->how_to_buy }}</p>
            </li>
            @endif
            @if( is_null($items->how_to_drink) != true )
            <li class="list_item">
              <p class="list_left">おすすめの飲み方</p>
              <p class="list_right">{{ $items->how_to_drink }}</p>
            </li>
            @endif
            @if( is_null($items->comment) != true )
            <li class="list_item">
              <p class="list_left">コメント</p>
              <p class="list_right">{{ $items->comment }}</p>
            </li>
            @endif
          </ul>
      </div>
  </div>
  @auth
  <div class="card">
    <p class="catch">たった１分でレビューを投稿できます！</p>
    <div class="btnWrap -margin">
      <a href="{{route('post')}}" class="btn -full -primary">レビューを投稿！</a>
    </div>
  </div>
  @endauth

  </main>

</div>



</div>

@endsection
