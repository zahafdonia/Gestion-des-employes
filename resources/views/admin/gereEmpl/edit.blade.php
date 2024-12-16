@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-underline text-dark">
            ← Retour au Dashboard
        </a>
    </div>
    <h2>Modifier l'Employé</h2>
    <form action="{{ route('admin.gereEmpl.update', $employee->employeeId) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->user->name ?? '' }}" required>
        </div>
        
        <div class="mb-3">
            <label for="lastname" class="form-label">Prénom</label>
            <input type="text" name="lastname" class="form-control" value="{{ $employee->user->lastname ?? '' }}" required>
        </div>
        
        <div class="mb-3">
            <label for="city" class="form-label">Ville</label>
            <input type="text" name="city" class="form-control" value="{{ $employee->city ?? '' }}" required>
        </div>
        
        <div class="mb-3">
            <label for="position" class="form-label">Poste</label>
            <input type="text" name="position" class="form-control" value="{{ $employee->position ?? '' }}" required>
        </div>
        
        <div class="mb-3">
            <label for="salary" class="form-label">Salaire</label>
            <input type="text" name="salary" class="form-control" value="{{ $employee->salary ?? '' }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary w-100 mt-4">Modifier</button>
    </form>
</div>
@endsection
