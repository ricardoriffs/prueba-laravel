<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login', array('uses' => 'UsuariosController@login'));

Route::post('registro', array('uses' => 'UsuariosController@registrarUsuario'));

Route::post('login', array('uses' => 'UsuariosController@autenticacion'));

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', array('uses' => 'PersonasController@mostrarPersonas'));        
    
    Route::get('personas', array('uses' => 'PersonasController@mostrarPersonas'));

    Route::get('personas.nuevo', array('uses' => 'PersonasController@nuevaPersona'));

    Route::post('personas.crear', array('uses' => 'PersonasController@crearPersona'));

    Route::get('personas/{id}', array('uses' => 'PersonasController@verPersona'));

    Route::get('personas/editar/{id}', array('uses' => 'PersonasController@editarPersona'));
    
    Route::post('personas/actualizar/{id}', array('uses' => 'PersonasController@actualizarPersona'));    

    Route::get('personas/borrar/{id}', array('uses' => 'PersonasController@borrarPersona'));      
});


