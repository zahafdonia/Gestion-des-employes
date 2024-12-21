@extends('admin.layouts.app')

@section('head')
    <title>Gestion des Employés</title>
@endsection

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-underline text-dark">
            ← Retour au Dashboard
        </a>
    </div>
    
    <!-- Formulaire d'ajout d'employé -->
    <h2 class="text-center mb-4">Ajouter un Employé</h2>
    <form action="{{ route('admin.gereEmpl.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Ville</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Poste</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salaire</label>
            <input type="number" class="form-control" id="salary" name="salary" required>
        </div>
        <button type="submit" class="btn btn-success">Ajouter l'employé</button>
    </form>

    <!-- Liste des employés -->
    <h2 class="text-center mb-4 mt-5">Liste des Employés</h2>
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
@endsection
