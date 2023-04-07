<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href=".../.../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link  rel="stylesheet"href="{{asset('frontend/css/bootstrap.min.css') }}"   />
      
        <title>PGPC</title>
    </head>
    <body>
       <div class="container">
        <div class="row">
            <small> Eu sou o layout App.</small>
            @yield('content')
        </div>
       </div>
        
        <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="../../js/popper.min.js" crossorigin="anonymous"></script>
    </body>
</html>