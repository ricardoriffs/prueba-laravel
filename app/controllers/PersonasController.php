<?php

class PersonasController extends BaseController{
 
    /** Muestra una lista con Personas **/
    
    public function mostrarPersonas()
    {
        $personas = Persona::seleccionarPersonas();

        return View::make('personas.lista', array('personas' => $personas));

    }    
    
    /** Muestra formulario para crear una persona **/
    
    public function nuevaPersona(){
        
        $persona = NULL;
        return View::make('personas.guardar', array('persona' => $persona));
        
    }
    
    /** Ejecuta la acción de crear una persona (registro en base de datos). **/    
    
    public function crearPersona(){
        
        $resultado = Persona::agregarPersona(Input::all());        
        
        if ($resultado['error'] == true){
            return Redirect::to('personas.nuevo')->withErrors($resultado['mensaje'] )->withInput();
        }else{
            Mail::send('personas.email',$resultado, function($message)
            {
                $message->to('ricardo.riffs@gmail.com', 'Ricardo')->subject('Nueva Persona Creada');
            });  
            
            return Redirect::to('personas')->with('mensaje', $resultado['mensaje']);
        } 
    }
    
    public function editarPersona($id){
        
        $persona = $this->buscarPersona($id);      
        
        if (is_null ($persona)){
            App::abort(404);
        }        
        
        return View::make('personas.guardar', array('persona' => $persona));
    
    }
    
    public function ActualizarPersona($id){
        
        $persona = $this->buscarPersona($id);  
     
       if(Input::get() and $persona){
           
           $resultado = Persona::modificarPersona(Input::all());
           
           if($resultado['error'] == false){
                $file = Input::file('fotos');                
                $persona->nombre = Input::get('nombre');
                $persona->apellido = Input::get('apellido');
                $persona->telefono = Input::get('telefono');
                $persona->fecha_cumple = Input::get('fecha_cumple');
                $persona->fotos = Input::file('fotos')->getClientOriginalName();
                
                if($persona->save()){
                    $file->move("fotos",$file->getClientOriginalName());                    
                    return Redirect::to('personas')->with('mensaje', $resultado['mensaje']);         
                }                
           } else {
               return Redirect::to("personas/editar/$id")->withErrors($resultado['mensaje'] )->withInput();
           }
       } else {
            return View::make('personas.guardar', array('persona' => $persona));
       }
    }

    /** Muestra en detalle la información de una persona elegida*/
    
    public function verPersona($id){
        
        $persona = $this->buscarPersona($id);
        
        return View::make('personas.ver', array('persona' => $persona));
    }
    
    public function borrarPersona($id){
        
        $persona = $this->buscarPersona($id);
        $persona->delete();
        return Redirect::to('personas')->with('notice', 'El usuario ha sido eliminado correctamente.');
    }    
    
    private function buscarPersona($id){
             
        $busqueda = Persona::find($id);
        return $busqueda;
    }
}