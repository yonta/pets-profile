{{-- ユーザー個人ページ --}}

@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
        <div class = "card my-1">
            <li class="media">
                {{-- 表示 --}}
                        <img class="col-sm-1 mr-2 rounded" src="{{ $user->url }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'View profile', ['user' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
            </div>
             @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif