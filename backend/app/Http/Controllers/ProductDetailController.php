<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;
use Storage;


class ProductDetailController extends Controller
{
    //
    public function index(Request $request, $id, Post $item)
    {
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

      return view('product.detail', compact('items', 'path_01', 'path_02', 'path_03'));
    }

}
