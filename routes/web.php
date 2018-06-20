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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'FrontController@index');

Route::get('home', function () {
    return view('index');
});

//Route::get('/home', 'FrontController@index');

Route::post('upload', 'UploadController@upload');
//Route::redirect('upload', 'home', 301);
Route::get('analisis', 'FrontController@AnalizaSQLite');
Route::get('proceso', 'FrontController@ProcesaSQLite');
Route::get('conglomerados', 'SQLController@conglomerados');
/*Route::get('grid/{tabla}', 'GridController@index');*/
/*Route::resource('grid', 'GridController');*/
Route::resource('caracteristica_arbolado', 'Caracteristica_arbolado_controller');
Route::resource('caracteristica_danio_individuo', 'Caracteristica_arbolado_controller');
Route::resource('caracteristica_agua_fisica_quimica', 'Caracteristica_agua_fisica_quimica_controller');
Route::resource('caracteristica_arbolado_uso', 'Caracteristica_arbolado_uso_controller');
Route::resource('caracteristica_brigadista', 'caracteristica_brigadista_controller');
Route::resource('caracteristica_cobertura_suelo', 'caracteristica_cobertura_suelo_controller');
Route::resource('caracteristica_cobertura_transecto', 'caracteristica_cobertura_transecto_controller');
Route::resource('caracteristica_colecta_botanica', 'caracteristica_colecta_botanica_controller');
Route::resource('caracteristica_punto_control', 'caracteristica_punto_control_controller');
Route::resource('caracteristica_repoblado', 'caracteristica_repoblado_controller');
Route::resource('caracteristica_repoblado_danio', 'caracteristica_repoblado_controller');

Route::post('setcheckbox', 'FrontController@SetCheckbox');
Route::get('setcheckbox', 'FrontController@SetCheckbox');