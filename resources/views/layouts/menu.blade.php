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
    <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">PGPC</a>
        <div class="nav justify-content-end">
        <div class="btn-group">
<button type="button" class="btn btn-transparent text-white"><i class="fa fa-user"></i> NomeUser</button>
  <button type="button" class="btn btn-transparent dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Separated link</a></li>
  </ul>
</div>
        </div>
          <!-- Example split danger button -->

      </div>
    </nav>
    <div class="d-flex flex-column flex-shrink-0 bg-primary" style="width: 4.5rem;height: 100%;">
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
      <li class="nav-item mt-5">
        <a href="#" class="nav-link active py-3 border-bottom" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on right">
        <i class="fa fa-balance-scale text-white"></i> 
        <span class="visually-hidden">Icon-only</span>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
        <i class="fa fa-drivers-license text-white"></i> 
        <span class="visually-hidden">Icon-only</span>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
          <svg class="bi" width="24" height="24" role="img" aria-label="Orders"><use xlink:href="#table"></use></svg>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
          <svg class="bi" width="24" height="24" role="img" aria-label="Products"><use xlink:href="#grid"></use></svg>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
          <svg class="bi" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#people-circle"></use></svg>
        </a>
      </li>
    </ul>
  </div>
       <div class="container">
        <div class="row">

            @yield('content')
        </div>
       </div>
       
        <script src=" {{asset('frontend/js/bootstrap.bundle.min.js') }}" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/js/popper.min.js') }}" crossorigin="anonymous"></script>
    </body>
</html>