<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>PetsProfile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <style>
          .nav-item a{
                color:white;
            }
            
            .test{
                width: 100px;
                height : 100px;
          
                cursor:pointer;
            }
        </style>
    </head>

    <body  style="background-color: #f7f1d8;  margin:0; padding:0; display: flex;
          flex-direction: column;
          height: 100vh;
          margin-top: 0;"
>

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container" style="background-color: white ; margin-top:56px;">
              <div class="box" style="flex: 1 1 100%;
              overflow-x: hidden; ">
    
    
                        {{-- エラーメッセージ --}}
                        @include('commons.error_messages')
            
                        @yield('content')
           
            </div>
        </div>
        <!--
       <footer class="footer" style="width:100%;  
                        position: fixed;
                    bottom: 0; /*下に固定*/
                    height:50px;
                    background-color: #212529; color:white; text-align: center;">
              <small>        &copy;2020 Asano kensyuu-de-tukuttayatu       </small>
        </footer>
            -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        
        <script>
            'use strict';  //??警告を出すやつ
            
            let elem = document.getElementById('target');
            let petId = elem.dataset.petId; //data-pet-id
      
            //id = targret
             elem.addEventListener('click',() => {
                 elem.style.background = 'pink';
                 
                 fetch('/pets/iine/'+ petId , {method: 'POST'}).then(
                     function(response){
                         console.log(response);
                        response.json().then(function(json){
                         elem.innerText = json.cute_count;
                        });
                     }
                 );
            });
               
            
        </script>
        @csrf
    </body>
    
 
</html>