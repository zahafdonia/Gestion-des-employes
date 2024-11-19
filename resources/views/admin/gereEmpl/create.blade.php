@extends('admin.dashboard')

@section('content')
<div class="container mt-4">
    <h2>Ajouter un Employé</h2>
    <form action="{{ route('admin.gereEmpl.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">lasteName</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Name</label>
            <input type="text" name="lastname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="poste" class="form-label">Position</label>
            <input type="text" name="poste" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" name="salary" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection

