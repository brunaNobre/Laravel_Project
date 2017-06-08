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

Route::resource('/', 'CarroComercialController');

Route::resource('admin/carros', 'CarroController');

Route::resource('admin/marcas', 'MarcaController');

Route::resource('admin/clientes', 'ClienteController');

Route::resource('admin/propostas', 'PropostaController');

Route::get('carrosfoto/{id}', 'CarroController@foto')
    ->name('carros.foto');

Route::get('carrosdestaque/{id}', 'CarroController@destacar')
    ->name('carros.destaque');

Route::post('carrosfotostore', 'CarroController@storeFoto')
    ->name('carros.store.foto');

Route::get('resposta', 'PropostaController@responder')
    ->name('propostas.resposta');

Route::get('carrospesq', 'CarroController@pesq')
    ->name('carros.pesq');

Route::post('carrosfiltros', 'CarroController@filtros')
    ->name('carros.filtros');

//Comercial
Route::get('carrospesqcom', 'CarroComercialController@pesq')
    ->name('carros.pesquisa');

Route::post('carrosfiltroscom', 'CarroComercialController@filtros')
    ->name('carros.filtroscom');

Route::get('carrosgraf', 'CarroController@graf')
    ->name('carros.graf');



Auth::routes();

Route::get('/admin', 'HomeController@index');

