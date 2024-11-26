@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; color: #4CAF50;">Liste des Missions Locales</h1>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID Mission</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Employé</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Région</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Date Début</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Date Fin</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Statut</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($missions as $mission)
                <tr style="text-align: center;">
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $mission->mission_id }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $mission->employee_id }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $mission->region }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $mission->start_date }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $mission->end_date }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $mission->status }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        @if($mission->status === 'Pending')
                            <form action="{{ route('admin.local_missions.approve', $mission->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 5px 10px; cursor: pointer;">Approuver</button>
                            </form>
                            <form action="{{ route('admin.local_missions.reject', $mission->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" style="background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;">Rejeter</button>
                            </form>
                        @else
                            <span style="color: {{ $mission->status === 'Approved' ? '#4CAF50' : '#f44336' }};">{{ ucfirst($mission->status) }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
