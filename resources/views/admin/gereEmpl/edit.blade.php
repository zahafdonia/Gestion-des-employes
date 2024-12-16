@extends('admin.dashboard')

@section('content')
<div class="container mt-4">
    <h2>Modifier l'Employé</h2>
    <form action="{{ route('admin.gereEmpl.update', $employee->employeeId) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name) }}" required>
        </div>

        <!-- Lastname Field -->
        <div class="mb-3">
            <label for="lastname" class="form-label">Prénom</label>
            <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $employee->lastname) }}" required>
        </div>

        <!-- City Field -->
        <div class="mb-3">
            <label for="city" class="form-label">Ville</label>
            <input type="text" name="city" class="form-control" value="{{ old('city', $employee->city) }}" required>
        </div>

        <!-- Address Field -->
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $employee->address) }}" required>
        </div>

        <!-- Position Field -->
        <div class="mb-3">
            <label for="position" class="form-label">Poste</label>
            <input type="text" name="position" class="form-control" value="{{ old('position', $employee->position) }}" required>
        </div>

        <!-- Salary Field -->
        <div class="mb-3">
            <label for="salary" class="form-label">Salaire</label>
            <input type="number" name="salary" class="form-control" value="{{ old('salary', $employee->salary) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>
@endsection
