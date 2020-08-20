<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加


class UsersController extends Controller
{
      public function index()
    {
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
       public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
        ]);
    }
    
    // getでusers/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $user = User::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    // putまたはpatchでusers/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
         // バリデーション
        $request->validate([
            'name' => 'required|max:10',
            'introduction' => 'required|max:30',
        ]);
        
             if (\Auth::check()) { // 認証済みの場合
                    \Auth::user()->name = $request->name;
                    \Auth::user()->introduction = $request->introduction;
                    \Auth::user()->url = $request->url;
                    
                    
                    \Auth::user()->save();
                }
        
        
        
        

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
