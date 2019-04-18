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

//---------------------------------------------------------------------
//Video 08
//Creacion de las primeras rutas
Route::get('/mi_primer_ruta', function(){
return ('Hola barats');
});
//Rutas que recibe parametros nombre y lastname
//En caso de que lastname venga vacio el parametro le doy un valor por defecto
Route::get('/name/{name}/lastname/{lastname}', function($name, $lastname ='apellido'){
return ('hola soy' .$name .$lastname);
}); 


//---------------------------------------------------------------------
//Video 09
//Creo un controlador y su metodo de prueba correspondiete
Route::get('/prueba/{name}', 'PruebaController@prueba');
