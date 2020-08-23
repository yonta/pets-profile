@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ペット情報登録</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::model([$pets,$breeds], ['route' => 'pets.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'お名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control' , 'required']) !!}
                </div>
       
                   {!! Form::label('breed', '小分類名') !!}
                <select name="breed">
                @foreach ($breeds as $breed)
                    <option value="{{ $breed -> id }}">{{ $breed -> name }}</option>
                @endforeach
                </select>
                  {{-- 小分類登録ページへのリンク --}}
                   <td>{!! link_to_route('breeds.create', 'ない場合は登録', []) !!}</td>
             
                 <div class="form-group">
                    {!! Form::label('sex', '性別') !!}
                    {!! Form::text('sex', null, ['class' => 'form-control', 'required']) !!}
                </div>
                
                 <div class="form-group">
                    {!! Form::label('birthday', '誕生日') !!}
                    {!! Form::text('birthday',null,  ['class' => 'form-control', 'required']) !!}
                </div>
                
                 <div class="form-group">
                    {!! Form::label('introduction', 'アピールポイント') !!}
                    {!! Form::text('introduction', null, ['class' => 'form-control', 'required']) !!}
                </div>
                
                 <div class="form-group">
                    {!! Form::label('main_URL', 'プロフィール画像') !!}
                    {!! Form::text('main_URL', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
        
    </div>
@endsection