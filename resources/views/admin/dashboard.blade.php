<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assurez-vous d'avoir compilé les assets -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

    <div class="d-flex">
        Barre latérale 
        <nav class="sidebar bg-dark text-white">
            <ul class="list-unstyled p-3">
                <li><a href="{{ route('admin.dashboard') }}" class="text-white">Dashboard</a></li>
                <li><a href="{{ route('admin.gereEmpl.index') }}" class="text-white">Gérer Employés</a></li>
            </ul>
        </nav> 
    
        <!-- Contenu principal -->
        <main class="p-4">
            <h1>Bienvenue dans le tableau de bord administrateur</h1>
            <p>Utilisez la barre latérale pour naviguer entre les fonctionnalités.</p>
        </main>
    </div>
</body>
</html>
