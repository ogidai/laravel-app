<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePostForm;
use App\Http\Requests\EditPostForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Storage;

class PostController extends Controller
{
    //
    public function __construct() {
      $this->middleware('verified');
    }

    public function index() {
      $authUser = Auth::user()->id;
      $items = Post::where('user_id', $authUser)
      ->orderBy('updated_at', 'desc')
      ->paginate(10);

      return view('post.index', compact('items'));
    }

    public function show(Request $request, $id, Post $item) {
    	$items = Post::find($id);
      $path_01 = Storage::disk('s3')->url($items->img_01);

      if (is_null($items->img_02) == true) {
        $path_02 = $items->img_02;
      } else {
        $path_02 = Storage::disk('s3')->url($items->img_02);
      }

      if (is_null($items->img_03) == true) {
        $path_03 = $items->img_03;
      } else {
        $path_03 = Storage::disk('s3')->url($items->img_03);
      }

    	return view('post.show', compact('items', 'path_01', 'path_02', 'path_03'));
    }

    public function create()  {
      return view('post.create');
    }

    public function edit(Request $request)  {
      $items = Post::find($request->id);

      $path_01 = Storage::disk('s3')->url($items->img_01);

      if (is_null($items->img_02) == true) {
        $path_02 = $items->img_02;
      } else {
        $path_02 = Storage::disk('s3')->url($items->img_02);
      }

      if (is_null($items->img_03) == true) {
        $path_03 = $items->img_03;
      } else {
        $path_03 = Storage::disk('s3')->url($items->img_03);
      }

      return view('post.edit', compact('items', 'path_01', 'path_02', 'path_03'));
    }

    public function update(EditPostForm $request, $id) {
        $post = new Post;

        $post = Post::find($id);

        $post_data = $request->except('image_01', 'image_02', 'image_03');
        unset($post_data['_token']);

        $imagefile_01 = $request->file('image_01');
        $imagefile_02 = $request->file('image_02');
        $imagefile_03 = $request->file('image_03');


        $old_path_01 = $post->img_01;
        $old_path_02 = $post->img_02;
        $old_path_03 = $post->img_03;


        if ( is_null($imagefile_01) == true ) {
          $path_01 = $old_path_01;
        } else {
          Storage::disk('s3')->delete($old_path_01, 'public');
          $path_01 = Storage::disk('s3')->putFile('/post_image_01',$imagefile_01, 'public');
        }


        // img_02,03に変化なし = nullが返ってくる。
        if ($request->submit == 'submit') {

          // 過去の画像があるか判断。ある場合は$path_01にいれる。ない場合はnullをいれる。
          if( is_null($old_path_02) == true ) {
              $path_02 = $imagefile_02;
            } else {
              $path_02 = $old_path_02;
            }
          if( is_null($old_path_03) == true ) {
              $path_03 = $imagefile_03;
            } else {
              $path_03 = $old_path_03;
            }

        }


        // img_02のみに変更があった場合。
        if ($request->submit == 'img_changed_02') {

          // もしnullだったら => 画像を削除した
          if ( is_null($imagefile_02) == true ) {

            Storage::disk('s3')->delete($old_path_02, 'public');
            $path_02 = $imagefile_02;

            // 画像を変更した or 画像を追加した。
          } else {

            if ( is_null($old_path_02) == true ) {
              $path_02 = Storage::disk('s3')->putFile('/post_image_02',$imagefile_02, 'public');
            } else {
              Storage::disk('s3')->delete($old_path_02, 'public');
              $path_02 = Storage::disk('s3')->putFile('/post_image_02',$imagefile_02, 'public');
            }

          }

          // img_03は変更なし。過去の画像があればそれを保存。
          if( is_null($old_path_03) == true ) {
              $path_03 = $imagefile_03;
            } else {
              $path_03 = $old_path_03;
            }


        }


        // img_03のみに変更があった場合。
        if ($request->submit == 'img_changed_03') {

          // もしnullだったら => 画像を削除した
          if ( is_null($imagefile_03) == true ) {

            Storage::disk('s3')->delete($old_path_03, 'public');
            $path_03 = $imagefile_03;

            // 画像を変更した or 画像を追加した。
          } else {

            if ( is_null($old_path_03) == true ) {
              $path_03 = Storage::disk('s3')->putFile('/post_image_03',$imagefile_03, 'public');
            } else {
              Storage::disk('s3')->delete($old_path_03, 'public');
              $path_03 = Storage::disk('s3')->putFile('/post_image_03',$imagefile_03, 'public');
            }

          }

          // img_02は変更なし。過去の画像があればそれを保存。
          if( is_null($old_path_02) == true ) {
              $path_02 = $imagefile_02;
            } else {
              $path_02 = $old_path_02;
            }


        }


        // img_02,03どちらともに変更があった場合
        if ($request->submit == 'img_changed') {


          // もしimg_02がnullだったら => 画像を削除した
          if ( is_null($imagefile_02) == true ) {

            Storage::disk('s3')->delete($old_path_02, 'public');
            $path_02 = $imagefile_02;

            // 画像を変更した or 画像を追加した。
          } else {

            if ( is_null($old_path_02) == true ) {
              $path_02 = Storage::disk('s3')->putFile('/post_image_02',$imagefile_02, 'public');
            } else {
              Storage::disk('s3')->delete($old_path_02, 'public');
              $path_02 = Storage::disk('s3')->putFile('/post_image_02',$imagefile_02, 'public');
            }

          }

          // もしimg_03がnullだったら => 画像を削除した
          if ( is_null($imagefile_03) == true ) {

            Storage::disk('s3')->delete($old_path_03, 'public');
            $path_03 = $imagefile_03;

            // 画像を変更した or 画像を追加した。
          } else {

            if ( is_null($old_path_03) == true ) {
              $path_03 = Storage::disk('s3')->putFile('/post_image_03',$imagefile_03, 'public');
            } else {
              Storage::disk('s3')->delete($old_path_03, 'public');
              $path_03 = Storage::disk('s3')->putFile('/post_image_03',$imagefile_03, 'public');
            }

          }


        }


        $id = $post_data['id'];
        $user_id = $post_data['user_id'];
        $pro_name = $post_data['pro_name'];
        $flavor = $post_data['flavor'];
        $weight = $post_data['weight'];
        $price = $post_data['price'];
        $per_protein = $post_data['per_protein'];
        $taste_good = $post_data['taste_good'];
        $cost_paf = $post_data['cost_paf'];
        $recomend = $post_data['recomend'];
        $melt = $post_data['melt'];
        $foam = $post_data['foam'];
        $total = round(( $taste_good + $cost_paf + $recomend + $melt + $foam ) / 5);
        $how_to_buy = $post_data['how_to_buy'];
        $how_to_drink = $post_data['how_to_drink'];
        $comment = $post_data['comment'];

        if ( is_null($weight) == false && is_null($price) == false ) {
          $per_price = round($price / $weight);
        } else {
          $per_price = null;
        }


        if (isset($post_data['made']) == true) {
          $made = $post_data['made'];
        } else {
          $made = 2;
        }

        if (isset($post_data['type']) == true) {
          $type = $post_data['type'];
        } else {
          $type = 4;
        }


        $post->id = $id;
        $post->user_id = $user_id;
        $post->img_01 = $path_01;
        $post->img_02 = $path_02;
        $post->img_03 = $path_03;
        $post->pro_name = $pro_name;
        $post->flavor = $flavor;
        $post->weight = $weight;
        $post->price = $price;
        $post->per_price = $per_price;
        $post->per_protein = $per_protein;
        $post->made = $made;
        $post->type = $type;
        $post->taste_good = $taste_good;
        $post->cost_paf = $cost_paf;
        $post->recomend = $recomend;
        $post->melt = $melt;
        $post->foam = $foam;
        $post->total = $total;
        $post->how_to_buy = $how_to_buy;
        $post->how_to_drink = $how_to_drink;
        $post->comment = $comment;

        $post->save();

        // $request->session()->regenerateToken();

        return redirect('post/index');
    }


