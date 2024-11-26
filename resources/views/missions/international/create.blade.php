@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">Ajouter une Nouvelle Mission Internationale</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('missions.international.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination') }}" required>
        </div>
        <div class="mb-3">
            <label for="purpose" class="form-label">Objectif</label>
            <textarea class="form-control" id="purpose" name="purpose" rows="3" required>{{ old('purpose') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Date Début</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Date Fin</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
