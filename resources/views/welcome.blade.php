          <?php
      
           use App\Pet;
            $pets = Pet::orderBy('created_at', 'desc')->paginate(10);
           
          ?>

@extends('layouts.app')

@section('content')
 
  <div class="card">
        <img class="card-img" src="https://pbs.twimg.com/media/EgBNK8nUwAEkiCq?format=jpg&name=medium" alt="健やかな文鳥">
         <div class="card-img-overlay" style="
             padding: 0;
             top: calc(50% - 0.5rem);
             text-align: center;
             font-weight: bold;">
              <h1><p class="text-white">チュン！！！</p></h1> 
         </div>
   </div>
<div class="alert alert-danger col-8 offset-sm-2 my-2" role="alert">
  小さい画面で見るとレイアウトが著しく崩れます
</div>
   <div class = "row my-4">
    <div class = "col-6">
     <div class="card mx-auto">
       <div class="card-header">
         お知らせ
       </div>
       <div class="card-body">
          <p>20/08/19　テスト版</p>
          <p>20/08/20　他人がユーザー情報を編集できないよう修正しました</p>
          <p>20/08/20　分類登録ページへのリンクを調整しました</p>
          <p>20/08/20　他人がペット情報を編集できないよう修正しました</p>
          <p>20/08/21　分類のテキストを必須入力にしました</p>
          <p>20/08/21　フッターの位置を修正しました</p>
          <p>20/08/21　ゲストユーザーがページを閲覧できるようにしました</p>
       </div>
      </div>
    </div>
    
      <div class = "col-6">
    <div class="card mx-auto">
      <div class="card-header">
        最近の登録
      </div>
      <div class="card-body">
          @foreach ($pets as $pet)
          <p>{{ substr($pet->created_at,0, 10)}} : {{ $pet->name}}ちゃんの情報が登録されました。</p>
        　@endforeach
      </div>
    </div>
    </div>
 </div>
 
@endsection