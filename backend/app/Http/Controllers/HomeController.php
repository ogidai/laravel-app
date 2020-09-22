<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChangePasswordForm() {

         return view('auth.changepassword');

     }

    public function changePassword(Request $request) {
      //現在のパスワードが正しいかを調べる
      if(!(Hash::check($request->get('current_password'), Auth::user()->password))) {
          return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
      }

      //現在のパスワードと新しいパスワードが違っているかを調べる
      if(strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
          return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
      }

      //パスワードのバリデーション。新しいパスワードは8文字以上、new_password_confirmationフィールドの値と一致しているかどうか。
      $validated_data = $request->validate([
          'current_password' => 'required',
          'new_password' => 'required|string|min:8|confirmed',
      ]);

      //パスワードを変更
      $user = Auth::user();
      $user->password = bcrypt($request->get('new_password'));
      $user->save();

      return redirect()->back()->with('change_password_success', 'パスワードを変更しました。');
    }

    public function index()
    {
        $values = DB::table('users')
        ->get();
        $items = Post::with('user')
        ->get();

        return view('home',compact('values', 'items'));

    }
}
