<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specie;
use App\Classification;

class Speciescontroller extends Controller
{
      //新規小分類
    public function create()
    {
        $specie = new Specie;
        $classifications = Classification::get();
           
           
        // メッセージ作成ビューを表示
        return view('species.create', [
            'species' => $specie,
            'classifications' => $classifications,
        ]);
    }

    public function store(Request $request)
    {
        $specie = new Specie;
     
        
        $specie->create([
          'name' => $request->name,
          'classification_id'=> $request->classification,
       ]);

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
