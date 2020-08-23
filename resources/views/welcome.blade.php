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
          <p>20/08/22　テスト版</p>
          <p>20/08/23　他人がユーザー情報を編集できないよう修正しました</p>
          <p>20/08/23　分類登録ページへのリンクを調整しました</p>
          <p>20/08/23　他人がペット情報を編集できないよう修正しました</p>
          <p>20/08/23　分類のテキストを必須入力にしました</p>
          <p>20/08/23　フッターの位置を修正しました</p>
          <p>20/08/23　ゲストユーザーがページを閲覧できるようにしました</p>
       </div>
      </div>
    </div>
    
      <div class = "col-6">
    <div class="card mx-auto">
      <div class="card-header">
        ここ何入れよう
      </div>
      <div class="card-body">
          <p>20/08/22　眠い</p>
      </div>
    </div>
    </div>
 </div>
 
@endsection