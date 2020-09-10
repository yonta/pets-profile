@extends('layouts.app')

@section('content')
 
    {{--ユーザー情報を表示--}}
<a class="card my-2" >
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
            @if (Auth::id() == $user->id)
            {{-- 編集ページへのリンク --}}
            {!! link_to_route('users.edit', '編集', ['user' => $user->id], ['class' => 'btn btn-light']) !!}
            @endif
        </div>
    </div>
</a>
  
<div class="card" style="background-color: #d1ecf1";>
    <?php $count = 0; ?>
    <div class="row mx-2">
        @foreach ($user-> pets()->get() as $pet)
        <?php $count++; ?>
        
        {{-- ペットページへのリンク --}}
        <div class = "col-6 ">
            <div class="card my-2 mx-auto">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <div class="card-body">
                            {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                            <img class="rounded img-fluid " src="{{ $pet->main_URL }}" alt="" style = "height:200px">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card-body">
                            <p class="mb-0">お名前：{!! nl2br(e($pet->name)) !!}</p>
                            {{-- ペット詳細ページへのリンク --}}
                            <td>{!! link_to_route('pets.show', '詳細ページ', ['pet' => $pet->id]) !!}</td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @if (Auth::id() == $user->id)
        {{-- ペット登録ページへのリンク。登録ペット数が４寄り小さければ表示 --}}
        @if($count< 4) 
        <div class = "col-6 ">
            <div class="card my-2 mx-auto">
                {!! link_to_route('pets.create', 'ペットを追加する', [], ['class' => 'btn btn-light']) !!}
            </div>
        </div>
        @endif
        @endif
    </div>
</div>
@endsection