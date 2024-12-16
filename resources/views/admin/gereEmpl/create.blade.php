@extends('admin.dashboard')

@section('content')
<div class="container mt-4">
    <h2>Ajouter un Employé</h2>
    <form action="{{ route('admin.gereEmpl.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Prénom</label> <!-- Change to 'First Name' -->
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Nom</label> <!-- Change to 'Last Name' -->
            <input type="text" name="lastname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Ville</label> <!-- Change 'City' -->
            <input type="text" name="city" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label> <!-- Change 'Address' -->
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="poste" class="form-label">Poste</label> <!-- Correct 'Position' to 'Poste' -->
            <input type="text" name="position" class="form-control" required> <!-- Ensure 'name' is 'position' -->
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salaire</label> <!-- Change 'Salary' -->
            <input type="number" name="salary" class="form-control" required> <!-- Change to 'number' input type -->
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
