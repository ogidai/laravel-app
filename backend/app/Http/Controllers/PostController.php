<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePostForm;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function __construct() {
      // $this->middleware('auth');
      $this->middleware('verified');
    }

    public function index()
    {
      return view('post.index');
    }

    public function show(StorePostForm $request)
    {
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

      // $temp_path_02 = $imagefile_02->store('public/temp');
      // $temp_path_03 = $imagefile_03->store('public/temp');

      $user_id = $post_data['pro_name'];
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

      $data = array(
        'user_id' => $user_id,
        'temp_path_01' => $temp_path_01,
        'temp_path_02' => $temp_path_02,
        'temp_path_03' => $temp_path_03,
        'read_temp_path_01' => $read_temp_path_01,
        'read_temp_path_02' => $read_temp_path_02,
        'read_temp_path_03' => $read_temp_path_03,
        'pro_name' => $pro_name,
        'flavor' => $flavor,
        'weight' => $weight,
        'price' => $price,
        'per_protein' => $per_protein,
        'made' => $made,
        'type' => $type,
        'taste_good' => $taste_good,
        'cost_paf' => $cost_paf,
        'recomend' => $recomend,
        'how_to_buy' => $how_to_buy,
        'how_to_drink' => $how_to_drink,
        'comment' => $comment,
      );
      $request->session()->put('data', $data);

      return view('post.show', compact('data') );

    }
}
