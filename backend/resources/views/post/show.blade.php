
<li class="pro_item">
  <a href="{{ route('post.show', [$items->id]) }}">
    <div class="pro_item_left">
      <div class="img_outer">
        <figure>
          <img src="../../{{$items->read_temp_path_01}}" alt="">
        </figure>
      </div>
    </div>
    <div class="pro_item_right">
      <p class="pro_name"><span>{{$items->pro_name}}</span><span>{{$items->flavor}}</span>{{$items->weight}}kg</p>
    <p class="post_date">投稿日：<span>{{date('Y/m/d', strtotime($items->created_at))}}</span></p>
  </div>
  </a>
</li>
