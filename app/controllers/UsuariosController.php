<?php

class UsuariosController extends BaseController {
    
    /** Muestra formulario acceso de usuario **/    
    
    public function login(){
        
        return View::make('login');
    }
    
    /** Valida si los datos registrados son correctos, se autentica **/    
    
    public function autenticacion(){

        if (Auth::attempt( array('correo' => Input::get('correo'), 'password' => Input::get('password') ), true )){

            return Redirect::intended('personas');
        } else {
            return Redirect::to('login')->with('mensaje_login', 'Datos de acceso inválidos, pruebe nuevamente');
        }    
    }
    
    /** Ejecuta la acción de registrar un usuario en base de datos). **/    
    
    public function registrarUsuario(){

        $input = Input::all();

        $input['password'] = Hash::make($input['password']); //Hashing seguro de la contraseña

        Usuarios::create($input);

        return Redirect::to('login')->with('mensaje_registro', 'Usuario Registrado exitosamente');        
    }
}