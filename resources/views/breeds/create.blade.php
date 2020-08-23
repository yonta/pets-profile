@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>小分類登録</h1>
    </div>
       {!! Form::model([$breeds, $species], ['route' => 'breeds.store']) !!}
       
        <select name="specie">
                @foreach ($species as $specie)
                    <option value="{{ $specie -> id }}">{{ $specie -> name }}</option>
                @endforeach
                </select>
    
       
                <div class="form-group">
                    {!! Form::label('name', '小分類名') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                    {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection