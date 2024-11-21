<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assurez-vous d'avoir compilé les assets -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        /* Style pour l'image de fond */
        body {
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            margin: 0;
        }

        /* Conteneur principal pour la disposition */
        .d-flex {
            display: flex;
            height: 100vh;
        }

        /* Barre latérale */
        .sidebar {
            background-color: #343a40;
            width: 250px;
            padding-top: 20px;
            position: fixed;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.3);
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar li {
            margin: 20px 0;
        }

        .sidebar a {
            color: white;
            font-size: 18px;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: white;
        }

        /* Contenu principal */
        main {
            margin-left: 250px; /* Décalage pour faire place à la sidebar */
            padding: 30px;
            color: white;
        }

        /* Style du titre */
        h1 {
            color: #000;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Style du texte principal */
        p {
            color: #000;
            font-size: 1.2rem;
        }

    </style>
</head>
<body>

    <div class="d-flex">
        <!-- Barre latérale -->
        <nav class="sidebar bg-dark text-white">
            <ul class="list-unstyled p-3">
                <li><a href="{{ route('admin.dashboard') }}" class="text-white">Dashboard</a></li>
                <li><a href="{{ route('admin.gereEmpl.index') }}" class="text-white">Gérer Employés</a></li>
                <li><a href="{{ route('admin.gereEmpl.create') }}" class="text-white">Ajouter Employés</a></li>
                <li><a href="{{ route('logout') }}" class="text-white">Déconnecter</a></li>

            </ul>
        </nav> 
    
        <!-- Contenu principal -->
        <main>
            <h1>Bienvenue dans le tableau de bord administrateur</h1>
            <p>Utilisez la barre  pour naviguer entre les fonctionnalités.</p>
        </main>
    </div>

</body>
</html>
