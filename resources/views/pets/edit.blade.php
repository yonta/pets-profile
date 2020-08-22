          <?php
           function ConfirmDelete()
                  {
                    return false;
                  }
           
           ?>
            
            


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
            
             @if (Auth::id() == $pet->user_id)
                {{-- 投稿削除ボタンのフォーム --}}
              
                {!! Form::open(['route' => ['pets.destroy', $pet -> id], 'method' => 'delete', 'onsubmit' => 'return confirm("このペットの情報が全て削除されます。よろしいですか?");']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', 'data-toggle' => 'modal', 'data-target' => '#exampleModalCenter']) !!}
                {!! Form::close() !!}
            
 



            @endif
        </div>
    </div>
@endsection