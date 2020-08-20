{{--ユーザー情報を表示--}}
   <div class="card">
         <div class="row">
           <img class=" col-sm-1 mr-2 rounded" src="{{ Gravatar::get($pet->user->email, ['size' => 500]) }}" alt="">
          <h1>ナントカさんのお家</h1>　
          
          <br>
           一言コメント <!-- usersのintroduction -->
           
           {{-- 編集ページへのリンク --}}
          {!! Form::submit('編集', ['class' => 'btn btn-primary']) !!}
            
        </div>
   </div>