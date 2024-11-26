@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">Gestion des Missions Internationales</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID Mission</th>
                <th>Employé</th>
                <th>Destination</th>
                <th>Objectif</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($missions as $mission)
                <tr>
                    <td>{{ $mission->mission_id }}</td>
                    <td>{{ $mission->employeeid }}</td>
                    <td>{{ $mission->destination }}</td>
                    <td>{{ $mission->purpose }}</td>
                    <td>{{ $mission->start_date }}</td>
                    <td>{{ $mission->end_date }}</td>
                    <td>
                        @if ($mission->status === 'pending')
                            <span class="badge bg-warning text-dark">En attente</span>
                        @elseif ($mission->status === 'approved')
                            <span class="badge bg-success">Approuvée</span>
                        @elseif ($mission->status === 'rejected')
                            <span class="badge bg-danger">Rejetée</span>
                        @endif
                    </td>
                    <td>
                        @if ($mission->status === 'pending')
                            <form action="{{ route('missions.international.approve', $mission->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                            </form>
                            <form action="{{ route('missions.international.reject', $mission->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>Action non disponible</button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Aucune mission disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
