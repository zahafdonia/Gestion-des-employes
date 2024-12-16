@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Liste des Employés</h4>
        <a href="{{ route('admin.employees.create') }}" class="btn btn-success">
            <i class="material-symbols-rounded">person_add</i> Ajouter Un Nouvel Employé
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Poste</th>
                        <th>Salaire</th>
                        <th>Utilisateur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->employee_id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>
                                @if ($employee->user)
                                    {{ $employee->user->name }} ({{ $employee->user->email }})
                                @else
                                    Non lié
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm">Voir</a>
                                <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="#" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
