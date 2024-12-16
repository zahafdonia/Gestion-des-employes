<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier votre statut</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #343a40;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier votre statut de travail</h2>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Affichage des erreurs de validation -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Affichage du statut actuel -->
        @if($status)
            <p>Statut actuel : <strong>{{ $status->status }}</strong></p>
        @else
            <p>Vous n'avez pas encore défini de statut.</p>
        @endif

        <!-- Formulaire pour mettre à jour le statut -->
        <form action="{{ route('status.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Nouveau statut</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Actif" {{ $status && $status->status == 'Actif' ? 'selected' : '' }}>Actif</option>
                    <option value="En pause" {{ $status && $status->status == 'En pause' ? 'selected' : '' }}>En pause</option>
                    <option value="Absent" {{ $status && $status->status == 'Absent' ? 'selected' : '' }}>Absent</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Mettre à jour le statut</button>
        </form>
    </div>
</body>
</html>
