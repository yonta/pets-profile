@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>大分類登録</h1>
    </div>
       {!! Form::model($classifications, ['route' => 'classifications.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', '大分類名') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                </div>
                    {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection