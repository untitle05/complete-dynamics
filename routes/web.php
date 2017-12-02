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

Route::get('/', function () {
    return view('welcome');
});

Route::get('cities/{id}', 'TestController@cities');

Route::group(['middleware' => 'web'], function () {

    Route::resource('test', 'TestController', ['only' => [
        'edit', 'update'
    ]]);

});

Route::any('search', function (){
    $term = \Illuminate\Support\Str::lower(\Illuminate\Support\Facades\Input::get('term'));

    $data = \Illuminate\Support\Facades\DB::select("SELECT * FROM authors WHERE name LIKE '%$term%'");

    foreach ($data as $v){
        $return_array[] = array('value' => $v->name);
    }

    return \Illuminate\Support\Facades\Response::json($return_array);
});
