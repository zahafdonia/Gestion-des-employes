<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    
    <!-- Lien vers Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Style pour le corps */
        body {
            background-image: url("{{ asset('assets/bg.jpg') }}") /* Remplacez par votre propre URL si nécessaire */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Style pour la carte */
        .card {
            background: rgba(219, 217, 217, 0.9); /* Fond transparent */
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Ombre légère */
            width: 100%;
            max-width: 400px;
        }

        .card-header {
            background-color: #2d7dbe;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
            padding: 15px;
        }

        .btn-primary {
            background-color: #a5b1bd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #007ab3;
        }

        /* Style pour les titres */
        h1, h2 {
            text-align: center;
            color: rgb(0, 0, 0);
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); /* Ombre pour meilleure visibilité */
            margin-bottom: 30px;
            margin-right: 30px;
        }
    </style>
</head>
<body>
    <!-- Titres -->
    <div>
        <h1>Bienvenue sur BesideYou</h1>
        <h2>Connectez-vous pour continuer</h2>
    </div>

    <!-- Carte de connexion -->
    <div class="card">
        <div class="card-header">
            <h2>Se connecter</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>
        </div>

        @if ($errors->any())
            <div class="card-footer bg-danger text-white">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
