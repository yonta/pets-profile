@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ペット写真追加</h1>
    </div>
{{$id}}
            {!! Form::model($photos, ['route' => ['photos.store', 'id' => $id]]) !!}
    
            <div class="form-group">
                    {!! Form::label('URL', '写真URL') !!}
                    {!! Form::text('URL', null, ['class' => 'form-control']) !!}
                        </div>
            <div class="form-group">
                    {!! Form::label('introduction1', '説明') !!}
           {!! Form::text('introduction1', null, ['class' => 'form-control']) !!}
            </div>

 
                {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
@endsection