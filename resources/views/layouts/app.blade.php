<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link  rel="stylesheet"href="{{asset('frontend/css/bootstrap.min.css') }}"   />
        <link  rel="stylesheet"href="{{asset('frontend/css/app.css') }}"   />
      
        <title>PGPC</title>
    </head>
    <body class="backgroundIndex">
       <div class="container">
        <div class="row">

            @yield('content')
        </div>
       </div>
       
        <script src=" {{asset('frontend/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/js/popper.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/js/jquery.js') }}" crossorigin="anonymous"></script>
    </body>
</html>