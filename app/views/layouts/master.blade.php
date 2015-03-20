<html>
    <head>
        {{HTML::style('css/datepicker.css')}}     
        {{HTML::style('css/bootstrap.css')}}
        {{HTML::style('css/styles.css')}}   
         {{HTML::script('js/functions.js')}}
        {{ HTML::script('js/jquery-1.11.0.min.js'); }}   
        {{ HTML::script('js/functions-jquery.js'); }}          
        {{ HTML::script('js/bootstrap-datepicker.js'); }}     
         {{HTML::script("js/bootstrap.min.js")}} 
    </head>
    <body>
        @section('sidebar')
            Administración de Personal -
        @show

        <div class="container">
            @yield('content')
        </div>

    </body>
</html>