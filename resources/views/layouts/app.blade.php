<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{asset('frontend/css/app.css') }}" />

    <title>PGPC</title>
</head>

<body class="backgroundIndex">
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>

    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('frontend/js/jquery.js')}}" crossorigin="anonymous"></script>

    <script src="{{asset('frontend/js/vendor.bundle.base.js')}}"></script>

    <script src="{{asset('frontend/js/Chart.min.js')}}"></script>
    <script src="{{asset('frontend/js/progressbar.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('frontend/js/off-canvas.js')}}"></script>
    <script src="{{asset('frontend/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('frontend/js/misc.js')}}"></script>
    <script src="{{asset('frontend/js/settings.js')}}"></script>
    <script src="{{asset('frontend/js/todolist.js')}}"></script>
</body>

</html>