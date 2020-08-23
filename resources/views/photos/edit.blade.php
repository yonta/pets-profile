@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>写真編集</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::model($photo, ['route' => ['photos.update', $photo->id], 'method' => 'put']) !!}
            
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
        </div>
    </div>
@endsection