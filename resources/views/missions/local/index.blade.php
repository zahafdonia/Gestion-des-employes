@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4 text-success">Mes Missions Locales</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID Mission</th>
                    <th>Région</th>
                    <th>Objet</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($missions as $mission)
                    <tr>
                        <td>{{ $mission->mission_id }}</td>
                        <td>{{ $mission->region }}</td>
                        <td>{{ $mission->purpose }}</td>
                        <td>{{ $mission->start_date }}</td>
                        <td>{{ $mission->end_date }}</td>
                        <td>
                            @if($mission->status === 'Approved')
                                <span class="badge bg-success">Approuvé</span>
                            @elseif($mission->status === 'Rejected')
                                <span class="badge bg-danger">Rejeté</span>
                            @else
                                <span class="badge bg-warning">En Attente</span>
                            @endif
                        </td>
                        <td>
                            <!-- Bouton Modifier -->
                            <a href="{{ route('local_missions.edit', $mission->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                            <!-- Formulaire pour le bouton Supprimer -->
                            <form action="{{ route('local_missions.destroy', $mission->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette mission ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bouton pour créer une nouvelle mission -->
    <div class="text-center mt-4">
        <a href="{{ route('local_missions.create') }}" class="btn btn-primary" style="padding: 10px 20px; font-size: 16px;">
            Créer une nouvelle mission
        </a>
    </div>
@endsection
