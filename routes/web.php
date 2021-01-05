<?php

use Illuminate\Support\Facades\Route;

// ruta de inicio
Route::view('/','index')->name('/');

// controlador para redirigir al usuario una vez es logueado
Route::get('/home', 'HomeController@index')->name('home');

// rutas solo con acceso administrador
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::view('/vendedores','admin.vendedores.index')->name('vendedores');
    Route::view('/clientes','admin.clientes.index')->name('clientes');
});
// rutas para cualquiera de los dos roles que este autenticado
Route::view('/clientes','vendedor.clientes.index')->middleware('auth')->name('clientes');
    
Auth::routes();

// Nota: no se utilizó controladores, ya que al estar utilizando LIVEWIRE,
// se utilizan las clases de livewire que no son un controlador, pero tienen
// un comportmineto parecido y el metodo render, apuntando a la vista, estas 
// rutas estan en App\http\livewire

