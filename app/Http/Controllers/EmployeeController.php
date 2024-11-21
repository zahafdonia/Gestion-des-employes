<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    public function index()
{
    $employees = Employee::with('user')->get();
    foreach ($employees as $employee) {
    }
   
    return view('admin.gereEmpl.index', compact('employees'));
}

   


    public function create()
    {
        return view('admin.gereEmpl.create');
    }

    public function store(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'lastname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        // Créer un utilisateur
        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'lastname' => $validated['lastname'],
            'name' => $validated['name'],
            'idR' => 2, // Exemple : 2 correspond au rôle "employee"
            'status' => 'active',
        ]);

        // Créer un employé lié à l'utilisateur
        Employee::create([
            'idU' => $user->idU,
            'address' => $validated['address'],
            'city' => $validated['city'],
            'position' => $validated['position'],
            'salary' => $validated['salary'],
        ]);

        return redirect()->route('admin.gereEmpl.index')->with('success', 'Employé ajouté avec succès');
    }
    

    public function edit($id)
    {
        // Ajout de log pour vérifier l'entrée
        Log::info('Début de la méthode edit, ID : ' . $id);
        
        // Récupérer l'employé avec findOrFail pour garantir que l'employé existe
        try {
            $employee = Employee::findOrFail($id);
            Log::info('Employé trouvé : ' . $employee->employeeId);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // En cas d'échec, un message d'erreur sera loggé et une erreur 404 sera lancée
           
        }
       
        return view('admin.gereEmpl.edit', compact('employee'));
    }
    

    public function update(Request $request, $id)
{
    Log::info('Début de la méthode update');

    // Trouver l'employé
    $employee = Employee::findOrFail($id);
    Log::info('Employé trouvé : ' . $employee->employeeId);

    // Trouver l'utilisateur associé
    $user = User::findOrFail($employee->idU);
    Log::info('Utilisateur associé trouvé : ' . $user->idU);

    // Mettre à jour les informations de l'utilisateur
    $user->name = $request->input('name');
    $user->lastname = $request->input('lastname');
    $user->save();
    Log::info('Utilisateur mis à jour');

    // Mettre à jour les informations de l'employé
    $employee->city = $request->input('city');
    $employee->position = $request->input('position');
    $employee->salary = $request->input('salary');
    $employee->save();
    Log::info('Employé mis à jour');
    $employee->user->save();
    $employee->save();

    // Rediriger vers la page index avec un message de succès
    return redirect()->route('admin.gereEmpl.index')->with('success', 'Employé mis à jour avec succès');
}
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
    
        // Supprimez d'abord l'employé
        $employee->delete();
    
        // Ensuite, supprimez l'utilisateur associé
        User::where('idU', $employee->idU)->delete();
    
        // Redirigez avec un message de succès
        return redirect()->route('admin.gereEmpl.index')->with('success', 'Employé et utilisateur supprimés avec succès');
    }
    


        }
