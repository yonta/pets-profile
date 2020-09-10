<?php
use App\Classification;
use App\Specie;
use App\Breed;

$classifications = Classification::get();
$species = Specie::get();
$breeds =Breed::get();
$clif = 0;
//classification_id;
if(isset($_GET['name'])) {
    //$_GET['name']が定義済みの場合は、値をエスケープ処理して $name に代入
    $clif = 2;
    }
    
    function selectClif($id){
        return $clif = $id;
    }

?>


<header >
    
    <nav class="navbar navbar-expand-* navbar-dark p-0" style="background-color: rgba( 59, 158, 219, 0.55 ); backdrop-filter: blur(10px);
    position: fixed;
    width: 100%;
    max-height: 100%;
    z-index: 1;">
        <div class="container" >
             {{-- トップページへのリンク --}}      
             <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar"  style=" opacity:1; box-shadow: 0px 0px 9px 0 rgb(255, 0, 0);">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/"><h2>PetsProfile</h2></a>
        </div>   
                {{--ここから展開部分--}}
                <div class="collapse navbar-collapse p-0" id="nav-bar" style="background-color: rgba( 39, 32, 32, 0.55 ); "> 
                <ul class="navbar-nav mr-auto container" >
                <div class = "row">
                      <div class = "col-4">
                            @if (Auth::check())
                                <li class="nav-item dropdown" style = "color:white;">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        {{-- ユーザ詳細ページへのリンク --}}
                                        <h4><li class="dropdown-item">{!! link_to_route('users.show', 'マイページ', ['user' => Auth::user()->id]) !!}</li></h4>
                                        <li class="dropdown-divider"></li>
                                        {{-- ログアウトへのリンク --}}
                                        <h4><li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li></h4>
                                    </ul>
                                </li>
                            @else
                                {{-- ユーザ登録ページへのリンク --}}
                                <h4><li class="nav-item" >{!! link_to_route('signup.get', '登録', [], ['class' => 'nav-link']) !!}</li></h4>
                                {{-- ログインページへのリンク --}}
                                <h4><li class="nav-item" >{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li></h4>
                            @endif
                            
                            <hr />
                            {{-- ここから検索 --}}
                            {{-- ユーザ一覧ページへのリンク --}}
                             <li class="nav-item" ><h4>{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!} </h4></li>


                            @foreach ($classifications as $classification)
                            <li class="nav-item"> <h4>
                                 <a href="#Species{{+$classification->id }}" data-toggle="collapse" aria-expanded="false" onclick = "{{ $clif = $classification->name }}" >{{$classification ->name }}</a>
                             </h4></li>
                             <br>
                         @endforeach
                           
                     </div>
                     
                     {{-- 中分類表示カラム --}}
                      <div class = "col-4">
@foreach ($classifications as $classification)
                           <ul class="collapse list-unstyled" id="Species{{+$classification->id }}">
                               
                               {{-- 選択した全ての大分類 --}}
                               <li class="nav-item"><h4>{!! link_to_route('pets.search', $classification->name, ['bunrui'=>'classification', 'id' =>  $classification->id]) !!} </h4></li>
                              
                              
                               <hr />

<?php
$speciesa = $classification->species()->get();
?>
                            @foreach ($speciesa as $species)
                  
                            <li class="nav-item"> <h4><a href="#Breeds{{+$species->id }}" data-toggle="collapse" aria-expanded="false" >{{ $species ->name }}</a></h4></li>
                              <br>
                                          
                          @endforeach

                            </ul>
@endforeach
                    </div>
                    
                     {{-- 小分類表示カラム --}}
                      <div class = "col-3"> 
<?php
$spe = Specie::get();
?>
                    @foreach ($spe as $specie)

                       <ul class="collapse list-unstyled" id="Breeds{{+$specie->id }}">
              
                      {{-- 選択した全ての中分類 --}}
                             <li class="nav-item"><h4>{!! link_to_route('pets.search', $specie->name, ['bunrui'=>'species', 'id' =>  $specie->id]) !!} </h4></li>
                           <hr />
                           
                        {{-- Breedリスト --}}    
<?php
$bre = Breed::where('species_id', '=', $specie->id )->get();
?>
                               @foreach ($bre as $breed)
                                 <li class="nav-item"><h4>
                                     {!! link_to_route('pets.search', $breed->name, ['bunrui'=>'breed', 'id' =>  $breed->id]) !!} 
                                     </h4></li>
                                      <br>
                               @endforeach  
                        </ul>
                   @endforeach       
                    </div>
                    
                </div>
              </ul>
        
    </nav>
</header>