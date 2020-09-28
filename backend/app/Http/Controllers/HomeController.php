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

    public function index(Request $request)
    {
        $values = DB::table('users')
        ->get();
        $items = Post::with('user')
        ->orderBy('updated_at', 'desc')
        ->get();

        $id = 100;

        $date = $request->date;
        $search = $request->search;
        $total = $request->total;
        $taste = $request->taste;
        $cost = $request->cost;
        $recomend = $request->recomend;
        $price = $request->price;
        $type = $request->type;
        $made = $request->made;

        if( is_null($date) == false ) {
          if ( ($date == 0)) {
            $items = DB::table('posts')
            ->orderBy('updated_at', 'desc')
            ->get();
            $id = 0;
          } else {
            $items = DB::table('posts')
            ->orderBy('updated_at', 'asc')
            ->get();
            $id = 0;
          }
        }

        // if( empty($) == false ) {
        //   if ( ($ == 0)) {
        //     $items = DB::table('posts')
        //     ->orderBy('updated_at', 'desc')
        //     ->get();
        //   } else {
        //     $items = DB::table('posts')
        //     ->orderBy('updated_at', 'asc')
        //     ->get();
        //   }
        // }

        if( is_null($taste) == false ) {
          if ( ($taste == 0)) {
            $items = DB::table('posts')
            ->orderBy('taste_good', 'desc')
            ->get();
            $id = 3;
          } else {
            $items = DB::table('posts')
            ->orderBy('taste_good', 'asc')
            ->get();
            $id = 3;
          }
        }

        if( is_null($cost) == false ) {
          if ( ($cost == 0)) {
            $items = DB::table('posts')
            ->orderBy('cost_paf', 'desc')
            ->get();
            $id = 4;
          } else {
            $items = DB::table('posts')
            ->orderBy('cost_paf', 'asc')
            ->get();
            $id = 4;
          }
        }

        if( is_null($recomend) == false ) {
          if ( ($recomend == 0)) {
            $items = DB::table('posts')
            ->orderBy('recomend', 'desc')
            ->get();
            $id = 5;
          } else {
            $items = DB::table('posts')
            ->orderBy('recomend', 'asc')
            ->get();
            $id = 5;
          }
        }

        if( is_null($price) == false ) {
          if ( ($price == 0)) {
            $items = DB::table('posts')
            ->whereNotNull('price')
            ->orderBy('price', 'asc')
            ->get();
            $id = 6;
          } else {
            $items = DB::table('posts')
            ->whereNotNull('price')
            ->orderBy('price', 'asc')
            ->get();
            $id = 6;
          }
        }

        if( is_null($type) == false ) {

          if ( ($type == 0) ) {
            $items = DB::table('posts')
            ->where('type', 0)
            ->orderBy('updated_at', 'desc')
            ->get();
            $id = 7;
          }
          if ( ($type == 1) ) {
            $items = DB::table('posts')
            ->where('type', 1)
            ->orderBy('updated_at', 'desc')
            ->get();
            $id = 7;
          }
          if ( ($type == 2) ) {
            $items = DB::table('posts')
            ->where('type', 2)
            ->orderBy('updated_at', 'desc')
            ->get();
            $id = 7;
          }
        }

        if( is_null($made) == false ) {
          if ( ($made == 0)) {
            $items = DB::table('posts')
            ->where('made', 0)
            ->orderBy('updated_at', 'desc')
            ->get();
            $id = 8;
          } else {
            $items = DB::table('posts')
            ->where('made', 1)
            ->orderBy('updated_at', 'desc')
            ->get();
            $id = 8;
          }
        }

        return view('home',compact('values', 'items', 'id'));
    }

}
