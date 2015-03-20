@extends('layouts.master')

@section('sidebar')
    @parent
    Listado de Personal
@stop

@section('content')   

        @if (Session::get('mensaje') )
          <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif

    <h1>Personas</h1>
    <table class="tableReglas">
      <tr>
        <td class="td1Reglas">Nombre Completo</td>
        <td colspan="3" class="td1Reglas">Acciones</td>
      </tr>        
      @foreach($personas as $persona)
      <tr>
          <td class="td1Reglas">{{ $persona->nombre.' '.$persona->apellido }}</td>
          <td class="td1Reglas"> {{ HTML::link('personas/'.$persona->id, 'Ver Detalle'); }} </td>
          <td class="td1Reglas"> {{ HTML::link('personas/editar/'.$persona->id, 'Editar'); }} </td>          
          <td class="td1Reglas"> {{ HTML::link('personas/borrar/'.$persona->id, 'Borrar');  }}  </td>             
      </tr> 
      @endforeach 
    </table>
    
    {{ HTML::link('personas.nuevo', 'Registrar Persona'); }}
    
@stop