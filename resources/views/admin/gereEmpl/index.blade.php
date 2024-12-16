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


<div class="container mt-4">
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-underline text-dark">
            ← Retour au Dashboard
        </a>
    </div>
    <h2 class="text-center mb-4">Liste des Employés</h2>
    <table class="table table-bordered table-hover table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Ville</th>
                <th>Poste</th>
                <th>Salaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
                <tr class="text-center">
                    <td>{{ $employee->employeeId }}</td>
                    <td>{{ $employee->user->name ?? 'Non spécifié' }}</td>
                    <td>{{ $employee->user->lastname ?? 'Non spécifié' }}</td>
                    <td>{{ $employee->city ?? 'Non spécifié' }}</td>
                    <td>{{ $employee->position ?? 'Non spécifié' }}</td>
                    <td>{{ $employee->salary ?? 'Non spécifié' }}</td>
                    <td>
                        <a href="{{ route('admin.gereEmpl.edit', $employee->employeeId) }}" class="btn btn-primary btn-sm me-1">Modifier</a>
                        <form action="{{ route('admin.gereEmpl.destroy', $employee->employeeId) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Aucun employé trouvé</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
