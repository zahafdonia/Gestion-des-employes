@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">Créer un Rapport pour la Mission Internationale</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('missions.international.report.submit', $mission->id) }}" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        @csrf

        <div class="form-group mb-3">
            <label for="reportDetails" class="form-label">Détails du Rapport</label>
            <textarea class="form-control" id="reportDetails" name="reportDetails" rows="4" required>{{ old('reportDetails') }}</textarea>
            @error('reportDetails')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="reportDate" class="form-label">Date du Rapport</label>
            <input type="date" class="form-control" id="reportDate" name="reportDate" value="{{ old('reportDate') }}" required>
            @error('reportDate')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="receipt" class="form-label">Recevabilité (facultatif)</label>
            <input type="file" class="form-control" id="receipt" name="receipt" accept=".jpg,.png,.pdf">
            @error('receipt')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Soumettre le Rapport</button>
    </form>
</div>
@endsection
