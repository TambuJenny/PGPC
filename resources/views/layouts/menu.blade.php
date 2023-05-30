@if(session()->has('Nome') &&  session()->has('Email') && session()->has('IdUsuario'))

{{
  $IdUsuario = session()->get('IdUsuario')
}}

<!DOCTYPE html>
<html>
    <header>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link  rel="stylesheet"href="{{asset('frontend/css/bootstrap.min.css') }}"   />
        <link  rel="stylesheet"href="{{asset('frontend/css/app.css') }}"/>

        <link rel="stylesheet" href="{{asset('frontend/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/jvectormap/jquery-jvectormap.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
      
        <title>PGPC</title>
    </header>
    <body>

    <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><i class="fa-sharp fa-solid fa-scale-balanced"></i>&nbsp;&nbsp;PGPC</a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="frontend/img/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
        
            
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.html">
              <span class="menu-icon">
              <i class="fa-solid fa-chart-line"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a href ="{{url("/listarProcesso")}}" class="nav-link" href="index.html">
              <span class="menu-icon">
              <i class="fa-solid fa-scale-balanced"></i>
              </span>
              <span class="menu-title">Processo</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item menu-items">
          <a href ="{{url("/Reu")}}" class="nav-link" href="index.html">
              <span class="menu-icon">
              <i class="fa fa-user"></i>
              </span>
              <span class="menu-title">Réu</span>
            </a>
          </li>
          <li class="nav-item menu-items">
          <a href ="{{url("/vitima")}}" class="nav-link" href="index.html">
              <span class="menu-icon">
              <i class="fa fa-users"></i>
              </span>
              <span class="menu-title">Vítimas</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/icons/mdi.html">
              <span class="menu-icon">
                <i class="fa fa-user-tie"></i>
              </span>
              <span class="menu-title">Advogados</span>
            </a>
          </li>
          
        </ul>
      </nav>

      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo"></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="primary-text navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
             <span class="fa fa-bars "></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                <input type="text" name="pesquisa" placeholder="Pesquisar processo">
                <button type="submit">Pesquisar</button>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                  <h6 class="p-3 mb-0">Projects</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-file-outline text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-web text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">UI Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-layers text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Testing</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all projects</p>
                </div>
              </li>
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <li class="nav-item dropdown border-left">
                
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              <li class="nav-item dropdown border-left">
                
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{url("/editarUsuario?idUsuario=$IdUsuario")}}" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                      <i class="fa fa-user"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <i class="fa fa-address-card"></i>
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{session('Nome')}}</p>
                    <i class="fa fa-user"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Definições</h6>
                  <div class="dropdown-divider"></div>
                  <a href="{{url("/editarUsuario?idUsuario=$IdUsuario")}}" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Editar Usuário</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{url("/logout")}}" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      
                    </div>
                    <div class="preview-item-content">
                      <p  class="preview-subject mb-1">Sair</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="">
          @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!--
          <footer class="footer">
            
          </footer>
          -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
    </div>
        <script src="{{asset('frontend/js/jquery.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('frontend/js/popper.min.js')}}" crossorigin="anonymous"></script>

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

        <script src="assets/js/dashboard.js"></script>
    </body>
 
</html>

@else
<script>
  location.href = '/';
</script>
@endif