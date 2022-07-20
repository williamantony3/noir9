<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Noir">
  <meta name="author" content="William Antony">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>NOIR</title>
  <!-- Favicon -->
  <link rel="icon" href="/img/brand/logo.jpg" type="image/x-icon">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="/vendor/select2/dist/css/select2.min.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/css/argon.min-v=1.0.0.css" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand">
        <!-- <img src="/img/brand/logo.jpg" alt="" srcset="" style="width: 50px; height: 33px;"> -->
        Menu
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('showRecipes') }}">
                <i class="fa fa-flask"></i>
                <span class="nav-link-text">Recipes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('showIngredients') }}">
                <i class="fa fa-vial"></i>
                <span class="nav-link-text">Ingredients</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item">
              <div class="media align-items-center">
          <img src="/img/brand/logo.jpg" alt="" srcset="" style="width: 50px; height: 33px;">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"></span>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
  </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/js-cookie/js.cookie.js"></script>
  <script src="/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
  <!-- Optional JS -->
  <script src="/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <!-- <script src="/vendor/datatables.net-select/js/dataTables.select.min.js"></script> -->
  <script src="/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="/vendor/select2/dist/js/select2.min.js"></script>
  <!-- Argon JS -->
  <script src="/js/argon.min-v=1.0.0.js"></script>
  </head>
</body>

</html>