    public function destroy(Request $request) {
      $post = Post::find($request->id);

      Storage::disk('s3')->delete($post->img_01, 'public');

      if (is_null($post->img_02) == false ) {
        Storage::disk('s3')->delete($post->img_02, 'public');
      }
      if (is_null($post->img_03) == false ) {
        Storage::disk('s3')->delete($post->img_03, 'public');
      }
      $post->delete();

      return redirect('post/index');
  }




    public function store(StorePostForm $request) {
      $post = new Post;

      $post_data = $request->except('image_01', 'image_02', 'image_03');
      $imagefile_01 = $request->file('image_01');
      $imagefile_02 = $request->file('image_02');
      $imagefile_03 = $request->file('image_03');

      $path_01 = Storage::disk('s3')->putFile('/post_image_01',$imagefile_01, 'public');

      if (is_null($imagefile_02) == true) {
        $path_02 = $imagefile_02;
      } else {
        $path_02 = Storage::disk('s3')->putFile('/post_image_02',$imagefile_02, 'public');
      }

      if (is_null($imagefile_03) == true) {
        $path_03 = $imagefile_03;
      } else {
        $path_03 = Storage::disk('s3')->putFile('/post_image_03',$imagefile_03, 'public');
      }


      $user_id = $post_data['user_id'];
      $pro_name = $post_data['pro_name'];
      $flavor = $post_data['flavor'];
      $weight = $post_data['weight'];
      $price = $post_data['price'];
      $per_protein = $post_data['per_protein'];
      $taste_good = $post_data['taste_good'];
      $cost_paf = $post_data['cost_paf'];
      $recomend = $post_data['recomend'];
      $melt = $post_data['melt'];
      $foam = $post_data['foam'];
      $total = round(( $taste_good + $cost_paf + $recomend + $melt + $foam ) / 5);
      $how_to_buy = $post_data['how_to_buy'];
      $how_to_drink = $post_data['how_to_drink'];
      $comment = $post_data['comment'];

      if ( is_null($weight) == false && is_null($price) == false ) {
        $per_price = round($price / $weight);
      } else {
        $per_price = null;
      }

      if (isset($post_data['made']) == true) {
        $made = $post_data['made'];
      } else {
        $made = 2;
      }

      if (isset($post_data['type']) == true) {
        $type = $post_data['type'];
      } else {
        $type = 4;
      }

      $post->user_id = $user_id;
      $post->img_01 = $path_01;
      $post->img_02 = $path_02;
      $post->img_03 = $path_03;
      $post->pro_name = $pro_name;
      $post->flavor = $flavor;
      $post->weight = $weight;
      $post->price = $price;
      $post->per_price = $per_price;
      $post->per_protein = $per_protein;
      $post->made = $made;
      $post->type = $type;
      $post->taste_good = $taste_good;
      $post->cost_paf = $cost_paf;
      $post->recomend = $recomend;
      $post->melt = $melt;
      $post->foam = $foam;
      $post->total = $total;
      $post->how_to_buy = $how_to_buy;
      $post->how_to_drink = $how_to_drink;
      $post->comment = $comment;

      $post->save();

      return redirect('/');
      // return view('post.store', compact('data') );

    }
}
