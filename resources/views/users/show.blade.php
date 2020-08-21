@extends('layouts.app')

@section('content')
    @if (Auth::check())
    {{--ユーザー情報を表示--}}
    <div class="card my-2">
        <div class="row">
         
                <img class="col-sm-1 mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
            
            <div class = "col-4">
                <h3>{{ $user->name }}さんのお家</h3>
             </div>
            <div class = "col-5">
                <br>
                {{ $user->introduction }} <!-- usersのintroduction -->
            </div>
               <div class = "col-1">
            {{-- 編集ページへのリンク --}}
            {!! link_to_route('users.edit', '編集', ['user' => $user->id], ['class' => 'btn btn-light']) !!}
            </div>
        </div>
    </div>
  
  <div class="card" style="background-color: #d1ecf1";>
<?php $count = 0; ?>
       <div class="row mx-2">
@foreach ($pets as $pet)
<?php $count++; ?>

           {{-- ペットページへのリンク --}}
           <div class = "col-6 ">
            <div class="card my-2 mx-auto">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <div class="card-body">
                            {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                            <img class="rounded img-fluid" src="https://pets-profile.s3-ap-northeast-1.amazonaws.com/Ecr_s-sUwAA6gla.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card-body">
                            <p class="mb-0">お名前：{!! nl2br(e($pet->name)) !!}</p>
                            <p class="mb-0">可愛いね数：{!! nl2br(e($pet->cute_count)) !!}</p>
                            {{-- ペット詳細ページへのリンク --}}
                            <td>{!! link_to_route('pets.show', $pet->id, ['pet' => $pet->id]) !!}</td>
                        </div>
                    </div>
                </div>
            </div>
            </div>
@endforeach
            {{-- ペット登録ページへのリンク。登録ペット数が４寄り小さければ表示 --}}
            @if($count< 10) 
            <div>
            </div>
            <div class="card col-sm-5 mx-2 my-2">
            {!! link_to_route('pets.create', '追加', [], ['class' => 'btn btn-light']) !!}
            </div>
            @endif
       </div>
@endif
 </div>
@endsection