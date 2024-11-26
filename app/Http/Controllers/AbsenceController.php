<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absence;

class AbsenceController extends Controller
{
    //
    public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'reason' => 'required|string|max:200',
        'duration' => 'required|integer',
        'employeeid' => 'required|exists:employee,employeeid',
    ]);

    Absence::create($request->all());

    return response()->json(['message' => 'Absence ajoutée avec succès'], 201);
}
public function index()
{
    $absences = Absence::with('employee')->get();

    $stats = [
        'total_absences' => $absences->count(),
        'average_duration' => $absences->avg('duration'),
        'reasons' => $absences->groupBy('reason')->map->count(),
    ];

    return view('admin.absences', compact('absences', 'stats'));
}

}
