@extends('layouts.app')

@section('content')
{{--ユーザー情報を表示--}}
    <div class="card my-2">
        <div class="row">
            <img class="col-sm-1 mr-2 rounded" src="{{ $user->url }}" alt="">
            <div class = "col-4">
                <h3>{{ $user->name }}さんのお家</h3>
            </div>
            <div class = "col-5">
                <br>
                {{ $user->introduction }} <!-- usersのintroduction -->
            </div>
            <div class = "col-1">
@if (Auth::id() == $pet->user_id)
                {{-- 編集ページへのリンク --}}
                {!! link_to_route('users.edit', '編集', ['user' => $user->id], ['class' => 'btn btn-light']) !!}
@endif
            </div>
        </div>
    </div>


<div class="card my-2" style="background-color: #d1ecf1";>
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    {{-- ペットのメイン写真を表示 --}}
                    <img class="rounded img-fluid" src="{{ $pet->main_URL }}" alt="">
                </div>
            </div>
        </aside>
    
        <div class="col-sm-8">
            <div class = "row">
                <h1>{{ $pet->name }} ちゃん</h1>
                
                {{-- jsテスト --}}
                 <div class = "test" id = "target">
                     1
                 </div>
                {{-- 可愛いねボタン--}}
               
                {!! Form::model($pet, ['route' => ['pets.update', $pet->id], 'method' => 'put']) !!}
                {!! Form::submit('かわいい', ['class' => 'btn btn-primary']) !!} 
                {!! Form::close() !!}  
                @if (Auth::id() == $pet->user_id)
                {{-- 編集ページへのリンク --}}
                {!! link_to_route('pets.edit', '編集', ['pet' => $pet->id], ['class' => 'btn btn-light']) !!}
                @endif        
            </div>
        
            {{-- 投稿内容 --}}
            <p class="mb-0">お誕生日：{!! nl2br(e($pet->birthday)) !!}</p>
            <p class="mb-0">種類：{!! nl2br(e($breed->name)) !!}</p> 
            <p class="mb-0">性別：{!! nl2br(e($pet->sex)) !!}</p>
            <p class="mb-0">アピールポイント：{!! nl2br(e($pet->introduction)) !!}</p>
            <p class="mb-0">♡：{!! nl2br(e($pet->cute_count)) !!}</p>
        </div>
    </div>
    {{-- ペットのサブ写真を表示 --}}
    <div>
        <div class = "row my-2 mx-2"> 
            <?php $count = 0; ?>
            @foreach ($photos as $photo)
            <?php $count++; ?>
            <div class = "card col-3" style =" position: relative;"> 
                <img class="rounded img-fluid my-1" src= "{{$photo -> URL }}" alt="">
                <div >
                    {{$photo -> introduction1}}
                </div>
                <br><br>
                <div class = "row py-1" style = "bottom: 0;  position: absolute;">
                    @if (Auth::id() == $pet->user_id)
                    　  {{-- 投稿編集ボタンのフォーム --}}
                    {!! link_to_route('photos.edit', "編集", ['photo' => $photo -> id], ['class' => 'btn btn-primary btn-sm']) !!}
                    　　　
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['photos.destroy', $photo -> id], 'method' => 'delete' , 'onsubmit' => 'return confirm("写真が削除されます。よろしいですか?");']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
            @endforeach
            
            @while($count < 4)
            
            <?php $count++; ?>
            {{-- 追加ページへのリンク --}}  
            <div class = "card col-3">
                <img class="rounded img-fluid my-1" src= "https://3.bp.blogspot.com/-QW0M1GOm1Ig/UNQkKtfbO7I/AAAAAAAAI2s/xEUVkCRRx_Q/s1600/mark_nikukyu.png" alt="">
                　　@if (Auth::id() == $pet->user_id)
                　　　　　{!! link_to_route('photos.create', '写真追加', ['id' => $pet -> id], ['class' => 'btn btn-secondary']) !!}
                @endif 
            </div>
            @endwhile
        </div>
    </div>
</div>
@endsection