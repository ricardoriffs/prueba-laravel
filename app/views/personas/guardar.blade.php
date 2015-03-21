@extends('layouts.master')

@section('sidebar')
    @parent
    Formulario de Registro de Persona
@stop 

@section('content')
    {{ HTML::link('personas', 'Ir Atrás'); }}
    
        @if (Session::get('mensaje') )
          <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif    
    

    <div id='content'>
        @if($persona)
            <h1>Editar Persona</h1>
            {{ Form::open(array('url' => 'personas/actualizar/'.$persona->id, 'files' => true)) }}
        @else
            <h1>Crear Persona</h1>        
            {{ Form::open(array('url' => 'personas.crear', 'files' => true)) }}        
        @endif        
        <div>
             {{ Form::label('nombre', '* Nombres:') }}<br/>
            {{ Form::text('nombre', Input::old('nombre') ? Input::old('nombre') : ($persona ? $persona->nombre : NULL), array('class'=>'form-control','placeholder' => 'Ingrese sus Nombres')) }}
            @if($errors->has('nombre'))
                @foreach($errors->get('nombre') as $error)
                    <br/>* {{ $error }}
                @endforeach
            @endif           
        </div>
        <div>
             {{ Form::label('apellido', 'Apellido:') }}<br/>
            {{ Form::text('apellido', Input::old('apellido') ? Input::old('apellido') : ($persona ? $persona->apellido : NULL), array('class'=>'form-control','placeholder' => 'Ingrese sus Apellidos')) }}
            @if($errors->has('apellido'))
                @foreach($errors->get('apellido') as $error)
                    <br/>* {{ $error }}
                @endforeach
            @endif           
        </div>        
        <div>
             {{ Form::label('telefono', '* Teléfono:') }}<br/>
            {{ Form::text('telefono', Input::old('telefono') ? Input::old('telefono') : ($persona ? $persona->telefono : NULL), array('class'=>'form-control','placeholder' => 'Ingrese su Teléfono')) }}
            @if($errors->has('telefono'))
                @foreach($errors->get('telefono') as $error)
                    <br/>* {{ $error }}
                @endforeach
            @endif           
        </div>  
        <div>
             {{ Form::label('fecha_cumple', 'Fecha de Cumpleaños:') }}<br/>
            {{ Form::text('fecha_cumple', Input::old('fecha_cumple') ? Input::old('fecha_cumple') : ($persona ? $persona->fecha_cumple : NULL), array('class'=>'form-control','class' => 'datepicker', 'data-date-format' => 'yyyy-mm-dd', 'placeholder' => 'Ingrese fecha Y-m-d')) }}
            @if($errors->has('fecha_cumple'))
                @foreach($errors->get('fecha_cumple') as $error)
                    <br/>* {{ $error }}
                @endforeach
            @endif           
        </div>
        @if($persona)        
            <div>
                 {{ Form::label('fotos', 'Fotos:') }}<br/>
                {{ Form::file('fotos[]', array('multiple' => true)) }}
                @if($errors->has('fotos'))
                    @foreach($errors->get('fotos') as $error)
                        <br/>* {{ $error }}
                    @endforeach
                @endif                               
            </div> 
        @endif
        <div>        
            <!--<img src="{{asset('fotos/')}}/{{ $persona ? $persona->fotos : ' ' }}" height="150" width="100" />-->            
        </div>
        <br/>
        <div>
            {{ Form::submit('Guardar') }}                     
        </div>      
        {{ Form::close() }}
    @stop            
    </div>