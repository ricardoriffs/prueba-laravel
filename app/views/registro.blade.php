@extends('layouts.master')

@section('sidebar')
    @parent
    Formulario de Login
@stop 

@section('content')

    <h2>Registro</h2>
    @if (Session::has('mensaje_registro'))
    <span>{{ Session::get('mensaje_registro') }}</span>
    @endif

    {{ Form::open(array('url' => 'registro')) }}

        {{ Form::label('nombre', 'Nombre'); }}
        {{ Form::text('nombre'); }}
        {{ Form::label('correo', 'Correo'); }}
        {{ Form::text('correo'); }}
        {{ Form::label('password', 'Clave'); }}
        {{ Form::password('password'); }}
        {{ Form::submit('Registrar'); }}

    {{ Form::close() }}
@stop