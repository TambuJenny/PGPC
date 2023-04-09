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
       
        <script src=" {{asset('frontend/js/bootstrap.bundle.min.js') }}" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/js/popper.min.js') }}" crossorigin="anonymous"></script>
    </body>
</html>