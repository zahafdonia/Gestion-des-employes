@extends('layouts.app')
@section('content')
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>Admin Dashboard</title>
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
<!-- Inclure la bibliothèque des Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body class="g-sidenav-show bg-gray-100">
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
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </li>
                    </ul>
                  </div>


                </ul>
        </div>
    </aside>

    <main class="main-content position-relative h-100 border-radius-lg" style="margin-left: 250px; padding: 20px; width: calc(100% - 250px);">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">

                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav d-flex align-items-center justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                        </li>
                        <li class="mt-1">
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
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
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
        <!-- End Navbar -->
        <div class="container-fluid py-2">
            <div class="row">
                <!-- Carte Absences -->
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card h-100" style="cursor: pointer;" onclick="window.location.href='{{ route('admin.absences') }}'">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Absences</p>
                                    <h4 class="mb-0">Gérer les absences</h4>
                                </div>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-icons opacity-10">calendar_today</i> <!-- Icône de calendrier -->
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-2 ps-3">
                        </div>
                    </div>
                </div>

                <!-- Carte Missions Internationales -->
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card h-100" style="cursor: pointer;" onclick="window.location.href='{{ route('missions.international.admin.index') }}'">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Missions internationales</p>
                                    <h4 class="mb-0">Gérer les missions internationales</h4>
                                </div>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-icons opacity-10">airplanemode_active</i> <!-- Icône d'avion -->
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-2 ps-3">
                        </div>
                    </div>
                </div>

                <!-- Carte Missions Locales -->
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card h-100" style="cursor: pointer;" onclick="window.location.href='{{ route('admin.local_missions.index') }}'">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Missions locales</p>
                                    <h4 class="mb-0">Gérer les missions locales</h4>
                                </div>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-icons opacity-10">home</i> <!-- Icône de maison -->
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-2 ps-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </main>

</body>
@endsection
