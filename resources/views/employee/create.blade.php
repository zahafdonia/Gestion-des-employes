@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-dark text-white text-center">
                    <h4 class="text-white">Ajouter un Nouvel Employé</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.employees.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">ID Employé</label>
                            <input type="text" name="employee_id" id="employee_id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Poste</label>
                            <input type="text" name="position" id="position" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">Ville</label>
                            <input type="text" name="city" id="city" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Adresse</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label for="salary" class="form-label">Salaire</label>
                            <input type="number" name="salary" id="salary" class="form-control" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Utilisateur (optionnel)</label>
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">-- Sélectionnez un utilisateur --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Créer Employé</button>
                            <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
