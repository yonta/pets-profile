<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classification;

class ClassificationsController extends Controller
{
     //新規ペット登録
    public function create()
    {
        $classifications = new Classification;
        
        // メッセージ作成ビューを表示
        return view('classifications.create', [
            'classifications' => $classifications,
        ]);
    }

    public function store(Request $request)
    {
        $classifications = new Classification;
        
        $classifications->create([
          'name' => $request->name,
       ]);

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
