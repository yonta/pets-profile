<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PetsController,
    Session;

use Illuminate\Http\Request;
use App\Pet; // 追加
use App\Photo;
use App\User;
use App\Breed;
use App\Classification;
use App\Specie;


class PetsController extends Controller
{
     public function index()
    {
       
    }
    
       public function search($bunrui,$id)
    {
      $pets=[];
      $searching = "";
      
        if($bunrui == 'classification')
        {
            $breeds=[];
            $searching = Classification::findOrFail($id)->name;
            
            //中分類を取得->
            $sp = Specie::where('classification_id', '=', $id )->get();
            
            //小分類を取得
            foreach ($sp as $spe){
                $plusB =[];
                $plusB = Breed::where('species_id', '=', $spe->id )->get();
             
                 //ペットを取得
                 foreach ($plusB as $bre){
                    $pluspets =[];
                    $pluspets = Pet::where('breed_id', '=', $bre->id )->get();
                 
                    if(count($pluspets)!= 0){
                        foreach($pluspets as $plus){
                            $pets[] = $plus;
                        }
                    }
                }
            }
            
        }else if($bunrui == 'species'){
            
            $searching = Specie::findOrFail($id)->name;
            $br = Breed::where('species_id', '=', $id)->get();
            
            foreach ($br as $bre){
                 $pluspets =[];
                 $pluspets = Pet::where('breed_id', '=', $bre->id )->get();
                 
              if(count($pluspets)!= 0){
                    foreach($pluspets as $plus){
                            $pets[] = $plus;
                        }
              }
            }

              
        }else if($bunrui == 'breed'){
            
            $searching = Breed::findOrFail($id)->name;
            $pets = Pet::where('breed_id', '=', $id )->get();
        }

        return view('pets.index', [
            'pets' => $pets,
            'searching' => $searching,
        ]);
    }
    
    //idでアクセスされた場合のペット取得
    public function show($id)
    {
        
       // セッションIDの再発行
        Session::regenerate();

        // セッションの値を全て取得
        $data = Session::all();

         // ユーザー情報を保存する
        Session::put('pet_id', $id);
        
        //idの値でペットを検索して表示
        $pet = Pet::findOrFail($id);
        $user = User::findOrFail($pet->user_id);
        $photos = $pet->photos()->get();
        $breeds = Breed::findOrFail($pet->breed_id);
        
            
        //ペット詳細ビューで表示
        return view('pets.show', [
                'pet' => $pet,
                'photos' => $photos,
                'user' => $user,
                'breed' => $breeds,
                ]);
    }
    
    //新規ペット登録
    public function create()
    {
        $pets = new Pet;
        $breeds = Breed::get();
             
        // メッセージ作成ビューを表示
        return view('pets.create', [
            'pets' => $pets,
             'breeds' => $breeds,
        ]);
    }

    public function store(Request $request)
    {
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
          $request->user()->pets()->create([
          'name' => $request->name,
          'birthday' => $request->birthday,
          'sex' => $request->sex,
          'breed_id' => $request->breed,
          'introduction' => $request->introduction,
          'cute_count' => 0,
          'main_URL'=>$request->main_URL,
     
       ]);

        return redirect()->route('users.show', ['user' => \Auth::user()->id]);
    }
    
    // getでpets/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でペットを検索して取得
        $pet = Pet::findOrFail($id);
        $breeds = Breed::get();

        // メッセージ編集ビューでそれを表示
        return view('pets.edit', [
            'pet' => $pet,
                'breeds' => $breeds,
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
              $pet->save();
               // 前のURLへリダイレクトさせる
                return back();
        }
        else
        {
             // ペットの情報を更新する時
            $pet->name = $request->name;
            $pet->birthday = $request->birthday;
            $pet->sex = $request->sex;
            $pet->breed_id = $request->breed;
            $pet->introduction = $request->introduction;
            $pet->main_URL = $request->main_URL;
            
              $pet->save();

            return redirect()->route('pets.show', ['pet' => $id]);
        }
              

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
    
        public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $pet = Pet::findOrFail($id);
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
            if (\Auth::id() === $pet->user_id ){
           $pet->delete();
        }

        return redirect()->route('users.show', ['user' => \Auth::user()->id]);
    }
    
    
    //いいねJs
    public function iine(Request $request, $id){
        
        // idの値でペットを検索して取得
        $pet = Pet::findOrFail($id);
        
        //可愛いね数１追加
        $pet->cute_count = $pet->cute_count+1;
            $pet->save();

        // トップページへリダイレクトさせる
        return response()->json([
                'cute_count' => $pet->cute_count,
            ], 200); //200が正常
        
    }
}
