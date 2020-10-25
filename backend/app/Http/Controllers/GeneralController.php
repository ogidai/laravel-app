<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //
    public function showAboutPage()
    {
      return view('about');
    }

    public function showFaqPage()
    {
      return view('faq');
    }

    public function showContactPage()
    {
      return view('contact');
    }

    public function showPolicyPage()
    {
      return view('policy');
    }

    public function showPolicyConfirmPage()
    {
      return view('policy_confirm');
    }

    public function showSupportPage()
    {
      return view('support');
    }

    public function showSearchPage()
    {
      return view('search.top');
    }
}
