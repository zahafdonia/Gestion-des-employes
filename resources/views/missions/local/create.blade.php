@extends('layouts.app')

@section('content')
    <div style="text-align: center; margin-bottom: 20px;">
     
    </div>

    <h1 style="text-align: center; color: #4CAF50; margin-bottom: 20px;">Créer une Mission Locale</h1>
    <form action="{{ route('local_missions.store') }}" method="POST" style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9;">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="employeeid" style="display: block; margin-bottom: 5px;">ID Employé :</label>
            <input type="text" id="employeeid" name="employeeid" value="EMP123" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="region" style="display: block; margin-bottom: 5px;">Région :</label>
            <input type="text" id="region" name="region" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="accompanying_person" style="display: block; margin-bottom: 5px;">Personne Accompagnante :</label>
            <input type="text" id="accompanying_person" name="accompanying_person" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="superviseur" style="display: block; margin-bottom: 5px;">Superviseur :</label>
            <input type="text" id="superviseur" name="superviseur" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="purpose" style="display: block; margin-bottom: 5px;">Objet :</label>
            <textarea id="purpose" name="purpose" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="start_date" style="display: block; margin-bottom: 5px;">Date Début :</label>
            <input type="date" id="start_date" name="start_date" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="end_date" style="display: block; margin-bottom: 5px;">Date Fin :</label>
            <input type="date" id="end_date" name="end_date" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="license_plate" style="display: block; margin-bottom: 5px;">Plaque d'immatriculation :</label>
            <input type="text" id="license_plate" name="license_plate" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="car_type" style="display: block; margin-bottom: 5px;">Type de Voiture :</label>
            <input type="text" id="car_type" name="car_type" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="fuel_type" style="display: block; margin-bottom: 5px;">Type de Carburant :</label>
            <input type="text" id="fuel_type" name="fuel_type" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="carte_carburant" style="display: block; margin-bottom: 5px;">Carte Carburant :</label>
            <input type="number" id="carte_carburant" name="carte_carburant" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="distance_traveled" style="display: block; margin-bottom: 5px;">Distance Parcourue :</label>
            <input type="number" id="distance_traveled" name="distance_traveled" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Créer Mission</button>
    </form>
@endsection
