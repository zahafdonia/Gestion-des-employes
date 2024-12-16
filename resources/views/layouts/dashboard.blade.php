<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Inclure les ressources CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>Admin Dashboard</title>
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
    <!-- Inclure la bibliothèque des Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/material-dashboard.css.map') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/material-dashboard.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('assets/js/material-dashboard.min.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />

</head>
<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2" id="sidenav-main" style="width: 250px;">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand px-4 py-3 m-0">
                    <img src="{{ asset('images/logo-removebg-preview.png') }}" class="navbar-brand-img" width="70" height="80" alt="main_logo">
                    <span class="ms-1 text-sm text-dark">Beside You</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0 mb-2">
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="nav-link active bg-gradient-dark text-white" href="../pages/dashboard.html">
                              <i class="material-symbols-rounded opacity-5">dashboard</i>
                              <span class="nav-link-text ms-1">Dashboard</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('admin.employees.create') }}">
                                <i class="material-symbols-rounded opacity-5">person_add</i>
                                Ajouter Un Nouveau Employé
                            </a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link text-dark" href="../pages/billing.html">
                              <i class="material-symbols-rounded opacity-5">receipt_long</i>
                              <span class="nav-link-text ms-1">Billing</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-dark" href="../pages/virtual-reality.html">
                              <i class="material-symbols-rounded opacity-5">view_in_ar</i>
                              <span class="nav-link-text ms-1">Virtual Reality</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-dark" href="../pages/rtl.html">
                              <i class="material-symbols-rounded opacity-5">format_textdirection_r_to_l</i>
                              <span class="nav-link-text ms-1">RTL</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-dark" href="../pages/notifications.html">
                              <i class="material-symbols-rounded opacity-5">notifications</i>
                              <span class="nav-link-text ms-1">Notifications</span>
                            </a>
                          </li>
                          <li class="nav-item mt-3">
                            <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-dark" href="../pages/profile.html">
                              <i class="material-symbols-rounded opacity-5">person</i>
                              <span class="nav-link-text ms-1">Profile</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-dark" href="../pages/sign-in.html">
                              <i class="material-symbols-rounded opacity-5">login</i>
                              <span class="nav-link-text ms-1">Sign In</span>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="material-symbols-rounded opacity-5">logout</i>
                              <span class="nav-link-text ms-1">Logout</span>
                            </a>
                          </li>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                        </ul>
                      </div>


                    </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <!-- Ajoutez des éléments supplémentaires pour la recherche, les utilisateurs, etc. -->
                    </div>
                    <ul class="navbar-nav d-flex align-items-center justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <!-- Notifications ou autres éléments de navigation -->
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-symbols-rounded">notifications</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{ asset('assets/img/team-2.jpg') }}" class="avatar avatar-sm me-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i> 13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ url('admin/sign-in') }}" class="nav-link text-body font-weight-bold px-0">
                                <i class="material-symbols-rounded">account_circle</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

            <!-- Contenu dynamique -->
            <main class="content">
                @yield('content')
            </main>

        </div>
    </div>

    <!-- Inclure les scripts JS -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
