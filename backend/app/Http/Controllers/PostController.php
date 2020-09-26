<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePostForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function __construct() {
      // $this->middleware('auth');
      $this->middleware('verified');
    }

    public function index() {
      $authUser = Auth::user()->id;
      $items = Post::with('user')->where('user_id', $authUser)->get();
      // dd($items);
      return view('post.index', compact('items'));
    }

    public function show(Request $request, $id, Post $item) {
    	$items = Post::find($id);

    	return view('post.show', compact('items'));
    }

    public function create()  {
      return view('post.create');
    }

    public function edit(Request $request)  {
      $items = Post::find($request->id);
      return view('post.edit', compact('items'));
    }

    public function update(StorePostForm $request, $id) {
        $post = new Post;

        $post = Post::find($id);

        $post_data = $request->except('image_01', 'image_02', 'image_03');
        unset($post_data['_token']);

        $imagefile_01 = $request->file('image_01');
        $imagefile_02 = $request->file('image_02');
        $imagefile_03 = $request->file('image_03');

        // dd($request->submit);
        $img_old_path_01 = $post->temp_path_01;
        $img_old_path_02 = $post->temp_path_02;
        $img_old_path_03 = $post->temp_path_03;

        if ( empty($imagefile_01) == true ) {
          $temp_path_01 = $img_old_path_01;
          $read_temp_path_01 = str_replace('public/', 'storage/', $temp_path_01);
        } else {
          $temp_path_01 = $imagefile_01->store('public/temp');
          $read_temp_path_01 = str_replace('public/', 'storage/', $temp_path_01);
        }


        if ($request->submit == 'submit') {

          if( empty($img_old_path_02) == true ) {
              $temp_path_02 = $imagefile_02;
              $read_temp_path_02 = $temp_path_02;
            } else {
              $temp_path_02 = $img_old_path_02;
              $read_temp_path_02 = str_replace('public/', 'storage/', $temp_path_02);
            }
          if( empty($img_old_path_03) == true ) {
              $temp_path_03 = $imagefile_03;
              $read_temp_path_03 = $temp_path_03;
            } else {
              $temp_path_03 = $img_old_path_03;
              $read_temp_path_03 = str_replace('public/', 'storage/', $temp_path_03);
            }

        }


        if ($request->submit == 'img_changed_02') {

          if ( empty($imagefile_02) == true ) {
            $temp_path_02 = $imagefile_02;
            $read_temp_path_02 = $temp_path_02;
          } else {
            $temp_path_02 = $imagefile_02->store('public/temp');
            $read_temp_path_02 = str_replace('public/', 'storage/', $temp_path_02);
          }

        }
        else {

          if( empty($img_old_path_02) == true ) {
            $temp_path_02 = $imagefile_02;
            $read_temp_path_02 = $temp_path_02;
          } else {
            $temp_path_02 = $img_old_path_02;
            $read_temp_path_02 = str_replace('public/', 'storage/', $temp_path_02);
          }

        }

        // if ( empty($imagefile_02) == true ) {
        //
        //   if( empty($img_old_path_02) == true ) {
        //     $temp_path_02 = $img_old_path_02;
        //     $read_temp_path_02 = str_replace('public/', 'storage/', $temp_path_02);
        //   }
        //   if( empty($img_old_path_02) != true ){
        //     $temp_path_02 = $imagefile_02;
        //     $read_temp_path_02 = $temp_path_02;
        //   }
        //
        // } else {
        //   $temp_path_02 = $imagefile_02->store('public/temp');
        //   $read_temp_path_02 = str_replace('public/', 'storage/', $temp_path_02);
        // }

        if ($request->submit == 'img_changed_03') {

          if ( empty($imagefile_03) == true ) {
            $temp_path_03 = $imagefile_03;
            $read_temp_path_03 = $temp_path_03;
          } else {
            $temp_path_03 = $imagefile_03->store('public/temp');
            $read_temp_path_03 = str_replace('public/', 'storage/', $temp_path_03);
          }

        }
        else {

            if( empty($img_old_path_03) == true ) {
              $temp_path_03 = $imagefile_03;
              $read_temp_path_03 = $temp_path_03;
            } else {
              $temp_path_03 = $img_old_path_03;
              $read_temp_path_03 = str_replace('public/', 'storage/', $temp_path_03);
            }

        }

        // if ( empty($imagefile_03) == true ) {
        //
        //   if( empty($img_old_path_03) == true ) {
        //     $temp_path_03 = $img_old_path_03;
        //     $read_temp_path_03 = str_replace('public/', 'storage/', $temp_path_03);
        //   } else {
        //     $temp_path_03 = $imagefile_03;
        //     $read_temp_path_03 = $temp_path_03;
        //   }
        // } else {
        //   $temp_path_03 = $imagefile_03->store('public/temp');
        //   $read_temp_path_03 = str_replace('public/', 'storage/', $temp_path_03);
        // }


        if ($request->submit == 'img_changed') {

          if ( empty($imagefile_02) == true ) {
            $temp_path_02 = $imagefile_02;
            $read_temp_path_02 = $temp_path_02;
          } else {
            $temp_path_02 = $imagefile_02->store('public/temp');
            $read_temp_path_02 = str_replace('public/', 'storage/', $temp_path_02);
          }

          if ( empty($imagefile_03) == true ) {
            $temp_path_03 = $imagefile_03;
            $read_temp_path_03 = $temp_path_03;
          } else {
            $temp_path_03 = $imagefile_03->store('public/temp');
            $read_temp_path_03 = str_replace('public/', 'storage/', $temp_path_03);
          }


        }


        $id = $post_data['id'];
        $user_id = $post_data['user_id'];
        $pro_name = $post_data['pro_name'];
        $flavor = $post_data['flavor'];
        $weight = $post_data['weight'];
        $price = $post_data['price'];
        $per_protein = $post_data['per_protein'];
        $made = $post_data['made'];
        $type = $post_data['type'];
        $taste_good = $post_data['taste_good'];
        $cost_paf = $post_data['cost_paf'];
        $recomend = $post_data['recomend'];
        $how_to_buy = $post_data['how_to_buy'];
        $how_to_drink = $post_data['how_to_drink'];
        $comment = $post_data['comment'];

        $post->id = $id;
        $post->user_id = $user_id;
        $post->temp_path_01 = $temp_path_01;
        $post->temp_path_02 = $temp_path_02;
        $post->temp_path_03 = $temp_path_03;
        $post->read_temp_path_01 = $read_temp_path_01;
        $post->read_temp_path_02 = $read_temp_path_02;
        $post->read_temp_path_03 = $read_temp_path_03;
        $post->pro_name = $pro_name;
        $post->flavor = $flavor;
        $post->weight = $weight;
        $post->price = $price;
        $post->per_protein = $per_protein;
        $post->made = $made;
        $post->type = $type;
        $post->taste_good = $taste_good;
        $post->cost_paf = $cost_paf;
        $post->recomend = $recomend;
        $post->how_to_buy = $how_to_buy;
        $post->how_to_drink = $how_to_drink;
        $post->comment = $comment;

        //保存
        $post->save();
        // $post_old->fill($post)->save();
        // $data->fill($post_old)->update();
        //リダイレクト
        return redirect('post/index');
    }


    public function destroy(Request $request) {
      $post = Post::find($request->id);
      $post->delete();

      return redirect('post/index');
  }


    public function store(StorePostForm $request)
    {
      $post = new Post;

      $post_data = $request->except('image_01', 'image_02', 'image_03');
      $imagefile_01 = $request->file('image_01');
      $imagefile_02 = $request->file('image_02');
      $imagefile_03 = $request->file('image_03');

      $temp_path_01 = $imagefile_01->store('public/temp');
      $read_temp_path_01 = str_replace('public/', 'storage/', $temp_path_01);

      if (empty($imagefile_02) == true) {
        $temp_path_02 = $imagefile_02;
        $read_temp_path_02 = $temp_path_02;
      } else {
        $temp_path_02 = $imagefile_02->store('public/temp');
        $read_temp_path_02 = str_replace('public/', 'storage/', $temp_path_02);
      }

      if (empty($imagefile_03) == true) {
        $temp_path_03 = $imagefile_03;
        $read_temp_path_03 = $temp_path_03;
      } else {
        $temp_path_03 = $imagefile_03->store('public/temp');
        $read_temp_path_03 = str_replace('public/', 'storage/', $temp_path_03);
      }

      $user_id = $post_data['user_id'];
      $pro_name = $post_data['pro_name'];
      $flavor = $post_data['flavor'];
      $weight = $post_data['weight'];
      $price = $post_data['price'];
      $per_protein = $post_data['per_protein'];
      $made = $post_data['made'];
      $type = $post_data['type'];
      $taste_good = $post_data['taste_good'];
      $cost_paf = $post_data['cost_paf'];
      $recomend = $post_data['recomend'];
      $how_to_buy = $post_data['how_to_buy'];
      $how_to_drink = $post_data['how_to_drink'];
      $comment = $post_data['comment'];

      $post->user_id = $user_id;
      $post->temp_path_01 = $temp_path_01;
      $post->temp_path_02 = $temp_path_02;
      $post->temp_path_03 = $temp_path_03;
      $post->read_temp_path_01 = $read_temp_path_01;
      $post->read_temp_path_02 = $read_temp_path_02;
      $post->read_temp_path_03 = $read_temp_path_03;
      $post->pro_name = $pro_name;
      $post->flavor = $flavor;
      $post->weight = $weight;
      $post->price = $price;
      $post->per_protein = $per_protein;
      $post->made = $made;
      $post->type = $type;
      $post->taste_good = $taste_good;
      $post->cost_paf = $cost_paf;
      $post->recomend = $recomend;
      $post->how_to_buy = $how_to_buy;
      $post->how_to_drink = $how_to_drink;
      $post->comment = $comment;
      // $data = array(
      //   'user_id' => $user_id,
      //   'temp_path_01' => $temp_path_01,
      //   'temp_path_02' => $temp_path_02,
      //   'temp_path_03' => $temp_path_03,
      //   'read_temp_path_01' => $read_temp_path_01,
      //   'read_temp_path_02' => $read_temp_path_02,
      //   'read_temp_path_03' => $read_temp_path_03,
      //   'pro_name' => $pro_name,
      //   'flavor' => $flavor,
      //   'weight' => $weight,
      //   'price' => $price,
      //   'per_protein' => $per_protein,
      //   'made' => $made,
      //   'type' => $type,
      //   'taste_good' => $taste_good,
      //   'cost_paf' => $cost_paf,
      //   'recomend' => $recomend,
      //   'how_to_buy' => $how_to_buy,
      //   'how_to_drink' => $how_to_drink,
      //   'comment' => $comment,
      // );
      // $request->session()->put('data', $data);

      $post->save();

      return redirect('/');
      // return view('post.store', compact('data') );

    }
}
