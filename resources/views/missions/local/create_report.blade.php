@extends('layouts.app')

@section('content')
    <style>
        .report-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .report-form h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .report-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .report-form textarea,
        .report-form input[type="date"],
        .report-form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .report-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .report-form button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="report-form">
        <h1>Soumettre un Rapport pour la Mission : {{ $mission->mission_id }}</h1>
        <form action="{{ route('local_missions.submit_report', $mission->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Détails du Rapport :</label>
                <textarea name="reportDetails" required></textarea>
            </div>
            <div>
                <label>Date du Rapport :</label>
                <input type="date" name="reportDate" required>
            </div>
            <div>
                <label>Joindre un Reçu (optionnel) :</label>
                <input type="file" name="receipt" accept=".jpg,.png,.pdf">
            </div>
            <button type="submit">Soumettre le Rapport</button>
        </form>
    </div>
@endsection
