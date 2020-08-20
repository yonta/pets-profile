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

                <div class="form-group">
                    {!! Form::label('breed', '種類') !!}
                </div>
                
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
                    {!! Form::label('photo', 'プロフィール画像') !!}
                    {!! Form::text('photo', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection