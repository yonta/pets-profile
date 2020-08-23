@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>中分類登録</h1>
    </div>
       {!! Form::model([$species,$classifications], ['route' => 'species.store']) !!}
       

    
         {!! Form::label('classification', '大分類名') !!}
                <select name="classification">
                @foreach ($classifications as $classification)
                    <option value="{{ $classification -> id }}">{{ $classification -> name }}</option>
                @endforeach
                </select>
                    {{-- 大分類登録ページへのリンク --}}
                   <td>{!! link_to_route('classifications.create', 'ない場合は登録', []) !!}</td>
    
       
                <div class="form-group">
                    {!! Form::label('name', '中分類名') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                </div>
                    {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection