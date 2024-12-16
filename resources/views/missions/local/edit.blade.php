@extends('layouts.app')

@section('content')
    <h1 class="text-center" style="margin-bottom: 30px; color: #4CAF50;">Modifier la Mission</h1>

    <form action="{{ route('local_missions.update', $mission->id) }}" method="POST" style="max-width: 600px; margin: auto; background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @csrf
        @method('PUT') {{-- Ajout de la méthode PUT --}}

        {{-- Région --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="region" style="font-weight: bold;">Région :</label>
            <input type="text" name="region" id="region" value="{{ $mission->region }}" class="form-control" required style="border-radius: 5px; padding: 10px;">
        </div>

        {{-- Objet --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="purpose" style="font-weight: bold;">Objet :</label>
            <textarea name="purpose" id="purpose" class="form-control" required style="border-radius: 5px; padding: 10px;">{{ $mission->purpose }}</textarea>
        </div>

        {{-- Date Début --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="start_date" style="font-weight: bold;">Date Début :</label>
            <input type="date" name="start_date" id="start_date" value="{{ $mission->start_date }}" class="form-control" required style="border-radius: 5px; padding: 10px;">
        </div>

        {{-- Date Fin --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="end_date" style="font-weight: bold;">Date Fin :</label>
            <input type="date" name="end_date" id="end_date" value="{{ $mission->end_date }}" class="form-control" required style="border-radius: 5px; padding: 10px;">
        </div>

        {{-- Plaque d'immatriculation --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="license_plate" style="font-weight: bold;">Plaque d'immatriculation :</label>
            <input type="text" name="license_plate" id="license_plate" value="{{ $mission->license_plate }}" class="form-control" required style="border-radius: 5px; padding: 10px;">
        </div>

        {{-- Type de voiture --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="car_type" style="font-weight: bold;">Type de voiture :</label>
            <input type="text" name="car_type" id="car_type" value="{{ $mission->car_type }}" class="form-control" required style="border-radius: 5px; padding: 10px;">
        </div>

        {{-- Type de carburant --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="fuel_type" style="font-weight: bold;">Type de carburant :</label>
            <input type="text" name="fuel_type" id="fuel_type" value="{{ $mission->fuel_type }}" class="form-control" required style="border-radius: 5px; padding: 10px;">
        </div>

        {{-- Carte carburant --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="carte_carburant" style="font-weight: bold;">Carte carburant :</label>
            <input type="number" name="carte_carburant" id="carte_carburant" value="{{ $mission->carte_carburant }}" class="form-control" required style="border-radius: 5px; padding: 10px;">
        </div>

        {{-- Distance parcourue --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="distance_traveled" style="font-weight: bold;">Distance parcourue :</label>
            <input type="number" name="distance_traveled" id="distance_traveled" value="{{ $mission->distance_traveled }}" class="form-control" required style="border-radius: 5px; padding: 10px;">
        </div>

        {{-- Coût du carburant --}}
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="fuel_cost" style="font-weight: bold;">Coût du carburant :</label>
            <input type="number" step="0.01" name="fuel_cost" id="fuel_cost" value="{{ $mission->fuel_cost }}" class="form-control" style="border-radius: 5px; padding: 10px;">
        </div>

        {{-- Bouton de soumission --}}
        <button type="submit" class="btn btn-primary btn-block" style="background-color: #4CAF50; border: none; padding: 10px 20px; border-radius: 5px;">Enregistrer</button>
    </form>
@endsection
