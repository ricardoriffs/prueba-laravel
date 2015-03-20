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

Route::get('login', function(){
    return View::make('login');
});

Route::post('registro', function(){

    $input = Input::all();

    $input['password'] = Hash::make($input['password']);

    Usuarios::create($input);

    return Redirect::to('login')->with('mensaje_registro', 'Usuario Registrado exitosamente');
});

Route::post('login', function(){

    if (Auth::attempt( array('correo' => Input::get('correo'), 'password' => Input::get('password') ), true )){
        //return Redirect::to('inicio');
        return Redirect::intended('personas');
    }else{
        return Redirect::to('login')->with('mensaje_login', 'Datos de acceso inválidos, pruebe nuevamente');
    }
});

Route::group(array('before' => 'auth'), function()
{
    
    Route::get('personas', array('uses' => 'PersonasController@mostrarPersonas'));

    Route::get('personas.nuevo', array('uses' => 'PersonasController@nuevaPersona'));

    Route::post('personas.crear', array('uses' => 'PersonasController@crearPersona'));

    Route::get('personas/{id}', array('uses' => 'PersonasController@verPersona'));

    Route::get('personas/editar/{id}', array('uses' => 'PersonasController@editarPersona'));
    
    Route::post('personas/actualizar/{id}', array('uses' => 'PersonasController@actualizarPersona'));    

    Route::get('personas/borrar/{id}', array('uses' => 'PersonasController@borrarPersona'));      
});


