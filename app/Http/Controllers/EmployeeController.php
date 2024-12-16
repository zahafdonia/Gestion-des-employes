<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Eager load user, performances, and absences to avoid N+1 query problems
        $employees = Employee::with(['user', 'performances', 'absences'])->get();

        // Return the view with the employees data
        return view('admin.gereEmpl.index', compact('employees'));
    }

    public function create()
    {
        // Return the view to create a new employee
        return view('admin.gereEmpl.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        // Create and save the employee in the database
        Employee::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('admin.gereEmpl.index')->with('success', 'Employé ajouté avec succès.');
    }

    public function edit($id)
    {
        // Find the employee by ID or fail if not found
        $employee = Employee::findOrFail($id);

        // Return the view to edit the employee
        return view('admin.gereEmpl.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        // Find the employee by ID or fail if not found
        $employee = Employee::findOrFail($id);

        // Update the employee with the request data
        $employee->update($request->all());

        // Redirect back with a success message
        return redirect()->route('admin.gereEmpl.index')->with('success', 'Employé modifié avec succès.');
    }

    public function destroy($id)
    {
        // Find the employee by ID or fail if not found
        $employee = Employee::findOrFail($id);

        // Delete the employee from the database
        $employee->delete();

        // Redirect back with a success message
        return redirect()->route('admin.gereEmpl.index')->with('success', 'Employé supprimé avec succès.');
    }
}
