@extends('layouts.app')

@section('content')

<div class="container">
<div class="overlay"></div>
<header class="header">
  <div class="contentInner">
    <div class="logo">
      <a href="#">
        <img src="{{ asset('images/logo.png') }}" alt="">
      </a>
    </div>
    <!-- <div class="navBtn js-navBtn">
      <span class="js-badge active"></span><span></span><span></span>
    </div> -->
    <a href="{{ route('your_post') }}" class="left arrow_back"></a>
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
          @if (  is_null($items->read_temp_path_02) != true && is_null($items->read_temp_path_03) != false  )
          pro_img_2
          @endif
          @if (  is_null($items->read_temp_path_02 ) != false && is_null($items->read_temp_path_03) != true  )
          pro_img_2
          @endif
          @if (  is_null($items->read_temp_path_02 ) != true && is_null($items->read_temp_path_03) != true  )
          pro_img_3
          @endif
        ">
          <div class="img_outer">
            <figure>
              <img src="../../{{$items->read_temp_path_01}}" alt="">
            </figure>
            @if (  is_null($items->read_temp_path_02) != true && is_null($items->read_temp_path_03) != false  )
            <div class="arrow -next js-arrow -tab"></div>
            <div class="arrow -prev js-arrow -tab"></div>
            @endif
            @if (  is_null($items->read_temp_path_02 ) != false && is_null($items->read_temp_path_03) != true  )
            <div class="arrow -next js-arrow -tab"></div>
            <div class="arrow -prev js-arrow -tab"></div>
            @endif
            @if (  is_null($items->read_temp_path_02 ) != true && is_null($items->read_temp_path_03) != true  )
            <div class="arrow -next js-arrowTransN -tab"></div>
            <div class="arrow -prev js-arrowTransM -tab"></div>
            @endif
            <div class="number">1</div>
          </div>
          @if ( is_null($items->read_temp_path_02) != true )
          <div class="img_outer">
            <figure>
              <img src="../../{{$items->read_temp_path_02}}" alt="">
            </figure>
            @if (  is_null($items->read_temp_path_02) != true && is_null($items->read_temp_path_03) != false  )
            <div class="arrow -next js-arrow -tab"></div>
            <div class="arrow -prev js-arrow -tab"></div>
            <div class="number">2</div>
            @endif
            @if (  is_null($items->read_temp_path_02 ) != false && is_null($items->read_temp_path_03) != true  )
            <div class="arrow -next js-arrow -tab"></div>
            <div class="arrow -prev js-arrow -tab"></div>
            <div class="number">2</div>
            @endif
            @if (  is_null($items->read_temp_path_02 ) != true && is_null($items->read_temp_path_03) != true  )
            <div class="arrow -next js-arrowTransM -tab"></div>
            <div class="arrow -prev js-arrowTransP -tab"></div>
            <div class="number">2</div>
            @endif
          </div>
          @endif
          @if ( is_null($items->read_temp_path_03) != true )
          <div class="img_outer">
            <figure>
              <img src="../../{{$items->read_temp_path_03}}" alt="">
            </figure>
            @if (  is_null($items->read_temp_path_02) != true && is_null($items->read_temp_path_03) != false  )
            <div class="arrow -next js-arrow -tab"></div>
            <div class="arrow -prev js-arrow -tab"></div>
            <div class="number">2</div>
            @endif
            @if (  is_null($items->read_temp_path_02 ) != false && is_null($items->read_temp_path_03) != true  )
            <div class="arrow -next js-arrow -tab"></div>
            <div class="arrow -prev js-arrow -tab"></div>
            <div class="number">2</div>
            @endif
            @if (  is_null($items->read_temp_path_02 ) != true && is_null($items->read_temp_path_03) != true  )
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
          @if( is_null($items->weight) != true )
          <li class="list_item">
            <p class="list_left">内容量</p>
            <p class="list_right">{{ $items->weight }}kg</p>
          </li>
          @endif
          @if( is_null($items->price) != true )
          <li class="list_item">
            <p class="list_left">参考価格</p>
            <p class="list_right">{{ $items->price }}円</p>
          </li>
          @endif
          @if( is_null($items->price) != true && is_null($items->weight) != true )
          <li class="list_item">
            <p class="list_left">参考価格/１kg</p>
            <p class="list_right">{{ round( $items->price / $items->weight ) }}円</p>
          </li>
          @endif
          @if( is_null($items->per_protein) != true )
          <li class="list_item">
            <p class="list_left">タンパク質/１食</p>
            <p class="list_right">{{ $items->per_protein }}g</p>
          </li>
          @endif
          @if( $items->made == 0 || $items->made == 1 )
          <li class="list_item">
            <p class="list_left">生産地</p>
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
              わからん
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
            <div class="star_icons list_right star_icon_{{ round( ( $items->taste_good + $items->cost_paf + $items->recomend ) /3 ) }}">
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
    <div class="btnWrap -margin">
      <a href="{{route('post.edit', $items->id )}}" class="btn -full">この投稿を編集</a>
      <span class="btn -full js-showDeletePostModal">この投稿を削除</span>
    </div>
  </div>


  </main>
  <div class="modal js-deletePostModal">
    <p class="text">この操作は戻せません。<br>本当にこの投稿を削除しますか？</p>
    <div class="btnWrap">
      <a href="{{ route('post.destroy', $items->id ) }}" class="btn -primary">はい</a>
      <span class="btn js-deletePostModalBack">いいえ</span>
    </div>
  </div>
</div>



</div>

@endsection