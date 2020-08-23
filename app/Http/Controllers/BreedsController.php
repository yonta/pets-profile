<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breed;
use App\Specie;

class BreedsController extends Controller
{
    public function show($id) //ペットのBreed_id
    {
        // idの値でメッセージを検索して取得
        $breed =Breed::findOrFail($id);
        
             // メッセージ詳細ビューでそれを表示
            return view('breeds.show', [
                'breed' => $breed,
            ]);
    
    }
    
     //新規小分類
    public function create()
    {
        $breed = new Breed;
        $species = Specie::get();
         
        // メッセージ作成ビューを表示
        return view('breeds.create', [
            'breeds' => $breed,
            'species' => $species,
        ]);
    }

    public function store(Request $request)
    {
        $breed = new Breed;
        
        $breed->create([
          'name' => $request->name,
          'species_id'=> $request->specie,
       ]);

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
}
