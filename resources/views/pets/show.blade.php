@extends('layouts.app')

@section('content')
{{--ユーザー情報を表示--}}
     @include('users.userhead')


<div class="card my-2" style="background-color: #d1ecf1";>
      <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <!--<div class="card-header"> -->
                <!--    <h3 class="card-title">{{ Auth::user()->name }}</h3> -->
                <!--</div> -->
                <div class="card-body">
                    {{-- ペットのメイン写真を表示 --}}
                    <img class="rounded img-fluid" src="https://pbs.twimg.com/media/EfGqrkEVoAAPlWq?format=jpg&name=medium" alt="">
                </div>
            </div>
        </aside>
        
        <div class="col-sm-8">
              <div class = "row">
                <h1>{{ $pet->name }} ちゃん</h1>
                {{-- 編集ページへのリンク --}}
                {!! link_to_route('pets.edit', '編集', ['pet' => $pet->id], ['class' => 'btn btn-light']) !!}
                {{-- 可愛いねボタン--}}
                {!! Form::model($pet, ['route' => ['pets.update', $pet->id], 'method' => 'put']) !!}
                <i class="fas fa-heart fa-5x" style="color:pink"></i>
                {!! Form::submit('かわいいねボタン', ['class' => 'btn btn-primary']) !!} 
                {!! Form::close() !!}     
              </div>
          
               {{-- 投稿内容 --}}
            <p class="mb-0">お誕生日：{!! nl2br(e($pet->birthday)) !!}</p>
            <p class="mb-0">種類：{!! nl2br(e($pet->breed_id)) !!}</p> 
            <p class="mb-0">性別：{!! nl2br(e($pet->sex)) !!}</p>
            <p class="mb-0">アピールポイント：{!! nl2br(e($pet->introduction)) !!}</p>
            <p class="mb-0">可愛いね数：{!! nl2br(e($pet->cute_count)) !!}</p>
        </div>
    </div>
    {{-- ペットのサブ写真を表示 --}}
    <div>
        <div class = "row my-2 mx-2"> 
            <div class = "card col-3">
            <img class="rounded img-fluid my-1" src="https://pbs.twimg.com/media/EfRsVRfU0AIwSkJ?format=jpg&name=medium" alt="">
            この辺にコメントなど
            </div>
            <div class = "card col-3">
             <img class="rounded img-fluid my-1" src="https://pbs.twimg.com/media/EfJMS4PUEAIG6d6?format=jpg&name=medium" alt="">
            この辺にコメントなど
            </div>
             <div class = "card col-3">
           <img class="rounded img-fluid my-1" src="https://pbs.twimg.com/media/EczWiB0UMAAuIR3?format=jpg&name=medium" alt="">
            この辺にコメントなど
            </div>
             <div class = "card col-3">
            <img class="rounded img-fluid my-1" src="https://pbs.twimg.com/media/EZ-FT3rUwAANqLG?format=jpg&name=medium" alt="">
            この辺にコメントなど
            </div>
            
           {{-- 編集ページへのリンク --}}
          {!! link_to_route('photos.create', '写真追加', ['id' => '3'],['class' => 'btn btn-light']) !!}
               <td>{!! link_to_route('photos.edit', "編集", ['photo' => '1']) !!}</td>
               
<?php $count = 0; ?>
            @foreach ($photos as $photo)
<?php $count++; ?>
            <div class = "card col-3">
                        {{$photo -> introduction1}}
                  <td>{!! link_to_route('photos.edit', "編集", ['photo' => $photo -> id]) !!}</td>
            <img class="rounded img-fluid my-1" src= "{{$photo -> URL }}" alt="">
            </div>
            @endforeach
            @if($count < 4)
                {{$pet->id}}
                
                {{ $photo->pet->id }}
                  {{-- 追加ページへのリンク --}}  
                 
                  {!! link_to_route('photos.create', '写真追加', ['id' => $pet -> id], ['class' => 'btn btn-light']) !!}
            @endif

        </div>
       
    </div>
</div>
@endsection