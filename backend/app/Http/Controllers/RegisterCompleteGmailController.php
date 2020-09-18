<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterCompleteGmailController extends Controller
{
    //
    public function __construct() {
      $this->middleware('auth');
    }

    public function index()
    {
      return view('register_complete_gmail');
    }
}
