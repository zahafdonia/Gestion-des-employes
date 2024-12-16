<!DOCTYPE html>
<html>
<head>
    <title>Rapport des Congés</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Rapport des Congés</h1>
    <table>
        <thead>
            <tr>
                <th>Employé</th>
                <th>Type</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conges as $conge)
            <tr>
                <td>{{ $conge->employee->name }}</td>
                <td>{{ $conge->type }}</td>
                <td>{{ $conge->date_debut }}</td>
                <td>{{ $conge->date_fin }}</td>
                <td>{{ $conge->statut }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
