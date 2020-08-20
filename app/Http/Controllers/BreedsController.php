<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
