<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Primes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des Primes</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID Employé</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Facteur d'Absence</th>
                    <th>Facteur de Performance</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($primes as $prime)
                    <tr>
                        <td>{{ $prime->id_employee }}</td>
                        <td>{{ $prime->amount }}</td>
                        <td>{{ $prime->date_awarded }}</td>
                        <td>{{ $prime->absence_factor }}</td>
                        <td>{{ $prime->performance_factor }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucune prime trouvée</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
