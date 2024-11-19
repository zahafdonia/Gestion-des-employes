<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
{
    $employees = Employee::with('user')->get(); 
    dd($employees);
    return view('admin.gereEmpl.index', compact('employees'));
}

    public function create()
    {
        return view('admin.gereEmpl.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'salary' => 'required|numeric|min:0',
    ]);

    // Sauvegarder l'employé
    Employee::create($validatedData);

    return redirect()->route('admin.gereEmpl.index')->with('success', 'Employé ajouté avec succès.');
}

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.gereEmpl.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('admin.gereEmpl.index')->with('success', 'Employé modifié avec succès');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('admin.gereEmpl.index')->with('success', 'Employé supprimé avec succès');
    }
}
