@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1>ユーザー情報編集</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
         
        　　　　　　　    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update',    $user->id]]) !!}
                 <div class="form-group">
                    {!! Form::label('name', 'お名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    
                      {!! Form::label('introduction', 'ひとこと') !!}
                    {!! Form::text('introduction', null, ['class' => 'form-control']) !!}
                    
                      {!! Form::label('url', 'アイコン') !!}
                    {!! Form::text('url', null, ['class' => 'form-control']) !!}
         
                </div>
                
                  {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection