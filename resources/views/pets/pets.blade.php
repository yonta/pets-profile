{{-- ペット検索ページ --}}

<h1>{{ $searching }}の検索結果</h1>

@if (count($pets) > 0)
    <ul class="list-unstyled">
        @foreach ($pets as $pet)
        <div class = "card my-1">
            <li class="media">
                {{-- 表示 --}}
                <img class="col-sm-1 mr-2 rounded" src="{{ $pet->main_URL }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $pet->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('pets.show', 'View profile', ['pet' => $pet->id]) !!}</p>
                    </div>
                </div>
            </li>
        </div>
        @endforeach
    </ul>

@endif