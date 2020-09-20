<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'PetsController@index');
Route::get('/', function () {
    return view('welcome');
});
Session::getId();

 Route::get('pets/index/{bunrui}/{id}', 'PetsController@search')-> name('pets.search');
 
 Route::post('pets/iine/{id}','PetsController@iine')-> name('pets.iine');
Route::resource('pets', 'PetsController');
Route::resource('breeds', 'BreedsController');
Route::resource('photos', 'PhotosController');
 
Route::resource('classifications', 'ClassificationsController', ['only' => ['store','create']]); //大分類登録
Route::resource('species', 'SpeciesController', ['only' => ['store','create']]); //中分類登録
Route::resource('breeds', 'BreedsController', ['only' => ['store','create']]); //小分類登録
 
// ペット種類を取得
Route::get('breeds/{id}', 'BreedsController@show');
Route::get('users/show/{id}','UsersController@show') -> name('users.show');
Route::resource('users', 'UsersController', ['only' => ['index']]);

Route::resource('users', 'UsersController');//←これあってるかわからん
// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');



// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
 

    Route::resource('pets', 'PetsController', ['only' => ['store', 'destroy']]); //ペット登録と削除

    
     //   Route::resource('photos', 'PhotosController', ['only' => ['store', 'destroy']]); //ペット登録と削除
         //  Route::resource('photos', 'PhotosController');
        
    Route::get('photos/create/{id}', 'PhotosController@create') -> name('photos.create');
    Route::post('photos/store/{id}', 'PhotosController@store') -> name('photos.store');
    Route::resource('photos', 'PhotosController', ['only' => ['destroy','edit','update']]); 
    
  // Route::post('photos', 'PhotosController@store')->name('photos.store');
  //Route::prefix('pets/{id}')->group(function () {
  //  Route::group(['prefix' => 'pets/{id}'], function () {
   //          Route::post('photos', 'PhotosController@store')->name('photos.store');
 
      //  Route::resource('photos', 'PhotosController', ['only' => ['store', 'destroy']]); //ペット登録と削除

 //   });
//    
});