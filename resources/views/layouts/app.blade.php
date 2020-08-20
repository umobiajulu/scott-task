<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Scott Task</title>

        <!-- Fonts -->
        <link data-turbolinks-track="true" href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link data-turbolinks-track="true" rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link data-turbolinks-track="true" rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link data-turbolinks-track="true" rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    
        <livewire:styles>
    </head>
    <body>

        @yield('content')
        
        <script data-turbolinks-track="true" src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script data-turbolinks-track="true" data-turbolinks-eval="false" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script data-turbolinks-track="true" src="/js/app.js"></script>
        <livewire:scripts>
        <script data-turbolinks-track="true" data-turbolinks-eval="false" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script data-turbolinks-track="true" data-turbolinks-eval="false" src="/js/style.js"></script>
    
    </body>
</html>
