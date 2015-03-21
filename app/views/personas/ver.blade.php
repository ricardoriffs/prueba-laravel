@extends('layouts.master')

@section('sidebar')
     @parent
     Datos detalle de {{ $persona->nombre }}
@stop

@section('content')
    {{ HTML::link('personas', 'Ir Atrás'); }}
    <h1>Persona: {{ $persona->nombre }}</h1>
    <p>Nombre:{{ $persona->nombre .' '.$persona->apellido }}</p>
    <p>Telefono:{{ $persona->telefono }}</p>
    <p>Fecha de Cumpleaños:{{ $persona->fecha_cumple }}</p>    
    <p>Foto:</p>
        <div>
                <!--<img src="{{asset('fotos/')}}/{{$persona->fotos}}" height="150" width="100">-->            
        </div>    
@stop