<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'equipamento', 'where' => ['id' => '[0-9]+']], function () {

    Route::get('/criar', ['as' => 'criar', 'uses' => 'App\Http\Controllers\EquipamentoController@criar']);
    Route::post('/inserir', ['as' => 'inserir', 'uses' => 'App\Http\Controllers\EquipamentoController@inserir']);

    Route::get('{id}/editar', ['as' => 'editar', 'uses' => 'App\Http\Controllers\EquipamentoController@editar']);
    Route::put('{id}/atualizar', ['as' => 'atualizar', 'uses' => 'App\Http\Controllers\EquipamentoController@atualizar']);

    Route::delete('{id}/excluir', ['as' => 'excluir', 'uses' => 'App\Http\Controllers\EquipamentoController@excluir']);

});

Auth::routes();