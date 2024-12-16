<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Demandes de Congé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-underline text-dark">
            ← Retour au Dashboard
        </a>
    </div>
    <h2 class="text-center mb-4">Liste des Demandes de Congé</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>Employé</th>
                <th>Jours Utilisées</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Type</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($demandes as $demande)
            <tr>
                <td>{{ $demande->employee ? $demande->employee->employeeId : 'Non assigné' }}</td>
    <td>{{ $demande->employee ? $demande->employee->nbrjconge : '0' }} jours</td>
    <td>{{ $demande->date_debut ? \Carbon\Carbon::parse($demande->date_debut)->format('d/m/Y') : 'N/A' }}</td>
    <td>{{ $demande->date_fin ? \Carbon\Carbon::parse($demande->date_fin)->format('d/m/Y') : 'N/A' }}</td>
    <td>{{ $demande->type }}</td>
                <td>
                
                    <span class="badge 
                            {{ $demande->statut === 'Approuvé' ? 'bg-success' : ($demande->statut === 'Rejeté' ? 'bg-danger' : 'bg-warning') }}">
                            {{ $demande->statut }}
                    </span>
                </td>
                <td>
                        <form method="POST" action="{{ route('admin.demande_conge.update', $demande->id_conge) }}">
                            @csrf
                            @method('PUT')
                            <select name="statut" class="form-select form-select-sm mb-2">
                                <option value="Approuvé" {{ $demande->statut === 'Approuvé' ? 'selected' : '' }}>Approuvé</option>
                                <option value="Rejeté" {{ $demande->statut === 'Rejeté' ? 'selected' : '' }}>Rejeté</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Mettre à jour</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Aucune demande trouvée.</td>
                </tr>
            @endforelse
        </tbody>
        
    </table>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
