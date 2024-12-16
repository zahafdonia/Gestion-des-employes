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
    <title>User Dashboard</title>
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
<style>
    /* Style du modal */
.modal-content {
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

/* Header du modal */
.modal-header {
    background-color: #01101f;  /* Couleur de fond bleue */
    color: #fff;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.modal-header .btn-close {
    background-color: transparent;
    border: none;
    color: white;
}

/* Titre du modal */
.modal-title {
    font-size: 1.25rem;
    font-weight: 600;
}

/* Corps du modal */
.modal-body {
    padding: 20px;
    max-height: 400px; /* Limiter la hauteur du contenu */
    overflow-y: auto;  /* Scrolling si nécessaire */
}

/* Style des notifications (non lues et lues) */
h5 {
    font-size: 1.2rem;
    font-weight: bold;
    margin-top: 15px;
    color: #000000;
}

/* Liste des notifications */
ul {
    list-style-type: none;
    padding: 0;
}

ul li {
    margin-bottom: 10px;
}

ul li strong {
    font-size: 1rem;
    color: #000000;
}

ul li small {
    font-size: 0.9rem;
    color: #777;
}

/* Notifications non lues */
h5:first-of-type {
    color: #000000;  /* Couleur bleue pour les non lues */
}

hr {
    margin-top: 10px;
    margin-bottom: 10px;
    border: 1px solid #f0f0f0;
}

/* Bouton de fermeture */
.btn-close {
    color: white;
    font-size: 1.5rem;
}
/* Animation pour l'ouverture du modal */
.modal.fade .modal-dialog {
    transform: translate(0, -50px);
    transition: transform 0.3s ease-in-out;
}

/* Animation pour la fermeture du modal */
.modal.fade.show .modal-dialog {
    transform: translate(0, 0);
}

</style>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
                    <li class="nav-item">
                        <a class="nav-link active bg-gradient-dark text-white" href="#">
                            <i class="material-symbols-rounded opacity-5">dashboard</i>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">person</i>
                            <span class="nav-link-text ms-1">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <i class="material-symbols-rounded opacity-5">settings</i>
                            <span class="nav-link-text ms-1">Settings</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#" data-bs-toggle="modal" data-bs-target="#notificationsModal">
                            <i class="material-symbols-rounded opacity-5">notifications</i>
                            <span class="nav-link-text ms-1">Notifications</span>
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
        </aside>


        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->

            <!-- Dynamic Content -->
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Include JS scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
<!-- Modal Notifications -->
<div class="modal fade" id="notificationsModal" tabindex="-1" aria-labelledby="notificationsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="notificationsModalLabel">Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Non Lues</h5>
                @if($unreadNotifications->isEmpty())
                    <p>Aucune notification non lue.</p>
                @else
                    <ul>
                        @foreach($unreadNotifications as $notification)
                            <li>
                                <strong>{{ $notification->data['message'] ?? 'Notification' }}</strong><br>
                                <small>{{ $notification->created_at->diffForHumans() }}</small>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <hr>

                <h5>Lues</h5>
                @if($readNotifications->isEmpty())
                    <p>Aucune notification lue.</p>
                @else
                    <ul>
                        @foreach($readNotifications as $notification)
                            <li>
                                {{ $notification->data['message'] ?? 'Notification' }}<br>
                                <small>{{ $notification->created_at->diffForHumans() }}</small>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Inclure les scripts nécessaires -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>

</script>
</body>
</html>
