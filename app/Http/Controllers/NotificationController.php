<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // Assurez-vous que l'utilisateur est authentifié
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Méthode pour marquer une notification comme lue
    public function markAsRead($id)
    {
        $notification = DatabaseNotification::find($id);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back()->with('success', 'Notification marquée comme lue.');
    }

    // Méthode pour afficher les notifications de l'utilisateur connecté
    public function showNotifications()
{
    // Récupère les notifications de l'utilisateur connecté
    $notifications = Auth::emplyee()->notifications;


    return view('notifications', compact('notifications'));
}

}
