@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4" style="font-size: 2.5rem; color: #333;">Créer un Rapport pour la Mission Internationale</h1>

    @if (session('success'))
        <div class="alert alert-success text-center" style="font-size: 1.2rem; padding: 1rem; margin-bottom: 1.5rem;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('missions.international.report.submit', $mission->id) }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto p-4 border rounded shadow-sm" style="background-color: #f9f9f9;">
        @csrf
        <div class="form-group mb-3">
            <label for="reportDetails" class="form-label" style="font-weight: bold; font-size: 1.1rem;">Détails du Rapport :</label>
            <textarea name="reportDetails" id="reportDetails" class="form-control" rows="5" required style="resize: none; padding: 0.75rem; border: 1px solid #ccc; border-radius: 0.25rem;"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="reportDate" class="form-label" style="font-weight: bold; font-size: 1.1rem;">Date du Rapport :</label>
            <input type="date" name="reportDate" id="reportDate" class="form-control" required style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 0.25rem;">
        </div>
        <div class="form-group mb-3">
            <label for="receipt" class="form-label" style="font-weight: bold; font-size: 1.1rem;">Justificatif (facultatif) :</label>
            <input type="file" name="receipt" id="receipt" class="form-control" accept=".jpg,.png,.pdf" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 0.25rem;">
        </div>
        <button type="submit" style="background-color: #007bff; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 0.25rem; font-size: 1.1rem;">Soumettre le Rapport</button>
    </form>
@endsection
