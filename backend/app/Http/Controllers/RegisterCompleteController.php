<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterCompleteController extends Controller
{
    //
    public function __construct() {
      $this->middleware('auth');
    }

    public function index()
    {
      return view('register_complete');
    }
}
