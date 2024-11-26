<div style="padding: 20px; background-color: #f9f9f9; border-radius: 8px; margin-bottom: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h3 style="color: #333; font-family: Arial, sans-serif; font-weight: bold;">Rapports d'absentéisme</h3>
    <p style="color: #555; font-family: Arial, sans-serif; font-size: 16px;">Total absences : <strong>{{ $stats['total_absences'] }}</strong></p>
    <p style="color: #555; font-family: Arial, sans-serif; font-size: 16px;">Durée moyenne : <strong>{{ round($stats['average_duration'], 2) }} heures</strong></p>
    <ul style="list-style-type: none; padding-left: 0; font-family: Arial, sans-serif; font-size: 14px;">
        @foreach ($stats['reasons'] as $reason => $count)
            <li style="margin-bottom: 8px; font-size: 14px; color: #333;">
                <strong>{{ $reason }} :</strong> {{ $count }} absences
            </li>
        @endforeach
    </ul>
</div>

<table style="width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <thead>
        <tr style="background-color: #4CAF50; color: white; text-align: left; font-family: Arial, sans-serif;">
            <th style="padding: 10px; border: 1px solid #ddd; font-size: 14px;">Employé</th>
            <th style="padding: 10px; border: 1px solid #ddd; font-size: 14px;">Date</th>
            <th style="padding: 10px; border: 1px solid #ddd; font-size: 14px;">Durée</th>
            <th style="padding: 10px; border: 1px solid #ddd; font-size: 14px;">Raison</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absences as $absence)
            <tr style="background-color: #f2f2f2; color: #333; font-family: Arial, sans-serif;">
                <td style="padding: 8px; border: 1px solid #ddd; font-size: 14px;">{{ $absence->employee->name }}</td>
                <td style="padding: 8px; border: 1px solid #ddd; font-size: 14px;">{{ $absence->date }}</td>
                <td style="padding: 8px; border: 1px solid #ddd; font-size: 14px;">{{ $absence->duration }}</td>
                <td style="padding: 8px; border: 1px solid #ddd; font-size: 14px;">{{ $absence->reason }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
