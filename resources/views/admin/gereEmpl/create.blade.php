@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-underline text-dark">
            ← Retour au Dashboard
        </a>
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3>Ajouter un Employé</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gereEmpl.store') }}" method="POST">
                @csrf

                <!-- Informations Utilisateur -->
                <h4 class="mb-4">Informations Employé</h4>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom :</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Prénom :</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <!-- Informations Employé -->
                <h4 class="mb-4 mt-5">Informations supplémentaires</h4>
                <div class="mb-3">
                    <label for="address" class="form-label">Adresse :</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Ville :</label>
                    <input type="text" id="city" name="city" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label">Poste :</label>
                    <input type="text" id="position" name="position" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Salaire :</label>
                    <input type="number" id="salary" name="salary" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="conge" class="form-label">NBRJconge</label>
                    <input type="number" id="conge" name="conge" class="form-control" required>
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="btn btn-primary w-100 mt-4">Ajouter l'employé</button>
            </form>
        </div>
    </div>
</div>
@endsection
