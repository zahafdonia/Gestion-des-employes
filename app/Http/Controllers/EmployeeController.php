<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function create()
{
    $users = User::all(); // Récupérer tous les utilisateurs
    return view('employee.create', compact('users'));
}
public function index()
{
    $employees = Employee::with('user')->get(); // Charger les employés avec leur utilisateur lié
    return view('employee.index', compact('employees'));
}


public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'employee_id' => 'required|string|unique:employees,employee_id',
        'position' => 'required|string|max:255',
        'city' => 'required|string|max:255', // Ajoutez city ici
        'address' => 'required|string|max:255',
        'salary' => 'required|numeric|min:0',
        'user_id' => 'nullable|exists:users,id',
    ]);

    Employee::create([
        'name' => $request->name,
        'employee_id' => $request->employee_id,
        'position' => $request->position,
        'city' => $request->city, // Ajoutez city ici
        'address' => $request->address,
        'salary' => $request->salary,
        'user_id' => $request->user_id, // Si sélectionné
    ]);


    return redirect()->route('admin.employees.index')->with('success', 'Employé créé avec succès.');
}


    //
    public function notifications()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;
        $readNotifications = auth()->user()->readNotifications;

        // Marquer les notifications non lues comme lues
        $unreadNotifications->markAsRead();

        return view('user.dashboard', compact('unreadNotifications', 'readNotifications'));
    }




    public function markAllAsRead()
    {
        // Mark all unread notifications as read
        auth()->user()->unreadNotifications->markAsRead();

        // Redirect to the notifications page
        return redirect()->route('employee.notifications');
    }


}
