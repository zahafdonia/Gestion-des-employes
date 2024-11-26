<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Employé</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

@section("content") <!-- Correction ici -->
<div class="container mt-5">
    <h1 class="text-center">Mes demandes de congé</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Type</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @forelse($demandes as $demande)
                <tr>
                    <td>{{ $demande->date_debut }}</td>
                    <td>{{ $demande->date_fin }}</td>
                    <td>{{ $demande->type }}</td>
                    <td>{{ $demande->statut }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Aucune demande de congé trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
