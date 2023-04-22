@if(session()->has('Nome') &&  session()->has('Email') && session()->has('IdUsuario'))

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
<button type="button" class="btn btn-transparent text-white"><i class="fa fa-user"></i> {{session('Nome')}}</button>
  <button type="button" class="btn btn-transparent dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item text-success" href="#">Editar Perfil</a></li>
    <li><a class="dropdown-item text-danger" href="#">Sair</a></li>
    <li><a class="dropdown-item" href="#">Tutorial</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Doação</a></li>
  </ul>
</div>
        </div>
          <!-- Example split danger button   -->

      </div>
    </nav>
      <div class="d-flex justify-content-between">
          <div  class="d-flex flex-column flex-shrink-0 bg-primary" style="width: 4.5rem;height:auto;">
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
              <li class="nav-item mt-5">
                <a href="#" class="nav-link active py-3 border-bottom" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on right">
                <i class="fa fa-balance-scale text-white"></i> 
                <span class="visually-hidden">Icon-only</span>
                </a>
              </li>
              <li >
                <a href="#" class="nav-link active py-3 border-bottom" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on right">
                  <i class="fa fa-user-secret text-white" aria-hidden="true"></i>
                <span class="visually-hidden">Icon-only</span>
                </a>
              </li>
              <li>
                <a href="{{url("/criarProcesso")}}" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on right">
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
      </div>
      <footer>
        <div class="card text-center border-0">
          <div class="card-footer text-body-secondary">
            PGPC <br>
            <small>2023 - IMETRO</small>
          </div>
        </div>
      </footer>
        <script src=" {{asset('frontend/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/js/popper.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/js/jquery.js') }}" crossorigin="anonymous"></script>
    </body>
</html>

@else
{{header('Location: /index')}}
@endif