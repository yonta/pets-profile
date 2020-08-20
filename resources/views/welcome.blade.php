@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>ここに可愛い鳥の写真</h1>
        </div>
    </div>
    
    @if (Auth::check())
        <div class="row">
            <div class="col-sm-8">
                {{-- ペット一覧 --}}
                @include('pets.pets')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection