<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    //
    public function index(Request $request, $id, Post $item)
    {
      $items = Post::find($id);
      return view('product.detail', compact('items'));
    }

}
