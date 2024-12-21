<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;


use App\Models\user;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class EmployeeController extends Controller
{
    // Le middleware 'auth' garantit que seul un utilisateur authentifié peut accéder à cette route
    public function __construct()
    {
        $this->middleware('auth'); // Protection de la route avec le middleware 'auth'
    }

    // Méthode pour afficher le tableau de bord de l'employé
    public function index()
    {
        // Vous pouvez ajouter la logique pour récupérer les données nécessaires pour l'employé
        return view('employee.dashboard'); // Vue pour le tableau de bord employé
    }


    public function index_1()
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
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'lastname' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'salary' => 'required|numeric|min:0',
    ]);

    // Création de l'utilisateur
    $user = User::create([
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'lastname' => $validated['lastname'],
        'name' => $validated['name'],
        'role_id' => 2, // Assurez-vous que 2 correspond à "employee"
    ]);

    Log::info('Utilisateur créé avec ID : ' . $user->id);

    // Création de l'employé lié à l'utilisateur
    try {
        $employee = Employee::create([
            'idU' => $user->id,
            'address' => $validated['address'],
            'city' => $validated['city'],
            'position' => $validated['position'],
            'salary' => $validated['salary'],
             // Statut par défaut
        ]);

        Log::info('Employé créé avec ID : ' . $employee->employee_id);

    } catch (\Exception $e) {
        Log::error('Erreur lors de la création de l\'employé : ' . $e->getMessage());
        return back()->withErrors(['error' => 'Erreur lors de la création de l\'employé']);
    }

    // Retourner une réponse après succès
    return redirect()->route('admin.gereEmpl.index')->with('success', 'Employé ajouté avec succès');
}


    public function edit($id)
    {
        // Ajout de log pour vérifier l'entrée
        Log::info('Début de la méthode edit, ID : ' . $id);
        
        // Récupérer l'employé avec findOrFail pour garantir que l'employé existe
        try {
            $employee = Employee::findOrFail($id);
            Log::info('Employé trouvé : ' . $employee->employee_id);
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
    Log::info('Employé trouvé : ' . $employee->employee_id);

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
    
    public function notifications()
{
    $notifications = Auth::emplyee()->unreadNotifications;

    return view('user.notifications.index', compact('notifications'));
    //// 


    
}







    public function notificationsfares()
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

