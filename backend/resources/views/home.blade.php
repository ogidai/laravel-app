@extends('layouts.app')

@section('content')

<div class="container">
    <div class="overlay"></div>
    <header class="header">
      <div class="contentInner">
        <div class="logo">
          <a href="{{ ('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="プロコミ！">
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


    <div class="wrapper -top">

      @include('layouts.gnav')


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
          <div class="options">
            <div class="options_item
            @if($id == 0)
            active
            @endif
            ">
              <span class="options_title arrow">投稿日</span>
            </div>
            <div class="options_item
            @if($id == 1)
            active
            @endif
            ">
              <span class="options_title arrow">キーワード</span>
            </div>
            <div class="options_item
            @if($id == 2)
            active
            @endif
            ">
              <span class="options_title arrow">総合評価</span>
            </div>
            <div class="options_item
            @if($id == 3)
            active
            @endif
            ">
              <span class="options_title arrow">美味しさ</span>
            </div>
            <div class="options_item
            @if($id == 4)
            active
            @endif
            ">
              <span class="options_title arrow">コスパ</span>
            </div>
            <div class="options_item
            @if($id == 5)
            active
            @endif
            ">
              <span class="options_title arrow">おすすめ度</span>
            </div>
            <div class="options_item
            @if($id == 6)
            active
            @endif
            ">
              <span class="options_title arrow">溶けやすさ</span>
            </div>
            <div class="options_item
            @if($id == 7)
            active
            @endif
            ">
              <span class="options_title arrow">泡立ちの少なさ</span>
            </div>
            <div class="options_item
            @if($id == 8)
            active
            @endif
            ">
              <span class="options_title arrow">参考価格</span>
            </div>
            <div class="options_item
            @if($id == 9)
            active
            @endif
            ">
              <span class="options_title arrow">種類</span>
            </div>
            <div class="options_item
            @if($id == 10)
            active
            @endif
            ">
              <span class="options_title arrow">製造</span>
            </div>
          </div>

          <div class="option_form_wrap
          @if ($id == 0)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="option_select">
                <input type="radio" name="date" value="0" id="new" required {{ $id == 0 && $result == 0 ? 'checked' : '' }}>
                <label for="new">新しい順</label>
              </div>
              <div class="option_select">
                <input type="radio" name="date" value="1" id="old" required {{ $id == 0 && $result == 1 ? 'checked' : '' }}>
                <label for="old">古い順</label>
              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          </div>

          <div class="option_form_wrap
          @if ($id == 1)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="input_wrap">
                <label for="search" class="label"></label>
                <input type="text" name="search" value="@if ($id == 1){{ $result }}@endif" id="search" class="-secondary">
                <div class="submit">
                  <input type="submit" name="submit" value="submit">
                  <p class="search_text">検索</p>
                </div>
              </div>
            </form>
          </div>

          <div class="option_form_wrap
          @if ($id == 2)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="option_select">
                <input type="radio" name="total" value="0" id="total_asc" required {{ $id == 2 && $result == 0 ? 'checked' : '' }}>
                <label for="total_asc">評価が高い順</label>
              </div>
              <div class="option_select">
                <input type="radio" name="total" value="1" id="total_des" required {{ $id == 2 && $result == 1 ? 'checked' : '' }}>
                <label for="total_des">評価が低い順</label>
              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          </div>

          <div class="option_form_wrap
          @if ($id == 3)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="option_select">
                <input type="radio" name="taste" value="0" id="taste_asc" required {{ $id == 3 && $result == 0 ? 'checked' : '' }}>
                <label for="taste_asc">評価が高い順</label>
              </div>
              <div class="option_select">
                <input type="radio" name="taste" value="1" id="taste_des" required {{ $id == 3 && $result == 1 ? 'checked' : '' }}>
                <label for="taste_des">評価が低い順</label>
              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          </div>

          <div class="option_form_wrap
          @if ($id == 4)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="option_select">
                <input type="radio" name="cost" value="0" id="cost_asc" required  {{ $id == 4 && $result == 0 ? 'checked' : '' }}>
                <label for="cost_asc">評価が高い順</label>
              </div>
              <div class="option_select">
                <input type="radio" name="cost" value="1" id="cost_des" required  {{ $id == 4 && $result == 1 ? 'checked' : '' }}>
                <label for="cost_des">評価が低い順</label>
              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          </div>

          <div class="option_form_wrap
          @if ($id == 5)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="option_select">
                <input type="radio" name="recomend" value="0" id="recomend_asc" required  {{ $id == 5 && $result == 0 ? 'checked' : '' }}>
                <label for="recomend_asc">評価が高い順</label>
              </div>
              <div class="option_select">
                <input type="radio" name="recomend" value="1" id="recomend_des" required  {{ $id == 5 && $result == 1 ? 'checked' : '' }}>
                <label for="recomend_des">評価が低い順</label>
              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          </div>

          <div class="option_form_wrap
          @if ($id == 6)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="option_select">
                <input type="radio" name="melt" value="0" id="melt_asc" required  {{ $id == 6 && $result == 0 ? 'checked' : '' }}>
                <label for="melt_asc">評価が高い順</label>
              </div>
              <div class="option_select">
                <input type="radio" name="melt" value="1" id="melt_des" required  {{ $id == 6 && $result == 1 ? 'checked' : '' }}>
                <label for="melt_des">評価が低い順</label>
              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          </div>

          <div class="option_form_wrap
          @if ($id == 7)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="option_select">
                <input type="radio" name="foam" value="0" id="foam_asc" required  {{ $id == 7 && $result == 0 ? 'checked' : '' }}>
                <label for="foam_asc">評価が高い順</label>
              </div>
              <div class="option_select">
                <input type="radio" name="foam" value="1" id="foam_des" required  {{ $id == 7 && $result == 1 ? 'checked' : '' }}>
                <label for="foam_des">評価が低い順</label>
              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          </div>

          <div class="option_form_wrap
          @if ($id == 8)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="option_select">
                <input type="radio" name="price" value="0" id="price_asc" required  {{ $id == 8 && $result == 0 ? 'checked' : '' }}>
                <label for="price_asc">参考価格が高い順</label>
              </div>
              <div class="option_select">
                <input type="radio" name="price" value="1" id="price_des" required  {{ $id == 8 && $result == 1 ? 'checked' : '' }}>
                <label for="price_des">参考価格が低い順</label>
              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          </div>

          <div class="option_form_wrap
          @if ($id == 9)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="option_select">
                <input type="radio" name="type" value="0" id="whey" required {{ $id == 9 && $result == 0 ? 'checked' : '' }}>
                <label for="whey">ホエイ</label>
              </div>
              <div class="option_select">
                <input type="radio" name="type" value="1" id="soy" required {{ $id == 9 && $result == 1 ? 'checked' : '' }}>
                <label for="soy">ソイ</label>
              </div>
              <div class="option_select">
                <input type="radio" name="type" value="2" id="casein" required {{ $id == 9 && $result == 2 ? 'checked' : '' }}>
                <label for="casein">カゼイン</label>
              </div>
              <div class="option_select">
                <input type="radio" name="type" value="3" id="typeother" required {{ $id == 9 && $result == 3 ? 'checked' : '' }}>
                <label for="typeother">その他</label>
              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          </div>

          <div class="option_form_wrap
          @if ($id == 10)
          active
          @endif
          ">
            <form class="form -search" action="{{ action('HomeController@index') }}" method="post">
              @csrf
              <div class="option_select">
                <input type="radio" name="made" value="0" id="ja" required {{ $id == 10 && $result == 0 ? 'checked' : '' }}>
                <label for="ja">日本</label>
              </div>
              <div class="option_select">
                <input type="radio" name="made" value="1" id="madeother" required {{ $id == 10 && $result == 1 ? 'checked' : '' }}>
                <label for="madeother">海外</label>
              </div>
              <div class="submit">
                <input type="submit" name="submit" value="submit">
                <p class="search_text">検索</p>
              </div>
            </form>
          </div>


        </div>


        @if($items->isEmpty())
        <div class="card">
          <p class="text_align">
            @if ($id == 0)
            "投稿日"
            @endif
            @if ($id == 1)
            "{{$result}}"
            @endif
            @if ($id == 2)
            "総合評価"
            @endif
            @if ($id == 3)
            "美味しさ"
            @endif
            @if ($id == 4)
            "コスパ"
            @endif
            @if ($id == 5)
            "おすすめ度"
            @endif
            @if ($id == 6)
            "溶けやすさ"
            @endif
            @if ($id == 7)
            "泡立ちの少なさ"
            @endif
            @if ($id == 8)
            "参考価格"
            @endif
            @if ($id == 9)
            @if($result == 0)"プロテインの種類がホエイ"@endif
            @if($result == 1)"プロテインの種類がソイ"@endif
            @if($result == 2)"プロテインの種類がカゼイン"@endif
            @if($result == 3)"プロテインの種類がその他"@endif
            @endif
            @if ($id == 10)
            "製造が@if($result == 0)日本@else海外@endif"
            @endif
            の投稿は、まだありません。
            <br>記念すべき
            @if ($id == 0)
            "投稿日"
            @endif
            @if ($id == 1)
            "{{$result}}"
            @endif
            @if ($id == 2)
            "総合評価"
            @endif
            @if ($id == 3)
            "美味しさ"
            @endif
            @if ($id == 4)
            "コスパ"
            @endif
            @if ($id == 5)
            "おすすめ度"
            @endif
            @if ($id == 6)
            "溶けやすさ"
            @endif
            @if ($id == 7)
            "泡立ちの少なさ"
            @endif
            @if ($id == 8)
            "参考価格"
            @endif
            @if ($id == 9)
            @if($result == 0)"プロテインの種類がホエイ"@endif
            @if($result == 1)"プロテインの種類がソイ"@endif
            @if($result == 2)"プロテインの種類がカゼイン"@endif
            @if($result == 3)"プロテインの種類がその他"@endif
            @endif
            @if ($id == 10)
            "製造が@if($result == 0)日本@else海外@endif"
            @endif
            の最初の投稿をしてみませんか？
          </p>
            <div class="btnWrap">
              <a href="{{ route('post') }}" class="btn -full -primary">投稿してみる！</a>
            </div>
          </div>
          @endif

        <ul class="pro_list">

          @foreach($items as $item)


          <li class="pro_item">
            <a href="{{ route('detail', [$item->id]) }}">
              <div class="pro_item_left">
                <div class="img_outer">
                  <figure>
                    @if (is_null($item->img_01) == true)
                    <img src="{{ asset('images/noimage.png') }}" alt="no image">
                    @else
                    <img src="{{ Storage::disk('s3')->url($item->img_01)}}" alt="">
                    @endif
                  </figure>
                </div>
              </div>
              <div class="pro_item_right">
                <p class="pro_name"><span>{{$item->pro_name}}</span><span>{{$item->flavor}}</span>
                  @if( empty($items->weight) != true )
                  {{$item->weight}}kg
                  @endif
                </p>
                <div class="review -row_sp">
                  <p class="review_cat">
                    @if ( $id == 0 || $id == 1 || $id == 9 )
                    投稿日：<span class="font_bigger">{{ date('Y/m/d', strtotime($item->updated_at)) }}</span>
                    @endif
                    @if ( $id == 2 )
                    総合評価
                    @endif
                    @if ( $id == 3 )
                    美味しさ
                    @endif
                    @if ( $id == 4 )
                    コスパ
                    @endif
                    @if ( $id == 5 )
                    おすすめ度
                    @endif
                    @if ( $id == 6 )
                    溶けやすさ
                    @endif
                    @if ( $id == 7 )
                    泡立ちの少なさ
                    @endif
                    @if ( $id == 8 )
                    参考価格：<span class="font_bigger">{{ $item->price }}</span>円
                    @endif
                    @if ($id == 10)
                    製造：@if($result == 0)日本@else海外@endif
                    @endif
                  </p>
                  @if  ($id == 2 || $id == 3 || $id == 4 || $id == 5 || $id == 6 || $id == 7 )
                  <div class="star_icons
                  @if($id == 2)star_icon_{{ $item->total }}@endif
                  @if($id == 3)star_icon_{{ $item->taste_good }}@endif
                  @if($id == 4)star_icon_{{ $item->cost_paf }}@endif
                  @if($id == 5)star_icon_{{ $item->recomend }}@endif
                  @if($id == 6)star_icon_{{ $item->melt }}@endif
                  @if($id == 7)star_icon_{{ $item->foam }}@endif
                  ">
                    <i class="star_icon">
                      <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 16px; height: 16px; opacity: 1;" xml:space="preserve">
                        <style type="text/css">
                        .st0{fill:#4B4B4B;}
                        </style>
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
                        <style type="text/css">
                        .st0{fill:#4B4B4B;}
                        </style>
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
                        <style type="text/css">
                        .st0{fill:#4B4B4B;}
                        </style>
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
                        <style type="text/css">
                          .st0{fill:#4B4B4B;}
                        </style>
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
                        <style type="text/css">
                          .st0{fill:#4B4B4B;}
                        </style>
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
                    @endif
                    </div>


              </div>
            </a>
          </li>

          @endforeach

        </ul>
        {{ $items->links() }}
      </main>
    </div>
    </div>

@endsection
