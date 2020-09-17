<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
      // $this->middleware('auth');
      $this->middleware('verified');
    }
    //userデータの取得
    public function index() {
        return view('user.index', ['user' => Auth::user() ]);
    }
    //userデータの編集
    public function edit() {
        return view('user.edit', ['user' => Auth::user() ]);
    }
    //userデータの保存
    public function update(Request $request) {
        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        // dd($user_form);
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('user/index');
    }

    public function show() {
        return view('user.delete_account', ['user' => Auth::user() ]);
    }

    public function destroy() {
      $user = Auth::user();

      Auth::logout(); // ログアウト、update処理が行われる。
      $user->delete(); // ユーザが削除される。

      return redirect('/');
  }
}
