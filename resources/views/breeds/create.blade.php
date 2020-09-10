@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>小分類登録</h1>
    </div>
    {{$pet_id}}
       {!! Form::model([$breeds, $species], ['route' => 'breeds.store']) !!}
       
        <select name="specie">
                @foreach ($species as $specie)
                    <option value="{{ $specie -> id }}">{{ $specie -> name }}</option>
                @endforeach
                </select>
              {{-- 中分類登録ページへのリンク --}}
                   <td>{!! link_to_route('species.create', 'ない場合は登録', []) !!}</td>
       
                <div class="form-group">
                    {!! Form::label('name', '小分類名') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                </div>
                    {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
         {{-- ペット詳細ページへのリンク --}}
       {!! link_to_route('pets.edit', '戻る', ['pet' => $pet_id], ['class' => 'btn btn-light']) !!}
    </div>
@endsection