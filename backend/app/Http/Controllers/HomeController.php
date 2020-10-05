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

    public function index(Request $request) {
        $values = DB::table('users')
        ->get();
        $items = Post::with('user')
        ->orderBy('updated_at', 'desc')
        ->paginate(10);

        $id = 0;
        $result = 0;


        $date = $request->date;
        $search = $request->search;
        $total = $request->total;
        $taste = $request->taste;
        $cost = $request->cost;
        $recomend = $request->recomend;
        $melt = $request->melt;
        $foam = $request->foam;
        $price = $request->price;
        $type = $request->type;
        $made = $request->made;

        if( is_null($date) == false ) {
          if ( ($date == 0)) {
            $items = DB::table('posts')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
            $id = 0;
            $result = $date;
          } else {
            $items = DB::table('posts')
            ->orderBy('updated_at', 'asc')
            ->paginate(10);
            $id = 0;
            $result = $date;
          }
        }

        if( is_null($search) == false ) {
          $items = DB::table('posts')
          ->where('pro_name', 'like', '%'.$search.'%')
          ->orwhere('flavor', 'like', '%'.$search.'%')
          ->orderBy('updated_at', 'desc')
          ->paginate(10);
          $id = 1;
          $result = $search;
        }

        if( is_null($total) == false ) {
          if ( ($total == 0)) {
            $items = DB::table('posts')
            ->orderBy('total', 'desc')
            ->paginate(10);
            $id = 2;
            $result = $total;
          } else {
            $items = DB::table('posts')
            ->orderBy('total', 'asc')
            ->paginate(10);
            $id = 2;
            $result = $total;
          }
        }

        if( is_null($taste) == false ) {
          if ( ($taste == 0)) {
            $items = DB::table('posts')
            ->orderBy('taste_good', 'desc')
            ->paginate(10);
            $id = 3;
            $result = $taste;
          } else {
            $items = DB::table('posts')
            ->orderBy('taste_good', 'asc')
            ->paginate(10);
            $id = 3;
            $result = $taste;
          }
        }

        if( is_null($cost) == false ) {
          if ( ($cost == 0)) {
            $items = DB::table('posts')
            ->orderBy('cost_paf', 'desc')
            ->paginate(10);
            $id = 4;
            $result = $cost;
          } else {
            $items = DB::table('posts')
            ->orderBy('cost_paf', 'asc')
            ->paginate(10);
            $id = 4;
            $result = $cost;
          }
        }

        if( is_null($recomend) == false ) {
          if ( ($recomend == 0)) {
            $items = DB::table('posts')
            ->orderBy('recomend', 'desc')
            ->paginate(10);
            $id = 5;
            $result = $recomend;
          } else {
            $items = DB::table('posts')
            ->orderBy('recomend', 'asc')
            ->paginate(10);
            $id = 5;
            $result = $recomend;
          }
        }

        if( is_null($melt) == false ) {
          if ( ($melt == 0)) {
            $items = DB::table('posts')
            ->orderBy('melt', 'desc')
            ->paginate(10);
            $id = 6;
            $result = $melt;
          } else {
            $items = DB::table('posts')
            ->orderBy('melt', 'asc')
            ->paginate(10);
            $id = 6;
            $result = $melt;
          }
        }

        if( is_null($foam) == false ) {
          if ( ($foam == 0)) {
            $items = DB::table('posts')
            ->orderBy('foam', 'desc')
            ->paginate(10);
            $id = 7;
            $result = $foam;
          } else {
            $items = DB::table('posts')
            ->orderBy('foam', 'asc')
            ->paginate(10);
            $id = 7;
            $result = $foam;
          }
        }

        if( is_null($price) == false ) {
          if ( ($price == 0)) {
            $items = DB::table('posts')
            ->whereNotNull('price')
            ->orderBy('price', 'asc')
            ->paginate(10);
            $id = 8;
            $result = $price;
          } else {
            $items = DB::table('posts')
            ->whereNotNull('price')
            ->orderBy('price', 'asc')
            ->paginate(10);
            $id = 8;
            $result = $price;
          }
        }

        if( is_null($type) == false ) {

          if ( ($type == 0) ) {
            $items = DB::table('posts')
            ->where('type', 0)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
            $id = 9;
            $result = $type;
          }
          if ( ($type == 1) ) {
            $items = DB::table('posts')
            ->where('type', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
            $id = 9;
            $result = $type;
          }
          if ( ($type == 2) ) {
            $items = DB::table('posts')
            ->where('type', 2)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
            $id = 9;
            $result = $type;
          }
          if ( ($type == 3) ) {
            $items = DB::table('posts')
            ->where('type', 3)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
            $id = 9;
            $result = $type;
          }


        }

        if( is_null($made) == false ) {
          if ( ($made == 0)) {
            $items = DB::table('posts')
            ->where('made', 0)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
            $id = 10;
            $result = $made;
          } else {
            $items = DB::table('posts')
            ->where('made', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
            $id = 10;
            $result = $made;
          }
        }

        return view('home',compact('values', 'items', 'id', 'result'));
    }

}
