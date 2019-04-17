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

Route::get('/','DashboardController@index')->name('dashboard');
Route::group(['middleware'=>'auth'], function(){
  # code...

  Route::group(['prefix'=>'kategori','as'=>'kategori.'], function (){
    Route::get('/','CatalogController@index')->name('index');
    Route::get('create','CatalogController@create')->name('create');
    Route::post('save','CatalogController@save')->name('save');
    Route::get('edit/{id}','CatalogController@edit')->name('edit');
    Route::post('update','CatalogController@update')->name('update');
    Route::get('delete/{id}','CatalogController@delete')->name('delete');
  });
  Route::group(['prefix'=>'produk','as'=>'produk.'], function (){
    Route::get('/','ProductController@index')->name('index');
    Route::get('create','ProductController@create')->name('create');
    Route::post('save','ProductController@save')->name('save');
    Route::get('edit/{id}','ProductController@edit')->name('edit');
    Route::post('update','ProductController@update')->name('update');
    Route::get('delete/{id}','ProductController@delete')->name('delete');
  });

  Route::group(['prefix'=>'carousel','as'=>'carousel.'], function (){
    Route::get('/','App\CorouselController@index')->name('index');
    Route::get('create','App\CorouselController@create')->name('create');
    Route::post('save','App\CorouselController@save')->name('save');
    Route::get('delete/{id}','App\CorouselController@delete')->name('delete');
  });


  Route::get('/home', 'DashboardController@index')->name('home');
});
Auth::routes();
