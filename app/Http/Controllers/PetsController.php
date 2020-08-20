<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet; // 追加


class PetsController extends Controller
{
     public function index()
    {
        $data = [];
        
        if (\Auth::check()) { // 認証済みの場合
        
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ペットを取得
            $pets = $user-> pets()->get();

            $data = [
                'user' => $user,
                'pets' => $pets,
            ];
        }

        // Welcomeビューでそれらを表示
       // return view('welcome', $data);
        return view('users.show', $data);
    }
    
    
    //idでアクセスされた場合のペット取得
    public function show($id)
    {
        //idの値でペットを検索して表示
        $pet = Pet::findOrFail($id);
        
            $photos = $pet->photos()->get();
            
        //ペット詳細ビューで表示
        return view('pets.show', [
            'pet' => $pet,
            'photos' => $photos,
        ]);
    }
    
    //新規ペット登録
    public function create()
    {
        $pets = new Pet;

        // メッセージ作成ビューを表示
        return view('pets.create', [
            'pets' => $pets,
        ]);
    }

    public function store(Request $request)
    {
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
      $request->user()->pets()->create([
          'name' => $request->name,
        'birthday' => $request->birthday,
        'sex' => $request->sex,
        'breed_id' => $request->breed_id,
        'introduction' => $request->introduction,
         'cute_count' => 0,
       ]);

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    // getでpets/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でペットを検索して取得
        $pet = Pet::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('pets.edit', [
            'pet' => $pet,
        ]);
    }
    
    // putまたはpatchでpets/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // idの値でペットを検索して取得
        $pet = Pet::findOrFail($id);
        
        if($request->name == null)
        {
            //いいね押された時
            $pet->cute_count = $pet->cute_count +1;
        }
        else
        {
             // ペットの情報を更新する時
            $pet->name = $request->name;
            $pet->birthday = $request->birthday;
            $pet->sex = $request->sex;
            $pet->introduction = $request->introduction;
        }
              
        $pet->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    //可愛いねボタンカウント用
    public function cute_count(Request $request, $id)
    {
        // idの値でペットを検索して取得
        $pet = Pet::findOrFail($id);
        
        //可愛いね数１追加
        $pet->cute_count = ($request->cute_count)+1;
            $pet->save();

        // トップページへリダイレクトさせる
        return redirect('/');
        
    }
}
