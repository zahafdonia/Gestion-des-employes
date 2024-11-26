@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">Mes Missions Internationales</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Bouton pour ajouter une nouvelle mission internationale -->
    <div class="text-end mb-3">
        <a href="{{ route('missions.international.create') }}" class="btn btn-success">
            Ajouter une Nouvelle Mission Internationale
        </a>
    </div>

    <table class="table table-hover table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID Mission</th>
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
                        @if ($mission->status === 'approved')
                            <a href="{{ route('missions.international.report.create', $mission->id) }}" class="btn btn-primary btn-sm">Créer Rapport</a>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>Créer Rapport</button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Aucune mission disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
