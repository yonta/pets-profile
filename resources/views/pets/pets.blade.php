@if (count($pets) > 0)
    <ul class="list-unstyled">
     
        
        @foreach ($pets as $pet)
            <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($pet->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $pet->user->name, ['user' => $pet->user->id]) !!}
                        <span class="text-muted">posted at {{ $pet->created_at }}</span>
                    </div>
                    <div>
              
                        {{-- 投稿内容 --}}
                        <p class="mb-0">お誕生日：{!! nl2br(e($pet->birthday)) !!}</p>
                        <p class="mb-0">お名前：{!! nl2br(e($pet->name)) !!}</p>
                         <p class="mb-0">種類：{!! nl2br(e($pet->breed_id)) !!}</p> 
                    
                        <p class="mb-0">性別：{!! nl2br(e($pet->sex)) !!}</p>
                        <p class="mb-0">アピールポイント：{!! nl2br(e($pet->introduction)) !!}</p>
                        <p class="mb-0">可愛いね数：{!! nl2br(e($pet->cute_count)) !!}</p>
                        
                       <tr>
                        {{-- ペット詳細ページへのリンク --}}
                        <td>{!! link_to_route('pets.show', $pet->id, ['pet' => $pet->id]) !!}</td>
                        <td>{{ $pet->content }}</td>
                    </tr>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif