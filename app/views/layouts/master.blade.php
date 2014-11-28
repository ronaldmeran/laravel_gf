<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>@yield('title') | User Admin</title>
 
        <!-- <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'> -->
        <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <style>
            /*body {
                margin-top: 5%;
            }*/
        </style>
        {{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/styles.css')}}
    </head>
    <body>
         @section('navigation')
         @show
        <div class='container-fluid'>
            @section('breadcrumbs')
            @show
            <div class='row'>
                @yield('content')
            </div>
        </div>
    </body>
    {{HTML::script('js/2.0.2.jquery.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    {{HTML::script('js/scripts.js')}}
</html>