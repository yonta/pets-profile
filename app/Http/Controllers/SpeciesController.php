<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PetsController,
    Session;
    
use Illuminate\Http\Request;
use App\Specie;
use App\Classification;

class Speciescontroller extends Controller
{
      //新規小分類
    public function create()
    {
         // IDを取得する
        $id = Session::get('pet_id');
        
        $specie = new Specie;
        $classifications = Classification::get();
           
           
        // メッセージ作成ビューを表示
        return view('species.create', [
            'species' => $specie,
            'classifications' => $classifications,
            'pet_id'=> $id,
        ]);
    }

    public function store(Request $request)
    {
        $specie = new Specie;
     
        
        $specie->create([
          'name' => $request->name,
          'classification_id'=> $request->classification,
       ]);

        return redirect()->route('breeds.create');
    }
}
