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
            'fecha_cumple' => array('date_format:Y-m-d'),
            'fotos' => array('image', 'max:5000')
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
            'fotos' => array('image', 'max:5000')
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
}
