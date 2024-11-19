@extends('admin.dashboard')

@section('content')
<div class="container mt-4">
    <h2>Modifier l'Employé</h2>
    <form action="{{ route('admin.gereEmpl.update', $employee->employeeId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">lasteName</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Name</label>
            <input type="text" name="lastname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">City</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Position" class="form-label">Position</label>
            <input type="text" name="Position" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" name="salary" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>
@endsection
