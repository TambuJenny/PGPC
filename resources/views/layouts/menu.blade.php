<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link  rel="stylesheet"href="{{asset('frontend/css/bootstrap.min.css') }}"   />
        <link  rel="stylesheet"href="{{asset('frontend/css/app.css') }}"   />
      
        <title>PGPC</title>
    </head>
    <body>
    <nav class="navbar fixed-top  bg-primary bg-gradient ">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white" href="#"><b>PGPC</b></a>
    <div class="d-flex align-self-stretch">
        <label><i class="fa fa-user-circle"></i> Tambu Jenny</label>
        <button class="navbar-toggler text-white border border-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">PGPC</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn  text-white" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
       <div class="container">
        <div class="row">

            @yield('content')
        </div>
       </div>
       
        <script src=" {{asset('frontend/js/bootstrap.bundle.min.js') }}" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/js/popper.min.js') }}" crossorigin="anonymous"></script>
    </body>
</html>