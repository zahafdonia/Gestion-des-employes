@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="mb-3 text-white">Mes Notifications</h4>
    <ul class="list-group">
        @forelse($notifications as $notification)
            <li class="list-group-item">
                le status du conges est: {{ $notification->date['message'] }}
                <br>
                date de debut de conges : {{ $notification->date['date debut'] }}
                <br>
                date du fin de conges : {{ $notification->date['date fin'] }}
                <br>
                
                <span class="text-muted float-end">{{ $notification->created_at->diffForHumans() }}</span>
            </li>
        @empty
            <li class="list-group-item text-muted">Aucune notification</li>
        @endforelse
    </ul>
</div>
@endsection