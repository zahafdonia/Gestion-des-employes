<!-- resources/views/admin/demande_conge/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour la demande de congé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-underline text-dark">
            ← Retour au Dashboard
        </a>
    </div>
    <h2>Mettre à jour la demande de congé</h2>

    <form method="POST" action="{{ route('admin.demande_conge.update', ['id' => $demande->id]) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select name="statut" id="statut" class="form-select">
                <option value="Approuvé" {{ $demande->statut == 'Approuvé' ? 'selected' : '' }}>Approuvé</option>
                <option value="Rejeté" {{ $demande->statut == 'Rejeté' ? 'selected' : '' }}>Rejeté</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
