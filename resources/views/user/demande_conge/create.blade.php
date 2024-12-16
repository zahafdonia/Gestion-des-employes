<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Employé</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<div class="container mt-5">
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('user.dashboard') }}" class="text-decoration-underline text-dark">
            ← Retour au Dashboard
        </a>
    </div>
    <h1 class="text-center"> Demander Congé</h1>
<form action="{{ route('user.demande_conge.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="date_debut" class="form-label">Date de début</label>
        <input type="date" name="date_debut" id="date_debut" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="date_fin" class="form-label">Date de fin</label>
        <input type="date" name="date_fin" id="date_fin" class="form-control" required>
    </div>
   
    <div class="mb-3">
        <label for="type" class="form-label">Type de congé</label>
        <select name="type" id="type" class="form-select" required>
            <option value="Annuel">Annuel</option>
            <option value="Maladie">Maladie</option>
            <option value="Maladie">Matérnité</option>
            <option value="Maladie">Autre</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="commentaire" class="form-label">Commentaire</label>
        <textarea name="commentaire" id="commentaire" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>



