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
   <div class = "row my-4">
    <div class = "col-6">
     <div class="card mx-auto">
       <div class="card-header">
         お知らせ
       </div>
       <div class="card-body">
          <p>20/08/22　テスト版</p>
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
 
  {{-- 大分類登録ページへのリンク --}}
   <td>{!! link_to_route('classifications.create', '大分類登録ページ', []) !!}</td>
  {{-- 中分類登録ページへのリンク --}}
   <td>{!! link_to_route('species.create', '中分類登録ページ', []) !!}</td>
  {{-- 小分類登録ページへのリンク --}}
   <td>{!! link_to_route('breeds.create', '小分類登録ページ', []) !!}</td>
    
@endsection