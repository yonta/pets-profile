<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Pet;


class PhotosController extends Controller
{
     public function index()
    {
        $data = [];

            // ペットを取得
            $photos = $pets-> photos()->get();

            $data = [
                'pets' => $pets,
                'photos' => $photos,
            ];
        

        // Welcomeビューでそれらを表示
       // return view('welcome', $data);
        return view('pets.show', $data);
    }
    
    
    //idでアクセスされた場合の写真
    public function show($id)
    {
        //idの値でペットを検索して表示
        $photo = Photo::findOrFail($id);
        
        //ペット詳細ビューで表示
        return view('pets.show', [
            'photo' => $photo,
        ]);
    }
    

     //新規ペット登録
    public function create($id)
    {
        $photos = new Photo;
                // idの値でペットを検索して取得
      
        
        return view('photos.create', [
            'photos' => $photos,
          'id'=>$id,
        ]);
    }

    public function store(Request $request, $id)
    {
      //idの値でペットを検索して表示
      $pet = Pet::findOrFail($id);
        
      $pet->photos()->create([
    //  $request->pet()->photos()->create([
        'URL' => $request->URL,
        'introduction1' => $request->introduction1,
        'introduction2' => '',
       ]);
       
        

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
      // getでpets/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でペットを検索して取得
        $photo = Photo::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('photos.edit', [
            'photo' => $photo,
        ]);
    }
    
    // putまたはpatchでpets/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // idの値で写真を検索して取得
        $photo = Photo::findOrFail($id);
        
             // ペットの情報を更新する時
            $photo->URL = $request->URL;
            $photo->introduction1 = $request->introduction1;
   
        $photo->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}