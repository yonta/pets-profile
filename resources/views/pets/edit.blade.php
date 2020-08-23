@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ペット情報編集</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::model($pet, ['route' => ['pets.update', $pet->id], 'method' => 'put']) !!}
            
                <div class="form-group">
                    {!! Form::label('name', 'お名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
 
                   {!! Form::label('breed', '小分類名') !!}
                <select name="breed">
                @foreach ($breeds as $breed)
                    <option value="{{ $breed -> id }}">{{ $breed -> name }}</option>
                @endforeach
                </select>
                
                 <div class="form-group">
                    {!! Form::label('sex', '性別') !!}
                    {!! Form::text('sex', null, ['class' => 'form-control']) !!}
                </div>
                
                 <div class="form-group">
                    {!! Form::label('birthday', '誕生日') !!}
                    {!! Form::text('birthday',null,  ['class' => 'form-control']) !!}
                </div>
                
                 <div class="form-group">
                    {!! Form::label('introduction', 'アピールポイント') !!}
                    {!! Form::text('introduction', null, ['class' => 'form-control']) !!}
                </div>
                
                 <div class="form-group">
                    {!! Form::label('main_URL', 'プロフィール画像') !!}
                    {!! Form::text('main_URL', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
             @if (Auth::id() == $pet->user_id)
                {{-- 投稿削除ボタンのフォーム --}}
              
                {!! Form::open(['route' => ['pets.destroy', $pet -> id], 'method' => 'delete', 'onsubmit' => 'return confirm("このペットの情報が全て削除されます。よろしいですか?");']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', 'data-toggle' => 'modal', 'data-target' => '#exampleModalCenter']) !!}
                {!! Form::close() !!}

            @endif
        </div>
    </div>
@endsection