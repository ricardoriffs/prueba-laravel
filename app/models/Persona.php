<?php 
class Persona extends Eloquent { 
    
    protected $table = 'persona';
    
    protected $fillable = array('nombre', 'apellido', 'telefono', 'fecha_cumple', 'fotos');
    
    public static function seleccionarPersonas(){
        
        $personas = DB::table('persona')->get();
        return $personas;
    }
    
    public static function agregarPersona($entradas){
        
        $resultado = array();

        $reglas =  array(
            'nombre' => array('required', 'min:5', 'alpha'), 
            'apellido' => array('min:5', 'alpha'),
            'telefono' => array('required', 'numeric', 'min:1000'),
            'fecha_cumple' => array('date_format:Y-m-d')
        );

        $validador = Validator::make($entradas, $reglas);

        if ($validador->fails()){

            $resultado['mensaje'] = $validador;
            $resultado['error']   = true;
        }else{

            $persona = static::create($entradas);      

            // se retorna un mensaje de éxito al controlador
            $resultado['mensaje'] = 'Persona creada exitósamente';
            $resultado['error']   = false;
            $resultado['data']    = $persona;
        }     

        return $resultado;         
    }
    
    public static function modificarPersona($entradas){
        
        $resultado = array();

        $reglas =  array(
            'nombre' => array('required', 'min:5', 'alpha'), 
            'apellido' => array('min:5', 'alpha'),
            'telefono' => array('required', 'numeric', 'min:1000'),
            'fecha_cumple' => array('date_format:Y-m-d'),
        );

        $validador = Validator::make($entradas, $reglas);

        if ($validador->fails()){

            $resultado['mensaje'] = $validador;
            $resultado['error']   = true;
        }else{  

            // se retorna un mensaje de éxito al controlador
            $resultado['mensaje'] = 'La persona ha sido modificada correctamente.';
            $resultado['error']   = false;
            //$resultado['data']    = $persona;
        }     

        return $resultado;         
    }    
    
    public static function modificarArchivos($files){
        
        foreach($files as $file):
            
            $resultado = array();

            $reglas = array(
                'fotos' => array('image', 'mimes:png,gif,jpeg', 'max:2000')            
            );
            
            $validador = Validator::make(array('fotos'=> $file), $reglas);
            
            if($validador->fails()):
                $resultado['mensaje'] = $validador;
                $resultado['error']   = true;
                return $resultado;
                break;
            else:
                $resultado['mensaje'] = 'La persona ha sido modificada correctamente.';
                $resultado['error']   = false;                
            endif;
        endforeach;
        
        return $resultado;          
    }
}
