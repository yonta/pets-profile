{{--ユーザー情報を表示--}}
   <div class="card">
         <div class="row">
           <img class=" col-sm-1 mr-2 rounded" src="{{ Auth::user()->url }}" alt="">
                <div class = "col-4">
                <h3>{{ Auth::user()->name }}さんのお家</h3>
             </div>
            <div class = "col-5">
                <br>
                {{ Auth::user()->introduction }} <!-- usersのintroduction -->
            </div>
               <div class = "col-1">
            {{-- 編集ページへのリンク --}}
            {!! link_to_route('users.edit', '編集', ['user' => Auth::user()->id], ['class' => 'btn btn-light']) !!}
            </div>
        </div>
   </div>