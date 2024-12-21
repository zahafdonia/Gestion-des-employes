@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <h4 class="mb-3 text-white">Mes Notifications</h4>
    <ul class="list-group">
        @forelse($notifications as $notification)
            <li class="list-group-item">
                Absence ajoutée : {{ $notification->data['date'] }}
                <br>
                Raison : {{ $notification->data['reason'] }}
                <br>
                Durée : {{ $notification->data['duration'] }} heures
                <span class="text-muted float-end">{{ $notification->created_at->diffForHumans() }}</span>
            </li>
        @empty
            <li class="list-group-item text-muted">Aucune notification</li>
        @endforelse
    </ul>
</div>
@endsection
