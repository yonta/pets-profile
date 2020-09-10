<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PetsController,
    Session;
    
use Illuminate\Http\Request;
use App\Classification;

class ClassificationsController extends Controller
{
     //新規ペット登録
    public function create()
    {
         // IDを取得する
        $id = Session::get('pet_id');
        
        $classifications = new Classification;
        
        // メッセージ作成ビューを表示
        return view('classifications.create', [
            'classifications' => $classifications,
            'pet_id'=> $id,
        ]);
    }

    public function store(Request $request)
    {
        $classifications = new Classification;
        
        $classifications->create([
          'name' => $request->name,
       ]);

        return redirect()->route('species.create');
    }
}
