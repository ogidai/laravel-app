<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePostForm;

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

    public function show(Request $request)
    {
      $values = $request->all();
      return view('post.show', compact('values'));
    }
}
